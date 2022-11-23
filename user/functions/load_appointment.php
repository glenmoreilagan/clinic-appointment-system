<?php
include_once '../../config.php';
session_start();

$user_id = $_SESSION['user_id'];

$added_filter = '';

$appointment_id = isset($_POST['appointment_id']) ? $_POST['appointment_id'] : 0;

if ($appointment_id !== 0) {
  $added_filter .= " AND appointment.id = '$appointment_id'";
}

$qry = "SELECT appointment.id, appointment.user_id, appointment.complaint, 
  DATE_FORMAT(appointment.date_schedule, '%b %d %Y') as date_schedule, 
  TIME_FORMAT(appointment.date_schedule, '%I:%i %p') as time_schedule, 
  appointment.age, appointment.remarks,
  case
    when appointment.status = 0 AND appointment.is_cancelled = 0 then 'Pending'
    when (appointment.is_cancelled = 1 AND appointment.status = 0) OR (appointment.is_cancelled = 1 AND appointment.status = 1) then 'Cancelled'
    when appointment.status = 1 AND appointment.is_completed = 0 then 'Approved'
    when appointment.is_completed = 1 AND appointment.status = 1 then 'Completed'
  end as status,
  services.service_title,
  IFNULL(payment.findings, '') as findings
  FROM tbl_appointments as appointment 
  LEFT JOIN tbl_services as services on services.id = appointment.service_id
  LEFT JOIN tbl_appointment_payment as payment on payment.user_id = appointment.user_id AND payment.appointment_id = appointment.id
  WHERE appointment.user_id = '$user_id' $added_filter
  GROUP BY appointment.id
  ORDER BY appointment.id DESC";
  
$result = $conn->query($qry);

if ($result->num_rows > 0) {
  $data = [];
  while ($row = $result->fetch_assoc()) {
    $data[] = [
      'id' => $row['id'],
      'user_id' => $row['user_id'],
      'complaint' => nl2br($row['complaint']),
      'date_schedule' => !empty($row['date_schedule']) ? $row['date_schedule'] : '',
      'time_schedule' => !empty($row['time_schedule']) ? $row['time_schedule'] : '',
      'age' => $row['age'],
      'remarks' => $row['remarks'],
      'status' => $row['status'],
      'service_title' => $row['service_title'] !== NULL ? $row['service_title'] : '-',
      'findings' => $row['findings'],
    ];
  }

  echo json_encode(['status' => true, 'msg' => 'Fetching Success!', 'data' => $data]);
} else {
  echo json_encode(['status' => false, 'msg' => 'Fetching Failed!', 'data' => []]);
}
