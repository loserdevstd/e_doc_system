<title>ຂໍ້ມູນຜູ້ໃຊ້</title>
<?php 
  if (isset($_GET['user-id'])) {
    $user=$_GET['user-id'];
    $sql = "SELECT us.*, dep.dep_id, dep.dep_name FROM tb_user us 
            JOIN tb_department dep ON us.department=dep.dep_id 
            WHERE us.user_id='$user'";
    $result = mysqli_query($conn, $sql) or die("fail".mysql_error());
    $rows = mysqli_fetch_array($result);

  }
  
?>
<!--alert update complete-->
    <?php if (isset($_GET['edit'])) : ?>
      <div class="edit-data" data-editdata="<?= $_GET['edit']; ?>"></div>
      <meta http-equiv="refresh" content="1;url=index.php?page=user-profile&user-id=<?php echo $user_id; ?>">
    <?php endif; ?>
<!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <h1>ຂໍ້ມູນຜູ້ໃຊ້</h1>
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
                  <?php if($rows['user_img']){ ?>
                  <?php if(file_exists("../users/img/".$rows['user_img'])){ ?>
                  <img id="photo_profile" class="img-fluid img-circle img-thumbnail"
                    src="../users/img/<?php echo $rows['user_img'];?>" alt="profile"
                    style="max-width:225px; max-height:225px; min-width:225px; min-height:225px;">
                  <?php }else{ ?>
                  <img id="photo_profile" class="img-fluid img-circle img-thumbnail" src="img/blank.jpg"
                    alt="profile"
                    style="max-width:225px; max-height:225px; min-width:225px; min-height:225px;">
                  <?php } ?>
                  <?php }else{ ?>
                  <img id="photo_profile" class="img-fluid img-circle img-thumbnail" src="img/blank.jpg"
                    alt="User profile picture"
                    style="max-width:225px; max-height:225px; min-width:225px; min-height:225px;">
                  <?php } ?>
                </div>

                <h3 class="profile-username text-center"><?php echo($rows['user_name']); ?></h3>
                <!-- form upload new pic -->
                <form id="upload-profile" action="../users/do_profile.php" method="POST" enctype="multipart/form-data">
                <div class="custom-file">
                  <input type="hidden" name="old_id" value="<?php echo $user; ?>">
                  <input type="file" class="custom-file-input" id="photo" name="user_img" onChange="readURL(this);">
                  <label id="name-photo-main" class="custom-file-label text-truncate" for="photo"
                    >ເລືອກຮູບ
                  </label>
                </div>
                <input type="submit" class="btn btn-primary btn-block btn-upload" value="Upload" disabled name="edit-img">
              </form>

              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
          <div class="col-md-9">
            <div class="card">
              <div class="card-header p-2">
                <ul class="nav nav-pills">
                  <li class="nav-item">
                  	<a class="nav-link active" href="#info" data-toggle="tab">
                  	<i class="fas fa-info"></i> ຂໍ້ມູນ</a>
                  </li>
                  <li class="nav-item">
                  	<a class="nav-link" href="#ch-pwd" data-toggle="tab">
                  	<i class="fas fa-key"></i> ປ່ຽນລະຫັດຜ່ານ</a>
                  </li>
                </ul>
              </div><!-- /.card-header -->
              <div class="card-body">
                <div class="tab-content">
                  <div class="active tab-pane" id="info">
                  	<form class="form-horizontal" method="post" action="../users/do_profile.php" id="frm_profile">
                      <div class="form-group row">
                        <!-- old user id -->
                        <input type="hidden" name="old_id" value="<?php echo $user; ?>">
                        <label for="username" class="col-sm-2 col-form-label">ຊື່ ແລະ ນາມສະກຸນ</label>
                        <div class="col-sm-10">
                          <input type="text" class="form-control" name="username" value="<?php echo($rows['user_name']); ?>">
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="gender" class="col-sm-2 col-form-label">ເພດ</label>
                        <div class="col-sm-10">
                          <select class="form-control" name="gender">
                            <option value="1" <?php if ($rows['gender'] == 1) echo "selected";?>>ຊາຍ</option>
                            <option value="2" <?php if ($rows['gender'] == 2) echo "selected";?>>ຍິງ</option>
                          </select>
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="age" class="col-sm-2 col-form-label">ອາຍຸ</label>
                        <div class="col-sm-10">
                          <input type="number" class="form-control" 
                          name="age" value="<?php echo($rows['age']); ?>" maxlenght="2">
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="bithdate" class="col-sm-2 col-form-label">ວັນເດືອນປີເກີດ</label>
                        <div class="col-sm-10">
                          <input type="date" class="form-control" 
                                 name="bithdate" value="<?php echo($rows['bithdate']); ?>">
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="department" class="col-sm-2 col-form-label">ພະແນກສັງກັດ</label>
                        <div class="col-sm-10">
                          <select class="form-control" name="department">
                            <?php $query=mysqli_query($conn, "SELECT * FROM tb_department"); ?>
                            <?php while ($dep=mysqli_fetch_assoc($query)) : ?>
                            <option value="
                              <?php echo($dep['dep_id']);?>" 
                              <?php if($rows['dep_id']==$dep['dep_id']){echo("selected='selected'");} ?>>
                              <?php echo ($dep['dep_name']); ?>
                            </option>
                            <?php endwhile; ?>
                          </select>
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="position" class="col-sm-2 col-form-label">ຕຳແໜ່ງວຽກ</label>
                        <div class="col-sm-10">
                          <input type="text" name="position" class="form-control" value="<?php echo($rows['position']); ?>">
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="position" class="col-sm-2 col-form-label">ຕຳແໜ່ງລັດ</label>
                        <div class="col-sm-10">
                          <select class="form-control" name="functionary">
                            <option value="1" <?php if ($rows['functionary']==1){ echo "selected";}?>>
                              ພະນັກງານ
                            </option>
                            <option value="2" <?php if ($rows['functionary']==2){ echo "selected";}?>>
                              ພະນັກງານອາສາ
                            </option>
                            <option value="3" <?php if ($rows['functionary']==3){ echo "selected";}?>>
                              ພະນັກງານສັນຍາຈ້າງ
                            </option>
                          </select>
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="mail" class="col-sm-2 col-form-label">ອີເມວ</label>
                        <div class="col-sm-10">
                          <input type="email" class="form-control" name="mail" value="<?php echo($rows['mail']); ?>">
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="tel" class="col-sm-2 col-form-label">ເບີໂທ</label>
                        <div class="col-sm-10">
                          <input type="number" class="form-control" name="tel" value="<?php echo($rows['tel']); ?>">
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="address" class="col-sm-2 col-form-label">ທີ່ຢູ່</label>
                        <div class="col-sm-10">
                          <input type="text" class="form-control" name="address" value="<?php echo($rows['address']); ?>">
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="degree" class="col-sm-2 col-form-label">ລະດັບການສຶກສາ</label>
                        <div class="col-sm-10"> 
                          <select class="form-control" name="degree">
                            <option value="1" <?php if ($rows['degree']==1){ echo "selected";}?>>
                              ປະລິນຍາຕີ
                            </option>
                            <option value="2" <?php if ($rows['degree']==2){ echo "selected";}?>>
                              ປະລິນຍາໂທ
                            </option>
                            <option value="3" <?php if ($rows['degree']==3){ echo "selected";}?>>
                              ປະລິນຍາເອກ
                            </option>
                          </select>
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="major" class="col-sm-2 col-form-label">ສາຂາ</label>
                        <div class="col-sm-10">
                          <input type="text" class="form-control" name="major" value="<?php echo($rows['major']); ?>">
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="youth_date" class="col-sm-2 col-form-label">ວັນເຂົ້າຊາວໜຸ່ມ</label>
                        <div class="col-sm-10">
                          <input type="date" class="form-control" name="youth_date" value="<?php echo($rows['youth_date']); ?>">
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="labor_date" class="col-sm-2 col-form-label">ວັນເຂົ້າກຳມະບານ</label>
                        <div class="col-sm-10">
                          <input type="date" class="form-control" name="labor_date" value="<?php echo($rows['labor_date']); ?>">
                        </div>
                      </div>
                      <?php if($rows['gender']==2) : ?>
                        <div class="form-group row">
                        <label for="women_date" class="col-sm-2 col-form-label">ວັນເຂົ້າແມ່ຍິງ</label>
                        <div class="col-sm-10">
                          <input type="date" class="form-control" name="women_date" value="<?php echo($rows['women_date']); ?>">
                        </div>
                      </div>
                      <?php endif; ?>
                      <?php if($rows['party_prepare_date']!=0000-00-00) : ?>
                      <div class="form-group row">
                        <label for="prepare_date" class="col-sm-2 col-form-label">ວັນເຂົ້າພັກສຳຮອງ</label>
                        <div class="col-sm-10">
                          <input type="date" class="form-control" name="prepare_date" value="<?php echo($rows['party_prepare_date']); ?>">
                        </div>
                      </div>
                      <?php endif; ?>
                      <?php if($rows['party_complete_date']!=0000-00-00) : ?>
                      <div class="form-group row">
                        <label for="complete_date" class="col-sm-2 col-form-label">ວັນເຂົ້າພັກສົມບູນ</label>
                        <div class="col-sm-10">
                          <input type="date" class="form-control" name="complete_date" value="<?php echo($rows['party_complete_date']); ?>">
                        </div>
                      </div>
                      <?php endif; ?>
                      <div class="form-group row">
                        <div class="offset-sm-2 col-sm-10">
                          <button type="submit" class="btn btn-primary" name="edit-profile">
                          	<i class="fas fa-check-circle"></i> Save
                          </button>
                          <button type="reset" class="btn btn-secondary">
                          	<i class="fas fa-redo"></i> Reset
                      	  </button>
                        </div>
                      </div>
                    </form>
                  </div>
                  <!-- /.tab-pane -->
                  <div class="tab-pane" id="ch-pwd">
                  	<form class="form-horizontal" method="post" action="../users/do_profile.php" id="form_pwd" autocomplete="off">
                      <div class="form-group row">
                        <input type="hidden" name="old_id" value="<?php echo $user; ?>">
                        <label for="inputName" class="col-sm-2 col-form-label">ລະຫັດຜ່ານເກົ່າ</label>
                        <div class="col-sm-10">
                          <input type="hidden" name="passwd"id="passwd" value="<?php echo $rows['passwd']; ?>">
                          <input type="text" class="form-control" name="curpasswd" id="curpasswd" placeholder="enter..">
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="inputEmail" class="col-sm-2 col-form-label">ລະຫັດຜ່ານໃໝ່</label>
                        <div class="col-sm-10">
                          <input type="password" class="form-control" name="newpasswd" id="newpasswd"placeholder="enter..">
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="inputName2" class="col-sm-2 col-form-label">ຢືນຢັນລະຫັດ</label>
                        <div class="col-sm-10">
                          <input type="password" class="form-control" name="conpasswd" id="confpasswd"placeholder="enter..">
                        </div>
                      </div>

                      <div class="form-group row">
                        <div class="offset-sm-2 col-sm-10">
                          <button type="submit" class="btn btn-primary btn-lg" name="edit-pwd">
                          	<i class="fas fa-check-circle"></i> Save
                          </button>
                        </div>
                      </div>
                    </form>
                  </div>
                  <!-- /.tab-pane -->
                </div>
                <!-- /.tab-content -->
              </div><!-- /.card-body -->
              <div class="card-footer">
              Last update: <?php echo $rows["edit_date"];?>
            </div>
            </div>
            <!-- /.nav-tabs-custom -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  <script src="../users/script/user_edit.js"></script>