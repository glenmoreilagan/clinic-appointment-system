<?php
include_once '../../config.php';
include './notification_class.php';

session_start();

$announcement_id = $_POST['announcement_id'];
$title = isset($_POST['title']) ? mysqli_escape_string($conn, $_POST['title']) : '';
$description = isset($_POST['description']) ? mysqli_escape_string($conn, $_POST['description']) : '';
$effectivity_date = $_POST['effectivity_date'];

if ($announcement_id == 0) {
  // insert
  $qry = "INSERT INTO tbl_announcements
    (title, description, effectivity_date)
    values
    ('$title', '$description', '$effectivity_date')";

  if ($conn->query($qry)) {
    $str_notif = "
        <div class='text-muted small mt-1'>
          <span><b>$title</b></span><br>
          <span>$description</span><br>
          <span> </span><br>
          <span>" . date('M d, Y', strtotime($effectivity_date)) . "</span><br>
        </div>";
    $notif = new NotificationClass($conn);
    $notif->save(0, 'New Announcement', mysqli_real_escape_string($conn, $str_notif));

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
