<?php $act="login"; ?>
<?php include("head.php"); ?>
<title>ຫ້ອງການສັງລວມ ແລະ ຮ່ວມມື | ເຂົ້າສູ່ລະບົບ</title>
<body background="dashboard/img/bg_login.png">
<!--alert add complete-->
    <?php if (isset($_GET['add'])) : ?>
      <div class="add-data" data-addata="<?= $_GET['add']; ?>"></div>
    <?php endif; ?>
<!--alert login fail-->
    <?php if (isset($_GET['action'])) : ?>
      <div class="fail" data-fail="<?= $_GET['action']; ?>"></div>
    <?php endif; ?>
<!--start  form login -->
    <div class="container">
      <p></p>
          <h3 align="center"><a href="#">ເຂົ້າສູ່ລະບົບ | ສະເພາະພະນັກງານ</a></h3><br><br><br>
      <div class="row">
        <div class="col-md-4"></div>
        <div class="col-md-4">
          <form id="login" action="session.php" method="post" class="form-horizontal">
            <div class="form-group row">
              <div class="col-sm-3">
                ອີເມວ
              </div>
              <div class="col-sm-9">
                <input type="text" name="username" class="form-control" placeholder="email" required>
              </div>
            </div>
            <div class="form-group row">
              <div class="col-sm-3">
                ລະຫັດ
              </div>
              <div class="col-sm-9">
                <input type="password" name="passwd" class="form-control" placeholder="password" required>
              </div>
            </div>
            <div class="form-group row">
              <div class="col-sm-3">
              </div>
              <div class="col-sm-9">
                <button type="submit" class="btn btn-primary" name="signin">ເຂົ້າສູ່ລະບົບ</button>
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <a href="register.php"> ລົງທະບຽນນຳໃຊ້</a>
              </div>
            </div>
            
          </form>
          
        </div>
        <div class="col-md-4"></div>
      </div>
    </div><br><br><br><br><br><br>
    <!--end  form login -->
</body>
<script>
  //alert add complete
      const addata = $('.add-data').data('addata')
        if (addata) {
          Swal.fire({
            icon: 'success',
            title: 'ລົງທະບຽນນຳໃຊ້ ສຳເລັດແລ້ວ',
            txet: 'ລໍຖ້າການຢືນຢັນຈາກ ຜູ້ດູແລລະບົບ'
          })
        }
    //alert login failed
      const fail = $('.fail').data('fail')
        if (fail) {
          Swal.fire({
            icon: 'error',
            title: 'ອີເມວ ຫຼື ລະຫັດຜ່ານບໍ່ຖືກຕ້ອງ!! ກະລຸນາລອງໃໝ່ອີກຄັ້ງ',
            confirmButtonColor: '#3085d6',
            confirmButtonText: 'ຕົກລົງ',
          })
        }
</script>
<script type="text/javascript">
$(document).ready(function () {
  $('#login').validate({
    rules: {
      username: {
        required: true,
        email: true,
      },
      passwd: {
        required: true,
        minlength: 6
      },
    },
    messages: {
      username: {
        required: "Please enter a email address",
        email: "Please enter a vaild email address"
      },
      password: {
        required: "Please provide a password",
        minlength: "Your password must be at least 6 characters long"
      },
      terms: "Please accept our terms"
    },
    errorElement: 'span',
    errorPlacement: function (error, element) {
      error.addClass('invalid-feedback');
      element.closest('.form-group').append(error);
    },
    highlight: function (element, errorClass, validClass) {
      $(element).addClass('is-invalid');
    },
    unhighlight: function (element, errorClass, validClass) {
      $(element).removeClass('is-invalid');
    }
  });
});
</script>