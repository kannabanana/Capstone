<?php
/* Submit a new user to the Users database */

// Connect to the database
include("_header.php");

// Declare variables
$user_name        = $_POST[user_name];
$password        = $_POST[password];
$hashed_password = base64_encode(hash('sha256', $password));

//do{
//generate random user id
$user_id = rand(1, 999999999);

//Query database to make sure ID has not been used already
//$id_check = "SELECT * FROM log_in WHERE user_id = '$user_id'";

//repeat loop until the generated user ID is not found in the database
//}while(mysqli_query($db, $id_check));

//echo "through loop";

$sql = "INSERT INTO log_in (user_id, user_name, password) VALUES ('$user_id','$user_name', '$hashed_password')";

// Send query
if (mysqli_query($db, $sql)) {
    // Redirect to login page after successful registration
	header("homepage.html");
} 
else {
    echo "Error: " . $sql . "<br>" . mysqli_error($db);
}

?>
