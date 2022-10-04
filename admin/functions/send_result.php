<?php
include_once '../../config.php';
include './email.php';

$attachments = $_FILES['attachments']['name'];
$tmp = $_FILES["attachments"]["tmp_name"];

$user_id = $_POST['user_id'];
$appointment_id = $_POST['appointment_id'];

$valid_extensions = array('jpeg', 'jpg', 'png', 'gif', 'bmp', 'pdf', 'doc', 'ppt', 'txt'); // valid extensions
$path = 'sent_results/';


if (count($attachments) > 3) {
  echo json_encode(['status' => false, 'msg' => 'Please select file maximum of 3']);
  return;
}

$file_to_attach_email = [];
if (count($attachments) > 0) {
  for ($i = 0; $i < count($attachments); $i++) {
    $file_name = $attachments[$i];
    /// get uploaded file's extension
    $ext = strtolower(pathinfo($file_name, PATHINFO_EXTENSION));

    // check's invalid format
    if (!in_array($ext, $valid_extensions)) {
      echo json_encode(['status' => false, 'msg' => 'Invalid File']);
      return;
    }
  }

  for ($i = 0; $i < count($attachments); $i++) {
    $file_name = $attachments[$i];
    $temp_name = $tmp[$i];

    // can upload same image function
    $final_file = date('Ymd_His') . $file_name;

    $new_path = $path . strtolower($final_file);

    if (!move_uploaded_file($temp_name, $new_path)) {
      echo json_encode(['status' => false, 'msg' => 'Result Failed']);
      return;
    }
    array_push($file_to_attach_email, $new_path);
  }

  $qry = "SELECT id, fullname, contactno, email
  FROM tbl_user
  WHERE id = '$user_id'
  LIMIT 1";
  $result = $conn->query($qry);

  if (!empty($result)) {
    $row = $result->fetch_assoc();
    $fullname = $row['fullname'];
    $email = $row['email'];

    $message = "Hello $fullname, this is your result";

    if ($email !== '') {
      $email = new Email('ilaganglenmore019@gmail.com', $message, 'Appointment Result', $file_to_attach_email);
      $email->sendEmail();
    }
  }

  echo json_encode(['status' => true, 'msg' => 'Result Sent', $file_to_attach_email]);
}
