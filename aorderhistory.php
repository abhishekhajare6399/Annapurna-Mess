<?php include'asession.php'?>
<!DOCTYPE html>
<html lang="en">
<?php include'ahead.php' ?>

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
                    <li><a onclick="openInNewTab()"><i class="fa-solid fa-calendar"></i>&nbsp;&nbsp; Todays
                            Attendance</a></li>
                    <li><a href="aattendence.php"><i class="fas fa-calendar" aria-hidden="true"></i>&nbsp;&nbsp;
                            Attendance</a></li>
                    <li><a href="aallmember.php"><i class="fa-solid fa-users-line"></i>&nbsp;&nbsp; All Member</a></li>
                    <li class="active"><a href="aorderhistory.php"><i class="fa fa-history"
                                aria-hidden="true"></i>&nbsp;&nbsp;Order History</a></li>
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
                    <li><a href="aattendence.php"><i class="fas fa-calendar" aria-hidden="true"></i>&nbsp;&nbsp;
                            Attendance</a></li><br>
                    <li><a href="aallmember.php"><i class="fa-solid fa-users-line"></i>&nbsp;&nbsp; All Member</a></li>
                    <br>
                    <li class="active"><a href="aorderhistory.php"><i class="fa fa-history"
                                aria-hidden="true"></i>&nbsp;&nbsp;Order History</a></li><br>
                    <li><a href="ahistory.php"><i class="fa fa-history" aria-hidden="true"></i>&nbsp;&nbsp; History</a>
                    </li><br>
                    <li><a href="anotification.php"><i class="fa-solid fa-bell"></i>&nbsp;&nbsp; Notifications</a></li>
                    <br>
                    <li><a href="alogout.php"><i class="fa fa-sign-out" aria-hidden="true"></i>&nbsp;&nbsp; Logout</a>
                    </li><br>
                </ul><br>
            </div>
            <?php include'anav.php'?>
            <div class="row">
                <div class="col-sm-12">
                <div class="well">
                        <div class="row" style="padding:10px;">
                            <div class="col-sm-8">
                                <p style="padding:10px;text-align: left;font-size: 18px;">All Active Members : </p>
                            </div>

                            <div class="col-sm-3">
                                <div style="text-align: right;">
                                    <form action="" method="POST">
                                        <div class="input-group">
                                            <input type="text" name="name" class="form-control"
                                                placeholder="Enter Customer Name">
                                            <span class="input-group-btn">
                                                <button class="btn btn-default" type="submit" name="search">
                                                    <span class="glyphicon glyphicon-search"></span>
                                                </button>
                                            </span>
                                        </div>
                                    </form>
                                </div>
                            </div>
                            <a href="aorderhistory.php"><button class="btn btn-default">Reset</button></a>
                        </div>
                        <div class="container2">
                            <table class="table">
                                <thead style="background-color:Orange;position: sticky;top: 0;">
                                    <tr>
                                        <th scope="col">Day :</th>
                                        <th scope="col">Date :</th>
                                        <th scope="col">Name :</th>
                                        <th scope="col">Time :</th>
                                        <th scope="col">Food Type</th>
                                        <th scope="col">Plates :</th>
                                        <th scope="col">Total :</th>
                                    </tr>
                                </thead>
                                <tbody>

                                    <?php
                                  include'database/dbcon.php';
                                  date_default_timezone_set("Asia/Calcutta");
                                  $date =date('Y-m-d');
                                  $messid=$_SESSION['messid'];
                                  include'database/dbcon.php';
                                   date_default_timezone_set("Asia/Calcutta");
                                   $date =date('Y-m-d');
                                   $messid=$_SESSION['messid'];
                                   if(isset($_POST['search']))
                                    { ?><tbody  style="border:2px solid black;padding:10px;"> <?php

                                     $search=mysqli_real_escape_string($con, $_POST['name']);
                                     $find = "SELECT * FROM `order` WHERE  messid ='$messid' and (name LIKE '$search%' or date='$search' or foodtype='$search%') ";
                                     $result = mysqli_query($con,$find);
                                     $email_count = mysqli_num_rows($result);
                                     if($email_count>0)
                                     {
                                     while($row = mysqli_fetch_array($result))
                                       {
                                     ?>
                                       <tr>
                                       <th scope="row"><?php echo $row['day'];?></th>
                                        <td><?php $r = date('d-m-Y', strtotime($row['date'])); echo $r;?> </td>
                                         <td><?php echo $row['name'];?></td>
                                        <td><?php echo $row['time'];?></td>
                                        <td><?php echo $row['foodtype'];?></td>
                                        <td><?php echo $row['plate'];?></td>
                                        <td><?php echo $row['total'];?> Rs.</td>
                                       </tr><br>
                                       <?php
                                   }}else{
                                     ?>
                                       <tr style="border:2px solid black;padding:10px;">
                                           <th scope="row">No Data Found </th>
                                       </tr><br>
                                       <?php 
                                     }
                                     ?></tbody> <?php

                                 }



                                  $query = "SELECT * FROM `order` where messid='$messid' order by date DESC";
                                  $result = mysqli_query($con,$query);
                                  while($row = mysqli_fetch_array($result)){
                                    
                                    ?>
                                    <tr>
                                        <th scope="row"><?php echo $row['day'];?></th>
                                    <td><?php $r = date('d-m-Y', strtotime($row['date'])); echo $r;?> </td>
                                        <td><?php echo $row['name'];?></td>
                                        <td><?php echo $row['time'];?></td>
                                        <td><?php echo $row['foodtype'];?></td>
                                        <td><?php echo $row['plate'];?></td>
                                        <td><?php echo $row['total'];?> Rs.</td>
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

    <?php include 'afooter.php'?>

    <script type='text/javascript'>
    $(document).ready(function() {
        $('.userinfo').click(function() {
            var userid = $(this).data('id');
            $.ajax({
                url: 'aorderpop.php',
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
    </script>
    <div class="modal fade" id="empModal" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Order Information :</h4>
                    <button type="button" class="close" data-dismiss="modal">×</button>
                </div>
                <div class="modal-body">
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
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