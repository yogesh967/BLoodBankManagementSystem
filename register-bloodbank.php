<?php
include('include/connection.php');
session_start();
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Register as a blood bank | Life Source Blood Bank</title>

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
              <a class="dropdown-item active" href="register-bloodbank.php">Register as a Blood Bank</a>
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
        <div class="row">                                                                     <!--Register Heading-->
          <div class="col-lg-12 nopadding">
            <h1>Register as a Blood Bank</h1>
          </div>
        </div>

        <div class="row">                                                                      <!--Register form-->
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

            <form name="registration" onsubmit="return Validate_register()" action="submitcon.php" enctype="multipart/form-data" method="POST">

              <table class="table table-borderless">
                <thead>                                                                         <!--Login Information-->
                  <tr class="tablehead">
                    <th width="50%">Login Details</th>
                    <th width="50%"></th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <td class="form-group forminput">                                          <!--blood bank Name-->
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
                        <input type="file" class="form-control" name="upload" id="upload">
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
                      <td class="form-group forminput">                                       <!--register button-->
                        <button type="submit" name="bb_btn" class="btn btn-danger">
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
