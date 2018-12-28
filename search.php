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
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <meta content="IE=edge" http-equiv="X-UA-Compatible">

  <title>RCI</title><!-- Bootstrap CSS CDN -->
  <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css" rel="stylesheet"><!-- Our Custom CSS -->
  <link href="style4.css" rel="stylesheet"><!-- Font Awesome JS -->

  <script defer src="https://use.fontawesome.com/releases/v5.0.13/js/solid.js">
  </script>
  <script defer src="https://use.fontawesome.com/releases/v5.0.13/js/fontawesome.js">
  </script>
</head>

<body>
      <table cellspacing="0" class="table table-striped table-bordered table-sm" id="dtVerticalScrollExample">
      <thead>
        <tr>
          <th class="th-sm" scope="col" style="width: 5%">
            <div>
              DV Number
            </div>
          </th>
          <th class="th-sm" scope="col" style="width: 7%">Check Number</th>
          <th class="th-sm" scope="col" style="width: 6%">Check Date</th>
          <th class="th-sm" scope="col" style="width: 8%">Payee</th>
          <th class="th-sm" scope="col" style="width: 9%">Amount</th>
          <th class="th-sm" scope="col" style="width: 7%"></th>
        </tr>
      </thead>
    </table>

    <?php
   if(isset($_POST['submit-search'])){
                         
            $search = mysqli_real_escape_string($mysqli, $_POST['search']);
            
            $sql = "SELECT 
                  *
              FROM
                  dvform2
                      INNER JOIN
                  dvform ON dvform.dv_number = dvform2.dv_number
                      INNER JOIN
                  dvform3 ON dvform2.dv_number = dvform3.dv_number
              WHERE
                  dvform.payee LIKE '%search%'
              ORDER BY dvform.payee;";
            
            $result = mysqli_query($mysqli, $sql);
            $queryResults = mysqli_num_rows($result);
            
    
            echo "There are " .$queryResults. " results!<br>";
            
          $queryResults = mysqli_num_rows($result);

                   if($queryResults >0){
                      while ($rows = mysqli_fetch_assoc($result)){

              ?>
                    <div class="table-wrapper-scroll-y" style="width: 100%; margin-right: 2%; margin-left: auto;">
                      <table class="table table-bordered table-striped">
                        <tbody>
                          <tr>
                            <td style="width: 11%"><?php echo $rows['dv_number']; ?></td>
                            <td style="width: 13%"><?php echo $rows['check_number']; ?></td>
                            <td style="width: 11%"><?php echo $rows['check_date']; ?></td>
                            <td style="width: 15%"><?php echo $rows['payee']; ?></td>
                            <td style="width: 15%"><?php echo $rows['amount']; ?></td>
                            <td style="width: 10%">
                              <form action="http://dvform.com/view_rci_file.php" method="post">
                                <input name="view_dv" type="hidden" value="<?php echo $rows['dv_number'] ?>"> <button class="btn btn-default" name="view" type="search">View RCI</button>
                              </form>
                            </td>
                          </tr>
                        </tbody>
                      </table>
                    </div><?php
                      }
                      }
                    }
                      ?>



 </body>
</html>
<!-- jQuery CDN - Slim version (=without AJAX) -->
  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js">
  </script> <!-- Popper.JS -->
   
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js">
  </script> <!-- Bootstrap JS -->
   
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js">
  </script> 
  <!--CSS-->
  <link href="http://dvform.com/css/bootstrap.min.css" rel="stylesheet" type="text/css">
  <link href="http://dvform.com/css/font-awesome.min.css" rel="stylesheet" type="text/css">
  <link href="http://dvform.com/css/view_rci.css" rel="stylesheet" type="text/css"><!--Javascript-->
  <script src="http://dvform.com/js/print.js">
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
  <script src="http://dvform.com/js/solid.js">
  </script> 
  <script src="http://dvform.com/js/scrollTable.js">
  </script> 
  <script src="http://dvform.com/js/slim.min.js">
  </script>