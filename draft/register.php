<?php 

include '../config.php';

error_reporting(0);

session_start();

if (isset($_SESSION['fullname'])) {
    header("Location: welcome.php");
}

if (isset($_POST['submit'])) {
	$username = $_POST['fullname'];
	$address = $_POST['address'];
	$contactnumber = $_POST['contactnumber'];
	$email = $_POST['email'];
	$password = md5($_POST['password']);
	$cpassword = md5($_POST['cpassword']);

	if ($password == $cpassword) {
		$sql = "SELECT * FROM useraccount WHERE email='$email'";
		$result = mysqli_query($conn, $sql);
		if (!$result->num_rows > 0) {
			$sql = "INSERT INTO useraccount (fullname, address, contactnumber, email, password)
					VALUES ('$fullname', '$address', '$contactnumber', '$email', '$password')";
			$result = mysqli_query($conn, $sql);
			if ($result) {
				$row = mysqli_fetch_assoc($result);
				$_SESSION['fullname'] = $row['fullname'];
				header("Location: welcome.php");
			}  else {
				echo "<script>alert('Woops! Something went wrong.')</script>";
			}
		} else {
			echo "<script>alert('Woops! Email Already Exists.')</script>";
		}
		
	} else {
		echo "<script>alert('Password Not Matched.')</script>";
	}
}

?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" type="text/css" href="css/regstyle.css">
	
	<title>Register Form</title>
</head>
<body>
	<div class="container">
		<form action="" method="POST" class="login-email">
		<div class="logo_container">
			<img src="image/logooo.png" class="logo" alt="Lj Cura Logo">
			</div>
        <p class="login-text" style="font-size: 2rem; font-weight: 600;">Register</p>
			<div class="input-group">
				<label for="fullname"><b>Full name:</b></label>
				<input type="text" placeholder="Fullname" name="fullname" value="<?php echo $fullname; ?>" required>
				</div>
			<div class="input-group">
				<label for="address"><b>Address:</b></label>
				<input type="text" placeholder="Address" name="address" value="<?php echo $address; ?>" required>
				</div>
			<div class="input-group">
				<label for="contactnumber"><b>Contact Number:</b></label>
				<input type="tel" placeholder="Contact Number" name="contactnumber" value="<?php echo $contactnumber; ?>" required>
				</div>
			<div class="input-group">
				<label for="email"><b>Email Address:</b></label>
				<input type="email" placeholder="Email" name="email" value="<?php echo $email; ?>" required>
				</div>
			<div class="input-group">
				<label for="password"><b>Password:</b></label>
				<input type="password" placeholder="Password" name="password" value="<?php echo $_POST['password']; ?>" required>
           		</div>
            <div class="input-group">
				<label for="cpassword"><b>Confirm Password:</b></label>
				<input type="password" placeholder="Confirm Password" name="cpassword" value="<?php echo $_POST['cpassword']; ?>" required>
				</div><br>
			<p class="login-register-text">Already have an account? <a href="login.php">Login Here</a>.</p>
			<div class="input-group">
				<button name="submit" class="btn">Register</button>
				</div>
			<div class="input-group">
				<button type="button" class="btn-cancel" onclick="window.history.back();">Cancel</button>
				</div>
		</form>
	</div>
</body>
</html>