<?php 
    if (isset($_GET['type'])) {
     $ty_id=$_GET['type'];
    }

?>
<section class="content-header">
      <div class="container-fluid">
        
      </div><!-- /.container-fluid -->
</section>
<!-- Main content -->
  <section class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-1">

        </div>
        <!-- /.col -->
        <div class="col-md-10">
          <div class="card">
            <div class="card-header bg-primary">
                <h3 class="card-title">
                  <i class="fas fa-edit"></i>
                      ເພີ່ມເອກະສານໃໝ່
                </h3>
            </div>
            <div class="card-body">
              <form class="form-horizontal" enctype="multipart/form-data" action="do_doc_in.php" method="POST" id="frm">
                <div class="row">
                    <div class="col-sm-6">
                      <div class="form-group">
                        <label>ປະເພດເອກະສານ</label>
                        <!-- query data -->
                        <?php $doc_type=mysqli_query($conn, "SELECT*FROM tb_doctype"); ?>
                        <select class="form-control required" name="doc_type" id="doc_type">
                            <option>__Select__</option>
                            <?php while($row2=mysqli_fetch_assoc($doc_type)) : ?>
                            <option value="<?php echo($row2['type_id']) ?>" 
                              <?php if($ty_id==$row2['type_id']){echo "selected";}?>>
                              <?php echo($row2['type_name']) ?>
                            </option>
                          <?php endwhile ; ?>
                        </select>
                      </div>
                    </div>
                    <div class="col-sm-6">
                          <div class="form-group">
                            <label>ວັນທີບັນທຶກ</label>
                            <input type="date" class="form-control" name="in_date" 
                            value="<?php echo date('Y-m-d'); ?>" required>
                        </div>
                    </div>
                </div>
                <!-- textarea -->
                <div class="row">
                  <div class="col-sm-12">
                    <div class="form-group">
                        <label>ເນື້ອໃນເອກະສານ</label>
                        <textarea class="ckeditor" id="doc_title" name="doc_title" rows="3" required></textarea>  
                    </div>
                  </div>
                </div>
                          <!-- text input -->
                <div class="row">
                  <div class="col-sm-6">
                    <div class="form-group">
                      <label>ເລກທີເອກະສານ</label>
                      <input type="text" class="form-control" placeholder="Enter ..." name="doc_id" required>
                      </div>
                  </div>
                  <div class="col-sm-6">
                    <div class="form-group">
                      <label>ວັນທີ</label>
                      <input type="date" class="form-control" name="doc_date" required>
                    </div>
                  </div>
                </div>
                <!-- text input -->
                <div class="row">
                  <div class="col-sm-6">
                    <div class="form-group">
                      <label>ຈາກພາກສ່ວນ</label>
                      <input type="text" class="form-control" placeholder="Enter ..." name="doc_from" required>
                    </div>
                  </div>
                  <div class="col-sm-6">
                    <div class="form-group">
                        <label>ເກັບມ້ຽນ</label>
                        <!-- query data -->
                       <?php $dep=mysqli_query($conn, "SELECT * FROM tb_department WHERE dep_id='$department'"); ?>
                      <select class="form-control" name="doc_dep" id="doc_dep">
                        <option>__Select__</option>
                        <?php while($rec=mysqli_fetch_assoc($dep)) : ?>
                        <option value="<?php echo($rec['dep_id']); ?>" 
                          <?php if($department==$rec['dep_id']){echo 'selected';} ?>>
                          <?php echo($rec['dep_name']); ?>
                        </option>
                        <?php endwhile ; ?>
                      </select>
                    </div>
                  </div>
                </div>
                <!-- text input -->
                <div class="row">
                  <div class="col-sm-6">
                    <div class="form-group">
                      <label>ຜູ້ຮັບເອກະສານ</label>
                      <!-- query data -->
                        <?php $user=mysqli_query($conn, "SELECT * FROM tb_user WHERE department='$department'"); ?>
                        <select class="form-control" name="staff" id="staff">
                            <option>__Select__</option>
                            <?php while($row1=mysqli_fetch_assoc($user)) : ?>
                            <option value="<?php echo($row1['user_id']); ?>">
                            <?php echo($row1['user_name']); ?>
                            </option>
                            <?php endwhile ; ?>
                        </select>
                    </div>
                  </div>
                  <div class="col-sm-6">
                      <div class="form-group">
                        <label>ໝາຍເຫດ</label>
                        <input type="text" class="form-control"  name="note" placeholder="Note">  
                      </div>
                  </div>
                </div>
                <div class="row">
                    <div class="col-sm-6">
                    <label for="" >ເລືອກເອກະສານ</label><code>*</code>
                      <div class="custom-file">
                        <input type="file" class="custom-file-input" name="myfile" id="myfile">
                        <label class="custom-file-label" for="myfile" data-browse="browse" required>Choose file</label>
                      </div>
                    </div>
                </div>
                  <br>
                <div class="col-sm-2">
                  <button type="submit" class="btn btn-primary form-control" name="add">
                    <i class="fa fa-check-circle"></i> ບັນທຶກ
                  </button>
                </div>
              </form>
            </div><!-- /.card-body -->
          </div>
          <!-- /.nav-tabs-custom -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </div><!-- /.container-fluid -->
  </section>
  <!-- /.content -->
</body>
<title>ເອກະສານຂາເຂົ້າ | ເພີ່ມເອກະສານໃໝ່</title>
</html>
<script type="text/javascript">
  $(".custom-file-input").on("change", function() {
      var fileName = $(this).val().split("\\").pop();
      $(this).siblings(".custom-file-label").addClass("selected").html(fileName);
    });
  //validate update profile
  $('#frm').validate({
    rules: {
      doc_type: {
        required: true,
      },
      in_date: {
        required: true,
      },
      doc_date: {
        required: true,
      },
      doc_title: {
        required: true,
      },
      doc_id: {
        required: true,
      },
      myfile: {
        required: true,
      },
      doc_from: {
        required: true,
      },
    },
    messages: {
      doc_type: {
        required: "ກະລຸນາເລືອກປະເພດເອກະສານ",
      },
      in_date: {
        required: "ກະລຸນາເລືອກວັນທີ່ເພີ່ມ",
      },
      doc_date: {
        required: "ກະລຸນເລືອກວັນທີເອກະສານ",
      },
      doc_title: {
        required: "ກະລຸນພິມເນື້ອໃນເອກະສານ",
      },
      doc_id: {
        required: "ກະລຸນປ້ອນເລກທີເອກະສານ",
      },
      myfile: {
        required: "ກະລຸນເລືອກຟາຍເອກະສານ",
      },
      doc_from: {
        required: "ກະລຸນປ້ອນທີ່ມາຂອງເອກະສານ",
      },
    },
    errorElement: 'sp',
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
  // Handle form submit and validation
  // $( "#frm" ).submit(function(event) {    
  // var error_message = '';
  //   if(!$("#doc_type").val()) {
  //     error_message+="ກະລຸນາພິມຊື່ຜູ້ໃຊ້";
  //   }
  //   if(!$("#doc_title").val()) {
  //     error_message+="<br>ກະລຸນາປ້ອນເນື້ອໃນເອກະສານ";
  //   }
  //   if(!$("#doc_dep").val()) {
  //     error_message+="<br>ກະລຸນາເລືອກພະແນກ";
  //   }
  //   if(!$("#staff").val()) {
  //     error_message+="<br>ກະລຸນາເລືອກພະນັກງານ";
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
</script>