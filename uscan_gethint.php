<?php 
include'usession.php';


 include'database\dbcon.php';
 $q = $_REQUEST["q"];

if ($q !="" && $q==$messid) {
  date_default_timezone_set("Asia/Calcutta");
  $uid= $_SESSION['userid'];
  $date = date('l jS \of F Y h:i:s A');
  $time = date("H:i:s");
  $mdate = date("Y-m-d");
  $day = date("l");
  $lasttime = date("H:i:s" ,strtotime($time . " - 3 hours"));
  $mobilequery="select * from signupmess where messid='$q'";
  $query1 = mysqli_query($con, $mobilequery);
  if($query1)
  {
    $userdata = mysqli_fetch_assoc($query1);
    $mess = $userdata['mess'];
  }
  $mobilequery="select * from user where userid='$uid'";
  $query1 = mysqli_query($con, $mobilequery);
  if($query1)
  {
    $userdata = mysqli_fetch_assoc($query1);
    $user = $userdata['name'];
    $point = $userdata['point'];
  }

  $emailquery0 = "SELECT * FROM user WHERE userid = '$uid' and mstatus='Inactive' ";
  $query0 = mysqli_query($con, $emailquery0);
    $emailcount0 = mysqli_num_rows($query0);
    if($emailcount0>0)
    {
        $_SESSION['msg'] ="$user your Membership has been Expired Few days Ago in $mess $date";
        ?>
      <script>
        location.replace("usucess.php?s=3");
        
      </script>
      <?php
       }else{
  $emailquery1 = "SELECT * FROM attendance WHERE userid = '$uid' and date='$mdate' and time BETWEEN '$lasttime' AND '$time'";
  $query1 = mysqli_query($con, $emailquery1);
    $emailcount1 = mysqli_num_rows($query1);
    if($emailcount1>0)
    {
      $_SESSION['msg'] ="$user your Attendance has  been Already marked in last few Hours in $mess $date";
      ?>
  <script>
      location.replace("usucess.php?s=2");
  </script>
  <?php
    }else{

  $insertquery ="insert into attendance(userid,name,messid,date,day,time) 
  values('$uid','$user','$q','$mdate','$day','$time')";
  $insrt = mysqli_query($con, $insertquery);
  $upoint = $point-1;
  $updatequery = "update user set point='$upoint' where userid='$uid' and messtype='Non-Regular' and messid='$q' ";
  $insrt = mysqli_query($con, $updatequery);
  if($insrt){
    $_SESSION['msg'] ="$user your Attendance has been marked in $mess $date";
  ?>
  <script>
      location.replace("usucess.php?s=1");
  </script>
  <?php
  }
}
}
}else{
  $_SESSION['msg'] ="Please Scan Correct QR Code it is Not Your Mess";
        ?>
      <script>
        location.replace("usucess.php?s=3");
        
      </script>
      <?php
 }

?>


