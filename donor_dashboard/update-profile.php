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
  $id = $_POST['donor_id'];
  $name = mysqli_real_escape_string($conn,trim($_POST['name']));
  $password = mysqli_real_escape_string($conn,trim($_POST['password']));
  $email = mysqli_real_escape_string($conn,trim($_POST['email']));
  $birth = mysqli_real_escape_string($conn,trim($_POST['birth']));
  $gender = $_POST['gender'];
  $weight = mysqli_real_escape_string($conn,trim($_POST['weight']));
  $bgroup = $_POST['bgroup'];
  $phone = mysqli_real_escape_string($conn,trim($_POST['phone']));
  $mobile = mysqli_real_escape_string($conn,trim($_POST['mobile']));
  $address = mysqli_real_escape_string($conn,trim($_POST['address']));
  $state = mysqli_real_escape_string($conn,trim($_POST['state']));
  $city = mysqli_real_escape_string($conn,trim($_POST['city']));

  $query1 = "UPDATE register SET name='$name', password='$password', email='$email', birth='$birth', gender='$gender', weight='$weight', bgroup='$bgroup', phone='$phone', mobile='$mobile', address='$address', State='$state', city='$city' WHERE ID='$id'";
  $query_run1 = mysqli_query($conn,$query1);

  if ($query_run1) {
    $msg=" Profile updated Successfully";
  }

  else {
    $error="profile NOT updated!";
  }
}
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
  	<meta http-equiv="X-UA-Compatible" content="IE=edge">
  	<meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1">
  	<meta name="description" content="">
  	<meta name="author" content="">
  	<meta name="theme-color" content="#3e454c">

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

                      <form name="update_register" onsubmit="return Validate_uregister()" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
                        <div class="table-responsive">
													<?php
		                      if (isset($_SESSION['did'])) {
		                        $id = $_SESSION['did'];
		                        $query = "SELECT * from register WHERE ID='$id' ";
		                        $query_run = mysqli_query($conn,$query);

														foreach ($query_run as $row) {
		                      ?>
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
                              <input type="hidden" name="donor_id" value="<?php echo $row['ID']; ?>">
                              <input type="text" class="form-control" name="name" value="<?php echo $row['name']; ?>" placeholder="Enter full name" />
                              <div id="name_error" class="error_label"></div>
                              </td>
                              <td class="form-group forminput" width="50%">                    <!--password-->
                              <label for="password">Password <sup>*</sup>
                              </label><br />
                              <input type="password" id="password" class="form-control" name="password" value="<?php echo $row['password']; ?>" placeholder="Enter password" />
                              <div id="password_error" class="error_label"></div>
                              </td>
                            </tr>
                            <tr>
                              <td class="form-group forminput">                    <!--Email ID-->
                                <label for="email">Email ID <sup>*</sup>
                                </label><br />
                                <input type="text" id="email" class="form-control" name="email" value="<?php echo $row['email']; ?>" placeholder="Enter Email ID" />
                                <div id="email_error" class="error_label"></div>
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
                                <input type="date" id="birth" class="form-control" name="birth" value="<?php echo $row['birth']; ?>" placeholder="Enter Date of birth" required />
                                </td>
                                <td class="form-group forminput">                    <!--Gender-->
                                <label for="gender">Gender <sup>*</sup>
                                </label><br />
																<select class="form-control" id="gender" name="gender">
																	<option value="<?php echo $row['gender']; ?>"><?php echo $row['gender']; ?></option>
																	<option>Male</option>
																	<option>Female</option>
																</select>
																	<div id="gender_error" class="error_label"></div>
                              <tr>
                                <td class="form-group forminput">                    <!--Blood group-->
                                  <label for="bloodgroup">Your Blood Group <sup>*</sup>
                                  </label><br />
                                  <select class="form-control" id="bgroup" name="bgroup">
                                    <option value="<?php echo $row['bgroup']; ?>"><?php echo $row['bgroup']; ?></option>
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
                                <td class="form-group forminput">                    <!--weight-->
                                  <label for="weight">Weight(Kg) <sup>*</sup>
                                  </label><br />
                                  <input type="text" class="form-control" id="weight" name="weight" value="<?php echo $row['weight']; ?>" placeholder="Enter Weight"/>
                                  <div id="weight_error" class="error_label"></div>
                                </td>
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
                                <input type="text" id="phone" class="form-control" name="phone" value="<?php echo $row['phone']; ?>" placeholder="Enter Residence phone" />
                                <div id="phone_error" class="error_label"></div>
                                </td>
                                <td class="form-group forminput">                    <!--mobile no.-->
                                <label for="mobile">Mobile No. <sup>*</sup>
                                </label><br />
                                <input type="text" id="mobile" class="form-control" name="mobile" value="<?php echo $row['mobile']; ?>" placeholder="Enter mobile no." />
                                <div id="mobile_error" class="error_label"></div>
                                </td>
                              </tr>

                              <tr>
                                <td class="form-group forminput">                     <!--Address-->
                                <label for="address">Address <sup>*</sup>
                                </label><br />
                                <textarea id="address" class="form-control" name="address" placeholder="Enter Address"><?php echo $row['address']; ?>
                                </textarea>
                                <div id="address_error" class="error_label"></div>
                                </td>
                                <td class="form-group forminput">                    <!--city-->
                                  <label for="state">State <sup>*</sup>
                                  </label><br />
                                  <input type="text" name="state" id="state" class="form-control" value="<?php echo $row['State']; ?>" placeholder="Enter State"/>
                                <div id="state_error" class="error_label"></div>
                                </td>
                              </tr>

                              <tr>
                                <td class="form-group forminput">
                                  <label for="city">City <sup>*</sup>
                                  </label><br />
                                  <input type="text" name="city" class="form-control" id="city" value="<?php echo $row['city']; ?>" placeholder="Enter City"/>
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
                                  <button type="submit" name="submit" id="submit" class="btn btn-primary">
                                    UPDATE
                                  </button>
                                  <a href="update-profile.php" class="btn btn-danger">CANCEL</a>
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
</script>
<script src="js/main.js"></script>
<!--validation-->
<script type="text/javascript">
function Validate_uregister() {
						var name = document.forms["update_register"]["name"];
						var email = document.forms["update_register"]["email"];
						var password = document.forms["update_register"]["password"];
						var weight = document.forms["update_register"]["weight"];
						var phone = document.forms["update_register"]["phone"];
						var mobile = document.forms["update_register"]["mobile"];
						var address = document.forms["update_register"]["address"];
						var state = document.forms["update_register"]["state"];
						var city = document.forms["update_register"]["city"];

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
							= 'Please enter name';
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
							= 'Please Enter email Id';
								email.focus();
								return false;
						}

						var x=document.update_register.email.value;
						var atposition=x.indexOf("@");
						var dotposition=x.lastIndexOf(".");
						if (atposition<1 || dotposition<atposition+2 || dotposition+2>=x.length){
							document.getElementById('email_error').innerHTML
								= 'Please enter valid Email id!';
							email.focus();
							return false;
						}


						if (weight.value == "")
						{
							document.getElementById('weight_error').innerHTML
							= 'Please Enter weight';
								weight.focus();
								return false;
						}

						var a=document.update_register.weight.value;

						if (isNaN(a) || a < 50){
							document.getElementById('weight_error').innerHTML
							= 'Minimum weight required 50Kg!';
								weight.focus();
								return false;
							}


						if (phone.value != "") {
							if (isNaN(phone.value) || !phone.value.match(/^\d{10}$/)) {
								document.getElementById('phone_error').innerHTML
								= 'Please enter valid phone Number!';
								phone.focus();
								return false;
							}
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

	return true;
}

</script>
