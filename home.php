<!DOCTYPE html>
<html lang="en">

<head>
  <title>Home</title>
  <link rel="stylesheet" type="text/css" href="engine1/style.css" />
  <script type="text/javascript" src="engine1/jquery.js"></script>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" type="text/css" href="css/style.css">
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</head>

<body>
  <div class="container-fluid">
    <br>
    <div class="row" id="row">
      <div class="col-1 col-sm-1 col-md-1 col-lg-1" style=" margin-bottom: 1%;"></div>
      <div class="col-2 col-sm-2 col-md-2 col-lg-2" id="row1col1" style="margin-bottom: 1%;">
        <img src="images/vast.png" alt="" style="width:120px;height:120px;">
      </div>
      <div class="col-3 col-sm-3 col-md-3 col-lg-3" id="row1col2" style="margin-left: -5%; margin-top: 2%;">
        <b>
          <p style="margin-top: 3%; font-size: 30px; font-family: Arial;">VAST College</p>
        </b>
      </div>
      <div class="col-1 col-sm-1 col-md-1 col-lg-1">
      </div>
      <div class="col-4 col-sm-4 col-md-4 col-lg-4">
        <a href="Login_ui/register.php"><button type="button" id="button1" style="margin-bottom: 10%; font-size: 16px; color: #fffafa;"><b>Register Now</b></button></a>
      </div>
      <div class="col-1 col-sm-1 col-md-1 col-lg-1">
        <form action="" id="form1" style="margin-top: 50%;">
          <select onchange="la(this.value)" name="login" id="login" style="font-weight: bold; font-size: 16px; padding:8px 4px;">
            <option value="home.php">&nbsp;&nbsp;&nbsp;&nbsp;Login</option>
            <option value="Login_ui/adminlogin.php">&nbsp;&nbsp;&nbsp;&nbsp;Admin</option>
            <option value="Login_ui/studentlogin.php">&nbsp;&nbsp;&nbsp;&nbsp;Student</option>
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
    <div class="row" id="row3">
      <div id="wowslider-container1">
        <div class="ws_images">
          <ul>
            <li><a href="http://wowslider.net"><img src="images/image1.jpg" alt="slider jquery" title="Our Library is Digital" id="wows1_0" /></a></li>
            <li><img src="images/image2.jpg" alt="Enjoy Now" title="Enjoy Now" id="wows1_1" /></li>
          </ul>
        </div>
        <div class="ws_bullets">
          <div>
            <a href="#" title="Our Library is Digital"><span><img src="images/small-img1.jpg" alt="Our Library is Digital" />1</span></a>
            <a href="#" title="Enjoy Now"><span><img src="images/small-img2.jpg" alt="Enjoy Now" />2</span></a>
          </div>
        </div>
        <div class="ws_script" style="position:absolute;left:-99%"><a href="http://wowslider.net">carousel jquery</a> by WOWSlider.com v9.0</div>
        <div class="ws_shadow"></div>
      </div>
      <script type="text/javascript" src="engine1/wowslider.js"></script>
      <script type="text/javascript" src="engine1/script.js"></script>
    </div>
    <div class="row" id="row2"><i>Popular books</i></div>
    <div class="row" id="row9">
      Books can be issued with a limited number of days.
    </div>
    <div class="row" id="row5">
      <div class="col-2 col-sm-2 col-md-2 col-lg-2" style="background-color:#F5F5F5">
      </div>
      <div class="col-2 col-sm-2 col-md-2 col-lg-2" id="row5col2" style="background-color:#F5F5F5">
        <img src="images/img1.jpg" alt="" style="width:135px;height:170px;">
      </div>
      <div class="col-2 col-sm-2 col-md-2 col-lg-2" id="row5col3" style="background-color:#F5F5F5">
        <img src="images/img2.jpg" alt="" style="width:135px;height:170px;">
      </div>
      <div class="col-2 col-sm-2 col-md-2 col-lg-2" id="row5col4" style="background-color:#F5F5F5">
        <img src="images/img3.jpg" alt="" style="width:135px;height:170px;">
      </div>
      <div class="col-2 col-sm-2 col-md-2 col-lg-2" id="row5col5" style="background-color:#F5F5F5">
        <img src="images/img4.jpg" alt="" style="width:135px;height:170px;">
      </div>
      <div class="col-2 col-sm-2 col-md-2 col-lg-2" style="background-color:#F5F5F5">
      </div>
    </div>
    <div class="row" id="row6">
      <div class="col-2 col-sm-2 col-md-2 col-lg-2">
      </div>
      <div class="col-2 col-sm-2 col-md-2 col-lg-2" id="row6col2" style="background-color:#F5F5F5">
      </div>
      <div class="col-2 col-sm-2 col-md-2 col-lg-2" id="row6col3" style="background-color:#F5F5F5">
        <img src="images/img5.jpg" alt="" style="width:135px;height:170px;">
      </div>
      <div class="col-2 col-sm-2 col-md-2 col-lg-2" id="row6col4" style="background-color:#F5F5F5">
        <img src="images/img6.jpg" alt="" style="width:135px;height:170px;">
      </div>
      <div class="col-2 col-sm-2 col-md-2 col-lg-2" id="row6col5" style="background-color:#F5F5F5">
      </div>
      <div class="col-2 col-sm-2 col-md-2 col-lg-2">
      </div>
    </div>
    <div class="row" id="row7">
      <div class="col-6 col-sm-6 col-md-6 col-lg-6" id="row7col1">
        <img src="images/books.jpeg" alt="" style="width:420px;height:320px; border-radius: 2%;">
      </div>
      <div class="col-6 col-sm-6 col-md-6 col-lg-6" id="row7col2">
        <p style="text-align:justify; line-height: 1.8;">You can choose from five book categories such as Computer Science, Technology, History, Business, Mathematics in our library.<br>
          It is free for all students.</p>
        &nbsp;&nbsp;<a href="Login_ui/register.php"><input type="submit" id="button2" value="See More" style="background-color: #CD5C5C; border-radius: 5%; font-size: 16px; color: #FFFFFF; border-color: #000000; margin-left: 30%;"></a>
      </div>
    </div>
    <div class="row" id="row4" style="background-color: white;">
      <div class="col-6 col-sm-6 col-md-6 col-lg-6" id="row3col1">
        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3818.038577702712!2d96.19605675024918!3d16.873986088331208!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x30c19253a5b8fedd%3A0x5c97b6dc957a77f4!2s71%20Pinlon%20Rd%2C%20Yangon!5e0!3m2!1sen!2smm!4v1609778772841!5m2!1sen!2smm" width="900" height="450" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>
      </div>
      <div class="col-5 col-sm-5 col-md-5 col-lg-5" id="row3col3" style="background-color: white;">
        <div class="row" style="margin-left: 6%; margin-top: 3%;">
          <b>
            <h3>Contact Us</h3><br>
            Address: No.71,Pinlon Road, North Dagon Tsp, Yangon. <br><br>
            Email:&nbsp;&nbsp;vestcollege@gmail.com <br><br>
            Phone:&nbsp;&nbsp;09-957843290<br><br>
          </b>
        </div>
        <div class="row" style="background-color:#fecdcd;padding-left: 2%; margin-left: 6%;">
          <font size="5">
            <p>Message Form</p>
          </font>
          <form><b>
              Name:&nbsp;&nbsp;
              <input type="text" name="name" size="10" required="true">
              Email:
              <input type="Password" name="pw" size="20" required="true"><br><br>
              Message:
              <input type="text" name="email" size="27" required="true"><br><br>
              <input type="submit" name="submit" value="Submit Now" style="background-color: #CD5C5C; border-radius: 5%; font-size: 16px; color: #FFFFFF; border-color: #000000; margin-left: 30%;"></b>
            <br><br>
          </form>
        </div>
      </div>
    </div>
  </div>
  </div>
</body>

</html>