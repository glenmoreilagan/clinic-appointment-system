<?php 

include 'config.php';

session_start();

error_reporting(0);

if (isset($_SESSION['fullname'])) {
    header("Location: welcome.php");
}

if (isset($_POST['submit'])) {
	$email = $_POST['email'];
	$password = md5($_POST['password']);

	$sql = "SELECT * FROM useraccount WHERE email='$email' AND password='$password'";
	$result = mysqli_query($conn, $sql);
	if ($result->num_rows > 0) {
		$row = mysqli_fetch_assoc($result);
		$_SESSION['fullname'] = $row['fullname'];
		header("Location: welcome.php");
	} else {
		echo "<script>alert('Woops! Email or Password is wrong.')</script>";
	}
}

?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" type="text/css" href="css/loginstyle.css">

	<title>Login Form</title>
</head>
<body>
	<div class="container">
		<form action="" method="POST" class="login-email">
			<div class="logo_container">
			<img src="image/logooo.png" class="logo" alt="Lj Cura Logo">
			</div>
			<p class="login-text" style="font-size: 2rem; font-weight: 600;">Login</p>
				<div class="input-group">
					<label for="email"><b>Email Address:</b></label>
					<input type="email" placeholder="Email" name="email" value="<?php echo $email; ?>" required>
					</div>
				<div class="input-group">
					<label for="password"><b>Password:</b></label>
					<input type="password" placeholder="Password" name="password" value="<?php echo $_POST['password']; ?>" required>
					</div><br>
				<p class="login-register-text"><a href="register.php">Forgot password?</a></p>
				<div class="input-group">
					<button name="submit" class="btn">Login</button>
					</div>
				<div class="input-group">
					<button type="button" class="btn-cancel" onclick="window.history.back();">Cancel</button>
					</div>
		</form>
	</div>
</body>
</html>