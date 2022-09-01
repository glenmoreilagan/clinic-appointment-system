<?php
include_once '../../config.php';
session_start();

$announcement_id = $_POST['announcement_id'];
$title = $_POST['title'];
$description = $_POST['description'];
$effectivity_date = $_POST['effectivity_date'];

if ($announcement_id == 0) {
  // insert
  $qry = "INSERT INTO tbl_announcements
    (title, description, effectivity_date)
    values
    ('$title', '$description', '$effectivity_date')";

  if ($conn->query($qry)) {
    echo json_encode(['status' => true, 'msg' => 'Saving Success!']);
  } else {
    echo json_encode(['status' => false, 'msg' => 'Saving Failed!']);
  }
} else {
  // update
  $qry = "UPDATE tbl_announcements SET 
    title = '$title', 
    description = '$description', 
    effectivity_date = '$effectivity_date'
    WHERE id = '$announcement_id'
  ";

  if ($conn->query($qry)) {
    echo json_encode(['status' => true, 'msg' => 'Saving Success!']);
  } else {
    echo json_encode(['status' => false, 'msg' => 'Saving Failed!']);
  }
}
