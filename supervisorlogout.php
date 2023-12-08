<?php
session_start();
if($_SESSION['messid']==NULL){
        $_SESSION['msg'] ="Login Again !!!";
?>
  <script>
     location.replace('supervisorlogin.php');
  </script>
  <?php
  }else{
  date_default_timezone_set("Asia/Calcutta");
include'./database/dbcon.php';
$messid=$_SESSION['messid'];

$messid=$_SESSION['messid'];
session_unset();
session_destroy();
$_SESSION['messid'] = NULL;

$_SESSION['msg'] ="You are Logout login Again !!!";

?>
<script>
    location.replace('supervisorlogin.php?messid=<?php echo $messid?>');
</script>
<?php
}
?>
