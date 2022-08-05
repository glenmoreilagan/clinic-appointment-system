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


<div class="modal fade" id="signinModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
    <form action="" method="POST" class="login-email">
      <div class="modal-header">
        <h5 class="modal-title d-flex align-items-center">Sign In</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
      <div class="mb-3">
        <label class="form-label">Email Address:</label>
        <input type="email" placeholder="Email" class="form-control shadow-none" name="email" value="<?php echo $email; ?>" required>
      </div>
      <div class="mb-3">
        <label class="form-label">Password:</label>
        <input type="password" placeholder="Password" class="form-control shadow-none" name="password" value="<?php echo $_POST['password']; ?>" required>
      </div>
      <a href="javascript: void(0)" class="text-decoration-none">Forgot Password?</a>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" onclick="window.history.back();">Cancel</button>
        <button type="submit" class="btn btn-primary">Login</button>
      </div>
    </form>
   </div>
  </div>
</div>