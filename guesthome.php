<?php
//restricts user to enter without login
session_start();
if (!isset($_SESSION["username"])) {
    header("location:login.php");
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UFT-8">
    <meta http-equiv="X-UA-Campatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Water Billing System</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</head>
<body style="background-color: #e7feff;">
    <?php $sql = "SELECT * FROM waterbills"; ?>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">AquaTrack</a>
            <button class="navbar-toggler" type="button">
            </button>
            <div class="collapse navbar-collapse">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="/waterbill/guesthome.php">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/waterbill/index.php">Logout</a>
                    </li>

                </ul>
            </div>
        </div>
    </nav>
    <div class="logout my-2">
        <a class="btn btn-danger" href="logout.php" role="button"><i class="fa-solid fa-right-from-bracket"></i>logout</a>
        <br>
    </div>
    <div class="container my-2">
        <div class="row justify-content-end">
            <div class="col-md-6">
                <nav class="navbar">
                    <div class="container-fluid">
                        <?php
                        if (isset($_GET['search'])) {
                            $user_name = $_GET['search_name'];
                            $sql = "SELECT * FROM waterbills WHERE user_name LIKE '$user_name%'";
                        } else {
                            $sql = "SELECT * FROM waterbills";
                        }
                        ?>
                        <form class="d-flex" method="GET">
                            <input class="form-control me-2" name="search_name" type="text" placeholder="Search" aria-label="Search" name="search"<?php if (isset($_GET['search'])) { echo $_GET['search']; } ?>>
                            <button class="btn btn-outline-success" name="search" type="submit"><i class="fa-sharp fa-solid fa-magnifying-glass" style="color: #000000;"></i></button>

                        </form>
                    </div>
                </nav>
            </div>
        </div>
    </div>

    <div class="container my-0">
        <h2>List of Clients</h2>
        <table class="table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Address</th>
                    <th>Meter Readings</th>
                    <th>BillingAmount</th>
                    <th>Due-Date</th>
                </tr>
            </thead>
            <tbody>
                <?php

                $HOSTNAME = 'localhost:3306';
                $USERNAME = 'root';
                $PASSWORD = 'root';
                $DATABASE = 'waterbills';

                // Connect to database
                $conn = mysqli_connect($HOSTNAME, $USERNAME, $PASSWORD, $DATABASE);

                // Check connection
                if ($conn->connect_error) {
                    die("Connection failed" . $conn ->connect_error);
                }
                // read all row from database table
                $result = $conn->query($sql);

                if (!$result) {
                    die("Invalid querry: " . $conn->error);

                }

                while ($row = $result->fetch_assoc()) {
                    $billing_amount = $row['current_readings'] * 9;

                    echo "
                    <tr>
                       <td>{$row['id']}</td>
                       <td>{$row['user_name']}</td>
                       <td>{$row['address']}</td>
                       <td>{$row['current_readings']}</td>
                       <td>₱$billing_amount.00</td>
                       <td>{$row['due_date']}</td>
                </tr>
                ";
                }

                ?>
            </tbody>
        </table>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

</body>
</html>