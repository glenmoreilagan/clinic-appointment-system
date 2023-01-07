<?php
include_once '../../config.php';
session_start();

$user_id = $_SESSION['user_id'];

$qry = "SELECT id, user_id, complaint, 
  DATE(date_schedule) as date_schedule, 
  TIME(date_schedule) as time_schedule, 
  remarks,
  case
    when status = 0 AND is_completed = 0 then 'Pending'
    when status = 1 AND is_completed = 0 then 'Approved'
    when status = 1 AND is_completed = 1 then 'Completed'
  end as status
  FROM tbl_appointments 
  WHERE user_id = '$user_id' AND is_cancelled = 0
  order by id DESC";

$result = $conn->query($qry);

if ($result->num_rows > 0) {
  $data = [];
  while ($row = $result->fetch_assoc()) {
    $data[] = [
      'id' => $row['id'],
      'user_id' => $user_id,
      'complaint' => nl2br($row['complaint']),
      'date_schedule' => !empty($row['date_schedule']) ? $row['date_schedule'] : '',
      'time_schedule' => !empty($row['time_schedule']) ? $row['time_schedule'] : '',
      // 'age' => $row['age'],
      'remarks' => $row['remarks'],
      'status' => $row['status'],

      // required for the calendar
      // required these 2 dates start and end column names
      'start' => !empty($row['date_schedule']) ? date('Y-m-d', strtotime($row['date_schedule'])) : '',
      'end' => !empty($row['date_schedule']) ? date('Y-m-d', strtotime($row['date_schedule'])) : '',
      'title' => "[" . $row['status'] . "]" . $row['complaint'], // required this to display on the calendar
      'color' => $row['status'] == 'Pending' ? '#198754' : ($row['status'] == 'Approved' ? '#0D6EFD' : '#e56b6f'),
    ];
  }

  echo json_encode($data);
} else {
  echo json_encode([]);
}