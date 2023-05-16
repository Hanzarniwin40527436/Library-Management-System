<?php

namespace Database;

use PDOException;

class Admin
{
    private $db = null;

    public function __construct(MySQL $db)
    {
        $this->db = $db->connect();
    }

    public function EmailAndPaswordadmin($email, $password)
    {
    $statement = $this->db->prepare("
    SELECT admin.*
    FROM admin
    WHERE admin.email = :email
    AND admin.password = :password
    ");
    $statement->execute([
    ':email' => $email,
    ':password' => $password
    ]);
    $row = $statement->fetch();
    return $row ?? false;
}

   
}