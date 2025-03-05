<?php
session_start();

if (!isset($_SESSION['user_id'])) {
    header("Location: login.html");
    exit();
}

// Continue with dashboard content...
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <!-- Include your dashboard code here -->
</head>
<body>
    <h1>Welcome to the Dashboard</h1>
    <a href="logout.php">Logout</a>
</body>
</html>
