<?php

include('../vendor/autoload.php');

use Database\MySQL;
use Database\Book;
use Database\Author;
use Database\Category;
use Database\Request;
use Database\Student;
use Helpers\Auth;

$auth = Auth::admin();

$tbl_book = new Book(new MySQL());
$tbl_author = new Author(new MySQL());
$tbl_category = new Category(new MySQL());
$tbl_request = new Request(new MySQL());
$tbl_student = new Student(new MySQL());

$books = $tbl_book->getAll();
$authors = $tbl_author->getAll();
$categories = $tbl_category->getAll();
$last_five = $tbl_book->lastFive();
$request = $tbl_request->dailyRequest();
$issued = $tbl_request->dailyIssued();
$return = $tbl_request->dailyReturn();
$student = $tbl_student->getAll();
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
    <title>Admin Dashboard</title>
</head>

<body>
    <!-- ------------------- Sidebar ------------------ -->
    <?php include('sidebar.php') ?>

    <!-- ------------------- Dashboard ----------------- -->
    <main>
        <div class="container-fluid m-0 p-4">
            <div class="row">
                <div class="col-12">
                    <div class="header">Admin Dashboard</div>
                </div>
            </div>
            <div class="row flex-coloum flex-lg-row mt-3">
                <div class="col-lg-3 col-md-3 col-sm-6">
                    <div class="card active mb-3">
                        <div class="card-body d-flex justify-content-around">
                            <div class="card-info">
                                <h3 class="card-title h2">
                                    <?= count($books)?>
                                </h3>
                                <span>
                                    Total Books
                                </span>
                            </div>
                            <div class="icons pt-3">
                                <i class='bx bxs-book-bookmark'></i>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-3 col-sm-6">
                    <div class="card active mb-3">
                        <div class="card-body d-flex justify-content-around">
                            <div class="card-info">
                                <h3 class="card-title h2">
                                    <?= count($authors)?>
                                </h3>
                                <span>
                                    Total Authors
                                </span>
                            </div>
                            <div class="icons pt-3">
                                <i class='bx bxs-pen'></i>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-3 col-sm-6">
                    <div class="card active mb-3">
                        <div class="card-body d-flex justify-content-around">
                            <div class="card-info">
                                <h3 class="card-title h2">
                                    <?= count($categories)?>
                                </h3>
                                <span>
                                    Total Categories
                                </span>
                            </div>
                            <div class="icons pt-3">
                                <i class='bx bxs-category-alt'></i>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-3 col-sm-6">
                    <div class="card active mb-3">
                        <div class="card-body d-flex justify-content-around">
                            <div class="card-info">
                                <h3 class="card-title h2">
                                    <?= count($student)?>
                                </h3>
                                <span>
                                    Total Students
                                </span>
                            </div>
                            <div class="icons pt-3">
                                <i class='bx bxs-graduation'></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="header">Daily</div>
                </div>
            </div>
            <div class="row flex-coloum flex-lg-row mt-3">
                <div class="col-lg-4 col-md-4 col-sm-4">
                    <div class="card active mb-3">
                        <div class="card-body d-flex justify-content-around">
                            <div class="card-info">
                                <h3 class="card-title h2">
                                    <?= count($request)?>
                                </h3>
                                <span>
                                    Total Requests
                                </span>
                            </div>
                            <div class="icons pt-3">
                                <i class='bx bx-question-mark'></i>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-4 col-sm-4">
                    <div class="card active mb-3">
                        <div class="card-body d-flex justify-content-around">
                            <div class="card-info">
                                <h3 class="card-title h2">
                                    <?= count($issued)?>
                                </h3>
                                <span>
                                    Total Issued
                                </span>
                            </div>
                            <div class="icons pt-3">
                                <i class='bx bx-loader'></i>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-4 col-sm-4">
                    <div class="card active mb-3">
                        <div class="card-body d-flex justify-content-around">
                            <div class="card-info">
                                <h3 class="card-title h2">
                                    <?= count($return)?>
                                </h3>
                                <span">
                                    Total Returns
                                    </span>
                            </div>
                            <div class="icons pt-3">
                                <i class='bx bx-check'></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row flex-column flex-lg-row mt-3">
                <!-- <div class="col-lg-6 col-md-6 col-sm-6">
                    <div class="header mb-1">Popular Books</div>
                    <div class="card mb-3" style='height: 470px'>
                        <div class="card-body">
                            <div>
                                <canvas id="myChart"></canvas>
                            </div>
                        </div>
                    </div>
                </div> -->
                <div class="col-lg-12 col-md-12 col-sm-12">
                    <div class="header mb-1">Last Five New Books</div>
                    <div class="card mb-3" style='height: 300px'>
                        <div class="card-body">
                            <table class="table">
                                <tr>
                                    <th>ID</th>
                                    <th>Title</th>
                                    <th>Author</th>
                                    <th>Category</th>
                                </tr>
                                <?php $no=1;?>
                                <?php foreach($last_five as $one_book):?>
                                <tr>
                                    <td><?= $no++?></td>
                                    <td><?= $one_book->title?></td>
                                    <td><?= $one_book->author?></td>
                                    <td><?= $one_book->category?></td>
                                </tr>
                                <?php endforeach?>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"
        integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
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


    const ctx = document.getElementById('myChart').getContext('2d');
    const myChart = new Chart(ctx, {
        type: 'bar',
        data: {
            labels: ['Quickstart Python', 'How Linux Works', 'Python Crash Course', 'Ethical Hacking',
                'Design Patterns'
            ],
            datasets: [{
                label: 'Popular Books',
                data: [12, 3, 5, 2, 3],
                backgroundColor: [
                    'rgba(255, 99, 132, 0.2)',
                    'rgba(255, 206, 86, 0.2)',
                    'rgba(75, 192, 192, 0.2)',
                    'rgba(153, 102, 255, 0.2)',
                    'rgba(255, 159, 64, 0.2)'
                ],
                borderColor: [
                    'rgba(255, 99, 132, 1)',
                    'rgba(255, 206, 86, 1)',
                    'rgba(75, 192, 192, 1)',
                    'rgba(153, 102, 255, 1)',
                    'rgba(255, 159, 64, 1)'
                ],
                borderWidth: 1
            }]
        },
        options: {
            scales: {
                y: {
                    beginAtZero: true
                }
            }
        }
    });
    </script>
</body>

</html>