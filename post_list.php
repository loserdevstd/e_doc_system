<?php include('connect/conn.php'); ?>
<?php
                        /* Calculate Offset Code */
                        $limit = 3;
                        if(isset($_GET['p'])){
                          $page = $_GET['p'];
                        }else{
                          $page = 1;
                        }
                        $offset = ($page - 1) * $limit;
                        $sql="SELECT doc_out.*, us.user_name, ty.*, dep.*
                              FROM tb_doc_outgoing doc_out 
                              LEFT JOIN tb_user us ON doc_out.staff=us.user_id
                              LEFT JOIN tb_doctype ty ON doc_out.doc_type=ty.type_id
                              LEFT JOIN tb_department dep ON doc_out.doc_dep=dep.dep_id
                              WHERE doc_out.doc_type=2
                              ORDER BY doc_out.out_id DESC LIMIT {$offset},{$limit}";
                        $doc=mysqli_query($conn, $sql);
?>
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
<title>ຫ້ອງການສັງລວມ ແລະ ຮ່ວມມື | ລາຍການເອກະສານ</title>
<section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-12">
            <h2></h2>
          </div>
        </div>
      </div>
</section>
<!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <!-- post document list -->
          <div class="col-md-9">
            <div class="card">
              <?php if(mysqli_num_rows($doc) > 0){
                    while($rec=mysqli_fetch_assoc($doc)){ ?>
                <div class="card">
                  <blockquote>
                  <div class="card-body">
                    <div class="col-md-2 float-left">
                      <img src="dashboard/img/a.jpg" class="card-img" alt="img" style="width: 100%">
                    </div>
                    <div class="col-md-10 float-right">
                      <h3 class="leader"><a href="#"><?php echo($rec['type_name']); ?></a></h3>
                      <p class="card-text">
                        <?php echo($rec['doc_title']); ?>
                      </p>

                      <a href="#" class="btn btn-primary" target="_blank">
                        ລາຍລະອຽດ <i class="fas fa-arrow-circle-right"></i>
                      </a>
                    </div>
                    
                  </div>
                  </blockquote>
                  <div class="card-footer float-right small">
                      <!-- <a href="#" target="_blank"> -->
                        <i class="fa fa-tags"></i> ແຈ້ງການເອກະສານຂາອອກ
                      <!-- </a> -->
                      <!-- <a href="#" target="_blank"> -->
                        <i class="fa fa-user"></i> <?php echo($rec['user_name']); ?>
                      <!-- </a> -->
                      <!-- <a href="#"> -->
                        <i class="fa fa-calendar-alt"></i> <?php echo date('d, m, Y',strtotime($rec['out_date'])); ?>
                      <!-- </a> -->
                    </div>
                </div>
            <?php } }else{echo "<h2>No Record Found.</h2>";} ?>
            <?php
                        // show pagination
                        $count = "SELECT * FROM tb_doc_outgoing";
                        $row = mysqli_query($conn, $count) or die("Failed to Load data.");

                        if(mysqli_num_rows($row) > 0){

                          $total_records = mysqli_num_rows($row);

                          $total_page = ceil($total_records / $limit);

                          echo '<nav aria-label="..." style="align-self: center">
                                  <ul class="pagination">';
                          if($page > 1){
                            echo '<li class="page-item">
                                    <a class="page-link" href="index.php?p='.($page - 1).'" tabindex="-1" aria-disabled="true">Previous</a>
                                  </li>';
                          }
                          for($i = 1; $i <= $total_page; $i++){
                            if($i == $page){
                              $active = "active";
                            }else{
                              $active = "";
                            }
                            echo '<li class="page-item '.$active.'" aria-current="page">
                                    <a class="page-link" href="index.php?p='.$i.'"> '.$i.' <span class="sr-only">(current)</span></a>
                                  </li>';
                          }
                          if($total_page > $page){
                            echo '<li class="page-item">
                                    <a class="page-link" href="index.php?p='.($page + 1).'">Next</a>
                                  </li>';
                          }

                          echo '  </ul>
                                </nav>';
                        }
          ?>
            </div>
          </div><!-- end post -->
          <!--================================= doc in type ======================================-->
          <div class="col-md-3">
            <div class="card">
              <div class="card-header bg-primary">
                ແຈ້ງການຫຼ້າສຸດ
              </div>
              <div class="card-body">
                    <img src="dashboard/img/a.jpg" class="card-img-top" alt="...">
                      <h5 class="card-title">iphone x</h5>
                      <p class="card-text small">Product type in store you can booking product in the time !!</p>
                      <a href="#" class="btn btn-primary btn-sm" target="_blank">Read More..</a>
                <div class="card-footer small">
                    <a href="#" target="_blank">
                        <i class="fa fa-tags"></i> Categary
                    </a>
                    <a href="#" target="_blank">
                        <i class="fa fa-user"></i> User
                    </a>
                    <a href="#" target="_blank">
                        <i class="fa fa-calendar"></i> 25 Jul, 2020
                    </a>
                </div>
              </div>
            </div>
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title"><i class="fa fa-tags"></i> ເອກະສານຂາເຂົ້າ</h3>
              </div>
              <div class="card-body bg-light">
                <?php while ($row1=mysqli_fetch_assoc($result)): ?>
                  <div class="row">
                    <div class="col-sm-12">
                      <a href="#">
                        <h5><?php echo($row1['type_name']); ?></h5>
                      </a>
                      <hr color="blue">
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
                <?php while ($row2=mysqli_fetch_assoc($res)): ?>
                  <div class="row">
                    <div class="col-sm-12">
                      <a href="#">
                        <h5><?php echo($row2['type_name']); ?></h5>
                      </a>
                      <hr color="blue">
                    </div>
                  </div>
                <?php endwhile ; ?>
                </div>
                <!-- /.card-body -->
              </div>
              <!-- /.card======================================================================= -->
        </div>
        <!-- recent post -->
             <!-- <div class="col-md-12">
              <div class="card card-primary card-outline">
                <div class="card-header">
                  <h3 class="card-title" style="color: black">Recent post</h3>
                </div>
              </div>
            </div>
                <div class="col-md-6">
                  <div class="card-body bg-light">
                      <div class="col-md-3 float-left">
                        <img src="img/a.jpg" class="card-img" alt="img" style="width: 100%">
                      </div>
                      <div class="col-md-9 float-right">
                        <h4 class="leader"><a href="#">ເອກະສານຂາອອກ</a></h4>
                        <a href="#" target="_blank">
                          <i class="fa fa-tags"></i> Categary
                        </a>
                        <a href="#" target="_blank">
                          <i class="fa fa-user"></i> User
                        </a>
                        <a href="#" target="_blank">
                          <i class="fa fa-calendar"></i> 25 Jul, 2020
                        </a>
                        <p class="card-text">
                        Suspendisse sed ultrices tortor. In imperdiet sem fringilla, ultricies nunc non, condimentum nunc. Praesent ac sollicitudin enim, ...
                        <a href="#" class="btn btn-primary" target="_blank">Read More..</a>
                        </p>
                      </div>
                  </div>
                </div>

                <div class="col-md-6">
                  <div class="card-body bg-light">
                      <div class="col-md-3 float-left">
                        <img src="img/a.jpg" class="card-img" alt="img" style="width: 100%">
                      </div>
                      <div class="col-md-9 float-right">
                        <h4 class="leader"><a href="#">ເອກະສານຂາອອກ</a></h4>
                        <a href="#" target="_blank">
                          <i class="fa fa-tags"></i> Categary
                        </a>
                        <a href="#" target="_blank">
                          <i class="fa fa-user"></i> User
                        </a>
                        <a href="#" target="_blank">
                          <i class="fa fa-calendar"></i> 25 Jul, 2020
                        </a>
                        <p class="card-text">
                        Suspendisse sed ultrices tortor. In imperdiet sem fringilla, ultricies nunc non, condimentum nunc. Praesent ac sollicitudin enim, ...
                        <a href="#" class="btn btn-primary" target="_blank">Read More..</a>
                        </p>
                      </div>
                  </div>
                </div> -->
              <!-- /.card======================================================================= -->
    </div>
  </div>
</section>
<section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-12">
            <h2></h2>
          </div>
        </div>
      </div>
</section>