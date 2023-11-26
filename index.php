<?php
session_start();
include'database/dbcon.php';
date_default_timezone_set("Asia/Calcutta");
if(isset($_GET['messid'])){
  $messid = $_GET['messid'];
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
<h3 style="font-family:Serif;color:black;text-align:center;font-size:35px"><?php echo $mess?></h3>
  <p style="font-family:Serif;color:black;text-align:center;font-size:20px">Login Your self With <?php echo $mess?> System.</p>
  
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
      <label for="inputEmail4">Email :</label>
      <input type="email" name="email" class="form-control" id="inputEmail4" placeholder="Email" 
      value ="<?php if(isset($_COOKIE['emailcookie'])){echo $_COOKIE['emailcookie']; } ?>" required>
    </div>
  </div>
  <div class="row">
    <div class="form-group col-sm-12">
      <label for="inputEmail4">Password :</label>
      <input type="password" name="pass" class="form-control" id="inputPassword4" placeholder="Password"
      value ="<?php if(isset($_COOKIE['passwordcookie'])){echo $_COOKIE['passwordcookie']; } ?>" required>
    </div>
  </div>

  <div class="form-group">
    <div class="form-check">
      <input class="form-check-input" type ="checkbox" name = "rememberme">
      <label class="form-check-label" for="gridCheck">
       Remember me.
      </label><br>
      <label class="form-check-label" for="gridCheck">
      Forgot Password <a href="uforgotpass1.php?messid=<?php echo $messid?>">Click </a> here.
      </label><br>
    </div>
  </div><br>
  <div class="row">
    <div class="col-sm-3">
  </div>
  <div class="col-sm-6">
  <button type="submit" name="submit" class="btn btn-primary" style="padding: 10px 100px;">Login</button>
  </div>
  </div><br>
</form>
</div>
</body>
</html>


<?php
include'database/dbcon.php';

if(isset($_POST['submit']))
{

    $email1 =$_POST['email'];
    $password = $_POST['pass'];
    $email= strtolower($email1);
  
    $email_search =" select * from user where email ='$email' and status='Active' and messid='$messid'";
    
    $query = mysqli_query($con, $email_search);
    
    $email_count = mysqli_num_rows($query);
    if($email_count)
    {
      
    
    $email_pass = mysqli_fetch_assoc($query);

    $_SESSION['userid'] = $email_pass['userid'];
    $_SESSION['messid'] = $messid;
  
    $db_pass = $email_pass['password'];
    $pass_decode = password_verify($password, $db_pass);

    if($pass_decode)
    {
      if(isset($_POST['rememberme'])){
        setcookie('emailcookie',$email,time()+86400);
        setcookie('passwordcookie',$password,time()+86400);

        ?>
      <script>
          // alert("login sucessfully")
          location.replace("uindex.php");
      </script>
      <?php
      }else{
        ?>
      <script>
          location.replace("uindex.php");
      </script>
      <?php
      }
    }else
    {
        $_SESSION['msg'] ="Your Password is Not matching Try Again ";
        ?>
        <script>
            //alert("login sucessfully")
            location.replace("index.php?&messid=<?php echo $messid?>");
        </script>
        <?php
    }
    }else
    {
        $_SESSION['msg'] ="Invaild Username ID or Else you are Not Member of these Mess";
        ?>
        <script>
            //alert("login sucessfully")
            location.replace("index.php?&messid=<?php echo $messid?>");
        </script>
        <?php
    }
  }
}
?>