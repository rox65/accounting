
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
    <form action="http://dvform.com/search.php" method="POST">
      <!--navbar-->
    <div class="col-sm-2 navbar-nav" style="background: whitesmoke; height:100%;width:20%;position:fixed;">
      <?php include 's-navbar.html'?>
    </div>
    <!--end-->
        <div class="container">
            <br>
            <div class="row justify-content-center">
                <div class="col-10 col-md-8 col-lg-8">
                    <form class="card card-sm">
                        <div class="card-body row no-gutters align-items-center">
                            <!--end of col-->
                            <div class="col">
                                <input class="form-control form-control-lg form-control-borderless" name="search" placeholder="Search...">
                            </div><!--end of col-->
                            <div class="col-auto">
                                <button class="btn btn-lg" name="submit-search" type="search">Search</button>
                            </div><!--end of col-->
                        </div>
                    </form>
                </div><!--end of col-->
            </div>
        </div>
    </form>

  <div class="table-wrapper-scroll-y" style="width: 80%; margin-right: 2%; margin-left: auto; ">
  <table id="dtVerticalScrollExample" class="table table-striped table-bordered table-sm" cellspacing="0" >


<thead>
<tr>  <input class="noprint" style="cursor: pointer;float:left; margin-top: 10px; margin-bottom: 10px; background-color: red" type="button" value="Delete All Forms" onClick="window.location = 'http://dvform.com/deleteDVnum?dv_number=<?php echo $rows['dv_number'] ?>';"> 

</tr>
</thead>
<thead>
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
  </thead>
</table>
</div>
        <?php
                      $stmt = $mysqli->prepare('SELECT 
                                  *
                              FROM
                                  dvform
                                      INNER JOIN
                                  dvform2 ON dvform.dv_number = dvform2.dv_number
                                      INNER JOIN
                                  dvform3 ON dvform2.dv_number = dvform3.dv_number;');
                      $stmt->execute();
                      $result = $stmt->get_result();

              $queryResults = mysqli_num_rows($result);

               if($queryResults >0){
                  while ($rows = mysqli_fetch_assoc($result)){

          ?>
          
<div class="table-wrapper-scroll-y" style="width: 80%; margin-right: 2%; margin-left: auto;">
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
}
?>

<!--CSS-->
    <link href="http://dvform.com/css/bootstrap.min.css" rel="stylesheet" type="text/css">
    <link href="http://dvform.com/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <!--Javascript-->
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
    <link href="./img/logo.png" rel="icon" type="image/png">


     </body>
 </html>