<?php $menu="doc-in"; ?>
<?php include('../include/header.php'); ?>
<?php
  if (isset($_GET['id'])) {
    $ty_id=$_GET['id'];
    $ty_name=$_GET['name'];
//if user is admin
      if ($user_level==1) {
        $sql="SELECT doc_in.*, ty.type_id, ty.type_name, dep.dep_name
            FROM tb_doc_incoming doc_in JOIN tb_doctype ty
            ON doc_in.doc_type=ty.type_id
            JOIN tb_department dep ON doc_in.doc_dep=dep.dep_id
            WHERE ty.type_id='$ty_id'
            ORDER BY doc_in.in_id DESC";
        $result=mysqli_query($conn, $sql);
//if user is nomal user
      }elseif ($user_level==2) {
        $sql="SELECT doc_in.*, ty.type_id, ty.type_name, dep.dep_name
            FROM tb_doc_incoming doc_in JOIN tb_doctype ty
            ON doc_in.doc_type=ty.type_id
            JOIN tb_department dep ON doc_in.doc_dep=dep.dep_id
            WHERE ty.type_id='$ty_id' AND doc_in.doc_dep='$department'
            ORDER BY doc_in.in_id DESC";
        $result=mysqli_query($conn, $sql);
      }
  }
?>
<title>ເອກະສານຂາເຂົ້າ | <?php echo $ty_name; ?></title>
<!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <h1><?php echo($ty_name); ?></h1>
      </div><!-- /.container-fluid -->
    </section>
    <!--alert add complete-->
    <?php if (isset($_GET['add'])) : ?>
      <div class="add-data" data-addata="<?= $_GET['add']; ?>"></div>
      <meta http-equiv="refresh" content="1;url=doc_list_by_type.php?id=<?php echo $ty_id; ?>&name=<?php echo $ty_name; ?>">
    <?php endif; ?>

    <!--alert delete complete-->
    <?php if (isset($_GET['del'])) : ?>
      <div class="del-data" data-deldata="<?= $_GET['del']; ?>"></div>
      <meta http-equiv="refresh" content="1;url=doc_list_by_type.php?id=<?php echo $ty_id; ?>&name=<?php echo $ty_name; ?>">
    <?php endif; ?>

    <!--alert update complete-->
    <?php if (isset($_GET['edit'])) : ?>
      <div class="edit-data" data-editdata="<?= $_GET['edit']; ?>"></div>
      <meta http-equiv="refresh" content="1;url=doc_list_by_type.php?id=<?php echo $ty_id; ?>&name=<?php echo $ty_name; ?>">
    <?php endif; ?>
    <section class="content">

          <div class="card">
            <div class="card-header">
              <a href="index.php?page=doc-in-add&type=<?php echo $ty_id; ?>" class="btn btn-primary">
                <i class="fas fa-plus-circle"></i> ເພີ່ມເອກະສານ</a>
            </div>
            <br>
            <div class="card-body p-1">

              <div class="row">
                <div class="col-md-1">
                  
                </div>
                <!-- table list of document type -->
                <div class="col-md-12">
                  <table id="example1" class="table table-bordered table-hover" role="grid" aria-describedby="example1_info">
                    <thead>
                      <tr role="row" class="info" align="center">
                        <th style="width: 2%">ຈັດການ</th>
                        <th style="width: 5%">ເລກທີ</th>
                        <th style="width: 10%">ວັນທີ</th>
                        <th style="width: 30%; word-wrap: break-word;">ເນື້ອໃນເອກະສານ</th>
                        <th style="width: 15%">ເລກທີເອກະສານ</th>
                        <th style="width: 10%">ວັນທີ</th>
                        <th style="width: 15%; word-wrap: break-word;">ເກັບມ້ຽນ</th> 
                      </tr>
                    </thead>
                    <tbody>
                      <?php while($rows=mysqli_fetch_assoc($result)) : ?>
                      <tr>
                        <td style="padding-top: 30px">
                            <div class="dropdown">
                            <button class="btn btn-success btn-sm dropdown-toggle" type="button"
                              id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                              <i class="fas fa-cog"></i>
                            </button>
                            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                              <a class="dropdown-item"
                                  href="index.php?page=doc-detail&doc-in-id=<?php echo($rows['in_id']); ?>">
                              <i class="fas fa-eye"></i> ລາຍລະອຽດ</a>
                              <a class="dropdown-item"
                                  href="index.php?page=doc-in-edit&id=<?php echo($rows['in_id']); ?>">
                                <i class="fas fa-edit"></i> ແກ້ໄຂ</a>   
                              <a class="dropdown-item delete" 
                                  href="do_doc_in.php?del=<?php echo($rows['in_id']); ?>&type=<?php echo($rows['type_id']); ?>">
                                <i class="fas fa-trash"></i> ລົບ</a>
                      
                            </div>
                            </div>
                          </td>   
                          <td style="padding-top: 30px"><?php echo ($rows['in_id']); ?></td>
                          <td style="padding-top: 30px"><?php echo($rows['in_date']); ?></td>
                           <td><?php echo($rows['doc_title']); ?></td>
                           <td style="padding-top: 30px"><?php echo($rows['doc_id']); ?></td>
                           <td style="padding-top: 30px"><?php echo($rows['doc_date']); ?></td>
                           <td style="padding-top: 30px"><?php echo($rows['dep_name']); ?></td> 
                      </tr>
                      <?php endwhile ; ?>
                    </tbody>
                  </table>

                </div>

              </div>

            </div>
              
          </div>

    </section>
    <!-- /.content -->
<?php include('../include/footer.php'); ?>
  
</body>
</html>
<script>
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
</script>