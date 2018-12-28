
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
 <body>
 	<?php
	         
	          if(isset ($_GET['dv_number'])){
	            
	            $search = $_GET['dv_number'];
	          
	                    $stmt = $mysqli->prepare('DELETE * FROM
                                  dvform
                                      INNER JOIN
                                  dvform2 ON dvform.dv_number = dvform2.dv_number
                                      INNER JOIN
                                  dvform3 ON dvform2.dv_number = dvform3.dv_number
                                  	 WHERE dvform.dv_number = ?');

	                    if($stmt->execute()){
			                 echo "Record Deleted";
			               		 header("location: display_all.php");

	                	 }else{
	                	 	echo "Something went wrong. Please try again later.";
	                	 }
	      	 	}
	?>

 	</body>
 	</html>
