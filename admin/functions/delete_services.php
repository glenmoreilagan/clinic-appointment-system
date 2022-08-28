<?php
include_once '../../config.php';
session_start();

$service_id = $_POST['service_id'];

if ($service_id != 0) {
  // fake delete
  $qry = "UPDATE tbl_services SET is_deleted = 1 WHERE id = '$service_id'";

  if ($conn->query($qry)) {
    echo json_encode(['status' => true, 'msg' => 'Deleting Success!']);
  } else {
    echo json_encode(['status' => false, 'msg' => 'Deleting Failed!']);
  }
}
