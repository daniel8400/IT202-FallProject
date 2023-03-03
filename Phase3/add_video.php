<?php
// Get the video data
$category_id = filter_input(INPUT_POST, 'videoCategory_id', 
                            FILTER_VALIDATE_INT);
$code = filter_input(INPUT_POST, 'code');
$name = filter_input(INPUT_POST, 'tname');
$description = filter_input(INPUT_POST, 'tdescription');
$price = filter_input(INPUT_POST, 'tprice', FILTER_VALIDATE_FLOAT);
 
// Validate inputs
if ($category_id == null || $category_id == false || $code == null
    || $name == null || $description == null || $price == null || $price == false ) {
    $error = "Invalid product data. Check all fields and try 
    again.";
    include('database_error.php'); 
} else {
    require_once('database.php');
// Add the video to the database  
$query = 'INSERT INTO videos
(videoCategoryID, videoCode, videoName, description, price)
VALUES
(:videoCategory_id, :videoCode, :videoName, :description, :price)';
$statement = $db->prepare($query);
$statement->bindValue(':videoCategory_id', $category_id);
$statement->bindValue(':videoCode', $code);
$statement->bindValue(':videoName', $name);
$statement->bindValue(':description', $description);
$statement->bindValue(':price', $price);
$statement->execute();
$statement->closeCursor();

// Display the videos
include('view_videos.php');
}
?>
