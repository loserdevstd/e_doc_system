<?php
    if (isset($_GET['id'])) {
      $doc_id=$_GET['id'];
      $sql="SELECT doc_out.*, ty.*, dep.*, user.user_name
        FROM tb_doc_outgoing doc_out 
        INNER JOIN tb_doctype ty ON doc_out.doc_type=ty.type_id
        INNER JOIN tb_department dep ON doc_out.doc_dep=dep.dep_id
        INNER JOIN tb_user user ON doc_out.staff=user.user_id
        WHERE doc_out.out_id='$doc_id'";
      $res=mysqli_query($conn, $sql);
      $doc=mysqli_fetch_assoc($res);
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
                      ແກ້ໄຂເອກະສານ
                </h3>
            </div>
            <div class="card-body">
              <form class="form-horizontal" enctype="multipart/form-data" action="do_doc_out.php" method="POST" id="frm">
                <input type="hidden" name="old_id" value="<?php echo $doc_id; ?>">
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
                              <?php if($doc['type_id']==$row2['type_id']){echo "selected";}?>>
                              <?php echo($row2['type_name']) ?>
                            </option>
                          <?php endwhile ; ?>
                        </select>
                      </div>
                    </div>
                    <div class="col-sm-6">
                          <div class="form-group">
                            <label>ວັນທີບັນທຶກ</label>
                            <input type="date" class="form-control" name="out_date" 
                            value="<?php echo $doc['out_date']; ?>" required>
                        </div>
                    </div>
                </div>
                <!-- textarea -->
                <div class="row">
                  <div class="col-sm-12">
                    <div class="form-group">
                        <label>ເນື້ອໃນເອກະສານ</label>
                        <textarea class="ckeditor" id="doc_title" name="doc_title" rows="3" required>
                          <?php echo $doc['doc_title']; ?>
                        </textarea>  
                    </div>
                  </div>
                </div>
                <!-- text input -->
                <div class="row">
                    <div class="col-sm-6">
                        <div class="form-group">
                          <label>ຜູ້ເຊັນ</label>
                          <input type="text" class="form-control" placeholder="Enter ..."
                          name="auther" value="<?php echo $doc['auther']; ?>" required>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group">
                          <label>ບ່ອນສົ່ງ</label>
                          <input type="text" class="form-control" placeholder="Enter ..."
                          name="place" value="<?php echo $doc['place']; ?>" required>
                        </div>
                    </div>
                </div>
                <!-- text input -->
                          <div class="row">
                            <div class="col-sm-6">
                              <div class="form-group">
                                <label>ເກັບມ້ຽນ</label>
                                <?php $dep=mysqli_query($conn, "SELECT*FROM tb_department WHERE dep_id='$department'"); ?>
                                  <select class="form-control" name="doc_dep">
                                    <option>__Select__</option>
                                    <?php while($rec=mysqli_fetch_assoc($dep)) : ?>
                                    <option value="<?php echo($rec['dep_id']); ?>"
                                    <?php if($doc['dep_id']==$rec['dep_id']){echo "selected";}?>>
                                      <?php echo($rec['dep_name']); ?>
                                    </option>
                                    <?php endwhile; ?>
                                  </select>
                              </div>
                            </div>
                            <div class="col-sm-6">
                              <div class="form-group">
                                  <label>ຜູ້ໄປສົ່ງເອກະສານ</label>
                                  <?php $users=mysqli_query($conn, "SELECT * FROM tb_user WHERE department='$department'"); ?>
                                  <select class="form-control" name="staff">
                                    <option>__Select__</option>
                                    <?php while($rows=mysqli_fetch_assoc($users)) : ?>
                                    <option value="<?php echo($rows['user_id']); ?>"
                                     <?php if($doc['staff']==$rows['user_id']){echo "selected";}?>>
                                      <?php echo($rows['user_name']); ?>
                                    </option>
                                    <?php endwhile; ?>
                                  </select>
                              </div>
                            </div>
                          </div>
                <!-- text input -->
                          <div class="row">
                            <div class="col-sm-6">
                              <div class="form-group">
                                <label>ຈຳນວນເງິນ</label>
                                <input type="number" name="amount" class="form-control" value="<?php echo $doc['amount']; ?>" placeholder="Enter ...">
                              </div>
                            </div>
                            <div class="col-sm-6">
                              <div class="form-group">
                                <label>ໝາຍເຫດ</label>
                                <input type="text" name="note" class="form-control" value="<?php echo $doc['note']; ?>" placeholder="Enter..."> 
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
                  <button type="submit" class="btn btn-primary form-control" name="update">
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
<script src="script/doc_out.js"></script>
    
</body>
<title>ເອກະສານຂາອອກ | ແກ້ໄຂເອກະສານ</title>
</html>