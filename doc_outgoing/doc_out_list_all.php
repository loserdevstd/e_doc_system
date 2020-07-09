<title>ເອກະສານຂາອອກ | ລາຍການທັງໝົດ</title>
<?php
  if ($user_level==1) {
    $sql="SELECT doc_out.*, ty.*, dep.*
        FROM tb_doc_outgoing doc_out 
        JOIN tb_doctype ty ON doc_out.doc_type=ty.type_id
        JOIN tb_department dep ON doc_out.doc_dep=dep.dep_id
        ORDER BY doc_out.out_id ASC";
    $result=mysqli_query($conn, $sql);
  }elseif ($user_level==2) {
    $sql="SELECT doc_out.*, ty.*, dep.*
        FROM tb_doc_outgoing doc_out 
        JOIN tb_doctype ty ON doc_out.doc_type=ty.type_id
        JOIN tb_department dep ON doc_out.doc_dep=dep.dep_id
        WHERE doc_out.doc_dep='$department'
        ORDER BY doc_out.out_id ASC";
    $result=mysqli_query($conn, $sql);
  }
?>
  <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <h1>ລາຍການເອກະສານຂາອອກທັງໝົດ</h1>
      </div><!-- /.container-fluid -->
    </section>
    <!--alert add complete-->
    <?php if (isset($_GET['add'])) : ?>
      <div class="add-data" data-addata="<?= $_GET['add']; ?>"></div>
      <meta http-equiv="refresh" content="1;url=index.php?page=doc-out-all">
    <?php endif; ?>

    <!--alert delete complete-->
    <?php if (isset($_GET['del'])) : ?>
      <div class="del-data" data-deldata="<?= $_GET['del']; ?>"></div>
      <meta http-equiv="refresh" content="1;url=index.php?page=doc-out-all">
    <?php endif; ?>

    <!--alert update complete-->
    <?php if (isset($_GET['edit'])) : ?>
      <div class="edit-data" data-editdata="<?= $_GET['edit']; ?>"></div>
      <meta http-equiv="refresh" content="1;url=index.php?page=doc-out-all">
    <?php endif; ?>
    <section class="content">

          <div class="card">
            <div class="card-header">
              <a href="index.php?page=doc-out-add" class="btn btn-primary">
                <i class="fas fa-plus-circle"></i> ເພີ່ມເອກະສານ</a>
            </div>
            <br>
            <div class="card-body p-1">

              <div class="row">
                <div class="col-md-1">
                  
                </div>
                <!-- table list of document type -->
                <div class="col-md-12">

                  <form action="do_doc_out.php" id="frm" method="POST">
                  <table id="example1" class="table table-bordered table-hover" role="grid" aria-describedby="example1_info">
                    <thead>
                      <tr role="row" class="info" align="center">
                        <th style="width: 2%">ຈັດການ</th> 
                        <th style="width: 5%">ເລກທີ</th>
                        <th style="width: 10%">ວັນທີ</th>
                        <th style="width: 10%; word-wrap: break-word;">ປະເພດ</th>
                        <th style="width: 30%; word-wrap: break-word;">ເນື້ອໃນເອກະສານ</th>
                        <th style="width: 15%">ຜູ້ເຊັນ</th>
                        <th style="width: 10%">ບ່ອນສົ່ງ</th>
                        <th style="width: 10%; word-wrap: break-word;">ເກັບມ້ຽນ</th>  
                      </tr>
                    </thead>
                    <tbody>
                      <?php while($rec=mysqli_fetch_assoc($result)) : ?>
                      <tr>
                          <td style="padding-top: 20px">
                            <!-- <a class="btn btn-primary btn-sm"
                              href="#">
                              <i class="fas fa-pencil-alt"></i> ແກ້ໄຂ</a>
                            <a class="btn btn-danger btn-sm" id="del-type"
                              href="#">
                              <i class="fas fa-trash"></i> ລົບ</a> -->
                            <div class="dropdown">
                            <button class="btn btn-success btn-sm dropdown-toggle" type="button"
                              id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                              <i class="fas fa-cog"></i>
                            </button>
                            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                              <a class="dropdown-item"
                                  href="index.php?page=doc-detail&doc-out-id=<?php echo($rec['out_id']); ?>"><i
                                    class="fas fa-eye"></i> ລາຍລະອຽດ</a>
                          
                              <a class="dropdown-item"
                                  href="index.php?page=doc-out-edit&id=<?php echo($rec['out_id']); ?>">
                                  <i class="fas fa-edit"></i> 
                                  ແກ້ໄຂ</a>

                              <a class="dropdown-item delete" 
                                  href="do_doc_out.php?del=<?php echo($rec['out_id']); ?>&type=<?php echo($rec['type_id']); ?>&page=all">
                                  <i class="fas fa-trash"></i> ລົບ</a>
                      
                            </div>
                          </div>
                          </td>   
                          <td style="padding-top: 30px" align="center">
                            <?php echo($rec['out_id']); ?>
                          </td>
                          <td style="padding-top: 30px"><?php echo($rec['out_date']); ?></td>
                          <td style="padding-top: 30px"><?php echo($rec['type_name']); ?></td>
                          <td><?php echo($rec['doc_title']); ?></td>
                          <td style="padding-top: 30px"><?php echo($rec['auther']); ?></td>
                          <td style="padding-top: 30px"><?php echo($rec['place']); ?></td>
                          <td style="padding-top: 30px"><?php echo($rec['dep_name']); ?></td>
                      </tr>
                        <?php endwhile; ?>
                    </tbody>
                  </table>
                  <?php if($user_level==1) : ?>
                  <div class="row">
                      <div class="col-md-12">
                        <div class="btn-group">
                          <button type="button" class="btn-sm btn">
                            <div class="icheck-primary d-inline">
                              <input type="checkbox" id="checkall" name="checkall">
                              <label for="checkall"> ເລືອກທັງໝົດ</label>
                            </div>
                          </button>
                          <button 
                            type="submit" class="btn-sm btn btn-danger btn-delete-all del-all" disabled
                            data-toggle="modal"
                            data-target="#modalDeleteAll"><i class="fas fa-trash"></i> ລົບ
                          </button>
                        </div>
                      </div>
                    </div>
                  <?php endif; ?>
                </form>

                </div>

              </div>

            </div>
              
          </div>

    </section>
    <!-- /.content -->
