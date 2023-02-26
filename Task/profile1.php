<?php

// connect to the MongoDB server
$mongoClient = new MongoDB\Client("mongodb://localhost:27017");

// select the database and collection
$database = $mongoClient->mydatabase;
$collection = $database->users;

// get the user data from the database
$user = $collection->findOne(['email' => 'user@example.com']);

?>
