<?php
include_once '../../config.php';

$added_filter = '';

$announcement_id = isset($_POST['announcement_id']) ? $_POST['announcement_id'] : 0;

if ($announcement_id !== 0) {
  $added_filter .= " AND id = '$announcement_id'";
}

$qry = "SELECT id, title, description, effectivity_date
  FROM tbl_announcements
  WHERE is_deleted != 1 $added_filter";

$result = $conn->query($qry);

if ($result->num_rows > 0) {
  $data = [];
  while ($row = $result->fetch_assoc()) {
    if($announcement_id != 0) {
      $format_date = $row['effectivity_date'];
    } else {
      $format_date = date('M d, Y', strtotime($row['effectivity_date']));
    }

    $data[] = [
      'id' => $row['id'],
      'title' => $row['title'],
      'description' => $row['description'],
      'effectivity_date' => $row['effectivity_date'] ? $format_date : ''
    ];
  }

  echo json_encode(['status' => true, 'msg' => 'Fetching Success!', 'data' => $data]);
} else {
  echo json_encode(['status' => false, 'msg' => 'Fetching Failed!', 'data' => []]);
}
