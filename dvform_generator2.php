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
	<div>
<div class="col-sm-2 navbar-nav" style="background: whitesmoke; height:100%;width:25%; position:fixed; float: left">
      <?php include 's-navbar.html'?>
    </div>
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

				<!--Search Account Code Function-->
				
			<table border="1" style="width:100%;text-align:center">
				<thead style="width:100%;text-align:center">
					<tr>
						<td colspan="6"><b>B. Accounting Entry</b></td>
					</tr>
					<tr>
						<th style="" width="10%">Account Code</th>
						<th style="" width="10%">UACS Code</th>
						<th style="" width="40%">Account Title</th>
						<th style="" width="15%">Debit</th>
						<th style="" width="15%">Credit</th>
					</tr>
				</thead>
				<tbody>
					
					<tr>
						<td >
						<td style=" text-align: center; height: 50px;" required type="text"></td>
						<td style="text-align: center; height: 50px;" required type="text"></td>
						<td style="text-align:center;"></td>
						<td style="text-align:center;"></td>
					</tr>
					<tr>
						<td >
						<td style="text-align: center; height: 50px;" required type="text"></td>
						<td style=" text-align: center; height: 50px;" required type="text"></td>
						<td style="text-align:center;"></td>
						<td style="text-align:center;"></td>
					</tr>
				</tbody>
			</table>

				<!--end of code-->


	<!--Start of form 2-->

			<br>
			<table style=";border-collapse: collapse;line-height:5px;" width="100%">
				<tr>
					<td style="padding:10px; padding-top: 0px; border:1px solid black" width="50%">
						<table style="width:100%;">
							<tr>
								<td style="width:100%;height:13px;"><b>C. Certified</b></td>
							</tr>
							<tr>
								<td><input name="certified_by_1" type="checkbox">Supporting documents complete and proper.</td>
							</tr>
							<tr>
								<td><input name="certified_by_2" type="checkbox">Cash available.</td>
							</tr>
							<tr>
								<td><input name="certified_by_3" type="checkbox">Subject to ADA (if applicable).</td>
							</tr>
							<tr>
								<td><br>
								<br></td>
							</tr>
							<tr>
								<td style="text-align:right;"><b>Signature:</b></td>
								<td>_____________________</td>
							</tr>
							<tr>
								<td style="text-align:right;line-height: 26px;"><b>Name and Position:</b></td>
								<td>
									<input name="c_name" required type="text" value="name">
									<input name="c_position" required type="text" value="position">
									<p></p>
								</td>
							</tr>
							<tr>
								<td style="text-align:right;" width="20%"><b>Date:</b></td>
								<td><input name="c_date" type="date" ></td>
							</tr>
						</table>
					</td>
					<td style="padding:10px; padding-top: 0px;border:1px solid black" width="50%">
						<p></p>
						<table style="width:100%;">
							<tr>
								<td colspan="0" style="width:100%;height:13px;"><b>D. Approved for payment</b></td>
							</tr>
							<tr>
								<td><br>
								<br>
								<br>
								<br></td>
							</tr>
							<tr>
								<td><br>
								<br></td>
							</tr>
							<tr>
								<td style="text-align:right;"><b>Signature:</b></td>
								<td>_____________________</td>
							</tr>
							<tr>
								<td style="text-align:right;line-height: 26px;"><b>Name and Position:</b></td>
								<td>
									<input name="d_name" required type="text" placeholder="name"> 
									<input name="d_position" required type="text" placeholder="position">
									<p></p>
								</td>
							</tr>
							<tr>
								<td style="text-align:right;" width="20%"><b>Date:</b></td>
								<td><input name="d_date" type="date" ></td>
							</tr>
						</table>
					</td>
				</tr>
			</table>
			</div>
			<br>
			<input type="submit" name="save" value="Save" class="btn btn-primary" style="width:100%"/>
			<!--End of form 2-->
		</form>

<?php    
		     if(isset($_POST['save'])){
		        //Table 2    
		            
		             $account_code = mysqli_real_escape_string($mysqli, $_POST['account_code']);
		             $uacs_code = mysqli_real_escape_string($mysqli, $_POST['uacs_code']);
		             $account_title = mysqli_real_escape_string($mysqli, $_POST['account_title']);
		             $c_name =  mysqli_real_escape_string($mysqli, $_POST['c_name']);
		             $c_position=  mysqli_real_escape_string($mysqli, $_POST['c_position']);
		             $c_date=  mysqli_real_escape_string($mysqli, $_POST['c_date']);
		             $d_name =  mysqli_real_escape_string($mysqli, $_POST['d_name']);
		             $d_position=  mysqli_real_escape_string($mysqli, $_POST['d_position']);
		             $d_date=  mysqli_real_escape_string($mysqli, $_POST['d_date']); 

		             $sql2 = "INSERT INTO dvform2 
		                    (`dv_number`,`account_code`, `uacs`, `title`, `c_name`,`c_position`,`c_date`,`d_name`,`d_position`,`d_date`) 
		                    VALUES ('$dv_number','$account_code', '$uacs_code', '$account_title', '$c_name','$c_position','$c_date', '$d_name', '$d_position','$d_date')";

		              if (mysqli_query($mysqli, $sql2)){
		                     $message= "New account created successfully";
		                     echo "<script type='text/javascript'>alert(\"$message\");</script>";
		                     $url = "http://dvform.com/dvform_generator.php";
		                     echo '<script>window.location = "'.$url.'";</script>'; 
		    
		                }else {
		                      echo "Error: " . $sql2 . "<br>" . mysqli_error($mysqli);
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