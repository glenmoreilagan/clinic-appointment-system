<?php 
include '../config.php';

session_start();
/*error_reporting(0);*/

if (isset($_SESSION['fullname'])) {
    header("Location: welcome.php");
}

if (isset($_POST['submit'])) {
	$email = mysqli_real_escape_string($conn, $_POST['email']);
	$password = md5($_POST['password']);
	$password = mysqli_real_escape_string($conn, $password);

	$sql = "SELECT * FROM tbl_user WHERE email='$email' AND password='$password'";
	$result = mysqli_query($conn, $sql);
	if ($result->num_rows > 0) {
		$row = mysqli_fetch_assoc($result);
		$_SESSION['fullname'] = $row['fullname'];
		$_SESSION['user_id'] = $row['id'];
		header("Location: ../user/dashboard/index.php");
	} else {
		echo "<script>alert('Woops! Email or Password is wrong.')</script>";
	}
}

?>
