<!--inserting information for the header and sidebar --!>

<?php include("_header.php"); 
	  include("_sidebar_header.php");?>
<!doctype html>

<html>
<head>
	<meta name="viewport" content="width=device-width, initial-scale=1" content="height=device-height, initial-scale=1">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	<link rel="stylesheet" href="../css/style.css" type="text/css">
	<script type="text/javascript" src="../js/script.js"></script>	
	<title> Profile </title>
</head>

<body>

<?php 				//check the user id is present
if(isset($_SESSION["uid"]) && !empty($_SESSION["uid"])){
	if(isset($_GET["u"]) && !empty($_GET["u"])){
		$id = $_GET["u"];
		
	}
	else
		echo "No user selected from employee records page.";				//display error if the user is not displaying user details
}
else{
echo "Please sign in to access this page";
sleep(1);
header("Location: landing.php");								//redirect to landing
exit();
}
if($result = $db->query("select * from employee_information where user_id = '$id'")){		//get all employee related information based on given user-id	
		while($obj = $result->fetch_object()){
			$first = htmlspecialchars($obj->first_name);
			$last = htmlspecialchars($obj->last_name);
			$user = htmlspecialchars($obj->user_name);
			$phone = htmlspecialchars($obj->phone_number);
			$email = htmlspecialchars($obj->email);
			$major = htmlspecialchars($obj->major);
			$current = htmlspecialchars($obj->current);
			$hire_date = date_create(htmlspecialchars($obj->hire_date));
			$end_date = date_create(htmlspecialchars($obj->end_date));
			$week_hours = htmlspecialchars($obj->week_hours);
			$image_data = $obj->pic;
		}
		$result->close();
} ?>

