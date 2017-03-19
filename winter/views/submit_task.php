<?php
/* Submit a new user to the Users database */

// Connect to the database
include("_header.php");

// Declare variables
$task_type_id		= $_POST[task_type];
$task_type_id 		= mysql_real_escape_string($task_type_id);

$project_id 		= $_POST[project];
$project_id 		= mysql_real_escape_string($project_id);

$start_date 		= $_POST[start_date];
$start_date 		= mysql_real_escape_string($start_date);

$end_date 			= $_POST[end_date];
$end_date 			= mysql_real_escape_string($end_date);

$summary			= $_POST[description];
$summary	 		= mysql_real_escape_string($desc);

$task_table = "INSERT INTO task ( start_date, end_date, summary, project_id, task_type_id ) VALUES ('$start_date', '$end_date', '$summary', '$project_id', '$task_type_id')";

// Send query
if (mysqli_query($db, $project_table)) {
    // Redirect to login page after successful registration
	$_SESSION['success_reg'] = 1;
	header("Location: task_page.php");
} 
else {
    echo "Error: " . $project_table . "<br>" . mysqli_error($db);
}

?>
