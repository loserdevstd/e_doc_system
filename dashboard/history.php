<?php $menu="contact" ?>
<?php include("../connect/conn.php"); ?>
<?php include("../include/header.php"); ?>
<section class="content-header">
      <div class="container-fluid">
        
      </div><!-- /.container-fluid -->
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
                      ຂໍ້ມູນຂອງຫ້ອງການ
                    </h3>
                  </div>
                  <div class="card-body pad table-responsive">
                    <!-- <p>ກະລຸນາປ້ອນຂໍ້ມູນ</p> -->
                    <table class="table table-bordered text-center">
                      <div class="col-md-12">
                        <form method="post" action="do_doc_in.php" enctype="multipart/form-data">
                          <!-- text input -->
                          <div class="row">
                            <div class="col-sm-12">
                              <div class="form-group">
                                <label>ປະຫວັດຄວາມເປັນມາ</label>
                                <textarea class="ckeditor" cols=""  name="doc_title" rows="3"></textarea>
                              </div>
                            </div>
                            <div class="col-sm-12">
                              <div class="form-group">
                                <label>ວິໃສທັດ</label>
                                <textarea class="ckeditor" cols=""  name="doc_title" rows="3"></textarea>
                              </div>
                            </div>
                          </div>
                          <!-- textarea -->
                          <div class="row">
                            <div class="col-sm-12">
                              <div class="form-group">
                                <label>ໂຄງຮ່າງການຈັດຕັ້ງ</label>
                                <textarea class="ckeditor" cols=""  name="doc_title" rows="3"></textarea>  
                              </div>
                            </div>
                          </div>
                          <!-- text input -->
                          <div class="row">
                            <div class="col-sm-6">
                              <div class="form-group">
                                <label>ເລກທີເອກະສານ</label>
                                <input type="text" class="form-control" placeholder="Enter ..." name="doc_id">
                              </div>
                            </div>
                            <div class="col-sm-6">
                              <div class="form-group">
                                <label>ວັນທີ</label>
                                <input type="date" class="form-control" name="doc_date">
                              </div>
                            </div>
                          </div>
                                <br>
                                <br>
                            <div class="col-sm-2">
                              <button type="submit" class="btn btn-primary form-control" name="add">
                                <i class="fa fa-check-circle"> </i> Save
                              </button>
                            </div>

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
    </section>
<?php include("../include/footer.php"); ?>