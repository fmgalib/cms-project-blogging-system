<?php include "db.php"; ?>

<?php session_start(); ?>

<?php 

	if (isset($_POST['login'])) {
		$username = $_POST['username'];
		$password = $_POST['password'];

		$username = mysqli_real_escape_string($connection, $username);
		$password = mysqli_real_escape_string($connection, $password);

		$query = "SELECT * FROM users WHERE user_name = '$username'";
		$select_user_query = mysqli_query($connection, $query);

		while ($row = mysqli_fetch_assoc($select_user_query)) {
			$db_user_id 		= $row['user_id'];
			$db_user_name 		= $row['user_name'];
			$db_user_password	= $row['user_password'];
			$db_user_fname 		= $row['user_fname'];
			$db_user_lname 		= $row['user_lname'];
			$db_user_role 		= $row['user_role'];
		}

		$password = crypt($password, $db_user_password);

		if ($username == $db_user_name && $password == $db_user_password) {

			$_SESSION['user_name'] 	= $db_user_name;
			$_SESSION['user_fname'] = $db_user_fname;
			$_SESSION['user_lname'] = $db_user_lname;
			$_SESSION['user_role'] 	= $db_user_role;


			header("location: ../admin");
		}else{
			header("location: ../index.php");
		}
	}

?>