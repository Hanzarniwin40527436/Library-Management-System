<?php

include('../vendor/autoload.php');

use Database\MySQL;
use Database\Book;

$table = new Book(new MySQL());
if(isset($_POST['id'])){
    $id = $_POST['id'];
    $table->delete($id);
}