<?php

include('../vendor/autoload.php');

use Database\MySQL;
use Database\Request;
use Helpers\Auth;

$auth = Auth::student();
$data=[
    "book_id"=> $_POST["bid"],
    "student_id" =>$_POST["sid"],
    "status"=>"request"
];



$table = new Request(new MySQL());

if($table){
    $table->insertrequest($data);
   
    header("location: ../student_ui/detailbook.php");

}