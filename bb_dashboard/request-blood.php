<?php
session_start();
error_reporting(0);
include('../include/connection.php');
if(strlen($_SESSION['bbname'] AND $_SESSION['bbid'])==0)
	{
header('location:../login.php');
}
else{
		if(isset($_POST['available_btn'])) {
	  $id = $_POST['request_id'];
		$id2 = $_SESSION['bbid'];
		$query1 = "SELECT * from requestblood WHERE ID='$id' ";
		$query_run1 = mysqli_query($conn,$query1);
		$blood_bank = "SELECT * FROM bbregister WHERE ID='$id2'";
	  $fire_bloodbank =  mysqli_query($conn,$blood_bank);
	  $fetch = mysqli_fetch_array($fire_bloodbank);

		$_SESSION['contact'] = $fetch['contact'];
		$_SESSION['address'] = $fetch['address'];
		$_SESSION['state'] = $fetch['state'];
		$_SESSION['city'] = $fetch['city'];


		foreach ($query_run1 as $row) {


			$mobile = $row['mobile'];
			$name = $row['Cname'];
			$bgroup = $row['bgroup'];
			$bbname = $_SESSION['bbname'];
			$contact = $_SESSION['contact'];
			$address = $_SESSION['address'];
			$state = $_SESSION['state'];
			$city = $_SESSION['city'];

			// Authorisation details.
	$username = "yogeshkarande640@gmail.com";
	$hash = "edd641ec432cfc96b09da62029d51f8f4181487a47c4dec20860b1cb7e0caaf2";

	// Config variables. Consult http://api.textlocal.in/docs for more info.
	$test = "0";

	// Data for text message. This is the text message data.
	$sender = "TXTLCL"; // This is who the message appears to be from.
	$numbers = "$mobile"; // A single number or a comma-seperated list of numbers
	$message = "Hello $name, I am from $bbname. Earlier you have requested for $bgroup Blood Group. So, we would like to inform you that your $bgroup blood group is available. You can contact Asap and reseverd your blood.\nThankyou!!\nContact No: $contact\nAddress: $address $state $city";

	// 612 chars or less
	// A single number or a comma-seperated list of numbers
	$message = urlencode($message);
	$data = "username=".$username."&hash=".$hash."&message=".$message."&sender=".$sender."&numbers=".$numbers."&test=".$test;
	$ch = curl_init('http://api.textlocal.in/send/?');
	curl_setopt($ch, CURLOPT_POST, true);
	curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
	$result = curl_exec($ch); // This is the result from the API
	curl_close($ch);

			}
			if ($result) {
				$msg=" Message send Successfully";
			}

			else {
				$error=" Message NOT send!";
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

            <h2 class="page-title">Patient Request List</h2>

            <div class="card">
              <div class="card-header">Patient Request Info</div>
              <div class="card-body">
								<?php if($error){?><div class="errorWrap"><strong>ERROR</strong>:<?php echo htmlentities($error); ?> </div><?php }
										else if($msg){?><div class="succWrap"><strong>SUCCESS</strong>:<?php echo htmlentities($msg); ?> </div><?php }?>
                <div class="table-responsive">

                  <?php
                  $query = "SELECT * from requestblood WHERE status='1' ORDER BY ID DESC";
                  $query_run = mysqli_query($conn,$query);
                  $cnt=1;
                  ?>

                <table id="zctb" class="table table-bordered table-striped" cellspacing="0" width="100%">
                  <thead>
                   <tr>
                     <th>#</th>
                     <th>Patient Name</th>
                     <th>Gender</th>
                     <th>Blood Group</th>
                     <th>state</th>
                     <th>city</th>
                     <th>Hospital name & address</th>
                     <th>View Details</th>
                     <th>Action</th>
                   </tr>
                  </thead>

                  <tfoot>
                   <tr>
                     <th>#</th>
                     <th>Patient Name</th>
                     <th>Gender</th>
                     <th>Blood Group</th>
                     <th>state</th>
                     <th>city</th>
                     <th>Hospital name & address</th>
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
                      <td><input type="hidden" name="request_id" value="<?php echo $row['ID']; ?>">
                      <?php echo htmlentities($cnt); ?></td>
                      <td><?php echo $row['Pname']; ?></td>
                      <td><?php echo $row['gender']; ?></td>
                      <td><?php echo $row['bgroup']; ?></td>
                      <td><?php echo $row['state']; ?></td>
                      <td><?php echo $row['city']; ?></td>
                      <td><?php echo $row['address']; ?></td>
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
																		<th width="40%">Title</th>
																		<th width="60%">Details</th>
																	</tr>
																	<tr>
																		<td>Doctor's name</td>
																		<td><?php echo $row['Dname']; ?></td>
																	</tr>
																	<tr>
																		<td>Contact name</td>
																		<td><?php echo $row['Cname']; ?></td>
																	</tr>
																	<tr>
																		<td>Email</td>
																		<td><?php echo $row['email']; ?></td>
																	</tr>
																	<tr>
																		<td>Mobile</td>
																		<td><?php echo $row['mobile']; ?></td>
																	</tr>
																	<tr>
																		<td>Message</td>
																		<td><?php echo $row['message']; ?></td>
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
  											<form name="sendmsg" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
  											<input type="hidden" name="request_id" value="<?php echo $row['ID']; ?>">
  											<input type="submit" onclick="return confirm('Do you really want to send message')" name="available_btn" value="Available" class="btn btn-primary" />
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
