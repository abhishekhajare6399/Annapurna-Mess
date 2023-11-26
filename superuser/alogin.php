<?php
session_start();
include'C:\xampp\htdocs\Mess Management\database\dbcon.php';
date_default_timezone_set("Asia/Calcutta");
?>
<html>
    <head>
    <title>Annapurna Mess</title>   
    <link rel="icon" href="image\Agriculture _crop.png" />
    </head>
    <?php include 'C:\xampp\htdocs\Mess Management\css\logincss.php'?>
    <?php include 'C:\xampp\htdocs\Mess Management\link\link1.php'?>
    <body>
      <header>
</header>
<div class="content">
<h3 style="font-family:Serif;color:black;text-align:center;font-size:35px">Annapurna Mess Super Admin</h3>
  <p style="font-family:Serif;color:black;text-align:center;font-size:20px">Login Your self With Annapurna Mess</p>
  
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
      Forgot Password <a href="aforgotpass1.php">Click </a> here.
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

if(isset($_POST['submit']))
{

    $email1 =$_POST['email'];
    $password = $_POST['pass'];
    $email= strtolower($email1);
    $email_search =" select * from signupmess where email ='$email' and status='Active' ";
    
    $query = mysqli_query($con, $email_search);
    
    $email_count = mysqli_num_rows($query);
    if($email_count)
    {
      
    
    $email_pass = mysqli_fetch_assoc($query);

    $_SESSION['messid'] = $email_pass['messid'];
  
    $db_pass = $email_pass['password'];
    $pass_decode = password_verify($password, $db_pass);

    if($pass_decode)
    {
      if(isset($_POST['rememberme'])){
        setcookie('emailcookie',$email,time()+86400);
        setcookie('passwordcookie',$password,time()+86400);

        ?>
      <script>
          //alert("login sucessfully")
          location.replace("ahome.php");
      </script>
      <?php
      }else{
        ?>
      <script>
          //alert("login sucessfully")
          location.replace("ahome.php");
      </script>
      <?php
      }
    }else
    {
        $_SESSION['msg'] ="Your Password is Not matching Try Again ";
        ?>
        <script>
            //alert("login sucessfully")
            location.replace("alogin.php");
        </script>
        <?php
    }
    }else
    {
        $_SESSION['msg'] ="Invaild Username ID";
        ?>
        <script>
            //alert("login sucessfully")
            location.replace("alogin.php");
        </script>
        <?php
    }

}
?>