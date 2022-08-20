<?php
  include_once '../../config.php';
  session_start();

  $user_id = $_SESSION['user_id'];

  $qry = "SELECT id, title, description, created_at FROM tbl_announcements ORDER BY created_at DESC";

  $result = $conn->query($qry);

  if ($result->num_rows > 0) {
    $data = [];
    while($row = $result->fetch_assoc()) {
      $data[] = [
        'id' => $row['id'],
        'title' => $row['title'],
        'description' => $row['description'],
        'created_at' => date('M d, Y', strtotime($row['created_at'])),
      ];
    }

    echo json_encode(['status' => true, 'msg' => 'Fetching Success!', 'data' => $data]);
  } else {
    echo json_encode(['status' => false, 'msg' => 'Fetching Failed!', 'data' => []]);
  }
