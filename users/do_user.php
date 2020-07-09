<?php include("../connect/conn.php"); ?>
<!-- ==============================function delete user=============================== -->
<?php 
	if (isset($_GET['user-del'])) {
		$user_id=$_GET['user-del'];
		#unlink image
		$sql="SELECT user_img FROM tb_user WHERE user_id='$user_id'";
			$result=mysqli_query($conn,$sql);
			$data=mysqli_fetch_array($result);
			$path=__DIR__.DIRECTORY_SEPARATOR."img".DIRECTORY_SEPARATOR.$data['user_img'];
				if (file_exists($path) && !empty($data['user_img'])) {
					unlink($path);
				}
		#delete user
		$del_user=mysqli_query($conn, "DELETE FROM tb_user WHERE user_id='$user_id'");
		if ($del_user) : ?>
			<script type="text/javascript">
				window.location.replace("index.php?page=user-list&del-id=<?php echo $user_id; ?>");
			</script>
		<?php endif ;
	}
?>
<!-- ==========================update img user============================== -->
<?php
	if (isset($_POST['edit_img'])) {
		$user_id=$_POST['old_id'];
		$user_img=$_POST['user_img'];
		#unlink image
		$sql="SELECT user_img FROM tb_user WHERE user_id='$user_id'";
			$result=mysqli_query($conn,$sql);
			$data=mysqli_fetch_array($result);
			$path=__DIR__.DIRECTORY_SEPARATOR."img".DIRECTORY_SEPARATOR.$data['user_img'];
				if (file_exists($path) && !empty($data['user_img'])) {
					unlink($path);
				}
		//image value
		$upload = $_FILES['user_img'];
		if ($upload <>'') {
			//available to set name
			$date1 = date("Y-m-d_His");
			//random number to set deferance name
			$numrand = (mt_rand());
			//floder save file
			$path="img/";
			//cut name and surname img
			$type = strrchr($_FILES['user_img']['name'],".");
			//set new file name random+date
			$newname ='img'.$date1.$numrand.$type;
			$path_copy=$path.$newname;
			$path_link="img/".$newname;
			//copy file to floder
			move_uploaded_file($_FILES['user_img']['tmp_name'],$path_copy);
		}
		$edit=mysqli_query($conn, "UPDATE tb_user SET user_img = '$newname' WHERE user_id='$user_id'") or die("Fail to update image profile". mysqli_error($edit));
			if($edit){ ?>
			  <script type='text/javascript'>
				window.location.replace('../users/?page=user-edit&id=<?php echo $user_id;?>&edit=true');
			  </script>";
			<?php }else{ echo"Fail to update profile".mysqli_error($sql); }
	}
