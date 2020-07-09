<?php include("head.php"); ?>
<?php include("menu.php"); ?>
<!DOCTYPE html>
<html>
<head>
	<title>SIGN IN | ເຂົ້າສູ່ລະບົບ</title>
</head>
<body>
	<!--alert add complete-->
    <?php if (isset($_GET['add'])) : ?>
      <div class="add-data" data-addata="<?= $_GET['add']; ?>"></div>
    <?php endif; ?>
	<!--alert login fail-->
    <?php if (isset($_GET['action'])) : ?>
      <div class="fail" data-fail="<?= $_GET['action']; ?>"></div>
    <?php endif; ?>
    <div class="card-body p-2">
      <div class="row">
        <div class="col-md-3">
                  
        </div>
            <div class="col-md-8">
              <div class="col-md-9">
                <div class="card card-primary card-outline" style="margin-top: 50px; opacity: 1">
                  <div class="card-body bg-light">
                    <h2 align="center">SIGN IN | ເຂົ້າສູ່ລະບົບ</h2>
                      <div class="col-md-12">
                        <form method="post" action="session.php" enctype="multipart/form-data" id="login" autocomplete="off">
                        <div class="row">
                        	<div class="col-sm-12">
                        		<p align="center">ສະເພາະພະນັກງານ</p>
                        	</div>
                          <div class="col-sm-3">
                            <div class="form-group">
                              <img src="dashboard/img/LOGO_CUT.png" width="100%">
                            </div>
                          </div>
                          <div class="col-sm-9" style="margin-top: 20px">
                            <div class="form-group">
                              <label>Email</label>
                              <input type="email" class="form-control" placeholder="email"
                              name="username" required>
                            </div>
                            <div class="form-group">
                              <label>Password</label>
                              <input type="password" class="form-control" placeholder="password"
                              name="passwd" required>
                            </div>
                          </div>
                        </div>

                        <!-- text input -->
                        <div class="row">
                          <div class="col-sm-3">
                            <div class="form-group">
                              
                            </div>
                          </div>
                          <div class="col-sm-3">
                            <div class="form-group">
                              <button type="submit" class="btn btn-primary btn-block" name="signin"> 
                                ເຂົ້າສູ່ລະບົບ
                              </button>
                            </div>
                          </div>
                          <div class="col-sm-6">
                            <div class="form-group float-right">
                              <button type="submit" class="btn btn-outline-primary btn-block"> 
                                ລົງທະບຽນນຳໃຊ້
                              </button>
                            </div>
                          </div>
                        </div>

                      </form>
                      </div>
                  </div>
                  <!-- /.card -->
                </div>
              </div>   
            </div>
	    </div>
	  </div>
</body>
</html>

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