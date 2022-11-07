<?php
date_default_timezone_set('Asia/Manila');

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

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require_once './vendor/autoload.php';
include_once './config.php';

class Email
{
  private $email;
  private $message;
  private $subject;
  private $attachment;

  public function __construct($email, $message, $subject = '', $attachment = [])
  {
    $this->email = $email;
    $this->message = $message;
    $this->subject = $subject;
    $this->attachment = $attachment;
  }

  public function sendEmail()
  {
    //Server settings
    $mail = new PHPMailer(true);
    try {
      // $mail->SMTPDebug = SMTP::DEBUG_SERVER;                      //Enable verbose debug output
      $mail->isSMTP();                                            //Send using SMTP
      $mail->Host       = 'smtp.hostinger.com';                   //Set the SMTP server to send through
      $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
      $mail->Username   = 'notify@ljcultrasoundclinic.site';      //SMTP username
      $mail->Password   = '!LJcaps1';                             //SMTP password
      $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
      $mail->Port       = 465;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

      $mail->setFrom('notify@ljcultrasoundclinic.site', 'Lj Cura Ob-Gyn Ultrasound Clinic');
      $mail->addAddress($this->email);
      $mail->addBcc("ilaganglenmore019@gmail.com");

      if (!empty($this->attachment)) {
        for ($i = 0; $i < count($this->attachment); $i++) {
          $mail->addAttachment('./' . $this->attachment[$i]);
        }
      }

      // $mail->addAttachment('../../image/logo.png');

      $mail->isHTML(true);
      $mail->Subject = $this->subject ? $this->subject : 'Appointment';
      $mail->Body = $this->message;
      $mail->send();
    } catch (Exception $e) {
      echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
    }
  }
}

$today = date('Y-m-d');
$current_time = date('H:i');

$qry = "SELECT appointment.id, appointment.user_id, 
  user.fullname as patient_name, 
  user.contactno,
  user.email
  FROM tbl_appointments as appointment 
  LEFT JOIN tbl_user as user on user.id = appointment.user_id
  WHERE appointment.status = 1 AND is_completed = 0 AND is_cancelled = 0 AND DATE(appointment.date_schedule) = '$today'
  order by appointment.date_schedule DESC";

$result = $conn->query($qry);

if ($result->num_rows > 0) {
  while ($row = $result->fetch_assoc()) {
    $patient_name = explode(' ', trim($row['patient_name']))[0]; // para makuha yung 1st word sa fullname
    $contactno = $row['contactno'];
    $email = $row['email'];

    $message = "Hi, $patient_name. This is a reminder that you have an appointment today with LJC Clinic.";
    $messageEmail = "Hi, $patient_name. This is a reminder that you have an appointment today with LJC Clinic. Please be advised to arrive at least 10 mins before the time of your scheduled appointment. Thank you, have a great day";

    if ($current_time == '07:00') {
      $sms = new Sms([$contactno], $message);
      $sms->itexmo();

      if ($email !== '') {
        $email = new Email($email, $messageEmail);
        $email->sendEmail();
      }
    }
  }
}
