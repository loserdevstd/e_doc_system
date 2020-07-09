<?php $menu='doc-out'; ?>
<?php 
#include connection
include('../connect/conn.php');
include('../include/header.php');
if ($page=='doc-out-add') {
	include('doc_out_frm_add.php');
}elseif ($page=='doc-out-edit') {
	include('doc_out_frm_edit.php');
}elseif ($page=='doc-out-all') {
	include('doc_out_list_all.php');
}elseif ($page=='doc-detail') {
	include('doc_out_detail.php');
}elseif ($page=='doc-out-menu') {
	include('doc_out_menu.php');
	if ($rows['type_id']="") {
			include('../dashboard/404.php');
		}
}else{include('../dashboard/404.php');}
#include footer
include('../include/footer.php');
?>
</body>
</html>