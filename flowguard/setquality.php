<?php
// CORS headers
header("Access-Control-Allow-Origin: http://192.168.254.106:PORT"); // Replace PORT with your actual port
header("Access-Control-Allow-Methods: GET, POST, OPTIONS");
header("Access-Control-Allow-Headers: Content-Type");
header("Access-Control-Allow-Credentials: true");
header("Content-Type: application/json");

// Handle preflight requests
if ($_SERVER['REQUEST_METHOD'] === 'OPTIONS') {
    http_response_code(200);
    exit();
}
// Your existing sensor data code here
// ...

$servername = "34.30.45.205";
$username = "flowguard";
$password = "cpe12345";
$dbname = "flowguard";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Get the data from the HTTP request
$turbidity = $_POST['turbidity'];
$ph_value = $_POST['ph_value'];

// Prepare and bind
$stmt = $conn->prepare("INSERT INTO flowg (PH_level, Turbidity, DateTime) VALUES (?, ?, NOW())");
if ($stmt === false) {
    die("Prepare failed: " . $conn->error);
}

// Bind parameters
$stmt->bind_param("dd", $ph_value, $turbidity);

// Execute the prepared statement
if ($stmt->execute()) {
    echo "New records created successfully";
} else {
    echo "Error: " . $stmt->error;
}

// Close the statement and connection
$stmt->close();
$conn->close();
?>