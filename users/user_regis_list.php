<?php include("../connect/conn.php"); ?>
<!-- update for confirm user -->
<?php
  if (isset($_GET['confirm-id'])) {
    $confirm_user=mysqli_query($conn,"UPDATE tb_user SET user_active=1 WHERE user_id=".$_GET['confirm-id']);
    if ($confirm_user) : ?>
      <script type="text/javascript">
        window.location.replace("index.php?page=confirm-user&confirm=true");
      </script>
    <?php endif ;
  }
?>

<!-- delete user registration -->
<?php
  if (isset($_GET['del-id'])) {
    $del_user=mysqli_query($conn,"DELETE FROM tb_user WHERE user_id=".$_GET['del-id']);
    if ($del_user) : ?>
      <script type="text/javascript">
        window.location.replace("index.php?page=confirm-user&delete=true");
      </script>
    <?php endif ;
  }
?>
<!-- show user list in table -->
<?php $sql=mysqli_query($conn, "SELECT us.*, dep.dep_name 
                                FROM tb_user us JOIN tb_department dep
                                ON us.department=dep.dep_id
                                WHERE user_active =0"); ?>
  <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        
      </div><!-- /.container-fluid -->
    </section>

    <!--alert delete complete-->
    <?php if (isset($_GET['delete'])) : ?>
      <div class="del-data" data-deldata="<?= $_GET['delete']; ?>"></div>
      <meta http-equiv="refresh" content="1;url=index.php?page=confirm-user">
    <?php endif; ?>

    <!--alert update complete-->
    <?php if (isset($_GET['confirm'])) : ?>
      <div class="edit-data" data-editdata="<?= $_GET['confirm']; ?>"></div>
      <meta http-equiv="refresh" content="2;url=index.php?page=confirm-user">
    <?php endif; ?>

    <section class="content">

          <div class="card">
            <div class="card-header">
              <h1 class="card-title">ຢືນຢັນຜູ້ໃຊ້</h1>
            </div>
            <br>
            <div class="card-body p-3">

              <div class="row">
                <div class="col-md-2">
                  
                </div>
                <!-- table list of document type -->
                <div class="col-md-8">
                  <table id="example1" class="table table-bordered table-hover" role="grid" aria-describedby="example1_info">
                    <thead>
                      <tr role="row" class="info bg-primary" align="center">
                        <th style="width: 2%;">ລຳດັບ</th>
                        <th style="width: 2%;">ຮູບພາບ</th>
                        <th style="width: 15%;">ຊື່ ແລະ ນາມສະກຸນ</th>
                        <th style="width: 15%;">ພະແນກສັງກັດ</th>
                        <th style="width: 20%;">ຈັດການ</th>  
                      </tr>
                    </thead>
                    <tbody>
                      <?php while($rec=mysqli_fetch_assoc($sql)) : ?>
                      <tr role="row" class="info" align="center">
                          <td style="padding-top: 25px"><?php echo($rec['user_id']); ?></td>
                          <td>
                            <?php if($rec['user_img']){ ?>
                            <?php if(file_exists("img/".$rec['user_img'])){ ?>
                            <img id="photo_profile" class="img-fluid img-circle img-thumbnail"
                              src="img/<?php echo $rec['user_img'];?>" alt="profile"
                              style="max-width:50px; max-height:50px; min-width:50px; min-height:50px;">
                            <?php }else{ ?>
                            <img id="photo_profile" class="img-fluid img-circle img-thumbnail" src="../dashboard/img/blank.jpg"
                              alt="profile"
                              style="max-width:50px; max-height:50px; min-width:50px; min-height:50px;">
                            <?php } ?>
                            <?php }else{ ?>
                            <img id="photo_profile" class="img-fluid img-circle img-thumbnail" src="../dashboard/img/blank.jpg"
                              alt="profile"
                              style="max-width:50px; max-height:50px; min-width:50px; min-height:50px;">
                            <?php } ?>
                          </td>
                          <td style="padding-top: 25px"><?php echo($rec['user_name']); ?></td>
                          <td style="padding-top: 25px"><?php echo($rec['dep_name']); ?></td>

                          <td style="padding-top: 25px">
                            <a class="btn btn-primary" 
                              href="index.php?page=confirm-user&confirm-id=<?php echo($rec['user_id']); ?>">
                              <i class="fas fa-check"></i> ຢືນຢັນ</a>
                            <a class="btn btn-danger" 
                              href="index.php?page=confirm-user&del-id=<?php echo($rec['user_id']); ?>">
                              <i class="fas fa-times"></i> ປະຕິເສດ</a>
                          </td>                   
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
<script>
  $('#del-depart').on('click', function(e){
    e.preventDefault();
    const href = $(this).attr('href')

    Swal.fire({
      title: 'ທ່ານຕ້ອງການລົບຂໍ້ມູນແທ້ ຫຼືບໍ່?',
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
//alert delete complete
      const deldata = $('.del-data').data('deldata')
        if (deldata) {
          Swal.fire({
            icon: 'success',
            title: 'ລົບຂໍ້ມູນສຳເລັດແລ້ວ',
            showConfirmButton: false,
          })
        }

//alert update complete
      const editdata = $('.edit-data').data('editdata')
        if (editdata) {
          Swal.fire({
            icon: 'success',
            title: 'ຢືນຢັນຜູ້ໃຊ້ແລ້ວ',
            showConfirmButton: false,
          })
        }
</script>
  
</body>
</html>
