<?php
include_once '../../config.php';

$added_filter = '';

$schedule_id = isset($_POST['schedule_id']) ? $_POST['schedule_id'] : 0;

if ($schedule_id !== 0) {
  $added_filter .= " AND id = '$schedule_id'";
}

$qry = "SELECT id, date_available
  FROM tbl_appointment_availability
  WHERE is_deleted != 1 $added_filter
  ORDER BY DATE(date_available) DESC";

$result = $conn->query($qry);

if ($result->num_rows > 0) {
  $data = [];
  while ($row = $result->fetch_assoc()) {
    $data[] = [
      'id' => $row['id'],
      'date_schedule' => $schedule_id == 0 ? date('M d, Y', strtotime($row['date_available'])) : date('Y-m-d', strtotime($row['date_available'])),
      'time_schedule' => $schedule_id == 0 ? date('H:i a', strtotime($row['date_available'])) : date('H:i', strtotime($row['date_available']))
    ];
  }

  echo json_encode(['status' => true, 'msg' => 'Fetching Success!', 'data' => $data]);
} else {
  echo json_encode(['status' => false, 'msg' => 'Fetching Failed!', 'data' => []]);
}
