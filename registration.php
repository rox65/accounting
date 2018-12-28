<?php require 'connect.php'?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>OWWA CAR: Login</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" type="image/png" href="img/logo.png" />
    <!--CSS-->
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/css/bootstrap.min.css" rel="stylesheet">
	<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
</head>
<body>
 <div class="container text-center">
    <div class="row">
      <div class="col-sm-9 col-md-7 col-lg-5 mx-auto">
        <div class="card card-signin my-5" style="padding:30px;">
			<div class="card-body">
			<img src="img/logo.png" style="width:100px;height:100px;text-align:center;"/>
            <h5 class="card-title text-center">OWWA-CAR</h5>
            <form class="form-signin" role="form" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">
              <div class="form-label-group">
			  <label for="username" style="float:left">Firstname</label>
                <input type="text" id="first_name" class="form-control" placeholder="Firstname" name="first_name" required autofocus autocomplete="off"> 
              </div>
			  <div class="form-label-group">
			  <label for="username" style="float:left">Lastname</label>
                <input type="text" id="last_name" class="form-control" placeholder="Lastname" name="last_name" required autofocus autocomplete="off"> 
              </div>
			  <div class="form-label-group">
			  <label for="username" style="float:left">Username</label>
                <input type="text" id="username" class="form-control" placeholder="Username" name="username" required autofocus autocomplete="off"> 
              </div>
              <div class="form-label-group">
               <label for="password" style="float:left">Password</label>
                <input type="password" id="password" class="form-control" placeholder="Password" name="password" required>
              </div>
			  <div class="form-label-group">
               <label for="password" style="float:left">Re-enter Password</label>
                <input type="password" id="re-password" class="form-control" placeholder="Password" name="re-password" required>
              </div>
			  <div style="padding-top:10px;">
              <button class="btn btn-lg btn-primary btn-block text-uppercase" name="register" type="submit">Register</button>
			  </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
  <?php include 'register.php'?>
  </body>
    <?php include 'login.php' ?>
    <footer class="blockquote-footer" style="text-align:center;padding-top:100px;">
		 <span>Copyright © 2018 OWWA-CAR</span>
	</footer>
    <!--JAVASCRIPT-->
    <script src="http://customer.audirentur.com/js/jquery-3.3.1.js"></script>
    <script src="http://customer.audirentur.com/js/bootstrap.min.js"></script>
    <script src="http://customer.audirentur.com/js/login.js"></script>
</body>
</html>