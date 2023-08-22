<?php

$host = "localhost"; // Change this to your database host
$databaseusername = "root"; // Change this to your database username
$dbconnectpassword = ""; // Change this to your database password
$dbconnectname = $_SESSION["user_dbname"]; // Change this to your database name

$conn = mysqli_connect($host, $databaseusername, $dbconnectpassword, $dbconnectname);
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
?>