<?php
session_start();
if ($_SESSION['valid_username']==true) {
 include('database_connection.php');
 include('header.php');
 include('profile_header.php');
?>
<div class="container-fluid main-div">
	<div class="row">
		<!--Right -->
		<div class="col-md-4 col-sm-4 col-xs-0">
	
		</div>
		<!--Mid -->
		<div class="col-md-4 col-sm-4 col-xs-12">
			<div class="login_pannel">
				<img src="image/title_2.png" style="width: 100%; height: 10%;">
				<form action="add.php" method="post">		

					<div class="form-group">
						<label for="dID">Enter your Device ID</label>
						<input type="dID" name="dID" class="form-control" id="dID" placeholder="Enter Device ID">
					</div>

					<button name="add" type="submit" class="btn btn-success">Add</button>
				</form>
				
			</div>

		</div>
		<!--Left -->
		<div class="col-md-4 col-sm-4 col-xs-0"></div>
	</div>
	
</div>
<?php
include('putter.php');
}
?> 