<?php
/* Submit a new user to the Users database */

// Connect to the database
include("_header.php");
//Query User_ID from first and last name
$first = $_POST[first];
$last = $_POST[last];
// Check to make sure first and last name user exists in employee information
if ($result = $db->query("SELECT user_id from employee_information WHERE first_name = '$first' and last_name = '$last'")) {
	//Store user id associated with that first and last name
	while($obj = $result->fetch_object()){
		$user_id = $obj->user_id;
	}

	// Declare variables needed for assignment table and escape dangerous characters
	$task_id	= $_POST[task_name];
	$task_id 	= mysql_real_escape_string($task_id);

	$user_id 	= mysql_real_escape_string($user_id);

	$hours 		= $_POST[hours];
	$hours 		= mysql_real_escape_string($hours);


	$assignment_table = "INSERT INTO assignments ( assignment_id, task_id, user_id, hours) VALUES ( NULL , '$task_id', '$user_id', '$hours')";

	// Send query
	if (mysqli_query($db, $assignment_table)) {
		// Redirect to login page after successful registration
		$_SESSION['success_reg'] = 1;
		header("Location: assignments.php");
	} 
	else {
		echo "Error: " . $assignment_table . "<br>" . mysqli_error($db);
	}
}
//If the first and last name are not found in the employee information table error. 
else {
    echo "Error: No User Found <br>" . mysqli_error($db);
}
?>
