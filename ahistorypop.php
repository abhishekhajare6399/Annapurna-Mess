<?php include'asession.php'?>
<style>
.divider-text1 {
    position: relative;
    text-align: center;
    margin-top: 15px;
    margin-bottom: 15px;
    padding: 5px;

}

.divider-text1::after {
    content: "";
    position: absolute;
    width: 100%;
    border-bottom: 2px solid rgb(11, 10, 10);
    top: 55%;
    left: 0;
    z-index: 1;
}
</style>

<p class="divider-text1"></p>

<?php
include "database/dbcon.php";
$userid = $_POST['userid'];
$parts = explode('+', $userid);
$messid = $parts[0];
$sdate = $parts[1];
$sql1 = "SELECT date FROM attendance where messid='$messid' and date = '$sdate'";
             $res1 = mysqli_query($con, $sql1);
             $count1 = mysqli_num_rows($res1);


             $selectquery12 = "SELECT * FROM  `order` where messid='$messid' and date ='$sdate'";
             $res3 = mysqli_query($con, $selectquery12);
             $count2 = mysqli_num_rows($res3);

             $selectquery11 = "SELECT SUM(total) as total ,date FROM  `order` where messid='$messid' and date ='$sdate'";
             $query11 = mysqli_query($con,$selectquery11);
             $result11 =mysqli_fetch_array($query11);
             $total=$result11['total'];
?>
<div class="row" style="padding:5px;">
    <div class="col-sm-6" style="padding:15px;">
        <label for="inputEmail4">Attendence Plate Count : <?php echo $count1;?></label>
    </div>
    <div class="col-sm-6" style="padding:15px;">
        <label for="inputEmail4">New Order Count : <?php echo $count2;?></label>
    </div>
    <div class="col-sm-6" style="padding:15px;">
        <label for="inputEmail4">New Order Revenu : <?php echo $total;?> Rs.</label>
    </div>
    <div class="col-sm-6" style="padding:15px;">
        <label for="inputEmail4">Total  Plates : <?php echo $count1+$count2;?></label>
    </div>
</div>



    <p class="divider-text1"></p>

    </script>