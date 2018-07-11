<?php
include('database_connection.php');
if (isset($_POST['btn-submit'])) {

		var_dump($_FILES);
		$picName=$_FILES['image']['name'];
		$picSize=$_FILES['image']['size'];
		$picType=$_FILES['image']['type'];
		$picTempPath=$_FILES['image']['tmp_name'];

		echo "$picName <br>";
		echo "$picSize <br>";
		echo "$picType <br>";
		echo "$picTempPath <br>";

		$dirName="profile-image/";

		//file already exist

		//Image size not allowed then 2MB
		if($picSize>2000000){
			echo "Image too large";
			header('location:index.php');
		}

		//file already exist
		elseif (file_exists($dirName.$picName)) {
			echo "File Already Exist";
			header('location:index.php');
		}

		//Image Type will bePNG or JPG
		elseif ($picType!='image/jpeg' && $picType!='image/png') {
			echo "Image type is not supported";
			header('location:index.php');
		}

		else{
			
			if(move_uploaded_file($picTempPath, $dirName.$picName)){
				echo "Good to go!";
				//store image path to the database
				//insert query
			}else {
				echo "Something Wrong!!!";
				header('location:index.php');
			}
		}
		
	$firstName= $_POST['firstName'];
	$lastName= $_POST['lastName'];
	$userName= $_POST['userName'];
	$passWord= md5($_POST['passWord']);
	$email= $_POST['email'];
	$proPicPath=$dirName.$picName;

	$insertQuery="INSERT INTO `userinformation`( `FirstName`, `LastName`, `UserName`, `UserPassword`, `EmailAddress`,`UserType`,`ProfilePicPath`) VALUES ('$firstName','$lastName','$userName','$passWord','$email','user','$proPicPath')";

	$insert=mysqli_query($connect,$insertQuery);

	if ($insert==true) {
		header('location:index.php');
	}else{
		die('not possible bcoz: '.mysqli_error($connect));
	}
}

if (isset($_POST['btn-cancle'])) {
	header('location:index.php');
}
	 	
?>