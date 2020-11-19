<?php
session_start();
error_reporting(0);
include('../include/connection.php');
if(strlen($_SESSION['did'] AND $_SESSION['dname'])==0)
	{
header('location:../login.php');
}
else{
  if (isset($_POST['delete_btn'])) {
    $id = $_POST['donated_id'];

    $query = "DELETE from last_donated WHERE ID='$id'";
    $query_run = mysqli_query($conn,$query);
    if ($query_run) {
      $msg="Data deleted Successfully";
    }

    else {
      $error="Data is NOT Deleted";
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

	<style media="screen">
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

            <h2 class="page-title">List of all blood donations</h2>

            <div class="card">
              <div class="card-header">All blood donations info</div>
              <div class="card-body">
								<?php if($error){?><div class="errorWrap"><strong>ERROR</strong>:<?php echo htmlentities($error); ?> </div><?php }
										else if($msg){?><div class="succWrap"><strong>SUCCESS</strong>:<?php echo htmlentities($msg); ?> </div><?php }?>
                <div class="table-responsive">

                  <?php
                  $id = $_SESSION['did'];
                  $query = "SELECT * from last_donated WHERE donor_id='$id' order by ID DESC";
                  $query_run = mysqli_query($conn,$query);
                  $cnt=1;
                  ?>

                <table id="zctb" class="table table-bordered table-striped" cellspacing="0" width="100%">
                  <thead>
                   <tr>
                     <th>#</th>
                     <th>Camp/Hospital/Blood Bank Name</th>
                     <th>Address</th>
                     <th>Date</th>
                     <th>Units</th>
                     <th>Donation Certificate</th>
                     <th>Details</th>
                     <th>action</th>
                   </tr>
                  </thead>

                  <tfoot>
                   <tr>
                     <th>#</th>
                     <th>Camp/Hospital/Blood Bank Name</th>
                     <th>Address</th>
                     <th>Date</th>
                     <th>Units</th>
                     <th>Donation Certificate</th>
                     <th>Details</th>
                     <th>action</th>
                   </tr>
                 </tfoot>

                 <tbody>
                   <?php
 									if (mysqli_num_rows($query_run) > 0) {
 										while ($row = mysqli_fetch_assoc($query_run)) {
 									?>
 										<tr>
                      <td><input type="hidden" name="donor_id" value="<?php echo $row['ID']; ?>">
                      <?php echo htmlentities($cnt); ?></td>
                      <td><?php echo $row['camp_name']; ?></td>
                      <td><?php echo $row['address']; ?></td>
                      <td><?php echo $row['donated_date']; ?></td>
                      <td><?php echo $row['units']; ?></td>
                      <td><a href="../images/certificate/<?php echo $row['certificate'];?>" target="_blank"><?php echo $row['certificate'];?></td>
                      <td><?php echo $row['details']; ?></td>
                      <td>
  											<form name="delete" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
  											<input type="hidden" name="donated_id" value="<?php echo $row['ID']; ?>">
  											<input type="submit" onclick="return confirm('Do you really want to Delete')" name="delete_btn" value="DELETE" class="btn btn-danger" />
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
	</script>
	<script src="js/main.js"></script>

</body>
</html>
<?php } ?>
