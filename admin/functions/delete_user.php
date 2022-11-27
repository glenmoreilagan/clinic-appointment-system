<?php
include_once '../../config.php';
session_start();

$user_id = $_POST['user_id'];

// delete
$qry = "UPDATE tbl_user SET is_deleted = 1 WHERE id = '$user_id'";

if ($conn->query($qry)) {
  echo json_encode(['status' => true, 'msg' => 'Saving Success!']);
} else {
  echo json_encode(['status' => false, 'msg' => 'Saving Failed!']);
}
