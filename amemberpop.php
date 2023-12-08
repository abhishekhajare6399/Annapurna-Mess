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
$sql = "select * from user where userid='$userid' and messid='$messid'";
$result1 = mysqli_query($con,$sql);
while( $result = mysqli_fetch_array($result1) ){
?>
<div class="row" style="padding:10px;">
<div class="col-sm-8" style="padding:15px;">
     <label for="inputEmail4">Customer ID : <?php echo $result['userid'];?> </label><br>
     <label for="inputEmail4">Customer Name : <?php echo $result['name'];?></label><br>
     <label for="inputEmail4">Email ID : <?php echo $result['email'];?></label><br>
     <label for="inputEmail4">Mobile Number : <?php echo $result['mobile'];?></label><br>
     <label for="inputEmail4">Address : <?php echo $result['address'];?></label>
</div>
<div class="col-sm-4" style="padding:15px;">
<img alt="ecommerce" src="<?php echo $result['image'];?>"style="width:80%;height:100%;border-radius:12px;">
</div>
</div>
<div class="row" style="padding:10px;">
<div class="col-sm-4" style="padding:5px;">
      <label for="inputEmail4">Mess Type : <?php echo $result['messtype'];?></label>
</div>
<div class="col-sm-4" style="padding:5px;">
      <label for="inputEmail4">Food Type : <?php echo $result['foodtype'];?></label>
</div>
<div class="col-sm-4" style="padding:5px;">
      <label for="inputEmail4">Mess Time : <?php echo $result['time'];?></label>
</div>
<div class="col-sm-4" style="padding:5px;">
      <label for="inputEmail4">Joining Date : <?php $r = date('d-m-Y', strtotime($result['joining_date'])); echo $r;?>   </label>
</div>
<div class="col-sm-4" style="padding:5px;">
      <label for="inputEmail4">Mess Start Date : <?php $r = date('d-m-Y', strtotime($result['start_date'])); echo $r;?> </label>
</div>
<div class="col-sm-4" style="padding:5px;">
      <label for="inputEmail4">Mess End Date : <?php $r = date('d-m-Y', strtotime($result['end_date'])); echo $r;?> </label>
</div>
<div class="col-sm-4" style="padding:5px;">
      <label for="inputEmail4">Points: <?php echo $result['point'];?></label>
</div>
<div class="col-sm-4" style="padding:5px;">
      <label for="inputEmail4">Payment : <?php echo $result['payment'];?> Rs. </label>
</div>
<div class="col-sm-4" style="padding:5px;">
      <label for="inputEmail4">Payment Paid : <?php echo $result['paid'];?> Rs. </label>
</div>
<div class="col-sm-4" style="padding:5px;">
      <label for="inputEmail4">Payment Remain : <?php $r = $result['payment'] - $result['paid']; echo $r;?> Rs. </label>
</div>
<div class="col-sm-4" style="padding:5px;">
      <label for="inputEmail4">Payment Status : <?php echo $result['payment_status'];?> </label>
</div>
</div>
<?php } ?>
</div>
    
<p class = "divider-text1"></p>
      <label for="inputEmail4">Payment History :</label></label>
      <table class="table">
  <thead>
    <tr>
      <th scope="col">Payment</th>
      <th scope="col">Date</th>
      <th scope="col">Time</th>
    </tr>
  </thead>
  <tbody>
      <?php
       $query = "SELECT * FROM payment WHERE  userid='$userid' and messid='$messid'  order by id DESC";
                                 $result = mysqli_query($con,$query);
                                  $email_count = mysqli_num_rows($result);
                                  while($row = mysqli_fetch_array($result))
                                    {
                                  ?>
    <tr>
      <th scope="row"><?php echo $row['payment'];?></th>
      <td><?php $r = date('d-m-Y', strtotime($row['date'])); echo $r;?> </td>
      <td><?php echo $row['time'];?></td>
    </tr>
    <?php } ?>
  </tbody>
</table>
      
      
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