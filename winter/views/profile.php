<?php include("_header.php"); ?>
<!doctype html>

<html>
<head>
	<meta name="viewport" content="width=device-width, initial-scale=1" content="height=device-height, initial-scale=1">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	<link rel="stylesheet" href="../css/style.css" type="text/css">
	<script type="text/javascript" src="../js/script.js"></script>	
	<!-- Bootstrap Core CSS -->
    <link href="../css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="../css/simple-sidebar.css" rel="stylesheet">
	<title> Profile </title>
</head>

<?php 
if(isset($_SESSION["uid"]) && !empty($_SESSION["uid"])){
$id = $_SESSION["uid"];

}
else{
die("no user id found");}
if($result = $db->query("select * from employee_information where user_id = '$id'")){
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
 <div id="wrapper">

        <!-- Sidebar -->
        <div id="sidebar-wrapper">
            <ul class="sidebar-nav">
                <li class="sidebar-brand">
                    <a href="landing.php">
                        Home
                    </a>
                </li>
				<?php 
				if(isset($_SESSION['uid']) && !empty($_SESSION['uid'])){ 
				echo ' 
                <li>
                    <a href="profile.php">Profile</a>
                </li>
                <li>
                    <a href="#">Shortcuts</a>
                </li>
                <li>
                    <a href="#">Overview</a>
                </li>
                <li>
                    <a href="#">Events</a>
                </li>
                <li>
                    <a href="#">About</a>
                </li>
                <li>
                    <a href="#">Services</a>
                </li>
                <li>
                    <a href="#">Contact</a>
                </li>' ;}
				else {
				echo "Please Log in";}?>
            </ul>
        </div>
        <!-- /#sidebar-wrapper -->
		 <!-- /#sidebar-wrapper -->

        <!-- Page Content -->
        <div id="page-content-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
<div class="container">
      <div class="row">
      <div class="col-md-5  toppad  pull-right col-md-offset-3 ">
           <!--<A href="edit.html" >Edit Profile</A> -->    

        <A href="submit_logout.php" >Logout</A>
       <br>
      </div>
        <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 col-xs-offset-0 col-sm-offset-0 col-md-offset-3 col-lg-offset-3 toppad" >
   
   
          <div class="panel panel-info">
            <div class="panel-heading">
              <h3 class="panel-title"><?php echo $first; ?> <?php echo $last;?> </h3>
            </div>
            <div class="panel-body">
              <div class="row">     
				<div class="col-md-3 col-lg-3 " align="center"> <img alt="User Pic" src="data:image/jpeg;base64,<?php echo base64_encode( $image_data ); ?>" class="img-circle img-responsive" /> </div>
                <!--<div class="col-xs-10 col-sm-10 hidden-md hidden-lg"> <br>
                  <dl>
                    <dt>EMAIL:</dt>
                    <dd><?php echo $_SESSION["email"];  ?> </dd>
                    <dt>PHONE</dt>
                    <dd><?php echo $_SESSION["phone"];  ?> </dd>
                    <dt>DATE OF BIRTH</dt>
                       <dd>11/12/2013</dd>
                    <dt>GENDER</dt>
                    <dd>Male</dd>
                  </dl>
                </div>-->
                <div class=" col-md-9 col-lg-9 "> 
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
	<a href="#menu-toggle" class="btn btn-default" id="menu-toggle">Toggle Menu</a>
                    </div>
                </div>
            </div>
        </div>
        <!-- /#page-content-wrapper -->

    </div>
    <!-- /#wrapper -->

    <!-- jQuery -->
    <script src="../js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="../js/bootstrap.min.js"></script>

    <!-- Menu Toggle Script -->
    <script>
    $("#menu-toggle").click(function(e) {
        e.preventDefault();
        $("#wrapper").toggleClass("toggled");
    });
    </script>
	
</html>
