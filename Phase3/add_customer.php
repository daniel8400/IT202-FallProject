<?php
// Get the video data
$fname = filter_input(INPUT_POST,'fname');
$lname = filter_input(INPUT_POST,'lname');
$email = filter_input(INPUT_POST, 'email');
$address = filter_input(INPUT_POST, 'address');
$city = filter_input(INPUT_POST, 'city');
$state = filter_input(INPUT_POST, 'state');
$zip = filter_input(INPUT_POST, 'zip');
$reference = filter_input(INPUT_POST,'where');
 
// Validate inputs
if ($fname == null || $lname == null || $email == null || $address == null
|| $city == null || $state == null || $zip == null || $reference == null) {
    $error = "Invalid product data. Check all fields and try 
    again.";
    include('database_error.php'); 
} else {
    require_once('database.php');
// Add the video to the database  
$query = 'INSERT INTO customers
(firstName, lastName, emailAddress, streetAddress, city, state, zipCode, reference)
VALUES
(:fname, :lname, :email, :address, :city, :state, :zip, :reference)';
$statement = $db->prepare($query);
$statement->bindValue(':fname', $fname);
$statement->bindValue(':lname', $lname);
$statement->bindValue(':email', $email);
$statement->bindValue(':address', $address);
$statement->bindValue(':city', $city);
$statement->bindValue(':state', $state);
$statement->bindValue(':zip', $zip);
$statement->bindValue(':reference', $reference);
$statement->execute();
$statement->closeCursor();

// Display the videos
include('view_customers.php');
}
?>