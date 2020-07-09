  <nav class="main-header  navbar navbar-expand navbar-primary navbar-dark">
    <ul class="navbar-nav">
      <!-- hamburger menu -->
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#"><i class="fas fa-bars"></i></a>
      </li>

      <li class="nav-item">
        <a class="nav-link <?php if ($menu == "index"){echo "active";} ?>"  href="../dashboard/">
          <i class="fas fa-home"></i> ໜ້າທຳອິດ</a>
      </li>
      <!-- dropdown -->
      <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          <i class="fas fa-cog"></i> ຈັດການ</a>
          <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                <a class="dropdown-item" 
                  href="../department/depart_list.php"><i class="fas fa-user-tag"></i> ຈັດການພະແນກ</a>
                <a class="dropdown-item" 
                  href="../doctype/doc_type_list.php"><i class="fas fa-book"></i> ຈັດການແຟ້ມເອກະສານ</a>
                <div class="dropdown-divider"></div>
                <?php if($user_level==1) : ?>
                <a class="dropdown-item" 
                href="../users/index.php?page=set-user"><i class="fas fa-users-cog"></i> ກຳນົດສິດຜູ້ໃຊ້</a>
                <?php endif; ?>
          </div>
      </li>
    </ul>
        
    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
      <li class="nav-item ">
        <a href="../dashboard/signout.php" class="nav-link " id="signout">
          <i class="fas fa-power-off"></i> ອອກຈາກລະບົບ
        </a>
        
      </li>
    </ul>
  </nav>
  <!-- /.navbar -->
   <!-- call alert confirm to sign out -->
<script>
  $('#signout').on('click', function(e){
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