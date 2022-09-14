<?php
include_once '../../config.php';
include './sms.php';
include './email.php';

session_start();

// $user_id = $_SESSION['user_id'];

$action = $_POST['action'];
$appointment_id = $_POST['appointment_id'];
$remarks = $_POST['remarks'];

if ($action == 'approve') {
  // approve
  $qry = "UPDATE tbl_appointments SET status = 1 
  WHERE id = '$appointment_id'";
  $result_update = $conn->query($qry);

  $qry = "SELECT user.fullname, user.contactno, user.email
  FROM tbl_appointments as appointment
  INNER JOIN tbl_user as user on user.id = appointment.user_id
  WHERE appointment.id = '$appointment_id'
  LIMIT 1";
  $result = $conn->query($qry);

  if ($result_update) {
    if (!empty($result)) {
      $row = $result->fetch_assoc();
      $fullname = $row['fullname'];
      $contactno = $row['contactno'];
      $email = $row['email'];

      $sms_response = '';
      if ($contactno !== '') {
        $message = "Hi $fullname! Your confirmed appointment to Lj Cura Ob-Gyn Ultrasound Clinic.";
        $sms = new Sms($contactno, $message);
        $sms_response = $sms->itexmo();
      }
      
      if ($email !== '') {
        $email = new Email($email, $message);
        $email->sendEmail();
      }

      echo json_encode(['status' => true, 'msg' => 'Approve Success!', 'dd' => $sms_response]);
    }
  } else {
    echo json_encode(['status' => false, 'msg' => 'Approve Failed!']);
  }
} else {
  // reject
  $qry = "UPDATE tbl_appointments SET is_cancelled = 1, remarks = '$remarks'
  WHERE id = '$appointment_id'";

  if ($conn->query($qry)) {
    echo json_encode(['status' => true, 'msg' => 'Reject Success!']);
  } else {
    echo json_encode(['status' => false, 'msg' => 'Reject Failed!']);
  }
}
