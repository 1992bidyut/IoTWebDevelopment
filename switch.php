<?php
session_start();
if ($_SESSION['valid_username']==true) {
 include('database_connection.php');

$value=$_GET['value'];
$alterStatus=0;

$deviceStatus="SELECT * FROM `devicestatus`WHERE `serialNo`='$value'";
$storedeviceStatus = mysqli_query($connect,$deviceStatus);
$realDeviceStatus= mysqli_fetch_array($storedeviceStatus);
echo $realDeviceStatus['deviceStatus'];

$presentStatus=$realDeviceStatus['deviceStatus'];
if($realDeviceStatus['deviceStatus']==1){
	$alterStatus=0;
}elseif ($realDeviceStatus['deviceStatus']==0) {
	$alterStatus=1;
}
$updateQuery="UPDATE `devicestatus` SET `deviceStatus`=$alterStatus WHERE `serialNo`=$value";

$storedeviceStatus=mysqli_query($connect,$updateQuery);
header("location:home.php");
}else{
	header("location:index.php");
}
?>