<?php

use Core\App;
use Core\Database;
use Core\Validator;
use Core\Authenticator;

$db = App::resolve(Database::class);

$email = $_POST['email'];
$password = $_POST['password'];

//validate the form inputs
$errors = [];

if(!Validator::email($email)) {
    $errors['email'] = "Please provide valid email address";
}

if(!Validator::string($password, 7, 255)) {
    $errors['password'] = "Please provide a password of at least seven characters";
}

if(!empty($errors)) {
    return view('registration/create.view.php', [
        'errors' => $errors
    ]);
    exit();
}

// check if an account already exists with the provided email
$user = $db ->query('select * from users where email = :email', [
    'email' => $email
])->find();

if($user) {
    // someone with this email already exists
    // if yes, redirect to login page
    header('location: /');
    exit();
} else {
    // if not, save one to database and log the user in and then redirect
    $db->query('INSERT INTO users(email, password) VALUES(:email, :password)', [
        'email' => $email,
        'password' => password_hash($password, PASSWORD_BCRYPT)
    ]);

    //mark the user has logged in
    (new Authenticator)->login($user);

    header('location: /');
    exit();
}