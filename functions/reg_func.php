<?php 
include '../config.php';
/*error_reporting(0);*/


if (isset($_SESSION['fullname'])) {
    header("Location: welcome.php");
}

if (isset($_POST['submit'])) {
	$fullname = mysqli_real_escape_string($conn, $_POST['fullname']);
	$address = mysqli_real_escape_string($conn, $_POST['address']);
	$contactnumber = mysqli_real_escape_string($conn, $_POST['contactnumber']);
	$email = mysqli_real_escape_string($conn, $_POST['email']);
	$password = md5($_POST['password']);
	$password = mysqli_real_escape_string($conn, $password);
	$cpassword = md5($_POST['cpassword']);
	$cpassword = mysqli_real_escape_string($conn, $cpassword);

	if ($password == $cpassword) {
		$sql = "SELECT * FROM useraccount WHERE email='$email'";
		$result = mysqli_query($conn, $sql);
		if (!$result->num_rows > 0) {
			$sql = "INSERT INTO useraccount (fullname, address, contactnumber, email, password)
			VALUES ('$fullname', '$address', '$contactnumber', '$email', '$password')";
			$result = mysqli_query($conn, $sql);
			if ($result) {
				echo "<script>alert('Wow! User Registration Completed.')</script>";
				$fullname = "";
				$address = "";
				$contactnumber = "";
				$email = "";
				$_POST['password'] = "";
				$_POST['cpassword'] = "";
			} else {
				echo "<script>alert('Woops! Something Wrong Went.')</script>";
			}
		} else {
			echo "<script>alert('Woops! Email Already Exists.')</script>";
		}
		
	} else {
		echo "<script>alert('Password Not Matched.')</script>";
	}
}

?>