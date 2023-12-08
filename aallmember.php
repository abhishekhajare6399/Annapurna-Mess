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
                     <li><a onclick="openInNewTab()"><i class="fa-solid fa-bell"></i>&nbsp;&nbsp; Todays
                            Attendance</a></li>
                    <li><a href="aattendence.php"><i class="fas fa-calendar" aria-hidden="true"></i>&nbsp;&nbsp;
                            Attendance</a></li>
                    <li class="active"><a href="aallmember.php"><i class="fa-solid fa-users-line"></i>&nbsp;&nbsp; All
                            Member</a></li>
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
                    <li><a onclick="openInNewTab()"><i class="fa-solid fa-bell"></i>&nbsp;&nbsp; Todays
                            Attendance</a></li>
                    <br>
                    <li><a href="aattendence.php"><i class="fas fa-calendar" aria-hidden="true"></i>&nbsp;&nbsp;
                            Attendance</a></li><br>
                    <li class="active"><a href="aallmember.php"><i class="fa-solid fa-users-line"></i>&nbsp;&nbsp; All
                            Member</a></li><br>
                    <li><a href="aorderhistory.php"><i class="fa fa-history" aria-hidden="true"></i>&nbsp;&nbsp;Order
                            History</a></li><br>
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
                            <a href="aallmember.php"><button class="btn btn-default">Reset</button></a>
                        </div>
                        <div class="container2">
                            <table class="table">
                                <thead style="background-color:DodgerBlue;position: sticky;top: 0;">
                                    <tr>
                                        <th scope="col">ID :</th>
                                        <th scope="col">Customer Name :</th>
                                        <th scope="col">Food type :</th>
                                        <th scope="col">Membership :</th>
                                        <th scope="col">Mess Time :</th>
                                        <th scope="col">Start Date :</th>
                                        <th scope="col">End Date :</th>
                                        <th scope="col">Points :</th>
                                        <th scope="col">Payment Remain :</th>
                                        <th scope="col">Action</th>
                                    </tr>
                                </thead>
                                <tbody>

                                    <?php
                                   include'database/dbcon.php';
                                   date_default_timezone_set("Asia/Calcutta");
                                   $date =date('Y-m-d');
                                   $messid=$_SESSION['messid'];
                                   if(isset($_POST['search']))
                                   { ?>
                                <tbody style="border:2px solid black;padding:10px;"> <?php
                                    $search=mysqli_real_escape_string($con, $_POST['name']);
                                     $find = "SELECT * FROM user WHERE  messid ='$messid' and (name LIKE '$search%' or userid like'$search%' or messtype like '$search%' or time like'$search%') ";
                                     $result = mysqli_query($con,$find);
                                     $email_count = mysqli_num_rows($result);
                                     if($email_count>0)
                                     {
                                     while($row = mysqli_fetch_array($result))
                                       {
                                        ?>  <tr> 
                                        <?php if($row['status']=="Inactive"){ ?>
                                        <th scope="row"  style="color:green;"><?php echo $row['userid'];?></th>
                                        <?php }else { ?>
                                        <th scope="row"><?php echo $row['userid'];?></th>
                                        <?php } ?>

                                        <?php if($row['payment_status']=="Unpaid"){ ?>
                                        <th>
                                            <a data-id='<?php echo $row['userid']; ?>' class="userinfo"
                                            style="text-decoration: none;color:red;"><button>
                                                <?php echo $row['name'];?></button></a>
                                        </th>                                           <?php }else { ?>
                                        <th>
                                            <a data-id='<?php echo $row['userid']; ?>' class="userinfo"
                                            style="text-decoration: none;color:black;"><button>
                                                <?php echo $row['name'];?></button></a>
                                        </th>                 
                                        <?php } ?>
                                        <td><?php echo $row['foodtype'];?></td>
                                        <td><?php echo $row['messtype'];?></td>
                                        <td><?php echo $row['time'];?></td>
                                        <td><?php $r = date('d-m-Y', strtotime($row['start_date'])); echo $r;?></td>                                        
                                        <td><?php $r = date('d-m-Y', strtotime($row['end_date'])); echo $r;?></td>
                                        <td><?php echo $row['point'];?></td>
                                    <td><?php $r=$row['payment'] - $row['paid']; echo $r;?> Rs.</td>
                                       <td>
                                             <a data-id='<?php $r= $row['userid']; echo $r; ?>' class="payment"
                                            style="text-decoration: none;"><button type="button"
                                                class="btn btn-primary">Payment</button></a>    
                                        <a data-id='<?php echo $row['userid']; ?>' class="useredit"
                                            style="text-decoration: none;"><button type="button"
                                                class="btn btn-success"><i class="fa fa-edit" aria-hidden="true"></i>
                                                Edit</button></a>
                                        <?php if($row['point'] == 0 || $row['mstatus'] == "Inactive" ||  $row['end_date'] <= $date) { ?>
                                        <a data-id='<?php echo $row['userid']; ?>' class="userio"
                                            style="text-decoration: none;"><button type="button"
                                                class="btn btn-warning"><i class="fa fa-toggle-on"
                                                    aria-hidden="true"></i>
                                                Enable</button></a>
                                        <?php 
                                            }
                                            ?>
                                    </td>
                                    </tr>
                                    <?php
                                   }}else{
                                     ?>
                                    <tr>
                                        <th scope="row">No Data Found </th>
                                    </tr>
                                    <?php 
                                     }
                                     ?>
                                </tbody> <?php

                                 }
   
                                    $query = "SELECT * FROM user where messid ='$messid' order by id DESC";
                                    $result = mysqli_query($con,$query);
                                    while($row = mysqli_fetch_array($result)){
                                    ?>  <tr> 
                                        <?php if($row['status']=="Inactive"){ ?>
                                        <th scope="row"  style="color:green;"><?php echo $row['userid'];?></th>
                                        <?php }else { ?>
                                        <th scope="row"><?php echo $row['userid'];?></th>
                                        <?php } ?>

                                        <?php if($row['payment_status']=="Unpaid"){ ?>
                                        <th>
                                            <a data-id='<?php echo $row['userid']; ?>' class="userinfo"
                                            style="text-decoration: none;color:red;"><button>
                                                <?php echo $row['name'];?></button></a>
                                        </th>                                        <?php }else { ?>
                                        <th>
                                            <a data-id='<?php echo $row['userid']; ?>' class="userinfo"
                                            style="text-decoration: none;color:black;"><button>
                                                <?php echo $row['name'];?></button></a>
                                        </th>
                                        <?php } ?>
                                    <td><?php echo $row['foodtype'];?></td>
                                    <td><?php echo $row['messtype'];?></td>
                                    <td><?php echo $row['time'];?></td>
                                     <td><?php $r = date('d-m-Y', strtotime($row['start_date'])); echo $r;?></td>                                        
                                     <td><?php $r = date('d-m-Y', strtotime($row['end_date'])); echo $r;?></td>
                                     <td><?php echo $row['point'];?></td>
                                    <td><?php $r=$row['payment'] - $row['paid']; echo $r;?> Rs.</td>
                                    <td>
                                             <a data-id='<?php $r= $row['userid']; echo $r; ?>' class="payment"
                                            style="text-decoration: none;"><button type="button"
                                                class="btn btn-primary">Payment</button></a>    
                                        <a data-id='<?php echo $row['userid']; ?>' class="useredit"
                                            style="text-decoration: none;"><button type="button"
                                                class="btn btn-success"><i class="fa fa-edit" aria-hidden="true"></i>
                                                Edit</button></a>
                                        <?php if($row['point'] == 0 || $row['mstatus'] == "Inactive" ||  $row['end_date'] <= $date) { ?>
                                        <a data-id='<?php echo $row['userid']; ?>' class="userio"
                                            style="text-decoration: none;"><button type="button"
                                                class="btn btn-warning"><i class="fa fa-toggle-on"
                                                    aria-hidden="true"></i>
                                                Enable</button></a>
                                        <?php 
                                            }
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

    <?php include 'afooter.php'?>

<script>
    function openInNewTab() {
        // Define the URL you want to open
        var url = "https://annapurnamess.online/atodayattendance.php";

        // Open the URL in a new tab
        window.open(url, '_blank');
    }
</script>


    <script type='text/javascript'>
    $(document).ready(function() {
        $('.userinfo').click(function() {
            var userid = $(this).data('id');
            $.ajax({
                url: 'amemberpop.php',
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
                    <h5 class="modal-title" id="exampleLabel">Customer Information :</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close" id="clseModal">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                </div>
                <div class="modal-footer">
                </div>
            </div>
        </div>
    </div>

    <script type='text/javascript'>
    $(document).ready(function() {
        $('.userio').click(function() {
            var userid = $(this).data('id');
            $.ajax({
                url: 'amemberadd.php',
                type: 'post',
                data: {
                    userid: userid
                },
                success: function(response) {
                    $('.modal-body2').html(response);
                    $('#addmodal').modal('show');
                }
            });
        });
    });
    </script>
    <div class="modal fade" id="addmodal" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exaLabel">Enable User Start Date and End Date :</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close" id="clsModal">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body2">
                </div>
                <div class="modal-footer">
                </div>
            </div>
        </div>
    </div>
    
     <script type='text/javascript'>
    $(document).ready(function() {
        $('.payment').click(function() {
            var userid = $(this).data('id');
            $.ajax({
                url: 'apayment.php',
                type: 'post',
                data: {
                    userid: userid
                },
                success: function(response) {
                    $('.modal-body2').html(response);
                    $('#changepayment').modal('show');
                }
            });
        });
    });
    </script>
    <div class="modal fade" id="changepayment" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exaLabel">Add User Payment Details:</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close" id="clsModal">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body2">
                </div>
                <div class="modal-footer">
                </div>
            </div>
        </div>
    </div>


    <script type='text/javascript'>
    $(document).ready(function() {
        $('.useredit').click(function() {
            var userid = $(this).data('id');
            $.ajax({
                url: 'amemberedit.php',
                type: 'post',
                data: {
                    userid: userid
                },
                success: function(response) {
                    $('.modal-body2').html(response);
                    $('#eidt').modal('show');
                }
            });
        });
    });
    </script>
    <div class="modal fade" id="eidt" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="example2Label">Edit Customer Information:</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close" id="clsMdal">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body2">
                </div>
                <div class="modal-footer">
                </div>
            </div>
        </div>
    </div>

</body>

</html>
<script>
document.getElementById('clseModal').addEventListener('click', function() {
    location.reload();
});
document.getElementById('clsModal').addEventListener('click', function() {
    location.reload();
});
document.getElementById('clsMdal').addEventListener('click', function() {
    location.reload();
});
</script>

<?php
include "database/dbcon.php";
date_default_timezone_set("Asia/Calcutta");
if(isset($_POST['payment'])){
$userid = mysqli_real_escape_string($con, $_POST['userid']);
$payment =mysqli_real_escape_string($con, $_POST['paid']);
$prevpaid =mysqli_real_escape_string($con, $_POST['prevpaid']);
$fullpayment =mysqli_real_escape_string($con, $_POST['fullpayment']);

$date = date("Y-m-d");
$time = date("h:i:sa");
$spaid = $prevpaid + $payment;
if($fullpayment - $spaid == 0) $new_status ="Paid";
else $new_status ="Unpaid";
$insertquery ="Update user set paid='$spaid',payment_status='$new_status' where userid='$userid' and messid='$messid'";
$iquery = mysqli_query($con, $insertquery);
$insertquery ="insert into payment(userid,messid,payment,date,time) 
            values('$userid','$messid','$payment','$date','$time')";
            $iquery = mysqli_query($con, $insertquery);
            if($iquery)
            {
              ?>
    <script>
    alert("Payment Added sucessfully")
    location.replace("aallmember.php")
    </script>
    <?php
            }else{
                ?>
    <script>
    alert("Payment Not Added !!")
       location.replace("aallmember.php")
    </script>
    <?php
              }
}
if(isset($_POST['update']))
    {
$userid = mysqli_real_escape_string($con, $_POST['userid']);
$act =mysqli_real_escape_string($con, $_POST['act']);
$sdate=mysqli_real_escape_string($con, $_POST['sdate']);
$leave=mysqli_real_escape_string($con, $_POST['leave']);
$act =mysqli_real_escape_string($con, $_POST['act']);
$messtype =mysqli_real_escape_string($con, $_POST['messtype']);
$sdate=mysqli_real_escape_string($con, $_POST['sdate']);
$leave=mysqli_real_escape_string($con, $_POST['leave']);
$paid=mysqli_real_escape_string($con, $_POST['paid']);
$foodtype=mysqli_real_escape_string($con, $_POST['foodtype']);
$messtype=mysqli_real_escape_string($con, $_POST['messtype']);
$messtime=mysqli_real_escape_string($con, $_POST['messtime']);

$date = date("Y-m-d");
$time = date("h:i:sa");


if($act == "New"){
    $edate = date("Y-m-d" ,strtotime($sdate . " +30 days"));
 $mobilequery="select * from signupmess where messid='$messid'";
    $query1 = mysqli_query($con, $mobilequery);
    if($query1)
    {
    $userdata = mysqli_fetch_assoc($query1);
    $messbase = $userdata['monthly'];
    $couponbase = $userdata['coupon'];
    $messbase1 = $userdata['monthly_onetime'];
    $couponbase1 = $userdata['coupon_onetime'];
    $non = $userdata['Non_veg'];
    }
    if($messtime == "Both" && $messtype=="Regular" ){
        $pay = $messbase;  
        $point = 60;
    } 
    else if($messtime == "Both" && $messtype=="Non-Regular" ){
        $pay = $couponbase; 
        $point = 60;
    } 
    else if(($messtime == 'Afternoon' || $messtime == 'Evening') && $messtype=="Regular" ){
        $pay = $messbase1;  
        $point = 30;
    }
    else{
        $pay = $couponbase1; 
        $point = 30;
    } 
    
    if($foodtype=='Non-Veg') $pay= $pay+$non; 
    
    if($time=='Both') $point = 60;
    else $point = 30;
    if($paid==$pay){
        $pstatus ='Paid';
    }else{
        $pstatus ='Unpaid';
    }
    
$insertquery ="insert into payment(userid,messid,payment,date,time) values('$userid','$messid','$paid','$date','$time')";
$iquery = mysqli_query($con, $insertquery);

$sql = "Update user set start_date='$sdate' , end_date='$edate',time='$messtime',messtype='$messtype',foodtype='$foodtype' ,point ='$point',payment='$pay',payment_status='$payment_status',paid='$paid',payment_status='$pstatus',mstatus='Active' where userid='$userid' and messid = '$messid'";
}else{
  $edate = date("Y-m-d" ,strtotime($date . " +$leave days"));
  $sql = "Update user set end_date='$edate' where userid='$userid' and messid = '$messid'";
}
$result1 = mysqli_query($con,$sql);
if($result1)
    {
      ?>
<script>
alert("Information Update sucessfully")
location.replace('aallmember.php')
</script>
<?php
    }else{
      ?>
<script>
alert("Information Not Update")
location.replace('aallmember.php')
</script>
<?php
    }
}

if(isset($_POST['changeinfo']))
{
date_default_timezone_set("Asia/Calcutta");
    $messtime=mysqli_real_escape_string($con, $_POST['messtime']);
    $messtype=mysqli_real_escape_string($con, $_POST['messtype']);
    $name=mysqli_real_escape_string($con, $_POST['name']);
    $email1=mysqli_real_escape_string($con, $_POST['email']);
    $mobile=mysqli_real_escape_string($con, $_POST['mobile']);
    $address=mysqli_real_escape_string($con, $_POST['address']);
    $sdate=mysqli_real_escape_string($con, $_POST['date']);
    $token=mysqli_real_escape_string($con, $_POST['token']);
    $status=mysqli_real_escape_string($con, $_POST['status']);
    $payment_status=mysqli_real_escape_string($con, $_POST['pstatus']);
    $newdate = date('Y-m-d', strtotime($sdate));
    $foodtype=mysqli_real_escape_string($con, $_POST['foodtype']);
    $email= strtolower($email1);
    $date = date("Y-m-d");
    $fullpayment =mysqli_real_escape_string($con, $_POST['fullpayment']);


    $mobilequery="select * from signupmess where messid='$messid'";
    $query1 = mysqli_query($con, $mobilequery);
    if($query1)
    {
    $userdata = mysqli_fetch_assoc($query1);
    $messbase = $userdata['monthly'];
    $couponbase = $userdata['coupon'];
    $messbase1 = $userdata['monthly_onetime'];
    $couponbase1 = $userdata['coupon_onetime'];
    $maddress = $userdata['address'];
    $non = $userdata['Non_veg'];
    $mmobile = $userdata['mobile'];
    $mess = $userdata['mess'];
    $memail = $userdata['email'];
    }
    
     if($messtime == "Both" && $messtype=="Regular" ){
        $pay = $messbase;  
        $point = 60;
    } 
    else if($messtime == "Both" && $messtype=="Non-Regular" ){
        $pay = $couponbase; 
        $point = 60;
    } 
    else if(($messtime == 'Afternoon' || $messtime == 'Evening') && $messtype=="Regular" ){
        $pay = $messbase1;  
        $point = 30;
    }
    else{
        $pay = $couponbase1; 
        $point = 30;
    }
    if($foodtype=='Non-Veg') $pay= $pay+$non; 
    
    if($messtime=='Both') $point = 60;
    else $point = 30;
    
    if( $pay - $fullpayment == 0) $new_status ="Paid";
    else $new_status ="Unpaid";
    
    
    $edate = date("Y-m-d" ,strtotime($newdate . " +30 days"));
    if($edate<$date) $status_mess = 'Inactive';
    else  $status_mess = 'Active';

    if($status=="Inactive"){
        $rand = rand(1000,9999);
        $subject = "$mess Account Activation Req:#$rand";
      $headers = "From: farmagrimitaoe@gmail.com\r\n";
      $headers .= "MTME-Version: 1.0\r\n";
      $headers .= "Content-type: text/html; charset=ISO-8859\r\n";
      $message = "<html>
      <head>
      <title>$mess</title>
      <style>
      h1 {
          text-align: center;
          color:rgb(11, 10, 10);
          font-size: 20px;
          word-break: break-all;
        }
        h2 {
          text-align: center;
          color:rgb(11, 10, 10);
          font-size: 15px;
          word-break: break-all;
        }
        #hiderow,
      .delete {
        display: none;
      }
      /*
         CSS-Tricks Example
         by Chris Coyier
         http://css-tricks.com
      */
      
      * { margin: 0; padding: 0; }
      body { font: 14px/1.4 Georgia, serif; }
      #page-wrap { width: 800px; margin: 0 auto; }
      #header { height: 15px; width: 100%; margin: 20px 0; background: #222; text-align: center; color: white; font: bold 15px Helvetica, Sans-Serif; text-decoration: uppercase; letter-spacing: 2px; padding: 8px 0px; }
      #header1 { height: 2px; width: 100%; margin: 20px 0; background: #222; text-align: center; color: white; font: bold 15px Helvetica, Sans-Serif; text-decoration: uppercase; letter-spacing: 2px; padding: 8px 0px; }
      #address { width: 250px; height: 100px; float: left; }
      #p1 { width: 250px; height: 100px; float: left; }
      #address1 { width: 250px; height: 100px; float: right; }
      #customer { overflow: hidden; }
        </style>
      <body>
              <h1>$mess</h1>
              <h2>Thank you for Using our Mess System</h2>
              <div id='page-wrap'>
              <p id='header'>Account Activation</p>
          <div id='identity'>
          
              <p id='address'>
              $mess<br>
              Email : $memail<br>
              Mobile Number : $mmobile<br>
              Address : $maddress</p>
      
              <p id='address1'>
              Customer Name : $name<br>
              Email : $email<br>
              Mobile Number : $mobile<br>
              Address : $address</p>
          </div>
              </div>
              <div id='page-wrap'>
              <textarea id='header1'>Terms And Conditions.</textarea><br>
              
              <div id='identity'>
              <h2><a href='http://localhost/Mess%20Management/user/aactivation.php?token=$token&&messid=$messid'>Click here</a> to Activate your Account</h2>
             
              </body>
      </html>";
    
                $sender_email ="From: farmagrimitaoe@gmail.com";
    
                if(mail($email, $subject, $message,$headers, $sender_email)){
                }
            }


    $updatequery = "update user set name='$name',foodtype='$foodtype',payment='$pay',point='$point',mobile='$mobile',email='$email',address='$address',messtype='$messtype',time='$messtime',start_date='$newdate',end_date='$edate',mstatus='$status_mess',payment_status='$new_status' where token='$token' and messid='$messid' ";
    $insrt = mysqli_query($con, $updatequery);
    if($insrt){
    ?>
    <script>
    alert("Information Update Successfully ")
    location.replace("aallmember.php")
    </script>
    <?php
    }else{
        ?>
    <script>
    alert("Information Not Update!! ")
    location.replace("aallmember.php")
    </script>
    <?php
    }
 }

?>

