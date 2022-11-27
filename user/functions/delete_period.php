<?php
include_once '../../config.php';
session_start();

$user_id = $_SESSION['user_id'];
$period_id = $_POST['period_id'];

$qry = "DELETE FROM tbl_period_calendar WHERE id = '$period_id' AND user_id = '$user_id'";

if ($conn->query($qry)) {
  echo json_encode(['status' => true, 'msg' => 'Deleting Success!']);
} else {
  echo json_encode(['status' => false, 'msg' => 'Deleting Failed!']);
}
