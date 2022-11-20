<?php
include_once '../../config.php';

$qry = "SELECT USER.fullname, fback.id, fback.feedback, fback.created_at,
  case 
    when fback.rating = 5 then  'Very Satisfied'
    when fback.rating = 4 then  'Satisfied'
    when fback.rating = 3 then  'Neutral'
    when fback.rating = 2 then  'Unsatisfied'
    when fback.rating = 1 then  'Very Unsatisfied'
  end as rating
FROM tbl_feedback AS fback
INNER JOIN tbl_user AS USER ON USER.id = fback.user_id
ORDER BY created_at DESC";

$result = $conn->query($qry);

if ($result->num_rows > 0) {
  $data = [];
  while ($row = $result->fetch_assoc()) {
    $data[] = [
      'id' => $row['id'],
      'rating' => $row['rating'],
      'feedback' => $row['feedback'],
      'created_at' => date('M d, Y', strtotime($row['created_at'])),
    ];
  }

  echo json_encode(['status' => true, 'msg' => 'Fetching Success!', 'data' => $data]);
} else {
  echo json_encode(['status' => false, 'msg' => 'Fetching Failed!', 'data' => []]);
}
