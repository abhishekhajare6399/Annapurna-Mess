<?php 
include'C:\xampp\htdocs\Mess Management\asession.php';


 include'C:\xampp\htdocs\Mess Management\database\dbcon.php';
 $q = $_REQUEST["q"];

if ($q !="") {
  date_default_timezone_set("Asia/Calcutta");
  $uid= $_SESSION['messid'];
  $date = date('l jS \of F Y h:i:s A');
  $time = date("H:i:s");
  $mdate = date("Y-m-d");
  $day = date("l");
  $lasttime = date("H:i:s" ,strtotime($time . " -2 hours"));
  $mobilequery="select * from signupmess where messid='$q'";
  $query1 = mysqli_query($con, $mobilequery);
  if($query1)
  {
    $userdata = mysqli_fetch_assoc($query1);
    $mess = $userdata['mess'];
  }
  $mobilequery="select * from signupmess where messid='$uid'";
  $query1 = mysqli_query($con, $mobilequery);
  if($query1)
  {
    $userdata = mysqli_fetch_assoc($query1);
    $user = $userdata['mess'];
   
  }


  $emailquery = "SELECT * FROM attendance WHERE userid = '$uid' and date<>'$mdate' AND time Not BETWEEN '$lasttime' AND '$time'";
  $query = mysqli_query($con, $emailquery);
    $emailcount = mysqli_num_rows($query);
    if($emailcount>0)
    {
      ?>
  <script>
      location.replace("sucess.php?s=2");
  </script>
  <?php
    }else{

  $insertquery ="insert into attendance(userid,messid,date,time,day) 
  values('$uid','$q','$mdate','$lasttime','$day')";
  $insrt = mysqli_query($con, $insertquery);
  if($insrt){
    $_SESSION['msg'] ="$user your Attendance has been marked in $mess $date";
  ?>
  <script>
      location.replace("sucess.php?s=1");
  </script>
  <?php
  }
}
 }

?>


