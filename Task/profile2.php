<?php

// connect to the MongoDB server
$mongoClient = new MongoDB\Client("mongodb://localhost:27017");

// select the database and collection
$database = $mongoClient->mydatabase;
$collection = $database->users;

// get the user data from the database
$user = $collection->findOne(['email' => 'user@example.com']);

// format the user data as HTML
$html = '<div class="profile">';
$html .= '<h1>' . $user->name . '</h1>';
$html .= '<p>Email: ' . $user->email . '</p>';
$html .= '<p>Age: ' . $user->age . '</p>';
$html .= '<p>DOB: ' . $user->dob . '</p>';
$html .= '<p>Contact: ' . $user->contact . '</p>';
$html .= '</div>';

// display the HTML on the profile page
echo $html;

?>
