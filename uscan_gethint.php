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

  $emailquery0 = "SELECT * FROM user WHERE userid = '$uid' and mstatus='Inactive'";
  $query0 = mysqli_query($con, $emailquery0);
    $emailcount0 = mysqli_num_rows($query0);
    if($emailcount0>0)
    {
         $_SESSION['mess'] ="$mess";
         $_SESSION['user'] ="$user";
        $_SESSION['userid'] ="$userid";
        $_SESSION['status'] ="Membership Expired";
         $_SESSION['date'] ="$date";
        $_SESSION['msg'] ="Your Membership has been Expired Few days Ago.";
         
        ?>
      <script>
        location.replace("usucess.php?s=3");
        
      </script>
      <?php
       }else{
     $emailquery0 = "SELECT * FROM user WHERE userid = '$uid' and end_date < '$mdate' ";
    $query0 = mysqli_query($con, $emailquery0);
    $emailcount0 = mysqli_num_rows($query0);
    if($emailcount0>0)
    {
         $_SESSION['mess'] ="$mess";
         $_SESSION['user'] ="$user";
        $_SESSION['userid'] ="$userid";
        $_SESSION['status'] ="Membership Expired";
         $_SESSION['date'] ="$date";
        $_SESSION['msg'] ="Your Membership has been Expired Few days Ago.";
         
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
         $_SESSION['mess'] ="$mess";
         $_SESSION['user'] ="$user";
        $_SESSION['userid'] ="$userid";
        $_SESSION['status'] ="Attendance Already Marked";
         $_SESSION['date'] ="$date";
      $_SESSION['msg'] ="Your Attendance has  been Already marked in last few Hours.";
      ?>
  <script>
      location.replace("usucess.php?s=2");
  </script>
  <?php
    }else{
         $emailquery1 = "SELECT * FROM attendance inner join user on user.userid=attendance.userid WHERE attendance.userid = '$uid' and attendance.date='$mdate' and user.time<>'Both' ";
  $query1 = mysqli_query($con, $emailquery1);
    $emailcount1 = mysqli_num_rows($query1);
    if($emailcount1>0)
    {
         $_SESSION['mess'] ="$mess";
         $_SESSION['user'] ="$user";
        $_SESSION['userid'] ="$userid";
        $_SESSION['status'] ="Already Taken Food";
         $_SESSION['date'] ="$date";
      $_SESSION['msg'] ="You have taken your today's food.";
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
  if($upoint<=0) $status_mess = 'Inactive';
  else  $status_mess = 'Active';
  $updatequery = "update user set point='$upoint', mstatus='$status_mess' where userid='$uid' and messid='$q' ";
  $insrt = mysqli_query($con, $updatequery);
  if($insrt){
        $_SESSION['mess'] ="$mess";
         $_SESSION['user'] ="$user";
        $_SESSION['userid'] ="$userid";
        $_SESSION['status'] ="Success";
         $_SESSION['date'] ="$date";
    $_SESSION['msg'] ="Your Attendance has been marked Successfully.";
  ?>
  <script>
      location.replace("usucess.php?s=1");
  </script>
  <?php
  }
}}
}}
}else{
  $_SESSION['msg'] ="Please Scan Correct QR Code it is Not Your Mess";
        ?>
      <script>
        location.replace("usucess.php?s=3");
        
      </script>
      <?php
 }

?>


