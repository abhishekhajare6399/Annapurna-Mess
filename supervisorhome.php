<?php
session_start();
if($_SESSION['messid']==NULL){
        $_SESSION['msg'] ="Login Again !!!";
?>
  <script>
     location.replace('supervisorlogin.php');
  </script>
  <?php
  }else{
  date_default_timezone_set("Asia/Calcutta");
include'./database/dbcon.php';
$messid=$_SESSION['messid'];
$emailquery =" select * from signupmess where messid ='$messid' ";
$query = mysqli_query($con, $emailquery);
$emailcount = mysqli_num_rows($query);
if($emailcount)
{
$userdata = mysqli_fetch_assoc($query);
$name = $userdata['mess'];
$mobile = $userdata['mobile'];
$state = $userdata['state'];
$email = $userdata['email'];
$image = $userdata['image'];
$logo = $userdata['logo'];
$hstatus = $userdata['hstatus'];
$date =date('Y-m-d');

}
?>

<head>
    <title><?php echo $name?></title>
    <link rel="icon" href="<?php echo $logo?>" />
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?php include 'C:\xampp\htdocs\Mess Management\css\style.php'?>
    <?php include 'C:\xampp\htdocs\Mess Management\link\link.php'?>
</head>
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
    <a href="supervisorlogout.php?messid=<?php echo $messid?>"><button class="logout-button">Logout</button></a>

    <div class="content">
        <div class="row" style="padding:10px;">
            <div class="col-sm-8">
                <p style="padding:10px;text-align: left;font-size: 18px;">Today's Attendance : </p>
            </div>

            <div class="col-sm-4">
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
        </div>
        <table class="table">
            <thead style="position: sticky;top: 0;">
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
                                    $search=mysqli_real_escape_string($con, $_POST['name']);
                                 ?>
            <tbody style="border:2px solid black;padding:10px;"> <?php
                            $query = "SELECT * FROM attendance WHERE messid ='$messid' and date='$date' and (name LIKE '$search%' or userid like '$search%' ) order by time DESC";

                                 $result = mysqli_query($con,$query);
                                  $email_count = mysqli_num_rows($result);
                                  if($email_count>0)
                                  {
                                  while($row = mysqli_fetch_array($result))
                                    {
                                  ?>
                <tr>
                    <td><?php echo $row['userid'];?></td>
                    <td><?php echo $row['name'];?></td>
                    <td><?php echo $row['date'];?></td>
                    <td><?php echo $row['time'];?></td>
                </tr>
                <?php
                                }}else{
                                  ?>
                <tr style="border:2px solid black;padding:10px;">
                    <td>No Data Found </td>
                </tr>
                <?php 
                                  }
                                  ?>
            </tbody> <?php
                                }else{
                                $query = "SELECT * FROM attendance where messid ='$messid' and date='$date' order by time DESC";
                                $result = mysqli_query($con,$query);
                                while($row = mysqli_fetch_array($result)){
                                
                                ?>
            <tr>
                <td><?php echo $row['userid'];?></td>
                <td><?php echo $row['name'];?></td>
                <td><?php echo $row['date'];?></td>
                <td><?php echo $row['time'];?></td>
            </tr>
            <?php
                                    }}
                                    ?>
            </tbody>
        </table>
    </div>


</body>

</html>
<?php } ?>