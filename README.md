# Repositorio de achivos para la Facultad de Ciencias Exactas - UNSa

Proyecto de Laravel 5.8

Instalaciones previas

Git -> https://gitforwindows.org/

Composer -> https://getcomposer.org/download/

PHP version 7.1.3 o mayor.

Base de Datos: MYSQL (Recomendada)

PASOS DE DESCARGA DE PROYECO EN MI PC

1 -En GitHub
    
    1.1 - Hacer un "fork" al a mi repositorio
    
    1.2 - presionar el "Clone o downland" (https://github.com/[mi_cuenta]/repositorio.git)
    
2 - En Git Bash (PC)
    
    2.1 - cd /c/xampp/htdocs/
    
    2.2 - git clone https://github.com/[mi_cuenta]/repositorio.git
    
    2.3 - cd repositorio
    
    2.4 - composer update
    
    2.5 - cp .env.example .env
    
    2.6 - php artisan key:generate
    
3 - Crear una base de datos en nuestra PC para el proyecto

4 - Modificaciones en el Archivo .evn
    
    DB_CONNECTION=mysql //Tipo de base de datos
    
    DB_HOST=127.0.0.1   //Hots de la base de datos
    
    DB_PORT=3306        //Puerto de la base de datos
    
    DB_DATABASE=my_DB   //Nombre de la base de datos creada para el proyoyecto
    
    DB_USERNAME=root    //Usuario de la base de datos
    
    DB_PASSWORD=        //Clave de la base de datos
    
5 - Ejecutamos Migraciones para crear Tablas (Volvemos a Git)
    
    5.1 - php artisan migrate --seed
    
6 - Ejecutamos nuestro proyecto en un navegador 
    
    6.1 - Prendemos Apache y MySQL
    
    6.2 - http://localhost/repositorio/public/

Todos los derechos reservados!!!
