<?php
session_start();
error_reporting(0);
include('../include/connection.php');
if(strlen($_SESSION['bbname'] AND $_SESSION['bbid'])==0)
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

						<h2 class="page-title">Update Blood Stock</h2>

						<!-- Zero Configuration Table -->
						<div class="card">
							<div class="card-header">Blood Stock</div>
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

              </div>
                  <?php
                  $id = $_SESSION['bbid'];
                  $query = "SELECT * from blood_stock WHERE BB_ID='$id'";
                  $query_run = mysqli_query($conn,$query);
                  ?>
                  <form action="updatestockcon.php" method="post">
                <table id="zctb" class="table table-bordered table-striped" cellspacing="0" width="100%">
                  <thead>
										<tr style="text-align:center;">
                    <th>Blood group</th>
                    <th>Quantity</th>
                    <th width="25%">Action</th>
										</tr>
									</thead>
									<tfoot>
										<tr style="text-align:center;">
                      <th>Blood group</th>
                      <th>Quantity</th>
                      <th style="text-align:center;">Action</th>
										</tr>
									</tfoot>
									<tbody>
                    <?php
                    foreach ($query_run as $row) {

  									?>
										<tr style="text-align:center;">
                      <td>A+</td>
                      <td>
                        <input type="number" class="form-control" name="Apositive" value="<?php echo $row['Aptve'];?>" placeholder="<?php echo $row['Aptve'];?>" />
                      </td>
                      <td><input type="submit" onclick="return confirm('Do you really want to update this detail')" name="Apost" class="btn btn-primary" value="UPDATE"></td>
										</tr>
                    <tr style="text-align:center;">
                      <td>B+</td>
                      <td>
                      <input type="number" class="form-control" name="Bpositive" value="<?php echo $row['Bptve'];?>" placeholder="<?php echo $row['Bptve'];?>" />
                      </td>
                      <td><input type="submit" onclick="return confirm('Do you really want to update this detail')" name="Bpost" class="btn btn-primary" value="UPDATE"></td>
										</tr>
                    <tr style="text-align:center;">
                      <td>O+</td>
                      <td>
                      <input type="number" class="form-control" name="Opositive" value="<?php echo $row['Optve'];?>" placeholder="<?php echo $row['Optve'];?>" />
                      </td>
                      <td><input type="submit" onclick="return confirm('Do you really want to update this detail')" name="Opost" class="btn btn-primary" value="UPDATE"></td>
										</tr>
                    <tr style="text-align:center;">
                      <td>A-</td>
                      <td>
                      <input type="number" class="form-control" name="Anegative" value="<?php echo $row['Antve'];?>" placeholder="<?php echo $row['Antve'];?>" />
                      </td>
                      <td><input type="submit" onclick="return confirm('Do you really want to update this detail')" name="Anegt" class="btn btn-primary" value="UPDATE"></td>
										</tr>
                    <tr style="text-align:center;">
                      <td>B-</td>
                      <td>
                      <input type="number" class="form-control" name="Bnegative" value="<?php echo $row['Bntve'];?>" placeholder="<?php echo $row['Bntve'];?>" />
                      </td>
                      <td><input type="submit" onclick="return confirm('Do you really want to update this detail')" name="Bnegt" class="btn btn-primary" value="UPDATE"></td>
										</tr>
                    <tr style="text-align:center;">
                      <td>O-</td>
                      <td>
                      <input type="number" class="form-control" name="Onegative" value="<?php echo $row['Ontve'];?>" placeholder="<?php echo $row['Ontve'];?>" />
                      </td>
                      <td><input type="submit" onclick="return confirm('Do you really want to update this detail')" name="Onegt" class="btn btn-primary" value="UPDATE"></td>
										</tr>
                    <tr style="text-align:center;">
                      <td>AB+</td>
                      <td>
                      <input type="number" class="form-control" name="ABpositive" value="<?php echo $row['ABptve'];?>" placeholder="<?php echo $row['ABptve'];?>" />
                      </td>
                      <td><input type="submit" onclick="return confirm('Do you really want to update this detail')" name="ABpost" class="btn btn-primary" value="UPDATE"></td>
										</tr>
                    <tr style="text-align:center;">
                      <td>AB-</td>
                      <td>
                      <input type="number" class="form-control" name="ABnegative" value="<?php echo $row['ABntve'];?>" placeholder="<?php echo $row['ABntve'];?>" />
                      </td>
                      <td><input type="submit" onclick="return confirm('Do you really want to update this detail')" name="ABnegt" class="btn btn-primary" value="UPDATE"></td>
										</tr>
										<?php }

    								?>


									</tbody>
								</table>
              </form>
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
