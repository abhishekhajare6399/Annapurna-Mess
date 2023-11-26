<?php include'asession.php'?>
<style>
#myDIV{
  display:none;
}
.divider-text1{
    position: relative;
    text-align: center;
    margin-top: 15px;
    margin-bottom: 15px;
    padding : 5px;
    
  }
  
  .divider-text1::after{
    content: "";
    position: absolute;
    width: 100%;
    border-bottom: 2px solid rgb(11, 10, 10);
    top: 55%;
    left: 0;
    z-index: 1;
  }
  </style>
   
<p class = "divider-text1"></p>

<?php
include "database/dbcon.php";
$userid = $_POST['userid'];
$sql = "select * from user where userid='$userid'";
$result1 = mysqli_query($con,$sql);
while( $result = mysqli_fetch_array($result1) ){
?>
<div class="row" style="padding:5px;">
<div class="col-sm-8" style="padding:15px;">
<form action ="<?php echo htmlentities($_SERVER['PHP_SELF']);?>" method ="POST" enctype ="multipart/form-data">
<div class="row" style="padding:5px;">
<div class="col-sm-12" style="padding:15px;">
      <label for="inputEmail4">Customer Name : <?php echo $result['name'];?></label>
      </div>
<div class="col-sm-12" style="padding:15px;">
      <label for="inputEmail4">Email : <?php echo $result['email'];?></label>
</div>
<div class="col-sm-12" style="padding:15px;">
      <label for="inputEmail4">Mobile Number : <?php echo $result['mobile'];?></label>
</div>
<div class="col-sm-7" style="padding:15px;">
      <label for="inputEmail4">Mess Type : <?php echo $result['messtype'];?></label>
</div>
<div class="col-sm-5" style="padding:15px;">
      <label for="inputEmail4">Time : <?php echo $result['time'];?></label>
</div>
<div class="col-sm-4" style="padding:15px;">
      <label for="inputEmail4">Joining Date :<br> <?php echo $result['joining_date'];?></label>
</div>
<div class="col-sm-4" style="padding:15px;">
      <label for="inputEmail4">Start Date :<br> <?php echo $result['start_date'];?></label>
</div>
<div class="col-sm-4" style="padding:15px;">
      <label for="inputEmail4">End Date :<br> <?php echo $result['end_date'];?></label>
</div>

<div class="col-sm-4" style="padding:15px;">
      <label for="inputEmail4">Payment : <?php echo $result['payment'];?> Rs.</label>
</div>
<div class="col-sm-4" style="padding:15px;">
      <label for="inputEmail4">Points : <?php echo $result['point'];?></label>
</div>
<div class="col-sm-4" style="padding:15px;">
      <label for="inputEmail4">Payment status : <?php echo $result['payment_status'];?></label>
</div>

<div class="col-sm-12" style="padding:15px;">
      <label for="inputEmail4">Address : <?php echo $result['address'];?></label>
</div>
</div>
</form>
</div>
<div class="col-sm-4" style="padding:15px;">
<img alt="ecommerce" src="<?php echo $result['image'];?>"style="width:80%;height:100%;border-radius:12px;">
</div>
<?php } ?>
</div>
    
<p class = "divider-text1"></p>


<script>
function myFunction() {
  var x = document.getElementById("myDIV");
  if (x.style.display === "none") {
    x.style.display = "block";
  } else {
    x.style.display = "none";
  }
}
</script>