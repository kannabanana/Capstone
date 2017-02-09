<!DOCTYPE html>
<html lang="en">
  <head>

<link rel="stylesheet" href="login.css">

   <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Main page">

    <title>Welcome to Energy Efficiency Center</title>

	#section1 {padding-top:100px;height:730px;color: white; background-image: url(factory.jpg);}


</head>
  <body>
  <div id="section1" class="container-fluid animated flipInX">

                 <form data-toggle="validator" role="form" class="navbar-form pull-right" action="submit_login.php" autocomplete="off" method="post">
                      <input class="span2" name="username" type="text" placeholder="Username" required>
                      <input class="span2" name="password" type="password" placeholder="Password" required>
                      <button type="submit" class="btn">Sign in</button>
                  </form>

      <div class="container">
          <div class="row">
      <!-- --------------------------------- Registration Form --------------------------------- -->
              <div class="col-md-6">
                  <h1>Please Sign Up using your Onid Login</h1>
                  <br />
                  <div class="container-fluid">
                          <form data-toggle="validator" role="form" autocomplete="off" action="login.php" method="post">
                              <div class="form-group col-lg-12">
                                  <label for="username" class="control-label">Username</label>
                                  <input name="username" type="text" class="form-control" placeholder="Username" required>
                              </div>
                              <div class="form-group col-sm-6">
                                  <label for="password" class="control-label">Password</label>
                                  <input name="password" type="password" data-minlength="5" class="form-control" id="password" placeholder="Password" required>
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
  </body>
</html>
