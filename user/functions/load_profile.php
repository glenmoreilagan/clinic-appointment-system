<?php
include_once '../../config.php';
session_start();

$user_id = $_SESSION['user_id'];

$qry = "SELECT id, fname, mname, lname, address, contactno, email 
  FROM tbl_user 
  WHERE id = '$user_id'
  LIMIT 1";

$result = $conn->query($qry);

if ($result->num_rows > 0) {
  $data = [];
  while ($row = $result->fetch_assoc()) {
    $data = [
      'id' => $row['id'],
      'fname' => $row['fname'],
      'mname' => $row['mname'],
      'lname' => $row['lname'],
      'address' => $row['address'],
      'contactno' => $row['contactno'],
      'email' => $row['email'],
    ];
  }

  echo json_encode(['status' => true, 'data' => $data]);
} else {
  echo json_encode(['status' => false, 'data' => []]);
}
