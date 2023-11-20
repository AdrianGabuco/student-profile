<?php
include_once("../db.php"); // Include the Database class file
include_once("../town_city.php"); // Include the Town/City class file

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // Fetch town/city data by ID from the database
    $db = new Database();
    $townCity = new TownCity($db);
    $townCityData = $townCity->read($id); // Implement the read method in the Town/City class

    if ($townCityData) {
        // The town or city data is retrieved, and you can pre-fill the edit form with this data.
    } else {
        echo "Town/City not found.";
    }
} else {
    echo "Town/City ID not provided.";
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $data = [
        'id' => $_POST['id'],
        'name' => $_POST['town_city_name'],
    ];

    $db = new Database();
    $townCity = new TownCity($db);

    // Call the edit method to update the town/city data
    if ($townCity->update($id, $data)) {
        echo "Record updated successfully.";
    } else {
        echo "Failed to update the record.";
    }
}
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="../css/styles.css">
    <title>Edit Town or City</title>
</head>
<body>
    <!-- Include the header and navbar -->
    <?php include('../templates/header.html'); ?>
    <?php include('../includes/navbar.php'); ?>

    <div class="content">
    <h2>Edit Town/City Information</h2>
    <form action="" method="post">
        <input type="hidden" name="id" value="<?php echo $townCityData['id']; ?>">
        
        <label for="town_city_name">Town / City:</label>
        <input type="text" name="town_city_name" id="town_city_name" value="<?php echo $townCityData['name']; ?>">
        
        <input type="submit" value="Update">
    </form>
    </div>
    <?php include('../templates/footer.html'); ?>
</body>
</html>
