<?php
session_start();

if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
   header("location: login.php");
}
// Include config file
require_once "config.php";
?>

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
    <?php include 'login.php' ?>
    <footer class="blockquote-footer" style="text-align:center;padding-top:100px;">
		 <span>Copyright © 2018 OWWA-CAR</span>
	</footer>
    <!--JAVASCRIPT-->
    <script src="http://dvform.com/js/jquery-3.3.1.js"></script>
    <script src="http://dvform.com/js/bootstrap.min.js"></script>
    <script src="http://dvform.com/js/login.js"></script>
    <!--CSS-->
      <link href="http://dvform.com/css/bootstrap.min.css" rel="stylesheet" type="text/css">
      <link href="http://dvform.com/css/font-awesome.min.css" rel="stylesheet" type="text/css">
      <link href="http://dvform.com/css/view_rci.css" rel="stylesheet" type="text/css">
</body>
</html>