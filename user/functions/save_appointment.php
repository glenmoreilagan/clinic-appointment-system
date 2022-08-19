<?php
  include_once '../../config.php';
  // session_start();

  $complaint = $_POST['complaint'];
  $date_schedule = $_POST['date_schedule'];
  $time_schedule = $_POST['time_schedule'];
  $age = $_POST['age'];

  $new_date_schedule = "$date_schedule $time_schedule";

  $qry = "INSERT INTO tbl_appoiments
  (user_id, complaint, date_schedule, age)
  values
  (1, '$complaint', '$new_date_schedule', '$age')";

  if ($conn->query($qry)) {
    echo json_encode(['status' => true, 'msg' => 'Saving Success!']);
  } else {
    echo json_encode(['status' => false, 'msg' => 'Saving Failed!']);
  }
?>