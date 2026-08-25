<?php

require ("functions.php"); 
require ("Database.php");

// require "router.php";

$config = require "config.php";

$db = new Database($config['database']);

$id = $_GET['id'];

$query = "select * from posts where id = :id";


$posts = $db->query($query, ['id' => $id])->fetch(); //uppercase means that this is not an instant it is an constant;

dd($posts);


// foreach($posts as $post) {
//     echo "<li>" . $post['title'] . "</li>";
// }