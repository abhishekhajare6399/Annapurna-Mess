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

$emailquery ="select * from signupmess where messid='$userid'";
$query = mysqli_query($con, $emailquery);
$emailcount = mysqli_num_rows($query);
if($emailcount)
{
$userdata = mysqli_fetch_assoc($query);
$name = $userdata['mess'];
$mobile = $userdata['mobile'];
$address = $userdata['address'];
$email = $userdata['email'];
$time = $userdata['time'];
$city = $userdata['city'];
$state = $userdata['state'];
$pincode = $userdata['pincode'];

$description = $userdata['description'];
$about = $userdata['about'];
$logo = $userdata['logo'];
$image = $userdata['image'];
$bg = $userdata['bg'];

$coupon = $userdata['coupon'];
$coupon_onetime = $userdata['coupon_onetime'];
$monthly = $userdata['monthly'];
$monthly_onetime = $userdata['monthly_onetime'];
$non = $userdata['Non_veg'];
$bg = $userdata['bg'];
$image = $userdata['image'];
$logo = $userdata['logo'];

}
?>


<form action="" method="POST" enctype="multipart/form-data">
    <div class="form-row">
        <div class="form-group col-md-12">
        <input type="hidden" name="bg" class="form-control" id="inputAddress" placeholder="Eg. Abhishek Hajare"
                value="<?php echo $bg;?>">
                <input type="hidden" name="image" class="form-control" id="inputAddress" placeholder="Eg. Abhishek Hajare"
                value="<?php echo $image;?>">
                <input type="hidden" name="logo" class="form-control" id="inputAddress" placeholder="Eg. Abhishek Hajare"
                value="<?php echo $logo;?>">

            <label for="inputAddress">Name :</label>
            <input type="text" name="name" class="form-control" id="inputAddress" placeholder="Eg. Abhishek Hajare"
                value="<?php echo $name;?>">
        </div>
    </div>
    <div class="form-row">
        <div class="form-group col-md-6">
            <label for="inputState">Mobile :</label>
            <input type="number" name="mobile" class="form-control" id="inputMobilenumber" placeholder="Eg. 9421017890"
                value="<?php echo $mobile;?>">
        </div>
        <div class="form-group col-md-6">
            <label for="inputState">Email :</label>
            <input type="email" name="email" class="form-control" id="inputEmail"
                placeholder="Eg. abhishekhajare@gmail.com" value="<?php echo $email;?>">
        </div>
        <div class="form-group col-md-12">
            <label for="inputAddress">Address :</label>
            <input type="text" name="address" class="form-control" id="inputAddress" placeholder="Eg. Abhishek Hajare"
                value="<?php echo $address;?>">
        </div>
        <div class="form-group col-md-5">
            <label for="inputState">City :</label>
            <input type="text" name="city" class="form-control" id="inputMobilenumber" value="<?php echo $city;?>">
        </div>
        <div class="form-group col-md-4">
            <label for="inputState">State :</label>
            <input type="text" name="state" class="form-control" id="inputEmail" value="<?php echo $state;?>">
        </div>
        <div class="form-group col-md-3">
            <label for="inputState">Pincode :</label>
            <input type="text" name="pincode" class="form-control" id="inputEmail" value="<?php echo $pincode;?>">
        </div>
        <div class="form-group col-md-12">
            <label for="inputAddress">About us :</label>
            <textarea type="text" name="about" class="form-control"
                value="<?php echo $about;?>"><?php echo $about;?></textarea>
        </div>
        <div class="form-group col-md-12">
            <label for="inputAddress">Description :</label>
            <textarea type="text" name="description" class="form-control"
                value="<?php echo $description;?>"><?php echo $description;?></textarea>
        </div>

        <div class="form-group col-md-4">
            <label for="inputAddress">Logo Image :</label>
            <input type="file" name="logo" id="image" accept="image/*" onchange="checkFileSize(this)">
        </div>
        <div class="form-group col-md-4">
            <label for="inputAddress">Background Image :</label>
            <input type="file" name="bg" id="image" accept="image/*" onchange="checkFileSize(this)">
        </div>
        <div class="form-group col-md-4">
            <label for="inputAddress">Image :</label>
            <input type="file" name="image" id="image" accept="image/*" onchange="checkFileSize(this)">
        </div>

        <div class="form-group col-md-6">
            <label for="inputAddress">Monthly :</label>
            <input type="text" name="monthly" class="form-control" id="inputEmail" value="<?php echo $monthly;?>">
        </div>
        <div class="form-group col-md-6">
            <label for="inputAddress">Monthly Onetime :</label>
            <input type="text" name="monthly_onetime" class="form-control" id="inputEmail"
                value="<?php echo $monthly_onetime;?>">
        </div>
        <div class="form-group col-md-6">
            <label for="inputAddress">Coupon :</label>
            <input type="text" name="coupon" class="form-control" id="inputEmail" value="<?php echo $coupon;?>">
        </div>
        <div class="form-group col-md-6">
            <label for="inputAddress">Coupon Onetime :</label>
            <input type="text" name="coupon_onetime" class="form-control" id="inputEmail"
                value="<?php echo $coupon_onetime;?>">
        </div>
         <div class="form-group col-md-6">
            <label for="inputAddress">Non- veg Add :</label>
            <input type="text" name="nonveg" class="form-control" id="inputEmail"
                value="<?php echo $non;?>">
        </div>
    </div>
    </div>
    <div class="modal-footer">
        <button class="btn btn-primary" type="submit" name="changeinfo">Change Information</button>
    </div>
</form>

<script>
    function checkFileSize(input) {
        if (input.files && input.files[0]) {
            const maxSize = 5 * 1024 * 1024; // 5MB in bytes
            const fileSize = input.files[0].size;

            if (fileSize > maxSize) {
                alert("File size exceeds the maximum limit of 5MB. Please choose a smaller file.");
                input.value = ''; // Clear the input field
            }
        }
    }
</script>