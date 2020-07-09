<?php include('head.php'); ?>
<?php
  if (empty($user) AND ($user_active==0)) {
    header("Location:../dashboard/signout.php");
  }else{
?>
<?php include ("navbar.php"); ?>
<?php include ("sidebar.php"); ?>
<body class="hold-transition sidebar-mini layout-fixed layout-navbar-fixed text-sm">
<!-- Site wrapper -->
<!-- <div class="wrapper"> -->
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
<?php } ?>