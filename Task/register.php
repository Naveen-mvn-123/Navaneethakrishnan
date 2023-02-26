<?php
// Connect to MySQL database
$host = 'localhost';
$user = 'username';
$pass = 'password';
$db = 'database';
$conn = new mysqli($host, $user, $pass, $db);
if ($conn->connect_error) {
    die('Connection failed: ' . $conn->connect_error);
}

// Get form data
$name = mysqli_real_escape_string($conn, $_POST['name']);
$email = mysqli_real_escape_string($conn, $_POST['email']);
$password = mysqli_real_escape_string($conn, $_POST['password']);

// Validate user input
if (empty($name) || empty($email) || empty($password)) {
    $response = array('success' => false, 'message' => 'Please fill all the fields!');
    echo json_encode($response);
} elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    $response = array('success' => false, 'message' => 'Please enter a valid email
