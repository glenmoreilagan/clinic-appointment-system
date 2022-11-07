<?php
include_once '../../config.php';
session_start();

$qry = "SELECT * FROM tbl_health_declaration 
ORDER BY created_at DESC";

$result = $conn->query($qry);

if ($result->num_rows > 0) {
  $data = [];
  while ($row = $result->fetch_assoc()) {
    $data[] = [
      'id' => $row['id'],
      'name' => $row['name'],
      'address' => $row['address'],
      'is_patient' => $row['is_patient'],
      'is_fever' => $row['is_fever'],
      'is_cough' => $row['is_cough'],
      'is_loss_smell' => $row['is_loss_smell'],
      'is_short_breath' => $row['is_short_breath'],
      'is_sore_throat' => $row['is_sore_throat'],
      'is_body_pain' => $row['is_body_pain'],
      'is_headache' => $row['is_headache'],
      'is_fam_covid' => $row['is_fam_covid'],
      'is_contact_covid' => $row['is_contact_covid'],
      'is_travelled_outside' => $row['is_travelled_outside'],
      'created_at' => date('M d, Y H:i A', strtotime($row['created_at'])),
    ];
  }

  echo json_encode(['status' => true, 'msg' => 'Fetching Success!', 'data' => $data]);
} else {
  echo json_encode(['status' => false, 'msg' => 'Fetching Failed!', 'data' => []]);
}
