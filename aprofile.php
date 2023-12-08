<?php include'asession.php'?>
<!DOCTYPE html>
<html lang="en">
<?php include'ahead.php' ?>
<style>

</style>
<body>

<nav class="navbar navbar-inverse visible-xs">
  <div class="container-fluid">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>                        
      </button>
      <a class="navbar-brand" href="ahome.php"><?php echo $name?></a>
    </div>
    <div class="collapse navbar-collapse" id="myNavbar">
      <ul class="nav navbar-nav">
      <li><a href="ahome.php"><i class="fa fa-home" aria-hidden="true"></i>&nbsp;&nbsp; Home</a></li>
          <li><a href="amenu.php"><i class="fa-solid fa-bars"></i>&nbsp;&nbsp; Menu</a></li>
          <li  class="active"><a href="aprofile.php"><i class="fas fa-user"></i>&nbsp;&nbsp; Mess Profile</a></li>
          <li><a onclick="openInNewTab()"><i class="fa-solid fa-calendar"></i>&nbsp;&nbsp; Todays
                            Attendance</a></li>
          <li><a href="aattendence.php"><i class="fas fa-calendar" aria-hidden="true"></i>&nbsp;&nbsp; Attendance</a></li>
          <li><a href="aallmember.php"><i class="fa-solid fa-users-line"></i>&nbsp;&nbsp; All Member</a></li>
          <li><a href="aorderhistory.php"><i class="fa fa-history" aria-hidden="true"></i>&nbsp;&nbsp; History</a></li>
          <li><a href="ahistory.php"><i class="fa fa-history" aria-hidden="true"></i>&nbsp;&nbsp; History</a></li>
          <li><a href="anotification.php"><i class="fa-solid fa-bell"></i>&nbsp;&nbsp; Notifications</a></li>
          <li><a href="alogout.php"><i class="fa fa-sign-out" aria-hidden="true"></i>&nbsp;&nbsp; Logout</a></li>
        <form action ="search.php" method ="POST">
          <div class="input-group" style="padding: 10px;">
            <input type="text" name ="search" class="form-control" placeholder="Search">
            <span class="input-group-btn">
              <button class="btn btn-default" button type ="submit" name ="submit">
                <span class="glyphicon glyphicon-search"></span>
              </button>
            </span>
          </div>
    </form><br>
      </ul>
    </div>
  </div>
</nav>

<div class="container-fluid">
  <div class="row content">
    <div class="col-sm-2 sidenav hidden-xs"><br><br><br>
      <form action ="search.php" method ="POST">
        <div class="input-group">
          <input type="text" name ="search" class="form-control" placeholder="Search">
          <span class="input-group-btn">
            <button class="btn btn-default" button type ="submit" name ="submit">
              <span class="glyphicon glyphicon-search"></span>
            </button>
          </span>
        </div>
  </form><br>
        <ul class="nav nav-pills nav-stacked">
        <li ><a href="ahome.php"><i class="fa fa-home" aria-hidden="true"></i>&nbsp;&nbsp; Home</a></li><br>
          <li><a href="amenu.php"><i class="fa-solid fa-bars"></i>&nbsp;&nbsp; Menu</a></li><br>
          <li  class="active"><a href="aprofile.php"><i class="fas fa-user"></i>&nbsp;&nbsp; Mess Profile</a></li><br>
          <li><a onclick="openInNewTab()"><i class="fa-solid fa-calendar"></i>&nbsp;&nbsp; Todays
                            Attendance</a></li><br>
          <li><a href="aattendence.php"><i class="fas fa-calendar" aria-hidden="true"></i>&nbsp;&nbsp; Attendance</a></li><br>
          <li><a href="aallmember.php"><i class="fa-solid fa-users-line"></i>&nbsp;&nbsp; All Member</a></li><br>
          <li><a href="aorderhistory.php"><i class="fa fa-history" aria-hidden="true"></i>&nbsp;&nbsp;Order History</a></li><br>
          <li><a href="ahistory.php"><i class="fa fa-history" aria-hidden="true"></i>&nbsp;&nbsp; History</a></li><br>
          <li><a href="anotification.php"><i class="fa-solid fa-bell"></i>&nbsp;&nbsp; Notifications</a></li><br>
          <li><a href="alogout.php"><i class="fa fa-sign-out" aria-hidden="true"></i>&nbsp;&nbsp; Logout</a></li><br>
        </ul><br>
      </div>
    <?php include'anav.php'?>
    <div class="row">
        <div class="col-sm-12">
            <div class="well">
            <div class="row">
        <div class="col-sm-5">
  <p style="padding:20px;text-align: left;font-size: 15px;">Mess Profile : </p>
        </div>

        <?php
