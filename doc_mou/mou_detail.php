<?php include("../connect/conn.php"); ?>

<?php
  if (isset($_GET['mou-id'])) {
  	$m_id=$_GET['mou-id'];
    $res=mysqli_query($conn, "SELECT mou.*, us.user_name 
    						  FROM tb_mou mou JOIN tb_user us
    						  ON mou.staff = us.user_id WHERE m_id='$m_id'");
    $doc=mysqli_fetch_assoc($res);
  }
?>
    <section class="content-header">
      <div class="container-fluid">
        <h1>ລາຍລະອຽດເອກະສານ</h1>
      </div><!-- /.container-fluid -->
    </section>

<!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-12">
            <!-- Detail -->
            <div class="card card-primary">
              <div class="card-header">
                <div class="card-title"> 
                  <!-- ຜູ້ບັນທຶກ &nbsp;<i class="fa fa-user"></i> <?php echo $doc["user_name"];?> -->
                  ວັນທີບັນທຶກ &nbsp;<i class="fa fa-calendar-alt"></i> <?php echo $doc["add_date"];?>
                </div>
              </div>
              <div class="card-body">
                <div class="row">
                  <label class="col-sm-2">ປະເທດຮ່ວມສັນຍາ:</label>
                  <div class="col-sm-10">
                    <p><?php echo $doc["m_partner"];?></p><hr>
                  </div>
                </div>
                <div class="row">
                  <label class="col-sm-2">ສະຖາບັນຮ່ວມສັນຍາ:</label>
                  <div class="col-sm-10">
                  <p><?php echo $doc["name_partner"];?></p><hr>
                  </div>
                </div>
                <div class="row">
                  <label class="col-sm-2">ການອະນຸມັດ:</label>
                  <div class="col-sm-10">
                    <p>
                    	<?php 
                    		if ($doc["approved"]==1) {
                    			echo "ເຊັນສັນຍາແລ້ວ";
                    		}elseif($doc["approved"]==2){
                    			echo "ອະນຸມັດແລ້ວ";
                    		}else{ echo "ບໍ່ອະນຸມັດ";}
                    	?>
                    </p><hr>
                  </div>
                </div>
                <div class="row">
                  <label class="col-sm-2">ວັນທີເຊັນສັນຍາ:</label>
                  <div class="col-sm-10">
                    <p><?php echo $doc["signdate"];?></p><hr>
                  </div>
                </div>
                <div class="row">
                  <label class="col-sm-2">ວັນໝົດອາຍຸສັນຍາ:</label>
                  <div class="col-sm-10">
                    <p><?php echo $doc["expiredate"];?></p><hr>
                  </div>
                </div>
                <div class="row">
                  <label class="col-sm-2">ການຂະຫຍາຍສັນຍາ:</label>
                  <div class="col-sm-10">
                    <p>
                    	<?php 
                    		if ($doc["extension"]==1) {
                    			echo "ຕ້ອງການ";
                    		}elseif($doc["approved"]==2){
                    			echo "ບໍ່ຕ້ອງການ";
                    		}
                    	?>
                    </p><hr>
                  </div>
                </div>
                <?php if($doc['note'] <>'') : ?>
                <div class="row">
                  <label class="col-sm-2">ໝາຍເຫດ:</label>
                  <div class="col-sm-10">
                    <p><?php echo $doc["note"];?></p><hr>
                  </div>
                </div>
                <?php endif; ?>
                <?php if($doc['fl_name'] <>'') : ?>
                <div class="row">
                  <label class="col-sm-2"></label>
                  <a href="file_upload/<?php echo($doc['fl_name']);?>" class="btn btn-primary">
                    <i class="fa fa-download"></i> ດາວໂຫຼດເອກະສານ
                  </a>
                </div>
            	<?php endif; ?>
              </div>
              <div class="card-footer">
              	Last update: <?php echo($doc['edit_date']); ?>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
        </div>
      </div>
    </section>