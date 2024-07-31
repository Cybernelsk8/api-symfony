# Proyecto CRUD de Notas con Symfony 6 y PHP 8.1

Este proyecto es una API desarrollada utilizando Symfony 6 para manejar un CRUD (Create, Read, Update, Delete) de notas. Es la primera vez que trabajo con Symfony, y este proyecto me ha permitido familiarizarme con sus características y funcionalidades.

## Descripción del Proyecto

El objetivo de este proyecto es proporcionar una API que permita crear, leer, actualizar y eliminar notas. A través de este proyecto, he aprendido a configurar un entorno de desarrollo con Symfony y a construir endpoints para manejar operaciones CRUD.

## Tecnologías Utilizadas

- **Symfony 6**: Framework de PHP para el desarrollo de aplicaciones web.
- **Doctrine**: ORM (Object-Relational Mapping) para manejar la base de datos.
- **MariaDB**: Base de datos utilizada para almacenar las notas.

## NOTA IMPORTANTE
- Para evitar levantar el servidor de symfony con `symfony server:start` se agrego un archivo `.htaccess` en la cual se redirigen las peticiones al index ubicado en la carpeta public, basta con modificar el nombre del directorio del proyecto que se encuentra dentro
de dicho archivo para que funcione ingresando a la direccion: `http://localhost/{el proyecto}/public/`.
De LEVANTAR el servidor de symfony entonces en el APP DE FRONT END en su archivo `.env.local` modificar la llave `VITE_API_URL={url que de el servidor de symfony }`.

## Nota
Como este es el primer contacto que tengo con el FrameWork de Symfony tambien cree un proyecto api con LARAVEL 10 para demostrar mis habilidades y capacidades en el siguiente repositorio:
  ```bash
    git clone https://github.com/Cybernelsk8/api-laravel-emetra.git
  ```
Todo lo que necesitas para ejecutar el proyecto esta explicado en el README del mismo.

## Instalación

Para ejecutar este proyecto localmente, sigue estos pasos:

1. Clona el repositorio:
    ```bash
    git clone https://github.com/Cybernelsk8/api-symfony.git
    ```

2. Navega al directorio del proyecto:
    ```bash
    cd tu-repositorio
    ```

3. Instala las dependencias:
    ```bash
    composer install
    ```

4. Configura el archivo `.env` con tus credenciales de base de datos.

5. Ejecuta las migraciones para crear las tablas en la base de datos:
    ```bash
    php bin/console doctrine:migrations:migrate
    ```

6. Inicia el servidor de desarrollo:
    ```bash
    symfony server:start
    ```

## Endpoints

La API proporciona los siguientes endpoints para manejar las notas:

- **GET /grade/index**: Obtener todas las notas.
- **GET /grade/show{id}**: Obtener una nota por ID.
- **POST /grade/store**: Crear una nueva nota.
- **POST /grade/update/{id}**: Actualizar una nota existente.
- **POST /grade/destroy/{id}**: Eliminar una nota por ID.

## Aprendizajes y Retos

- **Configuración con Symfony**: Aprendí a configurar un nuevo proyecto con Symfony, incluyendo la configuración de base de datos y la creación de entidades.
- **Controladores y Rutas**: Me familiaricé con la creación de controladores y rutas en Symfony para manejar las solicitudes HTTP.
- **Primer Contacto**: Al ser mi primera vez con Symfony, hubo una curva de aprendizaje, especialmente en la configuración del ORM y la creación de migraciones.

## Próximos Pasos

- **Añadir autenticación**: Planeo implementar un sistema de autenticación para asegurar los endpoints de la API.
- **Mejorar la validación**: Incorporar validaciones más robustas para los datos de entrada en los endpoints.
- 
¡Gracias por revisar mi proyecto!
