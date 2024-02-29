<?php

use Core\App;
use Core\Database;
use Core\Validator;

$email = $_POST['email'];
$password = $_POST['password'];

// validate fields
$errors = [];
if(!Validator::email($email)){
    $errors['email'] = "Please enter a valid email address";
}

if(!Validator::string($password, 7, 255)){
    $errors['password'] = "Please enter a password with at least 7 characters";
}

if(count($errors)){
    return view('session/create.view.php', [
        'errors' => $errors
    ]);
}

$db = App::resolver(Database::class);

$user = $db->query('SELECT * FROM users WHERE email = :email', [
    ':email' => $email
])->fetchOne();

if($user){
    if(password_verify($password, $user['password'])){
        login([
            'email' => $email
        ]);

        header('Location: /');
        exit();
    }
}

return view('session/create.view.php', [
    'error' => 'No matching account found for that email address and password.'
]);