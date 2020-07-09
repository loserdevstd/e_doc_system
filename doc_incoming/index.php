<?php $menu='doc-in'; ?>
<?php 
#include connection
include('../connect/conn.php');
include('../include/header.php');
if ($page=='doc-in-add') {
	include('doc_in_frm_add.php');
}elseif ($page=='doc-in-all') {
	include('doc_list_all.php');
}elseif ($page=='doc-type-list') {
	include('doc_list_by_type.php');
}elseif ($page=='doc-detail') {
	include('doc_in_detail.php');
}elseif ($page=='doc-in-edit') {
	include('doc_in_frm_edit.php');
}elseif ($page=='doc-in-menu') {
	include('doc_in_menu.php');
		if ($rows['type_id']="") {
			include('../dashboard/404.php');
		}
}else{include('../dashboard/404.php');}
#include footer
include('../include/footer.php');
?>
</body>
</html>