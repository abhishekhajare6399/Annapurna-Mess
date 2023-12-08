<?php
session_start();
include'./database/dbcon.php';
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
    <?php include './css/logincss.php'?>
    <?php include './link/link1.php'?>
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
<h3><?php echo $mess?> Admin</h3>
  <p>Please Enter the registered Email Address.</p>
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
      <input type="email" class="form-control" id="inputEmail4" name="email" placeholder="Email" required>
    </div>
  </div><br>

  <div class="form-group">
    <div class="form-check">
      <label class="form-check-label" for="gridCheck">
    Already Have Account <a href="alogin.php?messid=<?php echo $messid?>">Login now</a>
      </label><br>
    </div>
  </div>

  <br>
  <div class="row">
    <div class="col-sm-3">
  </div>
  <div class="col-sm-6">
  <button type="submit" name="submit" class="btn btn-primary" style="padding: 10px 100px;">Send</button>
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
$email1 = mysqli_real_escape_string($con, $_POST['email']);
$email= strtolower($email1);
$emailquery =" select * from signupmess where email ='$email' && messid ='$messid' ";
$query = mysqli_query($con, $emailquery);
$emailcount = mysqli_num_rows($query);
if($emailcount)
{
$userdata = mysqli_fetch_assoc($query);
$name = $userdata['mess'];
$mobile = $userdata['mobile'];
$state = $userdata['state'];
$city = $userdata['city'];
$address = $userdata['address'];
$email = $userdata['email'];
$pin = $userdata['pincode'];
$token = $userdata['token'];

srand();
         $rrand = rand(1000,9999);

$subject = "Mess Management System Password Resetting  Req:#$rrand";
  $headers = "From: farmagrimitaoe@gmail.com\r\n";
  $headers .= "MTME-Version: 1.0\r\n";
  $headers .= "Content-type: text/html; charset=ISO-8859\r\n";
  $message = "<html>
  <head>
  <title>Mess Management System</title>
  <style>
  h1 {
      text-align: center;
      color:rgb(11, 10, 10);
      font-size: 20px;
      word-break: break-all;
    }
    h2 {
      text-align: center;
      color:rgb(11, 10, 10);
      font-size: 15px;
      word-break: break-all;
    }
    #hiderow,
  .delete {
    display: none;
  }
  /*
     CSS-Tricks Example
     by Chris Coyier
     http://css-tricks.com
  */
  
  * { margin: 0; padding: 0; }
  body { font: 14px/1.4 Georgia, serif; }
  #page-wrap { width: 800px; margin: 0 auto; }
  #header { height: 15px; width: 100%; margin: 20px 0; background: #222; text-align: center; color: white; font: bold 15px Helvetica, Sans-Serif; text-decoration: uppercase; letter-spacing: 2px; padding: 8px 0px; }
  #header1 { height: 2px; width: 100%; margin: 20px 0; background: #222; text-align: center; color: white; font: bold 15px Helvetica, Sans-Serif; text-decoration: uppercase; letter-spacing: 2px; padding: 8px 0px; }
  #address { width: 250px; height: 100px; float: left; }
  #p1 { width: 250px; height: 100px; float: left; }
  #address1 { width: 250px; height: 100px; float: right; }
  #customer { overflow: hidden; }
    </style>
  <body>
          <h1>Mess Management System</h1>
          <h2>Thank you for Using Mess Management System</h2>
          <div id='page-wrap'>
          <p id='header'>Activate Your account</p>
      <div id='identity'>
      
          <p id='address'>
          Mess Management System<br>
          Mit Academy of Engineering<br>
          Alandi Pune 414001  <br>
          Phone: 9421017990</p>
  
          <p id='address1'>
          Mess Name : $name<br>
          Email : $email<br>
          Mobile : $mobile<br>
          Address : $address $pin<br>
          $city $state</p>
      </div>
          </div>
          <div id='page-wrap'>

          <textarea id='header1'>Terms And Conditions.<br></textarea>
          
          <div id='identity'>
          <h2 style='padding:10px;text-align: center;font-size: 25px;'><a href='https://annapurnamess.online/aresettingpass.php?token=$token&&messid=$messid'>Click here</a> to Reset your Password</h2>
         
          </body>
  </html>";
   include('Mail/smtp/PHPMailerAutoload.php');
        function smtp_mailer($to, $subject, $msg) {
    $mail = new PHPMailer();
    $mail->IsSMTP();
    $mail->SMTPAuth = true;
    $mail->SMTPSecure = 'tls';
    $mail->Host = "smtp.gmail.com";
    $mail->Port = 587;
    $mail->IsHTML(true);
    $mail->CharSet = 'UTF-8';
    $mail->SMTPDebug = 0;
    $mail->Username = "spradmnmess@gmail.com";
    $mail->Password = "vcnjpfdbtswvghdk";
    $mail->SetFrom("spradmnmess@gmail.com");
    $mail->Subject = $subject;
    $mail->Body = $msg;
    $mail->AddAddress($to);

    $mail->SMTPOptions = array(
        'ssl' => array(
            'verify_peer' => false,
            'verify_peer_name' => false,
            'allow_self_signed' => false
        )
    );

    if (!$mail->send()) {
        return $mail->ErrorInfo;
    } else {
        return true;
    }
}
        
        $result = smtp_mailer($email, $subject, $message);
        if ($result === true) {
    $_SESSION['msg'] ="Check your mail account $email You recive Password Resetting Link";

    ?>
    <script>
    location.replace("alogin.php?messid=<?php echo $messid?>");
    </script>
    <?php
  }else{
    $_SESSION['msg'] ="Email Not Sent Try again !!";
    ?>
    <script>
        location.replace("aforgotpass1.php?messid=<?php echo $messid?>");
    </script>
    <?php
  }
  
}else{
    $_SESSION['msg'] = "Invaild Mail ID.";
    ?>
    <script>
        location.replace("aforgotpass1.php?messid=<?php echo $messid?>");
    </script>
    <?php
}
}}
?>