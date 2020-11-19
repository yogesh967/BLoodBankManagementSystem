<?php
include('../include/connection.php');
session_start();
if(isset($_POST['Apost'])) {
  $id = $_SESSION['bbid'];
  $Apositive = mysqli_real_escape_string($conn,trim($_POST['Apositive']));
  $query21 = "UPDATE blood_stock SET Aptve='$Apositive' WHERE BB_ID='$id'";
  $query_run21 = mysqli_query($conn,$query21);
  if ($query_run21) {
    $_SESSION['success'] = "Your data is updated";
    header("location:updatestock.php");
  }
  else {
    $_SESSION['status'] = "Your data is NOT updated";
    header("location:updatestock.php");
  }
}

if(isset($_POST['Bpost'])) {
  $id = $_SESSION['bbid'];
  $Bpositive = mysqli_real_escape_string($conn,trim($_POST['Bpositive']));
  $query22 = "UPDATE blood_stock SET Bptve='$Bpositive' WHERE BB_ID='$id'";
  $query_run22 = mysqli_query($conn,$query22);
  if ($query_run22) {
    $_SESSION['success'] = "Your data is updated";
    header("location:updatestock.php");
  }
  else {
    $_SESSION['status'] = "Your data is NOT updated";
    header("location:updatestock.php");
  }
}

if(isset($_POST['Opost'])) {
  $id = $_SESSION['bbid'];
  $Opositive = mysqli_real_escape_string($conn,trim($_POST['Opositive']));
  $query23 = "UPDATE blood_stock SET Optve='$Opositive' WHERE BB_ID='$id'";
  $query_run23 = mysqli_query($conn,$query23);
  if ($query_run23) {
    $_SESSION['success'] = "Your data is updated";
    header("location:updatestock.php");
  }
  else {
    $_SESSION['status'] = "Your data is NOT updated";
    header("location:updatestock.php");
  }
}

if(isset($_POST['Anegt'])) {
  $id = $_SESSION['bbid'];
  $Anegative = mysqli_real_escape_string($conn,trim($_POST['Anegative']));
  $query24 = "UPDATE blood_stock SET Antve='$Anegative' WHERE BB_ID='$id'";
  $query_run24 = mysqli_query($conn,$query24);
  if ($query_run24) {
    $_SESSION['success'] = "Your data is updated";
    header("location:updatestock.php");
  }
  else {
    $_SESSION['status'] = "Your data is NOT updated";
    header("location:updatestock.php");
  }
}

if(isset($_POST['Bnegt'])) {
  $id = $_SESSION['bbid'];
  $Bnegative = mysqli_real_escape_string($conn,trim($_POST['Bnegative']));
  $query25 = "UPDATE blood_stock SET Bntve='$Bnegative' WHERE BB_ID='$id'";
  $query_run25 = mysqli_query($conn,$query25);
  if ($query_run25) {
    $_SESSION['success'] = "Your data is updated";
    header("location:updatestock.php");
  }
  else {
    $_SESSION['status'] = "Your data is NOT updated";
    header("location:updatestock.php");
  }
}

if(isset($_POST['Onegt'])) {
  $id = $_SESSION['bbid'];
  $Onegative = mysqli_real_escape_string($conn,trim($_POST['Onegative']));
  $query26 = "UPDATE blood_stock SET Ontve='$Onegative' WHERE BB_ID='$id'";
  $query_run26 = mysqli_query($conn,$query26);
  if ($query_run26) {
    $_SESSION['success'] = "Your data is updated";
    header("location:updatestock.php");
  }
  else {
    $_SESSION['status'] = "Your data is NOT updated";
    header("location:updatestock.php");
  }
}

if(isset($_POST['ABpost'])) {
  $id = $_SESSION['bbid'];
  $ABpositive = mysqli_real_escape_string($conn,trim($_POST['ABpositive']));
  $query27 = "UPDATE blood_stock SET ABptve='$ABpositive' WHERE BB_ID='$id'";
  $query_run27 = mysqli_query($conn,$query27);
  if ($query_run27) {
    $_SESSION['success'] = "Your data is updated";
    header("location:updatestock.php");
  }
  else {
    $_SESSION['status'] = "Your data is NOT updated";
    header("location:updatestock.php");
  }
}

if(isset($_POST['ABnegt'])) {
  $id = $_SESSION['bbid'];
  $ABnegative = mysqli_real_escape_string($conn,trim($_POST['ABnegative']));
  $query28 = "UPDATE blood_stock SET ABntve='$ABnegative' WHERE BB_ID='$id'";
  $query_run28 = mysqli_query($conn,$query28);
  if ($query_run28) {
    $_SESSION['success'] = "Your data is updated";
    header("location:updatestock.php");
  }
  else {
    $_SESSION['status'] = "Your data is NOT updated";
    header("location:updatestock.php");
  }
}

?>
