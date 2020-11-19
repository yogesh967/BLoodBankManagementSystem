<?php
session_start();
error_reporting(0);
include('../include/connection.php');
if(strlen($_SESSION['alogin'])==0)
	{
header('location:index.php');
}
else{

 ?>
<!doctype html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1">
	<meta name="description" content="">
	<meta name="author" content="">
	<meta name="theme-color" content="#3e454c">

	<title>Admin Dashboard | Life Source Blood Bank System</title>

	<!-- Font awesome -->
	<link href="../css/all.css" rel="stylesheet">
	<!-- Sandstone Bootstrap CSS -->
	<link rel="stylesheet" href="css/bootstrap.min.css">
	<!-- Bootstrap Datatables -->
	<link rel="stylesheet" href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css">
  <link rel="stylesheet" href="https://cdn.datatables.net/1.10.20/css/jquery.dataTables.min.css">
	<!-- Bootstrap social button library -->
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-social/5.1.1/bootstrap-social.css">
	<!-- Bootstrap select -->
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.12/css/bootstrap-select.min.css">
	<!-- Bootstrap file input -->
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-fileinput/5.0.8/css/fileinput.min.css">
	<!-- Awesome Bootstrap checkbox -->
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/awesome-bootstrap-checkbox/1.0.2/awesome-bootstrap-checkbox.css">
	<!-- Admin Stye -->
	<link rel="stylesheet" href="css/style_dashboard.css">

	<!--favicon link-->
	<link rel="apple-touch-icon" sizes="180x180" href="../images/favicon/apple-touch-icon.png">
	<link rel="icon" type="image/png" sizes="32x32" href="../images/favicon/favicon-32x32.png">
	<link rel="icon" type="image/png" sizes="16x16" href="../images/favicon/favicon-16x16.png">
	<link rel="manifest" href="../images/favicon/site.webmanifest">
	<link rel="mask-icon" href="../images/favicon/safari-pinned-tab.svg" color="#5bbad5">
	<meta name="msapplication-TileColor" content="#ffffff">
	<meta name="theme-color" content="#ffffff">
	<style>
	.errorWrap {
	padding: 10px;
	margin: 0 0 20px 0;
	background: #fff;
	border-left: 4px solid #dd3d36;
	-webkit-box-shadow: 0 1px 1px 0 rgba(0,0,0,.1);
	box-shadow: 0 1px 1px 0 rgba(0,0,0,.1);
	text-align: left;
	}
	.succWrap{
	padding: 10px;
	margin: 0 0 20px 0;
	background: #fff;
	border-left: 4px solid #5cb85c;
	-webkit-box-shadow: 0 1px 1px 0 rgba(0,0,0,.1);
	box-shadow: 0 1px 1px 0 rgba(0,0,0,.1);
	text-align: left;
	}
	</style>
</head>

<body>
  <?php include('include/header.php');?>

	<div class="ts-main-content">
		<?php include('include/leftbar.php');?>
		<div class="content-wrapper">
			<div class="container-fluid">

				<div class="row">
					<div class="col-md-12">

						<h2 class="page-title">Update Donor</h2>

						<!-- Zero Configuration Table -->
						<div class="card">
							<div class="card-header">Donors List</div>
							<div class="card-body">
								<?php
		            if(isset($_SESSION['success']) && $_SESSION['success'] !='')
		            {?><div class="succWrap"><?php
		                echo $_SESSION['success'];
		                unset($_SESSION['success']);
		            ?></div>    <?php } ?>

		            <?php
		            if(isset($_SESSION['status']) && $_SESSION['status'] !='')
		            {?><div class="errorWrap"><?php
		                echo $_SESSION['status'];
		                unset($_SESSION['status']);
		            ?></div>          <?php } ?>
                <div class="table-responsive">

									<?php
									$query = "SELECT * from register order by ID DESC";
									$query_run = mysqli_query($conn,$query);
									$cnt=1;
									?>

                <table id="zctb" class="table table-bordered table-striped" cellspacing="0" width="100%">
									<thead>
										<tr>
											<th>#</th>
											<th>Name</th>
											<th>Email</th>
											<th>Date of Birth (MM-DD-YYYY)</th>
											<th>Gender</th>
											<th>Blood Group</th>
											<th>View Details</th>
											<th>Action</th>
										</tr>
									</thead>
									<tfoot>
										<tr>
											<th>#</th>
											<th>Name</th>
											<th>Email</th>
											<th>Date of Birth (MM-DD-YYYY)</th>
											<th>Gender</th>
											<th>Blood Group</th>
											<th>View Details</th>
											<th>Action</th>
										</tr>
									</tfoot>
									<tbody>
									<?php
									if (mysqli_num_rows($query_run) > 0) {
										while ($row = mysqli_fetch_assoc($query_run)) {
									?>
									<tr>
										<td>
										<input type="hidden" name="donor_id" value="<?php echo $row['ID']; ?>">
										<?php echo htmlentities($cnt); ?></td>
										<td><?php echo $row['name']; ?></td>
										<td><?php echo $row['email']; ?></td>
										<td><?php echo $row['birth']; ?></td>
										<td><?php echo $row['gender']; ?></td>
										<td><?php echo $row['bgroup']; ?></td>

										<td>
											<button name="view_btn" class="btn btn-default text-primary" data-toggle="modal" data-target="#myModal<?php echo $row['ID']; ?>">
												View Details
											</button>

											<div class="modal" id="myModal<?php echo $row['ID']; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true"tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
												<div class="modal-dialog" role="document">
													<div class="modal-content">

														<!-- Modal Header -->
														<div class="modal-header">
															<h5 class="modal-title">Details</h5>
															<button type="button" class="close" data-dismiss="modal">&times;</button>
														</div>

														<!-- Modal body -->
														<div class="modal-body" style="text-align:left;">
															<table class="table table-bordered">
																<tr>
																	<th width="45%">Title</th>
																	<th width="55%">Details</th>
																</tr>

																<tr>
																	<td>Age</td>
																	<td><?php echo $row['age']; ?></td>
																</tr>
																<tr>
																	<td>Weight</td>
																	<td><?php echo $row['weight']; ?></td>
																</tr>
																<tr>
																	<td>Phone</td>
																	<td><?php echo $row['phone']; ?></td>
																</tr>
																<tr>
																	<td>Mobile</td>
																	<td><?php echo $row['mobile']; ?></td>
																</tr>
																<tr>
																	<td>Address</td>
																	<td><?php echo $row['address']; ?></td>
																</tr>
																<tr>
																	<td>State</td>
																	<td><?php echo $row['State']; ?></td>
																</tr>
																<tr>
																	<td>City</td>
																	<td><?php echo $row['city']; ?></td>
																</tr>
																<tr>
																	<td>Last Donated Date (YYYY-MM-DD)</td>
																	<td><?php echo $row['donated_date']; ?></td>
																</tr>
															</table>
														</div>
														<!-- Modal footer -->
														<div class="modal-footer">
															<button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
														</div>

													</div>
												</div>
											</div>
										</td>
										<td>
											<form name="update_donor" action="update-dform.php" method="post">
											<input type="hidden" name="update_id" value="<?php echo $row['ID']; ?>">
											<button type="submit" name="update_btn" class="btn btn-primary">
												Update
											</button>
											</form>
										</td>
										</tr>
										<?php
										$cnt=$cnt+1;
									}
								}

								else {
									echo "No Record Found";
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

	<!-- Loading Scripts -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.12/js/bootstrap-select.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>
  <script src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap4.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.3/Chart.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-fileinput/5.0.8/js/fileinput.min.js"></script>
	<script src="js/main.js"></script>

</body>
</html>
<?php } ?>
