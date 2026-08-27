<?php


$config = require "config.php";
$db = new Database($config['database']);

$heading = "Create a note";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $errors = [];

    if(strlen($_POST['body']) === 0) {
        $errors['body'] = 'Body is required';
    }

    if(strlen($_POST['body']) > 1000) {
        $errors['body'] = 'Too many characters, max 1000';
    }

    if(empty($errors)) {
        $db->query('INSERT INTO notes(body, user_id) VALUES(:body, :user_id)', [
            'body' => $_POST['body'],
            'user_id' => 1
        ]);
    } 
}


require ("view/note-create.view.php");