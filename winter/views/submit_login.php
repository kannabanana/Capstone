<?php
/* Main login script */

// Connect to database
include("_header.php");

// Declare variables
$user_name        = $_POST[user_name];
$password        = $_POST[password];
$hashed_password = base64_encode(hash('sha256', $password));
$clamped_pass	= substr($hashed_password, 0, 40);
// Clean username input
$cleanUser = mysqli_real_escape_string($db, $user_name);

// Clean password input and encrypt for database comparison
//$cleanPassword = mysqli_real_escape_string($db, base64_encode(hash('sha256', $password)));

// Define query
$sql = "SELECT user_id FROM log_in WHERE user_name = '$cleanUser' AND password = '$clamped_pass'";

// Query to find user in database
if ($query = $db->query($sql)) {

    // Fetch row and create into array
    $user_row = $query->fetch_object();

    // Check cid for valid account info
    if (empty($user_row)) {
        die ('Invalid Username or Password');
    }

    // Create session variables
    $_SESSION['uid'] = $user_row->user_id;
    // Redirect to user homepage
	header("Location: landing.php");
	exit();
}else {
    echo "Error: " . $sql . "<br>" . mysqli_error($db);
}

?>