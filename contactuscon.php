<?php

include('include/connection.php');
session_start();
if(isset($_POST['submit'])) {
$name = mysqli_real_escape_string($conn,trim($_POST['name']));
$email = mysqli_real_escape_string($conn,trim($_POST['email']));
$mobile = mysqli_real_escape_string($conn,trim($_POST['mobile']));
$message = mysqli_real_escape_string($conn,trim($_POST['message']));

$sql = "INSERT INTO contactus (name, email, mobile, message, status)
VALUES ('$name', '$email', '$mobile', '$message','0')";

if (mysqli_query($conn, $sql)) {
  $_SESSION['success'] = "Successfully Submited";
  header("Location:contact-us.php");
} else {
  $_SESSION['status'] = "Failed";
  header("Location:contact-us.php");
}


}

 ?>
