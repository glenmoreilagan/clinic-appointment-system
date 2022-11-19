<?php
include '../config.php';
include '../email.php';
include '../host_setting.php';
/*error_reporting(0);*/

$fname = mysqli_real_escape_string($conn, $_POST['fname']);
$mname = mysqli_real_escape_string($conn, $_POST['mname']);
$lname = mysqli_real_escape_string($conn, $_POST['lname']);

$fullname = $fname . ' ' . $mname . ', ' . $lname;
$address = mysqli_real_escape_string($conn, $_POST['address']);
$contactnumber = mysqli_real_escape_string($conn, $_POST['contactnumber']);
$email = mysqli_real_escape_string($conn, $_POST['email']);
$password = mysqli_real_escape_string($conn, md5($_POST['password']));
$cpassword = mysqli_real_escape_string($conn,  md5($_POST['cpassword']));

if ($fname == "" || $lname == "" || $address == "" || $contactnumber == "" || $email == "" || $password == "" || $cpassword == "") {
  echo json_encode(['status' => false, 'msg' => 'Please fillup all fields!']);
  return;
}

$code = generateRandomString(64);
if ($password == $cpassword) {
  $sql = "SELECT id, email, fullname FROM tbl_user WHERE email='$email'";
  $result = mysqli_query($conn, $sql);
  if ($result->num_rows == 0) {
    $sql = "INSERT INTO tbl_user (fname, mname, lname, fullname, address, contactno, email, password, email_verification)
			VALUES ('$fname', '$mname', '$lname', '$fullname', '$address', '$contactnumber', '$email', '$password', '$code')";
    $result = mysqli_query($conn, $sql);
    if ($result) {
      $email_message = "
        Here's your email verification link: <a href=" . $host . "email-verification?q=$code>Verification Link</a>
      ";
      $email = new Email($email, $email_message, 'Email Verification');
      $email->sendEmail();
      echo json_encode(['status' => true, 'msg' => 'Please check your email we sent an email verification link.']);
    } else {
      echo json_encode(['status' => false, 'msg' => 'Something went wrong!']);
    }
  } else {
    echo json_encode(['status' => false, 'msg' => 'Email Already Exists!']);
  }
} else {
  echo json_encode(['status' => false, 'msg' => 'Password Not Matched!']);
}

function generateRandomString($length = 10)
{
  $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
  $charactersLength = strlen($characters);
  $randomString = '';
  for ($i = 0; $i < $length; $i++) {
    $randomString .= $characters[rand(0, $charactersLength - 1)];
  }
  return $randomString;
}
