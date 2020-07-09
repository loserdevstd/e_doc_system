<?php include("../connect/conn.php"); ?>

<!-- ===========================function add document=============================== -->
<?php
	if (isset($_POST['add'])) {
		$doc_type=$_POST['doc_type'];
		$out_date=$_POST['out_date'];
		$doc_title=$_POST['doc_title'];
		$auther=$_POST['auther'];
		$place=$_POST['place'];
		$doc_dep=$_POST['doc_dep'];
		$staff=$_POST['staff'];
		$amount=$_POST['amount'];
		$note=(isset($_POST['note']) ? $_POST['note']:'');
		$fl_name=$_POST['myfile'];
		//file upload
		if (isset($_FILES['myfile'])) {
			$upload = $_FILES['myfile'];
			if ($upload <>'') {
				//available to set name
				$date1 = date("Y-m-d_His");
				//random number to set deferance name
				$numrand = (mt_rand());
				//floder save file
				$path="file upload/";
				//cut name and surname file
				$type = strrchr($_FILES['myfile']['name'],".");
				//set new file name random+date
				$newname ='file-'.$date1.'_'.$numrand.$type;
				$path_copy=$path.$newname;
				$path_link="file upload/".$newname;
				//copy file to floder
				move_uploaded_file($_FILES['myfile']['tmp_name'],$path_copy);
			}
		}
		$sql="INSERT INTO tb_doc_outgoing(out_date, doc_type, doc_title, auther, place, doc_dep, staff, amount, note, fl_name) 
			VALUES('$out_date',$doc_type,'$doc_title','$auther','$place',$doc_dep,$staff,$amount,'$note','$newname')";
		$result=mysqli_query($conn, $sql)or die("Failed to add data". mysqli_error($sql));
		$type=mysqli_query($conn, "SELECT * FROM tb_doctype WHERE type_id='$doc_type'");
		$name=mysqli_fetch_assoc($type);
		if ($result) : ?>
			<script type="text/javascript">
				window.location.replace("doc_list_by_type.php?id=<?php echo($doc_type); ?>&name=<?php echo($name['type_name']); ?>&add=true");
			</script>
		<?php endif;
	}
?>
<!-- ===========================function update document=============================== -->
<?php
	if (isset($_POST['update'])) {
		$doc_id=$_POST['old_id'];
		$doc_type=$_POST['doc_type'];
		$out_date=$_POST['out_date'];
		$doc_title=$_POST['doc_title'];
		$auther=$_POST['auther'];
		$place=$_POST['place'];
		$doc_dep=$_POST['doc_dep'];
		$staff=$_POST['staff'];
		$amount=$_POST['amount'];
		$note=(isset($_POST['note']) ? $_POST['note']:'');
		$fl_name=$_POST['myfile'];
		 #unlink old file
		$sql="SELECT fl_name FROM tb_doc_outgoing WHERE out_id='$doc_id'";
			$result=mysqli_query($conn,$sql);
			$data=mysqli_fetch_array($result);
			$path=__DIR__.DIRECTORY_SEPARATOR."file upload".DIRECTORY_SEPARATOR.$data['fl_name'];
				if (file_exists($path) && !empty($data['fl_name'])) {
					unlink($path);
				}
		//file upload
		if (isset($_FILES['myfile'])) {
			$upload = $_FILES['myfile'];
			if ($upload <>'') {
				//available to set name
				$date1 = date("Y-m-d_His");
				//random number to set deferance name
				$numrand = (mt_rand());
				//floder save file
				$path="file upload/";
				//cut name and surname file
				$type = strrchr($_FILES['myfile']['name'],".");
				//set new file name random+date
				$newname ='file-'.$date1.'_'.$numrand.$type;
				$path_copy=$path.$newname;
				$path_link="file upload/".$newname;
				//copy file to floder
				move_uploaded_file($_FILES['myfile']['tmp_name'],$path_copy);
			}
		}
		$sql="UPDATE tb_doc_outgoing SET
			out_date = '$out_date',
			doc_type = $doc_type,
			doc_title = '$doc_title',
			auther = '$auther',
			place = '$place',
			doc_dep = $doc_dep,
			staff = $staff,
			amount = $amount,
			note = '$note',
			fl_name = '$newname' 
			WHERE out_id='$doc_id'";
		$result=mysqli_query($conn, $sql)or die("Failed to edit data". mysqli_error($sql));
		$type=mysqli_query($conn, "SELECT * FROM tb_doctype WHERE type_id='$doc_type'");
		$name=mysqli_fetch_assoc($type);
		if ($result) : ?>
			<script type="text/javascript">
				window.location.replace("doc_list_by_type.php?id=<?php echo($doc_type); ?>&name=<?php echo($name['type_name']); ?>&edit=true");
			</script>
		<?php endif;
	}
?>
<!-- ===========================function delete document=============================== -->
<?php
	if (isset($_GET['del'])) {
		$doc_id=$_GET['del'];
		#unlink old file
		$sql="SELECT fl_name FROM tb_doc_outgoing WHERE out_id='$doc_id'";
			$result=mysqli_query($conn,$sql);
			$data=mysqli_fetch_array($result);
			$path=__DIR__.DIRECTORY_SEPARATOR."file upload".DIRECTORY_SEPARATOR.$data['fl_name'];
				if (file_exists($path) && !empty($data['fl_name'])) {
					unlink($path);
				}
		$del=mysqli_query($conn, "DELETE FROM tb_doc_outgoing WHERE out_id='$doc_id'");
		$ty_id=$_GET['type'];
		$type=mysqli_query($conn, "SELECT * FROM tb_doctype WHERE type_id='$ty_id'");
		$name=mysqli_fetch_assoc($type);
		if (isset($_GET['page'])) {
			if ($del) : ?>
			<script type="text/javascript">
				window.location.replace("index.php?page=doc-out-all&del=true");
			</script>
		<?php endif ;
		}else{
			if ($del) : ?>
			<script type="text/javascript">
				window.location.replace("doc_list_by_type.php?id=<?php echo $ty_id; ?>&name=<?php echo $name['type_name']; ?>&del=true");
			</script>
		<?php endif ;
		}
	}
?>
<?php
	if (isset($_POST['checkall'])) {
		//unlink all file
			$files = glob('file upload/*'); //get all file names
			foreach($files as $file){
			    if(is_file($file))
			    unlink($file); //delete file
			}
		//delete all file
		$del=mysqli_query($conn, "DELETE FROM tb_doc_outgoing")or die("Can not delete file". mysqli_error());
		if ($del) : ?>
					<script type="text/javascript">
						window.location.replace("index.php?page=doc-out-all&del=true");
					</script>
				<?php endif;
		//set new auto id
		$set_id=mysqli_query($conn, "ALTER TABLE tb_doc_outgoing AUTO_INCREMENT = 1");
	}
?>