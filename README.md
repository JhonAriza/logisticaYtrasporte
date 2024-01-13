CLONAR PROYECTO logisticaYtrasporte
1.git clone https://github.com/JhonAriza/logisticaYtrasporte.git

2.cd logisticaytrasporte

3.Instalar las dependencias del proyecto con: composer install

4.Configurar el archivo .env.example y dejarlo como .env y dentro colocar todas las variables de entorno de nuestro proyecto.

5.Creamos la base de datos para nuestro proyecto.

6.Generar una APP_KEY que es una llave para cada proyecto de Laravel se puede generar con este comando: php artisan key:generate

7.Generar las migraciones y ejecutar los seeders para nuestras tablas de base de datos con este comando: php artisan migrate --seed
