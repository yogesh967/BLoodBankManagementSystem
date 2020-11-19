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
		$bbname = $_SESSION['bbname'];
    $input = mysqli_real_escape_string($conn,trim($_POST['theItems']));
    $fromd = mysqli_real_escape_string($conn,trim($_POST['fromd']));
    $todate = mysqli_real_escape_string($conn,trim($_POST['todate']));
    $details = mysqli_real_escape_string($conn,trim($_POST['details']));
		$fileName = basename($_FILES["upload"]["name"]);

		$pname = rand(1000,10000)."-".$fileName;
	      #temporary file name to store file
	      $tname = $_FILES["upload"]["tmp_name"];
	       #upload directory path
	  $uploads_dir = 'C:/wamp64/www/lifesource/images/certificate';
	      #TO move the uploaded file to specific location
	      move_uploaded_file($tname, $uploads_dir.'/'.$pname);

		$query = "INSERT INTO updatebb_request (ID,bbname,input_name,fromd,todate,details,proof,status)
		VALUES ('$id', '$bbname', '$input', '$fromd', '$todate', '$details', '$pname', '1')";
		$query_run = mysqli_query($conn,$query);

    if ($query_run) {
      $msg="Request submitted Successfully";
    }

    else {
      $error="Request is NOT submitted";
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

		<!--hide display date-->
		<script type="text/javascript" >

            function otherSelect() {
                var other = document.getElementById("otherBox");
                if (document.forms[0].theItems.options[document.forms[0].theItems.selectedIndex].value == "Certificate No.") {
                    other.style.display = "inline-block";
                }
                else {
                    other.style.display = "none";
                }
            }

		</script>

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

		.box{
        color: #fff;
        padding: 20px;
        display: none;
        margin-top: 20px;
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

  						<h2 class="page-title">Request for Update</h2>

  						<div class="row">
  							<div class="col-md-12">
  								<div class="card">
										<div class="card-header">
                      FORM FIELD
                    </div>
  									<div class="card-body">
                      <?php if($error){?><div class="errorWrap"><strong>ERROR</strong>:<?php echo htmlentities($error); ?> </div><?php }
        				          else if($msg){?><div class="succWrap"><strong>SUCCESS</strong>:<?php echo htmlentities($msg); ?> </div><?php }?>

                      <div class="table-responsive">
                      <form name="update_profile" onsubmit="return Validate_profile()" enctype="multipart/form-data" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
                      <table class="table table-borderless">
                        <tbody>
													<tbody>
														<tr>
															<td class="form-group forminput">                     <!--input name-->
															<label for="title">Select Input Name <sup>*</sup>
															</label><br />
															<select class="form-control" name="theItems" id="theItems" onchange="otherSelect()" required>
																	<option selected disabled>Select</option>
															    <option value="Blood Bank Name">Blood Bank Name</option>
															    <option value="Email ID">Email ID</option>
															    <option value="Parent Hospital Name">Parent Hospital Name</option>
															    <option value="Category">Category</option>
																	<option value="Certificate No.">Certificate No.</option>
																	<option value="Component Facility">Component Facility</option>
																	<option value="Apheresis Facility">Apheresis Facility</option>
																	<option value="Website">Website</option>
																	<option value="State">State</option>
																	<option value="City">City</option>
																	<option value="Address">Address</option>
																	<option value="Pin Code">Pin Code</option>
															</select>
															</td>
														</tr>
														<tr id="otherBox" class="form-group forminput" style="display: none;">

															<td>
																<label for="fromd">From Date
																</label>
															<input type="date" name="fromd" class="form-control" /> </td>
															<td>
																<label for="todate">To Date
																</label>
																<input type="date" name="todate" class="form-control" /> </td>
														</tr>

														<tr>
														<td class="form-group forminput">                    <!--details-->
															<label for="state">Details <sup>*</sup>
															</label><br />
															<textarea name="details" class="form-control" placeholder="Enter details" required></textarea>
														</td>
														</tr>

														<tr>
															<td class="form-group forminput">                    <!--upload-->
																<label for="upload">Upload Proof <sup>*</sup>
				                        </label><br />
				                        <input type="file" class="form-control" name="upload" id="upload" required>
				                        <div id="upload_error" class="error_label"></div>
															</td>
														</tr>
														<tr>
															<td></td>
															<td></td>
														</tr>
                          <tr>
                            <td class="form-group forminput">
                              <button type="submit" name="submit" id="submit" class="btn btn-primary">
                                SUBMIT
                              </button>
                              <a href="update-profile.php" class="btn btn-danger">CANCEL</a>
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
<script src="https://code.jquery.com/jquery-1.12.4.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.12/js/bootstrap-select.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap4.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.3/Chart.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-fileinput/5.0.8/js/fileinput.min.js"></script>
<script src="js/main.js"></script>

<!--validation-->
<script type="text/javascript">

function Validate_profile() {
	var certificate = document.forms["update_profile"]["theItems"];
	var fromd = document.forms["update_profile"]["fromd"];
	var todate = document.forms["update_profile"]["todate"];
	var fileInput = document.getElementById('upload');
	var filePath = fileInput.value;
	var allowedExtensions = /(\.jpg|\.jpeg|\.pdf)$/i;

		if(!allowedExtensions.exec(filePath)){
				document.getElementById('upload_error').innerHTML
				= 'Please upload file having extensions .jpeg/.jpg/.pdf only.';
				fileInput.value = '';
				upload.focus();
				return false;
			}

return true;

}
</script>
