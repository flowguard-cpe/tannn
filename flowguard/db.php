<?php
$servername = "34.30.45.205"; // Replace with your Cloud SQL instance details
$username = "flowguard"; // Replace with your database username
$password = "cpe12345"; // Replace with your database password
$dbname = "flowguard"; // Replace with your database name

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>
