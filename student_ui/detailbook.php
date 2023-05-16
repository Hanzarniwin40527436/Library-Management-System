<!DOCTYPE html>
<html lang="en">
<?php
include('../vendor/autoload.php');

use Helpers\Auth;
// session_start();
$auth = Auth::student();
?>
<?php
include 'DBconnection.php';
$retrieveQuery = "Select * from books";
$stmt = $db->query($retrieveQuery);
$resultSet = $stmt->fetchAll();
if (!isset($_SESSION['cart'])) {
    $_SESSION['cart'] = array();
}
if (isset($_POST['ac'])) {
    if ($_SERVER['REQUEST_METHOD'] == "POST") {

        $flag = FALSE;
        $id1 = $_POST['id'];
        foreach ($_SESSION['cart'] as $k => $v) {
            if ($k == $id1) {
                $flag = TRUE;
                $v += 1;
                $_SESSION['cart'][$k] = $v;
                break;
            }
        }
        if ($flag == FALSE) {
            $_SESSION['cart'][$id] = 1;
        }
    }
}
?>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href='https://unpkg.com/boxicons@2.1.2/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="../css/stdloginview.css">
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"
        integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script src="../js/bootstrap.min.js"></script>
    <title></title>
</head>

<body>
    <div class="container-fluid">
        <div class="row" id="row">
            <div class="col-0 col-sm-0 col-md-1 col-lg-1" style="margin-bottom: 1%;"></div>
            <div class="col-5 col-sm-3 col-md-3 col-lg-2" id="row1col1" style="margin-bottom: 1%; ">
                <img src="../images/vast.png" alt="" style="width:120px;height:120px;">
            </div>
            <div class="col-1 col-sm-1 col-md-2 col-lg-3" id="row1col2" style="margin-left: -5%; margin-top: 2%; ">
                <b>
                    <p style="margin-top: 3%; font-size: 30px; font-family: Arial;">VAST College</p>
                </b>
            </div>
        </div>
        <div class="row" id="row3">
            <div class="col-md-4" id="row3col1">
            </div>
            <div class="col-md-4" id="row3col2">
                Available Books
            </div>
            <div class="col-md-4" id="row3col3">
            </div>
        </div>
        <div class="row" id="row2">
            <div class="col-md-4" id="row2col1">
                <div class="row" id="row2col1row2">
                </div>
                <div class="row" id="row2col1row3">
                    <form action="" id="form1" style="margin-top: 5%;">
                        <select onchange="la(this.value)" name="categories" id="categories"
                            style="font-weight: bold; font-size: 16px;">
                            <option>&nbsp;&nbsp;Categories</option>
                            <option value="std_cs_view.php">&nbsp;&nbsp;Computer Science</option>
                            <option value="std_technology_view.php">&nbsp;&nbsp;Technology</option>
                            <option value="std_history_view.php">&nbsp;&nbsp;History</option>
                            <option value="std_business_view.php">&nbsp;&nbsp;Business</option>
                            <option value="std_math_view.php">&nbsp;&nbsp;Mathematics</option>

                        </select>
                        <script>
                        function la(src) {
                            window.location = src;
                        }
                        </script>
                        <br><br>
                    </form>
                </div>
            </div>
            <script>
            function deleteRow(r) {
                var i = r.parentNode.parentNode.rowIndex;
                document.getElementById("row11col2").deleteRow(i);
            }
            </script>
            <?php

            if (isset($_SESSION["name"])) {
                $username = $_SESSION["name"];
            }

            $cart = $_SESSION['cart'];

            foreach ($cart as $id => $b) {
                $sql = "SELECT books.*, authors.name AS author FROM books LEFT JOIN authors ON books.author_id = authors.id where books.id='$id'";
                $r = $db->query($sql);
                $res = $r->fetch();
            ?>
            <div class="col-md-2" id="row11col2">
                <?php
                    echo "<img src='../images/" . $res[4] . "' width='131' height='190' 
class='img-responsive' align='center' style='margin-left: 25%'/>";
                    $res
                    ?>
            </div>
            <div class="col-md-6" id="row11col3">
                <br><b>Title: </b><?php
                                        echo $res[3]; ?><br><br>
                <b>Author: </b><?php
                                    echo $res[10]; ?><br><br>
                <b>Publisher: </b><?php
                                        echo $res[5]; ?><br><br>
                <b>Published Date: </b><?php
                                            echo $res[6]; ?><br><br>
                <b>Description: </b><?php
                                        echo $res[8]; ?><br><br>
            </div>
        </div>
        <br>
        <?php
            }
    ?>
        <div class="row" id="row10" style='margin-top:1%; margin-bottom:5%;'>

            <div class="col-md-4" id="row10col1"></div>
            <div class="col-md-4" id="row10col2"></div>
            <div class="col-md-4 d-flex justify-content-center
" id="row10col3">
                <!-- <script language="JavaScript" type="text/javascript">
                function alertbook() {
                    alert('Book is issued!!!');
                }
                </script> -->



                <input type="hidden" data-id="<?= $res[0]  ?>" class="bid">
                <input type="hidden" data-id="<?= $auth->id  ?>" class="sid">
                <button class="btn-issue" name="issue" style='background: #df5e5e; border:1px dotted; 
        color: #FFFF; font-weight: bold; border-radius:5px 5px 5px 5px;padding: 10px 10px;'>
                    Issue Book
                </button>

                <form method="post">
                    <button name="reset" class="reset" style='background: #df5e5e; border:1px dotted; margin-left:50px; 
        color: #FFFF; font-weight: bold; border-radius:5px 5px 5px 5px;padding: 10px 10px;'>Back</button>
                </form>
            </div>

            <?php
        if (isset($_POST['reset'])) {
            unset($_SESSION['cart']);
            echo '<meta http-equiv="refresh" content="0; URL=std_cs_view.php">';
        }
        if (!isset($_SESSION['cart'])) {
            $_SESSION['cart'] = array();
        }
        $detail = $_SESSION['cart'];
        ?>

        </div>
    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="../js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootbox.js/5.5.2/bootbox.min.js"></script>
    <script>
    $('.btn-issue').click(function(e) {
        var bid = $('.bid').data('id');
        var sid = $('.sid').data('id');
        $.ajax({
            url: '../actions/request_book.php',
            type: 'post',
            data: {
                bid: bid,
                sid: sid
            },
            success: function() {
                bootbox.alert('Book is issued!')
            }
        })
    })
    </script>

</body>

</html>