</body>
</html>
<script type="text/javascript">
    $('.del-all').on('click', function(e){
    e.preventDefault();
    const form = $(this).parents('form')

    Swal.fire({
      title: 'ທ່ານຕ້ອງການລົບເອກະສານທັງໝົດ ຫຼືບໍ່?',
      icon: 'warning',
      showCancelButton: true,
      confirmButtonColor: '#3085d6',
      cancelButtonColor: '#d33',
      cancelButtonText: 'ຍົກເລີກ',
      confirmButtonText: 'ລົບ',
      closeOnConfirm: false,
    }).then((result) =>{
        if(result.value){
          form.submit();
        }
    })
  })
  $('.delete').on('click', function(e){
    e.preventDefault();
    const href = $(this).attr('href')

    Swal.fire({
      title: 'ທ່ານຕ້ອງການລົບເອກະສານແທ້ ຫຼືບໍ່?',
      icon: 'warning',
      showCancelButton: true,
      confirmButtonColor: '#3085d6',
      cancelButtonColor: '#d33',
      cancelButtonText: 'ຍົກເລີກ',
      confirmButtonText: 'ລົບ',
    }).then((result) =>{
        if(result.value){
          document.location.href = href;
        }
    })
  })
//alert add complete
      const addata = $('.add-data').data('addata')
        if (addata) {
          Swal.fire({
            position: 'center',
            icon: 'success',
            title: 'ບັກທຶກເອກະສານສຳເລັດ',
            showConfirmButton: false,
            timer: 2000
          })
        }
//alert delete complete
      const deldata = $('.del-data').data('deldata')
        if (deldata) {
          Swal.fire({
            icon: 'success',
            title: 'ລົບເອກະສານສຳເລັດ',
            showConfirmButton: false,
            timer: 2000
          })
        }

//alert update complete
      const editdata = $('.edit-data').data('editdata')
        if (editdata) {
          Swal.fire({
            icon: 'success',
            title: 'ແກ້ໄຂເອກະສານສຳເລັດ',
            showConfirmButton: false,
            timer: 2000
          })
        }

  $("#checkall").on("click", function(){
    if($(this).is(':checked')){
        $("input[name='ch[]']").prop("checked", true);
        $(".btn-delete-all").prop("disabled", false);
    }else{
        $("input[name='ch[]']").prop("checked", false);
        $(".btn-delete-all").prop("disabled", true);
    }
   
})

$("#modalDeleteAll .btn-continue").off();
$("#modalDeleteAll .btn-continue").on("click", function(){
    $("#frm").submit();
})
</script>