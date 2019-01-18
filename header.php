<?php
ob_start();
ob_clean();
$conn=mysqli_connect("localhost","root","","pnb_engineering");

function getSetting($setting_name){
  global $conn;
  $query=mysqli_query($conn,"select * from setting where setting_name='".$setting_name."'");
  $result=mysqli_fetch_array($query);
  return $result['setting_value'];
}
function update_options($setting_name,$setting_value){
  global $conn;
  $query=mysqli_query($conn,"update setting set setting_value='".$setting_value."' where setting_name='".$setting_name."'");
 
}
function getInvoiceno(){
  global $conn;
  $query=mysqli_query($conn,"select count(*) as total from invoice");
  $result=mysqli_fetch_array($query);
  return $result['total']+1;
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title><?php echo getSetting('shop_name'); ?></title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  
  <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
  <script src="js/jquery.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <script src="js/bill.js"></script>
  <style type="text/css">
    body{
      font-family: verdana;
    }
  </style>
</head>
<body>
  
<div class="container" align="center">
  <div class="header-container">
  <h2><?php echo getSetting('shop_name'); ?></h2>
  <a href="bill.php" class="btn btn-info" role="button">Bill Generate</a>
  <a href="labour_management.php" class="btn btn-info" role="button">Labour Management</a>
  <a href="account_management.php" class="btn btn-info" role="button">Account Management</a>
  <a href="setting.php" class="btn btn-info" role="button">Setting</a>
  </div>  
 <br><br>