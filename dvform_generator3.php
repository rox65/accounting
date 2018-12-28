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
	<meta charset="utf-8" content="IE=edge" http-equiv="X-UA-Compatible">
	<title>DV Generator CAR</title>
	<meta content="width=device-width, initial-scale=1" name="viewport">
	<link href="./img/logo.png" rel="icon" type="image/png">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/css/bootstrap.min.css"/>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"/>
</head>
<body style="word-spacing:0;font-size:13px;width:100%;float: right;">
	<?php
	                    $query_id = "SELECT `AUTO_INCREMENT` as dv_number
	                        FROM  INFORMATION_SCHEMA.TABLES
	                        WHERE TABLE_SCHEMA = 'owwa_accounting'
	                        AND   TABLE_NAME   = 'dvform'"; 

	                    $result_id = mysqli_query($mysqli, $query_id);

	                    if(mysqli_num_rows($result_id) > 0 ){
	                        while($result=mysqli_fetch_array($result_id)){
	                                $dv_number = $result['dv_number'];
	                            }

	                    }else{
	                        echo 'no data found';
	                    }
	             ?>
<div class="col-sm-2 navbar-nav" style="background: whitesmoke; height:100%;width:25%; position:fixed; float: left">
      <?php include 's-navbar.html'?>
    </div>
	<div>
		<form  method="post" style="width: 75%; float: right; margin-right: 5%; margin-top: 2%">
			<!--Start of form 1-->
			<div style="border: 1px solid black; padding: 5px; border-bottom: 0px;">
				<table style="width:100%;background-color:whitesmoke;">
					<tr>
						<td>
							<table>
								<tr>
									<td class="table-header" style="font-size:12px;font-family:verdana;height: 20px;max-height: 20px;">
										<p class="table-header">Republic of the Philippines<br>
										Department of Labor and Employment<br>
										Overseas Workers Welfare Administration<br>
										Cordillera Administrative Region<br>
										# 17 RM Bldg., Private Rd., Magsaysay Ave., Baguio City<br>
										car@owwa.gov.ph/ (074) 445-2260</p>
									</td>
								</tr>
								<tr>
									<td colspan="2" style="font-size:15px; border:1px groove;">
										<h1>DISBURSEMENT VOUCHER</h1>
									</td>
								</tr>
							</table>
						</td>
						<td>
							<input name="dv_number" type="hidden" value="<?php echo $dv_number; ?>">
							<table style="float:left">
								<tr>
									<td><b>DV. No.</b></td>
									<td><input name="dv_number" required type="text" value="<?php echo $dv_number; ?>"></td>
								</tr>
								<tr>
									<td><b>By:</b></td>
									<td><input name="generated_by" required type="text"></td>
								</tr>
								<tr>
									<td><b>Date</b></td>
									<td><input name="date" required type="date"></td>
								</tr>
								<tr>
									<td><b>Fund Cluster</b></td>
									<td><input name="fund_cluster" required type="text"></td>
								</tr>
								<tr>
									<td><b>OR/ BUS</b></td>
									<td><input name="or_bus" type="text"></td>
								</tr>
							</table>
						</td>
					</tr>
				</table>
		<br>
			<!--Start of form 3-->
			<div align="right" style="width: 100%; float: right; margin-left: auto;  border: 1px solid black; ">
				<div style="border: 1px solid black;border-top: none;">
				<center><b>E. Receipt of Payment</b></center></div>
					<div style="width:70%;float:left; border-right: 1px solid black;">
						<table>
							<tr>
								<td width="20%"><b>Check Number</b></td>
								<td><input name="check_number" type="text"></td>
								<td width="20%"><b>Check Date</b></td>
								<td><input name="check_date" style="width:250px;" type="date"></td>
							</tr>
						</table>
						<table width="100%">
							<tr>
								<td width="10px;"><b>Payee</b></td>
								<td width="95%"><input name="payee" style="width:100%" type="text"></td>
								<td width="10px;"><b>Amount</b></td>
								<td><input name="amount" style="width:90px" type="text"></td>
							</tr>
						</table>
						<table width="100%">
							<tr>
								<td width="10px;"><b>Signature</b></td>
								<td>_____________________</td>
								<td width="10px;"><b>Date:</b></td>
								<td><input type="date" name="e_date"></td>
							</tr>
						</table>
						<table width="100%">
							<tr>
								<td width="15%"><b>OR No. / Other Documents</b></td>
								<td colspan="3"><input style="width:95%" type="text"></td>
							</tr>
						</table>
					</div>
					<div style="float:left;width:20%;">
						<table style="width:80%;">
							<tr>
								<td><b>JEV No.</b></td>
								<td style="border:1px groove"><input style="border-style:none;font-size:30px;width:130px;height:50px;" type="text"></td>
							</tr>
						</table>
						<table>
							<tr>
								<td><b>JEV Date:</b></td>
								<td style="border:1px groove"><input style="font-size:16px;width:120px;height:30px; border-style:none;" type="text"></td>
							</tr>
						</table>
					</div>
			</div>
			<!--End of form 3-->
		</div>
		
		<br>
			<input type="submit" name="save" value="Save" class="btn btn-primary" style="width:100%;margin-top:10px;"/>
		</form>
		</div>
		
		
