<?php

include('../vendor/autoload.php');

use Database\MySQL;
use Database\Request;
use Helpers\Auth;

$auth = Auth::admin();

$table = new Request(new MySQL());
if($table){
    if(isset($_GET['ap_id'])){
        $id = $_GET['ap_id'];
        $bid = $_GET['bid'];
        $table->approve($id);
        $table->decrease($bid);
        header("location: ../admin_ui/request_book.php");
    }
    else if(isset($_GET['de_id'])){
        $id = $_GET['de_id'];
        $table->decline($id);
        header("location: ../admin_ui/request_book.php");
    }
    else if(isset($_GET['re_id'])){
        $id = $_GET['re_id'];
        $bid = $_GET['bid'];
        $table->return($id);
        $table->insert($auth->id,$id);
        $table->increase($bid);
        header("location: ../admin_ui/issued_book.php");
    }
}