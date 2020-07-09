<?php 
  if ($user_level==1) {
    $sql="
        SELECT ty.*, COUNT(doc_out.out_id) AS doc_total 
        FROM tb_doctype AS ty 
        LEFT JOIN tb_doc_outgoing as doc_out
        ON ty.type_id =doc_out.doc_type 
        GROUP BY ty.type_id" or die("Error!!". mysqli_error());
    $result=mysqli_query($conn, $sql);

  }elseif ($user_level==2) {
    $sql="
        SELECT ty.*, COUNT(doc_out.out_id) AS doc_total 
        FROM tb_doctype AS ty 
        LEFT JOIN tb_doc_outgoing as doc_out
        ON ty.type_id =doc_out.doc_type AND doc_out.doc_dep='$department'
        GROUP BY ty.type_id" or die("Error!!". mysqli_error());
    $result=mysqli_query($conn, $sql);
  }
?>
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <h1>ແຟ້ມເອກະສານຂາອອກ</h1>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">

       <div class="row">
<?php while ($rows=mysqli_fetch_assoc($result)): ?>
        <div class="col-md-3 col-sm-6 col-12">
          <a href="doc_list_by_type.php?id=<?php echo($rows['type_id']); ?>&name=<?php echo($rows['type_name']); ?>">
            <div class="info-box card-primary card-outline">
              <span class="info-box-icon bg-primary"><i class="far fa-folder-open"></i></span>

              <div class="info-box-content">
                <span class="info-box-text"><h3><?php echo($rows['type_name']); ?></h3></span>
                <span class="info-box-number"><?php echo($rows['doc_total']); ?></span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
            </a>
          </div> 
<?php endwhile ; ?>
        
       </div>
  
    </section>
    <!-- /.content -->
  
</body>
</html>