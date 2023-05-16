<?php
include('../vendor/autoload.php');
use Database\MySQL;
use Database\Student;

$data = [
    'student_id' => $_POST['student_id'],
    'name' => $_POST['name'],
    'year' => $_POST['year'],
    'batch' => $_POST['batch'],
    'email' => $_POST['email'],
    'password' => $_POST['password']
];


$table = new Student(new MySQL());

if($table){
    $table->create($data);
    header('location: ../Login_ui/Studentlogin.php');
}