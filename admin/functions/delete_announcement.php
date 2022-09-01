<?php
include_once '../../config.php';
session_start();

$announcement_id = $_POST['announcement_id'];

if ($announcement_id != 0) {
  // fake delete
  $qry = "UPDATE tbl_announcements SET is_deleted = 1 WHERE id = '$announcement_id'";

  if ($conn->query($qry)) {
    echo json_encode(['status' => true, 'msg' => 'Deleting Success!']);
  } else {
    echo json_encode(['status' => false, 'msg' => 'Deleting Failed!']);
  }
}
