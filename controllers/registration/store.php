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
    return view('registration/create.view.php', [
        'errors' => $errors
    ]);
}

// check if account already exist
$db = App::resolver(Database::class);

$user = $db->query('SELECT * FROM users WHERE email = :email', [
    ':email' => $email
])->fetchOne();

if($user){
    header('Location: /');
    exit();
}else {
    $db->query('INSERT INTO users(email, password) VALUES (:email, :password)', [
        ':email' => $email,
        ':password' => $password
    ]);

    $_SESSION['user'] = [
        'email' => $email
    ];

    header('Location: /');
    exit();
}

