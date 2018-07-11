<?php
session_start();
include('database_connection.php');
if(isset($_POST['login']))
{
	$email=$_POST['emailAddress'];
	$password=md5($_POST['password']);

	$query="SELECT * FROM `userinformation`";
	$db_request=mysqli_query($connect,$query);

	while($db_read= mysqli_fetch_array($db_request)){
		
		$db_email=$db_read['EmailAddress'];
		$db_password=$db_read['UserPassword'];
		$db_username=$db_read['UserName'];

		if($email==$db_email&&$password=$db_password){
		
			$_SESSION['valid_email']=$db_email;
			$_SESSION['valid_password']=$db_password;
			$_SESSION['valid_username']=$db_username;
			header("location:home.php");
		}
	}
	if($_SESSION['valid_username']==false){
			header("location:index.php");
		}
}
?>