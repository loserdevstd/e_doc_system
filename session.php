<?php 
	session_start();
	if (isset($_POST['signin'])) {
		#call connection
		include("connect/conn.php");
		$username=$_POST['username'];
		$passwd=$_POST['passwd'];
		#query user
		$users=mysqli_query($conn, "SELECT * FROM tb_user WHERE (user_name = '$username' || mail = '$username')");
		#check user exist
		if (mysqli_num_rows($users)==1) {
			$row=mysqli_fetch_array($users);
			$hash_passwd=password_verify($passwd, $row['passwd']);
			if ($hash_passwd) {
				$_SESSION['id'] = $row['user_id'];
				$_SESSION['user'] = $row['user_name'];
				$_SESSION['department'] = $row['department'];
				$_SESSION['active'] =$row['user_active'];
				$_SESSION['level'] = $row['user_level'];
				#check user level
			if (($_SESSION['active']==1) AND ($_SESSION['level']==1 OR $_SESSION['level']==2)){
				header('Location: dashboard/');
			}else{ header('Location: loggin.php?action=failed');}
			}else{ header('Location: loggin.php?action=failed');}
		}

	}

?>