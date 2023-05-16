<?php

include('../vendor/autoload.php');

use Database\MySQL;
use Database\Author;

$id = $_POST['id'];
$name = $_POST['author'];

$table = new Author(new MySQL());
if($table){
    $table->update($id, $name);
    header('location: ../admin_ui/view_author.php');
}
