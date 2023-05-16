<?php

include('../vendor/autoload.php');

use Database\MySQL;
use Database\Author;
use Helpers\Auth;

$auth = Auth::admin();

$table = new Author(new MySQL());
$limit = 7;
$page = isset($_GET['page']) ? $_GET['page'] : 1;
$start = ($page - 1) * $limit;
$all = $table->getAll();

$pagination = $table->pagination($start,$limit);

$total = count($all);
$pages = ceil($total / $limit);

$previous = $page - 1;
$next = $page + 1;

if(isset($_GET['id'])){
    $id = $_GET['id'];
    $one_row = $table->fetchOne($id);
}

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
    <title>View Authors</title>
    <style>
        .wrap {
            width: 100%;
            max-width: 600px;
            margin: 20px auto;
        }

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
            <div class="row mb-3">
                <div class="col">
                    <div class="card">
                        <div class="card-body">
                            <form action="../actions/author_add.php" method="POST">
                                <div class="input-group">
                                    <input type="text" name="author" class="form-control" placeholder="Add New Author..." required>
                                    <button class="btn" style="background-color: #fe8181;color:#fff;">ADD</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <?php if(isset($one_row)): ?>
                    <div class="col">
                        <div class="card">
                            <div class="card-body">
                                <form action="../actions/author_update.php" method="POST">
                                    <div class="input-group">
                                        <input type="text" name="author" class="form-control" placeholder="Update Author..." required value="<?php if(isset($one_row)){ echo $one_row->name;}?>">
                                        <input type="hidden" name="id" value="<?php if(isset($one_row)){ echo $one_row->id;}?>">
                                        <button class="btn" style="background-color: #fe8181;color:#fff;">UPDATE</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                <?php endif ?>
            </div>
            <div class="row mt-2 mb-4">
                <div class="col">
                    <h2>
                        Total Authors
                        <span class="badge bg-success text-white">
                            <?= count($all) ?>
                        </span>
                    </h2>
                </div>
            </div>

            <table class="table table-bordered table-striped">
                <tr>
                    <th>No</th>
                    <th>Name</th>
                    <th>Actions</th>
                </tr>
                <?php foreach ($pagination as $author) : ?>
                    <tr>
                        <td><?= ++$start ?></td>
                        <td><?= $author->name ?></td>
                        <td>
                            <div class="btn-group">
                                <a href="view_author.php?id=<?= $author->id?>" class="btn btn-outline-primary"><i class='bx bxs-edit'></i> Edit</a>
                                <a href="#" data-id="<?= $author->id ?>" class="btn btn-outline-danger"><i class='bx bxs-trash'></i> Delete</a>
                            </div>
                        </td>
                    </tr>
                <?php endforeach ?>
            </table>
            <div class="row ">
                <div class="col d-flex justify-content-center">
                    <nav aria-label="Page navigation example">
                        <ul class="pagination">
                            <li class="page-item"><a class="page-link" href="view_author.php?page=<?= $previous ?>">Previous</a></li>
                            <?php for($i = 1; $i <= $pages; $i++):?>
                                <li class="page-item">
                                    <a class="page-link" href="view_author.php?page=<?= $i ?>"><?= $i ?></a>
                                </li>
                            <?php endfor; ?>
                            <li class="page-item"><a class="page-link" href="view_author.php?page=<?= $next ?>">Next</a></li>
                        </ul>
                    </nav>
                </div>
            </div>
        </div>
    </main>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
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
                            url: '../actions/author_delete.php',
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