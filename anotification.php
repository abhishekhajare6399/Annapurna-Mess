<?php include'asession.php'?>
<!DOCTYPE html>
<html lang="en">
<?php include'ahead.php' ?>

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
                    <li><a href="aprofile.php"><i class="fas fa-user"></i>&nbsp;&nbsp; Mess Profile</a></li>
                    <li><a onclick="openInNewTab()"><i class="fa-solid fa-calendar"></i>&nbsp;&nbsp; Todays
                            Attendance</a></li>
                    <li><a href="aattendence.php"><i class="fas fa-calendar" aria-hidden="true"></i>&nbsp;&nbsp;
                            Attendance</a></li>
                    <li><a href="aallmember.php"><i class="fa-solid fa-users-line"></i>&nbsp;&nbsp; All Member</a></li>
                    <li><a href="aorderhistory.php"><i class="fa fa-history" aria-hidden="true"></i>&nbsp;&nbsp;Order
                            History</a></li>
                    <li><a href="ahistory.php"><i class="fa fa-history" aria-hidden="true"></i>&nbsp;&nbsp; History</a>
                    </li>
                    <li class="active"><a href="anotification.php"><i class="fa-solid fa-bell"></i>&nbsp;&nbsp;
                            Notifications</a></li>
                    <li><a href="alogout.php"><i class="fa fa-sign-out" aria-hidden="true"></i>&nbsp;&nbsp; Logout</a>
                    </li>
                    <form action="search.php" method="POST">
                        <div class="input-group" style="padding: 10px;">
                            <input type="text" name="search" class="form-control" placeholder="Search">
                            <span class="input-group-btn">
                                <button class="btn btn-default" button type="submit" name="submit">
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
                <form action="search.php" method="POST">
                    <div class="input-group">
                        <input type="text" name="search" class="form-control" placeholder="Search">
                        <span class="input-group-btn">
                            <button class="btn btn-default" button type="submit" name="submit">
                                <span class="glyphicon glyphicon-search"></span>
                            </button>
                        </span>
                    </div>
                </form><br>
                <ul class="nav nav-pills nav-stacked">
                    <li><a href="ahome.php"><i class="fa fa-home" aria-hidden="true"></i>&nbsp;&nbsp; Home</a></li><br>
                    <li><a href="amenu.php"><i class="fa-solid fa-bars"></i>&nbsp;&nbsp; Menu</a></li><br>
                    <li><a href="aprofile.php"><i class="fas fa-user"></i>&nbsp;&nbsp; Mess Profile</a></li><br>
                    <li><a onclick="openInNewTab()"><i class="fa-solid fa-calendar"></i>&nbsp;&nbsp; Todays
                            Attendance</a></li><br>
                    <li><a href="aattendence.php"><i class="fas fa-calendar" aria-hidden="true"></i>&nbsp;&nbsp;
                            Attendance</a></li><br>
                    <li><a href="aallmember.php"><i class="fa-solid fa-users-line"></i>&nbsp;&nbsp; All Member</a></li>
                    <br>
                    <li><a href="aorderhistory.php"><i class="fa fa-history" aria-hidden="true"></i>&nbsp;&nbsp;Order
                            History</a></li><br>
                    <li><a href="ahistory.php"><i class="fa fa-history" aria-hidden="true"></i>&nbsp;&nbsp; History</a>
                    </li><br>
                    <li class="active"><a href="anotification.php"><i class="fa-solid fa-bell"></i>&nbsp;&nbsp;
                            Notifications</a></li><br>
                    <li><a href="alogout.php"><i class="fa fa-sign-out" aria-hidden="true"></i>&nbsp;&nbsp; Logout</a>
                    </li><br>
                </ul><br>
            </div>
            <?php include'anav.php'?>
            <div class="row">
                <div class="col-sm-12">
                    <div class="well">
                        <div class="row" style="padding:10px;">
                            <div class="col-sm-9">
                                <p style="padding:10px;text-align: left;font-size: 15px;">Notification List : </p>
                            </div>
                            <div class="col-sm-3">
                                <form action="" method="POST">
                                    <button type="submit" name="allnotification" class="btn btn-primary"><i
                                            class="fa fa-paper-plane" aria-hidden="true"></i> Send
                                        Notification to all</button>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                </form>
                            </div>
                        </div>
                    <div class="container2">
                        <table class="table">
                            <thead style="background-color:Orange;position: sticky;top: 0;">
                                <tr>
                                    <th scope="col">Customer ID :</th>
                                    <th scope="col">Customer Name :</th>
                                    <th scope="col">Membership Type :</th>
                                    <th scope="col">Expire Date :</th>
                                    <th scope="col">Action :</th>
                                    <th scope="col"></th>

                                </tr>
                            </thead>
                            <tbody>

                                <?php
                                  include'database/dbcon.php';
                                  date_default_timezone_set("Asia/Calcutta");
                                  $date =date('Y-m-d');
                                  $edate = date("Y-m-d" ,strtotime($date . " +3 days"));
                                  $ladate = date("Y-m-d" ,strtotime($date . " -10 days"));
                                  $messid=$_SESSION['messid'];
                                  $query = "SELECT * FROM user where messid ='$messid' and (end_date <='$edate' and end_date >='$ladate')";
                                  $result = mysqli_query($con,$query);
                                  while($row = mysqli_fetch_array($result)){
                                    
                                    ?>
                                <tr>
                                    <th scope="row"><?php echo $row['userid'];?></th>
                                    <th scope="row"><?php echo $row['name'];?></th>
                                    <td><?php echo $row['messtype'];?></td>
                                    <td><?php echo $row['end_date'];?></td>
                                    <td>
                                        <a data-id='<?php echo $row['userid']; ?>' class="userinfo"
                                            style="text-decoration: none;"><button type="button"
                                                class="btn btn-primary"><i class="fa fa-eye" aria-hidden="true"></i>
                                                View</button></a>&nbsp;&nbsp;&nbsp;
                                    </td>
                                    <td>
                                        <form action="" method="POST">
                                            <input type="hidden" name="userid" id="inputAddress"
                                                value="<?php echo $row['userid'];?>">
                                            <input type="hidden" name="email" id="inputAddress"
                                                value="<?php echo $row['email'];?>">
                                            <button type="submit" name="notification" class="btn btn-warning"><i
                                                    class="fa fa-paper-plane" aria-hidden="true"></i> Send
                                                Notification</button>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                        </form>
                                    </td>
                                </tr>
                                <?php
                                    }
                                    ?>
                            </tbody>
                        </table>

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
    $(document).ready(function() {
        $('.userinfo').click(function() {
            var userid = $(this).data('id');
            $.ajax({
                url: 'amemberpop.php',
                type: 'post',
                data: {
                    userid: userid
                },
                success: function(response) {
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
                    <h5 class="modal-title" id="exampleModalLabel">Customer Information :</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close" id="clseModal">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                </div>
                <div class="modal-footer">
                </div>
            </div>
        </div>
    </div>
    <script>
    document.getElementById('clseModal').addEventListener('click', function() {
        location.reload();
    });
    </script>

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
if(isset($_POST['notification']))
    {
  $messid = $_SESSION['messid'];
  $userid = mysqli_real_escape_string($con, $_POST['userid']);
  $email =mysqli_real_escape_string($con, $_POST['email']);

  $emailquery =" select * from user where userid ='$userid' and messid='$messid'";
$query = mysqli_query($con, $emailquery);
$emailcount = mysqli_num_rows($query);
if($emailcount)
{
$userdata = mysqli_fetch_assoc($query);
$name = $userdata['name'];
$mobile = $userdata['mobile'];
$address = $userdata['address'];

$emailquery =" select * from signupmess where messid='$messid'";
$query = mysqli_query($con, $emailquery);
$emailcount = mysqli_num_rows($query);
if($emailcount)
{
$userdata = mysqli_fetch_assoc($query);
$mmobile = $userdata['mobile'];
$maddress = $userdata['address'];
$messname = $userdata['mess'];
$memail = $userdata['email'];
$memai_pass = $userdata['email_password'];
}}
srand();
$rand = rand(1000,9999);
$subject = "$messname your Membership Will Expired in 3 Days Req:#$rand";
  $headers = "From: farmagrimitaoe@gmail.com\r\n";
  $headers .= "MTME-Version: 1.0\r\n";
  $headers .= "Content-type: text/html; charset=ISO-8859\r\n";
  $message = "<html>
  <head>
  <title>$messname</title>
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
          <h1>$messname</h1>
          <h2>Thank you for Using Mess System</h2>
          <div id='page-wrap'>
          <p id='header'>Membership Will Expired Soon..</p>
      <div id='identity'>
      
          <p id='address'>
          $messname<br>
          Email : $memail<br>
          Mobile Number :$mmobile<br> 
          Address : $maddress</p>
  
          <p id='address1'>
          Customer Name : $name<br>
          Email : $email<br>
          Mobile Number : $mobile<br>
          Address : $address</p>
      </div>
          </div>
          <div id='page-wrap'>
          <textarea id='header1'>Terms And Conditions.</textarea><br>
          
          <div id='identity'>
          <h2>Please Renew Your membership Soon..</h2>
         
          </body>
  </html>";
    include('Mail/smtp/PHPMailerAutoload.php');
        function smtp_mailer($to, $subject, $msg,$memai_pass,$memail,$messname) {
    $mail = new PHPMailer();
    $mail->IsSMTP();
    $mail->SMTPAuth = true;
    $mail->SMTPSecure = 'tls';
    $mail->Host = "smtp.gmail.com";
    $mail->Port = 587;
    $mail->IsHTML(true);
    $mail->CharSet = 'UTF-8';
    $mail->SMTPDebug = 0;
    $mail->Username = $memail;
    $mail->Password = $memai_pass;
    $mail->SetFrom($memail);
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
        
        $result1 = smtp_mailer($email, $subject, $message,$memai_pass,$memail,$messname);
        if ($result1) {
    ?>
<script>
alert("Notification send sucessfully")
location.replace('anotification.php')
</script>
<?php
            }else{
                ?>
<script>
alert("Notification Not Send !!")
location.replace('anotification.php')
</script>
<?php
              }
    }


    if(isset($_POST['allnotification']))
    {
  $messid = $_SESSION['messid'];
  $date =date('Y-m-d');
  $edate = date("Y-m-d" ,strtotime($date . " +3 days"));
  $ladate = date("Y-m-d" ,strtotime($date . " -10 days"));
  $query = "SELECT * FROM user where messid ='$messid' and (end_date <='$edate' and end_date >='$ladate')";
  $result = mysqli_query($con,$query);
  $count1 = mysqli_num_rows($result);
  $count = 0;
  $emailquery =" select * from signupmess where messid='$messid'";
$query = mysqli_query($con, $emailquery);
$emailcount = mysqli_num_rows($query);
if($emailcount)
{
$userdata = mysqli_fetch_assoc($query);
$mmobile = $userdata['mobile'];
$maddress = $userdata['address'];
$messname = $userdata['mess'];
$memail = $userdata['email'];
$memai_pass = $userdata['email_password'];
}
 include('Mail/smtp/PHPMailerAutoload.php');
        function smtp_mailer($to, $subject, $msg,$memai_pass,$memail,$messname) {
    $mail = new PHPMailer();
    $mail->IsSMTP();
    $mail->SMTPAuth = true;
    $mail->SMTPSecure = 'tls';
    $mail->Host = "smtp.gmail.com";
    $mail->Port = 587;
    $mail->IsHTML(true);
    $mail->CharSet = 'UTF-8';
    $mail->SMTPDebug = 0;
    $mail->Username = $memail;
    $mail->Password = $memai_pass;
    $mail->SetFrom($memail);
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


while($row = mysqli_fetch_array($result)){
   $email = $row['email'];
   $name = $row['name'];
   $mobile = $row['mobile'];
   $address = $row['address'];
   srand();
$rand = rand(1000,9999);
$subject = "$messname your Membership Will Expired in 3 Days Req:#$rand";
  $headers = "From: farmagrimitaoe@gmail.com\r\n";
  $headers .= "MTME-Version: 1.0\r\n";
  $headers .= "Content-type: text/html; charset=ISO-8859\r\n";
  $message = "<html>
  <head>
  <title>$messname</title>
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
          <h1>$messname</h1>
          <h2>Thank you for Using Mess System</h2>
          <div id='page-wrap'>
          <p id='header'>Membership Will Expired Soon..</p>
      <div id='identity'>
      
          <p id='address'>
          $messname<br>
          Email : $memail<br>
          Mobile Number :$mmobile<br> 
          Address : $maddress</p>
  
          <p id='address1'>
          Customer Name : $name<br>
          Email : $email<br>
          Mobile Number : $mobile<br>
          Address : $address</p>
      </div>
          </div>
          <div id='page-wrap'>
          <textarea id='header1'>Terms And Conditions.</textarea><br>
          
          <div id='identity'>
          <h2>Please Renew Your membership Soon..</h2>
         
          </body>
  </html>";
        $send = smtp_mailer($email, $subject, $message,$memai_pass,$memail,$messname);
        if ($send) {
            $count++;
        }
}
  
  if($count==$count1){
    ?>
<script>
alert("Notification send sucessfully")
location.replace('anotification.php')
</script>
<?php
            }else{
                ?>
<script>
alert("Notification Not Send !!")
location.replace('anotification.php')
</script>
<?php
              }
    }
    ?>