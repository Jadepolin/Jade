<?php
$conn = mysqli_connect('localhost:3306', 'root', 'root', 'waterbills');

    // Check connection
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }
?>