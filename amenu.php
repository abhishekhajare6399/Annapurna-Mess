<?php include'asession.php'?>
<!DOCTYPE html>
<html lang="en">
<?php include'ahead.php' ?>
<style>
/* Increase the width of the modal */
.modal-dialog {
    max-width: 1500px;
    /* Adjust the width as needed */
}

/* Increase the height of the modal body (adjust the max-height as needed) */
.modal-body {
    max-height: 800px;
    /* Adjust the height as needed */
    overflow-y: auto;
    /* Enable vertical scrolling if the content exceeds the height */
}
</style>

<body>

    <nav class="navbar navbar-inverse visible-xs">
        <div class="container-fluid">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="ahome.php"><?php echo $name?></a>
            </div>
            <div class="collapse navbar-collapse" id="myNavbar">
                <ul class="nav navbar-nav">
                    <li><a href="ahome.php"><i class="fa fa-home" aria-hidden="true"></i>&nbsp;&nbsp; Home</a></li>
                    <li class="active"><a href="amenu.php"><i class="fa-solid fa-bars"></i>&nbsp;&nbsp; Menu</a></li>
                    <li><a href="aprofile.php"><i class="fas fa-user"></i>&nbsp;&nbsp; Mess Profile</a></li>
                    <li><a onclick="openInNewTab()"><i class="fa-solid fa-calendar"></i>&nbsp;&nbsp; Todays
                            Attendance</a></li>
                    <li><a href="aattendence.php"><i class="fas fa-calendar" aria-hidden="true"></i>&nbsp;&nbsp;
                            Attendance</a></li>
                    <li><a href="aallmember.php"><i class="fa-solid fa-users-line"></i>&nbsp;&nbsp; All Member</a></li>
                    <li><a href="aorderhistory.php"><i class="fa fa-history" aria-hidden="true"></i>&nbsp;&nbsp;Order
                            History</a></li>
                    <li><a href="ahistory.php"><i class="fa fa-history" aria-hidden="true"></i>&nbsp;&nbsp; History</a>
                    </li>
                    <li><a href="anotification.php"><i class="fa-solid fa-bell"></i>&nbsp;&nbsp; Notifications</a></li>
                    <li><a href="alogout.php"><i class="fa fa-sign-out" aria-hidden="true"></i>&nbsp;&nbsp; Logout</a>
                    </li>
                    <form action="search.php" method="POST">
                        <div class="input-group" style="padding: 10px;">
                            <input type="text" name="search" class="form-control" placeholder="Search">
                            <span class="input-group-btn">
                                <button class="btn btn-default" button type="submit" name="submit">
                                    <span class="glyphicon glyphicon-search"></span>
                                </button>
                            </span>
                        </div>
                    </form><br>
                </ul>
            </div>
        </div>
    </nav>

    <div class="container-fluid">
        <div class="row content">
            <div class="col-sm-2 sidenav hidden-xs"><br><br><br>
                <form action="search.php" method="POST">
                    <div class="input-group">
                        <input type="text" name="search" class="form-control" placeholder="Search">
                        <span class="input-group-btn">
                            <button class="btn btn-default" button type="submit" name="submit">
                                <span class="glyphicon glyphicon-search"></span>
                            </button>
                        </span>
                    </div>
                </form><br>
                <ul class="nav nav-pills nav-stacked">
                    <li><a href="ahome.php"><i class="fa fa-home" aria-hidden="true"></i>&nbsp;&nbsp; Home</a></li><br>
                    <li class="active"><a href="amenu.php"><i class="fa-solid fa-bars"></i>&nbsp;&nbsp; Menu</a></li>
                    <br>
                    <li><a href="aprofile.php"><i class="fas fa-user"></i>&nbsp;&nbsp; Mess Profile</a></li><br>
                    <li><a onclick="openInNewTab()"><i class="fa-solid fa-calendar"></i>&nbsp;&nbsp; Todays
                            Attendance</a></li><br>
                    <li><a href="aattendence.php"><i class="fas fa-calendar" aria-hidden="true"></i>&nbsp;&nbsp;
                            Attendance</a></li><br>
                    <li><a href="aallmember.php"><i class="fa-solid fa-users-line"></i>&nbsp;&nbsp; All Member</a></li>
                    <br>
                    <li><a href="aorderhistory.php"><i class="fa fa-history" aria-hidden="true"></i>&nbsp;&nbsp;Order
                            History</a></li><br>
                    <li><a href="ahistory.php"><i class="fa fa-history" aria-hidden="true"></i>&nbsp;&nbsp; History</a>
                    </li><br>
                    <li><a href="anotification.php"><i class="fa-solid fa-bell"></i>&nbsp;&nbsp; Notifications</a></li>
                    <br>
                    <li><a href="alogout.php"><i class="fa fa-sign-out" aria-hidden="true"></i>&nbsp;&nbsp;
                            Logout</a><br>
                    </li>
                </ul><br>
            </div>
            <?php include'anav.php'?>
            <div class="row">
                <div class="col-sm-12">
                    <div class="well">
                        <div class="row" style="padding:10px;">
                            <div class="col-sm-7">
                                <p style="padding:10px;text-align: left;font-size: 15px;">Menu List : </p>
                            </div>
                            <div class="col-sm-1">
                                <label>Specific Date : </label>
                            </div>
                            <div class="col-sm-2">
                                <div style="text-align: right;">
                                    <form action="" method="POST">
                                        <div class="input-group">
                                            <input type="date" name="date1" class="form-control" placeholder="date">
                                            <span class="input-group-btn">
                                                <button class="btn btn-default" type="submit" name="search">
                                                    <span class="glyphicon glyphicon-search"></span>
                                                </button>
                                            </span>
                                        </div>
                                    </form>
                                </div>
                            </div>
                            <div class="col-sm-2">
                                <button type="button" class="btn btn-primary" data-toggle="modal"
                                    data-target="#menu"><i class="fas fa-plus"></i> Add New Menu</button>
                            </div>
                        </div>
                        <div class="container1">
                            <table class="table">
                                <thead style="background-color:Orange;position: sticky;top: 0;">
                                    <tr>
                                        <th scope="col">Day :</th>
                                        <th scope="col">Date :</th>
                                        <th scope="col">Timing :</th>
                                        <th scope="col">Type :</th>
                                        <th scope="col">Menu :</th>
                                        <th scope="col">Action :</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                  include'database/dbcon.php';
                                  date_default_timezone_set("Asia/Calcutta");
                                  $date =date('Y-m-d');
                                  $messid=$_SESSION['messid'];
                                  if(isset($_POST['search']))
                                  { ?><tbody  style="border:2px solid black;padding:10px;"> <?php
                                    $search=mysqli_real_escape_string($con, $_POST['date1']);
                                    $find = "SELECT * FROM menu WHERE date ='$search' and messid ='$messid'";
                                    $result = mysqli_query($con,$find);
                                    $email_count = mysqli_num_rows($result);
                                    if($email_count>0)
                                    {
                                    while($row = mysqli_fetch_array($result))
                                      {
                                    ?>
                                    <tr>
                                    <th scope="row"><?php echo $row['day'];?></th>
                                        <th scope="row"><?php echo $row['date'];?></th>
                                        <td><?php echo $row['time'];?></td>
                                        <td><?php echo $row['foodtype'];?></td>
                                        <td><?php echo $row['menu'];?></td>
                                        <td>-</td>
                                    </tr><br>
                                    <?php
                                  }}else{
                                    ?>
                                    <tr>
                                        <th scope="row">No Data Found </th>
                                    </tr><br>
                                    <?php 
                                    }
                                    ?></tbody> <?php

                                }
                                  
                                  $query = "SELECT * FROM menu where messid='$messid' order by date DESC";
                                  $result = mysqli_query($con,$query);
                                  while($row = mysqli_fetch_array($result))
                                  {
                                      ?>
                                    <tr>
                                        <th scope="row"><?php echo $row['day'];?></th>
                                        <th scope="row"><?php echo $row['date'];?></th>
                                        <td><?php echo $row['time'];?></td>
                                        <td><?php echo $row['foodtype'];?></td>
                                        <td><?php echo $row['menu'];?></td>
                                        <td>
                                            <?php if($row['date'] == $date){
                                            ?>
                                            <a data-id='<?php echo $row['id']; ?>' class="userinfo"
                                                style="text-decoration: none;"><button type="button"
                                                    class="btn btn-success"><i class="fa fa-edit"
                                                        aria-hidden="true"></i>
                                                    Edit</button></a>&nbsp;&nbsp;&nbsp;&nbsp;<br>
                                            </td><td>
                                            <form action="" method="POST">
                                            <input type="hidden" name="id" id="inputAddress"
                                                    value="<?php echo $row['id'];?>">
                                                <button type="submit" name="delete" class="btn btn-danger"><i
                                                        class="fa fa-times" aria-hidden="true"></i> delete</button>
                                            </form>
                                            <?php }
                                          ?>
                                        </td>
                                    </tr>
                                    <?php 
                                  }
                                  ?>
                                </tbody>
                            </table>

                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
    </div>
    </div>
    </div>
    </div>


    <!-- Modal -->
    <div class="modal fade" id="menu" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Add New Menu</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close" id="closeModa">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">

                    <form action="" method="POST">
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="inputState">Time :</label>
                                <select id="inputState" name="time" class="form-control">
                                    <option selected>Select Mess Time</option>
                                    <option value="Afternoon">Afternoon</option>
                                    <option value="Evening">Evening</option>
                                </select>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="inputState">Food Type :</label>
                                <select id="inputState" name="foodtype" class="form-control">
                                    <option selected>Select Food Type</option>
                                    <option value="Veg Food">Veg Food</option>
                                    <option value="Non-Veg Food">Non-Veg Food</option>
                                    <option value="Both Veg Food & Non-Veg Food">Both Veg Food & Non-Veg Food</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="inputAddress">Menu :</label>
                            <input type="text" name="menu" class="form-control" id="inputAddress"
                                placeholder="Dal, Rice, Chapati...">
                        </div>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-success" type="submit" name="submit">Save changes</button>
                </div>
                </form>

            </div>
        </div>
    </div>

    <?php include 'afooter.php'?>

    <script type='text/javascript'>
    $(document).ready(function() {
        $('.userinfo').click(function() {
            var userid = $(this).data('id');
            $.ajax({
                url: 'amenupop.php',
                type: 'post',
                data: {
                    userid: userid
                },
                success: function(response) {
                    $('.modal-body').html(response);
                    $('#empModal').modal('show');
                }
            });
        });
    });
    document.getElementById('closeModa').addEventListener('click', function() {
        location.reload();
    });
    </script>
    <div class="modal fade" id="empModal" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Edit Menu Information :</h6>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close" id="closeModa">
                            <span aria-hidden="true">&times;</span>
                        </button>
                </div>
                <div class="modal-body">
                </div>
            </div>
        </div>
    </div>

