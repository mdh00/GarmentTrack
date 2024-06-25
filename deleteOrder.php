<?php

if(isset($_GET["id"])){
    $id = $_GET["id"];

    $servername = "localhost";
    $username = "root";
    $password = "";
    $database = "garmentTrack";
  
    $connection = new mysqli($servername, $username, $password, $database);
  
    if ($connection->connect_error) {
      die("Connection failed: " . $connection->connect_error);
    }

    $sql = "DELETE FROM orders WHERE id=$id";
    $connection->query($sql);

}

header("location: order.php");
exit;
