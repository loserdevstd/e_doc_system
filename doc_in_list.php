<?php include('connect/conn.php'); ?>
<?php 
#doc in type select
  $type_in="
SELECT ty.*, COUNT(doc_in.in_id) AS doc_total
FROM tb_doctype AS ty
LEFT JOIN tb_doc_incoming as doc_in ON ty.type_id =doc_in.doc_type
GROUP BY ty.type_id" or die("Error!!". mysqli_error());
  $result=mysqli_query($conn, $type_in);
#doc out type select
  $type_out="
SELECT ty.*, COUNT(doc_out.out_id) AS doc_total 
FROM tb_doctype AS ty 
LEFT JOIN tb_doc_outgoing as doc_out
ON ty.type_id =doc_out.doc_type 
GROUP BY ty.type_id" or die("Error!!". mysqli_error());
  $res=mysqli_query($conn, $type_out);
?>
<title>ຫ້ອງການສັງລວມ ແລະ ຮ່ວມມື | ເອກະສານຂາເຂົ້າ</title>
<section class="content bg-black">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-12">
            <h2></h2>
          </div>
        </div>
      </div>
</section>
<!-- Main content -->
    <section class="content bg-black">
      <div class="container-fluid">
        <div class="row">
          <!-- post document list -->
          <div class="col-md-9">
              <div class="card bg-dark">
              <div class="card-body">
                <div class="col-md-3 float-left">
                  <a class="post-img" href="#"><img src="img/a.jpg" alt="pic" width="100%"></a>
                </div>
                <div class="col-md-9">
                  <div class="inner-content clearfix">
                    <h3><a href="#">ເອກະສານຂາເຂົ້າ </a></h3>
                      <div class="post-information">
                        <span>
                          <i class="fa fa-tags" style="color: orange;"></i>
                          <a href='category.php?cid=31'>categary</a>
                        </span>
                        <span>
                          <i class="fa fa-user" style="color: orange;"></i>
                          <a href="#">user post</a>
                        </span>
                        <span>
                          <i class="fa fa-calendar" style="color: orange;"></i> 21 Jan, 2020
                        </span>
                      </div>
                          <p class="description">
                            Suspendisse sed ultrices tortor. In imperdiet sem fringilla, ultricies nunc non, condimentum nunc. Praesent ac sollicitudin enim, ...
                          <a class="btn btn-primary" href="#">ລາຍລະອຽດ..</a>
                          </p>
                  </div>
                </div>
              </div>
              </div>
                <div class="card bg-dark">
                  <div class="card-body">
                    <div class="col-md-3 float-left">
                      <img src="img/a.jpg" class="card-img" alt="..." style="width: 100%">
                    </div>
                    <div class="col-md-9 float-right">
                      <h3 class="leader"><a href="#">ເອກະສານຂາອອກ</a></h3>
                      <i class="fa fa-tags" style="color: orange;"></i> <a href="#">Categary</a>
                      <i class="fa fa-user" style="color: orange;"></i> <a href="#">User</a>
                      <i class="fa fa-calendar" style="color: orange;"></i> 21 Jan, 2020
                      <p class="card-text">
                      Suspendisse sed ultrices tortor. In imperdiet sem fringilla, ultricies nunc non, condimentum nunc. Praesent ac sollicitudin enim, ...</p>
                      <a href="#" class="btn btn-primary" target="_blank">ລາຍລະອຽດ..</a>
                    </div>
                  </div>
                </div> 
          </div><!-- end post -->
          <!--================================= doc in type ======================================-->
          <div class="col-md-3">
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title"><i class="fa fa-tags"></i> ເອກະສານຂາເຂົ້າ</h3>
              </div>
              <div class="card-body bg-light">
                <?php while ($rows=mysqli_fetch_assoc($result)): ?>
                  <div class="row">
                    <div class="col-sm-12">
                      <a href="#" style="color: #">
                        <h5><?php echo($rows['type_name']); ?></h5>
                      </a>
                      <hr color="orange">
                    </div>
                  </div>
                <?php endwhile ; ?>
              </div>
            </div>
            <!-- /.card-body ==================================================================-->
            <!-- doc out type -->
              <div class="card card-primary">
                <div class="card-header">
                  <h3 class="card-title"><i class="fa fa-tags"></i> ເອກະສານຂາອອກ</h3>
                </div>
                <div class="card-body bg-light">
                <?php while ($row1=mysqli_fetch_assoc($res)): ?>
                  <div class="row">
                    <div class="col-sm-12">
                      <a href="#" style="color: #">
                        <h5><?php echo($row1['type_name']); ?></h5>
                      </a>
                      <hr color="orange">
                    </div>
                  </div>
                <?php endwhile ; ?>
                </div>
                <!-- /.card-body -->
              </div>
              <!-- /.card======================================================================= -->
              <!-- doc out type -->
              <div class="card card-primary">
                <div class="card-header">
                  <h3 class="card-title"><i class="fa fa-tags"></i> Recent post</h3>
                </div>
                <div class="card-body bg-light">
                <?php #while ($row1=mysqli_fetch_assoc($res)): ?>
                  <div class="row">
                    <div class="col-sm-12">
                      <a href="#" style="color: orange">
                        <h5><?php #echo($row1['type_name']); ?></h5>
                      </a>
                      <hr color="orange">
                    </div>
                  </div>
                <?php #endwhile ; ?>
                </div>
                <!-- /.card-body -->
              </div>
              <!-- /.card======================================================================= -->
        </div>
  </div>
</section>