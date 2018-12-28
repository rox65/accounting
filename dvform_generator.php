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
				<table width="100%" style="margin-top: 1%">
					<tr>
						<td>
							<table style="text-align:center;" width="90%">
								<tr>
									<td colspan="5"><b>MODE OF PAYMENT</b></td>
								</tr>
								<tr>
									<td><input name="payment_type" required type="radio" value="MDS Check"><label>MDS Check</label></td>
									<td><input name="payment_type" required type="radio" value="Commercial Check"><label>Commercial Check</label></td>
									<td><input name="payment_type" required type="radio" value="ADA"><label>ADA</label></td>
									<td></td>
									<td><input name="payment_type" required type="radio" value="Others"><label>Others</label></td>
								</tr>
							</table>
						</td>
						<td>
							<table>
								<tr>
									<td><b>Responsibility Center</b></td>
									<td><input name="responsibility_center" type="text"></td>
								</tr>
								<tr>
									<td style="text-align:right;"><b>MFO/PAP</b></td>
									<td><input name="mfo_pap" type="text" required></td>
								</tr>
							</table>
						</td>
					</tr>
				</table>
				<div>
					<label><b>Payee</b></label>&nbsp;<input name="payee" required style="width:65%" type="text"> <label><b>TIN</b></label>&nbsp;<input name="tin" required type="text"><br>
					<label><b>Address</b></label>&nbsp;<input name="address" required style="width:90%" type="text">
				</div>
				<table width="100%">
					<tr>
						<td width="90%">
							<table style="border:1px solid;border-collapse:collapse;width:100%;">
								<tr>
									<td style="border:1px solid;" width="70%"><b>Particulars</b></td>
									<td style="border:1px solid;" width="30%"><b>Amount in Words</b></td>
								</tr>
								<tr>
									<td style="border:1px solid;padding:5px;">
									<textarea cols="1" name="particulars" required rows="5" style="width:100%; resize:none;border-style:none"></textarea></td>
									<td>
									<textarea cols="1" name="amount_in_words" required rows="5" style="width:100%; resize:none;border-style:none"></textarea></td>
								</tr>
							</table>
						</td>
						<td>
							<table>
								<tr>
									<td></td>
								</tr>
								<tr>
									<td><b>Amount</b></td>
								</tr>
								<tr>
									<td><input id="amount" name="amount" onblur="calculate()" style="height:30px;" type="text"></td>
								</tr>
							</table>
							<script>
							                         calculate = function(){
							                         var amount = Number(document.getElementById('amount').value);
							                         var ewt = Number(document.getElementById('ewt').value); 
							                         var vat = Number(document.getElementById('vat_pt').value); 
							                         document.getElementById('total_amount').value = parseInt(amount)-(parseInt(ewt)+parseInt(vat));
							                         }
							</script>
							<table>
								<tr>
									<td></td>
								</tr>
								<tr>
									<td><b>EWT&nbsp;</b></td>
									<td><input id="ewt" name="ewt" onblur="calculate()" style="width:40px;" type="text" value="0"></td>
								</tr>
								<tr>
									<td><b>VAT/PT&nbsp;</b></td>
									<td><input id="vat_pt" name="vat_pt" onblur="calculate()" style="width:40px;" type="text" value="0"></td>
								</tr>
								<tr>
									<td><b>Total</b></td>
									<td><input id="total_amount" name="total_amount" type="text" value="0"></td>
								</tr>
								<tr>
									<td></td>
								</tr>
							</table>
						</td>
					</tr>
				</table>
			</div>
			<div style="border:1px solid black">
				<table style="text-align:center;width:100%;">
					<tr>
						<td><b>A. Certified: Expenses / Cash Advance necessary, lawful and under my direct supervision.</b></td>
					</tr>
					<tr>
						<td style="height:30px;"></td>
					</tr>
					<tr>
						<td>
							<p>
							<input name="a_name" required type="text" placeholder ="name" style="width: 230px"><br>
							<input name="a_position" required type="text" placeholder="position" style="width: 230px"></p>
						</td>
					</tr>
					<tr>
						<td>
							<p><b>Date: </b><input name="a_date" required type="date"></p>
						</td>
					</tr>
				</table>
			</div>
			<br>
			<!--End of form 1-->
			<input type="submit" name="save" value="Done" class="btn btn-primary" style="width:100%" onClick="window.location = 'http://dvform.com/preview?dv_number=<?php echo $rows['dv_number'] ?>';">
		</form>
