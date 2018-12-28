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
	<meta charset="UTF-8">
	<meta content="IE=edge" http-equiv="X-UA_Compatible">
	<meta content="width=device-width, initial-scale=1.0" name="viewport">
	<link href="http://busform.com/css/style.css" rel="stylesheet" type="text/css">
	<title></title>
</head>
<body style="word-spacing:0;font-size:13px;width:70%; margin:auto;">
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
	<form>
		<div style="border: 1px solid black; margin-top: 5%; padding: 5px; border-bottom: 0px;">
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
									<h1>Budget Utilization Request Status</h1>
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
		</div>
		<table border="1" cellpadding="0" cellspacing="0" width="100%">
			<tr>
				<td>Payee</td>
				<td colspan="4"><input style="width: 100%" type="text" value="<?php echo $rows['payee']; ?>"></td>
			</tr>
			<tr>
				<td>Address</td>
				<td colspan="4"><input style="width: 100%" type="text" value="<?php echo $rows['address']; ?>"></td>
			</tr>
			<tr>
				<td>Office</td>
				<td colspan="4"><input style="width: 100%" type="text"></td>
			</tr>
			<tr>
				<th>Responsibility Ctr.</th>
				<th>Particulars</th>
				<th>MFO/PAP</th>
				<th>UACS Code</th>
				<th>Amount</th>
			</tr>
			<tr>
				<td id="textbox1">
				<textarea cols="15" rows="10" style="width: 100%;resize:none;border: none"><?php echo $rows['responsibility_center']; ?></textarea></td>
				<td id="textbox2">
				<textarea cols="40" rows="10" style="width: 100%;resize:none; border: none"><?php echo $rows['particulars']; ?></textarea></td>
				<td id="textbox3">
				<textarea cols="15" rows="10" style="width: 100%;resize:none;border: none"><?php echo $rows['mfo_pap']; ?></textarea></td>
				<td id="textbox4">
				<textarea cols="15" rows="10" style="width: 100%;resize:none;border: none"><?php echo $rows['uacs']; ?></textarea></td>
				<td id="textbox5">
				<textarea cols="15" rows="10" style="width: 100%;resize:none;border: none"><?php echo $rows['total_amount']; ?></textarea></td>
			</tr>
			<tr>
				<td></td>
			</tr>
			<tr>
				<table style=";border-collapse: collapse;line-height:5px;" width="100%">
			<tr>
				<td style="padding:10px; padding-top: 0px; border:1px solid black" width="50%">
					<table style="width:100%;">
						<tr>
							<td style="width:100%; height:100%; line-height: normal;"><b>A. Certified: Charges to appropration/budget<br>
								necessary, lawful and under my direct supervision;<br>
								and supporting documents valid, proper and legal</b></td>
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
							<td colspan="0" style="width:100%;height:13px; line-height: normal;"><b>B: Certified the buget available and utilized for<br>
							the purpose / adjustment neccessary as<br>
							indicated above</b></td>
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
		</table>
			</tr>
		</table>
		<table border="1" width="100%">
			<tr>
				<th align="center" colspan="8">C. Status Of Utilization</th>
			</tr>
			<tr>
				<th>Date</th>
				<th>Particulars</th>
				<th>BURS/JEV/R<br>
				/CI/RADA/RT/<br>
				RAI No.</th>
				<th>Utilization</th>
				<th>Payable</th>
				<th>Payment</th>
				<th>Not Yet Due</th>
				<th>Not Yet Due</th>
			</tr>
			<tr>
				<td>
				<textarea cols="10" rows="10" style="width: 100%;resize: none; border: none"></textarea></td>
				<td>
				<textarea cols="30" rows="10" style="width: 100%;resize: none;"><?php echo $rows['particulars']; ?></textarea></td>
				<td>
				<textarea cols="10" rows="10" style="width: 100%;resize: none;"></textarea></td>
				<td>
				<textarea cols="12" rows="10" style="width: 100%;resize: none;"></textarea></td>
				<td>
				<textarea cols="12" rows="10" style="width: 100%;resize: none;"></textarea></td>
				<td>
				<textarea cols="12" rows="10" style="width: 100%;resize: none;"></textarea></td>
				<td>
				<textarea cols="5" rows="10" style="width: 100%;resize: none;"></textarea></td>
				<td>
				<textarea cols="5" rows="10" style="width: 100%;resize: none;"></textarea></td>
			</tr>
		</table>
	</form> 


				<!--Print Button-->
				<button class="noprint" onclick="myFunction()" style="cursor: pointer; width:120px; height:40px; float:left; margin-top: 10px; margin-bottom: 10px; margin-right: 5px;">Print</button>
				<script>
				function myFunction() {
				    window.print();
				}
				</script>


				<!--Go Back to Forms-->
				<input class="noprint" style="cursor: pointer; width:150px; height:40px; float:left; margin-top: 10px; margin-bottom: 10px;" type="button" value="Back to previous page"  onClick="window.location = 'http://dvform.com/display_all';"> 

	<?php

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