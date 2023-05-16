<?php
session_start();
include('../vendor/autoload.php');

use Database\MySQL;
use Database\Student;

$email = $_POST['email'];
$password = $_POST['password'];
$table = new Student(new MySQL());
$student = $table->findByEmailAndPasword($email, $password);

if ($student) {
    $_SESSION['students'] = $student;
    header('location: ../student_ui/std_technology_view.php');
} else {
    header('location: ../Login_ui/Studentlogin.php');
}
