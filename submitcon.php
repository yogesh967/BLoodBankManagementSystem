
<?php
include('include/connection.php');
session_start();

//Donor Register
if(isset($_POST['register_btn'])) {
$name = mysqli_real_escape_string($conn,trim($_POST['name']));
$password = mysqli_real_escape_string($conn,trim($_POST['password']));
$email = mysqli_real_escape_string($conn,trim($_POST['email']));
$birth = mysqli_real_escape_string($conn,trim($_POST['birth']));
$age = mysqli_real_escape_string($conn,trim($_POST['age']));
$gender = $_POST['gender'];
$weight = mysqli_real_escape_string($conn,trim($_POST['weight']));
$bgroup = $_POST['bgroup'];
$phone = mysqli_real_escape_string($conn,trim($_POST['phone']));
$mobile = mysqli_real_escape_string($conn,trim($_POST['mobile']));
$address = mysqli_real_escape_string($conn,trim($_POST['address']));
$state = $_POST['state'];
$city = $_POST['city'];
$email_valid = $mobile_valid = false;

$sql_e = "SELECT email FROM register WHERE email='$email'";
$sql_m = "SELECT * FROM register WHERE mobile='$mobile'";
$res_e = mysqli_query($conn, $sql_e);
$res_m = mysqli_query($conn, $sql_m);

if (mysqli_num_rows($res_e) > 0) {
  $_SESSION['status'] = "Sorry... email already registered, Try another!";
  header("Location:register.php");

}

else {
  $email_valid = true;
}

if (mysqli_num_rows($res_m) > 0) {
  $_SESSION['status'] = "Sorry... mobile No. already registered, Try another!";

  header("Location:register.php");
}

else {
  $mobile_valid = true;
}



if ($email_valid && $mobile_valid) {
  $query = "INSERT INTO register (name,password,email,birth,age,gender,bgroup,weight,phone,mobile,address,state,city,user,status)
  VALUES ('$name','$password','$email','$birth','$age','$gender','$bgroup',$weight,'$phone','$mobile','$address','$state','$city','Donor','1')";

  $fire = mysqli_query($conn,$query);
  if ($fire) {
    $_SESSION['success'] = "Successfully Registered";
    header("Location:register.php");
  }

  else {
    $_SESSION['status'] = "Registration FAIL";
    header("Location:register.php");
  }
}
}

//Patinet request

if(isset($_POST['request_btn'])) {
$Pname = mysqli_real_escape_string($conn,trim($_POST['Pname']));
$gender = mysqli_real_escape_string($conn,trim($_POST['gender']));
$bgroup = mysqli_real_escape_string($conn,trim($_POST['bgroup']));
$age = mysqli_real_escape_string($conn,trim($_POST['age']));
$state = mysqli_real_escape_string($conn,trim($_POST['state']));
$city = mysqli_real_escape_string($conn,trim($_POST['city']));
$address = mysqli_real_escape_string($conn,trim($_POST['address']));
$Dname = mysqli_real_escape_string($conn,trim($_POST['Dname']));
$Cname = mysqli_real_escape_string($conn,trim($_POST['Cname']));
$email = mysqli_real_escape_string($conn,trim($_POST['email']));
$mobile = mysqli_real_escape_string($conn,trim($_POST['mobile']));
$message = mysqli_real_escape_string($conn,trim($_POST['message']));
$msg = "";

$sql1 = "INSERT INTO requestblood (Pname, gender, bgroup, age, state, city, address, Dname, Cname, email, mobile, message, status)
VALUES ('$Pname', '$gender', '$bgroup', '$age', '$state', '$city', '$address', '$Dname', '$Cname', '$email', '$mobile', '$message', '1')";

if (mysqli_query($conn, $sql1)) {
  $_SESSION['success'] = "Your request is submitted successfully";
  header("location:request-blood.php");
} else {
  $_SESSION['status'] = "Your request is NOT submitted";
  header("location:request-blood.php");
}
}

//Blood Bank Register

if(isset($_POST['bb_btn'])) {
  $name = mysqli_real_escape_string($conn,trim($_POST['name']));
  $password = mysqli_real_escape_string($conn,trim($_POST['password']));
  $email = mysqli_real_escape_string($conn,trim($_POST['email']));
  $Hname = mysqli_real_escape_string($conn,trim($_POST['Hname']));
  $category = $_POST['category'];
  $cpname = mysqli_real_escape_string($conn,trim($_POST['cpname']));
  $contact = mysqli_real_escape_string($conn,trim($_POST['contact']));
  $faxno = mysqli_real_escape_string($conn,trim($_POST['faxno']));
  $license = mysqli_real_escape_string($conn,trim($_POST['license']));
  $fromd = $_POST['fromd'];
  $todate = $_POST['todate'];
  $facility1 = $_POST['facility1'];
  $facility2 = $_POST['facility2'];
  $helpline = mysqli_real_escape_string($conn,trim($_POST['helpline']));
  $website = mysqli_real_escape_string($conn,trim($_POST['website']));
  $state = $_POST['state'];
  $city = $_POST['city'];
  $address = mysqli_real_escape_string($conn,trim($_POST['address']));
  $pincode = mysqli_real_escape_string($conn,trim($_POST['pincode']));
  $fileName = basename($_FILES["upload"]["name"]);

  $email_valid = $contact_valid = $license_valid = false;

  $sql_e = "SELECT email FROM bbregister WHERE email='$email'";
  $sql_m = "SELECT contact FROM bbregister WHERE contact='$contact'";
  $sql_l = "SELECT license FROM bbregister WHERE license='$license'";
  $res_e = mysqli_query($conn, $sql_e);
  $res_m = mysqli_query($conn, $sql_m);
  $res_l = mysqli_query($conn, $sql_l);

  if (mysqli_num_rows($res_e) > 0) {
    $_SESSION['status'] = "Sorry... email already registered, Try another!";
    header("Location:register-bloodbank.php");
  }

  else {
    $email_valid = true;
  }

  if (mysqli_num_rows($res_m) > 0) {
    $_SESSION['status'] = "Sorry... mobile No. already registered, Try another!";

    header("Location:register-bloodbank.php");
  }

  else {
    $mobile_valid = true;
  }

  if (mysqli_num_rows($res_l) > 0) {
    $_SESSION['status'] = "Sorry... License No. already registered, Try another!";

    header("Location:register-bloodbank.php");
  }

  else {
    $license_valid = true;
  }

  $pname = rand(1000,10000)."-".$fileName;

      #temporary file name to store file
      $tname = $_FILES["upload"]["tmp_name"];

       #upload directory path
  $uploads_dir = 'C:/wamp64/www/lifesource/images/certificate';
      #TO move the uploaded file to specific location
      move_uploaded_file($tname, $uploads_dir.'/'.$pname);

  if ($email_valid && $mobile_valid && $license_valid) {
    $query = "INSERT INTO bbregister (name,password,email,Hname,category,cpname,contact,faxno,license,fromd,todate,component,apheresis,helpline,website,certificate,state,city,address,pincode,user,status)
    VALUES ('$name','$password','$email','$Hname','$category','$cpname','$contact','$faxno','$license','$fromd','$todate','$facility1','$facility2','$helpline','$website','$pname','$state','$city','$address',
      '$pincode','bloodbank','0')";

    $fire = mysqli_query($conn,$query);
    if ($fire) {
      $_SESSION['success'] = "Successfully Registered";
      header("Location:register-bloodbank.php");
    }
    else {
      $_SESSION['status'] = "Registration FAIL";
      header("Location:register-bloodbank.php");
    }
  }
}

?>
