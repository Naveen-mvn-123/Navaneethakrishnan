<?php

// connect to the MongoDB server
$mongoClient = new MongoDB\Client("mongodb://localhost:27017");

// select the database and collection
$database = $mongoClient->mydatabase;
$collection = $database->users;

?>
