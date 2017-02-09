<!DOCTYPE html>
<html>
<!--	<link rel="stylesheet" href="http://designyourlife.com.au/wp-content/themes/designyourlife/css/main.css">	-->
	<link rel="stylesheet" href="login.css">
<head>
</head>
<body>
<?php

  require_once('connect.php');
  // Connect to the database
  
  // Define database connection constants
  

  $dbc = mysqli_connect($DB_HOST, $DB_USER, $DB_PASSWORD, $DB_NAME);
  if (!$dbc) {
    die('Could not connect: ' . mysql_error());
  }
 // or die("Error connecting to database server");


  //mysql_select_db($DBNAME, $dbc)
   // or die("Error selecting database: $DBNAME");

  //echo 'Successfully connected to database!';


  if (isset($_POST['submit'])) {
    // Grab the profile data from the POST
   $user_name = $_POST['user_name'];
   echo $user_name;
  $password = $_POST['password'];
   echo $password;


    if (!empty($sid)) {
  
      // Make sure someone isn't already regist
      $query = "SELECT * FROM log_in WHERE user_name = '$user_name'";
      $data = mysqli_query($dbc, $query);
  
 // if(!$data){
   // echo "You're not connected!";
  //} else{
   // echo "connected.";
  //}
      if (mysqli_num_rows($data) == 0) {
        // The user_name is unique, so insert the data into the database
        echo '<p>attempting to insert</p>';
         $query = "INSERT INTO log_in (user_name, password) VALUES ('$user_name', '$password')";

        $var = mysqli_query($dbc, $query);
     if ($var) {
        
      echo '<p>Your new account has been successfully created. You\'re now ready to log in.</p>';
	
     }
     else{
       echo '<p>Failure</p>';
     }
        mysqli_close($dbc);
        exit();
      }
      else {
  echo $user_name;
        // An account already exists for this user_name, so display an error message
        echo '<p class="error">An account already exists for this student id. Please use a different student id.</p>';
      }
    }
    else {
      echo '<p class="error">You must enter all of the sign-up data.</p>';
    }
  }

  mysqli_close($dbc);
?>

