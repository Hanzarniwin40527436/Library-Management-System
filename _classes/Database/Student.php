<?php

namespace Database;

use PDOException;

class Student
{
    private $db = null;

    public function __construct(MySQL $db)
    {
        $this->db = $db->connect();
    }

    public function create(array $data)
    {
        try {
            $query = "INSERT INTO students( student_id, name, batch, year, email, password)
            VALUES ( :student_id, :name, :batch, :year, :email, :password)";
            $statement = $this->db->prepare($query);
            $statement->execute($data);
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }

    public function getAll()
    {
        $statement = $this->db->query("SELECT * FROM students");
        return $statement->fetchAll();
    }

    public function pagination($search, $start, $limit)
    {
        if (isset($search)) {
            $statement = $this->db->query("SELECT * FROM students WHERE student_id LIKE '%$search%'");
            return $statement->fetchAll();
        } else {
            $statement = $this->db->query("SELECT * FROM students LIMIT $start, $limit");
            return $statement->fetchAll();
        }
    }

    public function fetchOne($id)
    {
        $statement = $this->db->prepare('Select * FROM students WHERE id = :id');
        $statement->execute([':id' => $id]);
        return $statement->fetch();
    }

    public function update($data, $id)
    {
        $query = "UPDATE students SET 
        profile_img=:profile_img
        WHERE id = :id";
        $statement = $this->db->prepare($query);
        $statement->execute([':profile_img' => $data, ':id' => $id]);
    }

    public function delete($id)
    {
        $statement = $this->db->prepare('DELETE FROM students WHERE id = :id');
        $statement->execute([':id' => $id]);
    }

    public function updateStudent($data)
    {
        $query = "UPDATE students SET 
        student_id = :student_id, 
        name = :name, 
        batch = :batch, 
        year = :year, 
        email = :email
        WHERE id = :id";
        $statement = $this->db->prepare($query);
        $statement->execute($data);
    }

    public function findByEmailAndPasword($email, $password)
    {
        $statement = $this->db->prepare("SELECT * FROM students WHERE email = :email AND password = :password");
        $statement->execute([':email' => $email, ':password' => $password]);
        $row = $statement->fetch();
        return $row ?? false;
    }
}
