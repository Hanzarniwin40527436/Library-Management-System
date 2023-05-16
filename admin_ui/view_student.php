<?php

include('../vendor/autoload.php');

use Database\MySQL;
use Database\Student;

$table = new Student(new MySQL());
$limit = 7;
$page = isset($_GET['page']) ? $_GET['page'] : 1;
$start = ($page - 1) * $limit;
$all = $table->getAll();

$search = isset($_POST['student']) ? $_POST['student'] : null;

$pagination = $table->pagination($search, $start, $limit);

$total = count($all);
$pages = ceil($total / $limit);

$previous = $page - 1;
$next = $page + 1;

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
    <title>View Students</title>
    <style>
        .card {
            box-shadow: rgba(0, 0, 0, 0.2) 0px 12px 28px 0px, rgba(0, 0, 0, 0.1) 0px 2px 4px 0px, rgba(255, 255, 255, 0.05) 0px 0px 0px 1px inset;
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
                <div class="col-6">
                    <h2>
                        Total Students
                        <span class="badge bg-success text-white">
                            <?= count($all) ?>
                        </span>
                    </h2>
                </div>
                <div class="col-6">
                    <div style="float:right" class="card">
                        <div class="card-body">
                            <form action="view_student.php" method="POST">
                                <div class="input-group">
                                    <input type="text" name="student" class="form-control" placeholder="Searching...">
                                    <button class="btn" style="background-color: #fe8181;color:#fff;">SEARCH</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

            <table id="mytable" class="table table-bordered table-striped">
                <tr>
                    <th>No</th>
                    <th>Student ID</th>
                    <th>Name</th>
                    <th>Batch</th>
                    <th>Year</th>
                    <th>Email</th>
                    <th>Password</th>
                    <th>Actions</th>
                </tr>
                <?php foreach ($pagination as $student) : ?>
                    <tr>
                        <td><?= ++$start ?></td>
                        <td><?= $student->student_id ?></td>
                        <td><?= $student->name ?></td>
                        <td><?= $student->batch ?></td>
                        <td><?= $student->year ?></td>
                        <td><?= $student->email ?></td>
                        <td><?= md5($student->password) ?></td>
                        <td>
                            <div class="btn-group">
                                <a href="../admin_ui/update_student.php?id=<?= $student->id ?>" class="btn btn-outline-primary"><i class='bx bxs-edit'></i> Edit</a>
                                <a href="#" data-id="<?= $student->id ?>" class="btn btn-outline-danger"><i class='bx bxs-trash'></i> Delete</a>
                            </div>
                        </td>
                    </tr>
                <?php endforeach ?>
            </table>
            <div class="row ">
                <div class="col d-flex justify-content-center">
                    <nav aria-label="Page navigation example">
                        <ul class="pagination">
                            <li class="page-item"><a class="page-link" href="view_student.php?page=<?= $previous ?>">Previous</a></li>
                            <?php for ($i = 1; $i <= $pages; $i++) : ?>
                                <li class="page-item">
                                    <a class="page-link" href="view_student.php?page=<?= $i ?>"><?= $i ?></a>
                                </li>
                            <?php endfor; ?>
                            <li class="page-item"><a class="page-link" href="view_student.php?page=<?= $next ?>">Next</a></li>
                        </ul>
                    </nav>
                </div>
            </div>
        </div>
    </main>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="../js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootbox.js/5.5.2/bootbox.min.js"></script>
    <script>
        $(document).ready(function() {
            $('.sub-btn').click(function() {
                $(this).next('.sub-menu').slideToggle();
                $(this).find('.bx-chevron-right').toggleClass('rotate')
            });
            $('.bx-menu').click(function() {
                $('.sidebar').toggleClass('active');
            });
            $('.btn-outline-danger').click(function(e) {
                var deleteid = $(this).data('id');
                console.log(deleteid)
                bootbox.confirm('Do you really want to delete?', function(result){
                    if(result){
                        $.ajax({
                            url: '../actions/student_delete.php',
                            type: 'post',
                            data: {id: deleteid},
                            success: function(){
                                location.reload();
                            }
                        })
                    }
                })
            })
        });
    </script>
</body>

</html>