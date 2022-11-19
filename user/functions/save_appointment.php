<?php
include_once '../../config.php';
include './notification_class.php';
session_start();

$user_id = $_SESSION['user_id'];
$complaint = isset($_POST['complaint']) ? mysqli_escape_string($conn, $_POST['complaint']) : '';
$date_schedule = $_POST['date_schedule'];
$time_schedule = $_POST['time_schedule'];
$age = $_POST['age'];
$service_id = $_POST['service_id'];

$new_date_schedule = "$date_schedule $time_schedule";

$qry = "INSERT INTO tbl_appointments
  (user_id, complaint, date_schedule, age, service_id)
  values
  ('$user_id', '$complaint', '$new_date_schedule', '$age', '$service_id')";

if ($conn->query($qry)) {
  $qry = "SELECT user.id, user.fullname, appointment.complaint, services.service_title
  FROM tbl_user as user
  INNER JOIN tbl_appointments as appointment ON appointment.user_id = user.id
  INNER JOIN tbl_services AS services ON services.id = appointment.service_id
  WHERE user.id = '$user_id'
  ORDER BY appointment.id DESC
  LIMIT 1";
  $result = $conn->query($qry);

  if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();

    $fullname = $row['fullname'];
    $complaint = $row['complaint'];
    $service_title = $row['service_title'];

    $str_notif = "
        <div class='text-muted small mt-1'>
          <span><b>$fullname</b></span><br>
          <span>$complaint</span><br>
          <span>$service_title</span><br>
          <span>" . date('M d, Y H:i A') . "</span><br>
        </div>";
    $notif = new NotificationClass($conn);
    $notif->save($user_id, 'New Appointment', mysqli_real_escape_string($conn, $str_notif));
  }

  echo json_encode(['status' => true, 'msg' => 'Saving Success!']);
} else {
  echo json_encode(['status' => false, 'msg' => 'Saving Failed!']);
}
