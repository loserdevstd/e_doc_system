<?php include("../connect/conn.php"); ?>

<!-- check update -->
<?php
  if (isset($_POST['update'])) {
    $id=$_POST['id'];
    $user_level=$_POST['user_level'];
    //update level
    $sql=mysqli_query($conn,"UPDATE tb_user SET user_level='$user_level' WHERE user_id='$id'");
    if ($sql) : ?>
      <script type="text/javascript">
        window.location.replace("index.php?page=set-user&edit-id=<?php echo $id; ?>");
      </script>
    <?php endif;
  }
?>
<!-- show old level -->
<?php
  if (isset($_GET['edit'])) {
    $edit=$_GET['edit'];
    $level=mysqli_query($conn, "SELECT user_level FROM tb_user WHERE user_id='$edit'");
    $record=mysqli_fetch_assoc($level);
  }
?>
<?php
  $sql=mysqli_query($conn, "SELECT * FROM tb_user WHERE user_active=1");
  $num=1;
?>
    <!--alert update complete-->
    <?php if (isset($_GET['edit-id'])) : ?>
      <div class="edit-data" data-editdata="<?= $_GET['edit-id']; ?>"></div>
    <?php endif; ?>
<?php if (isset($_GET['edit'])) : ?>
    <section class="content">

          <div class="card">
            <br>
            <div class="card-body p-1">
              <div class="row">
                <div class="col-md-2">
                </div>
                <!-- form add and edit document type -->
                <div class="col-md-10">
                  <form role="form" method="post" action="user_set_list.php">
                    <input type="hidden" name="id" value="<?php echo $edit; ?>">
                    <div class="form-group row">
                            <label for="username" class="col-sm-2 col-form-label">ສິດຜູ້ໃຊ້</label>
                            <div class="col-6 col-lg-2">
                              <div class="custom-control custom-radio my-2">
                                <input type="radio" id="admin" name="user_level" class="custom-control-input" value="1" <?php if ($record["user_level"] == 1) echo "checked"; ?>>
                                <label class="custom-control-label" for="admin">Admin</label>
                              </div>
                            </div>
                            <div class="col-6 col-lg-2">
                              <div class="custom-control custom-radio my-2">
                                <input type="radio" id="user" name="user_level" class="custom-control-input" value="2" <?php if ($record["user_level"] == 2) echo "checked"; ?>>
                                <label class="custom-control-label" for="user">User</label>
                              </div>
                            </div>
                          </div>
                      <button type="submit" class="btn btn-success" name="update">ແກ້ໄຂ</button>
                </form>
                </div>
              </div>
            </div>
          </div>
    </section>
<?php endif ; ?>

<section class="content">

    <div class="card-body p-1">

      <div class="row">
        <div class="col-md-1">
                  
        </div>
            <div class="col-md-10">

              <div class="col-md-12">
                <div class="card">
                  <div class="card-header bg-primary">
                    <h1 class="card-title">ການກຳນົດສິດຜູ້ໃຊ້</h1>
                  </div>
                  <br>
                  <div class="card-body p-1">

                    <div class="row">
                      <div class="col-md-2">
                        
                      </div>
                      <!-- table list of document type -->
                      <div class="col-md-8">
                        <table id="example1" class="table table-bordered table-hover" role="grid" aria-describedby="example1_info">
                          <thead>
                            <tr role="row" class="info bg-primary" align="center">
                              <th  tabindex="0" rowspan="1" colspan="1" style="width: 10%;">ລຳດັບ</th>
                              <th  tabindex="0" rowspan="1" colspan="1" style="width: 10%;">ຮູບພາບ</th>
                              <th  tabindex="0" rowspan="1" colspan="1" style="width: 30%;">ຊື່ ແລະ ນາມສະກຸນ</th>
                              <th  tabindex="0" rowspan="1" colspan="1" style="width: 15%;">ສິດທິຜູ້ໃຊ້</th>
                              <th  tabindex="0" rowspan="1" colspan="1" style="width: 15%;">ຈັດການ</th>  
                            </tr>
                          </thead>
                          <tbody>
                           <!-- loop user list -->
                           <?php while($rows=mysqli_fetch_assoc($sql)) : ?>
                            <tr role="row" class="info" align="center">
                                <td style="padding-top: 25px"><?php echo $num++;?></td>
                                <td>
                                  <?php if($rows['user_img']){ ?>
                                  <?php if(file_exists("img/".$rows['user_img'])){ ?>
                                  <img id="photo_profile" class="img-fluid img-circle img-thumbnail"
                                    src="img/<?php echo $rows['user_img'];?>" alt="profile"
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
                                <td style="padding-top: 25px">
                                  <?php echo ($rows['user_name']);?>
                                </td>
                                <td style="padding-top: 25px">
                                  <?php
                                if(isset($rows['user_level'])){
                                if ($rows['user_level']==1) {
                                    echo "Admin";
                                        }elseif($rows['user_level']==2){
                                          echo "User";}
                                }
                            ?>
                                </td>

                                <td style="padding-top: 25px">
                                  <a class="btn btn-primary btn-block" 
                                    href="index.php?page=set-user&edit=<?php echo($rows['user_id']); ?>">
                                    <i class="fas fa-pencil-alt"></i> ແກ້ໄຂ</a>
                                </td>                   
                            </tr>
                          <?php endwhile ; ?>
                          </tbody>
                        </table>
                      </div>

                    </div>

                  </div>
                    
                </div>
              </div>
            </div>
          </div>
        </div>
</section>
<!-- /.content -->
<script>
//alert update complete
      const editdata = $('.edit-data').data('editdata')
        if (editdata) {
          Swal.fire({
            icon: 'success',
            title: 'ແກ້ໄຂສຳເລັດແລ້ວ',
            confirmButtonText: 'ຕົກລົງ',
          })
        }
</script>
</body>
</html>
