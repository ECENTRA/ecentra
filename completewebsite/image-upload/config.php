<?php
// Database configuration
$dbHost     = "localhost";
$dbUsername = "ecentrai_gururaja";
$dbPassword = "Gururaja@369";
$dbName     = "ecentrai_registration";
// Create database connection
$db = new mysqli($dbHost, $dbUsername, $dbPassword, $dbName);
// Check connection
if ($db->connect_error) {
    die("Connection failed: " . $db->connect_error);
}
?>
