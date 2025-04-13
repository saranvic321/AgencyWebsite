<?php
// Connection variables
$servername = "localhost";
$username = "root"; // default for XAMPP
$password = ""; // default is no password in XAMPP
$database = "contactformdata";

// Create connection
$conn = new mysqli($servername, $username, $password, $database);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Get values from form
$name = $_POST['name'];
$email = $_POST['email'];
$phone = $_POST['phone'];
$message = $_POST['message'];

// Insert into table
$sql = "INSERT INTO contactformdata (name, email, phone, message, submitted_at) 
        VALUES ('$name', '$email', '$phone', '$message', NOW())";

if ($conn->query($sql) === TRUE) {
    echo "Message submitted successfully!";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

// Close connection
$conn->close();
?>
