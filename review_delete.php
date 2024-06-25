<?php
// Linking the config file
require "config/DBconnection.php";
// Linking header
include_once "header.php";

if (isset($_GET['id'])) {
    $feedbackId = $_GET['id'];

    // Perform the deletion operation using the feedbackId
    $condition = "id = $feedbackId";
    $sql = "DELETE FROM review WHERE $condition";
    if ($connection->query($sql) === TRUE) {
        echo "feedback deleted successfully";
    } else {
        echo "Error deleting feedbackId: " . $connection->error;
    }
}

echo '<meta http-equiv="refresh" content="0;url=review_read.php">';
exit;
