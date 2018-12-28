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
	<meta charset="utf-8">
	<meta content="IE=edge" http-equiv="X-UA-Compatible">
	<title>DV Generator CAR</title>
	<meta content="width=device-width, initial-scale=1" name="viewport">
	<link href="http://dvform.com/css/print.css" rel="stylesheet" type="text/css">
</head>
<body style="word-spacing:0;font-size:15px;width:70%; margin:auto;">


	<?php
	            if(isset ($_GET['dv_number'])){
	            
	            $search = $_GET['dv_number'];
	          
	                    $stmt = $mysqli->prepare('SELECT * FROM
                                  dvform
                                      INNER JOIN
                                  dvform2 ON dvform.dv_number = dvform2.dv_number
                                      INNER JOIN
                                  dvform3 ON dvform2.dv_number = dvform3.dv_number
                                  	 WHERE dvform.dv_number = ?');

	                    $stmt->bind_param("i", $search);
	                    $stmt->execute();
	                    $result = $stmt->get_result();

	            $queryResults = mysqli_num_rows($result);

	             if($queryResults >0){
	                while ($rows = mysqli_fetch_assoc($result)){
	                    


	?>

	<form id="OWWA_form" method="post" name="OWWA_form" style="margin-top: 8%">
		<div style="border: 1px solid black; padding: 5px; border-bottom: 0px;">
			<table style="width:100%;background-color:grey;">
				<tr>
					<td>
						<table>
							<tr>
								<td><img src="img/OWWA_logo.jpg" style="width:100px;height:100px;"></td>
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
						<table style="float:left">
							<tr>
								<td>DV. No.</td>
								<td><input name="dv_number" required="" type="text" value="<?php echo $rows['dv_number']; ?>"></td>
							</tr>
							<tr>
								<td>By:</td>
								<td><input name="generated_by" required="" type="text" value="<?php echo $rows['generated_by']; ?>"></td>
							</tr>
							<tr>
								<td>Date</td>
								<td><input name="date_generated" required="" type="text" value="<?php echo $rows['date']; ?>"></td>
							</tr>
							<tr>
								<td>Fund Cluster</td>
								<td><input name="fund_cluster" required="" type="text" value="<?php echo $rows['fund_cluster']; ?>"></td>
							</tr>
							<tr>
								<td>OR/ BUS</td>
								<td><input name="or_bus" required="" type="text" value="<?php echo $rows['or_bus']; ?>"></td>
							</tr>
						</table>
					</td>
				</tr>
			</table>
			<table width="100%">
				<tr>
					<td>
						<table style="text-align:center;" width="90%">
							<tr>
								<td colspan="5">MODE OF PAYMENT</td>
							</tr>
							<tr>
								<td><input name="payment_type" required="" type="text" value="<?php echo $rows['payment_type']; ?>"></td>
							</tr>
						</table>
					</td>
					<td>
						<table>
							<tr>
								<td>Responsibility Center</td>
								<td><input name="responsibility_center" type="text" value="<?php echo $rows['responsibility_center']; ?>"></td>
							</tr>
							<tr>
								<td style="text-align:right;">MFO/PAP</td>
								<td><input name="mfo/pap" type="text" value="<?php echo $rows['mfo_pap']; ?>" ></td>
							</tr>
						</table>
					</td>
				</tr>
			</table><label>Payee</label>&nbsp;<input name="payee" required="" style="width:65%" type="text" value="<?php echo $rows['payee']; ?>"> <label>TIN</label>&nbsp; <input name="tin" required="" type="text" value="<?php echo $rows['tin']; ?>"><br>
			<label>Address</label>&nbsp;<input name="address" required="" style="width:90%" type="text" value="<?php echo $rows['address']; ?> ">
			<table width="100%">
				<tr>
					<td width="90%">
						<table style="border:1px solid;border-collapse:collapse;width:100%;">
							<tr>
								<td style="border:1px solid;" width="70%">Particulars</td>
								<td style="border:1px solid;" width="30%">Amount in Words</td>
							</tr>
							<tr>
								<td style="border:1px solid;padding:5px;">
								<textarea class="particulars_id" cols="1" name="particulars" required="" rows="5" style="width:90%; resize:none;border-style:none"><?php echo $rows['particulars']; ?></textarea></td>
								<td>
								<textarea cols="1" name="amount_in_words" required="" rows="5" style="width:90%; resize:none;border-style:none"><?php echo $rows['amount_in_words'] ?></textarea></td>
							</tr>
						</table>
					</td>
					<td>
						<table>
							<tr>
								<td>Amount</td>
							</tr>
							<tr>
								<td><input autocomplete="off" id="amount_in_number" name="amount_in_number" onblur="ViewSum()" required="" style="height:30px;" type="text" value="<?php echo $rows['amount']; ?>"></td>
							</tr>
						</table>
						<table>
							<tr>
								<td>EWT&nbsp;</td>
								<td><input autocomplete="off" id="ewt" name="ewt" onblur="ViewSum()" required="" style="width:40px;" type="text" value="<?php echo $rows['ewt']; ?>"></td>
							</tr>
							<tr>
								<td>VAT/PT&nbsp;</td>
								<td><input autocomplete="off" id="vat_pt" name="vat_pt" onblur="ViewSum()" required="" style="width:40px;" type="text" value="<?php echo $rows['vat_pt']; ?>"></td>
							</tr>
							<tr>
								<td>Total Amount&nbsp;</td>
								<td><input id="Result" name="total_amount" style="width:40px;" value="<?php echo $rows['total_amount']; ?>"></td>
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
						<textarea cols="1" name="a_name" placeholder="Name" required="" rows="1" style="width:23%; text-align: center; resize:none; border:1px groove"><?php echo $rows['a_name'] ?></textarea><br>
						<textarea cols="1" name="a_position" placeholder="Position" required="" rows="1" style="width:23%; text-align: center; resize:none;border:1px groove"><?php echo $rows['a_position'] ?></textarea></p>
					</td>
				</tr>
				<tr>
					<td>
						<p>Date: <input name="a_date" required="" type="text" value="<?php echo $rows['a_date'];?>"></p>
					</td>
				</tr>
			</table>
		</div>
		<div>
			<div style="border:1px solid black">
				<center>
					<b>B. Accounting Entry</b>
				</center>
			</div>
			<table style="border-collapse: collapse;width:100%">
				<thead>
					<tr>
						<th style="border:1px solid;" width="10%">Account Code</th>
						<th style="border:1px solid;" width="10%">UACS Code</th>
						<th style="border:1px solid;" width="40%">Account Title</th>
						<th style="border:1px solid;" width="5%">Debit</th>
						<th style="border:1px solid;" width="5%">Credit</th>
					</tr>
				</thead>
				<tbody>
					<tr>
						<td style="border:1px solid;text-align:center;">
						<textarea cols="1" name="account_code" required="" rows="5" style="width:85%; resize:none;border-style:none"><?php echo $rows['account_code']; ?></textarea></td>
						<td style="border:1px solid;text-align:center;">
						<textarea cols="1" name="uacs" required="" rows="5" style="width:85%; resize:none;border-style:none"><?php echo $rows['uacs']; ?></textarea></td>
						<td style="border:1px solid;text-align:center;">
						<textarea cols="1" name="title" required="" rows="5" style="width:85%; resize:none;border-style:none"><?php echo $rows['title']; ?></textarea></td>
						<td style="border:1px solid;text-align:center;">
						<textarea cols="1" name="debit" rows="5" style="width:85%; resize:none;border-style:none"></textarea></td>
						<td style="border:1px solid;text-align:center;">
						<textarea cols="1" name="credit" rows="5" style="width:85%; resize:none;border-style:none"></textarea></td>
					</tr>
				</tbody>
			</table>
		</div><br>
		<table style=";border-collapse: collapse;line-height:5px;" width="100%">
			<tr>
				<td style="padding:10px; padding-top: 0px; border:1px solid black" width="50%">
					<p></p>
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
							<td style="text-align:right;">Signature:</td>
							<td>_____________________</td>
						</tr>
						<tr>
							<td style="text-align:right;line-height: 26px;">Name and Position:</td>
							<td>
								<textarea cols="2" name="c_name" placeholder="Name" rows="1" style="width:90%; text-align: center; resize:none; height:20px; border:1px groove"><?php echo $rows['c_name']?></textarea> 
								<textarea cols="1" name="c_position" placeholder="Position" required="" rows="1" style="width:90%; text-align: center; resize:none;border:1px groove; height:20px;"><?php echo $rows['c_position']?></textarea>
								<p></p>
							</td>
						</tr>
						<tr>
							<td style="text-align:right;" width="20%">Date:</td>
							<td><input name="c_date" type="text" value="<?php echo $rows['c_date'] ?>"></td>
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
							<br></td>
						</tr>
						<tr>
							<td><br>
							<br></td>
						</tr>
						<tr>
							<td style="text-align:right;">Signature:</td>
							<td>_____________________</td>
						</tr>
						<tr>
							<td style="text-align:right;line-height: 26px;">Name and Position:</td>
							<td>
								<textarea cols="2" name="d_name" placeholder="Name" rows="1" style="width:90%; text-align: center; resize:none;border:1px groove; height:20px;"><?php echo $rows['d_name']?></textarea> 
								<textarea cols="1" name="d_position" placeholder="Position" required="" rows="1" style="width:90%; text-align: center; resize:none;border:1px groove; height:20px;"><?php echo $rows['d_position']?></textarea>
								<p></p>
							</td>
						</tr>
						<tr>
							<td style="text-align:right;" width="20%">Date:</td>
							<td><input name="d_date" type="text" value="<?php echo $rows['d_date'] ?>"></td>
						</tr>
					</table>
				</td>
			</tr>
		</table><br>
		<!--Start of form 3-->
			<div align="right" style="width: 100%; float: right; margin-left: auto;  border: 1px solid black; ">
				<div style="border: 1px solid black; border-top: none;"><center><b>E. Receipt of Payment</b></center></div>
					<div style="width:70%;float:left; border-right: 1px solid black;">
						<table>
							<tr>
								<td width="20%"><b>Check Number</b></td>
								<td><input name="check_number" type="text" required value="<?php echo $rows['check_number']; ?>"></td>
								<td width="20%"><b>Check Date</b></td>
								<td><input name="check_date" style="width:250px;" type="text" required value="<?php echo $rows['check_date']; ?>"></td>
							</tr>
						</table>
						<table width="100%">
							<tr>
								<td width="10px;"><b>Payee</b></td>
								<td width="95%"><input name="payee" style="width:100%" type="text" required value="<?php echo $rows['payee']; ?>"></td>
								<td width="10px;"><b>Amount</b></td>
								<td><input name="amount" style="width:90px" type="text" required value="<?php echo $rows['amount']; ?>"></td>
							</tr>
						</table>
						<table width="100%">
							<tr>
								<td width="10px;"><b>Signature</b></td>
								<td>_____________________</td>
								<td width="10px;"><b>Date:</b></td>
								<td><input type="text" name="e_date" required value="<?php echo $rows['e_date']; ?>"></td>
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
	</form>
	

		</div>
				<!--Done button-->
				<input name="submit" type="submit" value="SUBMIT" style="background-color: #4CAF50; color: white; padding: 14px 20px;margin: 0 auto; margin-top:20px; position:relative; display:block; cursor: pointer; width: 280px; opacity: 0.9; onClick="window.location = 'http://dvform.com/preview?dv_number=<?php echo $rows['dv_number'] ?>';" ">


		<?php
				if(isset($_POST['submit'])){
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

		              $sql=$mysqli->prepare('UPDATE dvform SET generated_by = ?, date = ?, fund_cluster =?, or_bus = ?, payment_type =?, mfo_pap = ?, responsibility_center = ?, payee = ?, tin = ?, address = ?, particulars = ?, amount_in_words = ?, amount = ?, ewt = ?, vat_pt = ?, total_amount = ?, a_name = ?, a_position = ?, a_date = ?  WHERE dv_number = ? ');

		              $sql->bind_param("ssssssssssssiiiisssi", $generated_by, $date, $fund_cluster, $or_bus, $payment_type, $mfo_pap, $responsibility_center, $payee, $tin,  $address, $particulars, $amount_in_words, $amount, $ewt, $vat_pt, $total_amount, $a_name,$a_position, $a_date, $dv_number);

		              $sql->execute();
		              while($rows = mysqli_fetch_assoc($sql)) {
								$_SESSION['generated_by'] = $rows['generated_by'];
								$_SESSION['date'] =$rows['date']; 
								$_SESSION['fund_cluster'] = $rows['fund_cluster']; 
								$_SESSION['or_bus'] = $rows['or_bus'];
								$_SESSION['payment_type'] = $rows['payment_type']; 
								$_SESSION['mfo_pap'] = $rows['mfo_pap']; 
								$_SESSION['responsibility_center'] =$rows['responsibility_center']; 
								$_SESSION['payee'] = $rows['payee']; 
								$_SESSION['tin'] = $rows['tin']; 
								$_SESSION['address'] =$rows['address']; 
								$_SESSION['particulars'] = $rows['particulars'];
								$_SESSION['amount_in_words'] =$rows['amount_in_words']; 
								$_SESSION['amount'] = $rows['amount']; 
								$_SESSION['ewt'] = $rows['ewt'];
								$_SESSION['vat_pt'] = $rows['vat_pt']; 
								$_SESSION['total_amount'] = $rows['total_amount']; 
								$_SESSION['a_name'] =$rows['a_name']; 
								$_SESSION['a_position'] = $rows['a_position']; 
								$_SESSION['a_date'] = $rows['a_date']; 
							}

							$message= "New payment created successfully";
		                    echo "<script type='text/javascript'>alert(\"$message\");</script>";

						}else{
							$message= "Can not update form.";
		                    echo "<script type='text/javascript'>alert(\"$message\");</script>";
					        $url = "http://customer.audirentur.com/edit_profile.php";
					        echo '<script>window.location = "'.$url.'";</script>';
						}

		             
				
		}
		}
		}
		?> 
	
	<!--CSS-->
	<link href="http://dvform.com/css/bootstrap.min.css" rel="stylesheet" type="text/css">
	<link href="http://dvform.com/css/font-awesome.min.css" rel="stylesheet" type="text/css">

	<!--Javascript-->
	<script src="http://dvform.com/js/print.js">
	</script> 
	<script src="http://dvform.com/js/total.js">
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
</body>
</html>