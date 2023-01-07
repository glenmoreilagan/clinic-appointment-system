<?php

require_once '../../vendor/autoload.php';
include_once '../../config.php';

$mpdf = new \Mpdf\Mpdf();


$added_filter = '';

$date_start = isset($_GET['date_start']) ? $_GET['date_start'] : '';
$date_end = isset($_GET['date_end']) ? $_GET['date_end'] : '';
$service_id = isset($_GET['service_id']) ? $_GET['service_id'] : '';

if ($date_start != '' || $date_end != '') {
  $added_filter .= " AND (DATE(appointment.date_schedule) BETWEEN '$date_start' AND '$date_end')";
}

if ($service_id) {
  $added_filter .= " AND service.id = '$service_id'";
}

$qry = "SELECT cust.id, cust.fullname, cust.address, cust.contactno, cust.email,
appointment.complaint, cust.age, 
DATE_FORMAT(appointment.date_schedule, '%b %d %Y') as date_schedule, 
TIME_FORMAT(appointment.date_schedule, '%I:%i %p') as time_schedule, 
service.service_title, service.description,
IFNULL(payment.findings, '') as findings
FROM tbl_user AS cust
INNER JOIN tbl_appointments AS appointment ON appointment.user_id = cust.id
INNER JOIN tbl_services AS service ON service.id = appointment.service_id
INNER JOIN tbl_appointment_payment AS payment ON payment.appointment_id = appointment.id
WHERE appointment.status = 1 AND appointment.is_completed = 1
$added_filter
ORDER BY cust.id";

$result = $conn->query($qry);

$headers = '';
$str = '';
if ($result->num_rows > 0) {
  $cust_id = '';

  $headers .= openTrow();
  $headers .= tdata('', 'padding-top: 20px;');
  $headers .= closeTrow();

  $start = date("M d, Y", strtotime($date_start));
  $end = date("M d, Y", strtotime($date_end));
  $headers .= openTrow();
  $headers .= tdata("<strong>Date Filter:</strong> $start to $end");
  $headers .= closeTrow();

  $headers .= openTrow();
  $headers .= tdata('', 'border-top: 1px dotted;', 3);
  $headers .= closeTrow();

  $i = 0;
  while ($row = $result->fetch_assoc()) {
    $i++;
    if ($cust_id != $row['id']) {
      if ($cust_id != '') {
        $str .= "<tr><td colspan='4' style='border-bottom: 1px dotted;'></td></tr>";
      }
      $str .= "<tr><td colspan='3'><strong>Patient Name: </strong>" . $row['fullname'] . "</td></tr>";
      $str .= "<tr><td colspan='3'><strong>Age: </strong>" . $row['age'] . "</td></tr>";
      $str .= "<tr><td colspan='3'><strong>Address: </strong>" . $row['address'] . "</td></tr>";
      $str .= "<tr><td colspan='3'><strong>Contact No.: </strong>" . $row['contactno'] . "</td></tr>";
      $str .= "<tr><td colspan='3'><strong>Email: </strong>" . $row['email'] . "</td></tr>";

      $str .= openTrow();
      $str .= tdata('Date & Time', 'width: 200px; text-align: center; padding-top: 20px; border-bottom: 1px solid; text-transform: uppercase; font-weight: bold;');
      $str .= tdata('Chief Complaint', 'width: 200px; text-align: center; padding-top: 20px; border-bottom: 1px solid; text-transform: uppercase; font-weight: bold;');
      $str .= tdata('Service', 'width: 200px; text-align: center; padding-top: 20px; border-bottom: 1px solid; text-transform: uppercase; font-weight: bold;');
      $str .= tdata('Findings', 'width: 200px; text-align: center; padding-top: 20px; border-bottom: 1px solid; text-transform: uppercase; font-weight: bold;');
      $str .= closeTrow();
    }

    $str .= openTrow();
    $str .= tdata($row['time_schedule'] . " " . $row['date_schedule']);
    $str .= tdata($row['complaint']);
    $str .= tdata($row['service_title']);
    $str .= tdata($row['findings']);
    $str .= closeTrow();

    $cust_id = $row['id'];
  }
}



$output = "
<div style='margin-top: 40px;'>
  <table style='font-family: monospace; width: 800px;'>
      $headers
    </table>
    <table style='font-family: monospace; width: 800px;'>
      $str
    </table>
  </div>";

$mpdf->SetHTMLHeader('<div style="text-align: right;"><img width="150" height="50" src="../../image/logo.png"></div>');
$mpdf->setFooter('Page {PAGENO} - {DATE M d Y}');

// print_r($_GET);
// return;
$mpdf->WriteHTML($output);
$filename = 'patient_list_' . date('Y_m_d') . '.pdf';
// $mpdf->Output();
$mpdf->Output($filename, 'D'); // for auto download


function openTrow($data = '')
{
  return "<tr>";
}

function closeTrow($data = '')
{
  return "</tr>";
}

function tdata($data = '', $style = '', $colspan = 0)
{
  return "<td colspan='$colspan' style='$style'>" . $data . "</td>";
}