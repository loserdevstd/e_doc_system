<?php include('head.php'); ?>
<?php include('menu.php'); ?>

<style type="text/css">
  #register fieldset:not(:first-of-type) {
    display: none;
  }
</style>
<section class="content" style="margin-top: 50px">
  <div class="container-fluid">
    <div class="container">
      <div class="row">
        <div class="col-md-1">
        </div>
          <div class="col-md-10">
            <div class="card bg-light"> 
            <div class="card-header bg-primary">
              <h3 class="card-title"><i class="fas fa-edit"></i>* ລົງທະບຽນ ຜູ້ໃຊ້ໃໝ່</h3>
            </div>
                <div class="card-body">
                  <div class="alert alert-danger disabled">
                    <h5><i class="icon fas fa-exclamation-triangle"></i> Alert!</h5>
                  </div>
                  <form id="register" action="users/do_user.php"  method="post"> 
                  <fieldset>
                  <b><h4 align="center">ຂັ້ນຕອນ1: ຂໍ້ມູນພະນັກງານ</h4></b>
                  <div class="form-group row">
                    <label for="username" class="col-sm-2 col-form-label">ຊື່ ແລະ ນາມສະກຸນ</label>
                    <div class="col-sm-10">
                      <input type="text" class="form-control" id="username" name="username" id="username"
                        placeholder="Name & Surname">
                    </div>
                  </div>
                  <div class="form-group row">
                  <label for="passwd" class="col-sm-2 col-form-label">ລະຫັດຜ່ານ</label>
                  <div class="col-sm-10">
                    <input type="password" class="form-control" id="passwd" name="passwd"
                      placeholder="Password">
                  </div>
                </div>
                  <div class="form-group row">
                    <label for="username" class="col-sm-2 col-form-label">ເພດ</label>
                  <div class="col-6 col-lg-2">
                    <div class="custom-control custom-radio my-2">
                      <input type="radio" id="male" name="gender" checked class="custom-control-input" value="1">
                      <label class="custom-control-label" for="male">ເພດຊາຍ</label>
                    </div>
                  </div>
                  <div class="col-6 col-lg-2">
                    <div class="custom-control custom-radio my-2">
                      <input type="radio" id="female" name="gender" class="custom-control-input" value="0">
                      <label class="custom-control-label" for="female">ເພດຍິງ</label>
                    </div>
                  </div>
                </div>
                <div class="form-group row">
                  <label class="col-sm-2 col-form-label">ອາຍຸ</label>
                  <div class="col-sm-10">
                    <input type="number" class="form-control" id="age" name="age" placeholder="Age" maxlength="2">
                  </div>
                </div>
                <div class="form-group row">
                  <label class="col-sm-2 col-form-label">ວັນເດືອນປີເກີດ</label>
                  <div class="col-sm-10">
                    <input type="date" class="form-control" id="bithdate" name="bithdate">
                  </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">ອີເມວ</label>
                    <div class="col-sm-10">
                      <input type="email" class="form-control" id="mail" name="mail" placeholder="E-mail">
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">ເບີໂທ</label>
                    <div class="col-sm-10">
                      <input type="number" class="form-control" id="tel" name="tel" placeholder="(020) ____ ____">
                    </div>
                </div>
                  <input type="button" class="next btn btn-primary" value="ຖັດໄປ" />
                  </fieldset> 
                  
                  <fieldset>
                    <h4 align="center">ຂັ້ນຕອນ2: ຂໍ້ມູນສະເພາະ</h4>
                  <div class="form-group row">
                    <label class="col-sm-2 col-form-label">ຕຳແໜ່ງລັດ</label>
                    <div class="col-sm-10">
                      <select class="form-control" name="functionary" id="functionary">
                        <option>__Select__</option>
                        <option value="1">ພະນັກງານ</option>
                        <option value="2">ພະນັກງານອາສາ</option>
                        <option value="3">ພະນັກງານສັນຍາຈ້າງ</option>
                      </select>
                    </div>
                  </div>
                <div class="form-group row">
                  <label class="col-sm-2 col-form-label">ຕຳແໜ່ງວຽກ</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" name="position" id="position" placeholder="Position">
                  </div>
                </div>
                  <div class="form-group row">
                    <label class="col-sm-2 col-form-label">ພະແນກສັງກັດ</label>
                    <div class="col-sm-10">
                      <?php include('connect/conn.php'); ?>
                        <?php $deplist=mysqli_query($conn, "SELECT * FROM tb_department"); ?>
                        <select class="form-control" name="department" id="department">
                          <option>__Select__</option>
                          <?php while ($row=mysqli_fetch_assoc($deplist)) : ?>
                          <option value="<?php echo($row['dep_id']);?>"><?php echo($row['dep_name']);?></option>
                          <?php endwhile; ?>
                        </select>
                    </div>
                  </div>
                  
                  <div class="form-group row">
                    <label class="col-sm-2 col-form-label">ທີ່ຢູ່</label>
                    <div class="col-sm-10">
                      <input type="text" class="form-control" name="address" placeholder="Village, District, Province" id="address">
                    </div>
                  </div>
                  <div class="form-group row">
                    <label class="col-sm-2 col-form-label">ລະດັບການສຶກສາ</label>
                    <div class="col-sm-10">
                      <select class="form-control" name="degree" id="degree">
                        <option>__Select__</option>
                        <option value="1">ປະລິນຍາຕີ</option>
                        <option value="2">ປະລິນຍາໂທ</option>
                        <option value="3">ປະລິນຍາເອກ</option>
                      </select>
                    </div>
                  </div>
                  <div class="form-group row">
                    <label class="col-sm-2 col-form-label">ສາຂາ</label>
                    <div class="col-sm-10">
                      <input type="text" class="form-control" name="major" placeholder="Major" id="major">
                    </div>
                  </div>
                  <input type="button" name="previous" class="previous btn btn-default" value="ກັບຄືນ" />
                  <input type="button" name="next" class="next btn btn-primary" value="ຖັດໄປ" />
                  </fieldset>
                  
                  <fieldset>
                  <h4 align="center">ຂັ້ນຕອນ3: ວັນເຂົ້າອົງການຈັດຕັ້ງ</h4>
                    <div class="form-group row">
                      <label class="col-sm-2 col-form-label">ວັນເຂົ້າຊາວໜຸ່ມ</label>
                      <div class="col-sm-10">
                        <input type="date" class="form-control" name="youth_date" id="youth_date">
                      </div>
                    </div>
                    <div class="form-group row">
                      <label class="col-sm-2 col-form-label">ວັນເຂົ້າກຳມະບານ</label>
                      <div class="col-sm-10">
                        <input type="date" class="form-control" name="labor_date" id="labor_date">
                      </div>
                    </div>
                    <div class="form-group row">
                      <label class="col-sm-2 col-form-label">ວັນເຂົ້າແມ່ຍິງ</label>
                      <div class="col-sm-10">
                        <input type="date" class="form-control" name="women_date" id="women_date">
                      </div>
                    </div>
                    <div class="form-group row">
                      <label class="col-sm-2 col-form-label">ວັນເຂົ້າພັກສຳຮອງ</label>
                      <div class="col-sm-10">
                        <input type="date" class="form-control" name="prepre_date" id="prepre_date">
                      </div>
                    </div>
                    <div class="form-group row">
                      <label class="col-sm-2 col-form-label">ວັນເຂົ້າພັກສົມບູນ</label>
                      <div class="col-sm-10">
                        <input type="date" class="form-control" name="complete_date" id="complete_date">
                      </div>
                    </div>
                    <div class="form-group row">
                      <label for="photo" class="col-sm-2 col-form-label">ຮູບພາບ</label>
                      <div class="col-sm-10">
                        <div class="custom-file">
                          <input type="file" class="custom-file-input" name="user_img" id="photo" 
                            onchange="readURL(this);" />
                          <label class="custom-file-label" for="photo" data-browse="browse">Choose file</label>
                        </div>
                      </div>
                    </div>
                    <!-- set defualt user level=0 -->
                    <div class="form-group row">
                      <div class="col-sm-10">
                        <input type="hidden" class="form-control" name="user_level" value="2">
                      </div>
                    </div>
                    <!-- set defualt user active=0 enabled or disabled-->
                    <div class="form-group row">
                      <div class="col-sm-10">
                        <input type="hidden" class="form-control" name="user_active" value="0">
                      </div>
                    </div>
                    <input type="button" name="previous" class="previous btn btn-default" value="ກັບຄືນ">
                  <input type="submit" name="add" class="submit btn btn-outline-primary" value="ລົງທະບຽນ">
                  </fieldset>
                  </form>
              </div>
          </div>
        </div>
      </div> 
    </div>
  </div>
