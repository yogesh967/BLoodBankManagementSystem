<?php
include('../include/connection.php');
session_start();
if (isset($_POST['accept_btn'])) {
  $id2 = mysqli_real_escape_string($conn,trim($_POST['request_id']));
  $Rname = mysqli_real_escape_string($conn,trim($_POST['request_name']));
  $Rbgroup = $_POST['request_bgroup'];
  $Runits = mysqli_real_escape_string($conn,trim($_POST['request_units']));
  $Rcontact = mysqli_real_escape_string($conn,trim($_POST['request_contact']));

  $query = "UPDATE reserve_blood SET status='1' WHERE ID='$id2'";
  $query_run = mysqli_query($conn,$query);

  $bbid = $_SESSION['bbid'];

  $bbname = "SELECT * from bbregister WHERE ID = $bbid";
  $bbname_fire = mysqli_query($conn,$bbname);

  $fetch = mysqli_fetch_array($bbname_fire);

  $bbname2 = $fetch['name'];
  $bbcontact2 = $fetch['contact'];
  $bbaddress2 = $fetch['address'];
  $bbstate2 = $fetch['state'];
  $bbcity2 = $fetch['city'];

   if ($query_run) {
     // Authorisation details.
  $username = "yogeshkarande640@gmail.com";
  $hash = "edd641ec432cfc96b09da62029d51f8f4181487a47c4dec20860b1cb7e0caaf2";

    // Config variables. Consult http://api.textlocal.in/docs for more info.
    $test = "0";

    // Data for text message. This is the text message data.
    $sender = "TXTLCL"; // This is who the message appears to be from.
    $numbers = "$Rcontact"; // A single number or a comma-seperated list of numbers
    $message = "Hello $Rname, Your request for Blood Group : $Rbgroup Units : $Runits has been accepted by $bbname2. Please come and collect your blood. \nThank You!!\nAdd: $bbaddress2 $state $city\n Contact: $bbcontact2";
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

     $_SESSION['success'] = "Request Accepted Successfully! Please update the stock for $Rbgroup : $Runits";
     header("location:updatestock.php");
   }

   else {
    $_SESSION['status'] = "ERROR";
    header("reserve-blood.php");

   }

}

   if (isset($_POST['cancel_btn'])) {
     $id2 = mysqli_real_escape_string($conn,trim($_POST['request_id']));
     $Rname = mysqli_real_escape_string($conn,trim($_POST['request_name']));
     $Rcontact = mysqli_real_escape_string($conn,trim($_POST['request_contact']));
     $Rbgroup = $_POST['request_bgroup'];
     $Runits = mysqli_real_escape_string($conn,trim($_POST['request_units']));

     $query = "UPDATE reserve_blood SET status='2' WHERE ID='$id2'";
     $query_run = mysqli_query($conn,$query);

     $bbid = $_SESSION['bbid'];

     $bbname = "SELECT name from bbregister WHERE ID = $bbid";
     $bbname_fire = mysqli_query($conn,$bbname);

     $fetch = mysqli_fetch_array($bbname_fire);

     $bbname2 = $fetch['name'];

      if ($query_run) {
        // Authorisation details.
     $username = "yogeshkarande640@gmail.com";
     $hash = "edd641ec432cfc96b09da62029d51f8f4181487a47c4dec20860b1cb7e0caaf2";

       // Config variables. Consult http://api.textlocal.in/docs for more info.
       $test = "0";

       // Data for text message. This is the text message data.
       $sender = "TXTLCL"; // This is who the message appears to be from.
       $numbers = "$Rcontact"; // A single number or a comma-seperated list of numbers
       $message = "Hello $Rname, Your request for Blood Group : $Rbgroup Units : $Runits has been DENIED by $bbname2. Sorry for inconvenience. \nThank You!!\n$bbname2";
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

        $_SESSION['success'] = "Request Cancel Successfully!";
        header("location:reserve-blood.php");
      }

      else {
       $_SESSION['status'] = "ERROR";
       header("location:reserve-blood.php");

      }
}

