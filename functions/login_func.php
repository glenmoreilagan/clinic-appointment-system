<?php
include '../config.php';

session_start();
/*error_reporting(0);*/

$email = mysqli_real_escape_string($conn, $_POST['email']);
$password = mysqli_real_escape_string($conn, md5($_POST['password']));

if ($email == "" || $password == "") {
  echo json_encode(['status' => false, 'msg' => 'Login Failed! Please check your email and password']);
  return;
}


$sql = "SELECT 
      id, fullname, email, role
    FROM tbl_user
    WHERE email = '$email' AND 
    password = '$password' AND 
    role = 0 AND
    email_verification = ''
    LIMIT 1";

$result = mysqli_query($conn, $sql);
if ($result->num_rows > 0) {
  $row = mysqli_fetch_assoc($result);

  $_SESSION['fullname'] = $row['fullname'];
  $_SESSION['email'] = $row['email'];
  $_SESSION['role'] = $row['role'];
  $_SESSION['user_id'] = $row['id'];

  echo json_encode(['status' => true, 'msg' => 'Login success!']);
} else {
  echo json_encode(['status' => false, 'msg' => 'Login Failed! Please check your email and password']);
}
