
<!-- Bootstrap Core CSS -->
    <link href="../css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="../css/simple-sidebar.css" rel="stylesheet">

<div id="wrapper">

        <!-- Sidebar -->
        <div id="sidebar-wrapper">
            <ul class="sidebar-nav">
                <li class="sidebar-brand">
                    <a href="landing.php">
                        <?php 
				if(isset($_SESSION['uid']) && !empty($_SESSION['uid'])){ 
					echo 'Home';}
				else{
					echo 'Login';}?>

                    </a>
                </li>
				<?php 
				if(isset($_SESSION['uid']) && !empty($_SESSION['uid'])){ 
				echo ' 
                <li>
                    <a href="profile.php">Profile</a>
                </li>
                <li>
                    <a href="registration.php">Add New Employee</a>
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
<div id="page-content-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">