
 <?php
include ('connect.php');
require_once ('session.php');
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
       
 <script>
      function printContent(el){
      var restorepage = $('body').html();
      var printcontent = $('#' + el).clone();
      var enteredtext = $('#text').val();
      $('body').empty().html(printcontent);
      window.print();
      $('body').html(restorepage);
      $('#text').html(enteredtext);
      }
      </script>
      <button  class="btn btn-info " id="print" onclick="printContent('print_rci');" style="width: 90px; margin: 10px" >Print</button>

<div id="print_rci" style="margin: 7px 7px 7px 7px">

  <div style=" border: groove;">
  <?php include('RCI_header.php'); ?>
</div>

 <div class="parent" style="font-size: 10px">
  <div class="child">
<table border="1" style="background-color: whitesmoke;border: 1px solid black;font-size: 13px;" >
  <thead>
    <tr>
      <th ></th>
      <th ></th>
      <th ></th>
      <th ></th>
      <th  colspan="7" ></a>CREDIT</th>
      <th  rowspan="3"><div style="width: 70px">Prog. Proj. <br>Obj.Class <br>or Minor & <br>Responsib</div></th>
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
          <th ><div style="width: 70px;text-align: center;">DATE</div></th>
          <th ><div style="width: 70px;text-align: center;">CHECK NUMBER</div></th>
          <th ><div style="width: 140px;text-align: center; ">TO WHOM PAID</div></th>
          <th ><div style="width: 240px;text-align: center;">NATURE OF PAYMENT</div></th>
          <th ><div style="width: 70px;text-align: center;">111</div></th>
          <th ><div style="width: 70px;text-align: center;">FWVAT</div></th>
          <th ><div style="width: 70px;text-align: center;">FWPT</div></th>
          <th ><div style="width: 70px;text-align: center;">EWT</div></th>
          <th ><div style="width: 70px;text-align: center;">412</div></th>
          <th ><div style="width: 70px;text-align: center;">ACCOUNT CODE</div></th>
          <th ><div style="width: 100px;text-align: center;">AMOUNT</div></th>
          <th ><div style="width: 70px;text-align: center;">155-1</div></th>
          <th ><div style="width: 70px;text-align: center;">439.0</div></th>
          <th ><div style="width: 70px;text-align: center;">439(SL)</div></th>
          <th ><div style="width: 70px;text-align: center;">148.00</div></th>
          <th ><div style="width: 70px;text-align: center;">ACCOUNT CODE</div></th>
          <th ><div style="width: 100px;text-align: center;"><a name="debit"></a>AMOUNT</div></th>


      </tr>
  </thead>
</table>

    <?php

    if(isset($_POST['print'])){
                         
            $month = mysqli_real_escape_string($mysqli, $_POST['month']);
            $year = mysqli_real_escape_string($mysqli, $_POST['year']);
          
            
            $sql = "SELECT 
                        *
                    FROM
                        dvform2
                            INNER JOIN
                        dvform ON dvform.dv_number = dvform2.dv_number
                        INNER JOIN
                        dvform3 ON dvform2.dv_number = dvform3.dv_number
                          Where month(dvform2.c_date) =
                           (CASE '$month'
                              WHEN 'January' THEN 1
                              WHEN 'February' THEN 2
                              WHEN 'March' THEN 3
                              WHEN 'April' THEN 4
                              WHEN 'May' THEN 5
                              WHEN 'June' THEN 6
                              WHEN 'July' THEN 7
                              WHEN 'August' THEN 8
                              WHEN 'September' THEN 9
                              WHEN 'October' THEN 10
                              WHEN 'November' THEN 11
                              WHEN 'December' THEN 12
                          END) AND year(dvform2.c_date) = $year ";
            
            $result = mysqli_query($mysqli, $sql);
            $queryResults = mysqli_num_rows($result);

               if($queryResults >0){
                  while ($rows = mysqli_fetch_assoc($result)){


          ?>
          
        <table border="1" style="font-size: 9px;" >  
          <tbody>
            <tr>
              <td><div style="width: 70px;text-align: center;"><?php echo $rows['c_date']; ?></div></td>
              <td><div style="width: 70px;text-align: center;"><?php echo $rows['check_number']; ?></div></td>
              <td><div style="width: 140px; "><textarea style="width: 140px; height: 50px; " readonly><?php echo $rows['payee']; ?></textarea></div></td>
              <td><div style="width: 240px; height: 70px; "><textarea style="width: 240px; height: 70px; " readonly><?php echo $rows['particulars']; ?></textarea></div></td>
              <td><div style="width: 70px;text-align: center;"><?php echo $rows['amount']; ?></div></td>
              <td><div style="width: 70px;text-align: center;"></div></td>
              <td><div style="width: 70px;text-align: center;"></div></td>
              <td><div style="width: 70px;text-align: center;"></div></td>
              <td><div style="width: 70px;text-align: center;"></div></td>
              <td><div style="width: 70px;text-align: center;"><?php echo $rows['account_code']; ?></div></td>
              <td><div style="width: 100px;text-align: center;"></div></td>
              <td><div style="width: 70px;text-align: center;"><?php echo $rows['check_date']; ?></div></td>
              <td><div style="width: 70px;text-align: center;"><?php echo $rows['check_number']; ?></div></td>
              <td><div style="width: 70px;text-align: center;"></div></td>
              <td><div style="width: 70px;text-align: center;"></div></td>
              <td><div style="width: 70px;text-align: center;"></div></td>
              <td><div style="width: 70px;text-align: center;"><?php echo $rows['account_code']; ?></div></td>
              <td><div style="width: 100px;text-align: center;"></div></td>
            </tr> 
          </tbody>
        </table>



<?php
}
}else{
 echo "No Records Found.";
}
}
?>

  </div>

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

