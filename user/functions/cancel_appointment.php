<?php
  include_once '../../config.php';
  session_start();
  
  $user_id = $_SESSION['user_id'];
  $appointment_id = $_POST['appointment_id'];

  $qry = "DELETE FROM tbl_appointments WHERE id = '$appointment_id' AND user_id = '$user_id'";

  if ($conn->query($qry)) {
    echo json_encode(['status' => true, 'msg' => 'Delete Success!']);
  } else {
    echo json_encode(['status' => false, 'msg' => 'Delete Failed!']);
  }
?>