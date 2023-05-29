<?php
include 'connect.php';
session_start();


if ($conn === false) {
    die("connection error");
} if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST["username"];
    $password = $_POST["password"];
    $sql = "select * from users where username='".$username."' AND password='".$password."' "; 
    
    $result = mysqli_query($conn, $sql);
    
    $row = mysqli_fetch_array($result);
    if ($row["usertype"] == "user") {
        $_SESSION["username"] =
        $username; header("location:guesthome.php");
    } elseif ($row["usertype"] == "admin") {
        $_SESSION["username"] =
        $username; header("location:home.php");
    } else {
        echo "username or password incorrect";
    }
} ?>
<!DOCTYPE html>
<html>
<head>
    <title>Login Page</title>
    <link rel="stylesheet" href="style.css">
    <style>
        body {
            background-image: url("9.jpeg");
            background-size: cover;
        }
    </style>
</head>
<body>
   

    <div class="form-container">
        <div class="card-body">
            <form action="" method="POST">
                <div class="imgcontainer">
                    <p style="font-size:40px; margin-bottom: 2px; margin-top: 2px">
                        AquaTrack
                    </p>
                    <img src="15.jpg" alt="Avatar" class="avatar">
                    <p style="font-size:35px; margin-bottom: 2px; margin-top: 2px">
                        Login
                    </p>
                </div>

                <div class="container">
                    <label for="username"><b>Username</b></label>
                    <input type="text" placeholder="Enter Username" name="username" style="font-size: 16px;" required>

                    <label for="password"><b>Password</b></label>
                    <input type="password" placeholder="Enter Password" name="password" style="font-size: 16px;" required>

                    <button type="login" class="button" name="login">Login</button>
                    <div class="guest-login">
                    </p>
                        <a href="createaccount.php" class="guest-login">Create an Account</a>
                    </div>
                </div>
            </form>
        </div>
    </div>
</body>
</html>