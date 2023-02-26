<?php
// MongoDB database information
$mongoHost = 'localhost';
$mongoPort = '27017';
$mongoDatabase = 'mydatabase';
$mongoCollection = 'mycollection';

// Create a new MongoDB client object
$client = new MongoDB\Client("mongodb://$mongoHost:$mongoPort");

// Select the database and collection
$collection = $client->$mongoDatabase->$mongoCollection;
?>
