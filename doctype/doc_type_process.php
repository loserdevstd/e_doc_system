<?php include('../include/head.php'); ?>
<?php include('../connect/conn.php'); ?>
	<?php
		$tyid=0;
		$update=false;
		$tyname='';

if (isset($_POST['save'])) {
		$tyname=$_POST['type_name'];
		$conn->query("INSERT INTO tb_doctype(type_name) VALUES('$tyname')") or die($conn->error());
		header('Location: doc_type_list.php?save=1');
}
if (isset($_GET['del'])) {
		$tyid=$_GET['del'];
		$conn->query("DELETE FROM tb_doctype WHERE type_id='$tyid'") or die($conn->error());
		header('Location: doc_type_list.php?delete=1');
}
if (isset($_GET['edit'])) {
		$tyid=$_GET['edit'];
		$update=true;
		$result=$conn->query("SELECT * FROM tb_doctype WHERE type_id='$tyid'") or die($conn->error());

		if(is_countable($result)==0){
		$row = $result->fetch_array();
		$tyname = $row['type_name'];
		}
}
if (isset($_POST['update'])) {
		$tyid=$_POST['id'];
		$tyname=$_POST['type_name'];

		$conn->query("UPDATE tb_doctype SET type_name='$tyname' WHERE type_id='$tyid'") or die($conn->error());
		header('Location: doc_type_list.php?update=1');
}

?>