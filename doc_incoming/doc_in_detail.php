<?php
  if (isset($_GET['doc-in-id'])) {
    $doc_id=$_GET['doc-in-id'];
    $sql="SELECT doc_in.*, ty.type_name, dep.dep_name, user.user_name
        FROM tb_doc_incoming doc_in 
        INNER JOIN tb_doctype ty ON doc_in.doc_type=ty.type_id
        INNER JOIN tb_department dep ON doc_in.doc_dep=dep.dep_id
        INNER JOIN tb_user user ON doc_in.staff=user.user_id
        WHERE doc_in.in_id='$doc_id'
        ORDER BY doc_in.in_id ASC";
    $res=mysqli_query($conn, $sql);
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
                <h3 class="card-title">
                  <i class="fa fa-tags"></i> <?php echo $doc["type_name"];?> 
                </h3>
              </div>
              <div class="card-body">
                <div class="row">
                  <label class="col-sm-2">ເລກທີຂາເຂົ້າ:</label>
                  <div class="col-sm-10">
                    <p><?php echo $doc["in_id"];?></p><hr>
                  </div>
                </div>
                <div class="row">
                  <label class="col-sm-2">ວັນທີ:</label>
                  <div class="col-sm-10">
                    <p><?php echo date('d-m-Y',strtotime($doc["in_date"]));?></p><hr>
                  </div>
                </div>
                <div class="row">
                  <label class="col-sm-2">ເນື້ອໃນເອກະສານ:</label>
                  <div class="col-sm-10">
                    <p><?php echo $doc["doc_title"];?></p><hr>
                  </div>
                </div>
                <div class="row">
                  <label class="col-sm-2">ເລກທີເອກະສານ:</label>
                  <div class="col-sm-10">
                  <p><?php echo $doc["doc_id"];?></p><hr>
                  </div>
                </div>
                <div class="row">
                  <label class="col-sm-2">ວັນທີ:</label>
                  <div class="col-sm-10">
                    <p><?php echo date('d-m-Y',strtotime($doc["doc_date"]));?></p><hr>
                  </div>
                </div>
                <div class="row">
                  <label class="col-sm-2">ຈາກພາກສ່ວນ:</label>
                  <div class="col-sm-10">
                    <p><?php echo $doc["doc_form"];?></p><hr>
                  </div>
                </div>
                <div class="row">
                  <label class="col-sm-2">ເກັບມ້ຽນ:</label>
                  <div class="col-sm-10">
                    <p><?php echo $doc["dep_name"];?></p><hr>
                  </div>
                </div>
                <div class="row">
                  <label class="col-sm-2">ຜູ້ຮັບເອກະສານ:</label>
                  <div class="col-sm-10">
                    <p><?php echo $doc["user_name"];?></p><hr>
                  </div>
                </div>
                <?php if ($doc['note']<>'') : ?>
                  <div class="row">
                    <label class="col-sm-2">ໝາຍເຫດ:</label>
                    <div class="col-sm-10">
                      <p><?php echo $doc["note"];?></p><hr>
                    </div>
                  </div>
                <?php endif; ?>
                <?php if ($doc['fl_name']<>'') : ?>
                <div class="row">
                  <label class="col-sm-2">ເອກະສານ:</label>
                  <a href="file upload/<?php echo($doc['fl_name']);?>" class="btn btn-primary">
                    <i class="fa fa-download"></i> ດາວໂຫຼດ
                  </a>
                </div>
                <?php endif; ?>
              </div>
              <!-- /.card-body -->
              <div class="card-footer">
                ແກ້ໄຂຫຼ້າສຸດ ວັນທີ: <?php echo date('d-m-Y',strtotime($doc["edit_date"]));?>
              </div>
            </div>
            <!-- /.card -->
          </div>
        </div>
      </div>
    </section>
<title><?php echo $doc["type_name"];?>  | ລາຍລະອຽດ</title>