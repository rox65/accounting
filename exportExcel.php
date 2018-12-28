
<?php
session_start();

if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
   header("location: login.php");
}
// Include config file
require_once "config.php";
?>
<?php
// Connection 

$filename = "RCI_" . date('ymd') . ".xls"; // File Name
// Download file
header("Content-Disposition: attachment; filename=\"$filename\"");
header("Content-Type: application/vnd.ms-excel");

$month = mysqli_real_escape_string($mysqli, $_POST['month']);
$year = mysqli_real_escape_string($mysqli, $_POST['year']);

$sql= ("SELECT 
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
                          END) AND year(dvform2.c_date) = $year ");

$user_query = mysqli_query($mysqli,$sql);
// Write data to file
$flag = false;
while ($row = mysqli_fetch_assoc($user_query)) {
    if (!$flag) {
        // display field/column names as first row
        echo implode("\t", array_keys($row)) . "\r\n";
        $flag = true;
    }
    echo implode("\t", array_values($row)) . "\r\n";
}
?>