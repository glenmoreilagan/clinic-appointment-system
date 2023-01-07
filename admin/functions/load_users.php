<?php
include_once '../../config.php';

$added_filter = '';

$user_id = $_POST['user_id'];

if ($user_id) {
  $added_filter .= " AND cust.id = '$user_id'";
}

$qry = "SELECT cust.id, 
  cust.fname, cust.mname, cust.lname, 
  cust.fullname, cust.age, cust.address, cust.contactno, cust.email
  FROM tbl_user AS cust
  WHERE role = 0 AND is_deleted = 0
  $added_filter";

$result = $conn->query($qry);

if ($result->num_rows > 0) {
  $data = [];
  while ($row = $result->fetch_assoc()) {
    $data[] = [
      'id' => $row['id'],
      'fname' => $row['fname'],
      'mname' => $row['mname'],
      'lname' => $row['lname'],
      'fullname' => $row['fullname'],
      'age' => $row['age'],
      'address' => $row['address'],
      'contactno' => $row['contactno'],
      'email' => $row['email'],
    ];
  }

  echo json_encode(['status' => true, 'msg' => 'Fetching Success!', 'data' => $data]);
} else {
  echo json_encode(['status' => false, 'msg' => 'Fetching Failed!', 'data' => []]);
}