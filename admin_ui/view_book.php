<?php

include('../vendor/autoload.php');

use Database\MySQL;
use Database\Book;
use Helpers\Auth;

$auth = Auth::admin();

$table = new Book(new MySQL());
$limit = 7;
$page = isset($_GET['page']) ? $_GET['page'] : 1;
$start = ($page - 1) * $limit;
$all = $table->getAll();

$pagination = $table->pagination($start, $limit);

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
    <title>View Books</title>
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
                        Total Books
                        <span class="badge bg-success text-white">
                            <?= count($all) ?>
                        </span>
                    </h2>
                </div>
                <div class="col-6">
                    <div style="float:right">
                        <a href='add_book.php' class="btn" style="background-color: #fe8181;color:#fff;"><i
                                class='bx bx-plus'></i> New Book</a>
                    </div>
                </div>
            </div>

            <table id="mytable" class="table table-bordered table-striped">
                <tr>
                    <th>No</th>
                    <th>ISBN</th>
                    <th>Title</th>
                    <th>Author</th>
                    <th>Category</th>
                    <th>No. of books</th>
                    <th>Publisher</th>
                    <th>Published date</th>
                    <th>Actions</th>
                </tr>
                <?php foreach ($pagination as $book) : ?>
                <tr>
                    <td><?= ++$start ?></td>
                    <td><?= $book->isbn ?></td>
                    <td><?= $book->title ?></td>
                    <td><?= $book->author ?></td>
                    <td><?= $book->category ?></td>
                    <td><?= $book->no_of_books ?></td>
                    <td><?= $book->publisher ?></td>
                    <td><?= $book->published_date ?></td>
                    <td>
                        <div class="btn-group">
                            <a href="../admin_ui/update_book.php?id=<?= $book->id ?>" class="btn btn-outline-primary"><i
                                    class='bx bxs-edit'></i> Edit</a>
                            <a href="#" data-id="<?= $book->id ?>" class="btn btn-outline-danger"><i
                                    class='bx bxs-trash'></i> Delete</a>
                        </div>
                    </td>
                </tr>
                <?php endforeach ?>
            </table>
            <div class="row ">
                <div class="col d-flex justify-content-center">
                    <nav aria-label="Page navigation example">
                        <ul class="pagination">
                            <li class="page-item"><a class="page-link"
                                    href="view_book.php?page=<?= $previous ?>">Previous</a></li>
                            <?php for ($i = 1; $i <= $pages; $i++) : ?>
                            <li class="page-item">
                                <a class="page-link" href="view_book.php?page=<?= $i ?>"><?= $i ?></a>
                            </li>
                            <?php endfor; ?>
                            <li class="page-item"><a class="page-link" href="view_book.php?page=<?= $next ?>">Next</a>
                            </li>
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
            bootbox.confirm('Do you really want to delete?', function(result) {
                if (result) {
                    $.ajax({
                        url: '../actions/book_delete.php',
                        type: 'post',
                        data: {
                            id: deleteid
                        },
                        success: function() {
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