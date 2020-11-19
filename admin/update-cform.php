<?php
session_start();
error_reporting(0);
include('../include/connection.php');
if(strlen($_SESSION['alogin'])==0)
	{
header('location:index.php');
}
else{
	if(isset($_POST['submit'])) {
	$id = $_POST['camp_id'];
	$title = mysqli_real_escape_string($conn,trim($_POST['title']));
	$organised = mysqli_real_escape_string($conn,trim($_POST['organised']));
	$state = mysqli_real_escape_string($conn,trim($_POST['state']));
	$city = mysqli_real_escape_string($conn,trim($_POST['city']));
	$mobile = mysqli_real_escape_string($conn,trim($_POST['mobile']));
	$date = mysqli_real_escape_string($conn,trim($_POST['date']));
	$address = mysqli_real_escape_string($conn,trim($_POST['address']));
	$details = mysqli_real_escape_string($conn,trim($_POST['details']));

	$query = "UPDATE bloodcamp SET title='$title', organised='$organised', state='$state', city='$city', mobile='$mobile', address='$address', campdate='$date', details='$details' WHERE ID='$id'";
	$query_run1 = mysqli_query($conn,$query);

  if ($query_run1) {

    $_SESSION['success'] = "Your data is updated";
    header("location:update-camp.php");
  }

  else {
    $_SESSION['status'] = "Your data is NOT updated";
    header("location:update-camp.php");
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

							<h2 class="page-title">Update Blood Camp</h2>

							<div class="row">
								<div class="col-md-12">
									<div class="card">
										<div class="card-header">
											FORM FIELD
										</div>
										<div class="card-body">
											<form name="update_camp" onsubmit="return Validate_camp()" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
												<div class="table-responsive">
													<?php
													if (isset($_POST['update_id'])) {
														$id = $_POST['update_id'];
														$query = "SELECT * from bloodcamp WHERE ID='$id' ";
														$query_run = mysqli_query($conn,$query);

														foreach ($query_run as $row) {
													?>
													<table class="table table-borderless">
	                          <tbody>
	                            <tr>
	                              <td class="form-group forminput">                     <!--patient Name-->
	                              <label for="title">Camp Title <sup>*</sup>
	                              </label><br />
																<input type="hidden" name="camp_id" value="<?php echo $row['ID']; ?>">
	                              <input type="text" class="form-control" name="title" value="<?php echo $row['title']; ?>" placeholder="Enter Camp Title" />
	                              <div id="title_error" class="error_label"></div>
	                              </td>
	                              <td class="form-group forminput">                     <!--patient Name-->
	                              <label for="organised">Organised By <sup>*</sup>
	                              </label><br />
	                              <input type="text" class="form-control" name="organised" value="<?php echo $row['organised']; ?>" placeholder="Enter organised by" />
	                              <div id="oraganised_error" class="error_label"></div>
	                              </td>
	                            </tr>

															<tr>
																<td class="form-group forminput">                    <!--Mobile no-->
	                                <label for="date">Date of Camp <sup>*</sup>
	                                </label><br />
	                                <input type="date" class="form-control" name="date" value="<?php echo $row['campdate']; ?>" required />
	                              </td>
	                              <td class="form-group forminput">                    <!--Mobile no-->
	                                <label for="mobile">Mobile No <sup>*</sup>
	                                </label><br />
	                                <input type="text" class="form-control" name="mobile" value="<?php echo $row['mobile']; ?>" placeholder="Enter Mobile No." />
	                                <div id="mobile_error" class="error_label"></div>
	                              </td>
	                            </tr>

	                            <tr>
	                            <td class="form-group forminput">                    <!--state-->
	                              <label for="state">State <sup>*</sup>
	                              </label><br />
																<input type="text" class="form-control" name="state" value="<?php echo $row['state']; ?>" placeholder="Enter state" />
	                              <div id="state_error" class="error_label"></div>
	                            </td>
	                            <td class="form-group forminput">                      <!--city-->
	                              <label for="city">City <sup>*</sup>
	                              </label><br />
																<input type="text" class="form-control" name="city" value="<?php echo $row['city']; ?>" placeholder="Enter city" />
	                              <div id="city_error" class="error_label"></div>
	                            </td>
	                            </tr>

	                            <tr>
																<td class="form-group forminput">                     <!--hospital name & Address-->
																<label for="address">Address <sup>*</sup>
																</label><br />
																<textarea id="address" class="form-control" name="address" placeholder="Enter Address"><?php echo $row['address']; ?></textarea>
																<div id="address_error" class="error_label"></div>
																</td>
	                              <td class="form-group forminput">                     <!--hospital name & Address-->
	                              <label for="details">Any Details
	                              </label><br />
	                              <textarea id="details" class="form-control" name="details" placeholder="Enter any details"><?php echo $row['details']; ?></textarea>
	                              <div id="details_error" class="error_label"></div>
	                              </td>
	                            </tr>
	                              <tr>
	                                <td class="form-group forminput">
																		<button type="submit" name="submit" id="submit" class="btn btn-primary">
																			UPDATE
																		</button>
																		<a href="update-camp.php" class="btn btn-danger">CANCEL</a>
	                                </td>
	                                <td></td>
	                              </tr>
	                            </tbody>
	                        </table>
													<?php
	                          }
	                        }
	                        ?>
	                      </div>
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
	<script src="js/main.js"></script>

	<!--Validation-->
	<script type="text/javascript">
	function Validate_camp() {
	var title = document.forms["update_camp"]["title"];
	var organised = document.forms["update_camp"]["organised"];
	var state = document.forms["update_camp"]["state"];
	var city = document.forms["update_camp"]["city"];
	var mobile = document.forms["update_camp"]["mobile"];
	var address = document.forms["update_camp"]["address"];

	if (title.value == "")
	{
	  document.getElementById('title_error').innerHTML
	  = 'Please Enter camp title';
	    title.focus();
	    return false;
	}

	if (organised.value == "")
	{
	  document.getElementById('oraganised_error').innerHTML
	  = 'Please Enter organised by';
	    organised.focus();
	    return false;
	}

	if (state.value != "")
	{
		if (!state.value.match(/^[a-zA-Z]+([\s][a-zA-Z]+)*$/)) {
		document.getElementById('state_error').innerHTML
		= 'Please Enter alphabet characters only';
			state.focus();
			return false;
		}
	}

	else {
		document.getElementById('state_error').innerHTML
		= 'Please enter state';
			state.focus();
			return false;
	}

	if (city.value != "")
	{
		if (!city.value.match(/^[a-zA-Z]+([\s][a-zA-Z]+)*$/)) {
		document.getElementById('city_error').innerHTML
		= 'Please Enter alphabet characters only';
			city.focus();
			return false;
		}
	}

	else {
		document.getElementById('city_error').innerHTML
		= 'Please enter city';
			city.focus();
			return false;
	}

	if (mobile.value == "")
	{
	  document.getElementById('mobile_error').innerHTML
	  = 'Please Enter Mobile No.';
	    mobile.focus();
	    return false;
	}

	if (isNaN(mobile.value)){
	  document.getElementById('mobile_error').innerHTML
	  = 'Please enter valid mobile Number!';
	    mobile.focus();
	    return false;
	  }

	if (!mobile.value.match(/^\d{10}$/)) {
	  document.getElementById('mobile_error').innerHTML
	  = 'Please enter valid mobile Number!';
	    mobile.focus();
	    return false;
	}

	if (address.value == "")
	{
	  document.getElementById('address_error').innerHTML
	  = 'Please Enter Address';
	    address.focus();
	    return false;
	}


	return true;
	}
	</script>
