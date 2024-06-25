<?php

$servername = "localhost";
$username = "root";
$password = "";
$databaseName = "garmentTrack";

$connection = new mysqli($servername, $username, $password, $databaseName);

if ($connection->connect_error) {
    die("Database connection failed: " . $connection->connect_error);
}
