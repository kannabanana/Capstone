<?php
/* Submit a new user to the Users database */

// Connect to database
include 'database_configuration.php';

// Declare variables
$user_name        = $_POST[username];
$password        = $_POST[password];
$hashed_password = base64_encode(hash('sha256', $password));

// Define query
$sql = "INSERT INTO Users (user_name, password) VALUES ('$username', '$hashed_password')";

// Send query
if (mysqli_query($conn, $sql)) {
    // Redirect to login page after successful registration
header("homepage.php");

} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}

// Close connection
$conn->close();
?>