if (isset($_POST['claim_btn'])) {
  $id2 = mysqli_real_escape_string($conn,trim($_POST['request_id']));
  $Rname = mysqli_real_escape_string($conn,trim($_POST['request_name']));
  $Rbgroup = mysqli_real_escape_string($conn,trim($_POST['request_bgroup']));
  $Rcontact = mysqli_real_escape_string($conn,trim($_POST['request_contact']));
  $Runits = mysqli_real_escape_string($conn,trim($_POST['request_units']));

  $query = "UPDATE reserve_blood SET status2='CLAIM' WHERE ID='$id2'";
  $query_run = mysqli_query($conn,$query);

  $bbid = $_SESSION['bbid'];

  $bbname = "SELECT name from bbregister WHERE ID = $bbid";
  $bbname_fire = mysqli_query($conn,$bbname);

  $fetch = mysqli_fetch_array($bbname_fire);

  $bbname2 = $fetch['name'];

   if ($query_run) {
    // Authorisation details.
  $username = "yogeshkarande640@gmail.com";
  $hash = "edd641ec432cfc96b09da62029d51f8f4181487a47c4dec20860b1cb7e0caaf2";

    // Config variables. Consult http://api.textlocal.in/docs for more info.
    $test = "0";

    // Data for text message. This is the text message data.
    $sender = "TXTLCL"; // This is who the message appears to be from.
    $numbers = "$Rcontact"; // A single number or a comma-seperated list of numbers
    $message = "Hello $Rname, Your reserved blood for Blood Group : $Rbgroup Units : $Runits has been claimed. Thank you for show trust on us. When you need blood we are here. \nThank You!!\n$bbname2";
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

     $_SESSION['success'] = "Blood Claim by $Rname $Rbgroup : $Runits";
     header("location:reserve-blood.php");
   }

   else {
    $_SESSION['status'] = "ERROR";
    header("location:reserve-blood.php");

   }
}

if (isset($_POST['notclaim_btn'])) {
  $id2 = mysqli_real_escape_string($conn,trim($_POST['request_id']));
  $Rname = mysqli_real_escape_string($conn,trim($_POST['request_name']));
  $Rbgroup = mysqli_real_escape_string($conn,trim($_POST['request_bgroup']));
  $Rcontact = mysqli_real_escape_string($conn,trim($_POST['request_contact']));
  $Runits = mysqli_real_escape_string($conn,trim($_POST['request_units']));

  $query = "UPDATE reserve_blood SET status2='NOT CLAIM' WHERE ID='$id2'";
  $query_run = mysqli_query($conn,$query);

  $bbid = $_SESSION['bbid'];

  $bbname = "SELECT name from bbregister WHERE ID = $bbid";
  $bbname_fire = mysqli_query($conn,$bbname);

  $fetch = mysqli_fetch_array($bbname_fire);

  $bbname2 = $fetch['name'];

   if ($query_run) {
     // Authorisation details.
   $username = "yogeshkarande640@gmail.com";
   $hash = "edd641ec432cfc96b09da62029d51f8f4181487a47c4dec20860b1cb7e0caaf2";

     // Config variables. Consult http://api.textlocal.in/docs for more info.
     $test = "0";

     // Data for text message. This is the text message data.
     $sender = "TXTLCL"; // This is who the message appears to be from.
     $numbers = "$Rcontact"; // A single number or a comma-seperated list of numbers
     $message = "Hello $Rname, You reserved blood for Blood Group : $Rbgroup Units : $Runits has NOT been claimed yet. So your reservation have been canceled. \n$bbname2";
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

     $_SESSION['success'] = "Blood NOT Claim by $Rname. Please update the stock for $Rbgroup : $Runits";
     header("location:updatestock.php");
   }

   else {
    $_SESSION['status'] = "ERROR";
    header("location:reserve-blood.php");

   }
}

?>
