<?php $menu='mou'; ?>
<?php 
#include connection
include('../connect/conn.php');
include('../include/header.php');
if ($page=='mou-add') {
	include('mou_frm_add.php');
}elseif ($page=='mou-list') {
	include('mou_list.php');
}elseif ($page=='mou-detail') {
	include('mou_detail.php');
}elseif ($page=='mou-edit') {
	include('mou_frm_edit.php');
}else{include('../dashboard/404.php');}
#include footer
include('../include/footer.php');
?>
</body>
</html>