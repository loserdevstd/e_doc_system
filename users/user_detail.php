<title>ພະນັກງານ | ລາຍລະອຽດພະນັກງານ</title>
<?php
  if (isset($_GET['id'])) {
    $us_id=$_GET['id'];
    $sql="SELECT user.*, dep.dep_name FROM tb_user user 
          JOIN tb_department dep ON user.department=dep.dep_id
          WHERE user.user_id='$us_id'";
    $res=mysqli_query($conn, $sql);
    $user=mysqli_fetch_assoc($res);
  }
?>
    <section class="content-header">
      <div class="container-fluid">
        <h1>ລາຍລະອຽດຜູ້ໃຊ້</h1>
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
                <?php if($user['user_img']){ ?>
                <?php if(file_exists("img/".$user['user_img'])){ ?>
                <img id="photo_profile" class="img-fluid img-circle img-thumbnail"
                  src="img/<?php echo $user['user_img'];?>" alt="User profile"
                  style="max-width:225px; max-height:225px; min-width:225px; min-height:225px;">
                <?php }else{ ?>
                <img id="photo_profile" class="img-fluid img-circle img-thumbnail" src="../dashboard/img/blank.jpg"
                  alt="User profile"
                  style="max-width:225px; max-height:225px; min-width:225px; min-height:225px;">
                <?php } ?>
                <?php }else{ ?>
                <img id="photo_profile" class="img-fluid img-circle img-thumbnail" src="../dashboard/img/blank.jpg"
                  alt="User profile"
                  style="max-width:225px; max-height:225px; min-width:225px; min-height:225px;">
                <?php } ?>
              </div>
              <h3 class="profile-username text-center">
                <?php echo $user['user_name'];?></h3>
            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->

        </div>
        <!-- /.col -->
        <div class="col-md-9">
          <div class="card">
            <div class="card-body">
              <div class="row">
                <label for="username" class="col-sm-3">ສະຖານະ</label>
                <div class="col-sm-9">
                  <?php
                    if($user["user_active"] == "1"){
                      $status = "ເປີດໃຊ້ງານ";
                      $bg = "success";
                    }else{
                      $status ="ປິດໃຊ້ງານ";
                      $bg = "dark";
                    }
                    echo "<p class='badge badge-$bg'>".$status."</p>";
                    ?>
                </div>
              </div>
              <hr>  
              <div class="row">
                <label for="username" class="col-sm-3">ຊື່ ແລະ ນາມສະກຸນ:</label>
                <div class="col-sm-9">
                  <p><?php echo $user["user_name"];?></p>
                </div>
              </div>
              <hr>
              <div class="row">
                <label for="gender" class="col-sm-3">ເພດ:</label>
                <div class="col-sm-9">
                  <p><?php if($user["gender"] == "1"){echo "ຊາຍ";}else{echo "ຍິງ";} ?></p>
                </div>
              </div>
              <hr>
              <div class="row">
                <label for="age" class="col-sm-3">ອາຍຸ:</label>
                <div class="col-sm-9">
                  <p><?php echo $user["age"];?></p>
                </div>
              </div>
              <hr>
              <div class="row">
                <label class="col-sm-3">ວັນເດືອນປີເກີດ</label>
                <div class="col-sm-9">
                  <p><?php echo $user["bithdate"];?></p>
                </div>
              </div>
              <hr>
              <div class="row">
                <label class="col-sm-3">ພະແນກສັງກັດ:</label>
                <div class="col-sm-9">
                  <p><?php echo $user["dep_name"];?></p>
                </div>
              </div>
              <hr>
              <div class="row">
                <label class="col-sm-3">ຕຳແໜ່ງວຽກ:</label>
                <div class="col-sm-9">
                  <p><?php echo($user['position']); ?></p>
                </div>
              </div>
              <hr>
              <div class="row">
                <label class="col-sm-3">ຕຳແໜ່ງລັດ:</label>
                <div class="col-sm-9">
                  <p><?php 
                          if (isset($user['functionary'])) {
                            if ($user['functionary']==1) {
                              echo "ພະນັກງານ";
                            }elseif($user['functionary']==2) {
                              echo "ພະນັກງານອາສາ";
                            }elseif($user['functionary']==3) {
                              echo "ພະນັກງານສັນຍາຈ້າງ";
                            }
                          } ?>     
                  </p>
                </div>
              </div>
              <hr>
              <div class="row">
                <label for="email" class="col-sm-3">ອີເມວ:</label>
                <div class="col-sm-9">
                  <p><?php echo $user["mail"];?></p>
                </div>
              </div>
              <hr>
              <div class="row">
                <label for="lastname" class="col-sm-3">ເບີໂທ:</label>
                <div class="col-sm-9">
                  <p><?php echo $user["tel"];?></p>
                </div>
              </div>
              <hr>
              <div class="row">
                <label class="col-sm-3">ທີ່ຢູ່:</label>
                <div class="col-sm-9">
                  <p><?php echo $user["address"];?></p>
                </div>
              </div>
              <hr>
              <div class="row">
                <label class="col-sm-3">ລະດັບການສຶກສາ:</label>
                <div class="col-sm-9">
                  <p> <?php 
                        if(isset($user['degree'])){
                          if ($user['degree']==1){
                              echo "ປະລິນຍາຕີ";
                          }elseif($user['degree']==2){
                              echo "ປະລິນຍາໂທ";
                          }elseif($user['degree']==3){
                              echo "ປະລິນຍາເອກ";}
                          } ?></p>
                </div>
              </div>
              <hr>
              <div class="row">
                <label class="col-sm-3">ສາຂາ:</label>
                <div class="col-sm-9">
                  <p><?php echo $user["major"];?></p>
                </div>
              </div>
              <hr>
              <div class="row">
                <label class="col-sm-3">ວັນເດືອນປີເຂົ້າຊາວໜຸ່ມ:</label>
                <div class="col-sm-9">
                  <p><?php echo $user["youth_date"];?></p>
                </div>
              </div>
              <hr>
              <div class="row">
                <label class="col-sm-3">ວັນເດືອນປີເຂົ້າກຳມະບານ:</label>
                <div class="col-sm-9">
                  <p><?php echo $user["labor_date"];?></p>
                </div>
              </div>
              <hr>
              <?php if($user["women_date"] !=0000-00-00) :?>
              <div class="row">
                <label class="col-sm-3">ວັນເດືອນປີເຂົ້າແມ່ຍິງ:</label>
                <div class="col-sm-9">
                  <p><?php echo $user["women_date"];?></p>
                </div>
              </div>
              <hr>
              <?php endif; ?>
              <?php if($user["party_prepare_date"] !=0000-00-00) :?>
              <div class="row">
                <label class="col-sm-3">ວັນເດືອນປີເຂົ້າພັກສຳຮອງ:</label>
                <div class="col-sm-9">
                  <p><?php echo $user["party_prepare_date"];?></p>
                </div>
              </div>
              <hr>
              <?php endif; ?>
              <?php if($user["party_complete_date"] !=0000-00-00) :?>
              <div class="row">
                <label class="col-sm-3">ວັນເດືອນປີເຂົ້າພັກສົມບູນ:</label>
                <div class="col-sm-9">
                  <p><?php echo $user["party_complete_date"];?></p>
                </div>
              </div>
              <hr>
              <?php endif; ?>
            </div><!-- /.card-body -->
            <div class="card-footer">
              Last update: <?php echo $user["edit_date"];?>
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