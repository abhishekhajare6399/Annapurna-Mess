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
date_default_timezone_set("Asia/Calcutta");
$date = date("d-m-Y");
?>


<form action="" method="POST">
    <input type="hidden" name="userid" id="inputAddress" value="<?php echo $userid;?>">
    <div class="form-row">
        <div class="form-group col-md-6">
            <label for="inputState">Select Activity :</label>
            <select id="inputState" name="act" class="form-control" required>
                <option>Select</option>
                <option value="Extend">Extend Expire Date</option>
                <option value="New">Add New Month</option>
            </select>
        </div>
        <div class="form-group col-md-6">
            <label for="inputState">Enter Holiday :</label>
            <input type="number" name="leave" class="form-control" id="inputAddress" placeholder="Eg. 10">
        </div>
        <div class="form-row">
           <div class="form-group col-md-4">
                                <label for="inputState">Time :</label>
                                <select id="inputState" name="messtime" class="form-control" required>
                                    <option>Select Mess Time</option>
                                    <option value="Afternoon">Afternoon</option>
                                    <option value="Evening">Evening</option>
                                    <option value="Both">Both</option>
                                </select>
                            </div>
                            <div class="form-group col-md-4">
                                <label for="inputState">Mess Type :</label>
                                <select id="inputState" name="messtype" class="form-control" required>
                                    <option>Select Mess Type</option>
                                    <option value="Regular">Monthly Mess</option>
                                    <option value="Non-Regular">Coupon Base Mess</option>
                                </select>
                            </div>
                            <div class="form-group col-md-4">
                                <label for="inputState">Food Type :</label>
                                <select id="inputState" name="foodtype" class="form-control" required>
                                    <option>Select Mess Type</option>
                                    <option value="Veg">Veg</option>
                                    <option value="Non-Veg">Non-Veg</option>
                                </select>
                            </div>
             <div class="form-group col-md-3">
                                <label for="inputAddress">Payment Paid :</label>
                                <input type="number" name="paid" class="form-control" id="inputAddress"
                                    placeholder="Eg. 2000">
                            </div>
            <div class="form-group col-md-6">
                <label for="inputState">Start Date :</label>
                <input type="date" name="sdate" class="form-control" id="inputAddress">
            </div>
            <div class="form-group col-md-2" style="padding:20px;">
                <button class="btn btn-primary" type="submit" name="update" >Update</button>
            </div>
        </div>
    </div>
</form>