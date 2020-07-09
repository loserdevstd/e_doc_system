<?php
  if (isset($_GET['doc-out-id'])) {
    $doc_id=$_GET['doc-out-id'];
    //if user is admin
    if ($user_level==1) {
      $sql="SELECT doc_out.*, ty.*, dep.*, user.user_name
        FROM tb_doc_outgoing doc_out 
        INNER JOIN tb_doctype ty ON doc_out.doc_type=ty.type_id
        INNER JOIN tb_department dep ON doc_out.doc_dep=dep.dep_id
        INNER JOIN tb_user user ON doc_out.staff=user.user_id
        WHERE doc_out.out_id='$doc_id'";
    //if user is normal user 
    }elseif ($user_level==2) {
      $sql="SELECT doc_out.*, ty.*, dep.*, user.user_name
        FROM tb_doc_outgoing doc_out 
        INNER JOIN tb_doctype ty ON doc_out.doc_type=ty.type_id
        INNER JOIN tb_department dep ON doc_out.doc_dep=dep.dep_id
        INNER JOIN tb_user user ON doc_out.staff=user.user_id
        WHERE doc_out.out_id='$doc_id' AND doc_out.doc_dep='$department'";
    }
    
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
                  <label class="col-sm-2">ເລກທີຂາອອກ:</label>
                  <div class="col-sm-10">
                    <p><?php echo $doc["out_id"];?></p><hr>
                  </div>
                </div>
                <div class="row">
                  <label class="col-sm-2">ວັນທີ:</label>
                  <div class="col-sm-10">
                    <p><?php echo date('d-m-Y',strtotime($doc["out_date"]));?></p><hr>
                  </div>
                </div>
                <div class="row">
                  <label class="col-sm-2">ເນື້ອໃນເອກະສານ:</label>
                  <div class="col-sm-10">
                    <p><?php echo $doc["doc_title"];?></p><hr>
                  </div>
                </div>
                <div class="row">
                  <label class="col-sm-2">ຜູ້ເຊັນ:</label>
                  <div class="col-sm-10">
                  <p><?php echo $doc["auther"];?></p><hr>
                  </div>
                </div>
                <div class="row">
                  <label class="col-sm-2">ບ່ອນສົ່ງ:</label>
                  <div class="col-sm-10">
                    <p><?php echo $doc["place"];?></p><hr>
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
                <div class="row">
                  <label class="col-sm-2">ຈຳນວນເງິນ:</label>
                  <div class="col-sm-10">
                    <p><?php echo $doc["amount"];?></p><hr>
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