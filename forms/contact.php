<?php
$servername = "localhost";  // Change if needed
$username = "root";         // Your MySQL username
$password = "";             // Your MySQL password
$dbname = "gaugyan_db";     // Your database name

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Get form data
$name = $_POST['name'];
$email = $_POST['email'];
$subject = $_POST['subject'];
$message = $_POST['message'];

// Insert into database
$sql = "INSERT INTO contact_form (name, email, subject, message) VALUES (?, ?, ?, ?)";
$stmt = $conn->prepare($sql);
$stmt->bind_param("ssss", $name, $email, $subject, $message);

if ($stmt->execute()) {
    echo "success"; // This can be used for AJAX success handling
} else {
    echo "error: " . $conn->error;
}

// Close connection
$stmt->close();
$conn->close();
?>
