<?php
include('include/connection.php');
session_start();
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Register as donor | Life Source Blood Bank</title>

    <!--========= css link =============-->
    <link rel="stylesheet" href="css/bootstrap.min.css">  <!--Bootstrap CSS-->
    <link rel="stylesheet" href="css/register.css">
    <script src="js/validation_register.js"></script>
    <!--font awesome icon-->
    <link href="css/all.css" rel="stylesheet">
    <!--datepicker-->
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css" />

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

        <button type="button" onclick="window.open('login.php', '_blank'); return false;" name="login" id="login" class="btn btn-default signupbtn">
          Login
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

    <div class="donor_reg">                                                   <!--Register Form-->
      <div class="container-sm">
        <div class="row">                                   <!--Register Heading-->
          <div class="col-lg-12 nopadding">
            <h1>Register as a Donor</h1>
          </div>
        </div>

        <div class="row">                                   <!--Register form-->
          <div class="col-lg-12 nopadding">
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

            <form name="registration" onsubmit="return Validate_register()" action="submitcon.php" method="POST">

              <table class="table table-borderless">
                <thead>                                     <!--Login Information-->
                  <tr class="tablehead">
                    <th width="50%">Login Information</th>
                    <th width="50%"></th>
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
                    <td class="form-group forminput">                    <!--password-->
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
                        <button type="submit" name="register_btn" class="btn btn-danger">
                          Register
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

<script src="js/moment.min.js"></script>  <!--moment JS (daterangepicker)-->
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
