<!DOCTYPE html>
<?php include("_header.php"); 
include("_sidebar_header.php");?>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, shrink-to-fit=no, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
<meta name="viewport" content="width=device-width, initial-scale=1" content="height=device-height, initial-scale=1">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	<link rel="stylesheet" href="../css/style.css" type="text/css">

    <title>Create Project</title>


</head>

<body>
        <!-- Start Page Content -->

<?php 
if(isset($_SESSION["uid"]) && !empty($_SESSION["uid"])){
	$id = $_SESSION["uid"];
}
else{
	echo "Please sign in to access this page";
	sleep(1);
	header("Location: landing.php");
	exit();
}
?>


<div class="container" >
  <div class="row">
	  <div class="col-md-6">
		  <br>
		  <div class="panel panel-info">
		  <div class="panel-heading">
              <h3 class="panel-title">Create Project</h3>
            </div>
			<div class="panel-body">
		  <div class="container-fluid" >
				  <form data-toggle="validator" role="form" autocomplete="off" action="submit_project.php" method="post">
					  <div class="form-group col-sm-6">
						  <label for="project type" class="control-label">Project Type</label>
						  
							<?php
								$result = $db ->query("SELECT * FROM `project_type`");
								$option1.="<select name='Project Type'>";
								while($obj = $result->fetch_object()){
									
								   $option1.="<option value=" . $obj->project_type_id . ">" . $obj->name . "</option> ";
								}
								$option1.="</select>"; 
								echo $option1;
							?>
						  
					  </div>
					  <div class="form-group col-sm-6">
						  <label for="grant type" class="control-label">Project Type</label>
						  
							<?php
								if($result2 = $db ->query("SELECT * FROM `grant`")){
								
									$option2.="<select name='Grant Type'>";
									while($obj2 = $result2->fetch_object()){
										
									   $option2.="<option value=" . $obj2->grant_id. ">" . $obj2->nick . "</option> ";
									}
									$option2.="</select>"; 
									echo $option2;
								}
								else
									echo "error";
							?>
						  
					  </div><br>
					  <div class="form-group col-sm-6">
						  <label for="start_date" class="control-label">Start Date</label>
						  <input name="start_date" type="text" class="form-control" id="start_date" placeholder="m/d/y" required>
					  </div>
					  <div class="form-group col-sm-6">
						  <label for="end_date" class="control-label">End Date</label>
						  <input name="end_date" type="text" class="form-control" id="end_date" placeholder="m/d/y" required>
					  </div><br>
					  <div class="form-group col-sm-12">
						  <label for="description" class="control-label">Description</label>
						  <textarea name="description" type="text" class="form-control" rows="3" placeholder="Description..." required></textarea>
					  </div><br>
					  <div class="form-group" align= "right">
						  <button type="submit" class="btn btn-primary">Submit</button>
					  </div>
			  </form>
		  </div>
		  </div>
		  </div>
	  </div>
</div>	
</div>
</div>
	    <!-- End Page Content -->
		
</body>
<?php include("_sidebar_footer.php");?>
