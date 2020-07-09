<?php $menu="contact" ?>
<?php include("../connect/conn.php"); ?>
<?php include("../include/header.php"); ?>
<?php
  $contact=mysqli_query($conn, "SELECT * FROM tb_user WHERE user_active=1");
?>
      <!-- Default box -->
      <div class="card card-solid">
        <div class="card-body pb-0">
          <div class="row d-flex align-items-stretch">
            <?php while($rec=mysqli_fetch_assoc($contact)) : ?>
            <div class="col-12 col-sm-6 col-md-4 d-flex align-items-stretch">
              <div class="card bg-light">
                <div class="card-header text-muted border-bottom-0">
                  <b>ຂໍ້ມູນ: <?php echo($rec['user_name']); ?></b><hr>
                </div>
                <div class="card-body pt-0">
                  <div class="row">
                    <div class="col-7">
                      <p class="text-muted text-sm"><b>ລະດັບການສຶກສາ: </b><?php 
                      if (isset($rec['degree'])) {
                         if ($rec['degree']==1) {
                            echo "ປະລິນຍາຕີ";
                          }elseif($rec['degree']==2){
                            echo "ປະລິນຍາໂທ";
                          }elseif($rec['degree']==3){
                            echo "ປະລິນຍາເອກ";}
                       } ?>
                      <b>ສາຂາ: </b><?php echo($rec['major']); ?></p>
                      <ul class="ml-4 mb-0 fa-ul text-muted">
                        <li class="small"><span class="fa-li"><i class="fas fa-lg fa-building"></i></span> <b>ທີ່ຢູ່: </b><?php echo($rec['address']); ?></li>
                        <li class="small"><span class="fa-li"><i class="fas fa-lg fa-phone"></i></span> <b>ເບີໂທ: </b>+ 856 <?php echo($rec['tel']); ?></li>
                        <li class="small"><span class="fa-li"><i class="fas fa-lg fa-envelope"></i></span> <b>ອີເມວ: </b><?php echo($rec['mail']); ?></li>
                      </ul>
                    </div>
                    <div class="col-5 text-center">
                      <?php if($rec['user_img']){ ?>
                      <?php if(file_exists("../users/img/".$rec['user_img'])){ ?>
                      <img class="img-circle img-fluid"
                        src="../users/img/<?php echo $rec['user_img'];?>" alt="User profile">
                      <?php }else{ ?>
                      <img class="img-circle img-fluid" src="img/blank.jpg"
                        alt="User profile">
                      <?php } ?>
                      <?php }else{ ?>
                      <img class="img-circle img-fluid" src="img/blank.jpg"
                        alt="User profile">
                      <?php } ?>
                    </div>
                  </div>
                </div>
                <div class="card-footer">
                  <div class="text-right">
                    <a href="../users/index.php?page=user-detail&id=<?php echo($rec['user_id']); ?>" class="btn btn-sm btn-primary">
                      ລາຍລະອຽດ <i class="fas fa-arrow-circle-right"></i>
                    </a>
                  </div>
                </div>
              </div>
            </div>
          <?php endwhile ; ?>

          </div>
        </div>
        <!-- /.card-body -->

      </div>
      <!-- /.card -->
  <?php include("../include/footer.php"); ?>