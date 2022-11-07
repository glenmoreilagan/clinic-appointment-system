<?php
include_once '../../config.php';
session_start();

$service_id = $_POST['service_id'];
$service = isset($_POST['service']) ? mysqli_escape_string($conn, $_POST['service']) : '';
$description = isset($_POST['description']) ? mysqli_escape_string($conn, $_POST['description']) : '';
$duration = isset($_POST['duration']) ? mysqli_escape_string($conn, $_POST['duration']) : '';
$amount = $_POST['amount'] != 0 ? str_replace(",", "", $_POST['amount']) : 0;

if ($service_id == 0) {
  // insert
  $qry = "INSERT INTO tbl_services
    (service_title, description, duration, amount)
    values
    ('$service', '$description', '$duration', '$amount')";

  if ($conn->query($qry)) {
    echo json_encode(['status' => true, 'msg' => 'Saving Success!']);
  } else {
    echo json_encode(['status' => false, 'msg' => 'Saving Failed!']);
  }
} else {
  // update
  $qry = "UPDATE tbl_services SET 
    service_title = '$service', description = '$description', duration = '$duration', amount = '$amount'
    WHERE id = '$service_id'
  ";

  if ($conn->query($qry)) {
    echo json_encode(['status' => true, 'msg' => 'Saving Success!']);
  } else {
    echo json_encode(['status' => false, 'msg' => 'Saving Failed!']);
  }
}
