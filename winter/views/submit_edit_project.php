<?php
/* Submit a new project to the project table */

// Connect to the database
include("_header.php");

// Declare variables
$project_id = $_SESSION["pid"]; 									//pid set in session on display_project page

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

$name				= $_POST[name];
$name				= mysql_real_escape_string($name);


if($duration = $db ->query("SELECT DATEDIFF('$end_date', '$start_date') AS duration")){
	//returns the integer as a column called duration defined in the query above
	$obj1 = $duration->fetch_object();
	$duration = $obj1->duration;
}
else{
	echo "failed to calculate duration";
}

//desc is an SQL keyword and must be surrounded by back ticks (also known as a grave accent)
$project_table = "UPDATE project SET project_type_id = '$project_type_id', grant_id = '$grant_id', start_date = '$start_date', end_date = '$end_date', `desc` = '$desc', name = '$name' WHERE project_id = $project_id";

//query to insert the task into the gantt_tasks table


// Send project query
if (mysqli_query($db, $project_table)) {
	//query to insert the task into the gantt_tasks table
	$gantt_tasks = "UPDATE gantt_tasks SET text = '$desc', start_date = '$start_date', duration = '$duration' WHERE project_id = $project_id AND parent = 0";
} 
else {
    echo "Error: " . $project_table . "<br>" . mysqli_error($db);
}


//Send gant_tasks query
if (mysqli_query($db, $gantt_tasks)) {
	// Redirect to tasks page after successful insertion
	header("Location: projects.php");
}
else {
	echo "Error: " . $gantt_tasks . "<br>" . mysqli_error($db);
}

?>
