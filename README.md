# inscripciones
Inscripcion de alumnos para cursos

Clonar el repositorio con git clone
Copie el archivo .env.example a .env y edite las credenciales de la base de datos allí
Ejecutar composer install
Ejecute php artisan key:generate
Ejecute php artisan migrate --seed (tiene algunos datos seed para su testing)
php artisan passport:client --personal
Eso es todo: abre la URL principal.
Puede iniciar sesión en el panel de administración yendo a / URL de inicio de sesión e iniciar sesión con las credenciales 
Usuario: admin@admin.com
Password: password



Database Schema

![modelo](https://user-images.githubusercontent.com/58869926/155495868-425f3a44-1010-467b-89af-627f16e1d57b.jpg)

Capturas de imagenes del Frontend

![Image17](https://user-images.githubusercontent.com/58869926/155534779-133b6c83-6b03-4227-b54c-a192e8d3a11e.jpg)
![Image20](https://user-images.githubusercontent.com/58869926/155534786-e8eb42ef-2ba1-4b7a-841c-a0f1e679cb61.jpg)
![Image22](https://user-images.githubusercontent.com/58869926/155534788-68f339aa-a471-4635-a07f-c41d227e7dfd.jpg)
![Image24](https://user-images.githubusercontent.com/58869926/155534790-49200440-6409-4c07-82ab-a478b027fa52.jpg)

Capturas de imagenes del Backend

![Image5](https://user-images.githubusercontent.com/58869926/155495904-398c1962-9ff2-4917-ae57-111d5a1edd76.jpg)
![Image7](https://user-images.githubusercontent.com/58869926/155495911-57d8d5bf-6f79-4744-a979-dbbeb404b37f.jpg)
![Image9](https://user-images.githubusercontent.com/58869926/155495917-4e211af4-dd0e-4278-bd11-e10b9ec0354c.jpg)

API REST

Obtenemos el token con el endpoint /api/auth/login
En el body:
{
    "email": "admin@admin.com",
    "password": "password",
    "name": "admin"
}

![token](https://user-images.githubusercontent.com/58869926/155538651-19257c7d-1490-428b-b167-ca5ed82b7160.jpg)

![Image12](https://user-images.githubusercontent.com/58869926/155495940-4c8d42ca-25fc-4e2b-a312-c332ca12a13a.jpg)

Ingresamos el token obtenido anteriormente
Ruta
auth:api   |
|        | GET|HEAD  | api/v1/enrollments/{enrollment}     | enrollments.show              | App\Http\Controllers\Api\V1\Admin\EnrollmentsApiController@show  


![token2](https://user-images.githubusercontent.com/58869926/155540493-47b1c2c4-b34a-44da-af3f-66169265c111.jpg)

http://test.com/api/v1/enrollments/4

{
    "data": {
        "id": 4,
        "status": "accepted",
        "created_at": "2022-02-24T14:09:08.000000Z",
        "updated_at": "2022-02-24T14:09:08.000000Z",
        "deleted_at": null,
        "user_id": 4,
        "course_id": 4,
        "user": {
            "id": 4,
            "name": "Diego",
            "email": "diego22@hotmail.com",
            "email_verified_at": null,
            "created_at": "2022-02-24T08:37:40.000000Z",
            "updated_at": "2022-02-24T08:37:40.000000Z",
            "deleted_at": null
        },
        "course": {
            "id": 4,
            "name": "Curso de HTML5",
            "description": "Aprenda lo basico en 3 meses",
            "created_at": "2022-02-24T13:29:19.000000Z",
            "updated_at": "2022-02-24T13:29:19.000000Z",
            "deleted_at": null,
            "photo": null,
            "media": []
        }
    }
}
