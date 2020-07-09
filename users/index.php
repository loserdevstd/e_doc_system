<?php $menu='user'; ?>
<?php 
#include connection
include('../connect/conn.php');
include('../include/header.php');
if ($page=='add-user') {
	include('user_frm_add.php');
}elseif ($page=='set-user') {
	include('user_set_list.php');
}elseif ($page=='confirm-user') {
	include('user_regis_list.php');
}elseif ($page=='user-edit') {
	include('user_frm_edit.php');
}elseif ($page=='user-detail') {
	include('user_detail.php');
}elseif ($page=='user-list') {
	include('user_lists.php');
}else{include('../dashboard/404.php');}
#include footer
include('../include/footer.php');
?>
</body>
</html>