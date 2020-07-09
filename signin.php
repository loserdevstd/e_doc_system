<?php include("head.php"); ?>

<script type="text/javascript">
  $(document).ready(function(){  
  var form_count = 1, form_count_form, next_form, total_forms;
  total_forms = $("fieldset").length;  
  $(".next").click(function(){
    form_count_form = $(this).parent();
    next_form = $(this).parent().next();
    next_form.show();
     form_count_form.hide();
  });  
});
</script>

<style type="text/css">
  #signin_frm fieldset:not(:first-of-type) {
    display: none;
  }
</style>

<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Sing in | ເຂົ້າສູ່ລະບົບ</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">
</head>
<body class="hold-transition lockscreen">
<!-- Automatic element centering -->
<div class="lockscreen-wrapper">
  <div class="lockscreen-logo">
    <a href="#"><b>ເຂົ້າສູ່ລະບົບ</b></a>
  </div>
  <!-- User name -->
  <div class="lockscreen-name">ສະເພາະ ພະນັກງານ</div>

  <!-- START LOCK ITEM -->
  <div class="lockscreen-item">
    <!-- lock image -->
    <div class="lockscreen-image">
      <img src="img/IMG_3409.png" alt="User Image">
    </div>
    <!-- /.lock-image -->

    <!-- locks credentials (contains the form) -->
    <form id="signin_frm" class="lockscreen-credentials" method="post" action="session.php">
      <fieldset>
      <div class="input-group">
        <input type="text" class="form-control" placeholder="Username" name="username">

        <div class="input-group-append">
          <button type="button" class="next btn">
            <i class="fas fa-arrow-right text-muted"></i>
          </button>
        </div>
      </div>
      </fieldset>

      <fieldset>
      <div class="input-group">
        <input type="password" class="form-control" placeholder="Password" name="passwd">

        <div class="input-group-append">
          <button type="submit" class="btn">
            <i class="fas fa-arrow-right text-muted"></i>
          </button>
        </div>
      </div>
      </fieldset>
    </form>
    <!-- /.lock credentials -->

  </div>
  <!-- /.lockscreen-item -->
  <div class="help-block text-center">
    Enter your password to retrieve your session
  </div>
  <div class="text-center">
    ພະນັກງານໃໝ່<a href="login.html">ລົງທະບຽນນຳໃຊ້</a>
  </div>
  <div class="lockscreen-footer text-center">
    Copyright &copy; <?php echo date('Y'); ?> <b><a href="3" class="text-black">ຫ້ອງການສັງລວມ ແລະ ຮ່ວມມື</a></b><br>
    All rights reserved
  </div>
</div>
<!-- /.center -->

<!-- jQuery -->
<!-- jQuery -->
<script src="assets/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- DataTables -->
<script src="assets/plugins/datatables/jquery.dataTables.js"></script>
<script src="assets/plugins/datatables-bs4/js/dataTables.bootstrap4.js"></script>
<script src="assets/plugins/bootstrap-tagsinput/tagsinput.js?v=1"></script>
<!-- Select2 -->
<!-- http://fordev22.com/ -->
<script src="assets/plugins/select2/js/select2.full.min.js"></script>

<!-- AdminLTE App -->
<script src="assets/dist/js/adminlte.min.js"></script>
</body>
</html>