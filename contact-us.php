<?php
include('include/connection.php');
session_start();
 ?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Contact Us | Life Source Blood Bank</title>

    <!--========= css link =============-->
    <link rel="stylesheet" href="css/bootstrap.min.css">  <!--Bootstrap CSS-->
    <link rel="stylesheet" href="css/register.css">
    </script>
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
      <div class="col-lg-6 col-sm-6 col-12 nopadding logobg">     <!--LOGO box-->
        <a href="index.php">
          <img src="images/logo.png" alt="Life Source blood bank System" title="Life source blood bank system" />
        </a>
      </div>

      <div class="col-lg-6 col-sm-6 col-12 nopadding loginbg">     <!--Login box-->

        <button type="button" onclick="window.open('login.php', '_blank'); return false;" name="login" id="login" class="btn btn-default loginbtn">
          Login
        </button>

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
          <li class="nav-item active">
            <a class="nav-link" href="contact-us.php">Contact Us</a>
          </li>
        </ul>
      </div>
      </div>
    </nav>

    <div class="donor_reg">                                                   <!--Register Form-->
      <div class="container-sm">
        <div class="row">                                   <!--Register Heading-->
          <div class="col-lg-12 nopadding">
            <h1>Contact Us</h1>
          </div>
        </div>

        <div class="row">                                   <!--Register form-->
          <div class="col-lg-6 nopadding" style="margin: 0 auto">
            <?php
            if(isset($_SESSION['success']) && $_SESSION['success'] !='')
            {?><div class="succWrap"><?php
                echo $_SESSION['success'];
                unset($_SESSION['success']);
            ?></div>    <?php } ?>

            <?php
            if(isset($_SESSION['status']) && $_SESSION['status'] !='')
            {?><div class="errorWrap"><?php
                echo $_SESSION['status'];
                unset($_SESSION['status']);
            ?></div>          <?php } ?>

            <form name="contact_us" onsubmit="return validate_contactus()" action="contactuscon.php" method="POST">

              <table class="table table-borderless">
                <thead>                                     <!--Login Information-->
                  <tr class="tablehead">
                    <th>Send us a Message</th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <td class="form-group forminput">                     <!--Full Name-->
                    <label for="name">Full Name <sup>*</sup>
                    </label><br />
                    <input type="text" class="form-control" name="name" placeholder="Enter full name" />
                    <div id="name_error" class="error_label"></div>
                    </td>
                  </tr>
                  <tr>
                    <td class="form-group forminput">                    <!--Email ID-->
                      <label for="email">Email ID <sup>*</sup>
                      </label><br />
                      <input type="text" id="email" class="form-control" name="email" placeholder="Enter Email ID" />
                      <div id="email_error" class="error_label"></div>

                    </td>
                  </tr>

                  <tr>
                      <td class="form-group forminput">                    <!--mobile no.-->
                      <label for="mobile">Mobile No. <sup>*</sup>
                      </label><br />
                      <input type="text" id="mobile" class="form-control" name="mobile" placeholder="Enter mobile no." />
                      <div id="mobile_error" class="error_label"></div>
                    </td>
                  </tr>

                  <tr>
                      <td class="form-group forminput">                     <!--Address-->
                      <label for="address">Message <sup>*</sup>
                      </label><br />
                      <textarea id="message" class="form-control" name="message" placeholder="Message" required></textarea>
                      <div id="message_error" class="error_label"></div>
                      </td>
                  </tr>

                  <tr>
                    <td class="form-group forminput">
                      <button type="submit" name="submit" id="submit" class="btn btn-danger">
                        Submit
                      </button>
                    </td>
                  </tr>
                </tbody>
              </table>
            </form>
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
function validate_contactus() {
  var name = document.forms["contact_us"]["name"];
  var email = document.forms["contact_us"]["email"];
  var mobile = document.forms["contact_us"]["mobile"];
  var message = document.forms["contact_us"]["message"];

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

  if (email.value == "")
  {
    document.getElementById('email_error').innerHTML
    = 'Please Enter email Id';
      email.focus();
      return false;
  }

  var x=document.contact_us.email.value;
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

  var c=document.contact_us.mobile.value;
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

  if (message.value == "")
  {
    document.getElementById('message_error').innerHTML
    = 'Please Enter Message.';
      message.focus();
      return false;
  }

  return true;

}
</script>
