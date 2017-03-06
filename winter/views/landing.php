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

    <title> HELLOoooo EEC Homepage</title>

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body>
        <!-- Start Page Content -->
        
                        <h1>Welcome to EEC Homepage</h1>
						<?php 
						if(isset($_SESSION['uid']) && !empty($_SESSION['uid'])){echo 
                        '<p>Use the sidebar to navigate</p>' ;
						}else{ echo '
						<div class="jumbotron" style="background-image: url(factory.jpg); height: 700px; background-size: 100%;">
							<div id="centershit">
							<form data-toggle="validator" role="form" class="navbar-form pull-right" action="submit_login.php" autocomplete="off" method="post">
                      <input class="span2" name="user_name" type="text" placeholder="Username" required><br>
                      <input class="span2" name="password" type="password" placeholder="Password" required><br>
                      <button type="submit" class="btn btn-primary">Sign in</button>
                  </form>

					</div>'; } 
	//End page content, include sidebar footer 
						include("_sidebar_footer.php");?>
</body>

</html>
