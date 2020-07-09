<?php include("../connect/conn.php"); ?>

<?php 
  $user=mysqli_query($conn, "SELECT * FROM tb_user WHERE user_id='$user_id'"); 
  $row=mysqli_fetch_assoc($user);
?>
<!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-light-primary elevation-4">
    <!-- Brand Logo -->
    <a href="../dashboard/" class="brand-link bg-primary">
      <img src="../dashboard/img/LOGO.png"
           alt="Logo"
           class="brand-image img-circle elevation-3">
      <span class="brand-text font-weight-light">ຫ້ອງການສັງລວມ ແລະ ຮ່ວມມື</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <a href="../dashboard/index.php?page=user-profile&user-id=<?php echo $user_id; ?>" class="d-block">
        <div class="image">
          <?php if($row['user_img']){ ?>
            <?php if(file_exists("../users/img/".$row['user_img'])){ ?>
              <img src="../users/img/<?php echo $row['user_img']; ?>" class="img-circle elevation-2" alt="User">
            <?php }else{ ?>
              <img src="../dashboard/img/blank.jpg" class="img-fluid img-circle img-thumbnail" alt="profile">
            <?php } ?>
            <?php }else{ ?>
              <img src="../dashboard/img/blank.jpg" class="img-fluid img-circle img-thumbnail" alt="profile">
          <?php } ?>
        </div>
        <!-- link to user profile -->
        <div class="info">
          <?php echo $row['user_name']; ?></a>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <!-- nav-compact -->
        <ul class="nav nav-pills nav-sidebar nav-child-indent flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <li class="nav-item">
            <a href="../dashboard/" class="nav-link <?php if($menu=="index"){echo "active";} ?> ">
              <i class="nav-icon fas fa-home"></i>
              <p>ໜ້າທຳອິດ</p>
            </a>
          </li>
          <?php if($user_level==1) : ?>
          <li class="nav-item">
            <a href="../users/index.php?page=user-list" class="nav-link <?php if($menu=="user"){echo "active";} ?> ">
              <i class="nav-icon fas fa-users"></i>
              <p>ພະນັກງານ</p>
            </a>
          </li>
          <?php endif; ?>
          <li class="nav-item">
            <a href="../doc_incoming/index.php?page=doc-in-menu" class="nav-link <?php if($menu=="doc-in"){echo "active";} ?> ">
              <i class="nav-icon fas fa-folder-open"></i>
              <p>ເອກະສານຂາເຂົ້າ</p>
            </a>
          </li>

          <li class="nav-item">
           <a href="../doc_outgoing/index.php?page=doc-out-menu" class="nav-link <?php if($menu=="doc-out"){echo "active";} ?> ">
              <i class="nav-icon fas fa-paper-plane"></i>
              <p>ເອກະສານຂາອອກ</p>
            </a>
          </li>
          <!-- only admin and external relation devision can see this -->
          <?php if(($user_level==1) || ($department==2)) : ?>
          <li class="nav-item">
           <a href="../doc_mou/index.php?page=mou-list" class="nav-link <?php if($menu=="mou"){echo "active";} ?> ">
              <i class="nav-icon fas fa-book"></i>
              <p>ໜັງສື MOU</p>
            </a>
          </li>
          <?php endif; ?>

          <li class="nav-item">
           <a href="../scholaship/index.php?page=scol-list" class="nav-link <?php if($menu=="schol"){echo "active";} ?> ">
              <i class="nav-icon fas fa-graduation-cap"></i>
              <p>ທຶນການສຶກສາ</p>
            </a>
          </li>

          <li class="nav-item">
           <a href="../report/" class="nav-link <?php if($menu=="report"){echo "active";} ?> ">
              <i class="nav-icon fas fa-chart-pie"></i>
              <p>ລາຍງານ</p>
            </a>
          </li>

          <li class="nav-item">
            <a href="../dashboard/contact.php" class="nav-link <?php if ($menu == "contact"){echo "active";} ?>">
              <i class="nav-icon fas fa-address-book"></i>
              <p>ຂໍ້ມູນຕິດຕໍ່</p>
            </a>
          </li>

          <li class="nav-item">
            <a href="../dashboard/history.php" class="nav-link <?php if ($menu == "his"){echo "active";} ?>">
              <i class="nav-icon fas fa-history"></i>
              <p>ຂໍ້ມູນຫ້ອງການ</p>
            </a>
          </li>
          <li class="nav-header"></li>


          <li class="nav-item">
            <a href="../dashboard/signout.php" class="nav-link text-danger" id="out">
              <i class="nav-icon fas fa-power-off"></i>
              <p>ອອກຈາກລະບົບ</p>
            </a>
          </li>


          
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>
  <script>
  $('#out').on('click', function(e){
    e.preventDefault();
    const href = $(this).attr('href')

    Swal.fire({
      title: 'ທ່ານຕ້ອງການອອກຈາກລະບົບ ຫຼືບໍ່?',
      icon: 'warning',
      showCancelButton: true,
      confirmButtonColor: '#3085d6',
      cancelButtonColor: '#d33',
      cancelButtonText: 'ຍົກເລີກ',
      confirmButtonText: 'ອອກຈາກລະບົບ'
    }).then((result) =>{
        if(result.value){
          document.location.href = href;
        }
    })
  })
</script>