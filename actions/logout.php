<?php 


session_start();

if(isset($_SESSION['admin'])){
    unset($_SESSION['admin']);
    header('location:../home.php');
}
elseif(isset($_SESSION['students'])){
    unset($_SESSION['students']);
    header('location:../home.php');
}
?>