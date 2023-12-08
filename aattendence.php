<?php include'asession.php'?>
<!DOCTYPE html>
<html lang="en">
<?php include'ahead.php';
  include'database/dbcon.php';
  date_default_timezone_set("Asia/Calcutta");
  $date =date('Y-m-d');
  ?>

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
                    <li><a href="amenu.php"><i class="fa-solid fa-bars"></i>&nbsp;&nbsp; Menu</a></li>
                    <li><a href="aprofile.php"><i class="fas fa-user"></i>&nbsp;&nbsp; Mess Profile</a></li>
                     <li><a onclick="openInNewTab()"><i class="fa-solid fa-calendar"></i>&nbsp;&nbsp;Todays
                            Attendance</a></li><br>
                    <li class="active"><a href="aattendence.php"><i class="fas fa-calendar"
                                aria-hidden="true"></i>&nbsp;&nbsp; Attendance</a></li>
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
                    <li><a href="amenu.php"><i class="fa-solid fa-bars"></i>&nbsp;&nbsp; Menu</a></li><br>
                    <li><a href="aprofile.php"><i class="fas fa-user"></i>&nbsp;&nbsp; Mess Profile</a></li><br>
                    <li><a onclick="openInNewTab()"><i class="fa-solid fa-calendar"></i>&nbsp;&nbsp; Todays
                            Attendance</a></li><br>
                    <li class="active"><a href="aattendence.php"><i class="fas fa-calendar"
                                aria-hidden="true"></i>&nbsp;&nbsp; Attendance</a></li><br>
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
                            <div class="col-sm-6">
                                <p style="padding:10px;text-align: left;font-size: 18px;">Attendance : </p>
                            </div>

                            <div class="col-sm-5">
                                <div style="text-align: right;">
                                    <form action="" method="POST">
                                        <div class="input-group">
                                            <div class="col-sm-6">
                                                <input type="date" name="date" class="form-control">
                                            </div>
                                            <div class="col-sm-6">
                                                <input type="text" name="name" class="form-control"
                                                    placeholder="Enter Customer Name">
                                            </div>
                                            <span class="input-group-btn">
                                                <button class="btn btn-default" type="submit" name="search_date">
                                                    <span class="glyphicon glyphicon-search"></span>
                                                </button>
                                            </span>
                                        </div>
                                    </form>
                                </div>
                            </div>
                            <a href="aattendence.php"><button class="btn btn-default">Reset</button></a>
                        </div>
                        <div class="container2">
                            <table class="table">
                                <thead style="background-color:Orange;position: sticky;top: 0;">
                                    <tr>
                                        <th scope="col">Customer ID</th>
                                        <th scope="col">Customer Name</th>
                                        <th scope="col">Date</th>
                                        <th scope="col">Time</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                $messid=$_SESSION['messid'];
                                if(isset($_POST['search_date'])){
                                    $search_date=mysqli_real_escape_string($con, $_POST['date']);
                                    $search=mysqli_real_escape_string($con, $_POST['name']);
                                    if($search!=NULL){
                                 ?>
                                <tbody style="border:2px solid black;padding:10px;"> <?php
                                 $find = "SELECT attendance.userid,attendance.messid,user.name,attendance.time,attendance.date FROM `user` INNER JOIN attendance on user.userid = attendance.userid where attendance.messid ='$messid' and (user.name LIKE '$search%' or user.userid like'$search%') and Accept_status='1' order by attendance.id DESC";
                                  $result = mysqli_query($con,$find);
                                  $email_count = mysqli_num_rows($result);
                                  if($email_count>0)
                                  {
                                  while($row = mysqli_fetch_array($result))
                                    {
                                  ?>
                                    <tr>
                                        <th scope="row"><?php echo $row['userid'];?></th>
                                        <th scope="row"><?php echo $row['name'];?></th>
                                    <td><?php $r = date('d-m-Y', strtotime($row['date'])); echo $r;?> </td>
                                        <td><?php echo $row['time'];?></td>
                                    </tr>
                                    <?php
                                }}else{
                                  ?>
                                    <tr style="border:2px solid black;padding:10px;">
                                        <th scope="row">No Data Found </th>
                                    </tr><br>
                                    <?php 
                                  }
                                  ?>
                                </tbody> <?php
                                    }else{

                                $query = "SELECT attendance.time,attendance.date,attendance.userid,user.name FROM `user` INNER JOIN attendance on user.userid = attendance.userid where attendance.messid ='$messid' and date='$search_date' and Accept_status='1' order by attendance.id DESC";
                                $result = mysqli_query($con,$query);
                                while($row = mysqli_fetch_array($result)){
                                
                                ?>
                                <tr>
                                    <th scope="row"><?php echo $row['userid'];?></th>
                                    <th scope="row"><?php echo $row['name'];?></th>
                                    <td><?php $r = date('d-m-Y', strtotime($row['date'])); echo $r;?> </td>
                                    <td><?php echo $row['time'];?></td>
                                </tr>
                                <?php
                                    }}}else{
                                $query = "SELECT attendance.userid,attendance.messid,user.name,attendance.time,attendance.date FROM `user` INNER JOIN attendance on user.userid = attendance.userid where attendance.messid ='$messid' and date='$date' and Accept_status='1' order by attendance.id DESC";
                                $result = mysqli_query($con,$query);
                                while($row = mysqli_fetch_array($result)){
                                
                                ?>
                                <tr>
                                    <th scope="row"><?php echo $row['userid'];?></th>
                                    <th scope="row"><?php echo $row['name'];?></th>
                                    <td><?php $r = date('d-m-Y', strtotime($row['date'])); echo $r;?> </td>
                                    <td><?php echo $row['time'];?></td>
                                </tr>
                                        <?php
                                    }}
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

    <?php include 'afooter.php'?>
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