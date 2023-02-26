<?php
// Connect to MongoDB
$mongo = new MongoDB\Driver\Manager("mongodb://localhost:27017");

// Retrieve updated data from AJAX request
$name = $_POST['name'];
$age = $_POST['age'];
$contact = $_POST['contact'];

// Construct update query
$filter = ['email' => $_SESSION['email']];
$update = ['$set' => ['name' => $name, 'age' => $age, 'contact' => $contact]];
$options = ['multi' => false, 'upsert' => false];

// Update user data in MongoDB
$result = $mongo->executeBulkWrite('test.users', [new MongoDB\Driver\BulkWrite('test.users', [$update], $filter, $options)]);

// Check if update was successful
if ($result->getModifiedCount() > 0) {
  // Redirect to profile page with success message
  header('Location: profile.php?success=true');
} else {
  // Redirect to profile page with error message
  header('Location: profile.php?success=false');
}
?>
