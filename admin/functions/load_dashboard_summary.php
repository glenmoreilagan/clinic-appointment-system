<?php
include_once '../../config.php';
session_start();

$user_id = $_SESSION['user_id'];

$qry = "SELECT SUM(IFNULL(pending, 0)) AS pending, SUM(IFNULL(approved, 0)) AS approved, 
  SUM(IFNULL(completed, 0)) AS completed, SUM(IFNULL(cancelled, 0)) AS cancelled
  FROM (
    SELECT 
      case
        when status = 0 AND is_completed = 0 AND is_cancelled = 0 then COUNT(status) 
      end AS pending,
      case
        when status = 1 AND is_completed = 0 AND is_cancelled = 0 then COUNT(status) 
      end AS approved,
      case
        when status = 1 AND is_completed = 1 AND is_cancelled = 0 then COUNT(is_completed) 
      end AS completed,
      case
        when status = 0 AND is_cancelled = 1 then COUNT(is_cancelled) 
        when status = 1 AND is_cancelled = 1 then COUNT(is_cancelled) 
      end AS cancelled
    FROM tbl_appointments
    GROUP BY status, is_completed, is_cancelled
  ) AS tbl";

$result = $conn->query($qry);

if ($result->num_rows > 0) {
  $data = [];
  while ($row = $result->fetch_assoc()) {
    $data[] = [
      'pending' => $row['pending'],
      'approved' => $row['approved'],
      'completed' => $row['completed'],
      'cancelled' => $row['cancelled'],
    ];
  }

  echo json_encode(['status' => true, 'msg' => 'Fetching Success!', 'data' => $data]);
} else {
  echo json_encode(['status' => false, 'msg' => 'Fetching Failed!', 'data' => []]);
}
