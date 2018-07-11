<?php
$host="localhost";
$user="root";
$pass="";
$db="iotdatabase";

$connect=mysqli_connect($host,$user,$pass,$db); //this function connect php with database 
if(!$connect)
{
	die("Not Possible".mysqli_connect_error($connect));//this function is used to find error in connection
}?>