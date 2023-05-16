<?php

include('../vendor/autoload.php');

use Database\MySQL;
use Database\Author;

$data = ['name' => $_POST['author']];

$table = new Author(new MySQL());

if($table){
    $table->create($data);
    header('location: ../admin_ui/view_author.php');
}