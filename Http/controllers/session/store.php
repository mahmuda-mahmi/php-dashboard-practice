<?php

use Core\Authenticator;
use Core\Session;
use Http\Forms\LoginForm;

$email = $_POST['email'];
$password = $_POST['password'];

//validate the form inputs

$form = LoginForm::validate($attributes = [
    'email' => $_POST['email'],
    'password' => $_POST['password']
]);

// $form = new LoginForm();

if((new Authenticator)->attempt($attributes['email'], $attributes['password'])){
    redirect('/');
}

$form->error('email', "No matching account found for that email address and password");


Session::flash('errors', $form->errors());

// below lines are just added
Session::flash('old', [
    'email' => $_POST['email']
]);

return redirect('/login');