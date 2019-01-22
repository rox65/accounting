<!--Filter function for RCI page-->

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
  <title>DV Form</title>
</head>
<body>
   
 <div class="parent" >
  <div class="child">
 <div class="table-wrapper-scroll-y" style="width: 100%; margin-right: 2%; margin-left: auto;"> 
        <table border="1" style="font-size: 13px;" >  
          <tbody>
            </thead>

              <tr>
                <th scope="col"  style="width: 5%" class="th-sm">DV Number
                  <i class="fa fa-sort float-right" aria-hidden="true"></i>
                </th>
                <th scope="col" style="width: 7%" class="th-sm">Check Number
                  <i class="fa fa-sort float-right" aria-hidden="true"></i>
                </th>
                <th scope="col" style="width: 6%" class="th-sm">Check Date
                  <i class="fa fa-sort float-right" aria-hidden="true"></i>
                </th>
                <th scope="col"  style="width: 8%" class="th-sm">Payee
                  <i class="fa fa-sort float-right" aria-hidden="true"></i>
                </th>
                <th scope="col"  style="width: 9%" class="th-sm">Amount
                  <i class="fa fa-sort float-right" aria-hidden="true"></i>
                </th>
                <th scope="col"  style="width: 7%" class="th-sm">
                  <i class="fa fa-sort float-right" aria-hidden="true"></i>
                </th>
                
              </tr>
 
          </tbody>
        </table>
      </div>
  <?php

    if(isset($_POST['submit-search'])){
                         
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
          <div class="table-wrapper-scroll-y" style="width: 100%; margin-right: 2%; margin-left: auto;">
            <table class="table table-bordered table-striped" >
              
              <tbody>
                <tr>
                  <td style="width: 11%"><?php echo $rows['dv_number']; ?></td>
                  <td style="width: 13%"><?php echo $rows['check_number']; ?></td>
                  <td style="width: 11%"><?php echo $rows['check_date']; ?></td>
                  <td style="width: 15%"><?php echo $rows['payee']; ?></td>
                  <td style="width: 15%"><?php echo $rows['amount']; ?></td>
                  <td style="width: 10%">
                    <form action="http://dvform.com/viewDvForm.php" method="POST">
                         <input type="hidden" name="view_dv" value="<?php echo $rows['dv_number'] ?>">
                         <button class="btn btn-primary btn-md" name="view" type="search">View DV Form</button>
                    </form>
                   
                    <input class="noprint" style="cursor: pointer;float:left; margin-top: 10px; margin-bottom: 10px;" type="button" value="Go to BUS FORM" onClick="window.location = 'http://dvform.com/viewBusForm?dv_number=<?php echo $rows['dv_number'] ?>';"> 

                    <input class="noprint" style="cursor: pointer;float:left; margin-top: 10px; margin-bottom: 10px; background-color: red" type="button" value="Delete Record" onClick="window.location = 'http://dvform.com/deleteDVnum?dv_number=<?php echo $rows['dv_number'] ?>';"> 
                  </td>
                </tr>
                
              </tbody>
            </table>
            </div>



<?php
}
}else{
 echo "No Records Found.";
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

