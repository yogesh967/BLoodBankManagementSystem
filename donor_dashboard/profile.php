<?php
session_start();
error_reporting(0);
include('../include/connection.php');
if(strlen($_SESSION['did'] AND $_SESSION['dname'])==0)
	{
header('location:../login.php');
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

	<title>Donor Dashboard | Life Source Blood Bank System</title>

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

	<style >

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
            <h2 class="page-title"><?php echo $_SESSION['dname'] ?></h2>

            <!-- Zero Configuration Table -->
            <div class="card">
              <div class="card-header">Profile</div>
              <div class="card-body">

								<?php
								if (isset($_SESSION['did'])) {
									$id = $_SESSION['did'];
									$query = "SELECT * from register WHERE ID='$id' ";
									$query_run = mysqli_query($conn,$query);

									foreach ($query_run as $row) {
								?>
              <table class="table table-bordered">
								<tr>
									<th>Title</th>
									<th>Details</th>
								</tr>

								<tr>
									<td>Name</td>
									<td><?php echo $row['name']; ?></td>
								</tr>
								<tr>
									<td>Email</td>
									<td><?php echo $row['email']; ?></td>
								</tr>
								<tr>
									<td>Date of Birth</td>
									<td><?php echo $row['birth']; ?></td>
								</tr>
								<tr>
									<td>Gender</td>
									<td><?php echo $row['gender']; ?></td>
								</tr>
								<tr>
									<td>Blood Group</td>
									<td><?php echo $row['bgroup']; ?></td>
								</tr>
								<tr>
									<td>Weight</td>
									<td><?php echo $row['weight']; ?></td>
								</tr>
								<tr>
									<td>Phone No.</td>
									<td><?php echo $row['phone']; ?></td>
								</tr>
								<tr>
									<td>Mobile No.</td>
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
              </table>
							<a href="update-profile.php">
							<button type="button" class="btn btn-danger" name="button">Update Profile</button>
							</a>
							</div>
							<?php
								}
							}
							?>

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

  </body>
  </html>
  <?php } ?>
