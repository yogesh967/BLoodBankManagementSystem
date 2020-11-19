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
$Pname = mysqli_real_escape_string($conn,trim($_POST['Pname']));
$gender = mysqli_real_escape_string($conn,trim($_POST['gender']));
$bgroup = mysqli_real_escape_string($conn,trim($_POST['bgroup']));
$age = mysqli_real_escape_string($conn,trim($_POST['age']));
$state = mysqli_real_escape_string($conn,trim($_POST['state']));
$city = mysqli_real_escape_string($conn,trim($_POST['city']));
$address = mysqli_real_escape_string($conn,trim($_POST['address']));
$Dname = mysqli_real_escape_string($conn,trim($_POST['Dname']));
$Cname = mysqli_real_escape_string($conn,trim($_POST['Cname']));
$email = mysqli_real_escape_string($conn,trim($_POST['email']));
$mobile = mysqli_real_escape_string($conn,trim($_POST['mobile']));
$message = mysqli_real_escape_string($conn,trim($_POST['message']));


$sql1 = "INSERT INTO requestblood (Pname, gender, bgroup, age, state, city, address, Dname, Cname, email, mobile, message, status)
VALUES ('$Pname', '$gender', '$bgroup', '$age', '$state', '$city', '$address', '$Dname', '$Cname', '$email', '$mobile', '$message', '1')";

