<?php
// Load environment variables from a .env file if using one
// require 'vendor/autoload.php';
// $dotenv = Dotenv\Dotenv::createImmutable(__DIR__);
// $dotenv->load();

// Database connection parameters
$host = 'localhost';
$username = 'Admin';
$password = '12Admin@@';
$dbname = 'paylodb';

// Create connection
$connection = new mysqli($host, $username, $password, $dbname);

// Check connection
if ($connection->connect_error) {
    http_response_code(500);
    die(json_encode(array("error" => "Connection failed: " . $connection->connect_error)));
}

// Fetch users data
$sql = "SELECT email, phone FROM users";
$result = $connection->query($sql);

if (!$result) {
    http_response_code(500);
    echo json_encode(array("error" => "Error fetching users: " . $connection->error));
    $connection->close();
    exit();
}

$users = array();
while ($row = $result->fetch_assoc()) {
    $users[] = $row;
}

header('Content-Type: application/json');
echo json_encode($users);

// Close the database connection
$connection->close();
?>
