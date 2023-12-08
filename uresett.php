<?php
if(isset($_POST['reset']))
{
  $password = mysqli_real_escape_string($con, $_POST['pass']);
  $cpassword = mysqli_real_escape_string($con, $_POST['cpass']);
  $pass = password_hash($password, PASSWORD_BCRYPT);
  $cpass = password_hash($cpassword, PASSWORD_BCRYPT);   
  $emailquery =" select * from user where token ='$token' and messid='$messid' ";
  $query = mysqli_query($con, $emailquery);
  
  $emailcount = mysqli_num_rows($query);
  if($emailcount)
  {
    if($password == $cpassword)
  {
    $updatequery = "update user set password='$pass' where userid='$userid' and messid='$messid' ";

$iquery = mysqli_query($con, $updatequery);

    if($iquery){
        if(isset($_SESSION['msg'])){
            ?>
            <script>
                alert("Password Reset Successfully");
location.replace('uprofilepop.php?userid=<?php echo $userid?>');
            </script>
            <?php
        }else{
            ?>
            <script>
          alert("Error Occur Try Again.");
location.replace('uprofilepop.php?userid=<?php echo $userid?>');
            </script>
            <?php
        }
        }
}else{
    ?>
    <script>
              alert("Password is not matching Try Again !!.");
location.replace('uprofilepop.php?userid=<?php echo $userid?>');
    </script>
    <?php
}
}}
?>