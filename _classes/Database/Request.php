<?php

namespace Database;

use PDOException;

class Request
{
    private $db = null;

    public function __construct(MySQL $db)
    {
        $this->db = $db->connect();
    }

    public function request(){
        $statement = $this->db->query("SELECT request_books.*, books.title AS title, books.isbn AS bid, books.no_of_books AS nob, books.cover_img AS cover,
        students.student_id AS sid, students.name AS sname FROM request_books
        LEFT JOIN books ON request_books.book_id = books.id
        LEFT JOIN students ON request_books.student_id = students.id
        WHERE request_books.status = 'request'");
        return $statement->fetchAll();
    }

    public function issued(){
        $statement = $this->db->query("SELECT request_books.*, books.title AS title, books.isbn AS bid, books.cover_img AS cover,
        students.student_id AS sid, students.name AS sname FROM request_books
        LEFT JOIN books ON request_books.book_id = books.id
        LEFT JOIN students ON request_books.student_id = students.id
        WHERE request_books.status = 'approve'");
        return $statement->fetchAll();
    }

    public function approve($id){
        $statement = $this->db->prepare("UPDATE request_books 
        SET status = 'approve', issue_date = NOW(), due_date = (SELECT ADDDATE(NOW(), INTERVAL 10 DAY))  WHERE id = :id");
        $statement->execute([':id'=>$id]);
    }

    public function decrease($bid){
        $statement = $this->db->prepare("UPDATE books SET
        no_of_books = no_of_books - 1
        WHERE id = :id");
        $statement->execute([':id'=>$bid]);
    }

    public function increase($bid){
        $statement = $this->db->prepare("UPDATE books SET
        no_of_books = no_of_books + 1
        WHERE id = :id");
        $statement->execute([':id'=>$bid]);
    }

    public function decline($id){
        $statement = $this->db->prepare("DELETE FROM request_books WHERE id = :id");
        $statement->execute([':id'=>$id]);
    }

    public function return($id){
        $statement = $this->db->prepare("UPDATE request_books SET status = 'returned' WHERE id = :id");
        $statement->execute([':id'=>$id]);
    }

    public function insert($auth_id,$rid){
        $statement = $this->db->prepare('INSERT INTO issued_books (request_id,admin_id,return_date) 
        VALUES (:request_id,:admin_id,NOW())');
        $statement->execute([
            ':request_id'=> $rid,
            ':admin_id' => $auth_id,    
        ]);
    }

    public function insertrequest($data){
        $query = "INSERT INTO request_books(book_id, student_id,status,request_date) 
            VALUES (:book_id, :student_id,:status,NOW())";
        $statement = $this->db->prepare($query);
        $statement->execute($data);
    }
    
    public function requestoutput($id){
        $statement = $this->db->query("SELECT request_books.*, books.title AS title, books.isbn AS bid, books.cover_img AS cover,
        students.student_id AS sid, students.name AS sname FROM request_books
        LEFT JOIN books ON request_books.book_id = books.id
        LEFT JOIN students ON request_books.student_id = students.id
        WHERE request_books.status = 'request'
        AND students.id=$id" );
        return $statement->fetchAll();
    }

    
    public function issueoutput($id){
        $statement = $this->db->query("SELECT request_books.*, books.title AS title, books.isbn AS bid, books.cover_img AS cover,
        students.student_id AS sid, students.name AS sname FROM request_books
        LEFT JOIN books ON request_books.book_id = books.id
        LEFT JOIN students ON request_books.student_id = students.id
        WHERE request_books.status = 'approve'
        AND students.id=$id" );
        return $statement->fetchAll();
    }

    public function dailyRequest(){
        $statement = $this->db->query("SELECT id FROM request_books
        WHERE status = 'request' AND request_date = CURRENT_DATE()");
        return $statement->fetchAll();
    }

    public function dailyIssued(){
        $statement = $this->db->query("SELECT id FROM request_books
        WHERE status = 'approve' AND issue_date = CURRENT_DATE()");
        return $statement->fetchAll();
    }

    public function dailyReturn(){
        $statement = $this->db->query("SELECT id FROM issued_books
        WHERE return_date = CURRENT_DATE()");
        return $statement->fetchAll();
    }
}