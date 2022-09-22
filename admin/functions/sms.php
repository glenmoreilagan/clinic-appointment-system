<?php
class Sms
{
  private $apicode = 'TR-JOYCE607872_FWM5U';
  private $passwd = 'ljcclinic';
  private $email = 'jycnnmntr@gmail.com';
  private $message;
  private $number = [];

  public function __construct($number = '', $message = '')
  {
    // TR-KAYEC329869_2490E
    // 09125041626
    $this->number = $number;
    $this->message = $message;
  }

  public function itexmo()
  {
    $ch = curl_init();
    $recipient = array();
    array_push($recipient, $this->number);
    $itexmo = array(
      'Email' => $this->email,
      'Password' => $this->passwd,
      'ApiCode' => $this->apicode,
      'Recipients' => $recipient,
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
