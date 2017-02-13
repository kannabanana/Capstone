<!DOCTYPE html>
<?php include("_header.php"); ?>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, shrink-to-fit=no, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>EEC Homepage</title>

    <!-- Bootstrap Core CSS -->
    <link href="../css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="../css/simple-sidebar.css" rel="stylesheet">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body>

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

        <!-- Page Content -->
        <div id="page-content-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1>Welcome to EEC Homepage</h1>
						<?php 
						if(isset($_SESSION['uid']) && !empty($_SESSION['uid'])){echo 
                        '<p>Use the sidebar to navigate</p>' ;
						}else{ echo '
						<div class="jumbotron" style="background-image: url(factory.jpg); height: 700px; background-size: 100%;">
							<div id="centershit">
							<form data-toggle="validator" role="form" class="navbar-form pull-right" action="submit_login.php" autocomplete="off" method="post">
                      <input class="span2" name="user_name" type="text" placeholder="user_name" required>
                      <input class="span2" name="password" type="password" placeholder="password" required>
                      <button type="submit" class="btn btn-primary">Sign in</button>
                  </form>


						<div class="container">
							  <div class="row">
								  <div class="col-md-6">
									  <br />
									  <div class="container-fluid">
											  <form data-toggle="validator" role="form" autocomplete="off" action="submit_registration.php" method="post">
												  <div class="form-group col-lg-12">
													  <label for="user_name" class="control-label">Username</label>
													  <input name="user_name" type="text" class="form-control" placeholder="user_name" required>
												  </div>
												  <div class="form-group col-sm-6">
													  <label for="password" class="control-label">Password</label>
													  <input name="password" type="password" data-minlength="5" class="form-control" id="password" placeholder="password" required>
													  <span class="help-block">Minimum of 5 characters</span>
												  </div>
												  <div class="form-group">
													  <button type="submit" class="btn btn-primary">Submit</button>
												  </div>
										  </form>
									  </div>
								  </div>
						   </div>	


						</div>
						</div>'; } ?>
							
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

</body>

</html>
