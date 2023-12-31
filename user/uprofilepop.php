<?php include'uheader.php'?>
<style>
.container1 {
    width: 1100px;
    /* Set the width of your container */
    height: auto;
    /* Set the height of your container */
    overflow: auto;
    padding: 20px;
    background-color: white;
}

.hero-bg {
    background-image: url('<?php echo $bg?>');
    background-size: cover;
    background-position: center;
    background-attachment: fixed;
}

@media (max-width: 786px) {
    .container1 {
        width: 300px;
        /* Set the width of your container */
        height: auto;
        overflow: auto;
        /* Set the height of your container */
    }
}
</style>

<div class="hero-area hero-bg">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 offset-lg-0 text-center">
                <div class="hero-text">
                    <div class="hero-text-tablecell">

                        <div class="container1">
                            <?php
                       include'database/dbcon.php';
                       date_default_timezone_set("Asia/Calcutta");
                       if(isset($_GET['userid'])){
                         $userid = $_GET['userid'];
                         $emailquery =" select * from user where userid='$userid'";
                         $query = mysqli_query($con, $emailquery);
                         $emailcount = mysqli_num_rows($query);
                         if($emailcount)
                         {
                         $userdata = mysqli_fetch_assoc($query);
                         $name = $userdata['name'];
                         $mobile = $userdata['mobile'];
                         $email = $userdata['email'];
                         $address = $userdata['address'];
                         $image = $userdata['image'];
                         }
                        }
                       ?>
                            <div class="row" style="padding:5px;">
                                <div class="col-sm-8" style="padding:15px;">
                                    <div class="row" style="padding:5px;">
                                        <div class="col-sm-12" style="padding:15px;">
                                            <label for="inputEmail4">Customer Name :
                                                <?php echo $name;?></label>
                                        </div>
                                        <div class="col-sm-12" style="padding:15px;">
                                            <label for="inputEmail4">Email : <?php echo $email;?></label>
                                        </div>
                                        <div class="col-sm-12" style="padding:15px;">
                                            <label for="inputEmail4">Mobile Number :
                                                <?php echo $mobile;?></label>
                                        </div>
                                        <div class="col-sm-12" style="padding:15px;">
                                            <label for="inputEmail4">Address :
                                                <?php echo $address;?></label>
                                        </div>
                                    </div>
                                    <form action="" method="POST" enctype="multipart/form-data">
                                        <input type="hidden" name="userid" value="<?php echo $userid; ?>">
                                        <label for="inputAddress">Upload New Profile Image :</label>
                                        <input type="file" name="proof">
                                        <button class="btn btn-primary" type="submit" name="changeinfo">Update
                                            Image</button>
                                    </form>

                                </div>
                                <div class="col-sm-4" style="padding:15px;">
                                    <img alt="ecommerce" src="<?php echo $image;?>"
                                        style="width:80%;height:100%;border-radius:12px;">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php include 'ufooter.php'?>

    <?php
if (isset($_POST['changeinfo'])) {
    $file = $_FILES['proof'];
    $filename = $file['name'];
    $filepath = $file['tmp_name'];
    $fileerror = $file['error'];
    if ($fileerror == 0) {
        $destfile = 'M_user/' . $filename;
        move_uploaded_file($filepath, $destfile);

            $insertquery = "UPDATE user SET image = '$destfile' WHERE userid = '$userid'";
            $iquery = mysqli_query($con, $insertquery);

            if ($iquery) {
                ?>
    <script>
    alert("Profile Updated Successfully");
    location.replace('uindex.php');
    </script>
    <?php
            } else {
                ?>
    <script>
    alert("Profile Not Updated");
    location.replace('uindex.php');
    </script>
    <?php
            }
    }
}
?>