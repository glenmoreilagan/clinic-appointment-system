<?php
include_once '../../config.php';
include './sms.php';
include './email.php';
include './notification_class.php';
include '../../host_setting.php';

session_start();

// $user_id = $_SESSION['user_id'];

$action = $_POST['action'];
$appointment_id = $_POST['appointment_id'];
$remarks = $_POST['remarks'];

$qry = "SELECT appointment.user_id, user.fullname, user.contactno, user.email,
appointment.complaint, serv.service_title, appointment.remarks,
DATE_FORMAT(appointment.date_schedule, '%b %d %Y') as date_schedule, 
TIME_FORMAT(appointment.date_schedule, '%I:%i %p') as time_schedule
FROM tbl_appointments as appointment
INNER JOIN tbl_user as user on user.id = appointment.user_id
INNER JOIN tbl_services as serv on serv.id = appointment.service_id
WHERE appointment.id = '$appointment_id'
LIMIT 1";
$result = $conn->query($qry);

if ($action == 'approve') {
  // approve
  $qry = "UPDATE tbl_appointments SET status = 1 
  WHERE id = '$appointment_id'";
  $result_update = $conn->query($qry);

  if ($result_update) {
    if (!empty($result)) {
      $row = $result->fetch_assoc();
      $user_id = $row['user_id'];
      $fullname = $row['fullname'];
      $contactno = $row['contactno'];
      $email = $row['email'];
      $complaint = $row['complaint'];
      $service_title = $row['service_title'];
      $remarks = $row['remarks'];
      $date_schedule = $row['date_schedule'];
      $time_schedule = $row['time_schedule'];

      $str_notif = "<div class='text-muted small mt-1'><span><b>$fullname</b></span><br><span>$complaint</span><br><span>$service_title</span><br><span>" . date('M d, Y H:i A') . "</span><br></div>";
      $notif = new NotificationClass($conn);
      $notif->save($user_id, 'Appointment Approved', mysqli_real_escape_string($conn, $str_notif));

      $sms_response = '';
      $email_response = '';
      $patient_name = explode(' ', trim($fullname))[0];

      $messageSms = "Hi $patient_name. Thank you for choosing us! Your appointment with LJC Clinic was confirmed.";
      $messageEmail = "
        Hi $fullname. Thank you for choosing us! Your appointment with LJC Clinic was confirmed.
        <br>
        <b>Appointment Details:</b>
        <br>
        <b>Preffered Date:</b> $date_schedule
        <br>
        <b>Preffered Time:</b> $time_schedule
        <br>
        <b>Chief Complaint or Symptoms:</b> $complaint
        <br>
        Please fill out this 24 hours before your scheduled appointment.
        <a href='" . $host . "health-declaration-form.php'>Health Declaration Form</a>
        <br>
        <br>
        Yours sincerely,
        <br>
        LJ Cura OB-GYN Ultrasound Clinic";

      if ($contactno !== '') {
        $sms = new Sms($contactno, $messageSms);
        $sms_response = $sms->itexmo();
      }

      if ($email !== '') {
        $email = new Email($email, $messageEmail);
        $email->sendEmail();
      }

      echo json_encode(['status' => true, 'msg' => 'Approve Success!', 'sms_error' => $sms_response, 'email_error' => $email_response]);
    }
  } else {
    echo json_encode(['status' => false, 'msg' => 'Approve Failed!', 'sms_error' => '', 'email_error' => '']);
  }
} else {
  // reject
  $qry = "UPDATE tbl_appointments SET is_cancelled = 1, remarks = '$remarks'
  WHERE id = '$appointment_id'";

  if ($conn->query($qry)) {
    if (!empty($result)) {
      $row = $result->fetch_assoc();
      $user_id = $row['user_id'];
      $fullname = $row['fullname'];
      $contactno = $row['contactno'];
      $email = $row['email'];
      $complaint = $row['complaint'];
      $service_title = $row['service_title'];

      $str_notif = "<div class='text-muted small mt-1'><span><b>$fullname</b></span><br><span>$complaint</span><br><span>$service_title</span><br><span>" . date('M d, Y H:i A') . "</span><br></div>";
      $notif = new NotificationClass($conn);
      $notif->save($user_id, 'Appointment Rejected/Cancelled', mysqli_real_escape_string($conn, $str_notif));

      $sms_response = '';
      $email_response = '';
      $sms_message = "Sorry $fullname! Your appointment to Lj Cura Ob-Gyn Ultrasound Clinic was rejected.";
      $email_message = "Hi $fullname! Sorry, your appointment at LJ Cura OB-GYN Ultrasound Clinic is rejected/cancelled due to ($remarks). We're hoping for your kind understanding and consideration.
      <br>
      <br>
      Yours sincerely,
      <br>
      LJ Cura OB-GYN Ultrasound Clinic";

      if ($contactno !== '') {
        $sms = new Sms($contactno, $sms_message);
        $sms_response = $sms->itexmo();
      }

      if ($email !== '') {
        $email = new Email($email, $email_message);
        $email->sendEmail();
      }

      echo json_encode(['status' => true, 'msg' => 'Reject Success!', 'sms_error' => $sms_response, 'email_error' => $email_response]);
    }
  } else {
    echo json_encode(['status' => false, 'msg' => 'Reject Failed!', 'sms_error' => '', 'email_error' => '']);
  }
}