<?php 

include 'config.php';

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

<div class="modal fade" id="signupModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
    <form action="" method="POST" class="login-email">
      <div class="modal-header">
      <h5 class="modal-title"><img src="image/logooo.png" alt="" width="110" height="100" class="d-inline align-text-top">Sign Up</a></h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="container-fluid">
      <div class="row">
      <div class="col-md-6">
        <label class="form-label">Fullname:</label>
        <input type="text" placeholder="Fullname" class="form-control shadow-none" name="fullname" value="<?php echo $fullname; ?>" required>
      </div>
      <div class="col-md-6">
        <label class="form-label">Address:</label>
        <input type="text" placeholder="Address" class="form-control shadow-none" name="address" value="<?php echo $address; ?>" required>
      </div>
      <div class="col-md-6">
        <label class="form-label">Contact Number:</label>
        <input type="tel" placeholder="Contact Number" class="form-control shadow-none" name="contactnumber" value="<?php echo $contactnumber; ?>" required>
      </div>
      <div class="col-md-6">
        <label class="form-label">Email Address:</label>
        <input type="email" placeholder="Email" class="form-control shadow-none" name="email" value="<?php echo $email; ?>" required>
      </div>
      <div class="col-md-6">
        <label class="form-label">Password:</label>
        <input type="password" placeholder="Password" class="form-control shadow-none" name="password" value="<?php echo $_POST['password']; ?>" required>
      </div>
      <div class="col-md-6">
        <label class="form-label">Confirm Password:</label>
        <input type="password" placeholder="Confirm Password" class="form-control shadow-none" name="cpassword" value="<?php echo $_POST['cpassword']; ?>" required>
      </div>
      <p class="login-register-text">Already have an account? <a href="login.php">Login Here</a>.</p>
      </div>
      <div class="modal-footer">
      <button type="button" class="btn btn-secondary" onclick="window.history.back();">Cancel</button>
        <button type="submit" class="btn btn-primary">Sign up</button>
      </div>
    </div>
    </form>
    </div>
  </div>
</div>