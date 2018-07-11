<!-- Column names -->
        <div class="row" style="text-align: center; color: #fff;border-bottom: 2px solid green;margin-bottom: -5px;">
          <div class="col-md-2 col-sm-2 col-xs-2">
            <h4>Serial No.</h4>
          </div>
          <div class="col-md-2 col-sm-2 col-xs-2">
            <h4>Device ID</h4>
          </div>
          <div class="col-md-2 col-sm-2 col-xs-2">
            <h4>Port No.</h4>
          </div>
          <div class="col-md-2 col-sm-2 col-xs-2">
            <h4>Active</h4>
          </div>
          <div class="col-md-2 col-sm-2 col-xs-2">
            <h4>Status</h4>
          </div>
          <div class="col-md-2 col-sm-2 col-xs-2" >
            <h4 style="border-left:2px solid red;">Switch</h4>
          </div>
        </div>
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
        <div class="row" style="text-align: center; color: #fff;border-bottom: 2px solid green;margin-bottom: -5px;">
          <div class="col-md-2 col-sm-2 col-xs-2">
            <h5><?php echo $indexCounter; ?></h5>
          </div>
          <div class="col-md-2 col-sm-2 col-xs-2">
            <h5><?php echo $realDeviceStatus['deviceID'];?></h5>
          </div>
          <div class="col-md-2 col-sm-2 col-xs-2">
            <h5><?php echo $realDeviceStatus['devicePortNo'];?></h5>
          </div>
          <div class="col-md-2 col-sm-2 col-xs-2">
            <h5><?php echo $realDeviceStatus['Activation'];?></h5>
          </div>
          <div class="col-md-2 col-sm-2 col-xs-2">
            <h5><?php echo $realDeviceStatus['deviceStatus'];?></h5>
          </div>
          <div class="col-md-2 col-sm-2 col-xs-2" >
            <a href="#"><h5 style="border-left:2px solid red;">
              <?php
              if ($realDeviceStatus['deviceStatus']==0) {
                echo "ON";
              }
              if ($realDeviceStatus['deviceStatus']==1) {
                echo "OFF";
              }
              ?>
              </h5></a>
          </div>
        </div>
        <?php
      }
      }
      $indexCounter=0;
    
        ?>