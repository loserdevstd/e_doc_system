<!--start  footer -->
<!-- Start Contact info -->
<div class="contact-imfo-box bg-primary">
  <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-12">
              <br>
          </div>
        </div>
      </div>
  </section>
    <div class="container">
      <div class="row">
        <div class="col-md-3">
          <div class="overflow-hidden">
            <h4> </h4>
            <p class="text">
            <i class="fa fa-phone"></i> <b>ເບີໂທຫ້ອງການ:</b><br>
            &nbsp;&nbsp;&nbsp;&nbsp;041-212-155<br>
            &nbsp;&nbsp;&nbsp;&nbsp;041-212-155
            </p>
          </div>
        </div>
        <div class="col-md-3">
          <div class="overflow-hidden">
            <h4> </h4>
            <p class="text">
              <i class="fa fa-envelope"></i> <b>Email:</b><br>&nbsp;&nbsp;&nbsp;&nbsp;skulaos@gmail.com<br>
              <i class="fa fa-building"></i> <b>Post box:</b>&nbsp;xxxxx-xxxx<br>
            </p>
          </div>
        </div>
        <div class="col-md-3">
          <div class="overflow-hidden">
            <h4> </h4>
            <p class="text">
            <i class="fa fa-map-marker-alt"></i> <b>Location:</b> <br>&nbsp;&nbsp;&nbsp;&nbsp;ຖະໜົນອຸດົມສິນ, ບ້ານນາເຊັງ,<br> &nbsp;&nbsp;&nbsp;&nbsp;ນະຄອນໄກສອນພົມວິຫານ.
            </p>
          </div>
        </div>
        <div class="col-md-3">
          <div class="overflow-hidden">
            <h4> </h4>
            <p class="text">
              <i class="fa fa-clock"></i> <b>ເວລາທຳການ:</b><br> &nbsp;&nbsp;&nbsp;&nbsp;ຈັນ-ສຸກ 8:00-16:00.<br>
              &nbsp;&nbsp;&nbsp;&nbsp;ເສົາ-ອາທິດ ປິດທຳການ.<br>
            </p>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- End Contact info -->
  
  <!-- Start Footer -->
  <footer class="footer-area bg-primary">
    <div class="container">
      <div class="row">
        <div class="col-lg-12 col-md-8">
          <p align="center">
              <b>ກ່ຽວກັບ:</b>&nbsp;ເວັບໄຊຫ້ອງການສັງລວມ ແລະ ຮ່ວມມື ມະຫາວິທະຍາໄລສະຫວັນນະເຂດ. ສ້າງຂື້ນເພື່ອເຜີຍແພ່ຂໍ້ມູນຂ່າວສານ ແລະ ແຈ້ງການຕ່າງໆພາຍໃນມະຫາວິທະຍາໄລສະຫວັນນະເຂດ.
          </p>
        </div>
      </div>
    </div>
    
<section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-12" style="background: blue;">
            <p> </p>
            <p class="company-name" align="center">&copy; <?php echo date('Y'); ?>
              <a href="#" style="color: white;">ຫ້ອງການສັງລວມ ແລະ ຮ່ວມມື</a>
            </p>
          </div>
        </div>
      </div>
</section>

    
  </footer>
    <!-- End Footer -->
    </body>
</html>
    <!--end  footer -->
  </body>
</html>
<!-- jQuery -->
<script src="assets/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- DataTables -->
<script src="assets/plugins/datatables/jquery.dataTables.js"></script>
<script src="assets/plugins/datatables-bs4/js/dataTables.bootstrap4.js"></script>
<script src="assets/plugins/bootstrap-tagsinput/tagsinput.js?v=1"></script>
<!-- Select2 -->
<script src="assets/plugins/select2/js/select2.full.min.js"></script>

<!-- AdminLTE App -->
<script src="assets/dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->

<script>
  $(document).ready(function () {
    //$('.sidebar-menu').tree();
    //$('.select2').select2();
    //Initialize Select2 Elements
    $('.select2').select2({
      theme: 'bootstrap4'
    })
  })
</script>




<script>
  $(function () {
    $('#example1').DataTable()
    $('#example2').DataTable({
      'paging'      : true,
      'lengthChange': false,
      'searching'   : false,
      'ordering'    : true,
      'info'        : true,
      'autoWidth'   : false
    })
  })
</script>