<?php

namespace Database;

use PDOException;

class Book
{
    private $db = null;

    public function __construct(MySQL $db)
    {
        $this->db = $db->connect();
    }

    public function create(Array $data)
    {
        try{
            $query = "INSERT INTO books (category_id,author_id,title,cover_img,publisher,published_date,no_of_books,description,isbn) 
            VALUES (:category_id,:author_id,:title,:cover_img,:publisher,:published_date,:no_of_books,:description,:isbn)";

            $statement = $this->db->prepare($query);
            $statement->execute($data);
        }catch(PDOException $e){
            echo $e->getMessage();
        }
    }

    public function getAll(){
        $statement = $this->db->query("
        SELECT books.*, categories.name AS category, authors.name AS author FROM books 
        LEFT JOIN categories ON books.category_id = categories.id LEFT JOIN authors ON books.author_id = authors.id");
        return $statement->fetchAll();
    }

    public function pagination($start, $limit){
        $statement = $this->db->query("
        SELECT books.*, categories.name AS category, authors.name AS author FROM books 
        LEFT JOIN categories ON books.category_id = categories.iD LEFT JOIN authors ON books.author_id = authors.id
        LIMIT $start, $limit");
        return $statement->fetchAll();
    }

    public function fetchOne($id){
        $statement = $this->db->prepare('Select * FROM books WHERE id = :id');
        $statement->execute([':id'=>$id]);
        return $statement->fetch();
    }

    public function update($data){
        $query = "UPDATE books SET 
        category_id = :category_id,
        author_id = :author_id,
        title = :title,
        cover_img = :cover_img,
        publisher = :publisher,
        published_date = :published_date,
        no_of_books = :no_of_books,
        description = :description,
        isbn = :isbn
        WHERE id = :id";
        $statement = $this->db->prepare($query);
        $statement->execute($data);
    }

    public function delete($id){
        $statement = $this->db->prepare('DELETE FROM books WHERE id = :id');
        $statement->execute([':id'=>$id]);
    }

    public function lastFive(){
        $statement = $this->db->query('SELECT books.*, authors.name AS author, categories.name AS category FROM books 
        LEFT JOIN authors ON books.author_id = authors.id
        LEFT JOIN categories ON books.category_id = categories.id
        ORDER BY id DESC LIMIT 5');
        return $statement->fetchAll();
    }
}
