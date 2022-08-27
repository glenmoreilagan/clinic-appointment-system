<?php
include_once '../../config.php';

$selected_date = date('Y-m-d', strtotime($_POST['selected_date']));

$qry = "SELECT id, DATE(date_available) AS date_sched, TIME_FORMAT(date_available, '%h:%i') AS time_sched
  FROM tbl_appointment_availability
  WHERE DATE(date_available) = '$selected_date'";

$result = $conn->query($qry);

if ($result->num_rows > 0) {
  $data = [];
  while ($row = $result->fetch_assoc()) {
    $data[] = [
      'id' => $row['id'],
      'available_date' => $row['date_sched'],
      'available_time' => $row['time_sched'],
    ];
  }

  echo json_encode(['status' => true, 'msg' => 'Fetching Success!', 'data' => $data]);
} else {
  echo json_encode(['status' => false, 'msg' => 'Fetching Failed!', 'data' => []]);
}
