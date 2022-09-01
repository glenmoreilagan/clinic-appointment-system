<?php
include_once '../../config.php';
session_start();

$user_id = $_SESSION['user_id'];

$qry = "SELECT id, title, description, effectivity_date FROM tbl_announcements ORDER BY created_at DESC";

$result = $conn->query($qry);

if ($result->num_rows > 0) {
  $data = [];
  while ($row = $result->fetch_assoc()) {
    $data[] = [
      'id' => $row['id'],
      'title' => $row['title'],
      'description' => $row['description'],
      'effectivity_date' => $row['effectivity_date'] ? date('M d, Y', strtotime($row['effectivity_date'])) : '',
    ];
  }

  echo json_encode(['status' => true, 'msg' => 'Fetching Success!', 'data' => $data]);
} else {
  echo json_encode(['status' => false, 'msg' => 'Fetching Failed!', 'data' => []]);
}
