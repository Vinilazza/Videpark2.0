First configuration
composer install
php artisan migrate


* Rodar servidoor
php artisan serve

copy .env.example .env
php artisan key:generate

.env config

DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=videpark
DB_USERNAME=root
DB_PASSWORD=vinicris