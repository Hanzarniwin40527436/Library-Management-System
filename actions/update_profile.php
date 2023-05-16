<?php
include('../vendor/autoload.php');
use Database\MySQL;
use Database\Student;
use Helpers\AUTH;


$auth = Auth::student();
$name = $_FILES['profile']['name'];
$tmp = $_FILES['profile']['tmp_name'];

$error = $_FILES['profile']['error'];

$type = $_FILES['profile']['type'];

$table = new Student(new MySQL());

if($table){
    $table->update($name,$auth->id );
    move_uploaded_file($tmp,"../images/$name");

    header('location: ../student_ui/profile.php');
}


if($type === "image/jpeg" or $type === "image/png") {
    $table->update($auth->id, $name);
    $auth->profile_img = $name;
    header('location: ../student_ui/profile.php');
   } else {
    header('location: ../student_ui/profile.php', "error=type");
   }

   