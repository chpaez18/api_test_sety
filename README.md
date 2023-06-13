Pasos a seguir para instalación
Correr en la consola los siguientes comandos:
- git clone https://github.com/chpaez18/api_test_sety.git
- dentro de la carpeta del proyecto: composer update
- configurar el archivo .env con los datos de la conexion a la BD
- php artisan key:generate
- php artisan migrate

Utilizar postman para correr la ruta

Method: POST
Path: /api/import

En la solapa body, enviar el archivo como form-data
el nombre del atributo debe ser: file


Revisar la tabla users.