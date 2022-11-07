<?php
include_once '../../config.php';
session_start();

$user_id = $_SESSION['user_id'];
$rating = $_POST['rating'];
$feedback = isset($_POST['feedback']) ? mysqli_escape_string($conn, $_POST['feedback']) : '';


$qry = "INSERT INTO tbl_feedback
  (user_id, rating, feedback)
  values
  ('$user_id', '$rating', '$feedback')";

if ($conn->query($qry)) {
  echo json_encode(['status' => true, 'msg' => 'Saving Success!']);
} else {
  echo json_encode(['status' => false, 'msg' => 'Saving Failed!']);
}
