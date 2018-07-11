<?php 
 $userName=$_SESSION['valid_username'];
  $userInfoTable="SELECT * FROM `userinformation`WHERE  `UserName`='$userName'";
  $store = mysqli_query($connect,$userInfoTable);

  $realdata= mysqli_fetch_array($store);
?>

<nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header" style="padding-left: 20px;">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="#"><img src="image/title_2.png" style="width: 200px;height: 50px;  padding-bottom: 15px;padding-top: 0px;"></a>

    </div>


    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">

      <ul class="nav navbar-nav navbar-right">
        <li><a href="home.php" style="padding-top: 18px;">Home</a></li>
        <li><a href="user_profile.php">
          <img src="<?php echo $realdata['ProfilePicPath']?>" alt="image" style="width: 30px; height: 30px; padding-top: 1px;">
          <?php echo $realdata['FirstName']." ".$realdata['LastName'];?>
          </a>
        </li>
        <li><a class="btn" style="padding-top: 18px;" href="user_logout.php">Logout</a>
        </li>
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li><a href="#">Account Setting</a></li>
            <li><a href="#">Privacy</a></li>
            <li><a href="add_device.php">Add new Device</a></li>
            <li><a href="device_drop.php">Drop a Device</a></li>
          </ul>
        </li>
      </ul>
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>