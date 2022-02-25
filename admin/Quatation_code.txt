<?php
session_start();
include('../dist/includes/dbcon.php');

$challan_no = $_POST['challan_no'];
$total = $_POST['total'];
$cid=$_REQUEST['cid'];
$p_type = $_POST['p_type'];
$remark = $_POST['remark'];

if(isset($_POST['tax_type'])){
$tax_type = $_POST['tax_type'];
}else{
$tax_type = "0";
 
}

date_default_timezone_set('Asia/Kolkata');
$date = date("Y-m-d H:i:s");
//$date = '2021-05-31 04:33:20';
 

$yr = date("Y");
$syr = date('y');
$mn = date('m');
//$mn = 03;
if($mn>=4){
$syr = $syr+1;
$yrr = $yr."-".$syr;
}
if($mn<=3){
$yr = $yr - 1;
$yrr = $yr."-".$syr;
}


$sql="select invoice_no from sales where sales_id=(select max(sales_id) from sales where invoice_no like '%$yrr%')";

$result = mysqli_query($con,$sql);
$cnt=0;
while ($row = mysqli_fetch_array($result,MYSQLI_ASSOC) )
{
$invoice_no = $row['invoice_no'];
$cnt = substr($invoice_no, strrpos($invoice_no, '/') + 1);
//$cnt = $row['quotation_id'];
}
$cnt = $cnt + 1;

$inv_id = "SE/".$yrr."/".$cnt;

mysqli_query($con,"INSERT INTO sales(invoice_no,challan_no,cust_id,total,date_added,p_type,tax_type)
VALUES('$inv_id','$challan_no','$cid','$total','$date','$p_type','$tax_type')")or die(mysqli_error($con));

$sales_id=mysqli_insert_id($con);
$_SESSION['sid']=$sales_id;
$query=mysqli_query($con,"select * from temp_trans")or die(mysqli_error($con));
while ($row=mysqli_fetch_array($query))
{
$pid=$row['prod_id'];
  $qty=$row['qty'];
$price=$row['price'];
$cost_price=$row['cost_price'];
$unit=$row['unit'];
$gst_per=$row['gst_per'];


mysqli_query($con,"INSERT INTO sales_details(prod_id,qty,price,cost_price,sales_id,unit,gst_per) VALUES('$pid','$qty','$price','$cost_price','$sales_id','$unit','$gst_per')")or die(mysqli_error($con));
}

$result=mysqli_query($con,"DELETE FROM temp_trans ") or die(mysqli_error($con));
// echo "<script>document.location='receipt.php?cid=$cid&sales_id=$sales_id'</script>";  

echo "<script>window.open('invoice_pdf.php?cid=$cid&sales_id=$sales_id','_blank');</script>";  
echo "<script>document.location='cust_new.php'</script>";



?>