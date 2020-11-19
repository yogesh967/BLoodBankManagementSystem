<?php
session_start();
error_reporting(0);
include('../include/connection.php');
if(strlen($_SESSION['bbname'] AND $_SESSION['bbid'])==0)
	{
header('location:../login.php');
}
else{
	if(isset($_POST['submit'])) {
  $id = $_SESSION['bbid'];
	$info1 = mysqli_real_escape_string($conn,trim($_POST['info1']));
	$info2 = mysqli_real_escape_string($conn,trim($_POST['info2']));
	$info3 = mysqli_real_escape_string($conn,trim($_POST['info3']));
	$apblood = mysqli_real_escape_string($conn,trim($_POST['apblood']));
	$bpblood = mysqli_real_escape_string($conn,trim($_POST['bpblood']));
	$opblood = mysqli_real_escape_string($conn,trim($_POST['opblood']));
	$anblood = mysqli_real_escape_string($conn,trim($_POST['anblood']));
	$bnblood = mysqli_real_escape_string($conn,trim($_POST['bnblood']));
	$onblood = mysqli_real_escape_string($conn,trim($_POST['onblood']));
	$abpblood = mysqli_real_escape_string($conn,trim($_POST['abpblood']));
	$abnblood = mysqli_real_escape_string($conn,trim($_POST['abnblood']));

	$id_valid = false;

	$sql_id = "SELECT BB_ID FROM blood_stock WHERE BB_ID='$id'";
	$res_id = mysqli_query($conn,$sql_id);

	if (mysqli_num_rows($res_id) > 0) {
		$error = " Already Data Available, if you have to make any changes please click on Update Blood Stock";
	}

	else {
		$id_valid = true;
	}

	if ($id_valid) {
		$query = "INSERT INTO blood_stock (BB_ID, info1, info2, info3, Aptve, Bptve, Optve, Antve, Bntve, Ontve, ABptve, ABntve, status)
		VALUES ('$id', '$info1', '$info2', '$info3', '$apblood', '$bpblood', '$opblood', '$anblood', '$bnblood', '$onblood', '$abpblood', '$abnblood', '1')";
		$query_run = mysqli_query($conn,$query);

		if ($query_run) {
			$msg = " Successfully Submitted";
		}

		else {
			$error = " NOT Submitted";
		}
	}


}
 ?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
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

    .tablehead {
      font-family: 'Segoe UI';
      border-bottom: 1px solid;
      border-color: #8c98ad;
      color: #2b2e42;
      text-align: left;
    }

    sup {
      color : red;
    }

    .forminput label {
      text-align: left;
    }

    .error_label{
      padding-top: 5px;
      color : red;
    }

    .forminput {
      text-align: left;
    }

    .btnsubmit {
      padding: 10px 15px;
      font-size: 14px;
      background-color: #d80427;
      color:#edf2f4;
      border-color: #d80427;
    }

    .btn-default:hover, .btn-default:focus, .btn-default:active, .btn-default.active, .open .dropdown-toggle.btn-default {
      background-color: #ef233b;
      color:#edf2f4;
      border-color: #ef233b;
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

  						<h2 class="page-title">Upload New Blood Stock</h2>

  						<div class="row">
  							<div class="col-md-12">
  								<div class="card">
										<div class="card-header">
                      FORM FIELD
                    </div>
  									<div class="card-body">
                      <?php if($error){?><div class="errorWrap"><strong>ERROR</strong>:<?php echo htmlentities($error); ?> </div><?php }
        				          else if($msg){?><div class="succWrap"><strong>SUCCESS</strong>:<?php echo htmlentities($msg); ?> </div><?php }?>
													<?php
		      								if (isset($_SESSION['bbid'])) {
		      									$id = $_SESSION['bbid'];
		      									$query = "SELECT * from bbregister WHERE ID='$id' ";
		      									$query_run = mysqli_query($conn,$query);

		      									foreach ($query_run as $row) {
		      								?>
                      <div class="table-responsive">
                      <form name="update_profile" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
                      <table class="table table-borderless">
												<thead class="thead-light">
										      <tr>
										        <th width="20%">Blood Group</th>
										        <th>Quantity(Units)</th>
										      </tr>
										    </thead>
                        <tbody>
                          <tr>
                            <td class="form-group forminput">                                          <!--blood bank Name-->
														<textarea hidden class="form-control" name="info1">Name:&nbsp;<?php echo $row['name'];?>&#13;&#10;Address:&nbsp;<?php echo $row['address'];?>&#13;&#10;State:&nbsp;<?php echo $row['state'];?>&nbsp;&nbsp;City:&nbsp;<?php echo $row['city'];?>
														</textarea>
														<textarea hidden name="info2">Contact&nbsp;No.:&nbsp;<?php echo $row['contact'];?>&#13;&#10;Email&nbsp;ID:&nbsp;<?php echo $row['email'];?></textarea>
														<input type="hidden" name="info3" value="<?php echo $row['category'];?>">
													<?php } } ?>
														<label for="apblood">A+<sup>*</sup>
														</label><br />
                            </td>
                            <td class="form-group forminput">                                         <!--password-->
                            <input type="number" class="form-control" name="apblood" placeholder="Enter A+ quantity" required />
                            </td>
                          </tr>
                          <tr>
                            <td class="form-group forminput">                                          <!--blood bank Name-->
                            <label for="bpblood">B+<sup>*</sup>
                            </label><br />
                            </td>
                            <td class="form-group forminput">                                         <!--password-->
                            <input type="number" class="form-control" name="bpblood" placeholder="Enter B+ quantity" required />
														</td>
                          </tr>
													<tr>
                            <td class="form-group forminput">                                          <!--blood bank Name-->
                            <label for="opblood">O+<sup>*</sup>
                            </label><br />
                            </td>
                            <td class="form-group forminput">                                         <!--password-->
                            <input type="number" class="form-control" name="opblood" placeholder="Enter O+ quantity" required />
														</td>
														<tr>
	                            <td class="form-group forminput">                                          <!--blood bank Name-->
	                            <label for="anblood">A-<sup>*</sup>
	                            </label><br />
	                            </td>
	                            <td class="form-group forminput">                                         <!--password-->
	                            <input type="number" class="form-control" name="anblood" placeholder="Enter A- quantity" required />
															</td>
	                          </tr>
														<tr>
	                            <td class="form-group forminput">                                          <!--blood bank Name-->
	                            <label for="bnblood">B-<sup>*</sup>
	                            </label><br />
	                            </td>
	                            <td class="form-group forminput">                                         <!--password-->
	                            <input type="number" class="form-control" name="bnblood" placeholder="Enter B- quantity" required />
															</td>
	                          </tr>
														<tr>
	                            <td class="form-group forminput">                                          <!--blood bank Name-->
	                            <label for="onblood">O-<sup>*</sup>
	                            </label><br />
	                            </td>
	                            <td class="form-group forminput">                                         <!--password-->
	                            <input type="number" class="form-control" name="onblood" placeholder="Enter O- quantity" required />
															</td>
	                          </tr>
														<tr>
	                            <td class="form-group forminput">                                          <!--blood bank Name-->
	                            <label for="abpblood">AB+<sup>*</sup>
	                            </label><br />
	                            </td>
	                            <td class="form-group forminput">                                         <!--password-->
	                            <input type="number" class="form-control" name="abpblood" placeholder="Enter AB+ quantity" required />
															</td>
	                          </tr>
														<tr>
	                            <td class="form-group forminput">                                          <!--blood bank Name-->
	                            <label for="abnblood">AB-<sup>*</sup>
	                            </label><br />
	                            </td>
	                            <td class="form-group forminput">                                         <!--password-->
	                            <input type="number" class="form-control" name="abnblood" placeholder="Enter AB- quantity" required />
															</td>
	                          </tr>
                          </tr>
													<tr>
														<td></td>
														<td></td>
													</tr>
                          <tr>
                            <td class="form-group forminput">
                              <input type="submit" name="submit" value="Submit" class="btn btn-danger">
                            </td>
                            <td></td>
                          </tr>
                      </table>
                    </form>
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
  </body>
</html>
<?php } ?>
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