<?php    
		     if(isset($_POST['save'])){

		             $generated_by = mysqli_real_escape_string($mysqli, $_POST['generated_by']);
		             $date = mysqli_real_escape_string($mysqli, $_POST['date']);
		             $fund_cluster = mysqli_real_escape_string($mysqli, $_POST['fund_cluster']);
		             $or_bus = mysqli_real_escape_string($mysqli, $_POST['or_bus']);
		             $payment_type = mysqli_real_escape_string($mysqli, $_POST['payment_type']);
		             $mfo_pap = mysqli_real_escape_string($mysqli, $_POST['mfo_pap']);
		             $responsibility_center = mysqli_real_escape_string($mysqli, $_POST['responsibility_center']);
		             $payee = mysqli_real_escape_string($mysqli, $_POST['payee']);
		             $tin = mysqli_real_escape_string($mysqli, $_POST['tin']);
		             $address = mysqli_real_escape_string($mysqli, $_POST['address']);
		             $particulars = mysqli_real_escape_string($mysqli, $_POST['particulars']);
		             $amount_in_words = mysqli_real_escape_string($mysqli, $_POST['amount_in_words']);
		             $amount = mysqli_real_escape_string($mysqli, $_POST['amount']);
		             $ewt = mysqli_real_escape_string($mysqli, $_POST['ewt']);
		             $vat_pt = mysqli_real_escape_string($mysqli, $_POST['vat_pt']);
		             $total_amount = mysqli_real_escape_string($mysqli, $_POST['total_amount']);
		             $a_name =  mysqli_real_escape_string($mysqli, $_POST['a_name']);
		             $a_position=  mysqli_real_escape_string($mysqli, $_POST['a_position']);
		             $a_date=  mysqli_real_escape_string($mysqli, $_POST['a_date']);
		          
		            $sql1 = "INSERT INTO dvform (`dv_number`,`generated_by`,`date`, `fund_cluster`, `or_bus`, `payment_type`,`mfo_pap`, `responsibility_center`, `payee`, `tin`, `address`,  `particulars`, `amount_in_words`,`amount`, `ewt`, `vat_pt`, `total_amount`, `a_name`,`a_position`,`a_date`) VALUES ('$dv_number','$generated_by', '$date', '$fund_cluster', '$or_bus', '$payment_type','$mfo_pap', '$responsibility_center', '$payee', '$tin',  '$address', '$particulars', '$amount_in_words', '$amount', '$ewt', '$vat_pt', '$total_amount', '$a_name','$a_position','$a_date')";
					
					if (mysqli_query($mysqli, $sql1)){
		                     $message= "New payment created successfully";
		                     echo "<script type='text/javascript'>alert(\"$message\");</script>";
		                     $url = "http://dvform.com/preview.php";
					         echo '<script>window.location = "'.$url.'";</script>';
		    
		                }else {
		                      echo "Error: " . $sql1 . "<br>" . mysqli_error($mysqli);
		                }
		                mysqli_close($mysqli);

		            
		                
		}            
?><!--Javascript-->
<!--CSS-->
    <link href="http://dvform.com/css/bootstrap.min.css" rel="stylesheet" type="text/css">
    <link href="http://dvform.com/css/font-awesome.min.css" rel="stylesheet" type="text/css">
<script src="https://code.jquery.com/jquery-3.1.1.slim.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/tether/1.4.0/js/tether.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/js/bootstrap.min.js"></script>
</body>
</html>