<?php include("../connect/conn.php"); ?>
<?php
if (isset($_GET['mou-id'])) {
  $mou_id=$_GET['mou-id'];
  $sql="SELECT mou.*, us.user_name FROM tb_mou mou
        JOIN tb_user us ON mou.staff = us.user_id
        WHERE mou.m_id = '$mou_id'";
  $result=mysqli_query($conn, $sql) or die(mysqli_error());
  $rows=mysqli_fetch_assoc($result);
}
?>
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
                      ແກ້ໄຂໜັງສື MOU
                    </h3>
                  </div>
                  <div class="card-body pad table-responsive">
                    <table class="table table-bordered text-center">
                      <div class="col-md-12">
                        <form method="post" action="do_mou.php" enctype="multipart/form-data" id="mou_form">
                          <div class="form-group row">
                            <label for="username" class="col-sm-2 col-form-label">ປະເທດຄູ່ຮ່ວມສັນຍາ</label>
                            <div class="col-sm-10">
                              <input type="hidden" name="m_id" value="<?php echo $mou_id; ?>">
                                <input type="text" class="form-control" placeholder="Enter ..." name="m_partner" value="<?php echo $rows['m_partner']; ?>" required>
                            </div>
                          </div>
                          <div class="form-group row">
                            <label class="col-sm-2 col-form-label">ສະຖາບັນຮ່ວມສັນຍາ</label>
                            <div class="col-sm-10">
                              <input type="text" class="form-control" placeholder="Enter ..." name="name_partner" value="<?php echo $rows['name_partner']; ?>" required>
                            </div>
                          </div>
                          <div class="form-group row">
                            <label class="col-sm-2 col-form-label">ການອະນຸມັດ</label>
                            <div class="col-sm-10">
                                <select class="form-control" name="approved" required>
                                  <option value="1" 
                                    <?php if ($rows['approved']==1) {echo "selected";} ?>>ເຊັນສັນຍາແລ້ວ
                                  </option>
                                  <option value="2"
                                    <?php if ($rows['approved']==2) {echo "selected";} ?>>ອະນຸມັດແລ້ວ</option>
                                  <option value="3"
                                    <?php if ($rows['approved']==3) {echo "selected";} ?>>ບໍ່ອະນຸມັດ</option>
                                </select>
                            </div>
                          </div>
                          <div class="form-group row">
                            <label class="col-sm-2 col-form-label">ວັນລົງນາມ</label>
                            <div class="col-sm-10">
                              <input type="date" class="form-control" name="sdate" value="<?php echo $rows['signdate']; ?>">
                            </div>
                          </div>
                          <div class="form-group row">
                            <label class="col-sm-2 col-form-label">ວັນໝົດສັນຍາ</label>
                            <div class="col-sm-10">
                              <input type="date" class="form-control" name="exdate" value="<?php echo $rows['expiredate']; ?>">
                            </div>
                          </div>
                          <div class="form-group row">
                            <label class="col-sm-2 col-form-label">ການຂະຫຍາຍສັນຍາ</label>
                            <div class="col-sm-10">
                                  <select class="form-control" name="extension">
                                    <option value="1"
                                      <?php if ($rows['extension']==1) {echo "selected";} ?> >ຕ້ອງການ
                                    </option>
                                    <option value="2"
                                      <?php if ($rows['extension']==2) {echo "selected";} ?>>ບໍ່ຕ້ອງການ
                                    </option>
                                  </select>
                            </div>
                          </div>
                          <div class="form-group row">
                            <label class="col-sm-2 col-form-label">ຜູ້ເພີ່ມເອກະສານ</label>
                            <div class="col-sm-10">
                              <?php $user=mysqli_query($conn, "SELECT * FROM tb_user"); ?>
                                  <select class="form-control" name="staff" required>
                                    <?php while($rec=mysqli_fetch_assoc($user)) : ?>
                                    <option value="<?php echo($rec['user_id']); ?>"
                                      <?php if($rows['user_id']==$rec['user_id']){
                                        echo "selected";}; ?>>
                                        <?php echo($rec['user_name']); ?>
                                    </option>
                                    <?php endwhile; ?>
                                  </select>
                            </div>
                          </div>
                          <div class="form-group row">
                            <label class="col-sm-2 col-form-label">ໝາຍເຫດ</label>
                            <div class="col-sm-10">
                              <input type="text" class="form-control" name="note" placeholder="Enter ..." value="<?php echo $rows['note'];?>">
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
                            <div class="col-sm-2">
                              <button type="submit" class="btn btn-primary form-control" name="update">
                                <i class="fas fa-check-circle"></i> ບັນທຶກ
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
  
</body>
</html>
<script src="script/mou.js"></script>
