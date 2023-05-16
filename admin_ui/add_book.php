<?php

include('../vendor/autoload.php');

use Database\MySQL;
use Database\Category;
use Database\Author;
use Helpers\Auth;

$auth = Auth::admin();

$cat_tbl = new Category(new MySQL());
$categories = $cat_tbl->getAll();
$aut_tbl = new Author(new MySQL());
$authors = $aut_tbl->getAll();

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
                <h1 class="h4 mb-3">Add New Book</h1>
                <form action="../actions/book_add.php" method="POST" enctype="multipart/form-data">
                    <input type="text" name="isbn" class="form-control mb-2" placeholder="ISBN" required>
                    <input type="text" name="title" class="form-control mb-2" placeholder="Title" required>
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
                        <select class="form-select" name="category" required>
                            <option selected>Choose...</option>
                            <?php foreach($categories as $category):?>
                                <option value="<?= $category->id?>"><?= $category->name?></option>
                            <?php endforeach ?>
                        </select>
                    </div>
                    <input type="number" name="no_of_books" class="form-control mb-2" placeholder="No. of Books" required>
                    <input type="text" name="publisher" class="form-control mb-2" placeholder="Publisher" required>
                    <input type="date" name="published_date" class="form-control mb-2" placeholder="Published Date" required>
                    <div class="mb-2">
                        <input class="form-control" name="cover" type="file" required>
                    </div>
                    <textarea class="form-control mb-2" name="description" placeholder="Description" rows="4" required></textarea>
                    <button class="btn w-100" style="background-color: #fe8181;color:#fff;">ADD</button>
                </form>
            </div>
        </div>
    </div>
</body>

</html>