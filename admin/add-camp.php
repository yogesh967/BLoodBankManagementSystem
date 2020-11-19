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
$title = mysqli_real_escape_string($conn,trim($_POST['title']));
$organised = mysqli_real_escape_string($conn,trim($_POST['organised']));
$state = mysqli_real_escape_string($conn,trim($_POST['state']));
$city = mysqli_real_escape_string($conn,trim($_POST['city']));
$mobile = mysqli_real_escape_string($conn,trim($_POST['mobile']));
$campdate = mysqli_real_escape_string($conn,trim($_POST['date']));
$address = mysqli_real_escape_string($conn,trim($_POST['address']));
$details = mysqli_real_escape_string($conn,trim($_POST['details']));
$msg = "";

$sql1 = "INSERT INTO bloodcamp (title, organised, state, city, mobile, address, campdate, details, status)
VALUES ('$title', '$organised', '$state', '$city', '$mobile', '$address', '$campdate', '$details', '1')";

if (mysqli_query($conn, $sql1)) {
	$msg = "Successfully Submitted";
} else {
	$error = "NOT submitted";
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

    .forminput {
      text-align: left;
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

  						<h2 class="page-title">Add Blood Camp</h2>

  						<div class="row">
  							<div class="col-md-12">
  								<div class="card">
                    <div class="card-header">
                      Form Field
                    </div>
  									<div class="card-body">
											<?php if($error){?><div class="errorWrap"><strong>ERROR</strong>:<?php echo htmlentities($error); ?> </div><?php }
													else if($msg){?><div class="succWrap"><strong>SUCCESS</strong>:<?php echo htmlentities($msg); ?> </div><?php }?>

                      <form name="add_camp" onsubmit="return Validate_camp()" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">

                        <table class="table table-borderless">
                          <tbody>
                            <tr>
                              <td class="form-group forminput" width="50%">                     <!--patient Name-->
                              <label for="title">Camp Title <sup>*</sup>
                              </label><br />
                              <input type="text" class="form-control" name="title" placeholder="Enter Camp Title" />
                              <div id="title_error" class="error_label"></div>
                              </td>
                              <td class="form-group forminput" width="50%">                     <!--patient Name-->
                              <label for="organised">Organised By <sup>*</sup>
                              </label><br />
                              <input type="text" class="form-control" name="organised" placeholder="Enter organised by" />
                              <div id="oraganised_error" class="error_label"></div>
                              </td>
                            </tr>



                            <tr>
															<td class="form-group forminput">                    <!--Mobile no-->
                                <label for="date">Date of Camp <sup>*</sup>
                                </label><br />
                                <input type="date" class="form-control" name="date" required />
                              </td>
                              <td class="form-group forminput">                    <!--Mobile no-->
                                <label for="mobile">Mobile No <sup>*</sup>
                                </label><br />
                                <input type="text" class="form-control" name="mobile" placeholder="Enter Mobile No." />
                                <div id="mobile_error" class="error_label"></div>
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
                              <label for="address">Address <sup>*</sup>
                              </label><br />
                              <textarea id="address" class="form-control" name="address" placeholder="Enter Address"></textarea>
                              <div id="address_error" class="error_label"></div>
                              </td>
                              <td class="form-group forminput">                     <!--hospital name & Address-->
                              <label for="details">Any Details
                              </label><br />
                              <textarea id="details" class="form-control" name="details" placeholder="Enter any details"></textarea>
                              <div id="details_error" class="error_label"></div>
                              </td>
                            </tr>
														<tr>
															<td></td>
															<td></td>
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

<!--Validation-->
<script type="text/javascript">
function Validate_camp() {
var title = document.forms["add_camp"]["title"];
var organised = document.forms["add_camp"]["organised"];
var state = document.forms["add_camp"]["state"];
var city = document.forms["add_camp"]["city"];
var mobile = document.forms["add_camp"]["mobile"];
var address = document.forms["add_camp"]["address"];

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

if (mobile.value == "")
{
  document.getElementById('mobile_error').innerHTML
  = 'Please Enter Mobile No.';
    mobile.focus();
    return false;
}

var c=document.add_camp.mobile.value;
if (isNaN(c)){
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
