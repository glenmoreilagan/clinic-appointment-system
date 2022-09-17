<?php
include_once '../../config.php';
session_start();

$user_id = $_SESSION['user_id'];

$qry = "SELECT id, title, description
  FROM tbl_notification 
  WHERE user_id = '$user_id'
  order by id DESC
  LIMIT 10";

$result = $conn->query($qry);

if ($result->num_rows > 0) {
  $data = [];
  while ($row = $result->fetch_assoc()) {
    $data[] = [
      'id' => $row['id'],
      'title' => $row['title'],
      'description' => $row['description'],
    ];
  }

  echo json_encode(['data' => $data]);
} else {
  echo json_encode([]);
}
