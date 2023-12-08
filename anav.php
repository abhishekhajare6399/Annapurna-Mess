<div class="col-sm-10">
    <div class="hide-on-small-screen">
        <div class="well">
            <div class="row">
                
                    <h3 style="font-family:Serif;color:black;text-align:center;font-size:25px"><?php echo $name?></h3>
               
            </div>
        </div>
    </div>


    <div class="row">
        <div class="col-sm-2">
            <div class="well">
                <?php 
            $messid = $_SESSION['messid'];
            date_default_timezone_set("Asia/Calcutta");
            $date =date('Y-m-d');
            $sql = "SELECT * FROM user WHERE messtype ='Regular' and status='Active' and messid='$messid' group by userid";
            //  $sql = "SELECT * FROM user where resid='$resid' and date='$date' and status<>'Cancel' group by orderid  ";
            $res = mysqli_query($con, $sql);
            $count = mysqli_num_rows($res);
            ?>
                <h3 style="font-family:Serif;color:black;text-align:center;font-size:15px">Reg. Customer :</h3>
                <h3 style="font-family:Serif;color:black;text-align:center;font-size:20px"><?php echo $count; ?></h3>
            </div>
        </div>
        <div class="col-sm-2">
            <div class="well">
                <?php 
            $sql1 = "SELECT * FROM user WHERE messtype ='Non-Regular' and status='Active' and messid='$messid' group by userid";
            //  $sql = "SELECT * FROM user where resid='$resid' and date='$date' and status<>'Cancel' group by orderid  ";
            $res1 = mysqli_query($con, $sql1);
            $count1 = mysqli_num_rows($res1);
            ?>
                <h3 style="font-family:Serif;color:black;text-align:center;font-size:15px">NonR. Customer :</h3>
                <h3 style="font-family:Serif;color:black;text-align:center;font-size:20px"><?php echo $count1; ?></h3>
            </div>
        </div>
        <div class="col-sm-2">
            <div class="well">
                <?php 
            $sql2 = "SELECT * FROM `order` where  messid='$messid' group by mobile";
            //  $sql = "SELECT * FROM user where resid='$resid' and date='$date' and status<>'Cancel' group by orderid  ";
            $res2 = mysqli_query($con, $sql2);
            $count2 = mysqli_num_rows($res2);
            ?>
                <h3 style="font-family:Serif;color:black;text-align:center;font-size:15px">New Customer :</h3>
                <h3 style="font-family:Serif;color:black;text-align:center;font-size:20px"><?php echo $count2; ?></h3>
            </div>
        </div>
        <div class="col-sm-2">
            <div class="well">
                <?php 
             $sql1 = "SELECT date FROM attendance where messid='$messid' and date = '$date'";
             $res1 = mysqli_query($con, $sql1);
             $count1 = mysqli_num_rows($res1);
            ?>
                <h3 style="font-family:Serif;color:black;text-align:center;font-size:15px">Today's Attendence :</h3>
                <h3 style="font-family:Serif;color:black;text-align:center;font-size:20px"><?php echo $count1; ?></h3>
            </div>
        </div>
        <div class="col-sm-2">
            <div class="well">
                <?php 
           date_default_timezone_set("Asia/Calcutta");
           $date =date('Y-m-d');
           $sum = "SELECT SUM(total) as total FROM `order` where messid='$messid' and date='$date' ";
           $sum1 = mysqli_query($con,$sum);
           $resul =mysqli_fetch_array($sum1);
           $tot=$resul['total'];
           if( $tot==NULL) $tot= 0;
            ?>
                <h3 style="font-family:Serif;color:black;text-align:center;font-size:15px">Today Revenu :</h3>
                <h3 style="font-family:Serif;color:black;text-align:center;font-size:20px"><?php echo $tot; ?> Rs.</h3>
            </div>
        </div>
        <div class="col-sm-2">
            <div class="row">
                <div class="col-sm-12" style="padding:2px;">
                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#ordermodel"><i
                            class="fas fa-plus"></i> Add New Order</button>
                </div>
                <div class="col-sm-12" style="padding:2px;">
                    <button type="button" class="btn btn-warning" data-toggle="modal" data-target="#newusermodel"><i
                            class="fas fa-plus"></i> Add New Member</button>
                </div>
                <div class="col-sm-12" style="padding:2px;">
                    <button type="button" class="btn btn-success" data-toggle="modal" data-target="#attendance"><i
                            class="fas fa-plus"></i> Mark Attendance</button>
                </div>
                 <div class="col-sm-12" style="padding:2px;">
                    <button type="button" class="btn btn-info" data-toggle="modal" data-target="#leave"><i
                            class="fas fa-plus"></i> Leave Mark</button>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="ordermodel" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">New Customer Order</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close" id="closeModal">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body3">

                    <form action="" method="POST">
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="inputState">Time :</label>
                                <select id="inputState" name="time" class="form-control" required>
                                    <option>Select Mess Time</option>
                                    <option value="Afternoon">Afternoon</option>
                                    <option value="Evening">Evening</option>
                                </select>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="inputState">Food Type :</label>
                                <select id="inputState" name="foodtype" class="form-control" required>
                                    <option>Select Food Type</option>
                                    <option value="Veg Food">Veg Food</option>
                                    <option value="Non-Veg Food">Non-Veg Food</option>
                                    <option value="Both Veg Food & Non-Veg Food">Both Veg Food & Non-Veg Food</option>
                                </select>
                            </div>

                            <div class="form-group col-md-12">
                                <label for="inputAddress">Name :</label>
                                <input type="text" name="name" class="form-control" id="inputAddress"
                                    placeholder="Eg. Abhishek Hajare" required>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-4">
                                <label for="inputState">Mobile :</label>
                                <input type="number" name="mobile" class="form-control" id="inputAddress"
                                    placeholder="Eg. 9421017890">
                            </div>
                            <div class="form-group col-md-4">
                                <label for="inputState">Number of Plates :</label>
                                <input type="number" name="plate" class="form-control" id="inputAddress"
                                    placeholder="Eg. 10" required>
                            </div>
                            <div class="form-group col-md-4">
                                <label for="inputState">Price :</label>
                                <input type="number" name="price" class="form-control" id="inputAddress"
                                    placeholder="Eg. 70" required>
                            </div>
                        </div>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-primary" type="submit" name="order">Place Order</button>
                </div>
                </form>

            </div>
        </div>
    </div>

    <?php
    include'./database/dbcon.php';
    $messid=$_SESSION['messid'];
    $date =date('Y-m-d');
    $day = date("l");
    if(isset($_POST['order']))
    {
    date_default_timezone_set("Asia/Calcutta");
    $time1 = date("h:i:s");
    $time=mysqli_real_escape_string($con, $_POST['time']);
    $foodtype=mysqli_real_escape_string($con, $_POST['foodtype']);
    $name=mysqli_real_escape_string($con, $_POST['name']);
    $plate=mysqli_real_escape_string($con, $_POST['plate']);
    $mobile=mysqli_real_escape_string($con, $_POST['mobile']);
    $price=mysqli_real_escape_string($con, $_POST['price']);
    $total = $plate * $price;
    $enter = "INSERT INTO `order` (messid,date,day,time,foodtype,name,plate,mobile,price,total) VALUES ('$messid','$date','$day','$time1','$foodtype','$name','$plate','$mobile','$price','$total')";
    $iquery = mysqli_query($con, $enter);

    if($iquery)
    {
      ?>
    <script>
    alert("Order Placed sucessfully")
    let hasReloaded = false;

    function reloadOnce() {
        if (!hasReloaded) {
            location.reload();
            hasReloaded = true;
        }
    }
    </script>
    <?php
    }else{
      ?>
    <script>
    alert("Order Not Placed !!")
    let hasReloaded = false;

    function reloadOnce() {
        if (!hasReloaded) {
            location.reload();
            hasReloaded = true;
        }
    }
    </script>
    <?php
    }
    }
    ?>


    <div class="modal fade" id="newusermodel" tabindex="-1" role="dialog" aria-labelledby="examplLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModal">Add New Customer</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close" id="closeModl">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body4">

                    <form action="" method="POST">
                        <div class="form-row">
                            <div class="form-group col-md-4">
                                <label for="inputState">Time :</label>
                                <select id="inputState" name="messtime" class="form-control" required>
                                    <option>Select Mess Time</option>
                                    <option value="Afternoon">Afternoon</option>
                                    <option value="Evening">Evening</option>
                                    <option value="Both">Both</option>
                                </select>
                            </div>
                            <div class="form-group col-md-4">
                                <label for="inputState">Mess Type :</label>
                                <select id="inputState" name="messtype" class="form-control" required>
                                    <option>Select Mess Type</option>
                                    <option value="Regular">Monthly Mess</option>
                                    <option value="Non-Regular">Coupon Base Mess</option>
                                </select>
                            </div>
                            <div class="form-group col-md-4">
                                <label for="inputState">Food Type :</label>
                                <select id="inputState" name="foodtype" class="form-control" required>
                                    <option>Select Mess Type</option>
                                    <option value="Veg">Veg</option>
                                    <option value="Non-Veg">Non-Veg</option>
                                </select>
                            </div>
                            <div class="form-group col-md-12">
                                <label for="inputAddress">Name :</label>
                                <input type="text" name="name" class="form-control" id="inputAddress"
                                    placeholder="Eg. Abhishek Hajare" required>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="inputState">Mobile :</label>
                                <input type="text" name="mobile" class="form-control" id="inputMobilenumber"
                                    placeholder="Eg. 9421017890" required>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="inputState">Email :</label>
                                <input type="email" name="email" class="form-control" id="inputEmail"
                                    placeholder="Eg. abhishekhajare@gmail.com" required>
                            </div>
                            <div class="form-group col-md-9">
                                <label for="inputAddress">Address :</label>
                                <input type="text" name="address" class="form-control" id="inputAddress"
                                    placeholder="Eg. Dehu phata Alandi Pune" required>
                            </div>
                             <div class="form-group col-md-3">
                                <label for="inputAddress">Payment Paid :</label>
                                <input type="number" name="paid" class="form-control" id="inputAddress"
                                    placeholder="Eg. 2000" required>
                            </div>
                        </div>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-primary" type="submit" name="newuser">Add New Customer</button>
                </div>
                </form>

            </div>
        </div>
    </div>

    <?php
    $messid=$_SESSION['messid'];
    if(isset($_POST['newuser']))
    {
    srand();
    date_default_timezone_set("Asia/Calcutta");
    $name=mysqli_real_escape_string($con, $_POST['name']);
    $email1=mysqli_real_escape_string($con, $_POST['email']);
    $mobile=mysqli_real_escape_string($con, $_POST['mobile']);
    $address=mysqli_real_escape_string($con, $_POST['address']);
    $paid=mysqli_real_escape_string($con, $_POST['paid']);
    $foodtype=mysqli_real_escape_string($con, $_POST['foodtype']);
    $messtype=mysqli_real_escape_string($con, $_POST['messtype']);
    $time=mysqli_real_escape_string($con, $_POST['messtime']);

    $image = "img/user.jpg";

    $pass = "123456";
    $cpass = password_hash($pass, PASSWORD_BCRYPT);
    $email= strtolower($email1);
    
    
    $rands = 101;
    
    $emailquery2 =" select * from user where  messid='$messid' order by id DESC limit 1 ";
    $query2 = mysqli_query($con, $emailquery2);
    $emailcount2 = mysqli_num_rows($query2);
    if($emailcount2>0)
    {
    $userdata = mysqli_fetch_assoc($query2);
    $userid = intval($userdata['userid']);
        $rands = $userid+ 1;
    }


    $token =bin2hex(random_bytes(15));
    $date =date('Y-m-d');
    $sdate =date('Y-m-d');
    $time2 = date("h:i:sa");


    $mobilequery="select * from signupmess where messid='$messid'";
    $query1 = mysqli_query($con, $mobilequery);
    if($query1)
    {
    $userdata = mysqli_fetch_assoc($query1);
    $messbase = $userdata['monthly'];
    $couponbase = $userdata['coupon'];
    $messbase1 = $userdata['monthly_onetime'];
    $couponbase1 = $userdata['coupon_onetime'];
    $non = $userdata['Non_veg'];
    }
    if($time == "Both" && $messtype=="Regular" ){
        $pay = $messbase;  
        $point = 60;
    } 
    else if($time == "Both" && $messtype=="Non-Regular" ){
        $pay = $couponbase; 
        $point = 60;
    } 
    else if(($time == 'Afternoon' || $time == 'Evening') && $messtype=="Regular" ){
        $pay = $messbase1;  
        $point = 30;
    }
    else{
        $pay = $couponbase1; 
        $point = 30;
    } 
  
    if($foodtype=="Non-Veg") $pay= $pay+$non; 

    if($paid==$pay){
        $pstatus ='Paid';
    }else{
        $pstatus ='Unpaid';
    }
    
    if($time=='Both') $point = 60;
    else $point = 30;
    
    $edate = date("Y-m-d" ,strtotime($date . " +30 days"));
    
    $emailquery2 =" select * from user where  messid='$messid' and (email ='$email' or mobile = '$mobile') ";
    $query2 = mysqli_query($con, $emailquery2);
    $emailcount2 = mysqli_num_rows($query2);
    
    if($emailcount2>0)
    {
        ?>
    <script>
    alert("These Customer Already Exist in Our mess ask hime check Email Box")
    let hasReloaded = false;
    function reloadOnce() {
        if (!hasReloaded) {
            location.reload();
            hasReloaded = true;
        }
    }
    </script>
    <?php    
        ?>
    <?php
    }else{


$emailquery =" select * from signupmess where messid='$messid'";
$query = mysqli_query($con, $emailquery);
$emailcount = mysqli_num_rows($query);
if($emailcount)
{
$userdata = mysqli_fetch_assoc($query);
$mess = $userdata['mess'];
$mmobile = $userdata['mobile'];
$maddress = $userdata['address'];
$memail = $userdata['email'];
$memai_pass = $userdata['email_password'];

}
$rand = rand(1000,9999);
$subject = "$mess Account Activation Req:#$rand";
  $headers = "From: farmagrimitaoe@gmail.com\r\n";
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
          <p id='header'>Account Activation</p>
      <div id='identity'>
      
          <p id='address'>
          $mess<br>
          Mobile Number : $mmobile<br>
          Email : $memail<br>
          Address :$maddress </p>
  
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
          <h2 style='padding:10px;text-align: center;font-size: 25px;'><a href='https://annapurnamess.online/aactivation.php?token=$token&&messid=$messid'>Click here</a> to Activate your Account</h2>
         
          </body>
  </html>";
  
         include('Mail/smtp/PHPMailerAutoload.php');
        function smtp_mailer($to, $subject, $msg,$memai_pass,$memail,$mess) {
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

        
        $result = smtp_mailer($email, $subject, $message,$memai_pass,$memail,$mess);
        if ($result===true) {
            $insertquery1 ="insert into user(messid,userid,name,mobile,email,password,image,messtype,time,foodtype,address,joining_date,start_date,end_date,point,payment,paid,payment_status,token,mstatus,status) 
            values('$messid','$rands','$name','$mobile','$email','$cpass','$image','$messtype','$time','$foodtype','$address','$date','$sdate','$edate','$point','$pay','$paid','$pstatus','$token','Active','Inactive')";
            $iquery1 = mysqli_query($con, $insertquery1);
            $insertquery ="insert into payment(userid,messid,payment,date,time) 
            values('$rands','$messid','$paid','$date','$time2')";
        
        
            $iquery = mysqli_query($con, $insertquery);
            if($iquery)
            {
              ?>
    <script>
    alert("User Added sucessfully ask user to verfity Email Address")
    let hasReloaded = false;

    function reloadOnce() {
        if (!hasReloaded) {
            location.reload();
            hasReloaded = true;
        }
    }
    </script>
    <?php
            }else{
                ?>
    <script>
    alert("User Not Added !!")
    let hasReloaded = false;

    function reloadOnce() {
        if (!hasReloaded) {
            location.reload();
            hasReloaded = true;
        }
    }
    </script>
    <?php
              }
            }else{
                ?>
    <script>
    alert("Email Not Send Try Again")
    let hasReloaded = false;

    function reloadOnce() {
        if (!hasReloaded) {
            location.reload();
            hasReloaded = true;
        }
    }
    </script>
    <?php
            }
    }
    }
    ?>


    <div class="modal fade" id="attendance" tabindex="-1" role="dialog" aria-labelledby="exampleLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="Label">Mark User Attendance</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close" id="closeMdl">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body5">

                    <form action="" method="POST">
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="inputState">Name :</label>
                                <input type="text" name="aname" class="form-control" id="inputMobilenumber"
                                    placeholder="Eg. Abhishek Hajare">
                            </div>
                            <div class="form-group col-md-6">
                                <label for="inputState">Userid :</label>
                                <input type="text" name="userid" class="form-control" id="inputEmail"
                                    placeholder="Eg. 8688846" required>
                            </div>
                        </div>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-primary" type="submit" name="attendancemark">Mark Attendance</button>
                </div>
                </form>

            </div>
        </div>
    </div>


    <?php
    $messid=$_SESSION['messid'];
    $date = date("Y-m-d");
    $day = date("l");
    if(isset($_POST['attendancemark']))
    {
    date_default_timezone_set("Asia/Calcutta");
    $userid=mysqli_real_escape_string($con, $_POST['userid']);
    $name=mysqli_real_escape_string($con, $_POST['aname']);
    $time = date("H:i:s");
    $mdate = date("Y-m-d");
    $day = date("l");
    $lasttime = date("H:i:s" ,strtotime($time . " - 4 hours"));
    

    $mobilequery="select * from user where userid='$userid'";
  $query1 = mysqli_query($con, $mobilequery);
  if($query1)
  {
    $userdata = mysqli_fetch_assoc($query1);
    $user = $userdata['name'];
    $point = $userdata['point'];
  }

    $emailquery0 = "SELECT * FROM user WHERE userid = '$userid' and mstatus='Inactive' and messid='$messid' ";
    $query0 = mysqli_query($con, $emailquery0);
      $emailcount0 = mysqli_num_rows($query0);
      if($emailcount0>0)
      {
          ?>
    <script>
    location.replace("sucess.php?s=3");
    let hasReloaded = false;

    function reloadOnce() {
        if (!hasReloaded) {
            location.reload();
            hasReloaded = true;
        }
    }
    </script>
    <?php
         }else{
    $emailquery1 = "SELECT * FROM attendance WHERE userid = '$userid' and date='$mdate' and messid='$messid' and time BETWEEN '$lasttime' AND '$time'";
    $query1 = mysqli_query($con, $emailquery1);
      $emailcount1 = mysqli_num_rows($query1);
      if($emailcount1>0)
      {
        ?>
    <script>
    alert("Your Attendance is Already Marked!!")
    let hasReloaded = false;

    function reloadOnce() {
        if (!hasReloaded) {
            location.reload();
            hasReloaded = true;
        }
    }
    </script>
    <?php
      }else{
  
    $insertquery ="insert into attendance(userid,name,messid,date,day,time) 
    values('$userid','$name','$messid','$mdate','$day','$time')";
    $insrt = mysqli_query($con, $insertquery);
    $upoint = $point-1;
    $updatequery = "update user set point='$upoint' where userid='$userid' and messid='$messid' ";
    $insrt = mysqli_query($con, $updatequery);
    if($insrt){
    ?>
    <script>
    alert("Attendance Mark Successfully ")
    let hasReloaded = false;

    function reloadOnce() {
        if (!hasReloaded) {
            location.reload();
            hasReloaded = true;
        }
    }
    </script>
    <?php
    }
  }
  }
    }
    ?>

    <script>
    document.getElementById('closeModal').addEventListener('click', function() {
        location.reload();
    });
    document.getElementById('closeModl').addEventListener('click', function() {
        location.reload();
    });
    document.getElementById('closeMdl').addEventListener('click', function() {
        location.reload();
    });
    </script>
    
    
      <div class="modal fade" id="leave" tabindex="-1" role="dialog" aria-labelledby="exampleLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="Label">Customer Leave Date </h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close" id="closedl">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body5">

                    <form action="" method="POST">
                        <div class="form-row">
                            <div class="form-group col-md-4">
                                <label for="inputState">Userid :</label>
                                <input type="text" name="userid" class="form-control" id="inputEmail"
                                    placeholder="Eg. 8688846" required>
                            </div>
                             <div class="form-group col-md-4">
                                <label for="inputState">Start Date :</label>
                                <input type="date" name="start_date" class="form-control" id="inputEmail"
                                   required>
                            </div>
                            <div class="form-group col-md-4">
                                <label for="inputState">End Date :</label>
                                <input type="date" name="end_date" class="form-control" id="inputEmail"
                                   required>
                            </div>
                        </div>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-primary" type="submit" name="leavemark">Update End Date</button>
                </div>
                </form>

            </div>
        </div>
    </div>
     <script>
    document.getElementById('closeModal').addEventListener('click', function() {
        location.reload();
    });
    document.getElementById('closeModl').addEventListener('click', function() {
        location.reload();
    });
    document.getElementById('closedl').addEventListener('click', function() {
        location.reload();
    });
    </script>
    
        <?php
    $messid=$_SESSION['messid'];
    $date = date("Y-m-d");
    $day = date("l");
    if(isset($_POST['leavemark']))
    {
    date_default_timezone_set("Asia/Calcutta");
    $userid=mysqli_real_escape_string($con, $_POST['userid']);
    $sdate=mysqli_real_escape_string($con, $_POST['start_date']);
    $edate=mysqli_real_escape_string($con, $_POST['end_date']);
    $mobilequery="select * from user where userid='$userid'";
    $query1 = mysqli_query($con, $mobilequery);
      if($query1)
      {
        $userdata = mysqli_fetch_assoc($query1);
        $enddate = $userdata['end_date'];
      }
      
    $date1 = new DateTime($sdate);
    $date2 = new DateTime($edate);
    
    // Calculate the difference between the two dates
    $interval = $date1->diff($date2);
    
    // Get the total number of days as a single number
    $leave = $interval->format('%a');
    $update_enddate = date("Y-m-d" ,strtotime($enddate . " +$leave days"));


     $updatequery = "update user set end_date='$update_enddate' where userid='$userid' and messid='$messid' ";
    $insrt = mysqli_query($con, $updatequery);
    if($insrt){
    ?>
    <script>
    alert("End Date Has been Change Successfully to <?php echo $update_enddate;?>)
    let hasReloaded = false;

    function reloadOnce() {
        if (!hasReloaded) {
            location.reload();
            hasReloaded = true;
        }
    }
    </script>
    <?php
    }else{
            ?>
    <script>
    alert("End Date Has Not Change")
    let hasReloaded = false;

    function reloadOnce() {
        if (!hasReloaded) {
            location.reload();
            hasReloaded = true;
        }
    }
    </script>
    <?php
    }

    }
  ?>
    