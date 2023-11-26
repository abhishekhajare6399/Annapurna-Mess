<?php include'uheader.php'?>
<style>
	.breadcrumb-bg {
		background-image: url('<?php echo $bg?>');
}
.feature-bg:after {
	background-image: url('<?php echo $messimage?>');
  position: absolute;
  right: 0;
  top: 0;
  width: 40%;
  height: 100%;
  content: "";
  background-size: cover;
  background-position: center;
  border-top-left-radius: 5px;
  -webkit-box-shadow: 0 0 20px #cacaca;
  box-shadow: 0 0 20px #cacaca;
  border-bottom-left-radius: 5px;
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
					<h1>About Us</h1>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- end breadcrumb section -->

	<!-- featured section -->
	<div class="feature-bg">
		<div class="container">
			<div class="row">
				<div class="col-lg-7">
					<div class="featured-text">
						<h2 class="pb-3">Why <span class="orange-text"><?php echo $mess?></span></h2>
						<div class="row">
							<div class="col-lg-12 col-md-12 mb-4 mb-md-5">
								<div class="list-box d-flex">
									<div class="content">
										<p><?php echo $messabout?></p>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- end featured section -->

	

	<!-- logo carousel -->
	<?php include'ufooter.php'?>


</body>
</html>