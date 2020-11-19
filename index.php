<?php
include('include/connection.php');
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Home | Life Source Blood Bank</title>

    <!--========= css link =============-->
    <link rel="stylesheet" href="css/bootstrap.min.css">  <!--Bootstrap CSS-->
    <link rel="stylesheet" href="css/style.css">

    <!--font awesome icon-->
    <link href="css/all.css" rel="stylesheet">

    <!--=======================Online link=========================-->
    <!--<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">-->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <!--<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>-->

    <!--datatables-->
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.20/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css">

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
      <div class="col-lg-6 col-md-6 col-sm-6 col-12 nopadding logobg">     <!--LOGO box-->
        <a href="index.php">
          <img src="images/logo.png" alt="Life Source blood bank System" title="Life source blood bank system" />
        </a>
      </div>

      <div class="col-lg-6 col-md-6 col-sm-6 col-12 nopadding loginbg">     <!--Login box-->

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
      <div class="container-sm nopadding">
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="collapsibleNavbar">
        <ul class="navbar-nav mx-auto">
          <li class="active nav-item">
            <a class="nav-link active" href="index.php">Home</a>
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

    <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">              <!--Banner-->
      <ol class="carousel-indicators">
        <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
        <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
      </ol>
      <div class="carousel-inner">
        <div class="carousel-item active">
          <img class="d-block w-100" src="images/banner1.jpg" alt="First slide" />
        </div>
        <div class="carousel-item">
          <img class="d-block w-100" src="images/banner2.jpg" alt="Second slide" />
        </div>
      </div>
      <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="sr-only">Previous</span>
      </a>
      <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="sr-only">Next</span>
      </a>
    </div>
    <img src="images/smallbanner.jpg" class="img-fluid smallbanner" alt="life source" />

    <div class="blood_tip">
      <div class="container-sm nopadding">
        <div class="row">                     <!--blood tip Heading-->
          <div class="col-lg-12 nopadding">
            <h1>About Blood Donation</h1>
          </div>
        </div>

        <div class="row btbox">
          <div class="col-lg-7 col-md-7 col-sm-12 col-12 nopadding btcontent">    <!--Blood tip content-->
            <ul class="nav nav-pills">
              <li class="nav-item">
                <a class="nav-link active" data-toggle="tab" href="#tab1"></a>
              </li>
              <li class="nav-item">
                <a class="nav-link" data-toggle="tab" href="#tab2"></a>
              </li>
              <li class="nav-item">
                <a class="nav-link" data-toggle="tab" href="#tab3"></a>
              </li>
              <li class="nav-item">
                <a class="nav-link" data-toggle="tab" href="#tab4"></a>
              </li>
              <li class="nav-item">
                <a class="nav-link" data-toggle="tab" href="#tab5"></a>
              </li>
            </ul>
            <div class="tab-content mt-1">
              <div class="tab-pane show active" id="tab1" role="tabpanel">
                <p>
                  Donating blood is a life saving measure especially
                  when you have a rare blood type. Blood donation is
                  safe and simple. It takes only about 10 minutes to
                  donate blood - less than the time of an average telephone
                  call. We can save upto 3 to 4 precious lives by donating blood.
                  <br /><br />
                  <b>Who can give blood</b>
                  <br />
                  Most people can give blood. You can give blood if you:
                  <br />
                  <ul style="list-style-type: disc;">
                    <li>You are between age group of 18-60 years</li>
                    <li>Your weight is 45 kgs or more</li>
                    <li>Your last blood donation was 3 or more months earlier</li>
                    <li>You are healthy and have not suffered from malaria, typhoid or other
                      transmissible disease in the recent past</li>
                    </ul>
                  </p>
                </div>
                <div class="tab-pane " id="tab2" role="tabpanel">
                  <p>
                    <b>Facts About Blood</b><br />
                    <ul style="list-style-type: disc;">
                      <li>one unit of donated blood can save up to three lives</li>
                      <li>Blood centers often run short of types O and B red blood cells</li>
                      <li>You can donate blood every three months. It only takes 48 hours for your body fluids to be completely replenished</li>
                      <li>Scientists have estimated the volume of blood in the human body to be eight percent of body weight</li>
                      <li>There are 100,000 miles of blood vessels in an adult human body</li>
                      <li>A red blood cell can make a complete circuit of your body in 30 seconds</li>
                      <li>Red blood cells carry oxygen to the body’s organs and tissues</li>
                      <li>White blood cells make up about 1% of your blood</li>
                      <li>Cancer, transplant and trauma patients, and patients undergoing open-heart surgery may require platelet transfusions to survive</li>
                    </ul>
                  </p>
                </div>
                <div class="tab-pane " id="tab3" role="tabpanel">
                  <p>
                    <b>Before your Donation</b>
                    <ul style="list-style-type: disc;">
                      <li>In the days before your donation, eat healthy, iron-rich foods such as spinach, red meat, fish, poultry, beans, iron-fortified cereals and raisins. This will help maintain a healthy iron level. The number one reason for deferrals is anemia</li>
                      <li>Get a good night’s sleep</li>
                      <li>At least 3 hours before donating, eat a balanced meal and avoid fatty foods, such as hamburgers, fries, or ice cream</li>
                      <li>Drink an extra 16 oz. of water and fluids before the donation; you can be deferred for dehydration</li>
                      <li>Don’t forget to bring a valid government-issued photo ID, a list of medications you are taking</li>
                    </ul>
                  </p>
                </div>
                <div class="tab-pane " id="tab4" role="tabpanel">
                  <p>
                    <b>During your Donation</b>
                    <ul style="list-style-type: disc;">
                      <li>Wear clothing with short sleeves or sleeves that can be raised above the elbow</li>
                      <li>If you have a preference of arm or vein that you like the phlebotomist to use for your donation, let them know</li>
                      <li>Relax, listen to music, talk to others, or watch movies on our comfortable donor lounge chairs designed specifically for apheresis donations</li>
                      <li>Enjoy an assortment of refreshments in our canteen area immediately after donating</li>
                    </ul>
                  </p>
                </div>
                <div class="tab-pane " id="tab5" role="tabpanel">
                  <p>
                    <b>After your Donation</b>
                    <ul style="list-style-type: disc;">
                      <li>Drink plenty of fluids over the next 24-48 hours to replenish any fluids you lost during donation</li>
                      <li>Do not skip any meals and make sure to eat after your donation</li>
                      <li>Avoid strenuous physical activity or heavy lifting for about 24 hours after donation</li>
                      <li>If you feel light headed, lie down, preferably with feet elevated, until the feeling passes</li>
                      <li>If something doesn’t feel right, call the Donor Center’s toll-free number provided to you after your donation</li>
                      <li>Enjoy your day and know that you have made a positive difference!</li>
                    </ul>
                  </p>
                </div>
              </div>

            </div>

        <div class="col-lg-5 col-md-5 nopadding btimg">          <!--blood tip img-->
          <img src="images/bloodtip1" class="rounded img-fluid" alt="Donate Blood" />
        </div>
      </div>
      </div>
    </div>

    <div class="learn_blood">
      <div class="container-sm nopadding">                  <!--learn about blood-->
        <div class="row learnrow1">                      <!--learn blood heading-->
          <div class="col-lg-12 nopadding column1">
          <h1>Learn About Blood</h1>
          </div>
        </div>

        <div class="row learnrow2">
          <div class="col-lg-6 col-md-6 nopadding tableimgbox">                <!--learn blood img-->
          <img src="images/blood_type.jpg" class="img-fluid rounded" alt="Blood type">
          </div>

          <div class="col-lg-6 col-md-6 col-sm-12 nopadding tablebox">               <!--learn blood table-->
            <table class="table table-bordered learntable">
              <thead>
                <tr class="tr1">
                  <th colspan="3">Compatible Blood Type Donors</th>
                </tr>
                <tr>
                  <th>Blood Type</th>
                  <th>Donate Blood To</th>
                  <th>Receive Blood From</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <td class="bgcolor">A+</td>
                  <td>A+ AB+</td>
                  <td>A+ A- O+ O-</td>
                </tr>
                <tr>
                  <td class="bgcolor">O+</td>
                  <td>O+ A+ B+ AB+</td>
                  <td>O+ O-</td>
                </tr>
                <tr>
                  <td class="bgcolor">B+</td>
                  <td>B+ AB+</td>
                  <td>B+ B- O+ O-</td>
                </tr>
                <tr>
                  <td class="bgcolor">AB+</td>
                  <td>AB+</td>
                  <td>Everyone</td>
                </tr>
                <tr>
                  <td class="bgcolor">A-</td>
                  <td>A+ A- AB+ AB-</td>
                  <td>A- O-</td>
                </tr>
                <tr>
                  <td class="bgcolor">O-</td>
                  <td>Everyone</td>
                  <td>O-</td>
                </tr>
                <tr>
                  <td class="bgcolor">B-</td>
                  <td>B+ B- AB+ AB-</td>
                  <td>B- O-</td>
                </tr>
                <tr>
                  <td class="bgcolor">AB-</td>
                  <td>AB+ AB-</td>
                  <td>AB- A- B- O-</td>
                </tr>
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>

    <div class="scroll-content">
      <div class="container-sm nopadding">
        <div class="row">
          <div class="col-lg-4 mb-sm-5 Rdonor">                                      <!--recent Donor-->
            <div class="mainbox">
              <h5>Recent Donors</h5>
              <div class="table-wrapper-scroll-y my-custom-scrollbar">
                <table class="table table-borderless">
                 <thead>
                  <tr>
                    <th hidden></th>
                    <th hidden></th>
                    <th hidden></th>
                  </tr>
                 </thead>

                <tbody>
                  <?php
                  $query = "SELECT * from register WHERE status=1 ORDER BY ID DESC LIMIT 10";
                  $query_run = mysqli_query($conn,$query);

                  if (mysqli_num_rows($query_run) > 0) {
                    while ($row = mysqli_fetch_assoc($query_run)) {
                  ?>
                  <tr class="rowborder">
                    <td><p class="dname"><i class="fas fa-user"></i>&nbsp;&nbsp;
                    <?php echo $row['name'];?></p>
                    <i class="fas fa-map-marker-alt"></i>&nbsp;&nbsp;
                    <?php echo $row['city'];?>, <?php echo $row['State'];?></td>
                    <td class="bgroup"><?php echo $row['bgroup'];?></td>
                    <td>
                      <button class="btn btn-white viewbtn" data-toggle="modal" data-target="#myModal<?php echo $row['ID'];?>">View</button>

                      <!---Modal start-->
                      <div class="modal" id="myModal<?php echo $row['ID']; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true"tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                          <div class="modal-content">

                            <!-- Modal Header -->
                            <div class="modal-header">
                              <h5 class="modal-title">Details</h5>
                              <button type="button" class="close" data-dismiss="modal">&times;</button>
                            </div>

                            <!-- Modal body -->
                            <div class="modal-body" style="text-align:left;">
                              <table class="table table-bordered">
                                <tr class="rowborder">
                                  <th width="45%">Title</th>
                                  <th width="55%">Details</th>
                                </tr>

                                <tr>
                                  <td>Name</td>
                                  <td><?php echo $row['name']; ?></td>
                                </tr>
                                <tr>
                                  <td>Email</td>
                                  <td><?php echo $row['email']; ?></td>
                                </tr>
                                <tr>
                                  <td>Date of Birth (MM-DD-YYYY)</td>
                                  <td><?php echo $row['birth']; ?></td>
                                </tr>
                                <tr>
                                  <td>Age</td>
                                  <td><?php echo $row['age']; ?></td>
                                </tr>
                                <tr>
                                  <td>Gender</td>
                                  <td><?php echo $row['gender']; ?></td>
                                </tr>
                                <tr>
                                  <td>Blood Group</td>
                                  <td><?php echo $row['bgroup']; ?></td>
                                </tr>
                                <tr>
                                  <td>Weight</td>
                                  <td><?php echo $row['weight']; ?></td>
                                </tr>
                                <tr>
                                  <td>Phone</td>
                                  <td><?php echo $row['phone']; ?></td>
                                </tr>
                                <tr>
                                  <td>Mobile</td>
                                  <td><?php echo $row['mobile']; ?></td>
                                </tr>
                                <tr>
                                  <td>Address</td>
                                  <td><?php echo $row['address']; ?></td>
                                </tr>
                                <tr>
                                  <td>State</td>
                                  <td><?php echo $row['State']; ?></td>
                                </tr>
                                <tr>
                                  <td>City</td>
                                  <td><?php echo $row['city']; ?></td>
                                </tr>
                                <tr>
                                  <td>Last Donated Date (YYYY-MM-DD)</td>
                                  <td><?php echo $row['donated_date']; ?></td>
                                </tr>
                              </table>
                            </div>
                            <!-- Modal footer -->
                            <div class="modal-footer">
                              <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                            </div>

                          </div>
                        </div>
                      </div>
                    </td>

                  </tr>
                  <?php }} ?>
                </tbody>
                </table>

              </div>
            </div>
          </div>

          <div class="col-lg-4 mb-sm-5 Rdonor">                                      <!--Patient Request-->
            <div class="mainbox">
              <h5>Patient Request</h5>
              <div class="table-wrapper-scroll-y my-custom-scrollbar">
                <table class="table table-borderless">
                 <thead>
                  <tr>
                    <th hidden></th>
                    <th hidden></th>
                    <th hidden></th>
                  </tr>
                 </thead>

                <tbody>
                  <?php
                  $query = "SELECT * from requestblood WHERE status=1 ORDER BY ID DESC LIMIT 10";
                  $query_run = mysqli_query($conn,$query);

                  if (mysqli_num_rows($query_run) > 0) {
                    while ($row = mysqli_fetch_assoc($query_run)) {
                  ?>
                  <tr class="rowborder">
                    <td><p class="dname"><i class="fas fa-user"></i>&nbsp;&nbsp;
                    <?php echo $row['Pname'];?></p>
                    <i class="fas fa-map-marker-alt"></i>&nbsp;&nbsp;
                    <?php echo $row['city'];?>, <?php echo $row['state'];?></td>
                    <td class="bgroup"><?php echo $row['bgroup'];?></td>
                    <td>
                      <button class="btn btn-white viewbtn" data-toggle="modal" data-target="#myModal2<?php echo $row['ID'];?>">View</button>

                      <!---Modal start-->
                      <div class="modal" id="myModal2<?php echo $row['ID']; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true"tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                          <div class="modal-content">

                            <!-- Modal Header -->
                            <div class="modal-header">
                              <h5 class="modal-title">Details</h5>
                              <button type="button" class="close" data-dismiss="modal">&times;</button>
                            </div>

                            <!-- Modal body -->
                            <div class="modal-body" style="text-align:left;">
                              <table class="table table-bordered">
                                <tr class="rowborder">
                                  <th width="45%">Title</th>
                                  <th width="55%">Details</th>
                                </tr>

                                <tr>
                                  <td>Patient Name</td>
                                  <td><?php echo $row['Pname']; ?></td>
                                </tr>
                                <tr>
                                  <td>Gender</td>
                                  <td><?php echo $row['gender']; ?></td>
                                </tr>
                                <tr>
                                  <td>Blood Group</td>
                                  <td><?php echo $row['bgroup']; ?></td>
                                </tr>
                                <tr>
                                  <td>Age</td>
                                  <td><?php echo $row['age']; ?></td>
                                </tr>
                                <tr>
                                  <td>State</td>
                                  <td><?php echo $row['state']; ?></td>
                                </tr>
                                <tr>
                                  <td>City</td>
                                  <td><?php echo $row['city']; ?></td>
                                </tr>
                                <tr>
                                  <td>Address</td>
                                  <td><?php echo $row['address']; ?></td>
                                </tr>
                                <tr>
                                  <td>Doctor's Name</td>
                                  <td><?php echo $row['Dname']; ?></td>
                                </tr>
                                <tr>
                                  <td>Contact Name</td>
                                  <td><?php echo $row['Cname']; ?></td>
                                </tr>
                                <tr>
                                  <td>Email</td>
                                  <td><?php echo $row['email']; ?></td>
                                </tr>
                                <tr>
                                  <td>Contact No.</td>
                                  <td><?php echo $row['mobile']; ?></td>
                                </tr>
                                <tr>
                                  <td>Message</td>
                                  <td><?php echo $row['message']; ?></td>
                                </tr>
                                <tr>
                                  <td>Date of Request (YYYY-MM-DD)</td>
                                  <td><?php echo $row['date']; ?></td>
                                </tr>
                              </table>
                            </div>
                            <!-- Modal footer -->
                            <div class="modal-footer">
                              <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                            </div>

                          </div>
                        </div>
                      </div>
                    </td>

                  </tr>
                  <?php }} ?>
                </tbody>
                </table>

              </div>
            </div>
          </div>

          <div class="col-lg-4">                                      <!--blood camps-->
            <div class="mainbox">
              <h5>Blood Camps</h5>
              <div class="table-wrapper-scroll-y my-custom-scrollbar">
                <table class="table table-borderless">
                 <thead>
                  <tr>
                    <th hidden></th>
                    <th hidden></th>
                    <th hidden></th>
                  </tr>
                 </thead>

                <tbody>
                  <?php
                  $query = "SELECT * from bloodcamp WHERE status=1 ORDER BY ID DESC LIMIT 10";
                  $query_run = mysqli_query($conn,$query);

                  if (mysqli_num_rows($query_run) > 0) {
                    while ($row = mysqli_fetch_assoc($query_run)) {
                  ?>
                  <tr class="rowborder">
                    <td><p class="dname"><i class="fas fa-tint"></i>&nbsp;&nbsp;
                    <?php echo $row['title'];?></p>
                    <i class="fas fa-map-marker-alt"></i>&nbsp;&nbsp;
                    <?php echo $row['city'];?>, <?php echo $row['state'];?></td>
                    <td>
                      <button class="btn btn-white viewbtn" data-toggle="modal" data-target="#myModal3<?php echo $row['ID'];?>">View</button>

                      <!---Modal start-->
                      <div class="modal" id="myModal3<?php echo $row['ID']; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true"tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                          <div class="modal-content">

                            <!-- Modal Header -->
                            <div class="modal-header">
                              <h5 class="modal-title">Details</h5>
                              <button type="button" class="close" data-dismiss="modal">&times;</button>
                            </div>

                            <!-- Modal body -->
                            <div class="modal-body" style="text-align:left;">
                              <table class="table table-bordered">
                                <tr class="rowborder">
                                  <th width="45%">Title</th>
                                  <th width="55%">Details</th>
                                </tr>

                                <tr>
                                  <td>Camp Title</td>
                                  <td><?php echo $row['title']; ?></td>
                                </tr>
                                <tr>
                                  <td>Organised By</td>
                                  <td><?php echo $row['organised']; ?></td>
                                </tr>
                                <tr>
                                  <td>Date of Camp (YYYY-MM-DD)</td>
                                  <td><?php echo $row['campdate']; ?></td>
                                </tr>
                                <tr>
                                  <td>Mobile No.</td>
                                  <td><?php echo $row['mobile']; ?></td>
                                </tr>
                                <tr>
                                  <td>State</td>
                                  <td><?php echo $row['state']; ?></td>
                                </tr>
                                <tr>
                                  <td>City</td>
                                  <td><?php echo $row['city']; ?></td>
                                </tr>
                                <tr>
                                  <td>Address</td>
                                  <td><?php echo $row['address']; ?></td>
                                </tr>
                                <tr>
                                  <td>Any Details</td>
                                  <td><?php echo $row['details']; ?></td>
                                </tr>
                              </table>
                            </div>
                            <!-- Modal footer -->
                            <div class="modal-footer">
                              <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                            </div>

                          </div>
                        </div>
                      </div>
                    </td>

                  </tr>
                  <?php }} ?>
                </tbody>
                </table>

              </div>
            </div>
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
        <div class="col-lg-3 col-md-12 social_icon hidedesk nopadding">
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
<script src="js/default_datatable.js"></script>
<script src="https://code.jquery.com/jquery-3.3.1.js"></script>
<script src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap4.min.js"></script>
<script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>


<!--Geodata js-->
<script src="//geodata.solutions/includes/statecity.js"></script>
