<?php


$conn=mysqli_connect("localhost","root","","pnb_engineering");

if (isset($_GET['dellab_id'])) {
  $data=$_GET['dellab_id'];
  
  mysqli_query($conn,"delete from labour where id='".$data."'");
  header("location:labour_management.php");
}

?>