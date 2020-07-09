<?php $menu='schol'; ?>
<?php include("../connect/conn.php"); ?>

<?php include("../include/header.php"); ?>

<?php
	if ($page=="scol-list") {
		include("scol_list.php");
	}
?>

<?php include("../include/footer.php"); ?>
</body>
</html>