<?php include'uheader.php'?>
<style>
.container1 {
    width: 1100px; /* Set the width of your container */
    height: auto; /* Set the height of your container */
    overflow: auto;
    padding:20px;
    background-color:white;
}
.hero-bg {
  background-image: url('<?php echo $bg?>');
  background-size: cover;
  background-position: center;
  background-attachment: fixed;
}

@media (max-width: 786px) {
        .container1 {
          width: 300px; /* Set the width of your container */
          height: auto;
          overflow: auto;
 /* Set the height of your container */
      }}
</style>

<div class="hero-area hero-bg">
		<div class="container">
			<div class="row">
				<div class="col-lg-12 offset-lg-0 text-center">
					<div class="hero-text">
						<div class="hero-text-tablecell">

                        <div class="container1">
                        <table class="table">
                                <thead style="background-color:DodgerBlue;position: sticky;top: 0;">
                                    <tr>
                                        <th scope="col">Customer ID :</th>
                                        <th scope="col">Mess ID :</th>
                                        <th scope="col">Day :</th>
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

                                    $query = "SELECT * FROM attendance where messid ='$messid' and userid='$userid' order by date DESC";
                                    $result = mysqli_query($con,$query);
                                    while($row = mysqli_fetch_array($result)){
                                      ?>
                                    <tr>
                                        <th scope="row"><?php echo $row['userid'];?></th>
                                        <th scope="row"><?php echo $row['messid'];?></th>
                                        <td><?php echo $row['day'];?></td>
                                        <td><?php echo $row['date'];?></td>
                                        <td><?php echo $row['time'];?></td>
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
<?php include 'ufooter.php'?>