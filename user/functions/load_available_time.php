<?php
include_once '../../config.php';

$selected_date = date('Y-m-d', strtotime($_POST['selected_date']));

// kinuha ko muna yung appointment date and time na existing na
$qry = "SELECT GROUP_CONCAT(TIME_FORMAT(date_schedule, '%h:%i')) AS time_sched
  FROM tbl_appointments
  WHERE DATE(date_schedule) = '$selected_date'
  GROUP BY DATE(date_schedule)";
$time_sched = $conn->query($qry);

// para lang ito sa pang filter bali ang need ko na result
// is parang ganito ang result '11:00', '11:15'
// para magamit ko pang filter sa NOT IN para makuha lang 
// yung mga available pang date and time ng appointment
$added_filter = '';
if ($time_sched->num_rows > 0) {
  $imploded_time = str_replace(",", "', '", $time_sched->fetch_assoc()['time_sched']);
  $added_filter = " AND TIME_FORMAT(date_available, '%h:%i') NOT IN ('$imploded_time')"; 
}

// AND TIME_FORMAT(date_available, '%h:%i') NOT IN ($imploded_time)
// kinukuha kona dito yung available date and time for appointments
// para yun lang amg didisplay na mga buttons na maseselect ng user
$qry = "SELECT id, DATE(date_available) AS date_sched, TIME_FORMAT(date_available, '%h:%i') AS time_sched
  FROM tbl_appointment_availability
  WHERE DATE(date_available) = '$selected_date'
  $added_filter";
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
