<?php
include 'connect.php';
if (isset($_POST['submit'])) {
    $user_name = $_POST['user_name'];
    $address = $_POST['address'];
    $current_readings = $_POST['current_readings'];
    $due_date = $_POST['due_date'];

    $sql = "INSERT INTO waterbills (user_name, address, current_readings, due_date) VALUES ('$user_name', '$address', '$current_readings', '$due_date')";
    $result = mysqli_query($conn, $sql);
    if ($result) {
        echo "";
    } else {
        die(mysqli_error($conn));
    }
}
?>
<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title>New Client</title>
    <style>
        .form-container {
            max-width: 500px;
            margin: 0 auto;
            padding: 20px;
        }
    </style>

</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">AquaTrack</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="home.php">Home</a>
                    </li>
                    
                </ul>
            </div>
        </div>
    </nav>

    <div class="form-container my-5">
        <h2 class="text-center text-light bg-danger">Create New Client</h2>
        <form method="post">
            
            <div class="mb-3">
                <label class="form-label">Name</label> 
                <input type="text" class="form-control" name="user_name" value="" required>
            </div>
            <div class="mb-3">
                <label class="form-label">Address</label>
                <input type="text" class="form-control" name="address" value="" required>
            </div>
            <div class="mb-3">
                <label class="form-label">Meter Reading</label>
                <input type="text" class="form-control" name="current_readings" value="" required>
            </div>
            <div class="mb-3">
                <label class="form-label">Due Date</label>
                <input type="date" class="form-control" name="due_date" value="" required>
            </div>
            <div class="row mb-3">
                <div class="col-6">
                    <button type="submit" class="btn btn-primary w-100" name="submit">Submit</button>
                </div>
                <div class="col-6">
                    <a class="btn btn-outline-primary w-100" href="home.php" role="button">Cancel</a>
                </div>
            </div>
        </form>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

</body>
</html>