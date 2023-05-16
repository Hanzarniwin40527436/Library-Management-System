<?php

include('../vendor/autoload.php');

use Database\MySQL;
use Database\Request;
use Helpers\Auth;

$auth = Auth::student();
$table = new Request(new MySQL());
$all = $table->issueoutput($auth->id);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- ------------------- Boxicon ------------------ -->
    <link href='https://unpkg.com/boxicons@2.1.2/css/boxicons.min.css' rel='stylesheet'>
    <!-- ------------------- css file ----------------- -->
    <link rel="stylesheet" href="../css/admin.css">
    <!-- ------------------- Bootstrap ---------------- -->
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <title>Issued Books</title>
    <style>
        .card {
            box-shadow: rgba(0, 0, 0, 0.2) 0px 12px 28px 0px, rgba(0, 0, 0, 0.1) 0px 2px 4px 0px, rgba(255, 255, 255, 0.05) 0px 0px 0px 1px inset;
        }

        .text span,
        .data span {
            display: block;
            margin-bottom: 6px;
            font-weight: bold;
            line-height: 40px;
        }
    </style>
</head>

<body>
    <div style="padding-left: 25px; padding-right: 25px;">
        <div class="container-fluid m-0 p-4">
            <div class="row mt-2 mb-4">
                <div class="col-6">
                    <h2>
                        Total Issued
                        <span class="badge bg-success text-white">
                            <?= count($all) ?>
                        </span>
                    </h2>
                </div>
                <div class="col-6 d-flex justify-content-end">
                    <a class="btn btn-secondary" href="../student_ui/profile.php" style="width:100px;height:40px;background-color: #df5e5e;">
                        Back</a>
                </div>
            </div>
            <div class="row">
                <?php foreach ($all as $issue) : ?>
                    <div class="col-12 mb-3">
                        <div class="card">
                            <div class="card-body d-flex">
                                <div class="img" style="width: 18%;">
                                    <img src="../images/<?= $issue->cover ?>" style="width: 100%;height:100%;" alt="">
                                </div>
                                <div class="text d-flex mt-3">
                                    <div class="name ms-5 me-3">
                                        <span>Student ID :</span>
                                        <span>Student Name :</span>
                                        <span>Book ID :</span>
                                        <span>Book Titile :</span>
                                        <span>Issue Date :</span>
                                        <span>Due Date :</span>
                                    </div>
                                    <div class="data">
                                        <span><?= $issue->sid ?></span>
                                        <span><?= $issue->sname ?></span>
                                        <span><?= $issue->bid ?></span>
                                        <span><?= $issue->title ?></span>
                                        <span><?= $issue->issue_date ?></span>
                                        <span><?= $issue->due_date ?></span>
                                    </div>


                                </div>

                            </div>

                        </div>
                    </div>
                <?php endforeach ?>

            </div>
        </div>
    </div>
</body>

</html>