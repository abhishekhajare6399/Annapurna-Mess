<?php
include'usession.php';
$messid=$_SESSION['messid'];
session_unset();
session_destroy();
$_SESSION['userid'] = NULL;
$_SESSION['messid'] = NULL;

$_SESSION['msg'] ="You are Logout login Again !!!";

?>
<script>
    location.replace('index.php?messid=<?php echo $messid?>');
</script>
<?php
?>
