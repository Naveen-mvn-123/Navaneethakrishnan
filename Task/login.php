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
$email = mysqli_real_escape_string($conn, $_POST['email']);
$password = mysqli_real_escape_string($conn, $_POST['password']);

// Validate user input
if (empty($email) || empty($password)) {
    $response = array('success' => false, 'message' => 'Please fill all the fields!');
    echo json_encode($response);
} else {
    // Check if email and password match with the data stored in the MySQL database
    $stmt = $conn->prepare('SELECT * FROM users WHERE email = ?');
    $stmt->bind_param('s', $email);
    $stmt->execute();
    $result = $stmt->get_result();
    $user = $result->fetch_assoc();
    if ($user && password_verify($password, $user['password'])) {
        // Create session for the
