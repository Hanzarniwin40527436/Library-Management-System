<?php

namespace Database;

use PDOException;

class Category{
    private $db = null;

    public function __construct(MySQL $db)
    {
        $this->db = $db->connect();
    }

    public function create($data){
        try{
            $query = "INSERT INTO categories (name) VALUES (:name)";

            $statement = $this->db->prepare($query);
            $statement->execute($data);
        }catch(PDOException $e){
            echo $e->getMessage();
        }
    }

    public function getAll(){
        $statement = $this->db->query("SELECT * FROM categories");
        return $statement->fetchAll();
    }

    public function pagination($start, $limit){
        $statement = $this->db->query("SELECT * FROM categories LIMIT $start, $limit");
        return $statement->fetchAll();
    }

    public function fetchOne($id){
        $statement = $this->db->prepare('Select * FROM categories WHERE id = :id');
        $statement->execute([':id'=>$id]);
        return $statement->fetch();
    }

    public function update($id,$name){
        $query = "UPDATE categories SET 
        name = :name
        WHERE id = :id";
        $statement = $this->db->prepare($query);
        $statement->execute([':name'=>$name,':id'=>$id]);
    }

    public function delete($id){
        $statement = $this->db->prepare('DELETE FROM categories WHERE id = :id');
        $statement->execute([':id'=>$id]);
    }
}