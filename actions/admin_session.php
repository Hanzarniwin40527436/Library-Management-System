<?php
session_start();
include('../vendor/autoload.php');
use Database\MySQL;
use Database\Admin;
use Helpers\HTTP;

$email = $_POST['email'];
$password = $_POST['password'] ;
$table = new Admin(new MySQL());
$admin = $table->EmailAndPaswordadmin($email, $password);

if ($admin) {
    $_SESSION['admin']=$admin;
    header('location: ../admin_ui/dashboard.php');
} else {
    header('location: ../Login_ui/adminlogin.php');
}