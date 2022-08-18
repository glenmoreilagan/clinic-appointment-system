<?php
  include_once '../../config.php';

  $rating = $_POST['rating'];
  $feedback = $_POST['feedback'];


  $qry = "INSERT INTO tbl_feedback
  (user_id, rating, feedback)
  values
  (1, '$rating', '$feedback')";

  if ($conn->query($qry)) {
    echo json_encode(['status' => true, 'msg' => 'Saving Success!']);
  } else {
    echo json_encode(['status' => false, 'msg' => 'Saving Failed!']);
  }
?>