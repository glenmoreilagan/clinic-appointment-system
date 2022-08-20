<?php
  include_once '../../config.php';

  $qry = "SELECT id, user_id, complaint, 
  DATE_FORMAT(date_schedule, '%b %d %Y') as date_schedule, 
  TIME_FORMAT(date_schedule, '%I:%i %p') as time_schedule, 
  age, remarks,
  case
    when status = 0 then 'Pending'
    when status = 1 and is_completed = 0 then 'Approved'
    when is_completed = 1 or status = 1 then 'Completed'
  end as status
  FROM tbl_appointments 
  order by id DESC";

  $result = $conn->query($qry);

  if ($result->num_rows > 0) {
    $data = [];
    while($row = $result->fetch_assoc()) {
      $data[] = [
        'id' => $row['id'],
        'user_id' => $row['user_id'],
        'complaint' => nl2br($row['complaint']),
        'date_schedule' => !empty($row['date_schedule']) ? $row['date_schedule'] : '',
        'time_schedule' => !empty($row['time_schedule']) ? $row['time_schedule'] : '',
        'age' => $row['age'],
        'remarks' => $row['remarks'],
        'status' => $row['status'],
      ];
    }

    echo json_encode(['status' => true, 'msg' => 'Fetching Success!', 'data' => $data]);
  } else {
    echo json_encode(['status' => false, 'msg' => 'Fetching Failed!', 'data' => []]);
  }
?>