<?php
include('header.php');

?>
<div class="container-fluid main-div">
	<div class="row">
		<!--Right -->
		<div class="col-md-2 col-sm-2 col-xs-0">
	
		</div>
		<!--Mid -->
		<div class="col-md-8 col-sm-8 col-xs-12">
			<div class="registation_pannel">
				<img src="image/title_2.png" style="width: 40%; height: 10%;">

				<div>
					<h1>Insert</h1>
				 	
				 <form class="form-horizontal" enctype="multipart/form-data" action="user_insert_to_table.php" method="post">

				  <div class="form-group">
				    <label class="control-label col-sm-2" for="firstName">First Name</label>
				    <div class="col-sm-10">
				      <input type="text" class="form-control rigistation-fild" id="firstName" name="firstName" placeholder="First Name">
				    </div>
				  </div>

					<div class="form-group">
					  <label class="control-label col-sm-2" for="lastName">Last Name</label>
					    <div class="col-sm-10">
					      <input type="text" class="form-control rigistation-fild" id="lastName" name="lastName" placeholder="Last Name">
					    </div>
					  </div>

					<div class="form-group">
					  <label class="control-label col-sm-2" for="userName">User Name</label>
					    <div class="col-sm-10">
					      <input type="text" class="form-control rigistation-fild" id="userName" name="userName" placeholder="User Name">
					    </div>
					  </div>

					  <div class="form-group">
					  <label class="control-label col-sm-2" for="passWord">Password</label>
					    <div class="col-sm-10">
					      <input type="text" class="form-control rigistation-fild" id="passWord" name="passWord" placeholder="Password">
					    </div>
					  </div>

					  <div class="form-group">
					  <label class="control-label col-sm-2" for="email">Email</label>
					    <div class="col-sm-10">
					      <input type="text" class="form-control rigistation-fild" id="email" name="email" placeholder="Email">
					    </div>
					  </div>

					  <div class="form-group">
					  	<label class="control-label col-sm-2" for="imege">Image</label>
					  	<div class="col-sm-10" style="width: 25%">
					      <input type="file" class="form-control" id="email" placeholder="image" name="image">
					    </div>
					  </div>

					  <div class="form-group">

					    <div class="col-sm-offset-2 col-sm-10">
					      <button name="btn-submit" type="submit" class="btn btn-default">Submit</button>
					      <button name="btn-cancle" type="cancle" class="btn btn-default">Cancle</button>
					  </div>
					</form> 
				</div>

				</div>
			</div>
		</div>
		<!--Left -->
		<div class="col-md-2 col-sm-2 col-xs-0"></div>
	</div>
	
</div>