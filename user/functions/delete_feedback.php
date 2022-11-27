<?php
include_once '../../config.php';
session_start();

$feedback_id = $_POST['feedback_id'];

if ($feedback_id != 0) {
    // fake delete
    $qry = "UPDATE tbl_feedback SET is_deleted = 1 WHERE id = '$feedback_id'";

    if ($conn->query($qry)) {
        echo json_encode(['status' => true, 'msg' => 'Deleting Success!']);
    } else {
        echo json_encode(['status' => false, 'msg' => 'Deleting Failed!']);
    }
}