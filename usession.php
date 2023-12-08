<?php
session_start();
if($_SESSION['userid'] == NULL){
    $_SESSION['msg'] ="You Are Logout User Login Again !!!";

?>
  <script>
     location.replace('index.php?messid=868460')
  </script>
  <?php
  }else{
include'./database/dbcon.php';
$userid=$_SESSION['userid'];
$messid=$_SESSION['messid'];
$emailquery =" select * from user where userid ='$userid' ";
$query = mysqli_query($con, $emailquery);
$emailcount = mysqli_num_rows($query);
if($emailcount)
{
$userdata = mysqli_fetch_assoc($query);
$name = $userdata['name'];
$mobile = $userdata['mobile'];
$email = $userdata['email'];
$image = $userdata['image'];
}
$emailquery =" select * from signupmess where messid ='$messid' ";
$query = mysqli_query($con, $emailquery);
$emailcount = mysqli_num_rows($query);
if($emailcount)
{
$userdata = mysqli_fetch_assoc($query);
$mess = $userdata['mess'];
$messimage = $userdata['image'];
$bg = $userdata['bg'];
$logo = $userdata['logo'];
$messemail = $userdata['email'];
$messaddress = $userdata['address'];
$messabout = $userdata['about'];
$messmobile = $userdata['mobile'];
}
}
?>