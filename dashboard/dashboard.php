<title>ໜ້າທຳອິດ</title>
<?php $menu="index"; ?>
<?php 
  if ($user_level==1) {
  #count all doc in
    $count_doc_in=mysqli_query($conn, "SELECT COUNT(in_id) AS all_doc_in FROM tb_doc_incoming");
    $row1=mysqli_fetch_assoc($count_doc_in);
  #count all doc out
    $count_doc_out=mysqli_query($conn, "SELECT COUNT(out_id) AS all_doc_out FROM tb_doc_outgoing");
    $row2=mysqli_fetch_assoc($count_doc_out);
  #count all user regis
    $count_user=mysqli_query($conn, "SELECT COUNT(user_id) AS all_user_regis FROM tb_user WHERE user_active = 0");
    $row3=mysqli_fetch_assoc($count_user);
  #count all mou
    $count_mou=mysqli_query($conn, "SELECT COUNT(m_id) AS all_mou FROM tb_mou");
    $row4=mysqli_fetch_assoc($count_mou);
  }elseif ($user_level==2) {
    #count doc in by department
    $count_doc_in=mysqli_query($conn, "SELECT COUNT(in_id) AS all_doc_in FROM tb_doc_incoming WHERE doc_dep='$department'");
    $row1=mysqli_fetch_assoc($count_doc_in);
    #count doc out by department
    $count_doc_out=mysqli_query($conn, "SELECT COUNT(out_id) AS all_doc_out FROM tb_doc_outgoing WHERE doc_dep='$department'");
    $row2=mysqli_fetch_assoc($count_doc_out);
    if ($department==2) {
      #count all mou
      $count_mou=mysqli_query($conn, "SELECT COUNT(m_id) AS all_mou FROM tb_mou");
      $row4=mysqli_fetch_assoc($count_mou);
    }
  }

?>
<title>Dashboard</title>
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <h1>ໜ້າທຳອິດ</h1>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
    	<div class="container-fluid">
    	<!-- Small Box (Stat card) -->
        <div class="row">
          <div class="col-md-3 col-6">
            <!-- small card -->
            <div class="small-box bg-primary">
              <div class="inner">
                <h3><?php echo($row1['all_doc_in']); ?></h3>

                <h5>ເອກະສານຂາເຂົ້າ</h5>
              </div>
              <div class="icon">
                <i class="fas fa-folder-open"></i>
              </div>
              <a href="../doc_incoming/index.php?page=doc-in-all" class="small-box-footer">
                ລາຍລະອຽດ <i class="fas fa-arrow-circle-right"></i>
              </a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-md-3 col-6">
            <!-- small card -->
            <div class="small-box bg-success">
              <div class="inner">
                <h3><?php echo($row2['all_doc_out']); ?></h3>

                <h5>ເອກະສານຂາອອກ</h5>
              </div>
              <div class="icon">
                <i class="fas fa-paper-plane"></i>
              </div>
              <a href="../doc_outgoing/index.php?page=doc-out-all" class="small-box-footer">
                ລາຍລະອຽດ <i class="fas fa-arrow-circle-right"></i>
              </a>
            </div>
          </div>
          <!-- ./col -->
          <?php if ($user_level==1) : ?>
          <div class="col-md-3 col-6">
            <!-- small card -->
            <div class="small-box bg-warning">
              <div class="inner">
                <h3><?php echo($row3['all_user_regis']); ?></h3>

                <h5>ຜູ້ລົງທະບຽນນຳໃຊ້</h5>
              </div>
              <div class="icon">
                <i class="fas fa-user-plus"></i>
              </div>
              <a href="../users/index.php?page=confirm-user" class="small-box-footer">
                ລາຍລະອຽດ <i class="fas fa-arrow-circle-right"></i>
              </a>
            </div>
          </div>
          <?php endif; ?>
          <!-- Small Box -->
          <?php if(($user_level==1) || ($department==2)) : ?>
            <div class="col-md-3 col-6">
              <!-- small card -->
              <div class="small-box bg-dark">
                <div class="inner">
                  <h3><?php echo($row4['all_mou']); ?></h3>

                  <h5>ເອກະສານ MOU</h5>
                </div>
                <div class="icon">
                  <i class="fas fa-home"></i>
                </div>
                <a href="../doc_mou/index.php?page=mou-list" class="small-box-footer">
                  ລາຍລະອຽດ <i class="fas fa-arrow-circle-right"></i>
                </a>
              </div>
            </div>
          <?php endif; ?>
          <!-- ./col -->
          <div class="col-md-3 col-6">
            <!-- small card -->
            <div class="small-box bg-danger">
              <div class="inner">
                <h3>65</h3>

                <h5>ການລາຍງານ</h5>
              </div>
              <div class="icon">
                <i class="fas fa-chart-pie"></i>
              </div>
              <a href="#" class="small-box-footer">
                ລາຍລະອຽດ <i class="fas fa-arrow-circle-right"></i>
              </a>
            </div>
          </div>
          <!-- ./col -->
        </div>

        <!-- /.row -->
    	</div>
	</section>