?>
<!-- ==============================function insert user=============================== -->
<?php
	if (isset($_POST['add'])) {
		$username = $_POST['username'];
		$passwd = password_hash($_POST['passwd'], PASSWORD_DEFAULT);
		$gender = $_POST['gender'];
		$age = $_POST['age'];
		$bithdate = $_POST['bithdate'];
		$position = $_POST['position'];
		$department = $_POST['department'];
		$mail = $_POST['mail'];
		$tel = $_POST['tel'];
		$address = $_POST['address'];
		$degree = $_POST['degree'];
		$major = $_POST['major'];
		$functionary = $_POST['functionary']; 
		$youth_date = $_POST['youth_date'];
		$labor_date = $_POST['labor_date'];
		$women_date = (isset($_POST['women_date']) ? $_POST['women_date'] :'');
		$prepare_date = (isset($_POST['prepare_date']) ? $_POST['prepare_date'] :'');
		$complete_date = (isset($_POST['complete_date']) ? $_POST['complete_date'] :'');
		$level = $_POST['user_level'];
		$active = $_POST['user_active'];
		$img = (isset($_POST['user_img']) ? $_POST['user_img'] :'');

		$check=mysqli_query($conn,"SELECT user_name, mail FROM tb_user 
		WHERE user_name='$username' OR mail='$mail'");
		$count=mysqli_num_rows($check);
		if ($count>0) {
			echo '
			<script type="text/javascript">
				window.location.replace("index.php?page=user-list&fail=failed");
			</script>
			';
		}else{
		//image value
		$upload = $_FILES['user_img'];
		if ($upload <>'') {
			//available to set name
			$date1 = date("Y-m-d_His");
			//random number to set deferance name
			$numrand = (mt_rand());
			//floder save file
			$path="img/";
			//cut name and surname img
			$type = strrchr($_FILES['user_img']['name'],".");
			//set new file name random+date
			$newname ='img'.$date1.$numrand.$type;
			$path_copy=$path.$newname;
			$path_link="img/".$newname;
			//copy file to floder
			move_uploaded_file($_FILES['user_img']['tmp_name'],$path_copy);
		}
		#==========================insert to database==========================
			$sql="
			INSERT INTO tb_user(user_name, passwd, gender, bithdate, age, position, department, mail, tel, address, degree, major, functionary, youth_date, labor_date, women_date, party_prepare_date, party_complete_date, user_active, user_level, user_img) 
			VALUES('$username', '$passwd', $gender, '$bithdate', $age, '$position', $department, '$mail', $tel, '$address', $degree, '$major', $functionary, '$youth_date', '$labor_date', '$women_date', '$prepare_date', '$complete_date', $active, $level, '$newname')";
			$result=mysqli_query($conn, $sql);
			if($result){
					echo "<script type='text/javascript'>";
					echo "window.location.replace('index.php?page=user-list&add=true');";
					echo "</script>";
			
			}else{ echo"Fail to add new user".mysqli_error($sql); }
		}
	}	
?>
<!-- ==============================function update user=============================== -->
<?php
	if (isset($_POST['edit-profile'])) {
		$user_id = $_POST['old_id'];
		$user_active = $_POST['user_active'];
		$username = $_POST['username'];
		$gender = $_POST['gender'];
		$age = $_POST['age'];
		$bithdate = $_POST['bithdate'];
		$position = $_POST['position'];
		$department = $_POST['department'];
		$mail = $_POST['mail'];
		$tel = $_POST['tel'];
		$address = $_POST['address'];
		$degree = $_POST['degree'];
		$major = $_POST['major'];
		$functionary = $_POST['functionary'];
		$youth_date = $_POST['youth_date'];
		$labor_date = $_POST['labor_date'];
		$women_date = (isset($_POST['women_date']) ? $_POST['women_date'] :'');
		$prepare_date = (isset($_POST['prepare_date']) ? $_POST['prepare_date'] :'');
		$complete_date = (isset($_POST['complete_date']) ? $_POST['complete_date'] :'');
		#==========================insert to database==========================
			$sql="
			UPDATE tb_user 
			SET
			user_active = $user_active,
			user_name = '$username', 
			gender = $gender, 
			bithdate = '$bithdate', 
			age = $age, 
			position = '$position', 
			department = $department, 
			mail = '$mail', 
			tel = $tel,
			address = '$address', 
			degree = $degree, 
			major = '$major', 
			functionary = $functionary, 
			youth_date = '$youth_date', 
			labor_date = '$labor_date', 
			women_date = '$women_date', 
			party_prepare_date = '$prepare_date', 
			party_complete_date = '$complete_date'
			WHERE user_id = '$user_id'";
			$result=mysqli_query($conn, $sql) or die("Failed to update user".mysqli_error());
			if($result){ ?>
			<script type='text/javascript'>
			window.location.replace('index.php?page=user-edit&id=<?php echo $user_id;?>&edit=true');
			</script>
			<?php }
			else{
				echo"Fail to update profile".mysqli_error($sql);
			}
		
	}
?>
<!-- ==================================update password======================================= -->
<?php
	if (isset($_POST['edit-pwd'])) {
		$user_id=$_POST['old_id'];
		$curpasswd=$_POST['curpasswd'];
		$passwd = password_hash($_POST['newpasswd'], PASSWORD_DEFAULT);
		//check password
		$check=mysqli_query($conn, "SELECT passwd FROM tb_user WHERE user_id='$user_id'");
		$row=mysqli_fetch_assoc($check);
		$validPassword = password_verify($curpasswd, $row['passwd']);

		if ($validPassword) {
			$edit=mysqli_query($conn, "
			UPDATE tb_user SET passwd = '$passwd' 
			WHERE user_id = '$user_id'")or die("Failed to update user".mysqli_error($edit));
			if ($edit) : ?>
				<script type='text/javascript'>
					window.location.replace('index.php?page=user-edit&id=<?php echo $user_id;?>&edit=true');
				</script>";
			<?php endif;
		}else{ ?>
			<script type="text/javascript">
				window.location.replace('index.php?page=user-edit&id=<?php echo $user_id;?>&valid=wrong');
			</script>
		<?php }
	}
?>

<?php 
	if (isset($_POST['checkall'])) {
			//unlink all file
			$files = glob('img/*'); //get all file names
			foreach($files as $file){
			    if(is_file($file))
			    unlink($file); //delete file
			}
			#delete all
				$del=mysqli_query($conn, "DELETE FROM tb_user")or die("Can not delete file". mysqli_error());
				if ($del) : ?>
					<script type="text/javascript">
						window.location.replace("index.php?page=user-list&del-id=all");
					</script>
				<?php endif;
			#set new auto id
				$set_id=mysqli_query($conn, "ALTER TABLE tb_user AUTO_INCREMENT = 1");
	}
?>