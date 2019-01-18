<?php
$conn=mysqli_connect("localhost","root","","pnb_engineering");
if(isset($_POST['action']))
{
	echo $invoiceno=$_POST['invoiceno'];
	$cname=$_POST['cname'];
	$date=$_POST['date'];
	$grandtotal=$_POST['grandtotal'];
	
	
	$sql=mysqli_query($conn,"INSERT INTO invoice(invoice_no,client_name,date,amount) VALUES ('".$invoiceno."','".$cname."','".$date."','".$grandtotal."')");


}

?>