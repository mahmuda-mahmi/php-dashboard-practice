<?php

use Core\Validator;
use Core\App;
use Core\Database;

$db = App::resolve(Database::class);

$errors = [];

if(! Validator::string($_POST['body'], 1, 1000)) {
        $errors['body'] = 'No more than 1000 characters are allowed';
}

if(! empty($errors)) {
    return view('notes/create.view.php', [
                'heading' => 'Create a note',
                'errors' => $errors
            ]);
}
$db->query('INSERT INTO notes(body, user_id) VALUES(:body, :user_id)', [
        'body' => $_POST['body'],
        'user_id' => 1
        // 'user_id' => $_SESSION['user']['id'] // checking
    ]);
    header('location: /notes');
    die();