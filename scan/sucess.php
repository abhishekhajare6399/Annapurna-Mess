<audio id="myAudio1">
        <source src="success.mp3" type="audio/ogg">
    </audio>
    <audio id="myAudio2">
        <source src="failes.mp3" type="audio/ogg">
    </audio>
    <script>
    var x = document.getElementById("myAudio1");
    var x2 = document.getElementById("myAudio2");
function playAudio() {
        x.play();
    }
    function playAudio1() {
        x2.play();
    }
    </script>


<?php 
include'C:\xampp\htdocs\Mess Management\asession.php';
 include 'C:\xampp\htdocs\Mess Management\link\link1.php';
 $q = $_REQUEST["s"];
 if($q == 1){
 ?>
 <script>
playAudio();
</script>
<div class='alert alert-success' style='position: fixed; top: 50%; left: 50%; transform: translate(-50%, -50%);'>
<?php
  if(isset($_SESSION['msg'])){
  echo $_SESSION['msg'];
  }else{
    echo $_SESSION['msg'] = "You are logged out. Please login again.";
  }
  ?>
</div>
<?php }else if($q == 2){ ?>

    <script>
playAudio1();
</script>
<div class='alert alert-warning' style='position: fixed; top: 50%; left: 50%; transform: translate(-50%, -50%);'>
<?php
  if(isset($_SESSION['msg'])){
  echo $_SESSION['msg'];
  }else{
    echo $_SESSION['msg'] = "You are logged out. Please login again.";
  }
  ?>
</div>

    <?php } else if($q == 3){ ?>

<script>
playAudio1();
</script>
<div class='alert alert-danger' style='position: fixed; top: 50%; left: 50%; transform: translate(-50%, -50%);'>
<?php
if(isset($_SESSION['msg'])){
echo $_SESSION['msg'];
}else{
echo $_SESSION['msg'] = "You are logged out. Please login again.";
}
?>
</div>

<?php } ?>