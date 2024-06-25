<?php
// Linking the config file
require "config/DBconnection.php";
// Linking header
include_once "header.php";

if (isset($_GET['id'])) {
    $measurementId = $_GET['id'];

    // Perform the deletion operation using the measurementId
    $condition = "id = $measurementId";
    $sql = "DELETE FROM measurements WHERE $condition";
    if ($connection->query($sql) === TRUE) {
        echo "Measurement deleted successfully";
    } else {
        echo "Error deleting measurement: " . $connection->error;
    }
}

echo '<meta http-equiv="refresh" content="0;url=measurement_list.php">';
exit;
