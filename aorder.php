<?php include'asession.php'?>
<!DOCTYPE html>
<html lang="en">
<?php include'ahead.php' ?>
<style>

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
          <li  class="active"><a href="aorder.php"><i class="fa-solid fa-list"></i>&nbsp;&nbsp; Order</a></li>
          <li><a href="amenu.php"><i class="fa-solid fa-bars"></i>&nbsp;&nbsp; Menu</a></li>
          <li><a href="aprofile.php"><i class="fas fa-user"></i>&nbsp;&nbsp; Mess Profile</a></li>
          <li><a href="aattendence.php"><i class="fas fa-calendar" aria-hidden="true"></i>&nbsp;&nbsp; Todays Attendance</a></li>
          <li><a href="aallmember.php"><i class="fa-solid fa-users-line"></i>&nbsp;&nbsp; All Member</a></li>
          <li><a href="anewmember.php"><i class="fa fa-user-plus" aria-hidden="true"></i>&nbsp;&nbsp; Add New Member</a></li>
          <li><a href="aorderhistory.php"><i class="fa fa-history" aria-hidden="true"></i>&nbsp;&nbsp;Order History</a></li>
          <li><a href="ahistory.php"><i class="fa fa-history" aria-hidden="true"></i>&nbsp;&nbsp; History</a></li>
          <li><a href="anotification.php"><i class="fa-solid fa-bell"></i>&nbsp;&nbsp; Notifications</a></li>
          <li><a href="alogout.php"><i class="fa fa-sign-out" aria-hidden="true"></i>&nbsp;&nbsp; Logout</a></li>
        <form action ="search.php" method ="POST">
          <div class="input-group" style="padding: 10px;">
            <input type="text" name ="search" class="form-control" placeholder="Search">
            <span class="input-group-btn">
              <button class="btn btn-default" button type ="submit" name ="submit">
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
    <div class="col-sm-2 sidenav hidden-xs"><br>
      <form action ="search.php" method ="POST">
        <div class="input-group">
          <input type="text" name ="search" class="form-control" placeholder="Search">
          <span class="input-group-btn">
            <button class="btn btn-default" button type ="submit" name ="submit">
              <span class="glyphicon glyphicon-search"></span>
            </button>
          </span>
        </div>
  </form><br>
        <ul class="nav nav-pills nav-stacked">
        <li><a href="ahome.php"><i class="fa fa-home" aria-hidden="true"></i>&nbsp;&nbsp; Home</a></li><br>
          <li  class="active"><a href="aorder.php"><i class="fa-solid fa-list"></i>&nbsp;&nbsp; Order</a></li><br>
          <li><a href="amenu.php"><i class="fa-solid fa-bars"></i>&nbsp;&nbsp; Menu</a></li><br>
          <li><a href="aprofile.php"><i class="fas fa-user"></i>&nbsp;&nbsp; Mess Profile</a></li><br>
          <li><a href="aattendence.php"><i class="fas fa-calendar" aria-hidden="true"></i>&nbsp;&nbsp; Todays Attendance</a></li><br>
          <li><a href="aallmember.php"><i class="fa-solid fa-users-line"></i>&nbsp;&nbsp; All Member</a></li><br>
          <li><a href="anewmember.php"><i class="fa fa-user-plus" aria-hidden="true"></i>&nbsp;&nbsp; Add New Member</a></li><br>
          <li><a href="aorderhistory.php"><i class="fa fa-history" aria-hidden="true"></i>&nbsp;&nbsp;Order History</a></li><br>
          <li><a href="ahistory.php"><i class="fa fa-history" aria-hidden="true"></i>&nbsp;&nbsp; History</a></li><br>
          <li><a href="anotification.php"><i class="fa-solid fa-bell"></i>&nbsp;&nbsp; Notifications</a></li><br>
          <li><a href="alogout.php"><i class="fa fa-sign-out" aria-hidden="true"></i>&nbsp;&nbsp; Logout</a></li>
        </ul><br>
      </div>
    <?php include'anav.php'?>

    <div class="row">
        <div class="col-sm-10">
            <div class="container">
    <table class="table">
  <thead  style="background-color:Orange;position: sticky;top: 0;">
    <tr>
    <th scope="col">Order ID</th>
      <th scope="col">Customer Name</th>
      <th scope="col">Rice Plate</th>
      <th scope="col">Action</th>
    </tr>
  </thead>
  <tbody>
    
    <?php
    include'database/dbcon.php';
    date_default_timezone_set("Asia/Calcutta");
    $date =date('Y-m-d');
    $messid=$_SESSION['messid'];
    $query = "SELECT * FROM signupmess";
    $result = mysqli_query($con,$query);
    while($row = mysqli_fetch_array($result)){
      
  ?>
    <tr>
    <th scope="row"><?php echo $row['messid'];?></th>
      <th scope="row"><?php echo $row['mess'];?></th>
      <td><?php echo $row['date'];?></td>
      <td>
      <a data-id='<?php echo $row['messid']; ?>' class="userinfo" style="text-decoration: none;"><button type="button" class="btn btn-primary"><i class="fa fa-eye" aria-hidden="true"></i> View</button></a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
      <button type="button" class="btn btn-warning"><i class="fa fa-check" aria-hidden="true"></i> Accept</button>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    <button type="button" class="btn btn-danger"><i class="fa fa-times" aria-hidden="true"></i> Cancel</button>
      </td>
    </tr>
    <?php
    }
    ?>
</tbody>
</table>
          </div>
        </div>
        <div class="col-sm-2">
        <div class="row">
        <div class="col-sm-12">
          <div class="well">
            <h5>Accepted Order :</h5>
            <p>1500</p> 
          </div>
        </div>
        <div class="col-sm-12">
          <div class="well">
            <h5>Cancel Order : </h5>
            <p>100</p> 
          </div>
        </div>
</div></div>

</div>
    </div>
  </div>
</div>
    <?php include 'afooter.php'?>


    <script type='text/javascript'>
            $(document).ready(function(){
                $('.userinfo').click(function(){
                    var userid = $(this).data('id');
                    $.ajax({
                        url: 'aorderpop.php',
                        type: 'post',
                        data: {userid: userid},
                        success: function(response){ 
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
</html>