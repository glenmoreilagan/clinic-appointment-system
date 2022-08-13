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

	$sql = "SELECT * FROM useraccount WHERE email='$email' AND password='$password'";
	$result = mysqli_query($conn, $sql);
	if ($result->num_rows > 0) {
		$row = mysqli_fetch_assoc($result);
		$_SESSION['fullname'] = $row['fullname'];
		header("Location: ../welcome.php");
	} else {
		echo "<script>alert('Woops! Email or Password is wrong.')</script>";
	}
}

?>
