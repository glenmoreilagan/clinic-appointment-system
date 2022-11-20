<?php
include_once '../../config.php';
session_start();

$user_id = $_SESSION['user_id'];
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
    password = '" . md5($password) . "'
    WHERE id = '$user_id'
  ";

if ($conn->query($qry)) {
  echo json_encode(['status' => true, 'msg' => 'Saving Success!']);
} else {
  echo json_encode(['status' => false, 'msg' => 'Saving Failed!']);
}
