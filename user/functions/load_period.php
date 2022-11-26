<?php
include_once '../../config.php';


$qry =
    "SELECT id, title, start, end
    FROM tbl_period_calendar
    WHERE is_deleted = 0";

$result = $conn->query($qry);

if ($result->num_rows > 0) {
    $data = [];
    while ($row = $result->fetch_assoc()) {
        $data[] = [
            'id' => $row['id'],
            'title' => $row['title'],
            'start' => $row['start'],
            'end' => $row['end'],
        ];
        //     'start' => $schedule_id == 0 ? date('M d, Y', strtotime($row['start'])) : date('Y-m-d', strtotime($row['start'])),
        //     'end' => $schedule_id == 0 ? date('H:i a', strtotime($row['end'])) : date('H:i', strtotime($row['end']))
        // ];
    }

    echo json_encode(['status' => true, 'msg' => 'Fetching Success!', 'data' => $data]);
} else {
    echo json_encode(['status' => false, 'msg' => 'Fetching Failed!', 'data' => []]);
}