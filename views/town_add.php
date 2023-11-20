<?php
include_once("../db.php"); // Include the Database class file
include_once("../town_city.php");




if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $data = [    
    'name' => $_POST['town_city_name'],
    ];

    // Instantiate the Database and town/city classes
    $database = new Database();
    $townCity = new TownCity($database);
        
    if ($townCity->create($data)){
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

    <title>Add Town or City</title>
</head>
<body>
    <!-- Include the header and navbar -->
    <?php include('../templates/header.html'); ?>
    <?php include('../includes/navbar.php'); ?>

    <div class="content">
    <h1>Add Town or City</h1>
    <form action="" method="post" class="centered-form">
        <label for="town_city_name">Town / City:</label>
        <input type="text" name="town_city_name" id="town_city_name" required>

        <input type="submit" value="Add Town / City">
    </form>
    </div>
    
    <?php include('../templates/footer.html'); ?>
</body>
</html>