if (mysqli_query($conn, $sql1)) {
  $msg = "Your request is submitted successfully";
} else {
  $error = "Your request is NOT submitted";
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

  						<h2 class="page-title">Patient Request Form</h2>

  						<div class="row">
  							<div class="col-md-12">
  								<div class="card">
										<div class="card-header">
                      Form Field
                    </div>
  									<div class="card-body">
												<?php if($error){?><div class="errorWrap"><strong>ERROR</strong>:<?php echo htmlentities($error); ?> </div><?php }
									          else if($msg){?><div class="succWrap"><strong>SUCCESS</strong>:<?php echo htmlentities($msg); ?> </div><?php }?>
                      <form name="request_blood" onsubmit="return Validate_request()" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">

                        <table class="table table-borderless">
                          <thead>                                     <!--Login Information-->
                            <tr class="tablehead">
                              <th width="50%">Patient Details</th>
                              <th width="50%"></th>
                            </tr>
                          </thead>
                          <tbody>
														<tr>
					                    <td class="form-group forminput">                     <!--patient Name-->
					                    <label for="Pname">Patient Name <sup>*</sup>
					                    </label><br />
					                    <input type="text" class="form-control" name="Pname" placeholder="Enter Patient Name" />
					                    <div id="Pname_error" class="error_label"></div>
					                    </td>
					                    <td class="form-group forminput">                    <!--gender-->
					                      <label for="gender">Gender <sup>*</sup>
					                      </label><br />
					                      <input type="radio" id="male" name="gender" value="Male" checked> Male
					                      &nbsp;&nbsp;&nbsp;
					                      <input type="radio" id="female" name="gender" value="Female"> Female
					                    </td>
					                  </tr>

					                  <tr>
					                    <td class="form-group forminput">                   <!--Blood group-->
					                    <label for="bgroup">Blood Group <sup>*</sup>
					                    </label><br />
					                    <select class="form-control" id="bgroup" name="bgroup">
					                      <option disabled selected>Select</option>
					                      <option>A+</option>
					                      <option>B+</option>
					                      <option>O+</option>
					                      <option>A-</option>
					                      <option>B-</option>
					                      <option>O-</option>
					                      <option>AB+</option>
					                      <option>AB-</option>
					                    </select>
					                    <div id="bgroup_error" class="error_label"></div>
					                  </td>
					                  <td class="form-group forminput">                    <!--Mobile no-->
					                    <label for="age">Age <sup>*</sup>
					                    </label><br />
					                    <input type="text" class="form-control" name="age" placeholder="Enter age" />
					                    <div id="age_error" class="error_label"></div>
					                  </td>
					                  </tr>

					                  <tr>
					                    <td class="form-group forminput">                    <!--state-->
					                      <label for="state">State <sup>*</sup>
					                      </label><br />
					                      <input type="hidden" name="country" id="countryId" value="IN"/>
					                      <select name="state" class="states order-alpha form-control" id="stateId">
					                        <option value="">Select State</option>
					                      </select>
					                      <div id="state_error" class="error_label"></div>
					                    </td>
					                    <td class="form-group forminput">                      <!--city-->
					                      <label for="city">City <sup>*</sup>
					                      </label><br />
					                      <select name="city" class="cities order-alpha form-control" id="cityId">
					                        <option value="">Select City</option>
					                      </select>
					                      <div id="city_error" class="error_label"></div>
					                    </td>
					                  </tr>

					                  <tr>
					                    <td class="form-group forminput">                     <!--hospital name & Address-->
					                    <label for="address">Hospital Name & Address <sup>*</sup>
					                    </label><br />
					                    <textarea id="address" class="form-control" name="address" placeholder="Enter Hospital Name & Address"></textarea>
					                    <div id="address_error" class="error_label"></div>
					                    </td>
					                    <td class="form-group forminput">                     <!--doctor Name-->
					                    <label for="Dname">Doctor's Name <sup>*</sup>
					                    </label><br />
					                    <input type="text" class="form-control" name="Dname" placeholder="Enter Doctor's name" />
					                    <div id="Dname_error" class="error_label"></div>
					                    </td>
					                  </tr>
                            <tr>
                              <td></td>
                              <td></td>
                            </tr>
                          </tbody>


                            <thead>                                   <!--contact details-->
                              <tr class="tablehead">
                                <th>Contact Details</th>
                                <th></th>
                              </tr>
                            </thead>

                            <tbody>
                              <tr>
                                <td class="form-group forminput">                     <!--contact name-->
                                  <label for="Cname">Contact Name <sup>*</sup>
                                  </label><br />
                                  <input type="text" class="form-control" name="Cname" placeholder="Enter contact name" />
                                  <div id="Cname_error" class="error_label"></div>
                                </td>
                                <td class="form-group forminput">                    <!--email-->
                                  <label for="email">Email ID <sup>*</sup>
                                  </label><br />
                                  <input type="text" class="form-control" name="email" placeholder="Enter email" />
                                  <div id="email_error" class="error_label"></div>
                                </td>
                              </tr>
                              <tr>
                                <td class="form-group forminput">                    <!--Mobile no-->
                                  <label for="mobile">Mobile No <sup>*</sup>
                                  </label><br />
                                  <input type="text" class="form-control" name="mobile" placeholder="Enter Mobile No." />
                                  <div id="mobile_error" class="error_label"></div>
                                </td>
                                <td class="form-group forminput">                    <!--Any message-->
                                  <label for="message">Any Message
                                  </label><br />
                                  <textarea id="message" class="form-control" name="message" placeholder="Any Message"></textarea>
                                  <div id="message_error" class="error_label"></div>
                                </td>
                              </tr>
                              <tr>
                                <td class="form-group forminput">
                                  <button type="submit" name="submit" id="submit" class="btn btn-danger">
                                    Submit
                                  </button>
                                </td>
                                <td></td>
                              </tr>
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
function Validate_request() {
  var Pname = document.forms["request_blood"]["Pname"];
  var bgroup = document.forms["request_blood"]["bgroup"];
	var age = document.forms["request_blood"]["age"];
  var state = document.forms["request_blood"]["state"];
  var city = document.forms["request_blood"]["city"];
  var address = document.forms["request_blood"]["address"];
  var Dname = document.forms["request_blood"]["Dname"];
  var Cname = document.forms["request_blood"]["Cname"];
  var email = document.forms["request_blood"]["email"];
  var mobile = document.forms["request_blood"]["mobile"];
  var message = document.forms["request_blood"]["message"];

  if (Pname.value != "")
  {
    if (!Pname.value.match(/^[a-zA-Z]+([\s][a-zA-Z]+)*$/)) {
    document.getElementById('Pname_error').innerHTML
    = 'Please Enter alphabet characters only';
      Pname.focus();
      return false;
    }
  }

  else {
    document.getElementById('Pname_error').innerHTML
    = 'Please enter name';
      Pname.focus();
      return false;
  }

  if(bgroup.selectedIndex==0)
  { document.getElementById('bgroup_error').innerHTML
  = 'Please select blood group!';
  bgroup.focus();
  return false;
  }

	if (age.value == "")
  {
    document.getElementById('age_error').innerHTML
    = 'Please enter age';
      age.focus();
      return false;
  }

  if (isNaN(age.value)){
    document.getElementById('age_error').innerHTML
    = 'Please enter numbers only!';
      age.focus();
      return false;
    }

  if(state.selectedIndex==0)
  { document.getElementById('state_error').innerHTML
  = 'Please select state!';
  state.focus();
  return false;
  }

  if(city.selectedIndex==0)
  { document.getElementById('city_error').innerHTML
  = 'Please select city!';
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

  if (Dname.value != "")
  {
    if (!Dname.value.match(/^[a-zA-Z]+([\s][a-zA-Z]+)*$/)) {
    document.getElementById('Dname_error').innerHTML
    = 'Please Enter alphabet characters only';
      Dname.focus();
      return false;
    }
  }

  else {
    document.getElementById('Dname_error').innerHTML
    = 'Please enter name';
      Dname.focus();
      return false;
  }

  if (Cname.value != "")
  {
    if (!Cname.value.match(/^[a-zA-Z]+([\s][a-zA-Z]+)*$/)) {
    document.getElementById('Cname_error').innerHTML
    = 'Please Enter alphabet characters only';
      Cname.focus();
      return false;
    }
  }

  else {
    document.getElementById('Cname_error').innerHTML
    = 'Please enter name';
      Cname.focus();
      return false;
  }

  if (email.value == "")
  {
    document.getElementById('email_error').innerHTML
    = 'Please Enter email Id';
      email.focus();
      return false;
  }

  var x=document.request_blood.email.value;
  var atposition=x.indexOf("@");
  var dotposition=x.lastIndexOf(".");
  if (atposition<1 || dotposition<atposition+2 || dotposition+2>=x.length){
    document.getElementById('email_error').innerHTML
      = 'Please enter valid Email id!';
    email.focus();
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


  return true;

}

</script>
