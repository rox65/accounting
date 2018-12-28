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
  <meta http-equiv="X-UA_Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Report Of Checks Issued</title>
</head>
<body >
   <div class="container-fluid">
<table border="1" style="width: 100% ; text-align: center; background-color: whitesmoke; font-size: 13px; ">

      <tr>
        <td></td>
        <td style="text-align: center;"><b>R E P O R T  &nbsp; O F  &nbsp; C H E C K S &nbsp;  I S S U E D  -  MONTHLY &nbsp; REPORT</b></td>
      </tr>
      <tr>
        <th width="2" >AGENCY</th>

        <td width="8" style="text-align:center;">OVERSEAS WORKERS WELFARE ADMINISTRATION - CORDILLERA ADMINISTRATIVE REGION</td>
      </tr>
      
      <tr>
        <th width="2" >Month of</th>
        <th style="text-align: center;" ><input type="text" placeholder="" style="width: 500px; text-align: center;" ></th>
      </tr>
      <tr>
        <td></td>
        <th style="text-align: center;" >(Special Disbursing Officer)</th>
      </tr>
      <tr>
        <th colspan="3" style="text-align: left;">Responsibility Center: <input type="text"  /></th>
      </tr>
      <tr>
        <td colspan="3" style="text-align: left;">BANK NAME/ACCOUNT NO.: <input type="text" placeholder=""/></td>
      </tr>
     
  </table>
   </div>

 <div class="parent" id="div_print">
  <div class="child">
<table border="1" style="background-color: whitesmoke;border: 1px solid black;font-size: 13px;" >
  <thead>
    <tr>
      <th ></th>
      <th ></th>
      <th ></th>
      <th ></th>
      <th  colspan="7" ></a>CREDIT</th>
      <th  rowspan="3"><div style="width: 100px">Prog. Proj. <br>Obj.Class <br>or Minor & <br>Responsib</div></th>
      <th  colspan="6">DEBIT</th>
    </tr>

      <tr>
      <td></td>
      <td></td>
      <td></td>
      <td></td>
      <td></td>
      <td></td>
      <td></td>
      <td></td>
      <td></td>
      
      <td colspan= "2"style="text-align: center;black">SUNDRY (CR)</td>
      <td></td>
      <td></td>
      <td></td>
      <td></td>
      
      <td colspan= "2"style="text-align: center;black">SUNDRY (DR)</td>
    
      
      
     </tr>
      <tr >
          <th ><div style="width: 100px;text-align: center;">DATE</div></th>
          <th ><div style="width: 100px;text-align: center;">CHECK NUMBER</div></th>
          <th ><div style="width: 200px;text-align: center;">TO WHOM PAID</div></th>
          <th ><div style="width: 300px;text-align: center;">NATURE OF PAYMENT</div></th>
          <th ><div style="width: 100px;text-align: center;">111</div></th>
          <th ><div style="width: 100px;text-align: center;">FWVAT</div></th>
          <th ><div style="width: 100px;text-align: center;">FWPT</div></th>
          <th ><div style="width: 100px;text-align: center;">EWT</div></th>
          <th ><div style="width: 100px;text-align: center;">412</div></th>
          <th ><div style="width: 100px;text-align: center;">ACCOUNT CODE</div></th>
          <th ><div style="width: 100px;text-align: center;">AMOUNT</div></th>
          <th ><div style="width: 100px;text-align: center;">155-1</div></th>
          <th ><div style="width: 100px;text-align: center;">439.0</div></th>
          <th ><div style="width: 100px;text-align: center;">439(SL)</div></th>
          <th ><div style="width: 100px;text-align: center;">148.00</div></th>
          <th ><div style="width: 100px;text-align: center;">ACCOUNT CODE</div></th>
          <th ><div style="width: 100px;text-align: center;"><a name="debit"></a>AMOUNT</div></th>


      </tr>
  </thead>
</table>

    <?php
                      $stmt = $mysqli->prepare('SELECT 
                                  *
                              FROM
                                  dvform
                                      INNER JOIN
                                  dvform2 ON dvform.dv_number = dvform2.dv_number
                                      INNER JOIN
                                  dvform3 ON dvform2.dv_number = dvform3.dv_number
                              ');
                      
                      $stmt->execute();
                      $result = $stmt->get_result();

              $queryResults = mysqli_num_rows($result);

               if($queryResults >0){
                  while ($rows = mysqli_fetch_assoc($result)){

          ?>
          
        <table border="1" style="font-size: 13px;" >  
          <tbody>
            <tr>
              <td><div style="width: 100px;text-align: center;"><?php echo $rows['c_date']; ?></div></td>
              <td><div style="width: 100px;text-align: center;"><?php echo $rows['check_number']; ?></div></td>
              <td><div style="width: 200px; height: 100px; "><textarea style="width: 300px; height: 100px; " readonly><?php echo $rows['payee']; ?></textarea></div></td>
              <td><div style="width: 300px; height: 100px; "><textarea style="width: 300px; height: 100px; " readonly><?php echo $rows['particulars']; ?></textarea></div></td>
              <td><div style="width: 100px;text-align: center;"><?php echo $rows['amount']; ?></div></td>
              <td><div style="width: 100px;text-align: center;"></div></td>
              <td><div style="width: 100px;text-align: center;"></div></td>
              <td><div style="width: 100px;text-align: center;"></div></td>
              <td><div style="width: 100px;text-align: center;"></div></td>
              <td><div style="width: 100px;text-align: center;"><?php echo $rows['account_code']; ?></div></td>
              <td><div style="width: 100px;text-align: center;"></div></td>
              <td><div style="width: 100px;text-align: center;"><?php echo $rows['check_date']; ?></div></td>
              <td><div style="width: 100px;text-align: center;"><?php echo $rows['check_number']; ?></div></td>
              <td><div style="width: 100px;text-align: center;"></div></td>
              <td><div style="width: 100px;text-align: center;"></div></td>
              <td><div style="width: 100px;text-align: center;"></div></td>
              <td><div style="width: 100px;text-align: center;"></div></td>
              <td><div style="width: 100px;text-align: center;"><?php echo $rows['account_code']; ?></div></td>
             
            </tr> 
          </tbody>
        </table>



<?php
}
}
?>


  </div>
</div>


 
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
    <script src="http://dvform.com/js/scrollTable.js">
    </script>

