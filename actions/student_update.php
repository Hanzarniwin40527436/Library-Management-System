<?php

include('../vendor/autoload.php');

use Database\MySQL;
use Database\Student;
// use Helpers\Auth;
// $auth = Auth::check();


// $id = $_GET['id'];

$data = [
    'student_id' => $_POST['student_id'],
    'name' => $_POST['name'],
    'batch' => $_POST['batch'],
    'year' => $_POST['year'],
    'email' => $_POST['email'],
    'id' => $_POST['id']
];

//print_r($data); 
$table = new Student(new MySQL());
if($table){
    $table->updateStudent($data);
    header('location: ../admin_ui/view_student.php');
}
