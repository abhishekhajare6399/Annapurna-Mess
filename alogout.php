<?php
include'asession.php';
$messid=$_SESSION['messid'];
session_unset();
session_destroy();
$_SESSION['messid'] = NULL;

$_SESSION['msg'] ="You are Logout login Again !!!";

?>
<script>
    location.replace('alogin.php?messid=<?php echo $messid?>');
</script>
<?php
?>
