<?php
include '../config.php';

$qry = "SELECT id, service_title, description, duration, amount
  FROM tbl_services
  WHERE is_deleted = 0";

$result = $conn->query($qry);

if ($result->num_rows > 0) {
  $data = [];
  while ($row = $result->fetch_assoc()) {
    $data[] = [
      'id' => $row['id'],
      'service_title' => $row['service_title'],
      'description' => nl2br($row['description']),
      'duration' => $row['duration'],
      'amount' => number_format($row['amount'], 2),
    ];
  }

  echo json_encode(['status' => true, 'msg' => 'Fetching Success!', 'data' => $data]);
} else {
  echo json_encode(['status' => false, 'msg' => 'Fetching Failed!', 'data' => []]);
}
