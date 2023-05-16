<?php

include('../vendor/autoload.php');

use Database\MySQL;
use Database\Student;
//use Database\Author;
//use Database\Book;

$st_tbl = new Student(new MySQL());
$students = $st_tbl->getAll();

$id = $_GET['id'];
$st_tbl = new Student(new MySQL());
$student = $st_tbl->fetchOne($id);

//$aut_tbl = new Author(new MySQL());
//$authors = $aut_tbl->getAll();

// $student_id = $_GET['student_id'];
// $student_tbl = new Student(new MySQL());
// $student = $student_tbl->fetchOne($student_id);
// print_r($book);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- ------------------- Bootstrap ---------------- -->
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <title>Document</title>
    <style>
        .wrap {
            width: 100%;
            max-width: 600px;
            margin: 20px auto;
        }
        .card{
            box-shadow: rgba(0, 0, 0, 0.2) 0px 12px 28px 0px, rgba(0, 0, 0, 0.1) 0px 2px 4px 0px, rgba(255, 255, 255, 0.05) 0px 0px 0px 1px inset;
        }
    </style>
</head>

<body class="text-center" style="background-color: #fe8181;">
    <div class="wrap">
        <div class="card ps-4 pe-4">
            <div class="card-body">
                <h1 class="h4 mb-3">Update Student</h1>
                <form action="../actions/student_update.php" method="POST" enctype="multipart/form-data">
                    <input type="text" name="student_id" class="form-control mb-2" placeholder="" required value="<?= $student->student_id?>">
                    <input type="text" name="name" class="form-control mb-2" placeholder="" required value="<?= $student->name?>">
                    <input type="text" name="batch" class="form-control mb-2" placeholder="" required value="<?= $student->batch?>">
                    <input type="text" name="year" class="form-control mb-2" placeholder="" required value="<?= $student->year?>">
                    <input type="text" name="email" class="form-control mb-2" placeholder="" required value="<?= $student->email?>">
                    
                    <input type="hidden" name="id" value="<?= $student->id?>">
                    <button class="btn w-100" style="background-color: #fe8181;color:#fff;">UPDATE</button>
                </form>
            </div>
        </div>
    </div>
</body>

</html>