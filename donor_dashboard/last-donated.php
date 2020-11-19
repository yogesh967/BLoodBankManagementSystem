<?php
session_start();
error_reporting(0);
include('../include/connection.php');
if(strlen($_SESSION['did'] AND $_SESSION['dname'])==0)
	{
header('location:../login.php');
}
else{
  if(isset($_POST['submit'])) {
  $id = $_SESSION['did'];
  $donor_name = $_SESSION['dname'];
  $camp_name = mysqli_real_escape_string($conn,trim($_POST['name']));
  $address = mysqli_real_escape_string($conn,trim($_POST['address']));
  $date = mysqli_real_escape_string($conn,trim($_POST['date']));
  $units = mysqli_real_escape_string($conn,trim($_POST['units']));
  $details = mysqli_real_escape_string($conn,trim($_POST['other']));
	$fileName = basename($_FILES["certificate"]["name"]);

  $date_valid = false;

  $sql_d = "SELECT * FROM last_donated WHERE donated_date='$date' AND donor_id='$id'";
  $res_d = mysqli_query($conn, $sql_d);

  if (mysqli_num_rows($res_d) > 0) {
    $error = " Sorry... donated date is already updated by you!";
  }

  else {
    $date_valid = true;
  }

	$pname = rand(1000,10000)."-".$fileName;

      #temporary file name to store file
  $tname = $_FILES["certificate"]["tmp_name"];

       #upload directory path
  $uploads_dir = 'C:/wamp64/www/lifesource/images/certificate';
      #TO move the uploaded file to specific location
  move_uploaded_file($tname, $uploads_dir.'/'.$pname);

  if ($date_valid) {
    $query = "INSERT INTO last_donated (donor_id, donor_name, camp_name, address, donated_date, units, certificate, details)
    VALUES ('$id', '$donor_name', '$camp_name', '$address', '$date', '$units', '$pname', '$details')";
    $query_fire = mysqli_query($conn,$query);

    $query2 = "UPDATE register SET donated_date='$date' WHERE ID='$id'";
    $query_fire2 = mysqli_query($conn,$query2);

    if ($query_fire && $query_fire2) {
      $msg = " Data updated Successfully";
    }

    else {
      $error = " Data NOT updated";
    }
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

						<h2 class="page-title">Last Blood Donated Info</h2>

						<!-- Zero Configuration Table -->
						<div class="card">
							<div class="card-header">FORM FEILD</div>
							<div class="card-body">
							<?php if($error){?><div class="errorWrap"><strong>ERROR</strong>:<?php echo htmlentities($error); ?> </div><?php }
				          else if($msg){?><div class="succWrap"><strong>SUCCESS</strong>:<?php echo htmlentities($msg); ?> </div><?php }?>

                  <form name="donated_form" onsubmit="return Validate_doanted()" action="<?php echo $_SERVER['PHP_SELF']; ?>" enctype="multipart/form-data" method="POST">
                  <table class="table table-borderless">
                    <tbody>
                      <tr>
                        <td class="form-group forminput" width="50%">                                          <!--blood bank Name-->
                        <label for="name">Camp/Hospital/Blood Bank Name<sup>*</sup>
                        </label><br />
                        <input type="text" class="form-control" name="name" placeholder="Enter Camp/Hospital/Blood Bank Name" />
                        <div id="name_error" class="error_label"></div>
                        </td>
                        <td class="form-group forminput">                                          <!--blood bank Name-->
                        <label for="address">Address
                        </label><br />
                        <textarea class="form-control" name="address" placeholder="Enter address"></textarea>
                        </td>
                      </tr>

                      <tr>
                        <td class="form-group forminput" width="50%">                                          <!--blood bank Name-->
                        <label for="date">Date<sup>*</sup>
                        </label><br />
                        <input type="date" class="form-control" name="date" placeholder="Enter date" required />
                        </td>
                        <td class="form-group forminput" width="50%">                                          <!--blood bank Name-->
                        <label for="units">No. of Units<sup>*</sup>
                        </label><br />
                        <input type="text" class="form-control" name="units" placeholder="Enter No. of units" />
                        <div id="units_error" class="error_label"></div>
                        </td>
                      </tr>

                      <tr>
												<td class="form-group forminput">                                          <!--blood bank Name-->
                        <label for="certificate">Donation Certificate<sup>*</sup>
                        </label><br />
                        <input type="file" class="form-control" id="certificate" name="certificate" />
												<div id="certificate_error" class="error_label"></div>
                        </td>
                        <td class="form-group forminput">                                          <!--blood bank Name-->
                        <label for="other">Other Details
                        </label><br />
                        <textarea class="form-control" name="other" placeholder="Enter other details"></textarea>
                        </td>
                      </tr>

                      <tr>
                        <td class="form-group forminput">
                          <input type="submit" name="submit" id="submit" value="Submit" class="btn btn-danger" />
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

  <script type="text/javascript">
  function Validate_doanted() {
    var name1 = document.forms["donated_form"]["name"];
    var units = document.forms["donated_form"]["units"];
		var fileInput = document.getElementById('certificate');
	  var filePath = fileInput.value;
	  var allowedExtensions = /(\.jpg|\.jpeg|\.pdf)$/i;

	  if (filePath != "") {
	    if(!allowedExtensions.exec(filePath)){
	        document.getElementById('certificate_error').innerHTML
	        = 'Please upload file having extensions .jpeg/.jpg/.pdf only.';
	        fileInput.value = '';
	        certificate.focus();
	        return false;
	    }
	  }

		else {
	    document.getElementById('certificate_error').innerHTML
	    = 'Please upload Donation Certificate';
	      certificate.focus();
	      return false;
	  }

    if (name1.value != "")
    {
      if (!name1.value.match(/^[a-zA-Z]+([\s][a-zA-Z]+)*$/)) {
      document.getElementById('name_error').innerHTML
      = 'Please Enter alphabet characters only';
        name1.focus();
        return false;
      }
    }

    else {
      document.getElementById('name_error').innerHTML
      = 'Please enter name';
        name1.focus();
        return false;
    }

  if (units.value == "")
  {
    document.getElementById('units_error').innerHTML
    = 'Please Enter No. of Units';
      units.focus();
      return false;
  }

  if (isNaN(units.value)){
    document.getElementById('units_error').innerHTML
    = 'Please enter Numbers Only!';
      units.focus();
      return false;
    }

    return true();

}

  </script>

</body>
</html>
