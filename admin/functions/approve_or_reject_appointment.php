<?php
include_once '../../config.php';
session_start();

// $user_id = $_SESSION['user_id'];

$action = $_POST['action'];
$appointment_id = $_POST['appointment_id'];
$remarks = $_POST['remarks'];

if ($action == 'approve') {
  // approve
  $qry = "UPDATE tbl_appointments SET status = 1 
  WHERE id = '$appointment_id'";

  if ($conn->query($qry)) {
    echo json_encode(['status' => true, 'msg' => 'Approve Success!']);
  } else {
    echo json_encode(['status' => false, 'msg' => 'Approve Failed!']);
  }
} else {
  // reject
  $qry = "UPDATE tbl_appointments SET is_cancelled = 1, remarks = '$remarks'
  WHERE id = '$appointment_id'";

  if ($conn->query($qry)) {
    echo json_encode(['status' => true, 'msg' => 'Reject Success!']);
  } else {
    echo json_encode(['status' => false, 'msg' => 'Reject Failed!']);
  }
}
