# Repositorio de achivos para la Facultad de Ciencias Exactas - UNSa

Proyecto de Laravel 5.8

Instalaciones previas

Git -> https://gitforwindows.org/

Composer -> https://getcomposer.org/download/

PHP version 7.1.3 o mayor.

Base de Datos: MYSQL (Recomendada)
____________________________________________________________________________________________________________
PASOS DE DESCARGA DE PROYECO EN MI PC

1 -En GitHub
    
    1.1 - Hacer un "fork" al a mi repositorio
    1.2 - presionar el "Clone o downland" (https://github.com/[mi_cuenta]/repositorio.git)
    
2 - En Git Bash (PC)
    
    2.1 - cd /c/xampp/htdocs/
    2.2 - git clone https://github.com/[mi_cuenta]/repositorio.git
    2.3 - cd repositorio
    2.4 - composer update o composer install
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

____________________________________________________________________________________________________________
MANEJO DENTRO DEL PROYECTO

Por cada nueva tareas o funcinalidad crear una rama en el Git y Github
1 - En Github:

    1.1 - Presinar "Branch" y escribir el nombre de la nueva rama.
    1.2 - Presionar "Create branch: Nombre_rama" (con esto creamos una rama con todo lo que este en la rama actual)
    
2 - En Git (MI PC)
    
    1.1 - Nos ubicamos en nuetro repositorio
    2.2 - git checkout -b Nombre_rama

____________________________________________________________________________________________________________
CREAR ARCHIVOS EN EL PROYECTO

Crear un archivo de Migracion

    php artisan make:migration  create_NOMBRE_table --create=NOMBRE
    Nota: con el atributo –create=   podemos indicar como se llamará la tabla en la base de datos para esa migración.

Ejecutar migracion

    php artisan migrate Nombre

Crear Modelo

    php artisan make:model NombreModelo

Crear Contrlador

    php artisan make:controller NombreControlador
    
____________________________________________________________________________________________________________
SUBIR CAMBIOS A MI REPOSITORIO DE GITGUB (En Git)

Revisar que cambios realice

    git status
    
Crear un paquete con los archivos que quiero subir
    
    git add . // usar . para agregar todos los cambios, puede hacerlouno por uno
    
Crear un commit 

    git commit -b "Nombre_Commit"
    
subir al repositorio

    git push origin <branch>
    
____________________________________________________________________________________________________________
BAJAR CAMBIOS A MI REPOSITORIO A LA PC (En Git)

La forma más sencilla de actualizar el repositorio local es mediante el comando

    git pull

Podremos especificar a qué rama remota corresponde la rama local con el siguiente comando:

    git branch --set-upstream-to=origin/master master



Todos los derechos reservados!!
________________________________________________________________________
Lamas, Gabriel Adrian - Correo: lamasgabriel1992@gmail.com


