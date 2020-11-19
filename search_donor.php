<?php
$conn = new PDO("mysql:host=localhost;dbname=registerdonor", "root", "");

$city = '';
$query = "SELECT DISTINCT city FROM register ORDER BY city ASC";
$statement = $conn->prepare($query);
$statement->execute();
$result = $statement->fetchAll();
foreach($result as $row)
{
 $city .= '<option value="'.$row['city'].'">'.$row['city'].'</option>';
}

?>
<?php
include('include/connection.php');
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Search donor | Life Source Blood Bank</title>

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
    <script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css">
    <script src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap4.min.js"></script>

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
            <a class="nav-link active" href="search_donor.php">Search Donor</a>
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

    <div class="searchD">                                               <!--Search donor-->
      <div class="container-sm search_cont nopadding">
        <div class="row">                               <!--Heading-->
          <div class="col-lg-12 col-md-12 col-sm-12 col-12">
            <h1>Search Donor</h1>
          </div>
        </div>

        <div class="row">                               <!--search box-->
          <div class="col-lg-5 col-md-5 col-sm-5 col-12 blood_group">
            <div class="form-group">
            <label for="filter_bgroup" class="search_label">Blood Group</label>
            <select class="form-control" name="filter_bgroup" id="filter_bgroup" required>
              <option selected>Select</option>
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
          </div>

          <div class="col-lg-5 col-md-5 col-sm-5 col-12 city">
            <div class="form-group">
              <label for="filter_city" class="search_label">City</label>
              <select name="filter_city" id="filter_city" class="form-control" required>
                <option value="">Select City</option>
                <?php echo $city; ?>
              </select>
            </div>
          </div>

          <div class="col-lg-2 col-md-2 col-sm-2 col-12 nopadding searchbtn">
            <div class="form-group">
              <button type="submit" name="search" id="search" class="btn btn-danger btnsearch">
                Search
              </button>
            </div>
          </div>
        </div>

        <div class="row data_table">                            <!--data table-->
          <div class="col-lg-12 nopadding">
            <div class="table-responsive">
              <table id="donor_data" class="table table-bordered table-striped table-hover">
               <thead>
                <tr>
                 <th width="20%">Name</th>
                 <th>Email</th>
                 <th>Birth (MM-DD-YYYY)</th>
                 <th>Age</th>
                 <th>Gender</th>
                 <th>Blood Group</th>
                 <th>Weight</th>
                 <th>Phone</th>
                 <th>Mobile No.</th>
                 <th>Address</th>
                 <th>State</th>
                 <th>City</th>
                </tr>
               </thead>
               <tfoot>
                 <tr>
                  <th>Name</th>
                  <th>Email</th>
                  <th>Birth (MM-DD-YYYY)</th>
                  <th>Age</th>
                  <th>Gender</th>
                  <th>Blood Group</th>
                  <th>Weight</th>
                  <th>Phone</th>
                  <th>Mobile</th>
                  <th>Address</th>
                  <th>State</th>
                  <th>City</th>
                 </tr>
               </tfoot>
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

<!--table javascript-->

<script type="text/javascript" language="javascript" >
 $(document).ready(function(){

  fill_datatable();

  function fill_datatable(filter_bgroup = '', filter_city = '')
  {
   var dataTable = $('#donor_data').DataTable({
    "processing" : true,
    "serverSide" : true,
    "order" : [],
    "searching" : false,
    "ajax" : {
     url:"search_donorcon.php",
     type:"POST",
     data:{
      filter_bgroup:filter_bgroup, filter_city:filter_city
     }
    }
   });
  }

  $('#search').click(function(){
   var filter_bgroup = $('#filter_bgroup').val();
   var filter_city = $('#filter_city').val();
   if(filter_bgroup != '' && filter_city != '')
   {
    $('#donor_data').DataTable().destroy();
    fill_datatable(filter_bgroup, filter_city);
   }
   else
   {
    alert('Select Both filter option');
    $('#donor_data').DataTable().destroy();
    fill_datatable();
   }
  });


 });

</script>
