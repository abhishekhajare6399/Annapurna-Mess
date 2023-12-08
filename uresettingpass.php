<?php
session_start();
include'database/dbcon.php';
date_default_timezone_set("Asia/Calcutta");
if( isset($_GET['token']) && isset($_GET['messid'])){
  $messid = $_GET['messid'];
  $token = $_GET['token'];

  $emailquery =" select * from signupmess where messid='$messid'";
  $query = mysqli_query($con, $emailquery);
  $emailcount = mysqli_num_rows($query);
  if($emailcount)
  {
  $userdata = mysqli_fetch_assoc($query);
  $mess = $userdata['mess'];
  $bg = $userdata['bg'];
  $logo = $userdata['logo'];
  }

?>
<html>
    <head>
    <title><?php echo $mess?></title>   
    <link rel="icon" href="<?php echo $logo?>" />
    </head>
    <?php include 'css/logincss.php'?>
    <?php include 'link/link1.php'?>
    <style>
      body {
  background-image: url('<?php echo $bg?>');
  background-repeat: no-repeat;
  background-attachment: fixed;
  background-size: cover;
}
      </style>
    <body>
      <header>
</header>
<div class="content">
<h3><?php echo $mess?></h3>
  <p>Reset Your Password.</p>
  <div class="alert alert-success alert-dismissible fade show" role="alert">
			<strong></strong>
      <?php
  if(isset($_SESSION['msg1'])){

  echo $_SESSION['msg1'];
  }else{
    echo $_SESSION['msg'] = "Enter your New Password of Minimum 6 Letter.";
  }
  ?>
				<span class="close" onclick="this.parentElement.style.display='none';">&times;</span>
		</div>
  <p class = "divider-text"></p>


  <form ction ="<?php echo htmlentities($_SERVER['PHP_SELF']);?>" method ="POST">
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

  <div class="form-group">
    <div class="form-check">
      <input class="form-check-input" type="checkbox" id="gridCheck">
      <label class="form-check-label" for="gridCheck">
       Accept All <a href="#">Terms and Condition</a>.
      </label><br>
    </div>
  </div><br>
  <div class="row">
    <div class="col-sm-3">
  </div>
  <div class="col-sm-6">
  <button type="submit" name="submit" class="btn btn-primary" style="padding: 10px 100px;">Reset</button>
  </div>
  </div><br>
</form>
</div>
</body>
</html>

<?php
include'/database/dbcon.php';

if(isset($_POST['submit']))
{
  $password = mysqli_real_escape_string($con, $_POST['pass']);
  $cpassword = mysqli_real_escape_string($con, $_POST['cpass']);
  $pass = password_hash($password, PASSWORD_BCRYPT);
  $cpass = password_hash($cpassword, PASSWORD_BCRYPT);   
  $emailquery =" select * from user where token ='$token' and messid='$messid' ";
  $query = mysqli_query($con, $emailquery);
  
  $emailcount = mysqli_num_rows($query);
  if($emailcount)
  {
    if($password == $cpassword)
  {
    $updatequery = "update user set password='$pass' where token='$token' and messid='$messid' ";

$iquery = mysqli_query($con, $updatequery);

    if($iquery){
        if(isset($_SESSION['msg'])){
            $_SESSION['msg'] ="Password Reset Successfully";
            ?>
            <script>
                location.replace("index.php?messid=<?php echo $messid?>");
            </script>
            <?php
        }else{
            $_SESSION['msg1'] = "Error Occur Try Again.";
            ?>
            <script>
          location.replace("uresettingpass.php?token=<?php echo $token?>&&messid=<?php echo $messid?>");
            </script>
            <?php
        }
        }
}else{
    $_SESSION['msg1'] = "Password is not matching Try Again !!.";
    ?>
    <script>
          location.replace("uresettingpass.php?token=<?php echo $token?>&&messid=<?php echo $messid?>");
    </script>
    <?php
}
}}}
?>
