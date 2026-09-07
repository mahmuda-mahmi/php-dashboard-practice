<?php

use Core\Authenticator;
use Core\Session;
use Http\Forms\LoginForm;

$email = $_POST['email'];
$password = $_POST['password'];

//validate the form inputs

$form = new LoginForm();

if($form->validate($email, $password))
{
    if((new Authenticator)->attempt($email, $password)){
        redirect('/');
    }

    $form->error('email', "No matching account found for that email address and password");

}

// return view('session/create.view.php', [
//     'errors' => $form->errors()
// ]);

Session::flash('errors', $form->errors());

// $_SESSION['_flash']['errors'] = $form->errors();

return redirect('/login');
