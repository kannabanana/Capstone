<?php
/* Main login script */

// Connect to database
include("_header.php");

// Declare variables
$username        = $_POST[username];
$password        = $_POST[password];
$hashed_password = base64_encode(hash('sha256', $password));

// Clean username input
$cleanUser = mysqli_real_escape_string($db, $username);

// Clean password input and encrypt for database comparison
$cleanPassword = mysqli_real_escape_string($db, base64_encode(hash('sha256', $password)));

// Define query
$sql = "SELECT * FROM log_in WHERE user_name = '$cleanUser' AND password = '$cleanPassword'";
echo "about to query";
// Query to find user in database
if ($query = mysqli_query($db, $sql)) {

    // Fetch row and create into array
    $userRow = mysqli_fetch_array($query);

    // Check cid for valid account info
    if (strlen($userRow[0]) < 1) {
        die ('Invalid Username or Password');
    }

    // Create session variables
    $_SESSION['uid']      = $userRow[0];

    // Redirect to user homepage
header("Location: http://web.engr.oregonstate.edu/~onealja/Capstone/capstone/winter/views/homepage.html");

} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($db);
}

// Close connection
$db->close();
?>
