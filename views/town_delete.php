<?php
include_once("../db.php"); // Include the Database class file
include_once("../town_city.php"); // Include the Town/City class file

if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET['id'])) {
    $id = $_GET['id']; // Retrieve the 'id' from the URL

    // Instantiate the Database and Town/City classes
    $db = new Database();
    $townCity = new TownCity($db);

    // Call the delete method to delete the town/city record
    if ($townCity->delete($id)) {
        echo "Record deleted successfully.";
    } else {
        echo "Failed to delete record.";
    }
}
?>