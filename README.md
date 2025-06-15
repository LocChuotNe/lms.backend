 ## Yêu cầu hệ thống
 
** PHP >=8.1
** Composer
** PHP My SQL
** MariaDB 11.x(11.2)
** Node.js >= 18x

Cấu hình package
- composer install or composer update

Cấu hình .env
-   DB_CONNECTION=mysql
    DB_HOST="MariaDB-11.2"
    DB_PORT=3306
    DB_DATABASE=laravel_lms
    DB_USERNAME=root
    DB_PASSWORD=

Tạo database và chạy migration
-    php artisan migrate --seed

Khởi động server: php artisan serve
