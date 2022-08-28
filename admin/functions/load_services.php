<?php
include_once '../../config.php';

$added_filter = '';

$service_id = isset($_POST['service_id']) ? $_POST['service_id'] : 0;

if ($service_id !== 0) {
  $added_filter .= " AND id = '$service_id'";
}

$qry = "SELECT id, service_title, description, duration, amount
  FROM tbl_services
  WHERE is_deleted = 0 $added_filter";

$result = $conn->query($qry);

if ($result->num_rows > 0) {
  $data = [];
  while ($row = $result->fetch_assoc()) {
    if ($service_id !== 0) {
      $description = strip_tags($row['description']);
    } else {
      $description = nl2br($row['description']);
    }

    $data[] = [
      'id' => $row['id'],
      'service' => $row['service_title'],
      'description' => $row['description'] !== NULL ? $description : '',
      'duration' => $row['duration'],
      'amount' => number_format($row['amount'], 2),
    ];
  }

  echo json_encode(['status' => true, 'msg' => 'Fetching Success!', 'data' => $data]);
} else {
  echo json_encode(['status' => false, 'msg' => 'Fetching Failed!', 'data' => []]);
}
