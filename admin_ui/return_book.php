<?php

include('../vendor/autoload.php');

use Database\MySQL;
use Database\ReturnBook;
use Helpers\Auth;

$auth = Auth::admin();

$table = new ReturnBook(new MySQL());
$all = $table->return();

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
    <title>Return Books</title>
    <style>
    .card {
        box-shadow: rgba(0, 0, 0, 0.2) 0px 12px 28px 0px, rgba(0, 0, 0, 0.1) 0px 2px 4px 0px, rgba(255, 255, 255, 0.05) 0px 0px 0px 1px inset;
    }

    .text span,
    .data span {
        display: block;
        margin-bottom: 6px;
        font-weight: bold;
    }
    </style>
</head>

<body>

    <!-- ------------------- Sidebar ------------------ -->
    <?php include('sidebar.php') ?>

    <!-- ------------------- Main --------------------- -->
    <main>
        <div class="container-fluid m-0 p-4">
            <div class="row mt-2 mb-4">
                <div class="col">
                    <h2>
                        Total Return
                        <span class="badge bg-success text-white">
                            <?= count($all) ?>
                        </span>
                    </h2>
                </div>
            </div>
            <div class="row">
                <?php foreach ($all as $return) : ?>
                    <div class="col-12 mb-3">
                        <div class="card">
                            <div class="card-body d-flex">
                                <div class="img" style="width: 18%;">
                                    <img src="../images/<?= $return->cover ?>" style="width: 100%;height:100%;" alt="">
                                </div>
                                <div class="text d-flex mt-1">
                                    <div class="name ms-5 me-3">
                                        <span>Issued Student ID :</span>
                                        <span>Student Name :</span>
                                        <span>Book ID :</span>
                                        <span>Book Name :</span>
                                        <span>Approve By :</span>
                                        <span>Request Date :</span>
                                        <span>Issued Date :</span>
                                        <span>Due Date :</span>
                                        <span>Return Date :</span>
                                    </div>
                                    <div class="data">
                                        <span><?= $return->sid ?></span>
                                        <span><?= $return->sname ?></span>
                                        <span><?= $return->isbn ?></span>
                                        <span><?= $return->title ?></span>
                                        <span><?= $return->admin ?></span>
                                        <span><?= $return->request ?></span>
                                        <span><?= $return->issued ?></span>
                                        <span><?= $return->due ?></span>
                                        <span><?= $return->return_date ?></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php endforeach ?>
            </div>
        </div>
    </main>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="../js/bootstrap.min.js"></script>
    <script>
        $(document).ready(function() {
            $('.sub-btn').click(function() {
                $(this).next('.sub-menu').slideToggle();
                $(this).find('.bx-chevron-right').toggleClass('rotate')
            });
            $('.bx-menu').click(function() {
                $('.sidebar').toggleClass('active');
            });
        });
    </script>
</body>

</html>