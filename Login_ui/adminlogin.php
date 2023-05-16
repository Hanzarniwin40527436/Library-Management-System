<!DOCTYPE html>
<html>

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1" />
</head>

<body>
    <style>
        body {
            font-family: Arial, Helvetica, sans-serif;
            background-color: rgb(253, 253, 253);
        }

        .admincontiner {
            width: 450px;
            height: 500px;
            margin-left: auto;
            margin-right: auto;
            margin-top: 80px;
            border: solid 1px;
            border-radius: 8px;
            border-color: #df5e5e;
            box-shadow: rgba(50, 50, 93, 0.25) 0px 13px 27px -5px,
                rgba(0, 0, 0, 0.3) 0px 8px 16px -8px;
            text-align: center;
            background-color: hsl(0, 0%, 100%);
        }

        input[type="text"],
        input[type="password"] {
            float: right;
            width: 250px;
            padding: 15px;
            margin: 5px 15px 50px 10px;

            display: inline-block;
            border: none;
            border-radius: 4px;
            background: #f1f1f1;
        }

        label {
            float: left;
            padding: 15px;
            margin: 0px 10px 50px 24px;
        }

        input[type="text"]:focus,
        input[type="password"]:focus {
            background-color: #ddd;
            outline: none;
        }

        .header {
            margin-top: 10px;
        }

        .loginbtn {
            background-color: #df5e5e;
            color: white;
            padding: 16px 20px;
            margin: 10px 0;
            margin-left: 50px;
            border: none;
            cursor: pointer;
            width: 130px;
            height: 50px;
            float: left;
            border-radius: 7px;
            opacity: 0.9;
        }

        .loginbtn:hover {
            opacity: 1;
        }

        .clcbtn {
            background-color: #df5e5e;
            color: white;
            padding: 16px 20px;
            margin: 8px 0;
            border: none;
            cursor: pointer;
            width: 100px;
            height: 18px;
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
    <form action="../actions/admin_session.php" method="POST">
        <div class="admincontiner">
            <div class="header">
                <img src="../images/Vast.png" style="width: 80px; height: 80px" />
                <h1>Admin Login Form</h1>
            </div>
            <br />
            <div name="boxs">
                <label><b>Email:</b></label>
                <input type="text" placeholder="Enter Email" name="email" required />
                <label for="psw"><b>Password:</b></label>
                <input type="password" placeholder="Enter Password" name="password" required />
                <button type="submit" class="loginbtn">Login</button>
                <a class="clcbtn" href="../home.php">Back</a>
            </div>
        </div>
    </form>
</body>

</html>