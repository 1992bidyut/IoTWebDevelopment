<?php
session_start();
if ($_SESSION['valid_username']==true) {
  include('header.php');
  include('database_connection.php');
  //required('header.php');
  include('profile_header.php');

?>
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-1 col-sm-1 col-xs-0 left-col ">
        
      </div><!--  right col end  -->

      <div class="col-md-10 col-sm-10 col-xs-12 mid-col">
        <h2 style="color: #fff; border-bottom: 2px solid red; ">Device Control pannel</h2>    

        

        <table class="table" style=" color: #fff;">
            <thead>
              <tr>
                <th>Serial No.</th>
                <th>Device ID</th>
                <th>Port No.</th>
                <th>Active</th>
                <th>Status</th>
                <th>Switch</th>
              </tr>
            </thead>
            <tbody>
             
            <!-- Devices -->
            <?php
              $UserToDevice="SELECT * FROM `usertoderive`WHERE  `UserName`='$userName'";
              $storeUserToDevice = mysqli_query($connect,$UserToDevice);
              $indexCounter=0;

              while($realdevice= mysqli_fetch_array($storeUserToDevice)){ 
                
                $deviceID = $realdevice['DeviceID'];
                $deviceStatus="SELECT * FROM `devicestatus`WHERE `deviceID`='$deviceID'";
                $storedeviceStatus = mysqli_query($connect,$deviceStatus);
                while ($realDeviceStatus= mysqli_fetch_array($storedeviceStatus)) {  
                $indexCounter++;   
            ?>
              <tr>
                <td><?php echo $indexCounter; ?></td>
                <td><?php echo $realDeviceStatus['deviceID'];?></td>
                <td><?php echo $realDeviceStatus['devicePortNo'];?></td>
                <td><?php echo $realDeviceStatus['Activation'];?></td>
                <td><?php echo $realDeviceStatus['deviceStatus'];?></td>
                <td>
                  <a href="switch.php?value=<?php echo $realDeviceStatus['serialNo']; ?>"><h5 style="border-left:2px solid red;">
                      <?php
                      if ($realDeviceStatus['deviceStatus']==0) {
                        echo "ON";
                      }
                      if ($realDeviceStatus['deviceStatus']==1) {
                        echo "OFF";
                      }
                      ?></h5></a>
                </td>
              </tr>
            <?php
              }
              }
              $indexCounter=0;
            ?>  
          </tbody>
          </table> 
              </div><!--  mid col end  -->

     <div class="col-md-1 col-sm-1 col-xs-0 right-col"></div><!--  left col end  -->
    </div>
    
</div>
  <!--  container end  -->
<?php
include('putter.php');
}
?> 