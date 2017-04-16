<?php
/* Submit a new user to the Users database */

// Connect to the database
include("_header.php");

	// Declare variables needed for assignment table and escape dangerous characters
	$task_id	= $_POST[task_name];
	$task_id 	= mysql_real_escape_string($task_id);

	$user_id 	= $_SESSION["uid"];
	
	echo $user_id;

	$hours 		= $_POST[hours];
	$hours 		= mysql_real_escape_string($hours);
	
	$desc		= $_POST[description];
	$desc 		= mysql_real_escape_string($desc);
	
	$date 		= $_POST['date'];
	$date 		= mysql_real_escape_string($date);
	
	

	$log_table = "INSERT INTO log_task (log_id, user_id, task_id, hours, description, date) VALUES ( NULL , '$user_id','$task_id', '$hours', '$desc', '$date')";

	// Send query
		if (mysqli_query($db, $log_table)) {
			// Redirect to login page after successful registration
			$_SESSION['success_reg'] = 1;
			header("Location: log_hours.php");
		} 
		else {
			echo "Error: " . $log_table . "<br>" . mysqli_error($db);
		} 
?>
