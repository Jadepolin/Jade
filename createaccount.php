<?php
include 'connect.php';
if (isset($_POST['submit'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $sql = "INSERT INTO users (username, password) VALUES ('$username', '$password')";
    $result = mysqli_query($conn, $sql);
    if ($result) {
        header("Location: index.php");
    } else {
        die(mysqli_error($conn));
    }
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Create Account Page</title>
    <link rel="stylesheet" href="style1.css">
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
                        Create Account
                    </p>
                </div>

                <div class="container">
                    <label for="username"><b>Username</b></label>
                    <input type="text" placeholder="Enter Username" name="username" style="font-size: 16px;" required>

                    <label for="password"><b>Password</b></label>
                    <input type="password" placeholder="Enter Password" name="password" style="font-size: 16px;" required>

                    <button type="login" class="button" name="submit">Submit</button>
                        <div class="guest-login">
                        <a href="index.php" class="guest-login">Cancel</a>
                    </div>
                </div>
            </form>
        </div>
    </div>
</body>
</html>