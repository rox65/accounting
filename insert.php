<?php 
require 'connect.php';require 'session.php';
if(isset($_POST['insert-dvform'])){
	$dv_number=$_POST['dv_number'];
	$generated_by= $_POST['generated_by'];
	$date= $_POST['date'];
	$fund_cluster= $_POST['fund_cluster'];
	$or_bus= $_POST['or_bus'];

$query="INSERT INTO dvform(dv_number,generated_by, date, fund_cluster, or_bus) 
VALUES ('$dv_number','$generated_by', '$date', '$fund_cluster', '$or_bus')";
$result = mysqli_query($mysqli, $query);
if ($result) {
	$_SESSION['dv_number']=$dv_number;
	header('Location: dv1.php');
	} else {
    echo "Error: " . $query . "<br>" . mysqli_error($mysqli);
	}
}elseif(isset($_POST['insert-payment'])){
	$dv_number=$_POST['dv_number'];
	$payment_type= $_POST['payment_type'];
	$tin= $_POST['tin'];
	$address= $_POST['address'];
	$payee= $_POST['payee'];
	$particulars=$_POST['particulars'];
	$amount=$_POST['amount'];
	$amount_in_words=$_POST['amount_in_words'];
	$ewt=$_POST['ewt'];
	$total_amount=$_POST['total_amount'];
	$vat_pt=$_POST['vat_pt'];
	
	$query="INSERT INTO payment_info(paymentNo,payment_type, tin, address, payee, particulars, amount, amount_in_words, ewt, total_amount, vat_pt) 
	VALUES ('$dv_number','$payment_type', '$tin', '$address', '$payee', '$particulars', '$amount', '$amount_in_words', '$ewt','$total_amount','$vat_pt' )";
	$result = mysqli_query($mysqli, $query);
	if ($result) {
	echo '<script>alert("Inserted new dvform.")</script>';
	header('Location: dv2.php');
	//session_destroy();
	} else {
    echo "Error: " . $query . "<br>" . mysqli_error($mysqli);
	}
}elseif(isset($_POST['insert-entry'])){
	$dv_number=$_GET['dv_number'];
	$account_code= $_POST['code'];
	$account_title= $_POST['title'];
	$uacs_code= $_POST['uacs'];
	$query="INSERT INTO accounting_entry(account_entryNum,account_code, uacs_code, account_title) 
	VALUES ('$dv_number','$account_code', '$uacs_code', '$account_title')";
	$result = mysqli_query($mysqli, $query);
	if ($result) {
	echo '<script>alert("Inserted new dvform.")</script>';
	header('Location: dv3.php');
	//session_destroy();
	} else {
    echo "Error: " . $query . "<br>" . mysqli_error($mysqli);
	}
}elseif(isset($_POST['insert-all'])){
	$dv_number=$_GET['dv_number'];
	$check_number= $_POST['check_number'];
	$check_date= $_POST['check_date'];
	$query="INSERT INTO receipt(receipt_no,check_number, check_date) 
	VALUES ('$dv_number','$check_number', '$check_date')";
	$result = mysqli_query($mysqli, $query);
	if ($result) {
	echo '<script>alert("Successfully Created")</script>';
	header('Location: index.php');
	session_destroy();
	} else {
    echo "Error: " . $query . "<br>" . mysqli_error($mysqli);
	}
}else{
session_destroy();
}
?>