 ## Yêu cầu hệ thống
 
PHP >=8.2
Composer
OS Panel Server 6.0.0
PHP My Admin
MariaDB 11.x(11.2)
Node.js >= 18x

## Cấu hình package
- composer install or composer update

Kiểm tra xem file .env tồn tại không, nếu không thì tạo file mới: cp .env.example .env
Cấu hình .env
-   DB_CONNECTION=mysql
    DB_HOST="MariaDB-11.2"
    DB_PORT=3306
    DB_DATABASE=laravel_lms
    DB_USERNAME=root
    DB_PASSWORD=

## Tạo database và chạy migration, nếu đã được thiết lập sẵn thì chạy 
-    php artisan migrate --seed

Khởi động server: php artisan serve