</body>


<script>
    function openInNewTab() {
        // Define the URL you want to open
        var url = "https://annapurnamess.online/atodayattendance.php";

        // Open the URL in a new tab
        window.open(url, '_blank');
    }
</script>
</html>

<?php
    $messid=$_SESSION['messid'];
    $date = date("Y-m-d");
    if(isset($_POST['submit']))
    {
    date_default_timezone_set("Asia/Calcutta");
    $time1 = date("h:i:s");
    $time=mysqli_real_escape_string($con, $_POST['time']);
    $foodtype=mysqli_real_escape_string($con, $_POST['foodtype']);
    $menu=mysqli_real_escape_string($con, $_POST['menu']);
    $day= date("l");
    $insertquery ="insert into menu(messid,date,day,foodtype,time,menu) 
    values('$messid','$date','$day','$foodtype','$time','$menu')";

    $iquery = mysqli_query($con, $insertquery);
    if($iquery)
    {
      ?>
<script>
alert("Menu Added sucessfully")
location.replace("amenu.php");
</script>
<?php
    }else{
      ?>
<script>
alert("Menu Not Added !!!")
location.replace("amenu.php");
</script>
<?php
    }
    }

    if(isset($_POST['update']))
    {
    $id = mysqli_real_escape_string($con, $_POST['id']);
    $time=mysqli_real_escape_string($con, $_POST['tim']);
    $foodtype=mysqli_real_escape_string($con, $_POST['foodtyp']);
    $menu=mysqli_real_escape_string($con, $_POST['men']);
    $update = "update menu set menu ='$menu' , foodtype='$foodtype' where messid='$messid' and id= '$id'";
    $iquery = mysqli_query($con, $update);
    if($iquery){
      ?>
<script>
location.replace("amenu.php");
</script>
<?php
    }
    }

    if(isset($_POST['delete']))
    {
        $id = mysqli_real_escape_string($con, $_POST['id']);
      $update = "delete from menu where messid='$messid' and date='$date' and id='$id'";
    $iquery = mysqli_query($con, $update);
    if($iquery){
  ?>
<script>
location.replace("amenu.php");
</script>
<?php
    }
    }
    ?>