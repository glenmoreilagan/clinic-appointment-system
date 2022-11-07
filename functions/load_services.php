<?php
include '../config.php';

$search = mysqli_escape_string($conn, $_POST['search']);

$added_str = "";

if ($search != '') {
  $added_str .= " AND service_title LIKE '%$search%' || description LIKE '%$search%'";
}

$qry = "SELECT id, service_title, description, duration, amount
  FROM tbl_services
  WHERE is_deleted = 0 
  $added_str";

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
