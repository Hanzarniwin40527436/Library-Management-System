<?php

include('../vendor/autoload.php');

use Database\MySQL;
use Database\Book;

$data = [
    'category_id' => $_POST['category'],
    'author_id' => $_POST['author'],
    'title' => $_POST['title'],
    'cover_img' => $_FILES['cover']['name'],
    'publisher' => $_POST['publisher'],
    'published_date' => $_POST['published_date'],
    'no_of_books' => $_POST['no_of_books'],
    'description' => $_POST['description'],
    'isbn' => $_POST['isbn'],
    'id' => $_POST['id']
];

$table = new Book(new MySQL());
if($table){
    $table->update($data);
    header('location: ../admin_ui/view_book.php');
}
