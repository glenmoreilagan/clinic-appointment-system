<?php
include_once '../../config.php';
session_start();

$schedule_id = $_POST['schedule_id'];
$date_schedule = $_POST['date_schedule'];
$time_schedule = $_POST['time_schedule'];

$date_time = $date_schedule .' '. $time_schedule;

if ($schedule_id == 0) {
  // insert
  $qry = "INSERT INTO tbl_appointment_availability
    (date_available)
    values
    ('$date_time')";

  if ($conn->query($qry)) {
    echo json_encode(['status' => true, 'msg' => 'Saving Success!']);
  } else {
    echo json_encode(['status' => false, 'msg' => 'Saving Failed!']);
  }
} else {
  // update
  $qry = "UPDATE tbl_appointment_availability SET 
    date_available = '$date_time' 
    WHERE id = '$schedule_id'
  ";

  if ($conn->query($qry)) {
    echo json_encode(['status' => true, 'msg' => 'Saving Success!']);
  } else {
    echo json_encode(['status' => false, 'msg' => 'Saving Failed!']);
  }
}
