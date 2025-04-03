<?php
$servername = "localhost";
$username = "root"; // Change if needed
$password = ""; // Change if needed
$database = "test_db";

$conn = new mysqli($servername, $username, $password, $database);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$user = $_POST['username'];
$pass = $_POST['password'];

// Vulnerable SQL query
$query = "SELECT * FROM users WHERE username='$user' AND password='$pass'";
$result = $conn->query($query);

if ($result->num_rows > 0) {
    echo "Login successful! Welcome, " . $user;
} else {
    echo "Invalid credentials!";
}

$conn->close();
?>
