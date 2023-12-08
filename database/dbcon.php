<?php

$server ="localhost";
$user ="u297913854_mess";
$password ="Annapurna@1";
$db ="u297913854_Mess";

$con = mysqli_connect($server,$user,$password,$db);

if($con)
{
    
}else{
    ?>
    <script>
        alert("No connection ")
    </script>
    <?php
}
?>