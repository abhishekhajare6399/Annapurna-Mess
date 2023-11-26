<?php include'asession.php'?>
<style>
#myDIV {
    display: none;
}

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

<?php
include "database/dbcon.php";
$userid = $_POST['userid'];

$emailquery ="select * from user where userid='$userid' and messid='$messid'";
$query = mysqli_query($con, $emailquery);
$emailcount = mysqli_num_rows($query);
if($emailcount)
{
$userdata = mysqli_fetch_assoc($query);
$name = $userdata['name'];
$mobile = $userdata['mobile'];
$address = $userdata['address'];
$email = $userdata['email'];
$messtype = $userdata['messtype'];
$time = $userdata['time'];
$sdate = $userdata['start_date'];
$token = $userdata['token'];
$status = $userdata['status'];
$payment_status = $userdata['payment_status'];

}
?>


<form action="" method="POST">
    <input type="hidden" name="token" id="inputAddress" value="<?php echo $token;?>">
    <input type="hidden" name="status" id="inputAddress" value="<?php echo $status;?>">
    <div class="form-row">
        <div class="form-group col-md-4">
            <label for="inputState">Time :</label>
            <select id="inputState" name="messtime" class="form-control" required>
            <option><?php echo $time;?></option>
                <option value="Afternoon">Afternoon</option>
                <option value="Evening">Evening</option>
                <option value="Both">Both</option>
            </select>
        </div>
        <div class="form-group col-md-4">
            <label for="inputState">Select Payment Status :</label>
            <select id="inputState" name="pstatus" class="form-control" required>
                <option><?php echo $payment_status;?></option>
                <option value="Paid">Paid</option>
                <option value="Unpaid">Unpaid</option>
            </select>
        </div>
        <div class="form-group col-md-4">
            <label for="inputState">Mess Type :</label>
            <select id="inputState" name="messtype" class="form-control" required>
            <option><?php echo $messtype;?></option>
                <option value="Regular">Monthly Mess</option>
                <option value="Non-Regular">Coupon Base Mess</option>
            </select>
        </div>
        <div class="form-group col-md-12">
            <label for="inputAddress">Name :</label>
            <input type="text" name="name" class="form-control" id="inputAddress" placeholder="Eg. Abhishek Hajare" value="<?php echo $name;?>">
        </div>
    </div>
    <div class="form-row">
        <div class="form-group col-md-6">
            <label for="inputState">Mobile :</label>
            <input type="number" name="mobile" class="form-control" id="inputMobilenumber" placeholder="Eg. 9421017890" value="<?php echo $mobile;?>">
        </div>
        <div class="form-group col-md-6">
            <label for="inputState">Email :</label>
            <input type="email" name="email" class="form-control" id="inputEmail"
                placeholder="Eg. abhishekhajare@gmail.com"  value="<?php echo $email;?>">
        </div>
        <div class="form-group col-md-8">
            <label for="inputAddress">Address :</label>
            <input type="text" name="address" class="form-control" id="inputAddress" placeholder="Eg. Abhishek Hajare" value="<?php echo $address;?>">
        </div>
        <div class="form-group col-md-4">
            <label for="inputAddress">Start Date :</label>
            <input type="date" name="date" class="form-control" id="inputAddress" value="<?php echo $sdate;?>">
        </div>
    </div>
    </div>
    <div class="modal-footer">
        <button class="btn btn-primary" type="submit" name="changeinfo">Change Information</button>
    </div>
</form>