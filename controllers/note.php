<?php

$config = require "config.php";
$db = new Database($config['database']);


$heading = "Note";
$currentUserId = 1; // This is a placeholder for the current logged-in user ID. In a real application, you would retrieve this from the session or authentication context.

$note = $db->query('SELECT * FROM notes where id = :id', [
    'id' => $_GET['id']
])->findOrFail();

authorize($note['user_id'] !== $currentUserId);


require "view/note.view.php";