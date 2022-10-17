<?php
include '../config.php';
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

if ($password == $cpassword) {
  $sql = "SELECT id, email, fullname FROM tbl_user WHERE email='$email'";
  $result = mysqli_query($conn, $sql);
  if ($result->num_rows == 0) {
    $sql = "INSERT INTO tbl_user (fname, mname, lname, fullname, address, contactno, email, password)
			VALUES ('$fname', '$mname', '$lname', '$fullname', '$address', '$contactnumber', '$email', '$password')";
    $result = mysqli_query($conn, $sql);
    if ($result) {
      echo json_encode(['status' => true, 'msg' => 'User Registration Completed!']);
    } else {
      echo json_encode(['status' => false, 'msg' => 'Something went wrong!']);
    }
  } else {
    echo json_encode(['status' => false, 'msg' => 'Email Already Exists!']);
  }
} else {
  echo json_encode(['status' => false, 'msg' => 'Password Not Matched!']);
}
