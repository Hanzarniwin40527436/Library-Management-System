<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "olms";

try {
    $db = new PDO("mysql:host=$servername; dbname=$dbname", $username, $password);
    
 
} catch (PDOException $e) {
    echo "<script type='text/javascript'>
            alert('Connection fail. Check your connection');</script>";
    echo "<br>";
    $e->getMessage();
}
