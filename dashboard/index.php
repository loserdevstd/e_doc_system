<?php $menu='index'; ?>
<?php 
#include connection
include('../connect/conn.php');
include('../include/header.php');
if($page=='user-profile') {
	include('../users/user_profile.php');
}else{include('dashboard.php');}
#include footer
include('../include/footer.php');
?>
</body>
</html>
