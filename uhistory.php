<?php include'uheader.php'?>
<style>
	.breadcrumb-bg {
		background-image: url('<?php echo $bg?>');
}

	</style>
	<!-- end search arewa -->
	
	<!-- breadcrumb-section -->
	<div class="breadcrumb-section breadcrumb-bg">
		<div class="container">
			<div class="row">
				<div class="col-lg-8 offset-lg-2 text-center">
					<div class="breadcrumb-text">
					<h3 style="color:white;">Welcome <?php echo $name?></h3>
					<h1>History Attendance</h1>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- end breadcrumb section -->

	<!-- featured section -->
		<div class="container">
                        <table class="table">
                                <thead style="background-color:DodgerBlue;position: sticky;top: 0;">
                                    <tr>
                                        <th scope="col">Payment :</th>
                                        <th scope="col">Date :</th>
                                        <th scope="col">Time :</th>
                                    </tr>
                                </thead>
                                <tbody>

                                    <?php
                                    include'database/dbcon.php';
                                    date_default_timezone_set("Asia/Calcutta");
                                    $stdate =date('Y-m-d');
                                    $messid=$_SESSION['messid'];
                                    $userid=$_SESSION['userid'];
                                    $ltdate = date("Y-m-d" ,strtotime($stdate . " - 30 days"));

                                    $query = "SELECT * FROM payment where messid ='$messid' and userid='$userid' order by date DESC";
                                    $result = mysqli_query($con,$query);
                                    while($row = mysqli_fetch_array($result)){
                                      ?>
                                    <tr>
                                        <th scope="row"><?php echo $row['payment'];?></th>
                                        <td><?php echo $row['date'];?></td>
                                        <td><?php echo $row['time'];?></td>
                                    </tr>
                                    <?php
                                    }
                                    ?>
                                </tbody>
                            </table>

                            </div>
		
	<!-- end featured section -->

	

	<!-- logo carousel -->
	<?php include'ufooter.php'?>


</body>
</html>