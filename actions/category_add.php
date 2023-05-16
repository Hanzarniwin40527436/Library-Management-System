<?php

include('../vendor/autoload.php');

use Database\MySQL;
use Database\Category;

$data = ['name' => $_POST['category']];

$table = new Category(new MySQL());

if($table){
    $table->create($data);
    header('location: ../admin_ui/view_category.php');
}