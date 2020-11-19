<?php
session_start();
error_reporting(0);
include('../include/connection.php');
if(strlen($_SESSION['alogin'])==0)
	{
header('location:index.php');
}
else{
  if (isset($_POST['submit'])) {
    $id = $_POST['bb_id'];

    $query = "DELETE from updatebb_request WHERE BID='$id'";
    $query_run = mysqli_query($conn,$query);
    if ($query_run) {
      $msg="Deleted Successfully";
    }

    else {
      $error="NOT deleted";
    }
  }
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
  }
  .succWrap{
      padding: 10px;
      margin: 0 0 20px 0;
      background: #fff;
      border-left: 4px solid #5cb85c;
      -webkit-box-shadow: 0 1px 1px 0 rgba(0,0,0,.1);
      box-shadow: 0 1px 1px 0 rgba(0,0,0,.1);
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

						<h2 class="page-title">Manage Blood Bank Update Request</h2>

						<div class="card">
							<div class="card-header">Blood Bank Request List</div>
							<div class="card-body">
                <?php if($error){?><div class="errorWrap"><strong>ERROR</strong>:<?php echo htmlentities($error); ?> </div><?php }
                    else if($msg){?><div class="succWrap"><strong>SUCCESS</strong>:<?php echo htmlentities($msg); ?> </div><?php }?>
							 <div class="table-responsive">
                 <?php
                 $query = "SELECT * from updatebb_request where status=1 ORDER BY BID DESC";
                 $query_run = mysqli_query($conn,$query);
                 $cnt=1;
                 ?>
                <table id="zctb" class="table table-bordered table-striped table-hover" cellspacing="0" width="100%">
									<thead>
										<tr>
										<th>#</th>
                    <th>Blood Bank ID</th>
                    <th>Blood Bank Name</th>
                    <th>Input Field name</th>
                    <th>From Date</th>
                    <th>To Date</th>
                    <th>Details</th>
                    <th>Proof</th>
										<th>Date of Request (YYYY-MM-DD)</th>
										<th>Action</th>
										</tr>
									</thead>
									<tfoot>
										<tr>
                      <th>#</th>
                      <th>Blood Bank ID</th>
                      <th>Blood Bank Name</th>
                      <th>Input Field name</th>
                      <th>From Date</th>
                      <th>To Date</th>
                      <th>Details</th>
                      <th>Proof</th>
											<th>Date of Request (YYYY-MM-DD)</th>
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
                      <input type="hidden" name="bb_id" value="<?php echo $row['BID']; ?>">
                      <?php echo htmlentities($cnt);?></td>
                      <td><?php echo $row['ID'];?></td>
											<td><?php echo $row['bbname'];?></td>
											<td><?php echo $row['input_name'];?></td>
											<td><?php echo $row['fromd'];?></td>
											<td><?php echo $row['todate'];?></td>
											<td><?php echo $row['details'];?></td>
											<td><a href="../images/certificate/<?php echo $row['proof'];?>" target="_blank"><?php echo $row['proof'];?></td>
											<td><?php echo $row['date'];?></td>

										  <td>
                        <form name="update_bb" action="update-bbform.php" method="post">
  											<input type="hidden" name="update_id" value="<?php echo $row['ID']; ?>">
  											<button name="update_btn" class="btn btn-primary btn-sm mb-2">
  												Update
  											</button><br />
  											</form>
                        <form name="delete" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
                          <input type="hidden" name="bb_id" value="<?php echo $row['BID']; ?>">
                          <input type="submit" name="submit" class="btn btn-danger btn-sm" value="Delete" />
                        </form>

											</td>

										</tr>
										<?php $cnt=$cnt+1; }}
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