include 'database/dbcon.php';
$li=$_SESSION['messid'];
$selectquery = "select * from signupmess  where messid ='$li' and status='Active'";
$query = mysqli_query($con,$selectquery);
while($result =mysqli_fetch_array($query)){
?>
        <div class="col-sm-7">
  <div style="text-align: right;padding:20px;">   
  <a data-id='<?php echo $result['messid']; ?>' class="userinfo" style="text-decoration: none;"><button type="button" class="btn btn-primary"><i class="fa fa-edit" aria-hidden="true"></i> Edit</button></a>&nbsp;&nbsp;&nbsp;&nbsp;<br>
 </div></div></div>
  <div class="container3">
<div class="row">
<div class="col-sm-8" style="padding:5px;">
<form action ="<?php echo htmlentities($_SERVER['PHP_SELF']);?>" method ="POST" enctype ="multipart/form-data">
<div class="row" style="padding:15px;">

<div class="col-sm-12" style="padding:10px;">
      <label for="inputEmail4">Mess Name : <?php echo $result['mess'];?></label>
      </div>
<div class="col-sm-6" style="padding:10px;">
      <label for="inputEmail4">Email : <?php echo $result['email'];?></label>
</div>
<div class="col-sm-6" style="padding:10px;">
      <label for="inputEmail4">Mobile : <?php echo $result['mobile'];?></label>
</div>
<div class="col-sm-4" style="padding:10px;">
      <label for="inputEmail4">Coupon : <?php echo $result['coupon'];?> Rs.</label>
</div>
<div class="col-sm-4" style="padding:10px;">
      <label for="inputEmail4">Coupon onetime : <?php echo $result['coupon_onetime'];?> Rs.</label>
</div>
<div class="col-sm-4" style="padding:10px;">
      <label for="inputEmail4">Monthly : <?php echo $result['monthly'];?> Rs.</label>
</div>
<div class="col-sm-4" style="padding:10px;">
      <label for="inputEmail4">Monthly onetime : <?php echo $result['monthly_onetime'];?> Rs.</label>
</div>
<div class="col-sm-4" style="padding:10px;">
      <label for="inputEmail4">Non Veg Add: <?php echo $result['Non_veg'];?> Rs.</label>
</div>
<div class="col-sm-12" style="padding:10px;">
<label for="inputEmail4">Address : <?php echo $result['address'];?> <?php echo $result['city'];?> <?php echo $result['state'];?> <?php echo $result['pincode'];?>.</label>
</div>
<div class="col-sm-12" style="padding:10px;">
      <label for="inputEmail4">Mess Description : <?php echo $result['description'];?></label>
</div>
<div class="col-sm-12" style="padding:10px;">
      <label for="inputEmail4">About us : <?php echo $result['about'];?></label>
</div>
</div>
</form>
</div>
<div class="col-sm-4" style="padding:10px;">
<img alt="ecommerce" src="<?php echo $result['image'];?>"style="width:80%;height:100%;border-radius:12px;">
</div>
<?php } ?>
</div>
  
  </div>
            </div>
        </div>
    </div>

    </div>
        </div>
      </div>
    </div>
  </div>
</div>

<?php include 'afooter.php'?>

