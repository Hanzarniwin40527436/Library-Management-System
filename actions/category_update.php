<?php

include('../vendor/autoload.php');

use Database\MySQL;
use Database\Category;

$id = $_POST['id'];
$name = $_POST['category'];

$table = new Category(new MySQL());
if($table){
    $table->update($id, $name);
    header('location: ../admin_ui/view_category.php');
}
