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

<p class="divider-text1"></p>

<?php
include "database/dbcon.php";
$userid = $_POST['userid'];
$messid=$_SESSION['messid'];
$sql = "select * from menu  where messid='$messid' and  id=".$userid;
$result1 = mysqli_query($con,$sql);
while( $row1 = mysqli_fetch_array($result1) ){
?>

<form action="" method="POST">
    <input type="hidden" name="id" id="inputAddress" value="<?php echo $row1['id'];?>">
    <div class="form-row">
        <div class="form-group col-md-6">
            <label for="inputState">Time :</label>
            <select id="inputState" name="tim" class="form-control">
                <option value="<?php echo $row1['time']; ?>" selected><?php echo $row1['time']; ?></option>
                <option value="Afternoon">Afternoon</option>
                <option value="Evening">Evening</option>
            </select>
        </div>
        <div class="form-group col-md-6">
            <label for="inputState">Food Type :</label>
            <select id="inputState" name="foodtyp" class="form-control">
                <option value="<?php echo $row1['foodtype']; ?>" selected><?php echo $row1['foodtype']; ?></option>
                <option value="Veg Food">Veg Food</option>
                <option value="Non-Veg Food">Non-Veg Food</option>
                <option value="Both Veg Food & Non-Veg Food">Both Veg Food & Non-Veg Food</option>
            </select>
        </div>
    </div>
    <div class="form-group">
        <label for="inputAddress">Menu :</label>
        <input type="text" name="men" class="form-control" id="inputAddress" placeholder="<?php echo $row1['menu']; ?>"
            value="<?php echo $row1['menu']; ?>">
    </div>
    </div>
    <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button class="btn btn-success" type="submit" name="update">Update changes</button>
    </div>
</form>
<?php } ?>

<p class="divider-text1"></p>



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