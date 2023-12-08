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
<div class="row" style="padding:25px;">
<div class="col-sm-4" style="padding:5px;">
      <label for="inputEmail4">Customer ID : <?php echo $result['userid'];?></label>
</div>
<div class="col-sm-8" style="padding:5px;">
      <label for="inputEmail4">Customer Name : <?php echo $result['name'];?></label>
</div>
<div class="col-sm-12" style="padding:5px;">
      <label for="inputEmail4">Email : <?php echo $result['email'];?></label>
</div>
<div class="col-sm-4" style="padding:5px;">
      <label for="inputEmail4">End Date :<br> <?php echo $result['end_date'];?></label>
</div>
<div class="col-sm-4" style="padding:5px;">
      <label for="inputEmail4">Payment : <?php echo $result['payment'];?></label>
</div>
<div class="col-sm-4" style="padding:5px;">
      <label for="inputEmail4">Payment Paid : <?php echo $result['paid'];?></label>
</div>
</div>


<form action="" method="POST">
    <input type="hidden" name="userid" id="inputAddress" value="<?php echo $userid;?>">
    <input type="hidden" name="prevpaid" id="inputAddress" value="<?php echo $result['paid'];?>">
    <input type="hidden" name="fullpayment" id="inputAddress" value="<?php echo $result['payment'];?>">

    <div class="form-row">
        <div class="form-group col-md-8">
            <label for="inputState">Payment Amount :</label>
            <input type="text" name="paid" class="form-control" id="inputAddress" placeholder="Eg. <?php echo $result['payment'];?>">
        </div>
            <div class="form-group col-md-2" style="padding:20px;">
                <button class="btn btn-primary" type="submit" name="payment">Update</button>
            </div>
        </div>
    </div>
</form>
<?php } ?>

    
      <label for="inputEmail4" style="padding:25px;">Payment History :</label></label>
      <table class="table" style="padding:25px;">
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