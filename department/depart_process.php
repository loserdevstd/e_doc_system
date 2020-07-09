<?php include('../connect/conn.php'); ?>
	<?php
		$dep_id=0;
		$update=false;
		$dep_name='';

if (isset($_POST['save'])) {
		$dep_name=$_POST['dep_name'];
		$conn->query("INSERT INTO tb_department(dep_name) VALUES('$dep_name')") or die($conn->error());
		header('Location: depart_list.php?save=1');
}
if (isset($_GET['del'])) {
		$dep_id=$_GET['del'];
		$conn->query("DELETE FROM tb_department WHERE dep_id='$dep_id'") or die($conn->error());
		header('Location: depart_list.php?delete=1');
}
if (isset($_GET['edit'])) {
		$dep_id=$_GET['edit'];
		$update=true;
		$result=$conn->query("SELECT * FROM tb_department WHERE dep_id='$dep_id'") or die($conn->error());

		if(is_countable($result)==0){
		$row = $result->fetch_array();
		$dep_name = $row['dep_name'];
		}
}
if (isset($_POST['update'])) {
		$dep_id=$_POST['id'];
		$dep_name=$_POST['dep_name'];

		$conn->query("UPDATE tb_department SET dep_name='$dep_name' WHERE dep_id='$dep_id'") or die($conn->error());
		header('Location: depart_list.php?update=1');
}

?>