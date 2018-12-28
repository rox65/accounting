<?php
session_start();

if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
   header("location: login.php");
}
// Include config file
require_once "config.php";
?>
<html>
<head>
	<title></title>
</head>
<body>

	
			<form  autocomplete="off" method="POST">
				<div class="autocomplete" style="margin-bottom: 10px; ">
					<input name="account_title" id="myInput" placeholder="Search for account title" />
					<input type="submit" name= "search_code" id="search" placeholder="Search..." />
				</div>
			</form>


	<?php 
				if(isset($_POST['search_code'])){
				    $account_title= mysqli_real_escape_string($mysqli, $_POST['account_title']);
				
				   
				    $stmt = $mysqli->prepare('SELECT * FROM accounting_codes WHERE title LIKE '%account_title%'');
					$stmt->bind_param("s", $account_title);
					$stmt->execute();
					$result = $stmt->get_result();

			$queryResults = mysqli_num_rows($result);

             if($queryResults >0){
                while ($rows = mysqli_fetch_assoc($result)){
				    
			
	?>
			

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
						<td ><input name="account_code" style="border: none; text-align: center; height: 100px;" required type="text" value="<?php echo $rows['code']?>"></td>
						<td ><input name="uacs_code" style="border: none; text-align: center; height: 100px;" required type="text" value="<?php echo $rows['uacs'];?>"></td>
						<td ><input name="account_title" style="border: none; text-align: center; height: 100px;" required type="text" value="<?php echo $rows['title'];?>"></td>
						<td style="text-align:center;"></td>
						<td style="text-align:center;"></td>
					</tr>
				</tbody>
			</table>
	
		<?php
		    }
		}else{
			$message= "No account code found.";
	        echo "<script type='text/javascript'>alert(\"$message\");</script>";
		}
	}
	?>

</body>
</html>

  <!--Javascript-->
  <script src="http://dvform.com/js/autocomplete_search.js">
  </script> 
  <!--CSS-->
  <link href="http://dvform.com/css/autocomplete.css" rel="stylesheet" type="text/css">
