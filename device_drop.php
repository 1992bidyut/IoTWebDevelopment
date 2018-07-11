<?php
session_start();
if ($_SESSION['valid_username']==true) {
 include('database_connection.php');
 include('header.php');
 include('profile_header.php');
?>
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-3 col-sm-3 col-xs-0 left-col ">
        
      </div><!--  right col end  -->

      <div class="col-md-6 col-sm-6 col-xs-12 mid-col">
        <h2 style="color: #fff; border-bottom: 2px solid red;">Device Drop</h2>    
        <table class="table" style=" color: #fff;">
            <thead>
              <tr>
                <th>Serial No.</th>
                <th>Device ID</th>
                <th>
                </th>
              </tr>
            </thead>
            <tbody>
             
            <!-- Devices -->
            <?php
              $UserToDevice="SELECT * FROM `usertoderive`WHERE  `UserName`='$userName'";
              $storeUserToDevice = mysqli_query($connect,$UserToDevice);
              $indexCounter=0;

              while($realdevice= mysqli_fetch_array($storeUserToDevice)){ 
                $indexCounter++;   
            ?>
              <tr>
                <td><?php echo $indexCounter; ?></td>
                <td><?php echo $realdevice['DeviceID'];?></td>
                <td>
                  <a class="btn btn-danger" href="drop.php?DID=<?php echo $realdevice['DeviceID'];?>">Drop</a>
                </td>
              </tr>
            <?php
              }
            ?>  
          </tbody>
          </table> 
              </div><!--  mid col end  -->

     <div class="col-md-3 col-sm-3 col-xs-0 right-col"></div><!--  left col end  -->
    </div>
    
</div>
  <!--  container end  -->
<?php
include('putter.php');
}
?>