
<?php
session_start();
if(!isset($_SESSION['messid'])){
    ?>
<script>
  alert("Login Your Self First");
</script>
<?php
  }
  $messid = $_SESSION['messid'];
  session_destroy();
setcookie('emailcookie','',time()-86400);
setcookie('passwordcookie','',time()-86400);
$_SESSION['msg'] ="You are Logout login Again !!!";

?>
<script>
    location.replace('index.php?messid=<?php echo $messid?>');
</script>
<?php
?>
