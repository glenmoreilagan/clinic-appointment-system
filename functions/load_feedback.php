<?php
include '../config.php';

$qry = "SELECT id, rating, feedback
  FROM tbl_feedback";

$result = $conn->query($qry);

if ($result->num_rows > 0) {
    $data = [];
    while ($row = $result->fetch_assoc()) {
        $data[] = [
            'id' => $row['id'],
            'rating' => $row['rating'],
            'feedback' => nl2br($row['feedback']),
        ];
    }

    echo json_encode(['status' => true, 'msg' => 'Fetching Success!', 'data' => $data]);
} else {
    echo json_encode(['status' => false, 'msg' => 'Fetching Failed!', 'data' => []]);
}