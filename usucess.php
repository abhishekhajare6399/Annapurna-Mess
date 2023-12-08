<?php include'uheader.php'?>
<style>
.hero-bg {
  background-image: url('<?php echo $bg?>');
  background-size: cover;
  background-position: center;
  background-attachment: fixed;
}

      </style>


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
<div class="hero-area hero-bg">
		<div class="container">
			<div class="row">
				<div class="col-lg-9 offset-lg-2 text-center">
					<div class="hero-text">
						<div class="hero-text-tablecell">

<?php 
 $q = $_REQUEST["s"];
 if($q == 1){
 ?>
 <script>
playAudio();
</script>
 <div class='alert alert-success' style='position: fixed; top: 50%; left: 50%; transform: translate(-50%, -50%);  background-color: green; color: white; font-weight: bold; font-size:15px'>
<?php
  if(isset($_SESSION['msg'])){
  ?> <p style='color: white; font-weight: bold;font-size:15px'><?php echo $_SESSION['status']; ?></p>
    <p style='color: black; font-weight: bold;font-size:25px'><?php echo $_SESSION['userid']; ?></p>
    <p style='color: black;font-size:15px'>Name : <?php echo $_SESSION['user']; ?></p>
    <p style='color: white; font-weight: bold;font-size:15px'><?php echo $_SESSION['msg']; ?></p>
    <p style='color: black;font-size:15px'><?php echo $_SESSION['date']; ?></p><?php
  
  }else{
    echo $_SESSION['msg'] = "You are logged out. Please login again.";
  }
  ?>
</div>
<?php }else if($q == 2){ ?>

    <script>
playAudio1();
</script>
<div class='alert alert-warning' style='position: fixed; top: 50%; left: 50%; transform: translate(-50%, -50%); background-color: #feb236; color: white; font-weight: bold;font-size:15px'>
<?php
  if(isset($_SESSION['msg'])){
  ?> <p style='color: white; font-weight: bold;font-size:15px'><?php echo $_SESSION['status']; ?></p>
    <p style='color: black; font-weight: bold;font-size:25px'><?php echo $_SESSION['userid']; ?></p>
    <p style='color: black;font-size:15px'>Name : <?php echo $_SESSION['user']; ?></p>
    <p style='color: white; font-weight: bold;font-size:15px'><?php echo $_SESSION['msg']; ?></p>
    <p style='color: black;font-size:15px'><?php echo $_SESSION['date']; ?></p><?php

  }else{
    echo $_SESSION['msg'] = "You are logged out. Please login again.";
  }
  ?>
</div>

    <?php } else if($q == 3){ ?>
<script>
playAudio1();
</script>
<div class='alert alert-danger' style='position: fixed; top: 50%; left: 50%; transform: translate(-50%, -50%); background-color: red; color: white; font-weight: bold;font-size:15px'>
<?php
if(isset($_SESSION['msg'])){
?>
 <p style='color: white; font-weight: bold;font-size:15px'><?php echo $_SESSION['status']; ?></p>
    <p style='color: black; font-weight: bold;font-size:25px'><?php echo $_SESSION['userid']; ?></p>
    <p style='color: black;font-size:15px'>Name : <?php echo $_SESSION['user']; ?></p>
    <p style='color: white; font-weight: bold;font-size:15px'><?php echo $_SESSION['msg']; ?></p>
    <p style='color: black;font-size:15px'><?php echo $_SESSION['date']; ?></p><?php
}else{
echo $_SESSION['msg'] = "You are logged out. Please login again.";
}
?>
</div>

<?php } ?>
							
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
<?php include'ufooter.php'?>
