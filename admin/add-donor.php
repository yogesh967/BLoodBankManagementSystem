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
  $birth = mysqli_real_escape_string($conn,trim($_POST['birth']));
	$age = mysqli_real_escape_string($conn,trim($_POST['age']));
  $gender = $_POST['gender'];
  $weight = mysqli_real_escape_string($conn,trim($_POST['weight']));
  $bgroup = $_POST['bgroup'];
  $phone = mysqli_real_escape_string($conn,trim($_POST['phone']));
  $mobile = mysqli_real_escape_string($conn,trim($_POST['mobile']));
  $address = mysqli_real_escape_string($conn,trim($_POST['address']));
  $state = $_POST['state'];
  $city = $_POST['city'];

  $msg="";
  $email_valid = $mobile_valid = false;

  $sql_e = "SELECT email FROM register WHERE email='$email'";
  $sql_m = "SELECT * FROM register WHERE mobile='$mobile'";
  $res_e = mysqli_query($conn, $sql_e);
  $res_m = mysqli_query($conn, $sql_m);

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



  if ($email_valid && $mobile_valid) {
    $query = "INSERT INTO register (name,password,email,birth,age,gender,bgroup,weight,phone,mobile,address,state,city,user,status)
    VALUES ('$name','$password','$email','$birth','$age','$gender','$bgroup',$weight,'$phone','$mobile','$address','$state','$city','Donor','1')";

    $fire = mysqli_query($conn,$query);
    if ($fire) {
      $msg = "Successfully Registered";
    }

		else {
			$error = "Registration FAIL";
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
		<!--datepicker-->
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css" />
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

  						<h2 class="page-title">Add Donor</h2>

  						<div class="row">
  							<div class="col-md-12">
  								<div class="card">
										<div class="card-header">
                      Form Field
                    </div>
  									<div class="card-body">
											<?php if($error){?><div class="errorWrap"><strong>ERROR</strong>:<?php echo htmlentities($error); ?> </div><?php }
													else if($msg){?><div class="succWrap"><strong>SUCCESS</strong>:<?php echo htmlentities($msg); ?> </div><?php }?>
                      <form name="registration" onsubmit="return Validate_register()" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
                        <div class="table-responsive">
                        <table class="table table-borderless">
                          <thead>                                     <!--Login Information-->
                            <tr class="tablehead">
                              <th>Login Information</th>
                              <th></th>
                            </tr>
                          </thead>
                          <tbody>
                            <tr>
                              <td class="form-group forminput" width="50%">                     <!--Full Name-->
                              <label for="name">Full Name <sup>*</sup>
                              </label><br />
                              <input type="text" class="form-control" name="name" placeholder="Enter full name" />
                              <div id="name_error" class="error_label"></div>
                              </td>
                              <td class="form-group forminput" width="50%">                    <!--password-->
                              <label for="password">Password <sup>*</sup>
                              </label><br />
                              <input type="password" id="password" class="form-control" name="password" placeholder="Enter password" />
                              <div id="password_error" class="error_label"></div>
                              </td>
                            </tr>
                            <tr>
                              <td class="form-group forminput">                    <!--Email ID-->
                                <label for="email">Email ID <sup>*</sup>
                                </label><br />
                                <input type="text" id="email" class="form-control" name="email" placeholder="Enter Email ID" />
                                <div id="email_error" class="error_label"></div>
                              </td>
                              <td class="form-group forminput">                    <!--Confirm Password-->
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


                            <thead>                                   <!--Donor Information-->
                              <tr class="tablehead">
                                <th>Donor Information</th>
                                <th></th>
                              </tr>
                            </thead>

                            <tbody>
															<tr>
					                      <td class="form-group forminput">                     <!--Date of Birth-->
					                      <label for="birth">Date of Birth <sup>*</sup>
					                      </label><br />
					                      <input type="text" class="form-control" name="birth" />
					                      </td>
					                      <td class="form-group forminput">
					                        <label for="age">Age
					                        </label><br />                    <!--Gender-->
					                        <input type="text" class="form-control" name="age" id="age" placeholder="0" readonly />
					                        <div id="age_error" class="error_label"></div>
					                      </td>
					                    </tr>
					                    <tr>
					                      <td class="form-group forminput">                    <!--Gender-->
					                        <label for="gender">Gender <sup>*</sup>
					                        </label><br />
					                        <input type="radio" id="male" name="gender" value="Male" checked> Male
					                        &nbsp;&nbsp;&nbsp;
					                        <input type="radio" id="female" name="gender" value="Female"> Female
					                      </td>
					                      <td class="form-group forminput">                    <!--Blood Group-->
					                        <label for="bgroup">Your Blood Group <sup>*</sup>
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
					                    </tr>

					                    <tr>
					                      <td class="form-group forminput">
					                        <label for="weight">Weight(Kg) <sup>*</sup>
					                        </label><br />
					                        <input type="text" class="form-control" id="weight" name="weight" />
					                        <div id="weight_error" class="error_label"></div>
					                      </td>
					                      <td></td>
					                    </tr>

															<tr>
																<td></td>
																<td></td>
															</tr>
                            </tbody>

                            <thead>                                   <!--Contact Information-->
                              <tr class="tablehead">
                                <th>Contact Information</th>
                                <th></th>
                              </tr>
                            </thead>

                            <tbody>
                              <tr>
                                <td class="form-group forminput">                     <!--Residence Phone-->
                                <label for="phone">Residence Phone
                                </label><br />
                                <input type="text" id="phone" class="form-control" name="phone" placeholder="Enter Residence phone" />
                                <div id="phone_error" class="error_label"></div>
                                </td>
                                <td class="form-group forminput">                    <!--mobile no.-->
                                <label for="mobile">Mobile No. <sup>*</sup>
                                </label><br />
                                <input type="text" id="mobile" class="form-control" name="mobile" placeholder="Enter mobile no." />
                                <div id="mobile_error" class="error_label"></div>
                                </td>
                              </tr>

                              <tr>
                                <td class="form-group forminput">                     <!--Address-->
                                <label for="address">Address <sup>*</sup>
                                </label><br />
                                <textarea id="address" class="form-control" name="address" placeholder="Enter Address"></textarea>
                                <div id="address_error" class="error_label"></div>
                                </td>
                                <td class="form-group forminput">                    <!--city-->
                                <label for="state">State <sup>*</sup>
                                </label><br />
                                <input type="hidden" name="country" id="countryId" value="IN"/>
                                <select name="state" class="states order-alpha form-control" id="stateId">
                                  <option value="">Select State</option>
                                </select>
                                <div id="state_error" class="error_label"></div>
                                </td>
                              </tr>

                              <tr>
                                <td class="form-group forminput">
                                  <label for="city">City <sup>*</sup>
                                  </label><br />
                                  <select name="city" class="cities order-alpha form-control" id="cityId">
                                    <option value="">Select City</option>
                                  </select>
                                  <div id="city_error" class="error_label"></div>
                                </td>
                                <td></td>
                              </tr>
															<tr>
																<td></td>
																<td></td>
															</tr>

                              <tr>
                                <td class="form-group forminput">
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


    <!-- Loading Scripts -->
  	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  	<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.12/js/bootstrap-select.min.js"></script>
  	<script src="js/bootstrap.min.js"></script>
  	<script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap4.min.js"></script>
  	<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.3/Chart.js"></script>
  	<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-fileinput/5.0.8/js/fileinput.min.js"></script>
    <script src="../js/validation_register.js"></script>
  	<script src="js/main.js"></script>
		<script src="../js/moment.min.js"></script>  <!--moment JS (daterangepicker)-->
		<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script>
		<!--geodata js-->
		<script src="//geodata.solutions/includes/statecity.js"></script>

		<script>
		$(function() {
		  $('input[name="birth"]').daterangepicker({
		    singleDatePicker: true,
		    showDropdowns: true,
		    minYear: 1901,
		    maxYear: parseInt(moment().format('YYYY'),10)
		  }, function(start, end, label) {
		    var years = moment().diff(start, 'years');
		    document.getElementById('age').value = years;
		  });
		});

		</script>

  </body>
</html>
