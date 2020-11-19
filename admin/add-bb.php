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
    $name = mysqli_real_escape_string($conn,trim($_POST['name']));
    $password = mysqli_real_escape_string($conn,trim($_POST['password']));
    $email = mysqli_real_escape_string($conn,trim($_POST['email']));
    $Hname = mysqli_real_escape_string($conn,trim($_POST['Hname']));
    $category = $_POST['category'];
    $cpname = mysqli_real_escape_string($conn,trim($_POST['cpname']));
    $contact = mysqli_real_escape_string($conn,trim($_POST['contact']));
    $faxno = mysqli_real_escape_string($conn,trim($_POST['faxno']));
    $license = mysqli_real_escape_string($conn,trim($_POST['license']));
    $fromd = $_POST['fromd'];
    $todate = $_POST['todate'];
    $facility1 = $_POST['facility1'];
    $facility2 = $_POST['facility2'];
    $helpline = mysqli_real_escape_string($conn,trim($_POST['helpline']));
    $website = mysqli_real_escape_string($conn,trim($_POST['website']));
    $state = $_POST['state'];
    $city = $_POST['city'];
    $address = mysqli_real_escape_string($conn,trim($_POST['address']));
    $pincode = mysqli_real_escape_string($conn,trim($_POST['pincode']));
    $fileName = basename($_FILES["upload"]["name"]);


    $msg="";
    $email_valid = $contact_valid = $license_valid = false;

    $sql_e = "SELECT email FROM bbregister WHERE email='$email'";
    $sql_m = "SELECT contact FROM bbregister WHERE contact='$contact'";
    $sql_l = "SELECT license FROM bbregister WHERE license='$license'";
    $res_e = mysqli_query($conn, $sql_e);
    $res_m = mysqli_query($conn, $sql_m);
    $res_l = mysqli_query($conn, $sql_l);

    if (mysqli_num_rows($res_e) > 0) {
      $error = "Sorry... email already registered, Try another";
    }

    else {
      $email_valid = true;
    }

    if (mysqli_num_rows($res_m) > 0) {
      $error = "Sorry... mobile No. already registered, Try another";
    }

    else {
      $mobile_valid = true;
    }

    if (mysqli_num_rows($res_l) > 0) {
      $error = "Sorry... License No. already registered, Try another";
    }

    else {
      $license_valid = true;
    }


    $pname = rand(1000,10000)."-".$fileName;

        #temporary file name to store file
        $tname = $_FILES["upload"]["tmp_name"];

         #upload directory path
    $uploads_dir = '../images/certificate';
        #TO move the uploaded file to specific location
        move_uploaded_file($tname, $uploads_dir.'/'.$pname);



    if ($email_valid && $mobile_valid && $license_valid) {
      $query = "INSERT INTO bbregister (name,password,email,Hname,category,cpname,contact,faxno,license,fromd,todate,component,apheresis,helpline,website,certificate,state,city,address,pincode,user,status)
      VALUES ('$name','$password','$email','$Hname','$category','$cpname','$contact','$faxno','$license','$fromd','$todate','$facility1','$facility2','$helpline','$website','$pname','$state','$city','$address',
        '$pincode','bloodbank','1')";

      $fire = mysqli_query($conn,$query);
      if ($fire) {
        $msg = "Successfully Registered";
      }

			else {
				$error = "registration FAIL";
			}
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

  						<h2 class="page-title">Add Blood Bank</h2>

  						<div class="row">
  							<div class="col-md-12">
  								<div class="card">
										<div class="card-header">
                      Form Field
                    </div>
  									<div class="card-body">
											<?php if($error){?><div class="errorWrap"><strong>ERROR</strong>:<?php echo htmlentities($error); ?> </div><?php }
													else if($msg){?><div class="succWrap"><strong>SUCCESS</strong>:<?php echo htmlentities($msg); ?> </div><?php }?>
                      <form name="registration" onsubmit="return Validate_register()" action="<?php echo $_SERVER['PHP_SELF']; ?>" enctype="multipart/form-data" method="POST">
                        <div class="table-responsive">
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
                              <input type="text" class="form-control" name="name" placeholder="Enter blood bank name" />
                              <div id="name_error" class="error_label"></div>
                              </td>
                              <td class="form-group forminput" width="50%">                                         <!--password-->
                              <label for="password">Password <sup>*</sup>
                              </label><br />
                              <input type="password" id="password" class="form-control" name="password" placeholder="Enter password" />
                              <div id="password_error" class="error_label"></div>
                              </td>
                            </tr>
                            <tr>
                              <td class="form-group forminput">                                         <!--Email ID-->
                                <label for="email">Email ID <sup>*</sup>
                                </label><br />
                                <input type="text" id="email" class="form-control" name="email" placeholder="Enter Email ID" />
                                <div id="email_error" class="error_label"></div>

                              </td>
                              <td class="form-group forminput">                                         <!--Confirm Password-->
                                <label for="confirmpass">Confirm Password <sup>*</sup>
                                </label><br />
                                <input type="password" id="confirmpass" class="form-control" name="confirmpass" placeholder="Enter confirm password"  />
                                <div id="confirmpass_error" class="error_label"></div>
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
                                <input type="text" class="form-control" name="Hname" placeholder="Enter Parent Hospital name" />
                                <div id="Hname_error" class="error_label"></div>
                                </td>
                                <td class="form-group forminput">                                      <!--category-->
                                  <label for="category">Category <sup>*</sup>
                                  </label><br />
                                  <select class="form-control" id="category" name="category">
                                    <option disabled selected>Select</option>
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
                                <input type="text" class="form-control" name="cpname" placeholder="Enter contact person name" />
                                <div id="cpname_error" class="error_label"></div>
                                </td>
                                <td class="form-group forminput">                                     <!--contact no.-->
                                <label for="contact">Contact No. <sup>*</sup>
                                </label><br />
                                <input type="text" id="contact" class="form-control" name="contact" placeholder="Enter contact no." />
                                <div id="contact_error" class="error_label"></div>
                                </td>
                              </tr>

                              <tr>
                                <td class="form-group forminput">                                     <!--fax no.-->
                                <label for="faxno">Fax No.
                                </label><br />
                                <input type="text" id="faxno" class="form-control" name="faxno" placeholder="Enter fax no." />
                                <div id="faxno_error" class="error_label"></div>
                                </td>
                                <td class="form-group forminput">                                      <!--license no-->
                                <label for="license">License No <sup>*</sup>
                                </label><br />
                                <input type="text" class="form-control" name="license" placeholder="Enter License No." />
                                <div id="license_error" class="error_label"></div>
                                </td>
                              </tr>

                              <tr>
                                <td class="form-group forminput">                                      <!--from date-->
                                <label for="fromd">From Date <sup>*</sup>
                                </label><br />
                                <input type="date" id="fromd" class="form-control" name="fromd" placeholder="Enter from Date" required />
                                </td>
                                <td class="form-group forminput">                                       <!--to Date-->
                                <label for="todate">To Date <sup>*</sup>
                                </label><br />
                                <input type="date" id="todate" class="form-control" name="todate" placeholder="Enter to Date" required />
                                </td>
                              </tr>

                              <tr>
                                <td class="form-group forminput">                                      <!--Component Facility-->
                                  <label for="facility1">Component Facility
                                  </label><br />
                                  <select class="form-control" id="facility1" name="facility1">
                                    <option disabled selected>Select</option>
                                    <option>Yes</option>
                                    <option>No</option>
                                  </select>
                                  <div id="facility1_error" class="error_label"></div>
                                </td>
                                <td class="form-group forminput">                                    <!--Apheresis Facility-->
                                  <label for="facility2">Apheresis Facility
                                  </label><br />
                                  <select class="form-control" id="facility2" name="facility2">
                                    <option disabled selected>Select</option>
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
                                <input type="text" id="helpline" class="form-control" name="helpline" placeholder="Enter helpline no." />
                                <div id="helpline_error" class="error_label"></div>
                                </td>
                                <td class="form-group forminput">                                     <!--website-->
                                <label for="website">Website
                                </label><br />
                                <input type="url" id="website" class="form-control" name="website" placeholder="Enter Website URL" />
                                <div id="website_error" class="error_label"></div>
                                </td>
                              </tr>

                              <tr>
                                <td class="form-group forminput">                                   <!--Certificate upload-->
                                  <label for="upload">Upload Certificate <sup>*</sup>
                                  </label><br />
                                  <input type="file" class="form-control" name="upload" id="upload" />
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
                                <input type="hidden" name="country" id="countryId" value="IN"/>
                                <select name="state" class="states order-alpha form-control" id="stateId">
                                  <option value="">Select State</option>
                                </select>
                                <div id="state_error" class="error_label"></div>
                                </td>
                                <td class="form-group forminput">                                       <!--city-->
                                  <label for="city">City <sup>*</sup>
                                  </label><br />
                                  <select name="city" class="cities order-alpha form-control" id="cityId">
                                    <option value="">Select City</option>
                                  </select>
                                  <div id="city_error" class="error_label"></div>
                                </td>
                              </tr>

                              <tr>
                                <td class="form-group forminput">                                       <!--Address-->
                                <label for="address">Address <sup>*</sup>
                                </label><br />
                                <textarea id="address" class="form-control" name="address" placeholder="Enter Address"></textarea>
                                <div id="address_error" class="error_label"></div>
                                </td>
                                <td class="form-group forminput">                                       <!--pin code-->
                                  <label for="pincode">Pin Code <sup>*</sup>
                                  </label><br />
                                  <input type="text" id="pincode" class="form-control" name="pincode" placeholder="Enter pin code" />
                                  <div id="pincode_error" class="error_label"></div>
                                </td>
                              </tr>
															<tr>
																<td></td>
																<td></td>
															</tr>

                              <tr>
                                <td class="form-group forminput">                                       <!--register button-->
                                  <button type="submit" name="submit" id="submit" class="btn btn-danger">
                                    Register
                                  </button>
                                </td>
                                <td></td>
                              </tr>
                            </tbody>
                        </table>
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
<!-- Loading Scripts -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.12/js/bootstrap-select.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap4.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.3/Chart.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-fileinput/5.0.8/js/fileinput.min.js"></script>
<script src="js/main.js"></script>
<!--geodata js-->
<script src="//geodata.solutions/includes/statecity.js"></script>

<!--validation-->
<script type="text/javascript">
function Validate_register() {
  var name = document.forms["registration"]["name"];
  var email = document.forms["registration"]["email"];
  var password = document.forms["registration"]["password"];
  var confirmpass = document.forms["registration"]["confirmpass"];
  var category = document.forms["registration"]["category"];
  var cpname = document.forms["registration"]["cpname"];
  var contact = document.forms["registration"]["contact"];
  var faxno = document.forms["registration"]["faxno"];
  var license = document.forms["registration"]["license"];
  var helpline = document.forms["registration"]["helpline"];
  var state = document.forms["registration"]["state"];
  var city = document.forms["registration"]["city"];
  var address = document.forms["registration"]["address"];
  var pincode = document.forms["registration"]["pincode"];

  var fileInput = document.getElementById('upload');
  var filePath = fileInput.value;
  var allowedExtensions = /(\.jpg|\.jpeg|\.pdf)$/i;

  if (filePath != "") {

    if(!allowedExtensions.exec(filePath)){
        document.getElementById('upload_error').innerHTML
        = 'Please upload file having extensions .jpeg/.jpg/.pdf only.';
        fileInput.value = '';
        upload.focus();
        return false;
    }
  }

  else {
    document.getElementById('upload_error').innerHTML
    = 'Please upload Certificate';
      upload.focus();
      return false;
  }

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

  if (confirmpass.value == "")
  {
    document.getElementById('confirmpass_error').innerHTML
    = 'Please Enter Confirm Password';
      confirmpass.focus();
      return false;
  }

  if (password.value != confirmpass.value) {
    document.getElementById('confirmpass_error').innerHTML
      = 'Password do not match!';
    confirmpass.focus();
    return false;
  }

  if(category.selectedIndex==0)
  { document.getElementById('category_error').innerHTML
  = 'Please select category!';
  category.focus();
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

  var c=document.registration.contact.value;
  if (isNaN(c)){
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