<script type='text/javascript'>
            $(document).ready(function(){
                $('.userinfo').click(function(){
                    var userid = $(this).data('id');
                    $.ajax({
                        url: 'aprofilepop.php',
                        type: 'post',
                        data: {userid: userid},
                        success: function(response){ 
                            $('.modal-body').html(response); 
                            $('#empModal').modal('show'); 
                        }
                    });
                });
            });
            </script>
        <div class="modal fade" id="empModal" role="dialog">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">Edit Profile Information :</h6>
                          <button type="button" class="close" data-dismiss="modal">×</button>
                        </div>
                        <div class="modal-body">
                        </div>
                    </div>
                </div>
        </div>

</body>

<script>
    function openInNewTab() {
        // Define the URL you want to open
        var url = "https://annapurnamess.online/atodayattendance.php";

        // Open the URL in a new tab
        window.open(url, '_blank');
    }
</script>
</html>



<?php
include "database/dbcon.php";
date_default_timezone_set("Asia/Calcutta");
if(isset($_POST['changeinfo']))
    {
      $messid = $_SESSION['messid'];
$name = mysqli_real_escape_string($con, $_POST['name']);
$mobile =mysqli_real_escape_string($con, $_POST['mobile']);
$email=mysqli_real_escape_string($con, $_POST['email']);
$about=mysqli_real_escape_string($con, $_POST['about']);
$description=mysqli_real_escape_string($con, $_POST['description']);

$pincode = mysqli_real_escape_string($con, $_POST['pincode']);
$city =mysqli_real_escape_string($con, $_POST['city']);
$state=mysqli_real_escape_string($con, $_POST['state']);
$address=mysqli_real_escape_string($con, $_POST['address']);

$monthly = mysqli_real_escape_string($con, $_POST['monthly']);
$monthly_onetime =mysqli_real_escape_string($con, $_POST['monthly_onetime']);
$coupon=mysqli_real_escape_string($con, $_POST['coupon']);
$coupon_onetime=mysqli_real_escape_string($con, $_POST['coupon_onetime']);
$nonveg=mysqli_real_escape_string($con, $_POST['nonveg']);

$file = $_FILES['bg'];
    $filename = $file['name'];
    $filepath = $file['tmp_name'];
    $fileerror = $file['error'];
    if ($fileerror == 0) {
        $destfile = 'Mess_image/' . $filename;
        move_uploaded_file($filepath, $destfile);
    }
    $file1 = $_FILES['image'];
    $filename1 = $file1['name'];
    $filepath1 = $file1['tmp_name'];
    $fileerror1 = $file1['error'];
    if ($fileerror1 == 0) {
        $destfile1 = 'Mess_image/' . $filename1;
        move_uploaded_file($filepath1, $destfile1);
    }
    $file2 = $_FILES['logo'];
    $filename2 = $file2['name'];
    $filepath2 = $file2['tmp_name'];
    $fileerror2 = $file2['error'];
    if ($fileerror2 == 0) {
        $destfile2 = 'Mess_image/' . $filename2;
        move_uploaded_file($filepath2, $destfile2);
    }
    if($destfile==NULL) $destfile = mysqli_real_escape_string($con, $_POST['bg']);
    if($destfile1==NULL) $destfile1 = mysqli_real_escape_string($con, $_POST['image']);
    if($destfile2==NULL) $destfile2 = mysqli_real_escape_string($con, $_POST['logo']);
       
$sql = "Update signupmess set mess='$name',mobile='$mobile',email='$email',address='$address',city='$city',state='$state',pincode='$pincode',
monthly='$monthly',monthly_onetime='$monthly_onetime',coupon_onetime='$monthly_onetime',coupon='$coupon',Non_veg='$nonveg',description='$description',
about='$about',bg='$destfile',image='$destfile1',logo='$destfile2' where messid='$messid'";
$result1 = mysqli_query($con,$sql);
if($result1)
    {
      ?>
    <script>
    alert("Information Update sucessfully")
    location.replace('aprofile.php')
    </script>
    <?php
    }else{
      ?>
      <script>
      alert("Information Not Update")
      location.replace('aprofile.php')
      </script>
      <?php
    }
     }
?>