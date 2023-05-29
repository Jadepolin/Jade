<?php
if (isset($_GET["id"])) {
    $id = $_GET["id"];

    $servername = "localhost:3306";
    $username = "root";
    $password = "root";
    $database = "waterbills";

    $connection = new mysqli($servername, $username, $password, $database);

    if ($connection->connect_error) {
        die("Connection failed: " . $connection->connect_error);
    }

    $sql = "DELETE FROM waterbills WHERE id = $id";
    $connection->query($sql);
    $connection->close();
}

header("Location: /waterbill/home.php");
exit;
?>