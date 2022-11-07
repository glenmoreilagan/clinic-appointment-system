<?php
include_once '../../config.php';
session_start();

$user_id = $_SESSION['user_id'];
$fname = isset($_POST['fname']) ? mysqli_escape_string($conn, $_POST['fname']) : '';
$mname = isset($_POST['mname']) ? mysqli_escape_string($conn, $_POST['mname']) : '';
$lname = isset($_POST['lname']) ? mysqli_escape_string($conn, $_POST['lname']) : '';
$contactno = isset($_POST['contactno']) ? mysqli_escape_string($conn, $_POST['contactno']) : '';
$address = isset($_POST['address']) ? mysqli_escape_string($conn, $_POST['address']) : '';
$email = isset($_POST['email']) ? mysqli_escape_string($conn, $_POST['email']) : '';
$password = isset($_POST['password']) ? mysqli_escape_string($conn, $_POST['password']) : '';
$confirm_password = isset($_POST['confirm_password']) ? mysqli_escape_string($conn, $_POST['confirm_password']) : '';

if ($password && $confirm_password) {
  if ($password !== $confirm_password) {
    echo json_encode(['status' => false, 'msg' => 'Please check password and confirm password!']);
    return;
  }
}

if (!$password || !$confirm_password) {
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
