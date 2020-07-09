<?php include("connect/conn.php"); ?>
<?php 
    $sql="SELECT ty.*, COUNT(doc_in.in_id) AS doc_total
FROM tb_doctype AS ty
LEFT JOIN tb_doc_incoming as doc_in ON ty.type_id =doc_in.doc_type
GROUP BY ty.type_id"; 
$result=mysqli_query($conn, $sql)or die("Error!!". mysqli_error($sql));
?>

    <!--start  menu -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-primary sticky-top">
      <img src="dashboard/img/LOGO_CUT.png" style="width: 25px; margin-bottom: 10px">&nbsp;
            <a class="navbar-brand" href="../demo/">
              ຫ້ອງການສັງລວມ ແລະ ຮ່ວມມື
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
              <ul class="navbar-nav mr-auto">
                <li class="nav-item">
                  <a class="nav-link <?php if($act=="home"){echo "active";} ?>" href="../demo/">
                    <i class="fa fa-home"></i> ໜ້າທຳອິດ</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link <?php if($act=="doc-in-list"){echo "active";} ?>" href="index.php?page=doc-in-list"><i class="bi bi-arrow-right-circle"></i> ເອກະສານຂາເຂົ້າ</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link <?php if($act=="doc-out-list"){echo "active";} ?>" href="index.php?page=doc-out-list">ເອກະສານຂາອອກ</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link <?php if($act=="scollaship"){echo "active";} ?>" href="index.php?page=scoll">ທຶນການສຶກສາ</a>
                </li>
                <li class="nav-item dropdown">
                  <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <i class="fa fa-info"></i> ກ່ຽວກັບ
                  </a>
                  <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                    <a class="dropdown-item" href="#">ປະຫວັດຂອງຫ້ອງການ</a>
                    <a class="dropdown-item" href="#">ວິໃສທັດ</a>
                    <a class="dropdown-item" href="#">ໂຄງຮ່າງການຈັດຕັ້ງ</a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="#">ກ່ຽວກັບລະບົບ</a>
                  </div>
                </li>
                <li class="nav-item">
                  <a class="nav-link <?php if($act=="login"){echo "active";} ?>" href="login.php" target="_blank" >ເຂົ້າສູ່ລະບົບ</a>
                </li>
              </ul>
              
              <form class="form-inline my-2 my-lg-0"> 
                <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
                <button class="btn btn-primary my-2 my-sm-0" type="submit">ຄົ້ນຫາ</button>
              </form>
            </div>
        </nav>
    <!--end  menu -->