<?php
include_once '../../config.php';
session_start();

$user_id = $_SESSION['user_id'];
$fname = $_POST['fname'];
$mname = $_POST['mname'];
$lname = $_POST['lname'];
$contactno = $_POST['contactno'];
$address = $_POST['address'];
$email = $_POST['email'];
$password = $_POST['password'];
$confirm_password = $_POST['confirm_password'];

if ($password && $confirm_password) {
  if ($password !== $confirm_password) {
    echo json_encode(['status' => false, 'msg' => 'Please check password and confirm password!']);
    return;
  }
}

if(!$password || !$confirm_password) {
  echo json_encode(['status' => false, 'msg' => 'Please check password and confirm password!']);
  return;
}


$qry = "UPDATE tbl_user SET 
  fname = '$fname',
  mname = '$mname',
  lname = '$lname',
  contactno = '$contactno',
  address = '$address',
  email = '$email',
  password = '" . md5($password) . "'
  WHERE id = '$user_id'
";

if ($conn->query($qry)) {
  echo json_encode(['status' => true, 'msg' => 'Saving Success!']);
} else {
  echo json_encode(['status' => false, 'msg' => 'Saving Failed!']);
}
