<?php
define("HOSTNAME","localhost");
define("USERNAME","root");
define("PASSWORD","");
define("DBNAME","registerdonor");
$conn = mysqli_connect(HOSTNAME,USERNAME,PASSWORD,DBNAME) or die("cannot connect to database");

if(isset($_POST['login'])) {
  $user = mysqli_real_escape_string($conn,trim($_POST['user']));
  $password = mysqli_real_escape_string($conn,trim($_POST['password']));
  $error="";

  $admin = "SELECT * FROM admin_user WHERE username='$user' AND password='$password'";
  $fire_admin =  mysqli_query($conn,$admin);

  if (mysqli_num_rows($fire_admin) != 1) {
    $error = "Invalid username or Password";
    header("Location:index.php?error=".$error);
  }
  else {
    session_start();
    $_SESSION['alogin'] = $_POST['user'];
    header("Location:dashboard.php");
  }

}

 ?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Admin | Life Source Blood Bank</title>

    <!--========= css link =============-->
    <link rel="stylesheet" href="css/bootstrap.min.css">  <!--Bootstrap CSS-->
    <link rel="stylesheet" href="css/admin_style.css">

    <!--font awesome icon-->
<link href="../css/all.css" rel="stylesheet">
    <!--=======================Online link=========================-->
    <!--<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">-->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <!--<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>-->

    <!--favicon link-->
    <link rel="apple-touch-icon" sizes="180x180" href="../images/favicon/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="../images/favicon/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="../images/favicon/favicon-16x16.png">
    <link rel="manifest" href="../images/favicon/site.webmanifest">
    <link rel="mask-icon" href="../images/favicon/safari-pinned-tab.svg" color="#5bbad5">
    <meta name="msapplication-TileColor" content="#ffffff">
    <meta name="theme-color" content="#ffffff">

  </head>
  <body>
    <div class="adminbg full-height">
      <div class="container-sm full-height">
        <div class="row full-height">
          <div class="col-lg-8 admin_login">
            <h2>
            Life Source Blood Bank System<br />
            Admin Login</h2>
            <div class="row">                               <!--login form-->
              <div class="col-lg-6 col-md-5 col-sm-6 col-7 login_form">
                <img src="images/logo_dark.png" alt="Life Source blood bank System" title="Life source blood bank system" />

                <label class="loginacc">Login as a Admin</label>

                  <form name="login_form" action="<?php echo $_SERVER['PHP_SELF']; ?>" onsubmit="return Validate_login()" method="post">
                    <div class="form-group">
                      <div class="input-group">
                        <div class="input-group-addon">
                          <i class="fa fa-user" aria-hidden="true"></i>
                        </div>
                        <input type="text" class="form-control" id="user" name="user" placeholder="Username" />
                      </div>
                      <div id="user_error" class="error_label"></div>
                    </div>

                    <div class="form-group">
                      <div class="input-group">
                        <div class="input-group-addon">
                          <i class="fa fa-key" aria-hidden="true"></i>
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

              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </body>
</html>

<!--========= JS link =============-->
<script src="js/bootstrap.min.js"></script>  <!--Bootstrap JS-->

<!--Validation-->
<script type="text/javascript">
function Validate_login() {
        var user = document.forms["login_form"]["user"];
        var password = document.forms["login_form"]["password"];



        if (user.value == "")
        {
          document.getElementById('user_error').innerHTML
          = 'Please Enter username';
            user.focus();
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