</section>
<script src="register.js"></script>
</body>
</html>
<script type="text/javascript">
    $(".custom-file-input").on("change", function() {
      var fileName = $(this).val().split("\\").pop();
      $(this).siblings(".custom-file-label").addClass("selected").html(fileName);
    });
function readURL(input) {
  OnUploadCheck();
  if (input.files && input.files[0]) {
      var reader = new FileReader();
      reader.onload = function (e) {
        $("#photo_profile").attr("src", e.target.result);
      }
      reader.readAsDataURL(input.files[0]);
  }
}

function OnUploadCheck() {
      var extall = "jpg,jpeg,png";
      file = $("#photo").val();
      ext = file.split('.').pop().toLowerCase();
      if (parseInt(extall.indexOf(ext)) < 0) {
          Swal.fire({
            icon: 'error',
            title: 'ເລືອກໄດ້ສະເພາະ File .jpg,jpeg,png'
          })
          $("#photo").val("").focus();
          return false;
      }
      return true;
    }
</script>
<script type="text/javascript">

  $('.alert-danger').hide()

  $(document).ready(function(){  
  var form_count = 1, form_count_form, next_form, total_forms;
  total_forms = $("fieldset").length;  
  $(".next").click(function(){
    form_count_form = $(this).parent();
    next_form = $(this).parent().next();
    next_form.show();
     form_count_form.hide();
  });

  $(".previous").click(function(){
    form_count_form = $(this).parent();
    next_form = $(this).parent().prev();
    next_form.show();
    form_count_form.hide();
  });
// Handle form submit and validation
  // $( "#register" ).submit(function(event) {    
  // var error_message = '';
  //   if(!$("#username").val()) {
  //     error_message+="ກະລຸນາພິມຊື່ຜູ້ໃຊ້";
  //   }
  //   if(!$("#passwd").val()) {
  //     error_message+="<br>ກະລຸນາພິມລະຫັດຜ່ານ";
  //   }
  //   if(!$("#age").val()) {
  //     error_message+="<br>ກະລຸນາພິມອາຍຸ";
  //   }
  //   if(!$("#bithdate").val()) {
  //     error_message+="<br>ກະລຸນາພິມວັນເດືອນປີເກີດ";
  //   }
  //   if(!$("#mail").val()) {
  //     error_message+="<br>ກະລຸນາພິມອີເມວ";
  //   }
  //   if(!$("#tel").val()) {
  //     error_message+="<br>ກະລຸນາພິມເບີໂທ";
  //   }
  //   if(!$("#functionary").val()) {
  //     error_message+="ກະລຸນາເລືອກຕຳແໜ່ງລັດ";
  //   }
  //   if(!$("#position").val()) {
  //     error_message+="<br>ກະລຸນາຕຳແໜ່ງວຽກ";
  //   }
  //   if(!$("#department").val()) {
  //     error_message+="<br>ກະລຸນາພິມອາຍຸ";
  //   }
  //   if(!$("#bithdate").val()) {
  //     error_message+="<br>ກະລຸນາພິມວັນເດືອນປີເກີດ";
  //   }
  //   if(!$("#mail").val()) {
  //     error_message+="<br>ກະລຸນາພິມອີເມວ";
  //   }
  //   if(!$("#tel").val()) {
  //     error_message+="<br>ກະລຸນາພິມເບີໂທ";
  //   }
  //   if(!$("#youth_date").val()) {
  //     error_message+="ກະລຸນາພິມວັນເຂົ້າຊາວໜຸ່ມ";
  //   }
  //   if(!$("#labor_date").val()) {
  //     error_message+="<br>ກະລຸນາພິມວັນເຂົ້າກຳມະບານ";
  //   }
  // Display error if any else submit form
  // if(error_message) {
  //   $('.alert-danger').show().html(error_message);
  //     window.setTimeout(function () {
  //         $(".alert").fadeTo(700, 0).slideUp(1000, function () {
  //             $(this).remove()
  //         })
  //     }, 2e3)
  //   return false;
  // } else {
  //   return true;  
  // }    
  // }); 
});
</script>