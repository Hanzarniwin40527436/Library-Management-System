<!DOCTYPE html>
<html>

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <script src="../js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="../css/bootstrap.min.css" />
</head>

<body>

    <style>
    body {
        font-family: Arial, Helvetica, sans-serif;
        background-color: rgb(253, 253, 253);
    }

    .register1 {
        margin-top: 10px;
        width: 550px;
        height: 640px;
        margin-left: auto;
        margin-right: auto;
        text-align: center;
        border: solid 1px;
        border-radius: 8px;
        border-color: #df5e5e;
        box-shadow: rgba(50, 50, 93, 0.25) 0px 13px 27px -5px,
            rgba(0, 0, 0, 0.3) 0px 8px 16px -8px;
    }

    .register {
        padding-top: 20px;
        padding-left: 60px;
        width: 500px;
    }

    input[type="text"],
    input[type="password"] {
        float: right;
        width: 230px;
        height: 50px;
        padding: 15px;
        margin: 5px 15px 10px 10px;
        display: inline-block;
        border: none;
        border-radius: 4px;
        background: #f1f1f1;
    }

    label {
        float: left;
        padding: 2px;
        margin-top: 27px;
        margin-right: 30px;
        margin-left: 30px;

    }

    input[type="text"]:focus,
    input[type="password"]:focus {
        background-color: #ddd;
        outline: none;
    }

    .registerbtn {
        background-color: #df5e5e;
        color: white;
        text-align: center;
        margin: 8px 0;
        border: none;
        cursor: pointer;
        width: 150px;
        height: 50px;
        float: left;
        margin-left: 35px;
        border-radius: 7px;
        margin-top: 10px;
        opacity: 0.9;
        text-decoration: none;
    }

    .registerbtn:hover {
        opacity: 1;
        color: #fff;
        text-decoration: none;
    }



    .clcbtn {
        background-color: #df5e5e;
        color: white;
        padding: 16px 20px;
        margin: 10px 0;
        border: none;
        cursor: pointer;
        width: 150px;

        height: 50px;
        float: right;
        border-radius: 7px;
        margin-right: 50px;
        opacity: 0.9;
        text-decoration: none;
    }

    .clcbtn:hover {
        opacity: 1;
        color: #fff;
        text-decoration: none;
    }
    </style>
    <div class="register1">
        <div class="register">
            <img src="../images/Vast.png" style="width: 70px; height: 70px; float: right; margin-right: 17px" />
            <h1>Student Register</h1>

            <form action="../actions/student_register.php" method="POST">
                <hr />
                <label for="name"><b>Name</b></label>
                <input type="text" placeholder="Enter Name" name="name" required />

                <label for="id"><b>Student ID</b></label>
                <input type="text" placeholder="Enter ID" name="student_id" required />


                <label for="year"><b>Year</b></label>
                <!-- <input type="text" placeholder="Enter Year" name="year" required /> -->
                <select class="form-select form-select-sm" aria-label=".form-select-sm example"
                    style="margin-left:195px;width:230px;height:50px;" name="year" required>
                    <option selected>Select year</option>
                    <option value="First">First</option>
                    <option value="Second">Second</option>
                    <option value="Final">Final</option>
                </select>



                <label for="batch"><b>Batch</b></label>
                <input type="text" placeholder="Enter Batch" name="batch" required />

                <label for="email"><b>Email</b></label>
                <input type="text" placeholder="Enter Email" name="email" required />

                <label for="psw"><b>Password</b></label>
                <input type="password" placeholder="Enter Password" name="password" required />
                <label> <input type="checkbox" required> Agree with our <a href="terms.php">terms and
                        conditions</a></label>

                <button class="registerbtn">Register</button>
                <a class="clcbtn" href="../home.php">Back</a>
            </form>
        </div>
    </div>
</body>

</html>