<?php include'uheader.php'?>
<style>
.container1 {
    width: 1100px;
    /* Set the width of your container */
    height: auto;
    /* Set the height of your container */
    overflow: auto;
    padding: 20px;
    background-color: white;
}

.hero-bg {
    background-image: url('<?php echo $bg?>');
    background-size: cover;
    background-position: center;
    background-attachment: fixed;
}

@media (max-width: 786px) {
    .container1 {
        width: 350px;
        /* Set the width of your container */
        height: 500px;
        margin-top: 100px;
        margin-left: 10px;
        margin-right: 10px;
        overflow: auto;
        /* Set the height of your container */
    }
}

.breadcrumb-bg {
    background-image: url('<?php echo $bg?>');
}

.feature-bg:after {
    background-image: url('<?php echo $messimage?>');
    position: absolute;
    right: 0;
    top: 0;
    width: 40%;
    height: 100%;
    content: "";
    background-size: cover;
    background-position: center;
    border-top-left-radius: 5px;
    -webkit-box-shadow: 0 0 20px #cacaca;
    box-shadow: 0 0 20px #cacaca;
    border-bottom-left-radius: 5px;
}
</style>
<!-- end search arewa -->

<!-- breadcrumb-section -->
<div class="breadcrumb-section breadcrumb-bg">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 offset-lg-2 text-center">
                <div class="breadcrumb-text">
                    <h3 style="color:white;">Welcome <?php echo $name?></h3>
                    <h1>Customer Profile</h1>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- end breadcrumb section -->

<!-- featured section -->
<div class="container">
    <?php
                       include'database/dbcon.php';
                       date_default_timezone_set("Asia/Calcutta");
                       if(isset($_GET['userid'])){
                         $userid = $_GET['userid'];
                         $emailquery =" select * from user where userid='$userid'";
                         $query = mysqli_query($con, $emailquery);
                         $emailcount = mysqli_num_rows($query);
                         if($emailcount)
                         {
                         $userdata = mysqli_fetch_assoc($query);
                         $name = $userdata['name'];
                         $mobile = $userdata['mobile'];
                         $email = $userdata['email'];
                         $address = $userdata['address'];
                         $image = $userdata['image'];
                         }
                        }
                       ?>
    <div class="row" style="padding:5px;">
        <div class="col-sm-8" style="padding:15px;">
            <div class="row" style="padding:5px;">
                <div class="col-sm-12" style="padding:15px;">
                    <label for="inputEmail4">Customer Name :
                        <?php echo $name;?></label>
                </div>
                <div class="col-sm-12" style="padding:15px;">
                    <label for="inputEmail4">Email : <?php echo $email;?></label>
                </div>
                <div class="col-sm-12" style="padding:15px;">
                    <label for="inputEmail4">Mobile Number :
                        <?php echo $mobile;?></label>
                </div>
                <div class="col-sm-12" style="padding:15px;">
                    <label for="inputEmail4">Address :
                        <?php echo $address;?></label>
                </div>
            </div>
            <form action="" method="POST" enctype="multipart/form-data">
                <input type="hidden" name="userid" value="<?php echo $userid; ?>">
                <label for="inputAddress">Upload New Profile Image :</label>
                    <input  type="file" name="proof" id="image" accept="image/*" onchange="checkFileSize(this)">
                <button class="btn btn-primary" type="submit" name="changeinfo">Update
                    Image</button>
            </form>
            <label for="inputEmail4">Password Reset</label>
             <form action ="" method ="POST">
            <div class="row">
            <div class="form-group col-sm-12">
                  <label for="inputPassword4">Password :</label>
                  <input type="password" class="form-control" id="inputPassword4" name="pass" placeholder="Password" required>
                </div>
                <div class="form-group col-sm-12">
                  <label for="inputPassword4">Confirm Password :</label>
                  <input type="password" class="form-control" id="inputPassword4" name="cpass" placeholder="Password" required>
                </div>
              </div>
            
              <div class="row">
                <div class="col-sm-3">
              </div>
              <div class="col-sm-6">
              <button type="submit" name="reset" class="btn btn-primary" style="padding: 10px 100px;">Reset</button>
              </div>
              </div><br>
            </form>

        </div>
        <div class="col-sm-4" style="padding:15px;">
            <img alt="ecommerce" src="<?php echo $image;?>" style="width:80%;height:100%;border-radius:12px;">
        </div>
    </div>
</div>

<!-- end featured section -->



<!-- logo carousel -->
<?php include'ufooter.php'?>


</body>

<script>
    function checkFileSize(input) {
        if (input.files && input.files[0]) {
            const maxSize = 3 * 1024 * 1024; // 5MB in bytes
            const fileSize = input.files[0].size;

            if (fileSize > maxSize) {
                alert("File size exceeds the maximum limit of 3MB. Please choose a smaller file.");
                input.value = ''; // Clear the input field
            }
        }
    }
</script>
</html>
<?php
if(isset($_POST['reset']))
{
  $password = mysqli_real_escape_string($con, $_POST['pass']);
  $cpassword = mysqli_real_escape_string($con, $_POST['cpass']);
  $pass = password_hash($password, PASSWORD_BCRYPT);
  $cpass = password_hash($cpassword, PASSWORD_BCRYPT);   
  $emailquery =" select * from user where userid ='$userid' and messid='$messid' ";
  $query = mysqli_query($con, $emailquery);
  
  $emailcount = mysqli_num_rows($query);
  if($emailcount)
  {
    if($password == $cpassword)
  {
    $updatequery = "update user set password='$pass' where userid='$userid' and messid='$messid' ";

$iquery = mysqli_query($con, $updatequery);

    if($iquery){
        if(isset($_SESSION['msg'])){
            ?>
            <script>
                alert("Password Reset Successfully");
location.replace('uprofilepop.php?userid=<?php echo $userid?>');
            </script>
            <?php
        }else{
            ?>
            <script>
          alert("Error Occur Try Again.");
location.replace('uprofilepop.php?userid=<?php echo $userid?>');
            </script>
            <?php
        }
        }
}else{
    ?>
    <script>
              alert("Password is not matching Try Again !!.");
location.replace('uprofilepop.php?userid=<?php echo $userid?>');
    </script>
    <?php
}
}}
?>





<?php
if (isset($_POST['changeinfo'])) {
    $file = $_FILES['proof'];
    $filename = $file['name'];
    $filepath = $file['tmp_name'];
    $fileerror = $file['error'];
    if ($fileerror == 0) {
        $destfile = 'M_user/' . $filename;
        move_uploaded_file($filepath, $destfile);

            $insertquery = "UPDATE user SET image = '$destfile' WHERE userid = '$userid'";
            $iquery = mysqli_query($con, $insertquery);

            if ($iquery) {
                ?>
<script>
alert("Profile Updated Successfully");
location.replace('uprofilepop.php?userid=<?php echo $userid?>');
</script>
<?php
            } else {
                ?>
<script>
alert("Profile Not Updated");
location.replace('uprofilepop.php?userid=<?php echo $userid?>');
</script>
<?php
            }
    }
}
?>