<?php include('../include/header.php'); ?>
<?php include('depart_process.php'); ?>

  <?php $sql=mysqli_query($conn,"SELECT * FROM tb_department"); ?>
   <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <h1>::ຈັດການພະແນກ::</h1>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">

          <div class="card">
            <div class="card-header">
              <h3 class="card-title">ພະແນກ</h3>
            </div>
            <br>
            <div class="card-body p-1">

              <div class="row">
                <div class="col-md-2">
                  
                </div>

                <!-- form add and edit document type -->
                <div class="col-md-10">
                  <form role="form" method="post" action="depart_process.php">
                  <div class="row">
                    <div class="col-sm-7">
                      <!-- text input -->
                      <div class="form-group">
                        <input type="hidden" name="id" value="<?php echo($dep_id); ?>">
                        <input type="text" class="form-control" placeholder="ຊື່ພະແນກ" name="dep_name"
                          value="<?php echo($dep_name); ?>" required>
                      </div>
                    </div>
                  </div>
                  <?php if ($update==true) : ?>
                      <button type="submit" class="btn btn-success" name=update>Update</button>
                      <?php else : ?>
                      <button type="submit" class="btn btn-success" name=save>Save</button>
                  <?php endif; ?>
                </form>
                </div>

              </div>

            </div>
              
          </div>

    </section>

    <!--alert add complete-->
    <?php if (isset($_GET['save'])) : ?>
      <div class="add-data" data-addata="<?= $_GET['save']; ?>"></div>
      <meta http-equiv="refresh" content="1;url=depart_list.php">
    <?php endif; ?>

    <!--alert delete complete-->
    <?php if (isset($_GET['delete'])) : ?>
      <div class="del-data" data-deldata="<?= $_GET['delete']; ?>"></div>
      <meta http-equiv="refresh" content="1;url=depart_list.php">
    <?php endif; ?>

    <!--alert update complete-->
    <?php if (isset($_GET['update'])) : ?>
      <div class="edit-data" data-editdata="<?= $_GET['update']; ?>"></div>
      <meta http-equiv="refresh" content="1;url=depart_list.php">
    <?php endif; ?>

    <section class="content">

          <div class="card">
            <div class="card-header">
              <h3 class="card-title">ລາຍການ</h3>
            </div>
            <br>
            <div class="card-body p-1">

              <div class="row">
                <div class="col-md-2">
                  
                </div>
                <!-- table list of document type -->
                <div class="col-md-6">
                  <table id="example1" class="table table-bordered table-hover" role="grid" aria-describedby="example1_info">
                    <thead>
                      <tr role="row" class="info bg-primary" align="center">
                        <th  tabindex="0" rowspan="1" colspan="1" style="width: 2%;">ລະຫັດ</th>
                        <th  tabindex="0" rowspan="1" colspan="1" style="width: 10%;">ຊື່ພະແນກ</th>
                        <th  tabindex="0" rowspan="1" colspan="1" style="width: 10%;">ຈັດການ</th>  
                      </tr>
                    </thead>
                    <tbody>
                      <?php while ($row=mysqli_fetch_assoc($sql)) : ?>
                      <tr role="row">
                          <td align="center"><?php echo($row['dep_id']); ?></td>
                          <td><?php echo($row['dep_name']); ?></td>

                          <td>
                            <a class="btn btn-primary btn-sm" 
                              href="depart_list.php?edit=<?php echo($row['dep_id']);?>">
                              <i class="fas fa-pencil-alt"></i> ແກ້ໄຂ</a>
                            <a class="btn btn-danger btn-sm del-depart" id="del-depart"
                              href="depart_process.php?del=<?php echo($row['dep_id']);?>" >
                              <i class="fas fa-trash"></i> ລົບ</a>
                          </td>                   
                      </tr>
                    <?php endwhile; ?>

                    </tbody>
                  </table>
                </div>

              </div>

            </div>
              
          </div>

    </section>
    <!-- /.content -->
    <?php include('../include/footer.php'); ?>
<script>
  $('.del-depart').on('click', function(e){
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
//alert add complete
      const addata = $('.add-data').data('addata')
        if (addata) {
          Swal.fire({
            icon: 'success',
            title: 'Save success',
            showConfirmButton: false,
            timer: 2000
          })
        }
//alert delete complete
      const deldata = $('.del-data').data('deldata')
        if (deldata) {
          Swal.fire({
            icon: 'success',
            title: 'Delete success',
            showConfirmButton: false,
            timer: 2000
          })
        }

//alert update complete
      const editdata = $('.edit-data').data('editdata')
        if (editdata) {
          Swal.fire({
            icon: 'success',
            title: 'Update success',
            showConfirmButton: false,
            timer: 2000
          })
        }
</script>
  
</body>
</html>
