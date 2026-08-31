<?php

use Core\Database;
// use Core\Response;

$config = require base_path("config.php");
$db = new Database($config['database']);


// $heading = "Note";
$currentUserId = 1; // This is a placeholder for the current logged-in user ID. In a real application, you would retrieve this from the session or authentication context.

$note = $db->query('SELECT * FROM notes where id = :id', [
    'id' => $_GET['id']
])->findOrFail();

authorize($note['user_id'] !== $currentUserId);

view('notes/show.view.php', [
    'heading' => 'Note',
    'note' => $note
]);