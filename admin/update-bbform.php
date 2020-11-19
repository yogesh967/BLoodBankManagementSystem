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
    $id = $_POST['bb_id'];
    $name = mysqli_real_escape_string($conn,trim($_POST['name']));
    $password = mysqli_real_escape_string($conn,trim($_POST['password']));
    $email = mysqli_real_escape_string($conn,trim($_POST['email']));
    $Hname = mysqli_real_escape_string($conn,trim($_POST['Hname']));
    $category = mysqli_real_escape_string($conn,trim($_POST['category']));
    $cpname = mysqli_real_escape_string($conn,trim($_POST['cpname']));
    $contact = mysqli_real_escape_string($conn,trim($_POST['contact']));
    $faxno = mysqli_real_escape_string($conn,trim($_POST['faxno']));
    $license = mysqli_real_escape_string($conn,trim($_POST['license']));
    $fromd = $_POST['fromd'];
    $todate = $_POST['todate'];
    $facility1 = mysqli_real_escape_string($conn,trim($_POST['facility1']));
    $facility2 = mysqli_real_escape_string($conn,trim($_POST['facility2']));
    $helpline = mysqli_real_escape_string($conn,trim($_POST['helpline']));
    $website = mysqli_real_escape_string($conn,trim($_POST['website']));
    $state = mysqli_real_escape_string($conn,trim($_POST['state']));
    $city = mysqli_real_escape_string($conn,trim($_POST['city']));
    $address = mysqli_real_escape_string($conn,trim($_POST['address']));
    $pincode = mysqli_real_escape_string($conn,trim($_POST['pincode']));
    $upload = mysqli_real_escape_string($conn,trim($_POST['upload']));

    $query =
    "UPDATE bbregister SET name='$name', password='$password', email='$email', Hname='$Hname', category='$category', cpname='$cpname', contact='$contact', faxno='$faxno', license='$license', fromd='$fromd', todate='$todate', component='$facility1', apheresis='$facility2',
    helpline='$helpline', website='$website', certificate='$upload', state='$state', city='$city', pincode='$pincode' WHERE ID='$id'";
    $query_run = mysqli_query($conn,$query);

    if ($query_run) {

      $_SESSION['success'] = "Your data is updated";
      header("location:update-bb.php");
    }

    else {
      $_SESSION['status'] = "Your data is NOT updated";
      header("location:update-bb.php");
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

    .success {
      color: #399c53;
      font-weight: bold;
      text-align: center;
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

  						<h2 class="page-title">Update Blood Bank</h2>

  						<div class="row">
  							<div class="col-md-12">
  								<div class="card">
										<div class="card-header">
                      FORM FIELD
                    </div>
  									<div class="card-body">
                      <?php
                      if (isset($_POST['update_id'])) {
                        $id = $_POST['update_id'];
                        $query = "SELECT * from bbregister WHERE ID='$id' ";
                        $query_run = mysqli_query($conn,$query);

                        foreach ($query_run as $row) {
                      ?>
                        <div class="table-responsive">
                        <form name="registration" onsubmit="return Validate_register()" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
                        <table class="table table-borderless">
                          <thead>                                                                         <!--Login Information-->
                            <tr class="tablehead">
                              <th>Login Details</th>
                              <th></th>
                            </tr>
                          </thead>
                          <tbody>
                            <tr>
                              <td class="form-group forminput" width="50%">                                          <!--blood bank Name-->
                              <label for="name">Blood Bank Name <sup>*</sup>
                              </label><br />
                              <input type="hidden" name="bb_id" value="<?php echo $row['ID']; ?>">
                              <input type="text" class="form-control" name="name" value="<?php echo $row['name'];?>" placeholder="Enter blood bank name" />
                              <div id="name_error" class="error_label"></div>
                              </td>
                              <td class="form-group forminput" width="50%">                                         <!--password-->
                              <label for="password">Password <sup>*</sup>
                              </label><br />
                              <input type="password" id="password" class="form-control" name="password" value="<?php echo $row['password'];?>" placeholder="Enter password" />
                              <div id="password_error" class="error_label"></div>
                              </td>
                            </tr>
                            <tr>
                              <td class="form-group forminput">                                         <!--Email ID-->
                                <label for="email">Email ID <sup>*</sup>
                                </label><br />
                                <input type="text" id="email" class="form-control" name="email" value="<?php echo $row['email'];?>" placeholder="Enter Email ID" />
                                <div id="email_error" class="error_label"></div>

                              </td>
                              <td>
                              </td>
                            </tr>

                            <tr>
                              <td></td>
                              <td></td>
                            </tr>
                          </tbody>


                            <thead>                                                                   <!--blood bank details-->
                              <tr class="tablehead">
                                <th>Blood Bank Details</th>
                                <th></th>
                              </tr>
                            </thead>

                            <tbody>
                              <tr>
                                <td class="form-group forminput">                                      <!--parent hospital Name-->
                                <label for="Hname">Parent Hospital Name
                                </label><br />
                                <input type="text" class="form-control" name="Hname" value="<?php echo $row['Hname'];?>" placeholder="Enter Parent Hospital name" />
                                <div id="Hname_error" class="error_label"></div>
                                </td>
                                <td class="form-group forminput">                                      <!--category-->
                                  <label for="category">Category <sup>*</sup>
                                  </label><br />
																	<select class="form-control" id="category" name="category">
																		<option value="<?php echo $row['category'];?>"selected><?php echo $row['category'];?></option>
																		<option>Govt.</option>
																		<option>Red Cross</option>
																		<option>Charitable</option>
																		<option>Private</option>
																	</select>
																	<div id="category_error" class="error_label"></div>
                                </td>
                              </tr>
                              <tr>
                                <td class="form-group forminput">                                     <!--contact person name-->
                                <label for="cpname">Contact Person Name <sup>*</sup>
                                </label><br />
                                <input type="text" class="form-control" name="cpname" value="<?php echo $row['cpname'];?>" placeholder="Enter contact person name" />
                                <div id="cpname_error" class="error_label"></div>
                                </td>
                                <td class="form-group forminput">                                     <!--contact no.-->
                                <label for="contact">Contact No. <sup>*</sup>
                                </label><br />
                                <input type="text" id="contact" class="form-control" name="contact" value="<?php echo $row['contact'];?>" placeholder="Enter contact no." />
                                <div id="contact_error" class="error_label"></div>
                                </td>
                              </tr>

                              <tr>
                                <td class="form-group forminput">                                     <!--fax no.-->
                                <label for="faxno">Fax No.
                                </label><br />
                                <input type="text" id="faxno" class="form-control" name="faxno" value="<?php echo $row['faxno'];?>" placeholder="Enter fax no." />
                                <div id="faxno_error" class="error_label"></div>
                                </td>
                                <td class="form-group forminput">                                      <!--license no-->
                                <label for="license">License No <sup>*</sup>
                                </label><br />
                                <input type="text" class="form-control" name="license" value="<?php echo $row['license'];?>" placeholder="Enter License No." />
                                <div id="license_error" class="error_label"></div>
                                </td>
                              </tr>

                              <tr>
                                <td class="form-group forminput">                                      <!--from date-->
                                <label for="fromd">From Date <sup>*</sup>
                                </label><br />
                                <input type="date" id="fromd" class="form-control" name="fromd" value="<?php echo $row['fromd'];?>" placeholder="Enter from Date" required />
                                </td>
                                <td class="form-group forminput">                                       <!--to Date-->
                                <label for="todate">To Date <sup>*</sup>
                                </label><br />
                                <input type="date" id="todate" class="form-control" name="todate" value="<?php echo $row['todate'];?>" placeholder="Enter to Date" required />
                                </td>
                              </tr>

                              <tr>
                                <td class="form-group forminput">                                      <!--Component Facility-->
                                  <label for="facility1">Component Facility
                                  </label><br />
																	<select class="form-control" id="facility1" name="facility1">
																		<option value="<?php echo $row['component'];?>" selected><?php echo $row['component'];?></option>
																		<option>Yes</option>
																		<option>No</option>
																	</select>
																	<div id="facility1_error" class="error_label"></div>
                                </td>
                                <td class="form-group forminput">                                    <!--Apheresis Facility-->
                                  <label for="facility2">Apheresis Facility
                                  </label><br />
																	<select class="form-control" id="facility1" name="facility1">
																		<option value="<?php echo $row['apheresis'];?>" selected><?php echo $row['apheresis'];?></option>
																		<option>Yes</option>
																		<option>No</option>
																	</select>
																	<div id="facility2_error" class="error_label"></div>
                                </td>
                              </tr>

                              <tr>
                                <td class="form-group forminput">                                     <!--helpline no.-->
                                <label for="helpline">Helpline No.
                                </label><br />
                                <input type="text" id="helpline" class="form-control" name="helpline" value="<?php echo $row['helpline'];?>" placeholder="Enter helpline no." />
                                <div id="helpline_error" class="error_label"></div>
                                </td>
                                <td class="form-group forminput">                                     <!--website-->
                                <label for="website">Website
                                </label><br />
                                <input type="url" id="website" class="form-control" name="website" value="<?php echo $row['website'];?>" placeholder="Enter Website URL" />
                                <div id="website_error" class="error_label"></div>
                                </td>
                              </tr>

                              <tr>
                                <td class="form-group forminput">                                   <!--Certificate upload-->
                                  <label for="upload">Enter certificate file name <sup>*</sup>
                                  </label><br />
                                  <input type="text" class="form-control" name="upload" value="<?php echo $row['certificate'];?>" id="upload" placeholder="Enter only file name with extension" />
                                  <div id="upload_error" class="error_label"></div>
                                </td>
                                <td></td>
                              </tr>

                              <tr>
                                <td></td>
                                <td></td>
                              </tr>
                            </tbody>

                            <thead>                                                                   <!--Contact Information-->
                              <tr class="tablehead">
                                <th>Blood Bank Address</th>
                                <th></th>
                              </tr>
                            </thead>

                            <tbody>

                              <tr>
                                <td class="form-group forminput">                                      <!--state-->
                                <label for="state">State <sup>*</sup>
                                </label><br />
                                <input type="text" id="state" class="form-control" name="state" value="<?php echo $row['state'];?>" placeholder="Enter State" />
                                <div id="state_error" class="error_label"></div>
                                </td>
                                <td class="form-group forminput">                                       <!--city-->
                                  <label for="city">City <sup>*</sup>
                                  </label><br />
                                  <input type="text" id="city" class="form-control" name="city" value="<?php echo $row['city'];?>" placeholder="Enter City" />
                                  <div id="city_error" class="error_label"></div>
                                </td>
                              </tr>

                              <tr>
                                <td class="form-group forminput">                                       <!--Address-->
                                <label for="address">Address <sup>*</sup>
                                </label><br />
                                <textarea id="address" class="form-control" name="address" placeholder="Enter Address"><?php echo $row['address'];?></textarea>
                                <div id="address_error" class="error_label"></div>
                                </td>
                                <td class="form-group forminput">                                       <!--pin code-->
                                  <label for="pincode">Pin Code <sup>*</sup>
                                  </label><br />
                                  <input type="text" id="pincode" class="form-control" name="pincode" value="<?php echo $row['pincode'];?>" placeholder="Enter pin code" />
                                  <div id="pincode_error" class="error_label"></div>
                                </td>
                              </tr>

                              <tr>
                                <td></td>
                                <td></td>
                              </tr>

                              <tr>
                                <td class="form-group forminput">
                                  <button type="submit" name="submit" id="submit" class="btn btn-primary">
                                    UPDATE
                                  </button>
                                  <a href="update-bb.php" class="btn btn-danger">CANCEL</a>
                                </td>
                                <td></td>
                              </tr>
                            </tbody>
                        </table>
                        <?php
                          }
                        }
                        ?>

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
<script src="js/main.js"></script>

<!--validation-->
<script type="text/javascript">
function Validate_register() {
  var name = document.forms["registration"]["name"];
  var email = document.forms["registration"]["email"];
  var password = document.forms["registration"]["password"];
  var cpname = document.forms["registration"]["cpname"];
  var contact = document.forms["registration"]["contact"];
  var faxno = document.forms["registration"]["faxno"];
  var license = document.forms["registration"]["license"];
  var helpline = document.forms["registration"]["helpline"];
  var upload = document.forms["registration"]["upload"];
  var state = document.forms["registration"]["state"];
  var city = document.forms["registration"]["city"];
  var address = document.forms["registration"]["address"];
  var pincode = document.forms["registration"]["pincode"];

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
    = 'Please enter blood bank name';
      name.focus();
      return false;
  }


  if (password.value == "")
  {
    document.getElementById('password_error').innerHTML
    = 'Please Enter password';
      password.focus();
      return false;
  }

  if (email.value == "")
  {
    document.getElementById('email_error').innerHTML
    = 'Please Enter email';
      email.focus();
      return false;
  }

  var x=document.registration.email.value;
  var atposition=x.indexOf("@");
  var dotposition=x.lastIndexOf(".");
  if (atposition<1 || dotposition<atposition+2 || dotposition+2>=x.length){
    document.getElementById('email_error').innerHTML
      = 'Please enter valid Email!';
    email.focus();
    return false;
  }

  if (cpname.value != "")
  {
    if (!cpname.value.match(/^[a-zA-Z]+([\s][a-zA-Z]+)*$/)) {
    document.getElementById('cpname_error').innerHTML
    = 'Please Enter alphabet characters only';
      cpname.focus();
      return false;
    }
  }

  else {
    document.getElementById('cpname_error').innerHTML
    = 'Please enter contact person name';
      cpname.focus();
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

  if (license.value == "")
  {
    document.getElementById('license_error').innerHTML
    = 'Please Enter license number';
      license.focus();
      return false;
  }

  if (isNaN(helpline.value)){
    document.getElementById('helpline_error').innerHTML
    = 'Please enter helpline number';
      helpline.focus();
      return false;
  }

  if (upload.value == "")
  {
    document.getElementById('upload_error').innerHTML
    = 'Please Enter certificate file name';
      upload.focus();
      return false;
  }

  if(state.selectedIndex==0)
  { document.getElementById('state_error').innerHTML
  = 'Please select state';
  state.focus();
  return false;
  }

  if(city.selectedIndex==0)
  { document.getElementById('city_error').innerHTML
  = 'Please select city';
  city.focus();
  return false;
  }

  if (address.value == "")
  {
    document.getElementById('address_error').innerHTML
    = 'Please Enter Address';
      address.focus();
      return false;
  }

  if (pincode.value == "")
  {
    document.getElementById('pincode_error').innerHTML
    = 'Please Enter pin code';
      pincode.focus();
      return false;
  }

  if (isNaN(pincode.value)){
    document.getElementById('pincode_error').innerHTML
    = 'Please enter valid pin code!';
      pincode.focus();
      return false;
  }

}
</script>
