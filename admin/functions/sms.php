<?php
// function itexmo($number, $message, $apicode, $passwd)
// {

//   $ch = curl_init();
//   $itexmo = array('1' => $number, '2' => $message, '3' => $apicode, 'passwd' => $passwd);
//   curl_setopt($ch, CURLOPT_URL, "https://www.itexmo.com/php_api/api.php");
//   curl_setopt($ch, CURLOPT_POST, 1);
//   curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($itexmo));
//   curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
//   curl_close($ch);

//   echo curl_exec($ch);
// }


function itexmo($number, $message, $apicode, $passwd)
{
  $url = 'https://www.itexmo.com/php_api/api.php';
  $itexmo = array('1' => $number, '2' => $message, '3' => $apicode, 'passwd' => $passwd);
  $param = array(
    'http' => array(
      'header'  => "Content-type: application/x-www-form-urlencoded\r\n",
      'method'  => 'POST',
      'content' => http_build_query($itexmo),
    ),
  );
  $context  = stream_context_create($param);
  return file_get_contents($url, false, $context);
}


$result = itexmo('09503429557', 'This is LJ CURA ULTRA SOUND CLINIC', 'TR-KENTW681716_X12KR', '!(}32v7%)%');

print_r($result);
