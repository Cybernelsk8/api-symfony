<?php

namespace App\Controller;

use App\Entity\Grade;
use App\Repository\GradeRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Attribute\Route;

#[Route('/grade', name: 'grade')]
class GradeController extends AbstractController
{
    #[Route('/index', name: 'index', methods:'GET')]
    public function index(GradeRepository $gradeRepository): JsonResponse {
        try {
            
            $grades = $gradeRepository->findAll();
            return $this->json($grades);

        } catch (\Throwable $th) {
            return $this->json($th->getMessage());
        }
    }

    #[Route('/show/{id}', name: 'show', methods:'GET')]
    public function show($id, GradeRepository $gradeRepository): JsonResponse {
        try {
            
            $grade = $gradeRepository->find($id);
            return $this->json($grade);

        } catch (\Throwable $th) {
            return $this->json($th->getMessage());
        }
    }

    #[Route('/store', name: 'store',methods:'POST')]
    public function store( Request $request, EntityManagerInterface $entityManagerInterface): JsonResponse {

        $body = json_decode($request->getContent(),true);

        try {

            $grade = new Grade();
            $grade->setStudentName($body['studentName']);
            $grade->setScore($body['score']);
            $grade->setSubject($body['subject']);
            $grade->setCreatedAt(new \DateTimeImmutable());

            $entityManagerInterface->persist($grade);
            $entityManagerInterface->flush();

            return $this->json('El registro se ha guardado correctamente');

        } catch (\Throwable $th) {
            return $this->json($th->getMessage());
        }
    }

    #[Route('/update/{id}', name: 'update',methods:'POST')]
    public function update($id, Request $request, EntityManagerInterface $entityManagerInterface, GradeRepository $gradeRepository): JsonResponse {

        $body = json_decode($request->getContent(),true);

        try {

            $grade = $gradeRepository->find($id) ;
            $grade->setStudentName($body['studentName']);
            $grade->setScore($body['score']);
            $grade->setSubject($body['subject']);
            $grade->setCreatedAt(new \DateTimeImmutable());

            $entityManagerInterface->persist($grade);
            $entityManagerInterface->flush();

            return $this->json('El registro se ha actualizado correctamente');

        } catch (\Throwable $th) {
            return $this->json($th->getMessage());
        }
    }

    #[Route('/destroy/{id}', name: 'destroy',methods:'POST')]
    public function destroy($id, EntityManagerInterface $entityManagerInterface, GradeRepository $gradeRepository): JsonResponse {
        try {

            $grade = $gradeRepository->find($id) ;

            $entityManagerInterface->remove($grade);
            $entityManagerInterface->flush();

            return $this->json('El registro se ha eliminado correctamente');

        } catch (\Throwable $th) {
            return $this->json($th->getMessage());
        }
    }
}
