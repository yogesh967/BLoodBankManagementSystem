<?php
include('include/connection.php');
session_start();

if (isset($_POST['submit'])) {
  $bbid = mysqli_real_escape_string($conn,trim($_POST['bbid2']));
  $name = mysqli_real_escape_string($conn,trim($_POST['name']));
  $contact = mysqli_real_escape_string($conn,trim($_POST['contact']));
  $email = mysqli_real_escape_string($conn,trim($_POST['email']));
  $bloodg = $_POST['bloodg'];
  $units = mysqli_real_escape_string($conn,trim($_POST['quantity']));
  $query12 = "INSERT INTO reserve_blood (BB_ID, name, contact, email, bgroup, units, status, status2) VALUES ('$bbid', '$name', '$contact', '$email', '$bloodg', '$units' ,'0', '0')";
  $query_fire12 = mysqli_query($conn,$query12);

  $bbname = "SELECT name from bbregister WHERE ID = $bbid";
  $bbname_fire = mysqli_query($conn,$bbname);

  $fetch = mysqli_fetch_array($bbname_fire);

  $bbname2 = $fetch['name'];



  if ($query_fire12) {
    // Authorisation details.
	$username = "yogeshkarande640@gmail.com";
	$hash = "edd641ec432cfc96b09da62029d51f8f4181487a47c4dec20860b1cb7e0caaf2";

		// Config variables. Consult http://api.textlocal.in/docs for more info.
		$test = "0";

		// Data for text message. This is the text message data.
		$sender = "TXTLCL"; // This is who the message appears to be from.
		$numbers = "$contact"; // A single number or a comma-seperated list of numbers
		$message = "Hello $name. Your request has been send to $bbname2 Successfully for Blood Group : $bloodg Units : $units. Attend call for confirmation. \nThank You!!";
		// 612 chars or less
		// A single number or a comma-seperated list of numbers
		$message = urlencode($message);
		$data = "username=".$username."&hash=".$hash."&message=".$message."&sender=".$sender."&numbers=".$numbers."&test=".$test;
		$ch = curl_init('http://api.textlocal.in/send/?');
		curl_setopt($ch, CURLOPT_POST, true);
		curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		$result = curl_exec($ch); // This is the result from the API
		curl_close($ch);

    $_SESSION['success'] = "Your request submitted Successfully";
    header("location:bloodstock.php");


  }

  else {
    $_SESSION['status'] = "Your request is NOT submitted";
    header("location:bloodstock.php");
  }

}
?>