<?php    
		     if(isset($_POST['save'])){
		        //Table 3
		             $check_number = mysqli_real_escape_string($mysqli, $_POST['check_number']);
		             $check_date = mysqli_real_escape_string($mysqli, $_POST['check_date']);
		             $payee = mysqli_real_escape_string($mysqli, $_POST['payee']);
		             $amount =  mysqli_real_escape_string($mysqli, $_POST['amount']);
		             $e_date=  mysqli_real_escape_string($mysqli, $_POST['e_date']);
					 
		             $sql3 = "INSERT INTO dvform3 (`dv_number`,`check_number`, `check_date`, `payee`, `amount`, `e_date`) 
		                    VALUES ('$dv_number','$check_number', '$check_date', '$payee', '$amount','$e_date')";

		            
		    
		               
		              if (mysqli_query($mysqli, $sql3)){
		                     $message= "New receipt created successfully";
		                     echo "<script type='text/javascript'>alert(\"$message\");</script>";
		                     $url = "http://dvform.com/dvform_generator.php";
		                     echo '<script>window.location = "'.$url.'";</script>'; 
		    
		                }else {
		                      echo "Error: " . $sql3 . "<br>" . mysqli_error($mysqli);
		                }
		                mysqli_close($mysqli);

		            
		                
		}            
		        ?>
				
			
			<!-- jQuery CDN - Slim version (=without AJAX) -->
			  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js">
			  </script> <!-- Popper.JS -->
			   
			  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js">
			  </script> <!-- Bootstrap JS -->
			   
			  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js">
			  </script> 
			  <!--CSS-->
			  <link href="http://dvform.com/css/bootstrap.min.css" rel="stylesheet" type="text/css">
			  <link href="http://dvform.com/css/font-awesome.min.css" rel="stylesheet" type="text/css">

			  <!--Javascript-->
			  <script src="http://dvform.com/js/print.js">
			  </script> 
			  <script src="http://dvform.com/js/buttonBackNext.js">
			  </script> 
			  <script src="http://dvform.com/js/bootstrap.min.js">
			  </script> 
			  <script src="http://dvform.com/js/popper.min.js">
			  </script> 
			  <script src="http://dvform.com/js/jquery.min.js">
			  </script> 
			  <script src="http://dvform.com/js/sandbox_disabled.js">
			  </script> 
			  <script src="http://dvform.com/js/scrollTable.js">
			  </script> 
			  <script src="http://dvform.com/js/solid.js">
			  </script> 
			  <script src="http://dvform.com/js/scrollTable.js">
			  </script> 
			  <script src="http://dvform.com/js/slim.min.js">
			  </script>
</body>
</html>