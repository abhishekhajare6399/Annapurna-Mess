<?php
session_start();
if($_SESSION['messid']==NULL){
        $_SESSION['msg'] ="Login Again !!!";
?>
  <script>
     location.replace('alogin.php');
  </script>
  <?php
  }else{
include'./database/dbcon.php';
$messid=$_SESSION['messid'];
$emailquery =" select * from signupmess where messid ='$messid' ";
$query = mysqli_query($con, $emailquery);
$emailcount = mysqli_num_rows($query);
if($emailcount)
{
$userdata = mysqli_fetch_assoc($query);
$name = $userdata['mess'];
$mobile = $userdata['mobile'];
$state = $userdata['state'];
$email = $userdata['email'];
$image = $userdata['image'];
$logo = $userdata['logo'];
$hstatus = $userdata['hstatus'];
}}
?>