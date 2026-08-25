<?php

require "functions.php";

// require "router.php";


// connect to our MySQL database.

class Person 
{
    public $name;
    public $age;

    public function breath() {
        echo $this -> name . " is breathing";
    }
}

$person = new Person();
$person->name = 'Kaiki';
$person->age = 20;

$person->breath();
