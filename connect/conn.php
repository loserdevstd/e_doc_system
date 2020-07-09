<?php
	$dbhost="localhost";
	$dbuser="root";
	$dbpass="";
	$dbname="office";
	//================connect to database================
	$conn=mysqli_connect($dbhost,$dbuser,$dbpass,$dbname) or die("Failed to connect database".mysqli_error($conn));
	mysqli_query($conn,"SET NAMES UTF8");
	//turn off error notice
	  error_reporting(error_reporting() & ~E_NOTICE);
	//vairable change action page
	  $page=$_GET['page'];

	  $page=(isset($_GET['page']) ? $_GET['page'] : '');

	//=========set time zone==================
	date_default_timezone_set("Asia/Bangkok");
	//==========if not upload img=============
	$use_img="../users/img/blank.jpg";
?>