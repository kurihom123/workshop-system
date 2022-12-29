<?php

session_start();

$con = mysqli_connect("localhost", "root", "", "agriculture");

if (isset($_POST['submit'])) {
	$username = $_POST['username'];
	$password = $_POST['password'];

	//hash the password
	$password_hash = SHA1($password);

	$SQL = "SELECT * FROM users WHERE username = '$username' AND password = '$password_hash' LIMIT 1";
	$QUERY = mysqli_query($con, $SQL);
	$rows = mysqli_fetch_array($QUERY);

	//check if user exist

	if ($QUERY) {
		if (mysqli_num_rows($QUERY) > 0) {
			foreach ($QUERY as $key => $rows) {
				if ($rows['role_id'] == "1") {
					$_SESSION['user_id'] = $rows['id'];
					$_SESSION['admin'] = $rows['role_id'];
					$_SESSION['username'] = $rows['username'];
					header("location:" . BASE_URL . "/admin/dashboard.php");
					exit();

				} else if ($rows['role_id'] == "3") {
					$_SESSION['user_id'] = $rows['id'];
					$_SESSION['merchant'] = $rows['role_id'];
					$_SESSION['username'] = $rows['username'];
					header("location:" . BASE_URL . "/merchant/dashboard.php");
					exit();

				} else {
					$_SESSION['user_id'] = $rows['id'];
					$_SESSION['customer'] = $rows['role_id'];
					$_SESSION['username'] = $rows['username'];
					header("location:" . BASE_URL . "/home.php");
					exit();
				}
			}
		} else {
			echo "username or password mismatch";
		}
	} else {
		echo mysqli_error($con);
	}
} else {
	header('location:' . BASE_URL . '/login.php');
}

?>