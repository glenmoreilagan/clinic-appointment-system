<?php
include_once '../../config.php';
include './email.php';

$pregnant_status = $_POST['pregnant'] ? $_POST['pregnant'] : '';
$service_title = $_POST['service'] ? $_POST['service'] : '';
$other_services = $_POST['other_service'] ? $_POST['other_service'] : '';
$findings = $_POST['findings'] ? $_POST['findings'] : '';
$cost = $_POST['cost'] ? $_POST['cost'] : '0';
$other_cost = $_POST['other_charges'] ? $_POST['other_charges'] : '0';
$user_id = $_POST['user_id'] ? $_POST['user_id'] : '0';
$appointment_id = $_POST['appointment_id'] ? $_POST['appointment_id'] : '0';

$total_cost = $cost + $other_cost;
$date_paid = date('Y-m-d');

if ($user_id && $appointment_id) {
  $qry = "UPDATE tbl_appointments SET is_completed = 1 
  WHERE id = '$appointment_id' AND user_id = '$user_id'";
  $result_update = $conn->query($qry);

  if ($result_update) {
    $reference_no = GetSerialCode($user_id, $appointment_id);

    $qry = "INSERT INTO tbl_appointment_payment
    (reference_no, user_id, date_paid, appointment_id, pregnant_status, 
    service_title, other_services, findings, cost, other_cost, total_cost)
    VALUES
    ('$reference_no', '$user_id', '$date_paid', '$appointment_id', '$pregnant_status', 
    '$service_title', '$other_services', '$findings', '$cost', '$other_cost', '$total_cost')";

    if ($conn->query($qry)) {
      $qry = "SELECT user.fullname, user.address, user.email, app.age
      FROM tbl_user as user
      INNER JOIN tbl_appointments as app on app.user_id = user.id
      WHERE user.id = '$user_id' 
      GROUP BY user.id
      LIMIT 1";
      $result = $conn->query($qry);

      if (!empty($result)) {
        $row = $result->fetch_assoc();
        $fullname = $row['fullname'];
        $address = $row['address'];
        $date_paid = date('F d, Y');
        $email = $row['email'];
        $age = $row['age'];

        $message = "<table style='font-family: Courier New, Courier, monospace; font-size: 13px; border: 1px solid; width: 800px;'>
          <tr>
            <td colspan='10' style='text-align: center; font-size: 2em;'>OFFICIAL RECEIPT</td>
          </tr>
          <tr>
            <td colspan='10' style='text-align: center;'><strong>Lj Cura Ob-Gyn Ultrasound Clinic</strong></td>
          </tr>
          <tr>
            <td colspan='10' style='text-align: center;'><strong>A Mabini Avenue, Barangay Sambat, Tanauan City Batangas</strong></td>
          </tr>
          <tr>
            <td><strong>REF NO.:</strong> $reference_no</td>
          </tr>
          <tr>
            <td><strong>DATE:</strong> $date_paid</td>
          </tr>
          <tr>
            <td><strong>FULLNAME:</strong> $fullname</td>
          </tr>
          <tr>
            <td><strong>AGE:</strong> $age</td>
          </tr>
          <tr>
            <td><strong>ADDRESS:</strong> $address</td>
          </tr>
          <tr>
            <td><strong>PREGNANCY STATUS:</strong> $pregnant_status</td>
          </tr>
        </table>
    
        <table style='font-family: Courier New, Courier, monospace; border: 1px solid; width: 800px; border-collapse: collapse;'>
          <tr style='font-size: 13px; border: 1px solid; font-weight: bold;'>
            <td style='padding: 5px; text-align: center; width: 25%;'>SERVICE</td>
            <td style='padding: 5px; text-align: center; width: 25%;'>FINDINGS</td>
            <td style='padding: 5px; text-align: center; width: 15%;'>COST</td>
            <td style='padding: 5px; text-align: center; width: 15%;'>OTHER COST</td>
            <td style='padding: 5px; text-align: center; width: 15%;'>TOTAL COST</td>
          </tr>
          <tr style='font-size: 12px;'>
            <td style='padding: 5px; text-align: left;'>$service_title <br> $other_services</td>
            <td style='padding: 5px; text-align: left;'>$findings</td>
            <td style='padding: 5px; text-align: right;'>" . number_format($cost, 2) . "</td>
            <td style='padding: 5px; text-align: right;'>" . number_format($other_cost, 2) . "</td>
            <td style='padding: 5px; text-align: right;'>" . number_format($total_cost, 2) . "</td>
          </tr>
          <tr style='font-size: 13px; border: 1px solid;'>
            <td style='padding: 5px; text-align: left;'></td>
            <td style='padding: 5px; text-align: left;'></td>
            <td style='padding: 5px; text-align: right;'></td>
            <td style='padding: 5px; text-align: right; font-weight: bold;'>GRAND TOTAL</td>
            <td style='padding: 5px; text-align: right; font-weight: bold;'>" . number_format($total_cost, 2) . "</td>
          </tr>
        </table>";

        if ($email !== '') {
          $email = new Email($email, $message, 'Official Receipt');
          $email->sendEmail(1);
        }
      }

      echo json_encode(['status' => true, 'msg' => 'Payment Success!']);
    } else {
      $qry = "UPDATE tbl_appointments SET is_completed = 0 
      WHERE id = '$appointment_id' AND user_id = '$user_id'";
      $conn->query($qry);

      echo json_encode(['status' => false, 'msg' => 'Payment Failed!']);
    }
  }
}

function GetSerialCode($user_id, $appointment_id)
{
  $strings = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ1234567890';
  $stringLength = strlen($strings);
  $newStrings = 'REF-';
  $ref_length = 8;
  for ($i = 0; $i < $ref_length; $i++) {
    if (($ref_length / 2) == $i) {
      $newStrings .= "-" . $strings[rand(0, $stringLength - 1)];
    } else {
      $newStrings .= $strings[rand(0, $stringLength - 1)];
    }
  }

  return $newStrings . '-' . $user_id . '-' . $appointment_id;
}
