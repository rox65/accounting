<?php
// Initialize the session
session_start();
 
// Check if the user is logged in, if not then redirect him to login page
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: login.php");
    exit;
}
// Include config file
require_once "config.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8" content="IE=edge" http-equiv="X-UA-Compatible">
	<title>DV Generator CAR</title>
	<meta content="width=device-width, initial-scale=1" name="viewport">
	<link href="./img/logo.png" rel="icon" type="image/png">
	<link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/css/bootstrap.min.css" rel="stylesheet">
	<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
</head>
<body>
	<div class="row" style="margin:0;">
		<!--navbar-->
    <div class="col-sm-2 navbar-nav" style="background: whitesmoke; height:100%;width:20%; position:fixed; float: left">
      <?php include 's-navbar.html'?>
    </div>
    <!--end-->
		<div class="col-sm-10" style="margin-left:230px;">
			<div>
				<?php 

					$stmt = $mysqli->prepare('SELECT 
                                  *
                              FROM
                                  dvform
                                      INNER JOIN
                                  dvform2 ON dvform.dv_number = dvform2.dv_number
                                      INNER JOIN
                                  dvform3 ON dvform2.dv_number = dvform3.dv_number;');
                      $stmt->execute();
                      $result = $stmt->get_result();

              $queryResults = mysqli_num_rows($result);
				?>
				<table style="width:100%;text-align:center;margin-top: 20%">
					<tr>
						<td>
							<div class="card">
								<h1 class="card-header">No. of DV forms</h1>
								<h2><?php echo $queryResults ?></h2>
							</div>
						</td>
						<td>
							<div class="card">
								<h1 class="card-header">No. of BUS forms</h1>
								<h2><?php echo $queryResults ?></h2>
							</div>
						</td>
						<td></td>
					</tr>
				</table><br>
			
			</div>
		</div>
	</div><!--end-->
	<footer class="blockquote-footer" style="text-align:center;padding-top:100px;">
		OWWA 2018
	</footer>
	<script src="https://code.jquery.com/jquery-3.1.1.slim.min.js">
	</script> 
	<script src="https://cdnjs.cloudflare.com/ajax/libs/tether/1.4.0/js/tether.min.js">
	</script> 
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/js/bootstrap.min.js">
	</script>
 <link href="http://dvform.com/css/bootstrap.min.css" rel="stylesheet" type="text/css">
    <link href="http://dvform.com/css/font-awesome.min.css" rel="stylesheet" type="text/css">

</body>
</html>