<?php include("../connect/conn.php"); ?>
 
<?php
	if (isset($_POST['add'])) {
		$c_partner=$_POST['m_partner'];
		$m_partner=$_POST['name_partner'];
		$approved=$_POST['approved'];
		$sdate=$_POST['sdate'];
		$exdate=$_POST['exdate'];
		$extension=$_POST['extension'];
		$user_name=$_POST['user_name'];
		$note=(isset($_POST['note']) ? $_POST['note'] :'');
		$myfile=(isset($_POST['myfile']) ? $_POST['myfile'] :'');
		//file value
		if (isset($_FILES['myfile'])) {
			$upload = $_FILES['myfile'];
			if ($upload <>'') {
				//available to set name
				$date1 = date("Ymd_His");
				//random number to set deferance name
				$numrand = (mt_rand());
				//floder save file
				$path="file_upload/";
				//cut name and surname file
				$type = strrchr($_FILES['myfile']['name'],".");
				//set new file name random+date
				$myfile ='file'.$numrand.$date1.$type;
				$path_copy=$path.$myfile;
				$path_link="file_upload/".$myfile;
				//copy file to floder
				move_uploaded_file($_FILES['myfile']['tmp_name'],$path_copy);
			}
		}
		
			$sql="INSERT INTO tb_mou(m_partner, name_partner, approved, signdate, expiredate, extension, staff, note, fl_name) 
					VALUES('$c_partner','$m_partner',$approved,'$sdate','$exdate',$extension,$user_name,'$note','$myfile')";
		$result=mysqli_query($conn, $sql) or die("Error".mysqli_error($conn));
				if ($result) : ?>
					<script type="text/javascript">
						window.location.replace("index.php?page=mou-list&add=true");
					</script>
				<?php endif;
	}
?>
<!-- ============================function delete =================================== -->
<?php
	if (isset($_GET['del'])) {
		$m_id=$_GET['del'];
		//unlink file
		$del=mysqli_query($conn, "SELECT fl_name FROM tb_mou WHERE m_id='$m_id'");
		$data=mysqli_fetch_array($del);
		$path=__DIR__.DIRECTORY_SEPARATOR."file_upload".DIRECTORY_SEPARATOR.$data['fl_name'];
			if (file_exists($path) && !empty($data['fl_name'])) { 
				unlink($path); 
			}
		#delete
		$del=mysqli_query($conn, "DELETE FROM tb_mou WHERE m_id='$m_id'")or die("Can not delete file". mysqli_error());
		if ($del) : ?>
				<script type="text/javascript">
					window.location.replace("index.php?page=mou-list&del=1");
				</script>
		<?php endif;
	}
?>
<!-- =================================function delete all============================= -->
<?php
	if (isset($_POST['checkall'])) {
		//unlink all file
		$files = glob('file_upload/*'); //get all file names
		foreach($files as $file){
		    if(is_file($file))
		    unlink($file); //delete file
		}
		#delete all
			$del=mysqli_query($conn, "DELETE FROM tb_mou")or die("Can not delete file". mysqli_error());
			if ($del) : ?>
				<script type="text/javascript">
					window.location.replace("index.php?page=mou-list&del=all");
				</script>
			<?php endif;
	}
?>

<?php
	if (isset($_POST['update'])) {
		$mou_id=$_POST['m_id'];
		$m_partner=$_POST['m_partner'];
		$name_partner=$_POST['name_partner'];
		$approved=$_POST['approved'];
		$sdate=$_POST['sdate'];
		$exdate=$_POST['exdate'];
		$extension=$_POST['extension'];
		$staff=$_POST['staff'];
		$note=(isset($_POST['note']) ? $_POST['note'] :'');
		$myfile=(isset($_POST['myfile']) ? $_POST['myfile'] :'');
		//unlink file
		$del=mysqli_query($conn, "SELECT fl_name FROM tb_mou WHERE m_id='$mou_id'");
		$data=mysqli_fetch_array($del);
		$path=__DIR__.DIRECTORY_SEPARATOR."file_upload".DIRECTORY_SEPARATOR.$data['fl_name'];
			if (file_exists($path) && !empty($data['fl_name'])) { 
				unlink($path); 
			}
		//file value
		$upload = $_FILES['myfile'];
		if ($upload <>'') {
			//available to set name
			$date1 = date("Ymd_His");
			//random number to set deferance name
			$numrand = (mt_rand());
			//floder save file
			$path="file_upload/";
			//cut name and surname file
			$type = strrchr($_FILES['myfile']['name'],".");
			//set new file name random+date
			$newname ='file'.$numrand.$date1.$type;
			$path_copy=$path.$newname;
			$path_link="file_upload/".$newname;
			//copy file to floder
			move_uploaded_file($_FILES['myfile']['tmp_name'],$path_copy);
		}
		$edit="UPDATE tb_mou SET
		m_partner = '$m_partner',
		name_partner = '$name_partner',
		approved = $approved,
		signdate = '$sdate',
		expiredate = '$exdate',
		extension = $extension,
		staff = $staff,
		note = '$note',
		fl_name = '$newname' 
		WHERE m_id='$mou_id'";
		$res=mysqli_query($conn, $edit) or die("Failed to Update mou".mysqli_error($res));
		if ($res) : ?>
				<script type="text/javascript">
					window.location.replace("index.php?page=mou-list&edit=true");
				</script>
		<?php endif;

	}
?>