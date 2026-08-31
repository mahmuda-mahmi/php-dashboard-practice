<?php

require base_path('Validator.php');

$config = require base_path("config.php");
$db = new Database($config['database']);

$errors = [];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    

    $validator = new Validator();

    if(! Validator::string($_POST['body'], 1, 1000)) {
        $errors['body'] = 'No more than 1000 characters are allowed';
    }

    // if(strlen($_POST['body']) > 1000) {
    //     $errors['body'] = 'Too many characters, max 1000';
    // }

    if(empty($errors)) {
        $db->query('INSERT INTO notes(body, user_id) VALUES(:body, :user_id)', [
            'body' => $_POST['body'],
            'user_id' => 1
        ]);
    } 
}

view('notes/create.view.php', [
    'heading' => 'Create a note',
    'errors' => $errors
]);