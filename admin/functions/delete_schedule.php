<?php
include_once '../../config.php';
session_start();

$schedule_id = $_POST['schedule_id'];

if ($schedule_id != 0) {
  // fake delete
  $qry = "UPDATE tbl_appointment_availability SET is_deleted = 1 WHERE id = '$schedule_id'";

  if ($conn->query($qry)) {
    echo json_encode(['status' => true, 'msg' => 'Deleting Success!']);
  } else {
    echo json_encode(['status' => false, 'msg' => 'Deleting Failed!']);
  }
}
