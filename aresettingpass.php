<?php
session_start();
?>
<html>
    <head>
    <title>Annapurna Mess</title>   
    <link rel="icon" href="image\Agriculture _crop.png" />
    </head>
    
    <?php include 'css/logincss.php'?>
    <?php include 'link/link1.php'?>
    <body>
      <header>
</header>
<div class="content">
<h3 style="font-family:Serif;color:black;text-align:center;font-size:35px">Annapurna Mess</h3>
  <p style="font-family:Serif;color:black;text-align:center;font-size:20px">Reset Your Password.</p>
  <div class="alert alert-success alert-dismissible fade show" role="alert">
			<strong></strong>
      <?php
  if(isset($_SESSION['msg'])){

  echo $_SESSION['msg'];
  }else{
    echo $_SESSION['msg'] = "You are logged out. Please login again.";
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
include'database/dbcon.php';
if(isset($_GET['token'])){
$token = $_GET['token'];
if(isset($_POST['submit']))
{
  $password = mysqli_real_escape_string($con, $_POST['pass']);
  $cpassword = mysqli_real_escape_string($con, $_POST['cpass']);
  $pass = password_hash($password, PASSWORD_BCRYPT);
  $cpass = password_hash($cpassword, PASSWORD_BCRYPT);   
  $emailquery =" select * from signupmess where token ='$token' ";
  $query = mysqli_query($con, $emailquery);
  
  $emailcount = mysqli_num_rows($query);
  if($emailcount)
  {
    if($password == $cpassword)
  {
    $updatequery = "update signupmess set password='$pass' , cpassword='$cpass' where token='$token' ";

$iquery = mysqli_query($con, $updatequery);

    if($iquery){
        if(isset($_SESSION['msg'])){
            $_SESSION['msg'] ="Password Reset Successfully";
            ?>
            <script>
                location.replace("alogin.php");
            </script>
            <?php
        }else{
            $_SESSION['msg'] = "Error Occur Try Again.";
            ?>
            <script>
          location.replace("aresettingpass.php?token=<?php echo $token?>");
            </script>
            <?php
        }
        }
}else{
    $_SESSION['msg'] = "Password is not matching Try Again !!.";
    ?>
    <script>
        location.replace("aresettingpass.php?token=<?php echo $token?>");
    </script>
    <?php
}
}}}
?>
