<?php
include_once '../../config.php';
session_start();

$user_id = $_SESSION['user_id'];

$qry = "SELECT id, user_id, title, description, start, end
  FROM tbl_period_calendar 
  WHERE user_id = '$user_id'
  order by id DESC";

$result = $conn->query($qry);

if ($result->num_rows > 0) {
  $data = [];
  while ($row = $result->fetch_assoc()) {
    $data[] = [
      'id' => $row['id'],
      'user_id' => $user_id,
      'title' => $row['title'],
      'description' => $row['title'],
      'start' => $row['start'],
      'end' => $row['end'],
    ];
  }

  echo json_encode($data);
} else {
  echo json_encode([]);
}
