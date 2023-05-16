<?php

include('../vendor/autoload.php');

use Database\MySQL;
use Database\Request;

$table = new Request(new MySQL());
$id = $_GET['id'];
$table->decline($id);
header('location: ../student_ui/requestedb.php');