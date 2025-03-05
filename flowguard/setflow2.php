<?php
// Example for connecting to a MySQL database and saving data

$servername = "34.30.45.205";
$username = "flowguard";  // Replace with your MySQL username
$password = "cpe12345";  // Replace with your MySQL password
$dbname = "flowguard";  // Replace with your database name

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$flowrate = $_POST['flowrate2'];
$totalMilliLitres = $_POST['totalMilliLitres'];

// Insert data into database
$sql = "INSERT INTO flow2 (fr2, Consumptions) VALUES ('$flowrate', '$totalMilliLitres')";

if ($conn->query($sql) === TRUE) {
    echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>