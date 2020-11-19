<?php
session_start();
error_reporting(0);
include('include/connection.php');
if(strlen($_SESSION['alogin'])==0)
	{
header('location:index.php');
}
else{
	if(isset($_POST['submit']))
	{
	$mobile=$_POST['mobile'];
	$email=$_POST['email'];
	$sql="UPDATE contactinfo set mobile=:mobile,email=:email";
	$query = $dbh->prepare($sql);
	$query->bindParam(':mobile',$mobile,PDO::PARAM_STR);
	$query->bindParam(':email',$email,PDO::PARAM_STR);
	$query->execute();
	$msg="Info Updated successfully";
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

		.form-control {
			width: 60%;
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

	  						<h2 class="page-title">Update Contact Info</h2>

	  						<div class="row">
	  							<div class="col-md-12">
	  								<div class="card">
	                    <div class="card-header">
	                      FORM FIELD
	                    </div>
	  									<div class="card-body">
												<?php if($error){?><div class="errorWrap"><strong>ERROR</strong>:<?php echo htmlentities($error); ?> </div><?php }
									          else if($msg){?><div class="succWrap"><strong>SUCCESS</strong>:<?php echo htmlentities($msg); ?> </div><?php }?>
	                      <form name="update_contact" onsubmit="return Validate_contact()" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">

													<?php $sql = "SELECT * from contactinfo";
													$query = $dbh -> prepare($sql);
													$query->execute();
													$results=$query->fetchAll(PDO::FETCH_OBJ);
													$cnt=1;
													if($query->rowCount() > 0)
													{
													foreach($results as $result)
													{				?>
	                        <table class="table table-borderless">
														<tr>
                              <td class="form-group forminput">                    <!--Mobile no-->
                                <label for="mobile">Mobile No
                                </label><br />
                                <input type="text" class="form-control" name="mobile" value="<?php echo htmlentities($result->mobile);?>" />
                                <div id="mobile_error" class="error_label"></div>
                              </td>
														</tr>
														<tr>
															<td class="form-group forminput">                    <!--Email ID-->
                                <label for="email">Email
                                </label><br />
                                <input type="text" id="email" class="form-control" name="email" value="<?php echo htmlentities($result->email);?>" />
                                <div id="email_error" class="error_label"></div>
                              </td>
														</tr>
													<?php }} ?>

														<tr>
															<td class="form-group forminput">
																<button type="submit" name="submit" id="submit" class="btn btn-danger">
																	Update
																</button>
															</td>
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
	function Validate_contact() {
		var mobile = document.forms["update_contact"]["mobile"];
		var email = document.forms["update_contact"]["email"];

		var x=document.update_contact.email.value;
		var atposition=x.indexOf("@");
		var dotposition=x.lastIndexOf(".");
		if (atposition<1 || dotposition<atposition+2 || dotposition+2>=x.length){
			document.getElementById('email_error').innerHTML
				= 'Please enter valid Email id!';
			email.focus();
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
