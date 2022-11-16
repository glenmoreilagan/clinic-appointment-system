<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require_once '../../vendor/autoload.php';
include_once '../../config.php';

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

  public function sendEmail($isCopyReceipt = 0)
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

      if($isCopyReceipt == 1) {
        $mail->addCC("kayecelineurayan@gmail.com", 'Admin');
      }

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
