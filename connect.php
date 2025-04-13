<?php
// Database connection settings
$servername = "localhost";
$username = "root"; // Use your DB username
$password = "";     // Use your DB password
$dbname = "contactformdata";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Get data from form (POST method)
$name = $_POST['name'];
$email = $_POST['email'];
$phone = $_POST['phone'];
$message = $_POST['message'];

// Simple validation (optional)
if (empty($name) || empty($email) || empty($message)) {
    echo "Please fill in all required fields.";
    exit;
}

// Prepare and bind
$stmt = $conn->prepare("INSERT INTO submissions (name, email, phone, message) VALUES (?, ?, ?, ?)");
$stmt->bind_param("ssss", $name, $email, $phone, $message);

// Execute the statement
if ($stmt->execute()) {
    echo "Message submitted successfully!";
} else {
    echo "Error: " . $stmt->error;
}

// Close connections
$stmt->close();
$conn->close();
?>
