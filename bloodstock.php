<?php
include('include/connection.php');
session_start();
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>blood Stock | Life Source Blood Bank</title>

    <!--========= css link =============-->
    <link rel="stylesheet" href="css/bootstrap.min.css">  <!--Bootstrap CSS-->
    <link rel="stylesheet" href="css/search_donor.css">

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

    <style>
    .errorWrap {
    width: 100%;
    padding: 10px;
    margin: 0 0 20px 0;
    text-align: left;
    background: #fff;
    border-left: 4px solid #dd3d36;
    -webkit-box-shadow: 0 1px 1px 0 rgba(0,0,0,.1);
    box-shadow: 0 1px 1px 0 rgba(0,0,0,.1);
    }
    .succWrap{
      width: 100%;
      padding: 10px;
      margin: 0 0 20px 0;
      background: #fff;
      text-align: left;
      border-left: 4px solid #5cb85c;
      -webkit-box-shadow: 0 1px 1px 0 rgba(0,0,0,.1);
      box-shadow: 0 1px 1px 0 rgba(0,0,0,.1);
    }
    sup {
      color : red;
    }

    .error_label{
      padding-top: 5px;
      color : red;
    }

    </style>
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
              <a class="dropdown-item active" href="bloodstock.php">Blood Stock</a>
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

    <div class="searchD">                                               <!--Search donor-->
      <div class="container-sm search_cont nopadding">
        <div class="row">                               <!--Heading-->
          <div class="col-lg-12">
            <h1>Blood Stock</h1>
          </div>
        </div>

        <div class="row">                            <!--data table-->
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
          <div class="col-lg-12 nopadding">
            <div class="table-responsive">
              <?php
              $query = "SELECT * from blood_stock";
              $query_run = mysqli_query($conn,$query);
              $cnt=1;
              ?>
              <table id="example" class="table table-bordered table-striped table-hover">

               <thead>
                <tr style="text-align: left;">
                  <th>#</th>
                  <th width="25%">Blood Bank</th>
                  <th width="20%">Contact</th>
                  <th>Category</th>
                  <th>Availability(Units)</th>
                  <th>Action</th>
                </tr>
               </thead>

               <tfoot>
                <tr style="text-align: left;">
                  <th>#</th>
                  <th>Blood Bank</th>
                  <th>Contact</th>
                  <th>Category</th>
                  <th>Availability(Units)</th>
                  <th>Action</th>
                </tr>
              </tfoot>

              <tbody>
                <?php
                if (mysqli_num_rows($query_run) > 0) {
                  while ($row = mysqli_fetch_assoc($query_run)) {
                ?>
                <tr style="text-align: left;">
                  <td>
                    <input type="hidden" name="bb_id" value="<?php echo $row['BB_ID']; ?>">
                    <?php echo htmlentities($cnt); ?></td>
                  <td><?php echo $row['info1']; ?></td>
                  <td><?php echo $row['info2']; ?></td>
                  <td><?php echo $row['info3']; ?></td>
                  <td style="font-weight: bold;">
                    <span class="bglabel">A+:</span> <?php echo $row['Aptve']; ?> <span class="bglabel">B+:</span> <?php echo $row['Bptve']; ?>
                    <span class="bglabel">O+:</span> <?php echo $row['Optve']; ?> <span class="bglabel">A-:</span> <?php echo $row['Antve']; ?>
                    <span class="bglabel">B-:</span> <?php echo $row['Bntve']; ?> <span class="bglabel">O-:</span> <?php echo $row['Ontve']; ?>
                    <span class="bglabel">AB+:</span> <?php echo $row['ABptve']; ?> <span class="bglabel">AB-:</span> <?php echo $row['ABntve']; ?>
                  </td>

                  <td>
                  <button name="request_btn" class="btn btn-primary" data-toggle="modal" data-target="#myModal<?php echo $row['BB_ID']; ?>">
                    Reserve
                  </button>

                  <!-- The Modal -->
                  <div class="modal" id="myModal<?php echo $row['BB_ID']; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true"tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                      <div class="modal-content">

                        <!-- Modal Header -->
                        <div class="modal-header">
                          <h5 class="modal-title">Reserve Blood</h5>
                          <button type="button" class="close" data-dismiss="modal">&times;</button>
                        </div>

                        <!-- Modal body -->
                        <div class="modal-body" style="text-align:left;">
                          <form name="form_reserve" action="bloodstockcon.php" method="post">
                            <input type="hidden" name="bbid2" value="<?php echo $row['BB_ID']; ?>">
                            <?php echo $row['info1']; ?>

                            <div class="form-group">
                              <label for="name">Full Name<sup>*</sup></label>
                              <input type="text" name="name" class="form-control" placeholder="Enter full name" required>
                            </div>
                            <div class="form-group">
                              <label for="contact">Contact No<sup>*</sup></label>
                              <input type="tel" pattern="[0-9]{10}" name="contact" title="Contact Number"class="form-control" placeholder="Enter contact no." required />
                            </div>
                            <div class="form-group">
                              <label for="email">Email ID<sup>*</sup></label>
                              <input type="email" name="email" class="form-control" placeholder="Enter email id" required>
                            </div>
                            <div class="form-group">
                              <label for="bloodg">Blood Group<sup>*</sup></label>
                              <select class="form-control" id="bloodg" name="bloodg" required>
                                <option selected disabled>Select</option>
                                <option>A+</option>
                                <option>B+</option>
                                <option>O+</option>
                                <option>A-</option>
                                <option>B-</option>
                                <option>O-</option>
                                <option>AB+</option>
                                <option>AB-</option>
                              </select>
                            </div>
                            <div class="form-group">
                              <label for="quantity">Quantity(Units)<sup>*</sup></label>
                              <select class="form-control" id="quantity" name="quantity" required>
                                <option selected disabled>Select</option>
                                <option>1</option>
                                <option>2</option>
                                <option>3</option>
                                <option>4</option>
                              </select>

                            </div>
                            <div class="form-group">
                              <input type="submit" name="submit" class="btn btn-primary" value="Submit">
                            </div>
                          </form>
                        </div>
                        <!-- Modal footer -->
                        <div class="modal-footer">
                          <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                        </div>

                      </div>
                    </div>
                  </div>

                  <?php
                  $cnt=$cnt+1;
                  }
                  }
                  else {
                    echo "No Record Found";
                  }
                      ?>
                  </td>
                </tr>

              </tbody>

              </table>

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
<script src="js/default_datatable.js"></script>
<script src="https://code.jquery.com/jquery-3.3.1.js"></script>
<script src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap4.min.js"></script>
<script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>
