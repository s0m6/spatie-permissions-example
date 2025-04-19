# NOTES
- This project contains a small and simple permissions and role management system in the `spatie/permissions` package, which can be used as inspiration for Laravel projects.
- Prepared in Laravel 12 project
- Please check out the official documentation at https://spatie.be/docs/laravel-permission/v6/introduction
-----------------------------------------------
## steps to download laravel spatie/permissions package 
- It is preferable to have a starter kit for the authentication process, such as Breeze.
1. **Install Package**  
   ```bash
   composer require spatie/laravel-permission
   ```

2. **Add Provider (Optional)**  
   Add to `bootstrap/providers.php`:  
   ```php
   Spatie\Permission\PermissionServiceProvider::class
   ```

3. **Publish Migration & Config file**  
   ```bash
   php artisan vendor:publish --provider="Spatie\Permission\PermissionServiceProvider"
   ```
- This command  publishes a `config/permission.php` file ,and One migration file contains multiple tables `create_permission_tables.php`

4. **Run Migrations**  
   ```bash
   php artisan migrate
   ```

5. **Register Middlewares**  
   Add to `bootstrap/app.php`:  
   ```php
   $middleware->alias([
       'role' => \Spatie\Permission\Middleware\RoleMiddleware::class,
       'permission' => \Spatie\Permission\Middleware\PermissionMiddleware::class,
       'role_or_permission' => \Spatie\Permission\Middleware\RoleOrPermissionMiddleware::class,
   ]);
   ```

6. **Add Trait to User Model**  
   In your `User` model class:  
   ```php
   use HasRoles;
   ```