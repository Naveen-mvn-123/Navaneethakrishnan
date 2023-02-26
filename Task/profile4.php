<?php
// Retrieve the updated user data from the AJAX request
$updateData = $_POST['updateData'];

// MongoDB database information
$mongoHost = 'localhost';
$mongoPort = '27017';
$mongoDatabase = 'mydatabase';
$mongoCollection = 'mycollection';

// Create a new MongoDB client object
$client = new MongoDB\Client("mongodb://$mongoHost:$mongoPort");

// Select the database and collection
$collection = $client->$mongoDatabase->$mongoCollection;

// Update the user data in the database
$result = $collection->updateOne(
    ['email' => $updateData['email']],
    ['$set' => [
        'name' => $updateData['name'],
        'age' => $updateData['age'],
        'dob' => $updateData['dob'],
        'contact' => $updateData['contact']
    ]]
);

// Check if the update was successful
if ($result->getModifiedCount() == 1) {
    echo 'success';
} else {
    echo 'error';
}
?>
