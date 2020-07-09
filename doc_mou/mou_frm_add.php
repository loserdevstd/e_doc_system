<?php include("../connect/conn.php"); ?>

    <!-- Main content -->
<div class="card">

    <div class="card-body p-1">

      <div class="row">
        <div class="col-md-1">
                  
        </div>


            <div class="col-md-10">

              <div class="col-md-12">
                <div class="card card-primary">
                  <div class="card-header bg-primary">
                    <h3 class="card-title">
                      <i class="fas fa-edit"></i>
                      ເພີ່ມ MOU
                    </h3>
                  </div>
                  <div class="card-body pad table-responsive">
                    <table class="table table-bordered text-center">
                      <div class="col-md-12">
                        <form method="post" action="do_mou.php" enctype="multipart/form-data" id="mou">
                          <div class="form-group row">
                            <label class="col-sm-2 col-form-label">ປະເທດຄູ່ຮ່ວມສັນຍາ</label>
                            <div class="col-sm-10">
                              <input type="text" class="form-control" placeholder="Enter ..." name="m_partner" required>
                            </div>
                          </div>
                          <div class="form-group row">
                            <label class="col-sm-2 col-form-label">ສະຖາບັນຮ່ວມສັນຍາ</label>
                            <div class="col-sm-10">
                              <input type="text" class="form-control" placeholder="Enter ..." name="name_partner" required>
                            </div>
                          </div>
                          <div class="form-group row">
                            <label class="col-sm-2 col-form-label">ການອະນຸມັດ</label>
                            <div class="col-sm-10">
                              <select class="form-control" name="approved" required>
                                  <option>-- ເລືອກ --</option>
                                  <option value="1">ເຊັນສັນຍາແລ້ວ</option>
                                  <option value="2">ອະນຸມັດແລ້ວ</option>
                                  <option value="3">ບໍ່ອະນຸມັດ</option>
                              </select>
                            </div>
                          </div>
                          <div class="form-group row">
                            <label class="col-sm-2 col-form-label">ວັນລົງນາມ</label>
                            <div class="col-sm-10">
                              <input type="date" class="form-control" name="sdate">
                            </div>
                          </div>
                          <div class="form-group row">
                            <label class="col-sm-2 col-form-label">ວັນໝົດສັນຍາ</label>
                            <div class="col-sm-10">
                              <input type="date" class="form-control" name="exdate">
                            </div>
                          </div>
                          <div class="form-group row">
                            <label class="col-sm-2 col-form-label">ການຂະຫຍາຍສັນຍາ</label>
                            <div class="col-sm-10">
                              <select class="form-control" name="extension">
                                <option>-- ເລືອກ --</option>
                                <option value="1">ຕ້ອງການ</option>
                                <option value="2">ບໍ່ຕ້ອງການ</option>
                              </select>
                            </div>
                          </div>
                          <div class="form-group row">
                            <label class="col-sm-2 col-form-label">ຜູ້ເພີ່ມເອກະສານ</label>
                            <div class="col-sm-10">
                              <?php $user=mysqli_query($conn, "SELECT * FROM tb_user"); ?>
                                  <select class="form-control" name="user_name" required>
                                    <option>-- ເລືອກ --</option>
                                    <?php while($row=mysqli_fetch_assoc($user)) : ?>
                                    <option value="<?php echo($row['user_id']); ?>">
                                        <?php echo($row['user_name']); ?>
                                    </option>
                                    <?php endwhile; ?>
                                  </select>
                            </div>
                          </div>
                          <div class="form-group row">
                            <label for="photo" class="col-sm-2 col-form-label">ເລືອກຟາຍເອກະສານ</label>
                            <div class="col-sm-10">
                              <div class="custom-file">
                                <input type="file" class="custom-file-input" name="myfile" id="photo" >
                                <label class="custom-file-label" for="photo" data-browse="browse">Choose file</label>
                              </div>
                            </div>
                          </div>
                          <div class="form-group row">
                            <label class="col-sm-2 col-form-label">ໝາຍເຫດ</label>
                            <div class="col-sm-10">
                              <input type="text" class="form-control" name="note" placeholder="Enter ...">
                            </div>
                          </div>
                            <div class="col-sm-2">
                              <button type="submit" class="btn btn-primary form-control" name="add">
                                ບັນທຶກ
                              </button>
                            </div>
                                <br>
                                <br>

                        </form>
                      </div>
                    </table>
                  </div>
                  <!-- /.card -->
                </div>
              </div>
                      
            </div>
       
    </div>

  </div>
</div>
<script type="text/javascript">
  $(".custom-file-input").on("change", function() {
      var fileName = $(this).val().split("\\").pop();
      $(this).siblings(".custom-file-label").addClass("selected").html(fileName);
    });
  //validate update profile
  $('#mou').validate({
    rules: {
      m_partner: {
        required: true,
      },
      name_partner: {
        required: true,
      },
      approved: {
        required: true,
      },
      extension: {
        required: true,
      },
      staff: {
        required: true,
      },
    },
    messages: {
      m_partner: {
        required: "ກະລຸນາປ້ອນປະເທດຮ່ວມສັນຍາ",
      },
      name_partner: {
        required: "ກະລຸນາປ້ອນຊື່ສະຖາບັນຮ່ວມສັນຍາ",
      },
      approved: {
        required: "ກະລຸນາເລືອກການອະນຸມັດ",
      },
      extension: {
        required: "ກະລຸນາເລືອກການຂະຫຍາຍສັນຍາ",
      },
      staff: {
        required: "ກະລຸນາເລືອກພະນັກງານ",
      },
    },
    errorElement: 'mou',
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
</script>
</body>
</html>
