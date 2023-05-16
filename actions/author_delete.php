<?php

include('../vendor/autoload.php');

use Database\MySQL;
use Database\Author;

$table = new Author(new MySQL());
if(isset($_POST['id'])){
    $id = $_POST['id'];
    $table->delete($id);
}