<?php
session_start();
if (!isset($_SESSION['valid_username'])) {
include('header.php');
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
				<form action="log_Varification.php" method="post">
					<div class="form-group">
						<label for="emailAddress">Email</label>
						<input type="email" name="emailAddress" class="form-control" id="emailEntery" placeholder="Enter your email address">
					</div>

					<div class="form-group">
						<label for="password">Password</label>
						<input type="password" name="password" class="form-control" id="passwordEntery" placeholder="Enter your password">
					</div>

					<div class="checkbox">
						<label><input type="checkbox" name="remember">Remember me</label>
					</div>
					<button name="login" type="submit" class="btn btn-success">Login</button>
				</form>
				<a href="user_insert.php" style="color: #008C49;">Create a new account</a>
			</div>

		</div>
		<!--Left -->
		<div class="col-md-4 col-sm-4 col-xs-0"></div>
	</div>
	
</div>

<?php
include('putter.php');
}elseif (isset($_SESSION['valid_username'])) {
	header("location:home.php");
}
?> 