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
    $cpname = mysqli_real_escape_string($conn,trim($_POST['cpname']));
    $contact = mysqli_real_escape_string($conn,trim($_POST['contact']));
    $faxno = mysqli_real_escape_string($conn,trim($_POST['faxno']));
    $helpline = mysqli_real_escape_string($conn,trim($_POST['helpline']));

    $query1 = "UPDATE bbregister SET cpname='$cpname', contact='$contact', faxno='$faxno', helpline='$helpline' WHERE ID='$id'";
    $query_run1 = mysqli_query($conn,$query1);
    if ($query_run1) {
      $msg="Data updated Successfully";
    }

    else {
      $error="Data is NOT updated";
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

  						<h2 class="page-title">Update Profile</h2>

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
                      <form name="update_profile" onsubmit="return Validate_profile()" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
                      <table class="table table-borderless">
                        <tbody>
                          <tr>
                            <td class="form-group forminput" width="50%">                                          <!--blood bank Name-->
                            <label for="cpname">Contact Person Name <sup>*</sup>
                            </label><br />
                            <input type="text" class="form-control" name="cpname" value="<?php echo $row['cpname'];?>" placeholder="Enter contact person name" />
                            <div id="name_error" class="error_label"></div>
                            </td>
                            <td class="form-group forminput" width="50%">                                         <!--password-->
                            <label for="contact">Contact No. <sup>*</sup>
                            </label><br />
                            <input type="text" id="contact" class="form-control" name="contact" value="<?php echo $row['contact'];?>" placeholder="Enter contact no." />
                            <div id="contact_error" class="error_label"></div>
                            </td>
                          </tr>
                          <tr>
                            <td class="form-group forminput">                                          <!--blood bank Name-->
                            <label for="faxno">Fax No.
                            </label><br />
                            <input type="text" class="form-control" name="faxno" value="<?php echo $row['faxno'];?>" placeholder="Enter Fax no." />
                            <div id="faxno_error" class="error_label"></div>
                            </td>
                            <td class="form-group forminput">                                         <!--password-->
                            <label for="helpline">Helpline No.
                            </label><br />
                            <input type="text" id="helpline" class="form-control" name="helpline" value="<?php echo $row['helpline'];?>" placeholder="Enter helpline no." />
                            <div id="helpline_error" class="error_label"></div>
                            </td>
                          </tr>
                          <tr>
                            <td class="form-group forminput">
                              <button type="submit" name="submit" id="submit" class="btn btn-primary">
                                UPDATE
                              </button>
                              <a href="profile.php" class="btn btn-danger">CANCEL</a>
                            </td>
                            <td></td>
                          </tr>
                      </table>
                    </form>
                    </div>
                  <?php } } ?>
                    <br />
                    Note<sup>*</sup>: If you have to update any other profile info expect this you need to request admin for changes.<br />
                    Request for update profile to admin<br /><br /> <a href="uppro-byadmin.php" class="btn btn-success">Request for Update</a>
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

<!--validation-->
<script type="text/javascript">
function Validate_profile() {
  var name = document.forms["update_profile"]["cpname"];
  var contact = document.forms["update_profile"]["contact"];
  var faxno = document.forms["update_profile"]["faxno"];
  var helpline = document.forms["update_profile"]["helpline"];

  if (name.value != "")
  {
    if (!name.value.match(/^[a-zA-Z]+([\s][a-zA-Z]+)*$/)) {
    document.getElementById('name_error').innerHTML
    = 'Please Enter alphabet characters only';
      name.focus();
      return false;
    }
  }

  else {
    document.getElementById('name_error').innerHTML
    = 'Please enter contact person name';
      name.focus();
      return false;
  }

  if (contact.value == "")
  {
    document.getElementById('contact_error').innerHTML
    = 'Please Enter contact No.';
      contact.focus();
      return false;
  }

  if (isNaN(contact.value)){
    document.getElementById('contact_error').innerHTML
    = 'Please enter valid contact Number!';
      contact.focus();
      return false;
  }

  if (!contact.value.match(/^\d{10}$/)) {
    document.getElementById('contact_error').innerHTML
    = 'Please enter valid contact Number!';
      contact.focus();
      return false;
  }

  if (isNaN(faxno.value)){
    document.getElementById('faxno_error').innerHTML
    = 'Please enter valid Fax Number!';
      faxno.focus();
      return false;
  }

  if (isNaN(helpline.value)){
    document.getElementById('helpline_error').innerHTML
    = 'Please enter helpline number';
      helpline.focus();
      return false;
  }

return true;

}
</script>
