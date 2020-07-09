<?php $menu='report'; ?>
<?php 
#include connection
include('../connect/conn.php');
include('../include/header.php');
if ($page=='report-user') {
	include('#');
}elseif ($page=='') {
	include('report_menu.php');
}else{include('../dashboard/404.php');}
#include footer
include('../include/footer.php');
?>
</body>
</html>