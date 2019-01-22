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

  <title>DV Form</title><!-- Bootstrap CSS CDN -->
  <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css" rel="stylesheet"><!-- Our Custom CSS -->
  <link href="style4.css" rel="stylesheet"><!-- Font Awesome JS -->

  <script defer src="https://use.fontawesome.com/releases/v5.0.13/js/solid.js">
  </script>
  <script defer src="https://use.fontawesome.com/releases/v5.0.13/js/fontawesome.js">
  </script>
</head>

<body>
  <div class="wrapper">
    <!-- Sidebar  -->


    <nav id="sidebar">
      <div class="sidebar-header">
        <h3>Overseas Worker's Welfair Association-<i>CAR</i></h3>
        <strong><img src="img/owwa_logo.jpg" style="height: 49px; width: 49px"></strong>
      </div>


      <div class="card bg-light mb-3" style="max-width: 18rem;margin: 5px 5px 5px 5px">
        <div class="card-header" style="color: black">
          Month/Year Filter
        </div>


        <div class="card-body">
          <form action="filter-result2.php" target="iframe_a" method="POST">
            <select style="width: 100%" name="month">
              <option value="January" name="January" >
                January
              </option>

              <option value="February" name="February" >
                February
              </option>

              <option value="March" name="March">
                March
              </option>

              <option value="April" name="April">
                April
              </option>

              <option value="May" name="May">
                May
              </option>

              <option value="June" name="June">
                June
              </option>

              <option value="July" name="July">
                July
              </option>

              <option value="August" name="August">
                August
              </option>

              <option value="September" name="September">
                September
              </option>

              <option value="October" name="October">
                October
              </option>

              <option value="November" name="November">
                November
              </option>

              <option value="December" name="December">
                December
              </option>
            </select><br>
            <br>
            <select style="width: 100%" name="year">
              <option value="2018" name="2018">
                2018
              </option>
              <option value="2017" name="2017">
                2017
              </option>
              <option value="2016" name="2016">
                2016
              </option>
              <option value="2015" name="2015">
                2015
              </option>
              <option value="2014" name="2014">
                2014
              </option>

            </select><br>
            <br>
            <button class="btn btn-primary float-right" name="submit-search" type="submit">Go</button>
          </form>
        </div>
    </div>
    </nav>

    <!-- Page Content  -->


    <div id="content">
      <nav class="navbar navbar-light bg-light justify-content-between">
        <a href="http://dvform.com/home.php"><i aria-hidden="true" class="fa fa-home fa-2x"></i> Home</a>
        <a href="http://dvform.com/viewDvForm2.php" ><i aria-hidden="true" class="fa fa-list-ul"></i> View All DVForm</a>
        <form class="form-inline" action="search-result.php" method="POST" target="iframe_a">   
          <input class="form-control mr-sm-2" type="search" name="search" placeholder="Search name e.g. (John, Doe, john, doe) aria-label="Search" style="width: 270px;">
          <button name="submit-search2" style="cursor: pointer" type="search"><i class="fa fa-search"></i></button>
        </form>
      </nav>
      <br>
      <p><iframe align="center" height="460px" id="iframe_a" name="iframe_a" src="display_all_dv.php" style=" margin-top: -10px; margin-bottom: -10px;" width="100%"></iframe>
      </p>
      
       
    </div>


  </div>
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
</body>
</html>