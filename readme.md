

# Laravel 5 PHP Framework

## Installer Composer
 https://getcomposer.org/doc/00-intro.md


 
## Via Composer Create-Project
 composer create-project --prefer-dist laravel/laravel demo
 ### Local Development Server 
   > php artisan serve
   http://localhost:8000/


## Via Laravel Installer
   composer global require "laravel/installer"

   ### Add in PATH environment variable
        PATH=%PATH%;%USERPROFILE%\AppData\Roaming\Composer\vendor\bin

   > laravel
   > laravel new laravel-tuto
   > cd laravel-tuto
   > php artisan serve
   http://localhost:8000/

   > php artisan route:list // show all routes
