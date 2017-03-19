<?php
/* Submit a new user to the Users database */

// Connect to the database
include("_header.php");

// Declare variables
$project_type_id	= $_POST[project_type];
$project_type_id 	= mysql_real_escape_string($project_type_id);

$grant_id 			= $_POST[grant_type];
$grant_id 			= mysql_real_escape_string($grant_id);

$start_date 		= $_POST[start_date];
$start_date 		= mysql_real_escape_string($start_date);

$end_date 			= $_POST[end_date];
$end_date 			= mysql_real_escape_string($end_date);

$desc 				= $_POST[description];
$desc 	 			= mysql_real_escape_string($desc);

$project_table = "INSERT INTO project (project_type_id, grant_id, start_date, end_date, desc) VALUES ('$project_type_id','$grant_id', '$start_date', '$end_date', '$desc')";

// Send query
if (mysqli_query($db, $project_table)) {
    // Redirect to login page after successful registration
	$_SESSION['success_reg'] = 1;
	header("Location: project_page.php");
} 
else {
    echo "Error: " . $project_table . "<br>" . mysqli_error($db);
}

?>
