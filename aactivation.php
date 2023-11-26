<?php
session_start();
include 'database/dbcon.php';
if(isset($_GET['token']) && ($_GET['messid'])){
  $token = $_GET['token'];
  $messid = $_GET['messid'];
  $emailquery =" select * from signupmess where messid='$messid'";
  $query = mysqli_query($con, $emailquery);
  $emailcount = mysqli_num_rows($query);
  if($emailcount)
  {
  $userdata = mysqli_fetch_assoc($query);
  $mess = $userdata['mess'];
  $maddress = $userdata['address'];
  $mmobile = $userdata['mobile'];
  $memail = $userdata['email'];
  }
 

    $updatequery = "update user set status='Active' where token='$token' and messid='$messid' ";

    $query = mysqli_query($con, $updatequery);

    if($query){
        $mobilequery="select * from user where token='$token'";
            $query1 = mysqli_query($con, $mobilequery);
            if($query1)
            {
              $userdata = mysqli_fetch_assoc($query1);
              $email = $userdata['email'];
              $name = $userdata['name'];
              $mobile = $userdata['mobile'];
              $address = $userdata['address'];

         }
         srand();
         $rand = rand(1000,9999);
         $subject = "$mess Login to Our System Req:#$rand";
  $headers = "From: $memail\r\n";
  $headers .= "MTME-Version: 1.0\r\n";
  $headers .= "Content-type: text/html; charset=ISO-8859\r\n";
  $message = "<html>
  <head>
  <title>$mess</title>
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
          <h1>$mess</h1>
          <h2>Thank you for Using our Mess System</h2>
          <div id='page-wrap'>
          <p id='header'>Login Your self in Our System</p>
      <div id='identity'>
      
          <p id='address'>
          $mess<br>
          Email : $memail<br>
          Mobile Number :$mmobile<br>
          $maddress</p>
  
          <p id='address1'>
          Customer Name : $name<br>
          Email : $email<br>
          Mobile Number : $mobile<br>
          Address : $address</p>
      </div>
          </div>

          <div id='page-wrap'>
          <textarea id='header1'>Terms And Conditions.</textarea><br>
          <p>Username will be your email address</p><br>
          <p>Password = 123456 </p>
          <div id='identity'>
          <h2><a href='http://localhost/Mess%20Management/index.php?&messid=$messid'>Click here</a> to login your Account.</h2>
         
          </body>
  </html>";
  $sender_email ="From: $memail";

            if(mail($email, $subject, $message,$headers, $sender_email)){
                ?>
                <script>
                alert("Account Verified sucessfully")
                window.close();
                </script>
                <?php
            }
        }else{
            ?>
                <script>
                alert("Account Not Verify Try again")
                </script>
                <?php
        }
}
?>