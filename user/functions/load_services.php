<?php
include_once '../../config.php';

$qry = "SELECT id, service_title, duration, amount
  FROM tbl_services
  WHERE is_deleted = 0";

$result = $conn->query($qry);

if ($result->num_rows > 0) {
  $data = [];
  while ($row = $result->fetch_assoc()) {
    $data[] = [
      'id' => $row['id'],
      'service' => $row['service_title'],
      'duration' => $row['duration'],
      'amount' => number_format($row['amount'], 2),
    ];
  }

  echo json_encode(['status' => true, 'msg' => 'Fetching Success!', 'data' => $data]);
} else {
  echo json_encode(['status' => false, 'msg' => 'Fetching Failed!', 'data' => []]);
}
