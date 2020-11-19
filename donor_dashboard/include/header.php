<?php
session_start();
error_reporting(0);
include('connection.php');
if(strlen($_SESSION['did'] AND $_SESSION['dname'])==0)
	{
header('location:../login.php');
}
?>
<div class="brand clearfix">
	<a href="dashboard.php">
		<img src="../images/logo.png" alt="Life Source blood bank system" class="logo_img" />
	</a>
		<span class="menu-btn"><i class="fas fa-bars"></i></span>
		<ul class="ts-profile-nav">

			<li class="ts-account">
				<a href="#">
					<i class="fas fa-user-circle"></i>&nbsp;&nbsp;
					<?php echo $_SESSION['dname'];?>&nbsp;&nbsp;
					<i class="fas fa-angle-down"></i></a>
				<ul>
					<li><a href="change-password.php"><i class="fas fa-key"></i>&nbsp;&nbsp;Change Password</a></li>
					<li><a href="logout.php"><i class="fas fa-sign-out-alt"></i>&nbsp;&nbsp;Logout</a></li>
				</ul>
			</li>
		</ul>
	</div>
