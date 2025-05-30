<?php
// Database connection
$servername = "localhost";
$username = "root"; // Change as needed
$password = ""; // Change as needed
$dbname = "registration_db";

$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Get form data
$name = $_POST['name'];
$email = $_POST['email'];
$password = password_hash($_POST['password'], PASSWORD_BCRYPT); // Encrypt password
$phone = $_POST['phone'];
$dob = $_POST['dob'];
$gender = $_POST['gender'];
$address = $_POST['address'];

// Insert into database
$sql = "INSERT INTO users (name, email, password, phone, dob, gender, address)
        VALUES ('$name', '$email', '$password', '$phone', '$dob', '$gender', '$address')";

if ($conn->query($sql) === TRUE) {
    echo "Registration successful!";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>