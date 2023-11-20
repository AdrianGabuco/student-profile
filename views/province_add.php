<?php
include_once("../db.php"); // Include the Database class file
include_once("../province.php");




if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $data = [    
    'name' => $_POST['province_name'],
    ];

    // Instantiate the Database and province classes
    $database = new Database();
    $province = new Province($database);
        
    if ($province->create($data)){
        echo "Record inserted successfully.";
    } else {
        echo "Failed to insert Record.";
    }
}

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="../css/styles.css">

    <title>Add Province</title>
</head>
<body>
    <!-- Include the header and navbar -->
    <?php include('../templates/header.html'); ?>
    <?php include('../includes/navbar.php'); ?>

    <div class="content">
    <h1>Add Province</h1>
    <form action="" method="post" class="centered-form">
        <label for="province_name">Province:</label>
        <input type="text" name="province_name" id="province_name" required>

        <input type="submit" value="Add Province">
    </form>
    </div>
    
    <?php include('../templates/footer.html'); ?>
</body>
</html>
