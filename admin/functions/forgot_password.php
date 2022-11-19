<?php
include_once '../../config.php';
include './email.php';

$email = isset($_POST['email']) ? mysqli_escape_string($conn, $_POST['email']) : '';

if ($email) {
  $qry = "SELECT email FROM tbl_user WHERE email = '$email' LIMIT 1";
  $result = $conn->query($qry);

  if ($result->num_rows > 0) {
    $new_password = generateRandomString(8);
    $encrypted_new_password = md5($new_password);

    $qry = "UPDATE tbl_user SET password = '$encrypted_new_password' WHERE email = '$email'";
    if ($conn->query($qry)) {
      $email_message = "Your reset password is: <u><b>$new_password</b></u> please change your temporary password after you login.";
      $email = new Email($email, $email_message, 'Password Reset');
      $email->sendEmail();

      echo json_encode(['status' => true, 'msg' => 'Reset Password sent to your email, please check.']);
    }
  } else {
    echo json_encode(['status' => false, 'msg' => 'Email not found.']);
  }
} else {
  echo json_encode(['status' => false, 'msg' => 'Email is required.']);
}

function generateRandomString($length = 10)
{
  $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
  $charactersLength = strlen($characters);
  $randomString = '';
  for ($i = 0; $i < $length; $i++) {
    $randomString .= $characters[rand(0, $charactersLength - 1)];
  }
  return $randomString;
}