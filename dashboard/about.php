<?php $menu="about"?>
<?php include("../include/header.php"); ?>
<!DOCTYPE html>
<html>
<head>
	<style type="text/css">
		a{color:#000000;}
		a:hover{color: #03a9ff;}
	</style>
	<title>About us</title>
</head>
	<div class="card-header bg-dark" style="border-color: blue">
    <center><h3>::ຜູ້ພັດທະນາລະບົບ::</h3></center>
  </div>
<div style="width: 700px; height: 550px; margin-left: 20%">
	
        <div class="container" style="margin-top: 10%;">
        	<div class="row">
        		<div class="col-md-3">
        			<a href="img/a.png" target="_blank"><img src="img/a.png" alt="Pic" class="img-circle elevation-2" width="100%" height="95%"></a>
        		</div>
        		<div class="col-md-9 " style="padding-top: 4%; font-size: 18px">
    <a href="#"><b>ຊື່ :</b> ທ້າວ ປະກາຍດາວ ສິດທິເດດ 	ຫ້ອງ : BIT4/1<br>
              	<b>ສາຂາ :</b> ເຕັກໂນໂລຊີຂໍ້ມູນຂ່າວສານ<br>
              	<b>ຄະນະ :</b> ເຕັກໂນໂລຊີຂໍ້ມູນຂ່າວສານ ມະຫາວິທະຍາໄລ ສະຫວັນນະເຂດ<br>
              	<b>e-mail :</b> loser.std@gmail.com<br></a>
                <a href="facebook.com/loser.std" class="btn btn-success btn-sm"><i class="fas fa-phone"></i></a>
                <a href="#" class="btn btn-info btn-sm"><i class="fas fa-dollar-sign"></i></a>
                <a href="#" class="btn btn-warning btn-sm"><i class="fas fa-address-book"></i></a>
                <a href="#" class="btn btn-danger btn-sm"><i class="fas fa-paper-plane"></i></a>
        		</div>
        	</div>
<hr color="black">
        	<div class="row">
        		<div class="col-md-3">
        			<a href="img/a.png" target="_blank"><img src="img/a.png" alt="Pic" class="img-circle elevation-2" width="100%" height="95%"></a>
        		</div>
        		<div class="col-md-9" style="padding-top: 4%; font-size: 18px">
    <a href="#"><b>ຊື່ :</b> ທ້າວ ປະກາຍດາວ ສິດທິເດດ 	ຫ້ອງ : BIT4/1<br>
              	<b>ສາຂາ :</b> ເຕັກໂນໂລຊີຂໍ້ມູນຂ່າວສານ<br>
              	<b>ຄະນະ :</b> ເຕັກໂນໂລຊີຂໍ້ມູນຂ່າວສານ ມະຫາວິທະຍາໄລ ສະຫວັນນະເຂດ<br>
              	<b>e-mail :</b> loser.std@gmail.com<br></a>
                <a href="facebook.com/loser.std" class="btn btn-success btn-sm"><i class="fas fa-phone"></i></a>
                <a href="#" class="btn btn-info btn-sm"><i class="fas fa-dollar-sign"></i></a>
                <a href="#" class="btn btn-warning btn-sm"><i class="fas fa-address-book"></i></a>
                <a href="#" class="btn btn-danger btn-sm"><i class="fas fa-paper-plane"></i></a>
        		</div>
        	</div>
        </div><p></p><br><br><hr>
        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal" data-whatever="@mdo" style="margin-left: 80%;">Report problem</button>
</div>
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Report problem</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form>
          <div class="form-group">
            <label for="recipient-name" class="col-form-label">E-mail:</label>
            <input type="text" class="form-control" id="recipient-name">
          </div>
          <div class="form-group">
            <label for="message-text" class="col-form-label">Problems:</label>
            <textarea class="form-control" id="message-text"></textarea>
          </div>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Send message</button>
      </div>
    </div>
  </div>
</div>
</html>	
<script>
    $('#exampleModal').on('show.bs.modal', function (event) {
  var button = $(event.relatedTarget) // Button that triggered the modal
  var recipient = button.data('whatever') // Extract info from data-* attributes
  // If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
  // Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
  var modal = $(this)
  modal.find('.modal-title').text('New message to ' + recipient)
  modal.find('.modal-body input').val(recipient)
})
</script>
<?php include("../include/footer.php"); ?>