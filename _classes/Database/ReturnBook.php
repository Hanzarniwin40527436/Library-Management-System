<?php

namespace Database;

use PDOException;

class ReturnBook
{
    private $db = null;

    public function __construct(MySQL $db)
    {
        $this->db = $db->connect();
    }

    public function return(){
        $statement = $this->db->query("SELECT issued_books.*, 
        request_books.request_date AS request, 
        request_books.issue_date AS issued,
        request_books.due_date AS due,
        admin.name AS admin,
        students.student_id AS sid,
        students.name AS sname,
        books.title AS title,
        books.isbn AS isbn,
        books.cover_img AS cover
        FROM issued_books
        LEFT JOIN request_books ON issued_books.request_id = request_books.id
        LEFT JOIN students ON request_books.student_id = students.id
        LEFT JOIN books ON request_books.book_id = books.id
        LEFT JOIN admin ON issued_books.admin_id = admin.id");
        return $statement->fetchAll();
    }

}