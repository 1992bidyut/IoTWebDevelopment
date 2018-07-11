<?php
session_start();
if ($_SESSION['valid_username']==true) {
 include('database_connection.php');
 include('header.php');
 include('profile_header.php')
}
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
                <th>
                	<a class="btn btn-danger" href="delete.php?stuid=<?php echo $id?>">Delet</a>
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
                <td><?php echo $realdevice['deviceID'];?></td>
                <td>
                  <a class="btn btn-danger" href="delete.php?stuid=<?php echo $id?>">Delet</a>
                </td>
              </tr>
            <?php
              }
            ?>  
          </tbody>
          </table> 
              </div><!--  mid col end  -->

     <div class="col-md-1 col-sm-1 col-xs-0 right-col"></div><!--  left col end  -->
    </div>
    
</div>
  <!--  container end  -->