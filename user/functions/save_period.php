<?php
include_once '../../config.php';
session_start();

$user_id = $_SESSION['user_id'];
$title = $_POST['title'];
$start = $_POST['start'];
$end = $_POST['end'];
$end_hidden = date('Y-m-d', strtotime($_POST['end_hidden']));


$qry = "INSERT INTO tbl_period_calendar
  (user_id, title, start, end)
  values
  ('$user_id', '$title', '$start', '$end_hidden')";

if ($conn->query($qry)) {
  echo json_encode(['status' => true, 'msg' => 'Saving Success!']);
} else {
  echo json_encode(['status' => false, 'msg' => 'Saving Failed!']);
}
