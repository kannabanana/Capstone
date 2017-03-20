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

$desc				= $_POST[description];
$desc				= mysql_real_escape_string($desc);

$name				= $_POST[name];
$name				= mysql_real_escape_string($name);

$m_id				= $_POST[milestone];
$m_id				= mysql_real_escape_string($m_id);

//desc is an SQL keyword and must be surrounded by back ticks (also known as a grave accent)
$task_table = "INSERT INTO task ( name, start_date, end_date, `desc`, project_id, m_id, task_type_id ) VALUES ('$name', '$start_date', '$end_date', '$desc', '$project_id', '$m_id', '$task_type_id')";

// Send query
if (mysqli_query($db, $task_table)) {
    // Redirect to login page after successful registration
	$_SESSION['success_reg'] = 1;
	header("Location: task_page.php");
} 
else {
    echo "Error: " . $task_table . "<br>" . mysqli_error($db);
}

?>
