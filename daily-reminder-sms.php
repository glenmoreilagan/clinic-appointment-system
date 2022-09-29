<?php
class Sms
{
  private $apicode = 'TR-JOYCE607872_FWM5U';
  private $passwd = 'ljcclinic';
  private $email = 'jycnnmntr@gmail.com';
  private $message;
  private $number = [];

  public function __construct($number = [], $message = '')
  {
    // TR-KAYEC329869_2490E
    // 09125041626
    $this->number = $number;
    $this->message = $message;
  }

  public function itexmo()
  {
    $ch = curl_init();
    // $recipient = array();
    // array_push($recipient, $this->number);
    $itexmo = array(
      'Email' => $this->email,
      'Password' => $this->passwd,
      'ApiCode' => $this->apicode,
      'Recipients' => $this->number,
      // 'Recipients' => $this->number,
      'Message' => $this->message
    );
    curl_setopt($ch, CURLOPT_URL, "https://api.itexmo.com/api/broadcast");
    curl_setopt($ch, CURLOPT_POST, 1);
    curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($itexmo));
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    $ouput = curl_exec($ch);
    curl_close($ch);

    return $ouput;
  }
}

include_once './config.php';
$today = date('Y-m-d');
$current_time = date('H:i');

$qry = "SELECT appointment.id, appointment.user_id, user.fullname as patient_name, user.contactno
  FROM tbl_appointments as appointment 
  LEFT JOIN tbl_user as user on user.id = appointment.user_id
  WHERE appointment.status = 1 AND is_completed = 0 AND is_cancelled = 0 AND DATE(appointment.date_schedule) = '$today'
  order by appointment.date_schedule DESC";

$result = $conn->query($qry);
if ($result->num_rows > 0) {
  while ($row = $result->fetch_assoc()) {
    $patient_name = explode(' ', trim($row['patient_name']))[0]; // para makuha yung 1st word sa fullname
    $contactno = $row['contactno'];
    $message = "Hi, $patient_name. This is a reminder that you have an appointment today with LJC Clinic.";

    if ($current_time == '07:00') {
      $sms = new Sms([$contactno], $message);
      $sms->itexmo();
    }
  }
}
