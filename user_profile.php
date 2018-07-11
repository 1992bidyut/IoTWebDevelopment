<?php
session_start();
if ($_SESSION['valid_username']==true) {
  include('header.php');
  include('database_connection.php');
  //required('header.php');
  include('profile_header.php');

$userInfoTable="SELECT * FROM `userinformation`WHERE  `UserName`='$userName'";
$store = mysqli_query($connect,$userInfoTable);
$realdata= mysqli_fetch_array($store);

?>
<div class="container">
	<div class="row">
		<div class="col-md-1 col-sm-1 col-xs-0"></div>
		<div class="col-md-8 col-sm-8 col-xs-9" style="text-align: left;">
			<h2 style="background-color: gray">Profile</h2>  
			 
			  <table class="table" style="color: #fff;">
			    <thead>
			      <tr>
			      </tr>
			    </thead>
			    <tbody>
				    <tr><td>Name:</td><td><?php echo $realdata['FirstName']." ".$realdata['LastName']; ?></td></tr>
					<tr><td>Email Address:</td><td><?php echo $realdata['EmailAddress']; ?></td></tr>
					<tr><td>User Name:</td><td><?php echo $realdata['UserName']; ?></td></tr>
			    </tbody>
			  </table>
		</div>
		<div class="col-md-3 col-sm-3 col-xs-3">
			<img src="<?php echo $realdata['ProfilePicPath']?>" alt="profile image" style="width: 100%; margin: 20px 5px 5px 5px;"> 
		</div>
	</div>
  
</div>
<?php
include('putter.php');
}
?>