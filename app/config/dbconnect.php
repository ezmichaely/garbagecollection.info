<?php
$dbServername = "localhost";
$dbUsername = "root";
$dbPassword = "";
$dbName = "garbagecollection.info";

$conn = mysqli_connect($dbServername, $dbUsername, $dbPassword, $dbName);

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
// echo "Database Connection is Successful!";

session_start();
