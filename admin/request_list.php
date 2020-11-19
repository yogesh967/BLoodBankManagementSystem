<?php
session_start();
error_reporting(0);
include('include/connection.php');
if(strlen($_SESSION['alogin'])==0)
	{
header('location:index.php');
}
else{
  if(isset($_REQUEST['hidden']))
  	{
  $eid=intval($_GET['hidden']);
  $status="0";
  $sql = "UPDATE requestblood SET Status=:status WHERE ID=:eid";
  $query = $dbh->prepare($sql);
  $query -> bindParam(':status',$status, PDO::PARAM_STR);
  $query-> bindParam(':eid',$eid, PDO::PARAM_STR);
  $query -> execute();

  $msg="Request Hidden Successfully";
  }


  if(isset($_REQUEST['public']))
  	{
  $aeid=intval($_GET['public']);
  $status=1;

  $sql = "UPDATE requestblood SET Status=:status WHERE ID=:aeid";
  $query = $dbh->prepare($sql);
  $query -> bindParam(':status',$status, PDO::PARAM_STR);
  $query-> bindParam(':aeid',$aeid, PDO::PARAM_STR);
  $query -> execute();

  $msg="Request public Successfully";
  }
  if(isset($_REQUEST['del']))
  	{
  $did=intval($_GET['del']);
  $sql = "DELETE from requestblood WHERE ID=:did";
  $query = $dbh->prepare($sql);
  $query-> bindParam(':did',$did, PDO::PARAM_STR);
  $query -> execute();

  $msg="Request deleted Successfully ";
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

						<h2 class="page-title">Patient Request List</h2>

						<!-- Zero Configuration Table -->
						<div class="card">
							<div class="card-header">Patient Request Info</div>
							<div class="card-body">
							<?php if($error){?><div class="errorWrap"><strong>ERROR</strong>:<?php echo htmlentities($error); ?> </div><?php }
				          else if($msg){?><div class="succWrap"><strong>SUCCESS</strong>:<?php echo htmlentities($msg); ?> </div><?php }?>
                <div class="table-responsive">
                <table id="zctb" class="table table-bordered table-striped table-hover" cellspacing="0" width="100%">
                  <thead>
                   <tr>
										 <th>#</th>
                     <th>Patient Name</th>
                     <th>Gender</th>
                     <th>Blood Group</th>
										 <th>Contact Person</th>
										 <th>Contact No.</th>
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
										 <th>Contact Person</th>
										 <th>Contact No.</th>
										 <th>View Details</th>
                     <th>Action</th>
                   </tr>
                 </tfoot>
                 <tbody>
                 <?php $sql = "SELECT * FROM requestblood ORDER BY ID DESC";
                 $query = $dbh -> prepare($sql);
                 $query->execute();
                 $results=$query->fetchAll(PDO::FETCH_OBJ);
                 $cnt=1;
                 if($query->rowCount() > 0)
                 {
                 foreach($results as $result)
                 {				?>
                   <tr>
                     <td><?php echo htmlentities($cnt);?></td>
                     <td><?php echo htmlentities($result->Pname);?></td>
                     <td><?php echo htmlentities($result->gender);?></td>
                     <td><?php echo htmlentities($result->bgroup);?></td>
                     <td><?php echo htmlentities($result->Cname);?></td>
                     <td><?php echo htmlentities($result->mobile);?></td>
										 <td>
											 <button name="view_btn" class="btn btn-default text-primary" data-toggle="modal" data-target="#myModal<?php echo htmlentities($result->ID); ?>">
												 View Details
											 </button>


											 <div class="modal" id="myModal<?php echo htmlentities($result->ID); ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true"tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
																	 <td>Age</td>
																	 <td><?php echo htmlentities($result->age); ?></td>
																 </tr>
																 <tr>
																	 <td>State</td>
																	 <td><?php echo htmlentities($result->state); ?></td>
																 </tr>
																 <tr>
																	 <td>City</td>
																	 <td><?php echo htmlentities($result->city); ?></td>
																 </tr>
																 <tr>
																	 <td>Hospital name & address</td>
																	 <td><?php echo htmlentities($result->address); ?></td>
																 </tr>
																 <tr>
																	 <td>Doctor's name</td>
																	 <td><?php echo htmlentities($result->Dname);; ?></td>
																 </tr>
																 <tr>
																	 <td>Email</td>
																	 <td><?php echo htmlentities($result->email); ?></td>
																 </tr>
																 <tr>
																	 <td>Message</td>
																	 <td><?php echo htmlentities($result->message); ?></td>
																 </tr>
																 <tr>
																	 <td>Date of Posting (YYYY-MM-DD)</td>
																	 <td><?php echo htmlentities($result->date); ?></td>
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
                       <?php if($result->status==1)
 											{?>

 											<a href="request_list.php?hidden=<?php echo htmlentities($result->ID);?>" onclick="return confirm('Do you really want to hiidden this detail')" class="btn btn-primary btn-sm mb-2">Hidden</a><br />
 											<?php } else {?>

 											<a href="request_list.php?public=<?php echo htmlentities($result->ID);?>" onclick="return confirm('Do you really want to Public this detail')" class="btn btn-success btn-sm mb-2">Public</a><br />

 											<?php } ?>
 											<a href="request_list.php?del=<?php echo htmlentities($result->ID);?>" onclick="return confirm('Do you really want to delete this record')" class="btn btn-danger btn-sm">Delete</a>
 											</td>
                   </tr>
                   <?php $cnt=$cnt+1; }} ?>
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
