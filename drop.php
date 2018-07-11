<?php
include('database_connection.php');
$DID=$_GET['DID'];
echo $DID;
//$parentTable="SELECT * FROM `studentlist` WHERE  `studentid`='$value'";
//$parentTable="DELETE FROM `userinfo` WHERE `parant`='0'";

//first child delete
$childTable="DELETE FROM `devicestatus` WHERE `deviceID`='$DID'";
$store=mysqli_query($connect,$childTable);

//second parent
 $parentTable= "DELETE FROM `usertoderive` WHERE `DeviceID`='$DID'";
 $store=mysqli_query($connect,$parentTable);

if($store==true){
	echo 'Deleted';
	header('location:index.php');
}
else
{
	die('not possible bcoz'.mysqli_error($connect));
}

?>
	