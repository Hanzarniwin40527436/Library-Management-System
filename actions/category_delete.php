<?php

include('../vendor/autoload.php');

use Database\MySQL;
use Database\Category;

$table = new Category(new MySQL());
if(isset($_POST['id'])){
    $id = $_POST['id'];
    $table->delete($id);
}