<?php

include('../vendor/autoload.php');

use Database\MySQL;
use Database\Book;

$name = $_FILES['cover']['name'];
$tmp = $_FILES['cover']['tmp_name'];

$data = [
    'category_id' => $_POST['category'],
    'author_id' => $_POST['author'],
    'title' => $_POST['title'],
    'cover_img' => $name,
    'publisher' => $_POST['publisher'],
    'published_date' => $_POST['published_date'],
    'no_of_books' => $_POST['no_of_books'],
    'description' => $_POST['description'],
    'isbn' => $_POST['isbn']
];

$table = new Book(new MySQL());

if($table){
    $table->create($data);
    move_uploaded_file($tmp,"../images/$name");
    header('location: ../admin_ui/view_book.php');
}

