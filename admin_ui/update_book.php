<?php

include('../vendor/autoload.php');

use Database\MySQL;
use Database\Category;
use Database\Author;
use Database\Book;
use Helpers\Auth;

$auth = Auth::admin();

$cat_tbl = new Category(new MySQL());
$categories = $cat_tbl->getAll();
$aut_tbl = new Author(new MySQL());
$authors = $aut_tbl->getAll();

$id = $_GET['id'];
$book_tbl = new Book(new MySQL());
$book = $book_tbl->fetchOne($id);
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
                <h1 class="h4 mb-3">Update Book</h1>
                <form action="../actions/book_update.php" method="POST" enctype="multipart/form-data">
                    
                    <input type="text" name="isbn" class="form-control mb-2" placeholder="ISBN" required value="<?= $book->isbn?>">
                    <input type="text" name="title" class="form-control mb-2" placeholder="Title" required value="<?= $book->title?>">
                    <div class="input-group mb-2">
                        <label class="input-group-text" for="inputGroupSelect01">Author</label>
                        <select class="form-select" name="author" required>
                            <option selected>Choose...</option>
                            <?php foreach($authors as $author): ?>
                                <option value="<?= $author->id?>"><?= $author->name?></option>
                            <?php endforeach ?>
                        </select>
                    </div>
                    <div class="input-group mb-2">
                        <label class="input-group-text" for="inputGroupSelect01">Category</label>
                        <select class="form-select" name="category" required >
                            <option selected>Choose...</option>
                            <?php foreach($categories as $category):?>
                                <option value="<?= $category->id?>"><?= $category->name?></option>
                            <?php endforeach ?>
                        </select>
                    </div>
                    <input type="number" name="no_of_books" class="form-control mb-2" placeholder="No. of Books" required value="<?= $book->no_of_books?>">
                    <input type="text" name="publisher" class="form-control mb-2" placeholder="Publisher" required value="<?= $book->publisher?>">
                    <input type="date" name="published_date" class="form-control mb-2" placeholder="Published Date" required value="<?= $book->published_date?>">
                    <div class="mb-2">
                        <input class="form-control" name="cover" type="file" required" value="<?= $book->cover_img?>">
                    </div>
                    <textarea class="form-control mb-2" name="description" placeholder="Description" rows="4" required><?= $book->description?></textarea>
                    <input type="hidden" name="id" value="<?= $book->id?>">
                    <button class="btn w-100" style="background-color: #fe8181;color:#fff;">UPDATE</button>
                </form>
            </div>
        </div>
    </div>
</body>

</html>