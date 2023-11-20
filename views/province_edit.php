<?php
include_once("../db.php"); // Include the Database class file
include_once("../province.php"); // Include the province class file

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // Fetch province data by ID from the database
    $db = new Database();
    $province = new Province($db);
    $provinceData = $province->read($id); // Implement the read method in the province class

    if ($provinceData) {
        // The province data is retrieved, and you can pre-fill the edit form with this data.
    } else {
        echo "Province not found.";
    }
} else {
    echo "Province ID not provided.";
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $data = [
        'id' => $_POST['id'],
        'name' => $_POST['province_name'],
    ];

    $db = new Database();
    $province = new Province($db);

    // Call the edit method to update the province data
    if ($province->update($id, $data)) {
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
    <title>Edit Province</title>
</head>
<body>
    <!-- Include the header and navbar -->
    <?php include('../templates/header.html'); ?>
    <?php include('../includes/navbar.php'); ?>

    <div class="content">
    <h2>Edit Province Information</h2>
    <form action="" method="post">
        <input type="hidden" name="id" value="<?php echo $provinceData['id']; ?>">
        
        <label for="province_name">Province:</label>
        <input type="text" name="province_name" id="province_name" value="<?php echo $provinceData['name']; ?>">
        
        <input type="submit" value="Update">
    </form>
    </div>
    <?php include('../templates/footer.html'); ?>
</body>
</html>
