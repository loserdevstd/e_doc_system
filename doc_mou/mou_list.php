<?php include("../connect/conn.php"); ?>
<?php
    $res=mysqli_query($conn, "SELECT * FROM tb_mou");
    $i = 1;
?>
  <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <h1>ໜັງສື MOU</h1>
      </div><!-- /.container-fluid -->
    </section>

    <section class="content">

    <!--alert add complete-->
    <?php if (isset($_GET['add'])) : ?>
      <div class="add-data" data-addata="<?= $_GET['add']; ?>"></div>
      <!-- set after alert 1second back index -->
      <meta http-equiv="refresh" content="1;url=index.php?page=mou-list">
    <?php endif; ?>

    <!--alert delete complete-->
    <?php if (isset($_GET['del'])) : ?>
      <div class="del-data" data-deldata="<?= $_GET['del']; ?>"></div>
      <meta http-equiv="refresh" content="1;url=index.php?page=mou-list">
    <?php endif; ?>

    <!--alert update complete-->
    <?php if (isset($_GET['edit'])) : ?>
      <div class="edit-data" data-editdata="<?= $_GET['edit']; ?>"></div>
      <meta http-equiv="refresh" content="1;url=index.php?page=mou-list">
    <?php endif; ?>

          <div class="card">
            <div class="card-header">
              <a href="index.php?page=mou-add" class="btn btn-primary">
                <i class="fas fa-plus-circle"></i> ເພີ່ມ MOU</a>
            </div>
            <br>
            <div class="card-body p-1">

              <div class="row">
                <div class="col-md-1">
                  
                </div>
                <!-- table list of document type -->
                <div class="col-md-12">

                  <form action="do_mou.php" id="frm" method="POST">
                  <table id="example1" class="table table-bordered table-hover" role="grid" aria-describedby="example1_info">
                    <thead>
                      <tr role="row" class="info" align="center">
                        <th style="width: 2%">ຈັດການ</th>
                        <th style="width: 2%">ລຳດັບ</th>
                        <!-- <th style="width: 2%">ລະຫັດ</th> --> 
                        <th style="width: 15%">ປະເທດຮ່ວມສັນຍາ</th>
                        <th style="width: 15%; word-wrap: break-word;">ສະຖາບັນຮ່ວມສັນຍາ</th>
                        <th style="width: 10%">ການອະນຸມັດ</th>
                        <th style="width: 10%">ວັນລົງນາມ</th>
                        <th style="width: 10%">ວັນໝົດອາຍຸ</th>
                        <th style="width: 15%">ການຂະຫຍາຍສັນຍາ</th> 
                      </tr>
                    </thead>
                    <tbody>
                      <?php while($rows=mysqli_fetch_assoc($res)) : ?>
                      <tr>
                        <td>
                            <div class="dropdown">
                            <button class="btn btn-success btn-sm dropdown-toggle" type="button"
                              id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                              <i class="fas fa-cog"></i>
                            </button>
                            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                              <a class="dropdown-item"
                                  href="index.php?page=mou-detail&mou-id=<?php echo($rows['m_id']); ?>"><i
                                    class="fas fa-eye"></i> ລາຍລະອຽດ</a>
                          
                              <a class="dropdown-item"
                                  href="index.php?page=mou-edit&mou-id=<?php echo($rows['m_id']); ?>"><i class="fas fa-edit"></i> 
                                  ແກ້ໄຂ</a>
                             
                                 
                              <a class="dropdown-item del-data" href="do_mou.php?del=<?php echo($rows['m_id']); ?>">
                                <i class="fas fa-trash"></i> ລົບ</a>
                      
                            </div>
                          </div>
                          </td> 
                          <td  align="center"><?php echo $i++;?></td>
                          <!-- <td><?php echo($rows['m_id']); ?></td> -->
                          <td><?php echo($rows['m_partner']); ?></td>
                           <td><?php echo($rows['name_partner']); ?></td>
                           <td>
                            <?php 
                            if(isset($rows['approved'])){
                              if ($rows['approved']==1) {
                                echo "ເຊັນສັນຍາແລ້ວ";
                              }elseif($rows['approved']==2){
                                echo "ອະນຸມັດແລ້ວ";
                              }elseif($rows['approved']==3){
                                echo "ບໍ່ອະນຸມັດ";
                              }
                            }?>
                            </td>
                            <td><?php echo($rows['signdate']); ?></td>
                            <td><?php echo($rows['expiredate']); ?></td>
                           <td>
                              <?php 
                            if(isset($rows['extension'])){
                              if ($rows['extension']==1) {
                                echo "ຕ້ອງການ";
                              }elseif($rows['extension']==2){
                                echo "ບໍ່ຕ້ອງການ";
                              } 
                            } ?>
                           </td>
                                             
                      </tr>
                      <?php endwhile; ?>
                    </tbody>
                  </table>
                  <?php if ($user_level==1) : ?>
                  <div class="row">
                  <div class="col-md-12">
                    <div class="btn-group">
                      <button type="button" class="btn-sm btn">
                        <div class="icheck-primary d-inline">
                          <input type="checkbox" id="checkall" name="checkall">
                          <label for="checkall"> ເລືອກທັງໝົດ</label>
                        </div>
                      </button>
                      <button type="submit" class="btn-sm btn btn-danger btn-delete-all" disabled data-toggle="modal"
                        data-target="#modalDeleteAll" name="del" id="del-all"><i class="fas fa-trash"></i> ລົບ
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
<script>
  $('.del-data').on('click', function(e){
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

  $('#del-all').on('click', function(e){
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