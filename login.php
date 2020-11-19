<?php
include('include/connection.php');

if(isset($_POST['login'])) {
  $email = mysqli_real_escape_string($conn,trim($_POST['email']));
  $password = mysqli_real_escape_string($conn,trim($_POST['password']));

  $error="";
  $donor = "SELECT * FROM register WHERE email='$email' AND password='$password' AND user='Donor' AND status='1'";
  $fire_donor =  mysqli_query($conn,$donor);

  $blood_bank = "SELECT * FROM bbregister WHERE email='$email' AND password='$password' AND user='bloodbank' AND status='1'";
  $fire_bloodbank =  mysqli_query($conn,$blood_bank);
  $fetch = mysqli_fetch_array($fire_bloodbank);
  $fetch1 = mysqli_fetch_array($fire_donor);
  if (mysqli_num_rows($fire_donor) != 1) {
    if (mysqli_num_rows($fire_bloodbank) != 1) {
      $error = "Invalid email or Password";
      header("Location:login.php?error=".$error);
    }

    else {
      session_start();
      $_SESSION['bbid'] = $fetch['ID'];
			$_SESSION['bbname'] = $fetch['name'];
      header("location:bb_dashboard/dashboard.php");
    }
  }
  else {
    session_start();
    $_SESSION['did'] = $fetch1['ID'];
    $_SESSION['dname'] = $fetch1['name'];
    header("location:donor_dashboard/dashboard.php");
  }

}
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Login | Life Source Blood Bank</title>

    <!--========= css link =============-->
    <link rel="stylesheet" href="css/bootstrap.min.css">  <!--Bootstrap CSS-->
    <link rel="stylesheet" href="css/login.css">

    <!--font awesome icon-->
    <link href="css/all.css" rel="stylesheet">
    <!--=======================Online link=========================-->
    <!--<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">-->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <!--<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>-->

    <!--favicon link-->
    <link rel="apple-touch-icon" sizes="180x180" href="images/favicon/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="images/favicon/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="images/favicon/favicon-16x16.png">
    <link rel="manifest" href="images/favicon/site.webmanifest">
    <link rel="mask-icon" href="images/favicon/safari-pinned-tab.svg" color="#5bbad5">
    <meta name="msapplication-TileColor" content="#ffffff">
    <meta name="theme-color" content="#ffffff">
  </head>
  <body>
    <header>                                                  <!--header-->
      <div class="container-sm nopadding">
      <div class="row">
      <div class="col-lg-6 col-md-6 col-sm-6 col-6 nopadding logobg">     <!--LOGO box-->
        <a href="index.php">
          <img src="images/logo.png" alt="Life Source blood bank System" title="Life source blood bank system" />
        </a>
      </div>

      <div class="col-lg-6 col-sm-6 col-6 nopadding loginbg">     <!--Login box-->

        <button type="button" onclick="window.open('register.php', '_blank'); return false;" class="btn btn-default signupbtn">
          Register as Donor
        </button>

      </div>
      </div>
      </div>
    </header>

    <nav class="navbar navbar-expand-md navbar-light navigation sticky-top">
      <div class="container-sm">
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="collapsibleNavbar">
        <ul class="navbar-nav mx-auto">
          <li class="nav-item">
            <a class="nav-link" href="index.php">Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="aboutus.php">About Us</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="search_donor.php">Search Donor</a>
          </li>
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbardrop" data-toggle="dropdown">
              Patient Request
            </a>
            <div class="dropdown-menu">
              <a class="dropdown-item" href="request-blood.php">Patient Request form</a>
              <a class="dropdown-item" href="request-list.php">Patient Request List</a>
            </div>
          </li>
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbardrop" data-toggle="dropdown">
              Blood Bank
            </a>
            <div class="dropdown-menu">
              <a class="dropdown-item" href="bblist.php">Blood Bank List</a>
              <a class="dropdown-item" href="bloodstock.php">Blood Stock</a>
              <a class="dropdown-item" href="register-bloodbank.php">Register as a Blood Bank</a>
            </div>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="bloodcamp.php">Blood Camp</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="contact-us.php">Contact Us</a>
          </li>
        </ul>
      </div>
      </div>
    </nav>

  <div class="login_cont">                                               <!--login-->
    <div class="container-sm">
      <div class="row">                               <!--login heading-->
        <div class="col-lg-12">
          <h1>Login</h1>
        </div>
      </div>

      <div class="row">                               <!--login form-->
        <div class="col-lg-4 col-md-5 col-sm-7 col-7 login_form">
          <img src="images/logo_dark.png" alt="Life Source blood bank System" title="Life source blood bank system" />

          <label class="loginacc">Login to your account</label>

            <form action="<?php echo $_SERVER['PHP_SELF']; ?>" name="login" onsubmit="return Validate_login()" method="post">
              <div class="form-group">
                <div class="input-group">
                  <div class="input-group-addon">
                    <i class="fas fa-envelope"></i>
                  </div>
                  <input type="email" class="form-control" id="email" name="email" placeholder="Email id" />
                </div>
                <div id="email_error" class="error_label"></div>
              </div>

              <div class="form-group">
                <div class="input-group">
                  <div class="input-group-addon">
                    <i class="fas fa-key" aria-hidden="true"></i>
                  </div>
                  <input type="password" class="form-control" id="password" name="password" placeholder="Password" />
                </div>
                <div id="password_error" class="error_label"></div>
              </div>

              <div class="error_label">
                <?php
                if (isset($_GET['error'])) {
                  echo $_GET['error'];
                }
                ?>
              </div>


              <button type="submit" id="login" name="login" class="btn btn-danger btn-block mt-3"><i class="fas fa-sign-in-alt"></i>&nbsp;&nbsp;LOGIN</button>
            </form>
            <p class="member">
              <a href="register.php" target="_blank">
              <i class="fas fa-user-times"></i>
              Not A Member?</a>
            </p>
        </div>
      </div>
    </div>
  </div>

  <footer>                                                  <!--footer-->
    <div class="container-sm nopadding">
      <div class="row">
        <div class="col-lg-10 col-md-12 hidemob">
          <div class="row">
            <div class="col-lg-12 nopadding">
              <ul class="footer_list">
                <li class="aboutli"><a href="about-us.php" target="_blank">About Us</a></li>-
                <li><a href="search_donor.php" target="_blank">Search Donor</a></li>-
                <li><a href="request-list.php" target="_blank">Patient Request list</a></li>-
                <li><a href="bb-list.php" target="_blank">Blood Bank list</a></li>-
                <li><a href="bloodcamp.php" target="_blank">Blood Camp</a></li>-
                <li><a href="contact-us.php" target="_blank">Contact Us</a></li>-
                <li><a href="privacy.php" target="_blank">Privacy Policy</a></li>
              </ul>
            </div>
          </div>
          <?php
          $query3 = "SELECT * from contactinfo";
          $query_run3 = mysqli_query($conn,$query3);

          if (mysqli_num_rows($query_run3) > 0) {
            while ($row3 = mysqli_fetch_assoc($query_run3)) {
          ?>

          <div class="row">
            <div class="col-lg-12 nopadding">
              <ul class="footer_list">
                <li class="aboutli"><i class="fas fa-phone-alt"></i> <?php echo $row3['mobile'];?></li>|
                <li><i class="fas fa-envelope"></i> <a href="mailto:<?php echo $row3['email'];?>"><?php echo $row3['email'];?></a></li>|
                <li>&copy; Life Source blood Bank System &nbsp;&nbsp;&nbsp; All Rights Reserved</li>
              </ul>
            </div>
          </div>
        </div>



    <div class="col-lg-2 col-md-12 social_icon hidemob nopadding">
          <div class="facebook">
            <a href="#">
            <i class="fab fa-facebook-square"></i>
            </a>
          </div>
          <div class="twitter">
            <a href="#">
            <i class="fab fa-twitter-square"></i>
            </a>
          </div>
    </div>
      </div>
      <div class="row hidedesk">
        <div class="col-md-12 nopadding">
          <ul class="footer_list text-center">
            <li><i class="fas fa-phone-alt"></i> <?php echo $row3['mobile'];?></li><br />
            <li><i class="fas fa-envelope"></i> <a href="mailto:<?php echo $row3['email'];?>"><?php echo $row3['email'];?></a></li><br />
            <li>&copy; Life Source blood Bank System | All Rights Reserved</li>
          </ul>
        </div>
      </div>
      <?php } }?>
      <div class="col-lg-2 col-md-12 social_icon hidedesk">
            <div class="facebook">
              <a href="#">
              <i class="fab fa-facebook-square"></i>
              </a>
            </div>
            <div class="twitter">
              <a href="#">
              <i class="fab fa-twitter-square"></i>
              </a>
            </div>
      </div>
    </div>
  </footer>

  </body>
</html>


<!--========= JS link =============-->
<script src="js/bootstrap.min.js"></script>  <!--Bootstrap JS-->

<!--Validation-->
<script type="text/javascript">
function Validate_login() {
        var email = document.forms["login"]["email"];
        var password = document.forms["login"]["password"];



        if (email.value == "")
        {
          document.getElementById('email_error').innerHTML
          = 'Please Enter email Id';
            email.focus();
            return false;
        }

        if (password.value == "")
        {
          document.getElementById('password_error').innerHTML
          = 'Please Enter password';
            password.focus();
            return false;
        }
return true;
}
</script>
