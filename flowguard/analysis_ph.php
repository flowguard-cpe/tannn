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

// get_ph_data.php
header("Access-Control-Allow-Origin: *"); // Allow all domains
header("Access-Control-Allow-Methods: GET, POST, OPTIONS"); // Allow specific HTTP methods
header("Access-Control-Allow-Headers: Content-Type, Authorization");
// Database connection
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

// Get the ID from the request
$id = isset($_GET['id']) ? intval($_GET['id']) : 0;

// Fetch data from the database based on the ID
$sql = "SELECT * FROM ph_null WHERE id = $id";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // Output data as JSON
    $row = $result->fetch_assoc();
    echo json_encode($row);
} else {
    echo json_encode(["error" => "No data found for ID: $id"]);
}

$conn->close();
?>