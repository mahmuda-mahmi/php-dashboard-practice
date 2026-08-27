<?php

$config = require "config.php";
$db = new Database($config['database']);


$heading = "Notes";

$notes = $db->query('SELECT * FROM notes where user_id = 1')->get();


require "view/notes.view.php";