<!--DISPLAY ALL INFORMATION LEARNED FROM DB--!>
<div class="container">
      <div class="row">
      <div class="col-md-5  toppad  pull-right col-md-offset-3 ">
           <!--<A href="edit.html" >Edit Profile</A> -->    

        <A href="records.php" >Back to Records Page</A>
       <br>
      </div>
        <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 col-xs-offset-0 col-sm-offset-0 col-md-offset-3 col-lg-offset-3 toppad" >
   
   
          <div class="panel panel-info">
            <div class="panel-heading">
              <h3 class="panel-title"><?php echo $first; ?> <?php echo $last;?> </h3>				<!--display first and last name--!>
            </div>
            <div class="panel-body">
              <div class="row">     
			  <?php if(isset($image_data) && !empty($image_data)){?>
				<div class="col-md-4 col-lg-4 " align="center"> <img alt="User Pic" src="data:image/jpeg;base64,<?php echo base64_encode( $image_data ); ?>" class="img-circle img-responsive" /> </div>
			  <?php }?>										<!--display their employee image--!>
                <div class=" col-md-8 col-lg-8 "> 
                  <table class="table table-user-information">
                    <tbody>
                      <tr>
                        <td>Email:</td>
                        <td><a href="mailto:<?php echo $email; ?> "><?php echo $email;  ?></a> </td>
                      </tr>
                      <tr>
                        <td>Phone:</td>
                        <td><?php echo $phone;  ?></td>
                      </tr>  
					  <tr>
                        <td>Major:</td>
                        <td><?php echo $major;  ?></td>
                      </tr> 
					  <tr>
                        <td>Hire Date:</td>
                        <td><?php echo date_format($hire_date, "m/d/Y");  ?></td>
                      </tr> 
					  <tr>
                        <td>Expected End Date:</td>
                        <td><?php echo date_format($end_date, "m/d/Y");  ?></td>
                      </tr> 
					  <tr>
                        <td>Weekly Hours:</td>
                        <td><?php echo $week_hours;  ?></td>
                      </tr> 
                    </tbody>
                  </table>
                  
                </div>
              </div>
            </div>
                 <!--<div class="panel-footer">
                        <a data-original-title="Broadcast Message" data-toggle="tooltip" type="button" class="btn btn-sm btn-primary"><i class="glyphicon glyphicon-envelope"></i></a>
                        <span class="pull-right">
                            <a href="edit.html" data-original-title="Edit this user" data-toggle="tooltip" type="button" class="btn btn-sm btn-warning"><i class="glyphicon glyphicon-edit"></i></a>
                            <a data-original-title="Remove this user" data-toggle="tooltip" type="button" class="btn btn-sm btn-danger"><i class="glyphicon glyphicon-remove"></i></a>
                        </span>
                    </div>-->
            
          </div>
        </div>
      </div>
    </div>
	
	<!-- Employee Information Ends Here -->
	
	<!-- Show Tasks Starts Here -->	
	<div class="container">
      <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 col-xs-offset-0 col-sm-offset-0 col-md-offset-3 col-lg-offset-3 toppad" >
   
   
          <div class="panel panel-info">
            <div class="panel-heading">
              <h3 class="panel-title">Assigned Tasks </h3>
            </div>
            <div class="panel-body">
              <div class="row">     
                <div class=" col-md-12 col-lg-12 "> 
                  <table class="table">
				  <thead class="thead-inverse">
					<tr>
					  <th>Task Type</th>
					  <th>Task Name</th>
					  <th>Logged Hours</th>
					  <th>Assigned Hours</th>
					</tr>
				  </thead>
				 <tbody>
				  <?php if($result = $db->query("select * from assignments WHERE user_id = '$id' ORDER BY assignment_id desc ")){
							while($obj = $result->fetch_object()){ 
								$task_id = htmlspecialchars($obj->task_id);
								$assigned_hours = htmlspecialchars($obj->hours);
								if($result2 = $db->query("select * from task where task_id = '$task_id'")){
									while($obj2 = $result2->fetch_object()){ 
										$task_name = $obj2->name;
										$task_type_id = $obj2->task_type_id;
										if($result3 = $db->query("select * from task_type where task_type_id = '$task_type_id'")){
											while($obj3 = $result3->fetch_object()){
												$task_type_name = $obj3->name;
											}
										}
										else
											echo "Error Getting Task Type Information";
									}
								}
								else
									echo "Error Getting Task Information";
								if($result4 = $db->query("select * from log_task where user_id = '$id' and task_id = '$task_id'")){
									while($obj4 = $result4->fetch_object()){
										$logged_hours = $obj4->hours;
									}
									
									
								}
								$last = htmlspecialchars($obj->last_name);
								$url = "display_task.php?t=" . htmlspecialchars($obj->task_id);
								if(!isset($logged_hours) || empty($logged_hours)){
									$logged_hours = 0;
								}
							?>
				  
					<tr>
					  <th scope="row"><a href="<?php echo $url; ?>" style="display : block; color:black" ><?php echo $task_type_name; ?></a></th>
					  <td><a href="<?php echo $url; ?>" style="display : block; color:black"><?php echo $task_name; ?></a></td>
					  <td><a href="<?php echo $url; ?>" style="display : block; color:black"><?php echo $logged_hours; ?></a></td>
					  <td><a href="<?php echo $url; ?>" style="display : block; color:black"><?php echo $assigned_hours; ?></a></td>
					</tr>
				  <?php }} ?>
                    </tbody>
                  </table>
                  
                </div>
              </div>
            </div>
                 <!--<div class="panel-footer">
                        <a data-original-title="Broadcast Message" data-toggle="tooltip" type="button" class="btn btn-sm btn-primary"><i class="glyphicon glyphicon-envelope"></i></a>
                        <span class="pull-right">
                            <a href="edit.html" data-original-title="Edit this user" data-toggle="tooltip" type="button" class="btn btn-sm btn-warning"><i class="glyphicon glyphicon-edit"></i></a>
                            <a data-original-title="Remove this user" data-toggle="tooltip" type="button" class="btn btn-sm btn-danger"><i class="glyphicon glyphicon-remove"></i></a>
                        </span>
                    </div>-->
            
          </div>
        </div>
      </div>
    </div>
<?php include("_sidebar_footer.php"); ?>
</body>	
</html>
