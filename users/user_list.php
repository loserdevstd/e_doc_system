<title>ຂໍ້ມູນພະນັກງານ</title>
<?php
  $sql = mysqli_query($conn,"SELECT us.*, dep.dep_name FROM tb_user us JOIN tb_department dep ON us.department=dep.dep_id ORDER BY us.user_id ASC");
?>
  <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <h1>ຂໍ້ມູນພະນັກງານ</h1>
      </div><!-- /.container-fluid -->
    </section>
    <!--alert add complete-->
    <?php if (isset($_GET['add'])) : ?>
      <div class="add-data" data-addata="<?= $_GET['add']; ?>"></div>
      <meta http-equiv="refresh" content="1;url=index.php?page=user-list">
    <?php endif; ?>
    <!--alert add failed-->
    <?php if (isset($_GET['fail'])) : ?>
      <div class="fail-data" data-faildata="<?= $_GET['fail']; ?>"></div>
      <meta http-equiv="refresh" content="1;url=index.php?page=user-list">
    <?php endif; ?>
    <!--alert delete complete-->
    <?php if (isset($_GET['del-id'])) : ?>
      <div class="del-data" data-deldata="<?= $_GET['del-id']; ?>"></div>
      <meta http-equiv="refresh" content="1;url=index.php?page=user-list">
    <?php endif; ?>

    <!--alert update complete-->
    <?php if (isset($_GET['edit'])) : ?>
      <div class="edit-data" data-editdata="<?= $_GET['edit']; ?>"></div>
      <meta http-equiv="refresh" content="1;url=index.php?page=user-list">
    <?php endif; ?>
    <section class="content">

          <div class="card">
            <div class="card-header">
              <a href="index.php?page=add-user" class="btn btn-primary">
                <i class="fas fa-user-plus"></i> ເພີ່ມຜູ້ໃຊ້</a>
            </div>
            <br>
            <div class="card-body p-1">

              <div class="row">
                <div class="col-md-1">
                  
                </div>
                <!-- table list of document type -->
                <div class="col-md-12">

                  <form method="POST" action="do_user.php" id="frm" >
                  <table id="example1" class="table table-bordered table-striped dataTable table-hover" role="grid" aria-describedby="example1_info">
                    <thead>
                      <tr role="row" class="info" align="center">
                        <th style="width: 2%">ລະຫັດ</th>
                        <th style="width: 5%">ຮູບພາບ</th>
                        <th style="width: 10%">ຊື່ ແລະ ນາມສະກຸນ</th>
                        <th style="width: 5%">ພະແນກ</th>
                        <th style="width: 5%">ສະຖານະ</th>
                        <th style="width: 5%">ລະດັບຜູ້ໃຊ້</th>
                        <th style="width: 15%">ຈັດການ</th>  
                      </tr>
                    </thead>
                    <tbody>
                      <!-- loop user list -->
                      <?php while($rows=mysqli_fetch_assoc($sql)){ ?>
                      <tr align="center">
                          <td style="padding-top: 50px"><?php echo ($rows['user_id']);?></td>
                          <td>
                            <?php if($rows['user_img']){ ?>
                              <?php if(file_exists("../users/img/".$rows['user_img'])){ ?>
                                <img class="img img-fluid img-circle" 
                                     src="img/<?php echo ($rows['user_img']);?>" alt="User"
                                style="max-width:100px; max-height:100px; min-width:100px; min-height:100px;">
                              <?php }else{ ?>
                              <img class="img-fluid img-circle img-thumbnail" src="../dashboard/img/blank.jpg"
                                alt="profile"
                                style="max-width:100px; max-height:100px; min-width:100px; min-height:100px;">
                              <?php } ?>
                              <?php }else{ ?>
                              <img class="img-fluid img-circle img-thumbnail" src="../dashboard/img/blank.jpg"
                                alt="User profile picture"
                                style="max-width:100px; max-height:100px; min-width:100px; min-height:100px;">
                              <?php } ?>
                          </td>
                          <td style="padding-top: 50px">
                            <?php echo ($rows['user_name']);?>
                          </td>
                          <td style="padding-top: 50px"><?php echo ($rows['dep_name']);?></td>
                          <td style="padding-top: 50px">
                            <?php
                                if(isset($rows['user_active'])){
                                if ($rows['user_active']==1) {
                                    echo "<span class='badge badge-pill badge-success'>ເປີດໃຊ້ງານ</span>";
                                        }elseif($rows['user_active']==0){
                                          echo "<span class='badge badge-pill badge-secondary'>ປິດໃຊ້ງານ</span>";}
                                }
                            ?>
                          </td>
                          <td style="padding-top: 50px">
                            <?php
                                if(isset($rows['user_level'])){
                                if ($rows['user_level']==1) {
                                    echo "Admin";
                                        }elseif($rows['user_level']==2){
                                          echo "User";}
                                }
                            ?>
                          </td>
                          <td style="padding-top: 50px">
                            <a class="btn btn-info btn-sm"
                              href="index.php?page=user-detail&id=<?php echo ($rows['user_id']);?>">
                              <i class="fas fa-eyes-alt"></i> ລາຍລະອຽດ</a>
                            <a class="btn btn-primary btn-sm"
                              href="index.php?page=user-edit&id=<?php echo ($rows['user_id']);?>">
                              <i class="fas fa-pencil-alt"></i> ແກ້ໄຂ</a>
                            <a class="btn btn-danger btn-sm del-user" id="del-type"
                              href="do_user.php?user-del=<?php echo ($rows['user_id']);?>">
                              <i class="fas fa-trash"></i> ລົບ</a>
                          </td>                   
                      </tr>
                      <!-- end loop -->
                      <?php } ?>
                    </tbody>
                  </table>
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
                </form>
                </div>

              </div>

            </div>
              
          </div>

    </section>
    <!-- /.content -->
  
</body>
</html>
<script>
  //confirm to delete all user
  $('.del-all').on('click', function(e){
    e.preventDefault();
    const href = $(this).attr('href')

    Swal.fire({
      title: 'ທ່ານຕ້ອງການລົບຂໍ້ມູນທັງໝົດ ຫຼືບໍ່?',
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
  //confirm to delete user
  $('.del-user').on('click', function(e){
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
            title: 'ເພີ່ມພະນັກງານ ສຳເລັດ',
            showConfirmButton: false,
            timer: 2000
          })
        }
  //alert add user fail
      const faildata = $('.fail-data').data('faildata')
        if (faildata) {
          Swal.fire({
            icon: 'error',
            title: 'ມີບັນຊີຜູ້ໃຊ້ນີ້ຢູ່ແລ້ວ',
            showConfirmButton: false,
            timer: 2000
          })
        }

//alert delete complete
      const deldata = $('.del-data').data('deldata')
        if (deldata) {
          Swal.fire({
            icon: 'success',
            title: 'ລົບພະນັກງານ ສຳເລັດ',
            showConfirmButton: false,
            timer: 2000
          })
        }

//alert update complete
      const editdata = $('.edit-data').data('editdata')
        if (editdata) {
          Swal.fire({
            icon: 'success',
            title: 'ແກ້ໄຂຂໍ້ມູນພະນັກງານ ສຳເລັດ',
            showConfirmButton: false,
            timer: 2000
          })
        }
</script>
<script type="text/javascript">
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