<?php
	if (isset($_GET['id'])) {
		$in_id=$_GET['id'];
		$sql="SELECT doc_in.*, us.user_name, ty.*, dep.*
          	  FROM tb_doc_incoming doc_in 
              LEFT JOIN tb_user us ON doc_in.staff=us.user_id
              LEFT JOIN tb_doctype ty ON doc_in.doc_type=ty.type_id
              LEFT JOIN tb_department dep ON doc_in.doc_dep=dep.dep_id
              WHERE doc_in.in_id='$in_id'";
        $doc=mysqli_query($conn, $sql) or die("Error to load this page"."<br>".mysqli_error($doc));
        $rec=mysqli_fetch_assoc($doc);
	}
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
                	<div class="card-footer">
                  		<h3 class="leader"><a href="#"><?php echo($rec['type_name']); ?></a></h3>
                  		<!-- <a href="#" target="_blank"> -->
                        <i class="fa fa-tags"></i> ເອກະສານຂາເຂົ້າ
                      <!-- </a> -->
                      <!-- <a href="#" target="_blank"> -->
                        <i class="fa fa-user"></i> <?php echo($rec['user_name']); ?>
                      <!-- </a> -->
                      <!-- <a href="#"> -->
                        <i class="fa fa-calendar-alt"></i> <?php echo date('d, m, Y', strtotime($rec['in_date']))?>
                      <!-- </a> -->
                  	</div>
                  <div class="card-body">
                  	<div class="col-md-12">
                      <!-- <iframe src="doc_incoming/file upload/<?php echo $file; ?>" width="100%" height="500px"></iframe> -->
                    </div>
                    <div class="col-md-12">
                      <img src="dashboard/img/a.jpg" class="card-img" alt="img" style="width: 100%">
                    </div>
                    <div class="col-md-12">
                      <p class="card-text">
                        <?php echo($rec['doc_title']); ?>
                      </p>

                      <a href="#" class="btn btn-primary" target="_blank">
                        <i class="fas fa-download"></i> Download 
                      </a>
                    </div>
                    
                  </div>
            </div>
          </div><!-- end post -->
          <!--================================= doc in type ======================================-->
          <div class="col-md-3">
            <div class="card">
              <div class="card-header bg-primary">
                ເອກະສານຂາເຂົ້າຫຼ້າສຸດ
              </div>
              <div class="container">
              <div class="card">
              	<div class="card-body bg-light">
                    <h5 class="card-title">iphone x</h5>
                    <p class="card-text small">
                    	<a href="#" target="_blank">
	                      <i class="fa fa-tags"></i> Categary
		                </a>
		                <a href="#" target="_blank">
		                  <i class="fa fa-user"></i> User
		                </a>
		                <a href="#" target="_blank">
		                  <i class="fa fa-calendar-alt"></i> 25 Jul, 2020
		                </a><br>
                    	Product type in store you can booking product in the time !!
                      	<a href="#" target="_blank"> Read More <i class="fa fa-arrow-circle-right"></i> </a>
                  	</p>
              	</div>
              </div>
              <div class="card">
              	<div class="card-body bg-light">
                    <h5 class="card-title">iphone x</h5>
                    <p class="card-text small">
                    	<a href="#" target="_blank">
	                      <i class="fa fa-tags"></i> Categary
		                </a>
		                <a href="#" target="_blank">
		                  <i class="fa fa-user"></i> User
		                </a>
		                <a href="#" target="_blank">
		                  <i class="fa fa-calendar-alt"></i> 25 Jul, 2020
		                </a><br>
                    	Product type in store you can booking product in the time !!
                      	<a href="#" target="_blank">
                      		Read More <i class="fa fa-arrow-circle-right"></i> </a>
                  	</p>
              	</div>
              </div>
              <div class="card">
              	<div class="card-body bg-light">
                    <h5 class="card-title">iphone x</h5>
                    <p class="card-text small">
                    	<a href="#" target="_blank">
	                      <i class="fa fa-tags"></i> Categary
		                </a>
		                <a href="#" target="_blank">
		                  <i class="fa fa-user"></i> User
		                </a>
		                <a href="#" target="_blank">
		                  <i class="fa fa-calendar-alt"></i> 25 Jul, 2020
		                </a><br>
                    	Product type in store you can booking product in the time !!
                      	<a href="#" target="_blank">
                      		Read More <i class="fa fa-arrow-circle-right"></i> </a>
                  	</p>
                 </div>
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
                        <?php echo($row1['type_name']); ?>
                      </a>
                      <hr color="blue">
                    </div>
                  </div>
                <?php endwhile ; ?>
              </div>
            </div>
            <!-- /.card-body ==================================================================-->
            <!-- doc out type -->
              <div class="card">
              	<blockquote class="bg-light">
	                  <h3 class="card-title"><i class="fa fa-tags"></i> ເອກະສານຂາອອກ</h3>
                </blockquote>
                <div class="card-body">
                <?php while ($row2=mysqli_fetch_assoc($res)): ?>
                      <a href="#">
                        <?php echo($row2['type_name']); ?>
                      </a>
                      <hr>
                <?php endwhile ; ?>
                </div>
                <!-- /.card-body -->
              </div>
              <!-- /.card-->
        </div>
	    </div>
	  </div>
	</section>