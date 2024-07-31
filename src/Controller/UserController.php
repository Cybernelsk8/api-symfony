<?php

namespace App\Controller;

use App\Entity\User;
use App\Repository\UserRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Attribute\Route;

use Symfony\Component\HttpKernel\Exception\AccessDeniedHttpException;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;

#[Route('/user', name: 'user')]
class UserController extends AbstractController
{
    #[Route('/register', name: 'register')]
    public function userRegister( EntityManagerInterface $entityManager, Request $request, UserPasswordHasherInterface $passwordHasher ): JsonResponse {
        
        $body = $request->getContent();
        $data = json_decode($body,true);

        
        $user = new User();

        $hashedPassword = $passwordHasher->hashPassword(
            $user,
            $data['password']
        );

        $user->setEmail($data["email"]);
        
        $user->setPassword($hashedPassword);

        $entityManager->persist($user);
        $entityManager->flush();

        
        return $this->json('Usuario creaado exitosamente');
    }

    #[Route('/getUsers', name:'get_users',methods:'GET')]
    public function userGet(UserRepository $userRepository): JsonResponse {
        
        $users = $userRepository->findAll();
        $usersArray = [];

        foreach ($users as $user) {
            $usersArray[] = [
                'id' => $user->getId(),
                'email' => $user->getEmail(),
                'roles' => $user->getRoles()
            ];
        }

    
        return $this->json($usersArray);
    }
}
