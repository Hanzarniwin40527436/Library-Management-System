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
                $v += $n;
                $_SESSION['cart'][$k] = $v;
                break;
            }
        }
        if ($flag == FALSE) {
            $_SESSION['cart'][$id1] = isset($n);
        }
    }
}
?>
<?php
if (isset($_POST['search'])) {
    $valueToSearch = $_POST['valueToSearch'];
    $query = "SELECT books.*, authors.name AS author FROM books LEFT JOIN authors ON books.author_id = authors.id WHERE CONCAT(books.id, category_id, author_id, title, cover_img, publisher, published_date, no_of_books, description, isbn) LIKE '%" . ucfirst($valueToSearch) . "%'";
    $search_result = filterTable($query);
} elseif (isset($_POST['search1'])) {
    $valueToSearch = $_POST['valueToSearch'];
    $query = "SELECT books.*, authors.name AS author FROM books LEFT JOIN authors ON books.author_id = authors.id WHERE CONCAT(authors.id, authors.name) LIKE '%" . ucfirst($valueToSearch) . "%'";
    $search_result = filterTable($query);
} else {
    $query = "SELECT books.*, authors.name AS author FROM books LEFT JOIN authors ON books.author_id = authors.id WHERE books.id > 36 and books.id < 49 ";
    $search_result = filterTable($query);
}
function filterTable($query)
{
    $connect = mysqli_connect("localhost", "root", "", "olms");
    $filter_Result = mysqli_query($connect, $query);
    return $filter_Result;
}
?>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href='https://unpkg.com/boxicons@2.1.2/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="../css/stdloginview.css">
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script src="../js/bootstrap.min.js"></script>
    <title></title>
</head>

<body>
    <div class="container-fluid">
        <div class="row" id="row">
            <div class="col-1 col-sm-0 col-md-1 col-lg-1" style="margin-bottom: 1%;"></div>
            <div class="col-4 col-sm-3 col-md-5 col-lg-2" id="row1col1" style="margin-bottom: 1%; ">
                <img src="../images/vast.png" alt="" style="width:120px;height:120px;">
            </div>
            <div class="col-2 col-sm-2 col-md-2 col-lg-2" id="row1col2" style="margin-left: -5%; margin-top: 2%;">
                <b>
                    <p style="margin-top: 3%; font-size: 30px; font-family: Arial;">VAST College</p>
                </b>
            </div>
            <div class="col-1 col-sm-0 col-md-2 col-lg-3"></div>
            <div class="col-6 col-sm-7 col-md-2 col-lg-2">
                <i class='bx bx-user-circle' style="font-size:35px; margin-top:17%; margin-left:70%;"></i>
            </div>
            <div class="col" style="margin-top:2.7%; margin-left:-3%;">
                <a href="profile.php" style="text-decoration: none; color: black; font-size:20px;"><?= $auth->name ?></a>
            </div>
            <div class="col d-flex" style="margin-top:2.7%; margin-left:-5%;">
                <i class='bx bx-log-out-circle' style="font-size: 30px; margin-right:10px;"></i>
                <a href="../actions/logout.php" style="text-decoration: none; color: black; font-size:20px;"> Logout</a>
            </div>
        </div>
        <div class="row" id="row3">
            <div class="col-0 col-sm-0 col-md-2 col-lg-4 " id="row3col1">

            </div>
            <div class="col-5 col-sm-6 col-md-2 col-lg-4" id="row3col2">
                Available Books
            </div>
            <div class="col-7 col-sm-6 col-md-8 col-lg-4" id="row3col3">
                <form action="" method="post">
                    <input type="text" name="valueToSearch" class="form-control w-50 d-inline" placeholder="Search">
                    <input type="submit" name="search" value="Search" class="btn btn-primary" style="background-color:#df5e5e;">
                </form>
            </div>
        </div>
        <div class="row" id="row2">
            <div class="col-0 col-sm-8 col-md-2 col-lg-4" id="row2col1">
                <div class="row" id="row2col1row1">
                    Author
                </div>
                <div class="row" id="row2col1row2">
                    <form action="" method="post">
                        <input type="text" name="valueToSearch" class="form-control w-50 d-inline" placeholder="Search">
                        <input type="submit" name="search1" value="Search" class="btn btn-primary" style="background-color:#df5e5e;">
                    </form>

                </div>
                <div class="row" id="row2col1row3">
                    <form action="" id="form1" style="margin-top: 5%;">
                        <select onchange="la(this.value)" name="categories" id="categories" style="font-weight: bold; font-size: 16px; padding:5px 1px;">
                            <option>&nbsp;&nbsp;Categories</option>
                            <option value="std_cs_view.php">&nbsp;&nbsp;Computer Science</option>
                            <option value="std_technology_view.php">&nbsp;&nbsp;Technology</option>
                            <option value="std_history_view.php">&nbsp;&nbsp;&nbsp;History</option>
                            <option value="std_business_view.php">&nbsp;&nbsp;&nbsp;Business</option>
                            <option value="std_math_view.php">&nbsp;&nbsp;&nbsp;Mathematics</option>

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
            <div class="col-12 col-sm-12 col-md-10 col-lg-8" id="row2col2">
                <div class="row">
                    <div class="col-6 col-sm-6 col-md-0 col-lg-6" id=""></div>
                    <div class="col-6 col-sm-6 col-md-12 col-lg-6" id="row2col7">
                        Technology</div>
                </div>
                <div class="md-form mt-0">
                    <div class="row filter_data">
                        <?php
                        while ($row = mysqli_fetch_array($search_result)) {
                            $id = $row['id'];
                            $category_id = $row['category_id'];
                            $author_id = $row['author'];
                            $title = $row['title'];
                            $image = $row['cover_img'];
                            $publisher = $row['publisher'];
                            $publish_date = $row['published_date'];
                            $no_of_books = $row['no_of_books'];
                            $description = $row['description'];
                            $isbn = $row['isbn'];
                            echo "
          <div class='col-md-4 col-sm-8'>
          <div style='border:2px solid #ccc; border-radius:5px; padding:16px; margin-bottom:16px; height:485px; background-color: white;'>
          <img src='../images/$image' alt='' class='img-responsive' 
          style='width: 210px; height:280 px; padding-left:50px; padding-top:7%;'>
          <br>
          <br>
          <p style='padding-left:30px;'>
          <b>Title: </b>$title <br/>
          <b>Author: </b>$author_id <br/>
          </p>
          <div class='col-sm-3 col-lg-3 col-md-3' align='center'>
          <div class='simpleCart_shelfItem products-right-grid1-add-cart'style='margin-right:180%' id='container12'>
          <form action='std_cs_view.php' method='POST'>
          <input type='hidden' name='id' value=$id>
          <p><input class='item_add reset' name='ac' type='submit'  value='View More' style='background:#df5e5e;border:1px dotted; margin-left:90px;
          color:white; padding: 8px 6px; border-radius:5px 5px 5px 5px;'></p><br></form></div></div>
          </div>
          </div>
          ";
                        }
                        ?>
                    </div>
                </div>
            </div>
            <?php
            if (isset($_POST['ac'])) {
                echo '<meta http-equiv="refresh" content="0; URL=detailbook.php">';
            }
            ?>
        </div>
    </div>
</body>

</html>