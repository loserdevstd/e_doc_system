<?php

?>
<section class="content">
  <div class="card">
    <div class="card-header">
        <a href="scol_fm_add.php" class="btn btn-primary"><i class="fa fa-plus-circle"></i> ເພີ່ມທຶນໃໝ່</a>
    </div>
    <br>
      <div class="card-body p-1">
        <div class="row">
                <!-- table list of document type -->
                <div class="col-md-12">
                  <table id="example1" class="table table-bordered table-hover" role="grid" aria-describedby="example1_info">
                    <thead>
                      <tr role="row" class="info bg-primary" align="center">
                        <th  tabindex="0" rowspan="1" colspan="1" style="width: 5%;">ລຳດັບ</th>
                        <th  tabindex="0" rowspan="1" colspan="1" style="width: 20%;">ຊື່ທຶນ</th>
                        <th  tabindex="0" rowspan="1" colspan="1" style="width: 20%;">ທຶນຈາກ</th> 
                        <th  tabindex="0" rowspan="1" colspan="1" style="width: 10%;">ວັນເປີດສະໝັກ</th>
                        <th  tabindex="0" rowspan="1" colspan="1" style="width: 10%;">ວັນໝົດກຳນົດ</th>
                        <th  tabindex="0" rowspan="1" colspan="1" style="width: 15%;">ຈັດການ</th> 
                      </tr>
                    </thead>
                    <tbody>
                      <?php #while ($row=mysqli_fetch_assoc($sql)) : ?>
                      <tr role="row">
                          <td align="center">1<?php #echo($row['dep_id']); ?></td>
                          <td>AAAAAAAA<?php #echo($row['dep_name']); ?></td>
                          <td>AAAAAA</td>
                          <td>AAAAAA</td>
                          <td>AAAAAA</td>
                          <td>
                            <a class="btn btn-primary btn-sm" 
                              href="#">
                              <i class="fas fa-pencil-alt"></i> ແກ້ໄຂ</a>
                            <a class="btn btn-danger btn-sm del-depart"
                              href="#" >
                              <i class="fas fa-trash"></i> ລົບ</a>
                          </td>                   
                      </tr>
                <?php #endwhile; ?>

              </tbody>
            </table>
          </div>

        </div>

      </div>
              
  </div>
</section>