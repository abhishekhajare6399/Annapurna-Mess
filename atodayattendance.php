<?php include'asession.php'?>
<?php include'ahead.php';
include'database/dbcon.php';
  date_default_timezone_set("Asia/Calcutta");
  $date =date('Y-m-d');
?>

<style>
body {
    font-family: Arial, sans-serif;
}

.header {
    background-color: #333;
    color: white;
    padding: 10px;
    text-align: center;
}

.content {
    padding: 20px;
}

.table {
    width: 100%;
    border-collapse: collapse;
}

.table,
.table th,
.table td {
    border: 1px solid #ddd;
}

.table th,
.table td {
    padding: 10px;
    text-align: left;
}

.table tr:nth-child(even) {
    background-color: #f2f2f2;
}

.table th {
    background-color: #333;
    color: white;
}

.logout-button {
    float: right;
    background-color: #333;
    color: white;
    border: none;
    padding: 10px 20px;
    margin: 10px;
    border-radius: 5px;
    cursor: pointer;
}
</style>
</head>

<body>

    <div class="header">
        <h1><?php echo $name?></h1>
    </div>

    <div class="content">
        <div class="row" style="padding:10px;">
            <div class="col-sm-8">
                <p style="padding:10px;text-align: left;font-size: 18px;">Today's Attendance : </p>
            </div>

            <div class="col-sm-3">
                <div style="text-align: right;">
                    <form action="" method="POST">
                        <div class="input-group">
                            <input type="text" name="name" class="form-control" placeholder="Enter Customer Name">
                            <span class="input-group-btn">
                                <button class="btn btn-primary" type="submit" name="search_date">
                                    Search
                                </button>
                            </span>
                        </div>
                    </form>
                </div>
            </div>
            <a href="atodayattendance.php"><button class="btn btn-default">Reset</button></a>
        </div>
        <table class="table">
            <thead style="position: sticky;top: 0;">
                <tr>
                    <th scope="col">Customer ID</th>
                    <th scope="col">Customer Name</th>
                    <th scope="col">Food Type</th>
                    <th scope="col">Mess Type</th>
                    <th scope="col">Mess Time</th>
                    <th scope="col">End Date</th>
                    <th scope="col">Payment Remaining</th>
                    <th scope="col">Date</th>
                    <th scope="col">Time</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                <?php
                                $messid=$_SESSION['messid'];
                                if(isset($_POST['search_date'])){
                                    $search=mysqli_real_escape_string($con, $_POST['name']);
                                 ?>
            <tbody style="border:2px solid black;padding:10px;"> <?php
                            $query = " SELECT attendance.userid,user.name,attendance.time as time,attendance.messid, attendance.date,user.messtype,user.time as ti,user.start_date,user.end_date,user.payment,user.paid,user.foodtype FROM attendance  inner join user on user.userid=attendance.userid WHERE attendance.messid ='$messid' and Accept_status='0' and attendance.date='$date' and (attendance.name LIKE '$search%' or attendance.userid like '$search%' ) order by time DESC";

                                 $result = mysqli_query($con,$query);
                                  $email_count = mysqli_num_rows($result);
                                  if($email_count>0)
                                  {
                                  while($row = mysqli_fetch_array($result))
                                    {
                                  ?>
                <tr>
              <?php if($row['payment']-$row['paid']!=0) { ?>
                    <td style=color:red;><?php echo $row['userid'];?></td>
                    <td style=color:red;><?php echo $row['name'];?></td>
                    <?php } else{ ?>
                    <td><?php echo $row['userid'];?></td>
                    <td><?php echo $row['name'];?></td>
                    <?php } ?>
                    <td><?php echo $row['foodtype'];?></td>
                    <td><?php echo $row['messtype'];?></td>
                    <td><?php echo $row['ti'];?></td>
                    <td><?php $r = date('d-m-Y', strtotime($row['end_date'])); echo $r;?></td>                    
                    <td><?php $r=$row['payment']-$row['paid']; echo $r;?> Rs.</td>
                    <td><?php $r = date('d-m-Y', strtotime($row['date'])); echo $r;?> </td>
                    <td><?php echo $row['time'];?></td>
                    <td><form action="" method="POST">
                        <div class="input-group">
                            <input type="hidden" name="<?php echo $row['userid'];?><" class="form-control" >
                            <button type="submit" name="Accept" class="btn btn-warning">Accept</button>
                        </div>
                    </form></td>
                    
                </tr>
                <?php }  }else{
                                  ?>
                <tr style="border:2px solid black;padding:10px;">
                    <td>No Data Found </td>
                </tr>
                <?php } ?>
            </tbody> <?php }else{
                                $query = "
                                SELECT attendance.userid,user.name,attendance.time as time,attendance.messid, attendance.date,user.messtype,user.time as ti,user.start_date,user.end_date,user.payment,user.paid,user.foodtype FROM attendance  inner join user on user.userid=attendance.userid WHERE attendance.messid ='$messid' and Accept_status='0' and attendance.date='$date' order by time DESC";
                                $result = mysqli_query($con,$query);
                                while($row = mysqli_fetch_array($result)){
                                
                                ?>
            <tr>
              <?php if($row['payment']-$row['paid']!=0) { ?>
                    <td style=color:red;><?php echo $row['userid'];?></td>
                    <td style=color:red;><?php echo $row['name'];?></td>
                    <?php } else{ ?>
                    <td><?php echo $row['userid'];?></td>
                    <td><?php echo $row['name'];?></td>
                    <?php } ?>
                    <td><?php echo $row['foodtype'];?></td>
                    <td><?php echo $row['messtype'];?></td>
                    <td><?php echo $row['ti'];?></td>
                    <td><?php $r = date('d-m-Y', strtotime($row['end_date'])); echo $r;?></td>                    
                    <td><?php $r=$row['payment']-$row['paid']; echo $r;?> Rs.</td>
                    <td><?php $r = date('d-m-Y', strtotime($row['date'])); echo $r;?> </td>
                    <td><?php echo $row['time'];?></td>
                <td><form action="" method="POST">
                        <div class="input-group">
                            <input type="hidden" name="userid" value="<?php echo $row['userid'];?>" class="form-control" >
                            <button  type="submit" name="Accept" class="btn btn-warning">Accept</button>
                        </div>
                    </form></td>
            </tr>
            <?php
                                    }}
                                    ?>
            </tbody>
        </table>
    </div>


</body>

</html>
<?php
if(isset($_POST['Accept']))
    {
    date_default_timezone_set("Asia/Calcutta");
    $time1 = date("h:i:s");
    $userid=mysqli_real_escape_string($con, $_POST['userid']);
    $messid=$_SESSION['messid'];

    $enter = "update attendance set Accept_status='1' where messid = '$messid' and userid='$userid'";
    $iquery = mysqli_query($con, $enter);

    if($iquery)
    {
      ?>
    <script>
    alert("Accept sucessfully")
    location.replace('atodayattendance.php')
    </script>
    <?php
    }
    }
    ?>
