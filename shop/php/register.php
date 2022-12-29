<? php
session_start();
require '../path.php';

$con = mysqli_connect("localhost", "root", "", "agriculture");

if (isset($_POST['submit'])) {
$first_name = $_POST['first_name'];
$last_name = $_POST['last_name'];
$dob = $_POST['dob'];
$gender = $_POST['gender'];
$location = $_POST['location'];
$email = $_POST['email'];
$phone_number = $_POST['phone_number'];
$username = $_POST['username'];
$password = $_POST['password'];

//hash the password first
$password_hash = SHA1($password);

	$SQL = "INSERT INTO users VALUES(NULL, NULL, '$first_name', '$last_name', '$dob', '$gender', '$location', '$username', '$email', '$phone_number', '$password_hash', now())";

	$QUERY=mysql_query($con, $SQL);
	if ($QUERY) {
	header("location:".BASE_URL."/index.php");
}else{
	echo mysqli_error($con);
}
}

?>