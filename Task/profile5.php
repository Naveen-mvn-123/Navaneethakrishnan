<?php
// Connect to the MongoDB database
$mongo = new MongoDB\Client("mongodb://localhost:27017");

// Select the database and collection
$db = $mongo->mydb;
$collection = $db->users;

// Get the updated data from the front-end
$email = $_POST['email'];
$name = $_POST['name'];
$age = $_POST['age'];

// Update the user data in the database
$updateResult = $collection->updateOne(
    ['email' => $email],
    ['$set' => ['name' => $name, 'age' => $age]]
);

// Check if the update was successful
if ($updateResult->getModifiedCount() == 1) {
    // Send a success response back to the front-end
    $response = array('status' => 'success');
    echo json_encode($response);
} else {
    // Send an error response back to the front-end
    $response = array('status' => 'error', 'message' => 'Failed to update user data.');
    echo json_encode($response);
}
?>
