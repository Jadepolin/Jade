<?php
include 'connect.php';

$id = "";
$user_name = "";
$address = "";
$current_readings = "";
$due_date = "";


if ($_SERVER['REQUEST_METHOD'] == 'GET') {  
    if (!isset($_GET["id"])) {
        header("location: /waterbill/home.php");
        exit;
    }
    $id = $_GET["id"];

    // sql code
    $sql = "SELECT * FROM waterbills WHERE id ='$id'";
    $result = $conn->query($sql);
    $row = $result->fetch_assoc();

    if (!$row) {
        header("location: /waterbill/home.php");
        exit;
    }

    $user_name = $row["user_name"];
    $address = $row["address"];
    $current_readings = $row["current_readings"];
    $due_date = $row["due_date"];
} else {
    
    $id = $_POST['id'];
    $user_name = $_POST['user_name'];
    $address = $_POST['address'];
    $current_readings = $_POST['current_readings'];
    $due_date = $_POST['due_date'];

    // Update user info to the database
    $sql = "UPDATE waterbills SET user_name = '$user_name', Address = '$address', current_readings = '$current_readings', due_date = '$due_date' WHERE id = $id";
    $result = $conn->query($sql);
}
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title>Hello, world!</title>
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
        <h2 class="text-center text-light bg-success">Update Client</h2>
        <form method="post">
            <input type="hidden" name="id" value="<?php echo $id; ?>">
            <div class="mb-3">
                <label class="form-label">Name</label>
                <input type="text" class="form-control" name="user_name" value="<?php echo $user_name; ?>" required>
            </div>
            <div class="mb-3">
                <label class="form-label">Address</label>
                <input type="text" class="form-control" name="address" value="<?php echo $address; ?>">
            </div>
            <div class="mb-3">
                <label class="form-label">Meter Reading</label>
                <input type="text" class="form-control" name="current_readings" value="<?php echo $current_readings; ?>">
            </div>
            <div class="mb-3">
                <label class="form-label">Due Date</label>
                <input type="date" class="form-control" name="due_date" value="<?php echo $due_date; ?>">
            </div>
            <div class="row mb-3">
                <div class="col-6">
                <button type="submit" class="btn btn-primary w-100">Submit</button>
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