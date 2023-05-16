<?php

include('../vendor/autoload.php');

use Database\MySQL;
use Database\Student;

$table = new Student(new MySQL());
if(isset($_POST['id'])){
    $id = $_POST['id'];
    $table->delete($id);
}