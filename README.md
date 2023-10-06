# php_mvc_note
Understanding MVC in PHP

## Using Laracast's introduction to PHP course
- Class
- Namespace
- Autoloading using the standard PHP library
- Extraction
- Routes and Router
- Controllers
- Handling HTTP Requests
- Service Container
- Composer
- Testing
- Code refactoring
- SQL
- PDO

## Note
After cloning, create a config.php at the root directory with these contents. 
You can use the parameters from your Database.

```php
<?php
return  [
    'database'=> [
        'dbname' => 'myapp',
        'host' => '127.0.0.1',
        'port' => 3306,
        'charset' => 'utf8mb4'
    ]
];
```
