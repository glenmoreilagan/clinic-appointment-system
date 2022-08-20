<?php
  include_once '../../config.php';
  session_start();
  
  $user_id = $_SESSION['user_id'];
  $complaint = $_POST['complaint'];
  $date_schedule = $_POST['date_schedule'];
  $time_schedule = $_POST['time_schedule'];
  $age = $_POST['age'];

  $new_date_schedule = "$date_schedule $time_schedule";

  $qry = "INSERT INTO tbl_appointments
  (user_id, complaint, date_schedule, age)
  values
  ('$user_id', '$complaint', '$new_date_schedule', '$age')";

  if ($conn->query($qry)) {
    echo json_encode(['status' => true, 'msg' => 'Saving Success!']);
  } else {
    echo json_encode(['status' => false, 'msg' => 'Saving Failed!']);
  }
?>