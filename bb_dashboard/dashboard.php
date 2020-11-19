<?php
session_start();
error_reporting(0);
include('include/connection.php');
if(strlen($_SESSION['bbname'] AND $_SESSION['bbid'])==0)
	{
header('location:../login.php');
}
else{
	?>
<!doctype html>
<html lang="en" class="no-js">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1">
	<meta name="description" content="">
	<meta name="author" content="">

	<title>Blood Bank Dashboard | Life Source Blood Bank System</title>

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
</head>

<body>
<?php include('include/header.php');?>

	<div class="ts-main-content">
<?php include('include/leftbar.php');?>
		<div class="content-wrapper">
			<div class="container-fluid">

				<div class="row">
					<div class="col-md-12">

						<h2 class="page-title">Dashboard</h2>

						<div class="row">
							<div class="col-md-12">
								<div class="row">
									<div class="col-md-4">
										<div class="card">
											<div class="card-body text-light" style="background-color: #011627;">
												<div class="stat-panel text-center">
												<?php
												$sql ="SELECT ID from register WHERE status='1'";
												$query = $dbh -> prepare($sql);
												$query->execute();
												$results=$query->fetchAll(PDO::FETCH_OBJ);
												$bg=$query->rowCount();
												?>
													<div class="stat-panel-number h1 "><?php echo htmlentities($bg);?></div>
													<div class="stat-panel-title text-uppercase">Registerd Donors</div>
												</div>
											</div>
											<a href="request-donor.php" class="block-anchor card-footer text-center">Full Detail <i class="fa fa-arrow-right"></i></a>
										</div>
									</div>
									<div class="col-md-4">
										<div class="card">
											<div class="card-body text-light" style="background-color: #F71735;">
												<div class="stat-panel text-center">
													<?php
														$sql1 ="SELECT ID from requestblood WHERE status='1'";
														$query1 = $dbh -> prepare($sql1);;
														$query1->execute();
														$results1=$query1->fetchAll(PDO::FETCH_OBJ);
														$regbd=$query1->rowCount();
														?>
													<div class="stat-panel-number h1 "><?php echo htmlentities($regbd);?></div>
													<div class="stat-panel-title text-uppercase">Patient Request</div>
												</div>
											</div>
											<a href="request-blood.php" class="block-anchor card-footer text-center">Full Detail &nbsp; <i class="fa fa-arrow-right"></i></a>
										</div>
									</div>
									<div class="col-md-4">
										<div class="card">
											<div class="card-body text-light" style="background-color: #FF9F1C;">
												<div class="stat-panel text-center">
													<?php
														$bbid = $_SESSION['bbid'];
														$sql1 ="SELECT ID from reserve_blood WHERE BB_ID=$bbid AND (status=0)";
														$query1 = $dbh -> prepare($sql1);;
														$query1->execute();
														$results1=$query1->fetchAll(PDO::FETCH_OBJ);
														$regbd=$query1->rowCount();
														?>
													<div class="stat-panel-number h1 "><?php echo htmlentities($regbd);?></div>
													<div class="stat-panel-title text-uppercase">Request for Reserve Blood</div>
												</div>
											</div>
											<a href="reserve-blood.php" class="block-anchor card-footer text-center">Full Detail &nbsp; <i class="fa fa-arrow-right"></i></a>
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

	<!-- Loading Scripts -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.12/js/bootstrap-select.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>
	<script src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap4.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.3/Chart.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-fileinput/5.0.8/js/fileinput.min.js"></script>
	</script>
	<script src="js/main.js"></script>

	<script>

	window.onload = function(){

		// Line chart from swirlData for dashReport
		var ctx = document.getElementById("dashReport").getContext("2d");
		window.myLine = new Chart(ctx).Line(swirlData, {
			responsive: true,
			scaleShowVerticalLines: false,
			scaleBeginAtZero : true,
			multiTooltipTemplate: "<%if (label){%><%=label%>: <%}%><%= value %>",
		});

		// Pie Chart from doughutData
		var doctx = document.getElementById("chart-area3").getContext("2d");
		window.myDoughnut = new Chart(doctx).Pie(doughnutData, {responsive : true});

		// Dougnut Chart from doughnutData
		var doctx = document.getElementById("chart-area4").getContext("2d");
		window.myDoughnut = new Chart(doctx).Doughnut(doughnutData, {responsive : true});

	}
	</script>
</body>
</html>
<?php } ?>
