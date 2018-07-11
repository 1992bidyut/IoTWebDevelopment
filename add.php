<?php
session_start();
if ($_SESSION['valid_username']==true) {//session set or not
	include('database_connection.php');
	$userName=$_SESSION['valid_username'];
	echo "$userName"." ";
	$id_valid=false;
	$noOfPort;


	if(isset($_POST['add'])){//button set or not
		$dID=$_POST['dID'];

		$query="SELECT * FROM `devicelist`";//for valid device list
		$db_request=mysqli_query($connect,$query);

		while($db_read= mysqli_fetch_array($db_request)){
			
			$db_dID=$db_read['deviceID'];
			if($dID==$db_dID){//match list
				$id_valid=true;
				$noOfPort=$db_read['NumberOfPorts'];//assign amount of ports device have
              $UserToDevice="SELECT * FROM `usertoderive`";//for used cheack
              $storeUserToDevice = mysqli_query($connect,$UserToDevice);

              while($realdevice= mysqli_fetch_array($storeUserToDevice)){ 
 				if ($dID==$realdevice['DeviceID']) {//is it already regisster
 					$id_valid=false;
 				}
              } 
			}//match list
		}
		if ($id_valid==true) {
			$db_ud_insert="INSERT INTO `usertoderive` (`serialNo`, `UserName`, `DeviceID`) VALUES (NULL, '$userName', '$dID');";
			$db_request=mysqli_query($connect,$db_ud_insert);
			if (!$db_request) {
				die('Not possible bcoz: '.mysqli_error($connect));
			}

			$pkey_query="SELECT * FROM `usertoderive`WHERE `DeviceID`='$dID'";
			$pkey_fetch=mysqli_query($connect,$pkey_query);
			$pkey=mysqli_fetch_array($pkey_fetch);
			if (!$pkey_fetch) {
				die('Not possible bcoz: '.mysqli_error($connect));
			}
			$parentKey=$pkey['serialNo'];

			for ($i=1; $i <=$noOfPort ; $i++) { 
				$db_insert="INSERT INTO `devicestatus`( `deviceID`,`devicePortNo`, `Activation`, `deviceStatus`, `ParentKey`) VALUES ('$dID','$i','yes','0','$parentKey')";
				$load=mysqli_query($connect,$db_insert);

				if (!$pkey_fetch) {
				die('Not possible bcoz: '.mysqli_error($connect));
			}

			}
			echo "Process is complet";
			header('location:add_device.php');
		}else{
			echo "Invalide device id!";
			header('location:add_device.php');
		}



	}//button set or not
}//session set or not
?>