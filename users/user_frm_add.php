<title>ພະນັກງານ | ເພີ່ມພະນັກງານ</title>
<section class="content-header">
      <div class="container-fluid">
        <h1>ເພີ່ມຜູ້ໃຊ້</h1>
      </div><!-- /.container-fluid -->
</section>
<!-- Main content -->
  <section class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-3">

          <!-- Profile Image -->
          <div class="card card-primary card-outline">
            <div class="card-body box-profile">
              <div class="text-center">
                <img id="photo_profile" class="img-fluid img-circle img-thumbnail" src="../dashboard/img/blank.jpg"
                  alt="User picture"
                  style="max-width:225px; max-height:225px; min-width:225px; min-height:225px;">
              </div>
            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->

        </div>
        <!-- /.col -->
        <div class="col-md-9">
          <div class="card">
            <div class="card-body">
              <form class="form-horizontal" enctype="multipart/form-data" action="do_user.php" method="POST" autocomplete="off" id="frm_profile">
                <div class="form-group row">
                  <label for="user_active" class="col-sm-2 col-form-label">ສະຖານະ</label>
                  <div class="col-6 col-lg-2">
                    <div class="custom-control custom-radio my-2">
                      <input type="radio" id="enabled" name="user_active" checked class="custom-control-input" value="1">
                      <label class="custom-control-label" for="enabled">ເປີດໃຊ້ງານ</label>
                    </div>
                  </div>
                  <div class="col-6 col-lg-2">
                    <div class="custom-control custom-radio my-2">
                      <input type="radio" id="disabled" name="user_active" class="custom-control-input" value="0">
                      <label class="custom-control-label" for="disabled">ປິດໃຊ້ງານ</label>
                    </div>
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
                <div class="form-group row">
                  <label for="username" class="col-sm-2 col-form-label">ຊື່ ແລະ ນາມສະກຸນ</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" id="username" name="username"
                      placeholder="Name & Surname" required>
                  </div>
                </div>
                <div class="form-group row">
                  <label for="passwd" class="col-sm-2 col-form-label">ລະຫັດຜ່ານ</label>
                  <div class="col-sm-10">
                    <input type="password" class="form-control" id="passwd" name="passwd"
                      placeholder="Password" required>
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
                      <input type="radio" id="female" name="gender" class="custom-control-input" value="2">
                      <label class="custom-control-label" for="female">ເພດຍິງ</label>
                    </div>
                  </div>
                </div>
                <div class="form-group row">
                  <label class="col-sm-2 col-form-label">ອາຍຸ</label>
                  <div class="col-sm-10">
                    <input type="number" class="form-control" name="age" placeholder="Age" maxlength="2" required>
                  </div>
                </div>
                <div class="form-group row">
                  <label class="col-sm-2 col-form-label">ວັນເດືອນປີເກີດ</label>
                  <div class="col-sm-10">
                    <input type="date" class="form-control" name="bithdate" required>
                  </div>
                </div>
                <div class="form-group row">
                  <label class="col-sm-2 col-form-label">ຕຳແໜ່ງວຽກ</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" name="position" placeholder="Position" required>
                  </div>
                </div>
                <div class="form-group row">
                  <label class="col-sm-2 col-form-label">ພະແນກສັງກັດ</label>
                  <div class="col-sm-10">
                    <?php include('../connect/conn.php'); ?>
                      <?php $deplist=mysqli_query($conn, "SELECT * FROM tb_department"); ?>
                      <select class="form-control" name="department" required>
                        <option>__Select__</option>
                        <?php while ($row=mysqli_fetch_assoc($deplist)) : ?>
                        <option value="<?php echo($row['dep_id']);?>"><?php echo($row['dep_name']);?></option>
                        <?php endwhile; ?>
                      </select>
                  </div>
                </div>
                <div class="form-group row">
                  <label class="col-sm-2 col-form-label">ອີເມວ</label>
                  <div class="col-sm-10">
                    <input type="email" class="form-control" name="mail" placeholder="E-mail" required>
                  </div>
                </div>
                <div class="form-group row">
                  <label class="col-sm-2 col-form-label">ເບີໂທ</label>
                  <div class="col-sm-10">
                    <input type="number" class="form-control" name="tel" placeholder="(020) ____ ____" required>
                  </div>
                </div>
                <div class="form-group row">
                  <label class="col-sm-2 col-form-label">ທີ່ຢູ່</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" name="address" placeholder="Village, District, Province" required>
                  </div>
                </div>
                <div class="form-group row">
                  <label class="col-sm-2 col-form-label">ລະດັບການສຶກສາ</label>
                  <div class="col-sm-10">
                    <select class="form-control" name="degree" required>
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
                    <input type="text" class="form-control" name="major" placeholder="Major">
                  </div>
                </div>
                <div class="form-group row">
                  <label class="col-sm-2 col-form-label">ຕຳແໜ່ງລັດ</label>
                  <div class="col-sm-10">
                    <select class="form-control" name="functionary" required>
                      <option>__Select__</option>
                      <option value="1">ພະນັກງານ</option>
                      <option value="2">ພະນັກງານອາສາ</option>
                      <option value="3">ພະນັກງານສັນຍາຈ້າງ</option>
                    </select>
                  </div>
                </div>
                <div class="form-group row">
                  <label class="col-sm-2 col-form-label">ວັນເຂົ້າຊາວໜຸ່ມ</label>
                  <div class="col-sm-10">
                    <input type="date" class="form-control" name="youth_date" required>
                  </div>
                </div>
                <div class="form-group row">
                  <label class="col-sm-2 col-form-label">ວັນເຂົ້າກຳມະບານ</label>
                  <div class="col-sm-10">
                    <input type="date" class="form-control" name="labor_date" required>
                  </div>
                </div>
                <div class="form-group row">
                  <label class="col-sm-2 col-form-label">ວັນເຂົ້າແມ່ຍິງ</label>
                  <div class="col-sm-10">
                    <input type="date" class="form-control" name="women_date">
                  </div>
                </div>
                <div class="form-group row">
                  <label class="col-sm-2 col-form-label">ວັນເຂົ້າພັກສຳຮອງ</label>
                  <div class="col-sm-10">
                    <input type="date" class="form-control" name="prepare_date">
                  </div>
                </div>
                <div class="form-group row">
                  <label class="col-sm-2 col-form-label">ວັນເຂົ້າພັກສົມບູນ</label>
                  <div class="col-sm-10">
                    <input type="date" class="form-control" name="complete_date">
                  </div>
                </div>
                <div class="form-group row">
                  <label for="user_level" class="col-sm-2 col-form-label">ລະດັບຜູ້ໃຊ້</label>
                  <div class="col-6 col-lg-2">
                    <div class="custom-control custom-radio my-2">
                      <input type="radio" id="admin" name="user_level" class="custom-control-input" value="1">
                      <label class="custom-control-label" for="admin">Admin</label>
                    </div>
                  </div>
                  <div class="col-6 col-lg-2">
                    <div class="custom-control custom-radio my-2">
                      <input type="radio" id="user" name="user_level" checked class="custom-control-input" value="2">
                      <label class="custom-control-label" for="user">User</label>
                    </div>
                  </div>
                </div>
                <div class="form-group row">
                  <div class="offset-sm-2 col-sm-10">
                    <button type="submit" class="btn btn-primary btn-upload" name="add"><i class="fas fa-check-circle"></i>
                    ເພີ່ມ</button>
                  </div>
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
<script src="script/user_edit.js"></script>
    
</body>
</html>