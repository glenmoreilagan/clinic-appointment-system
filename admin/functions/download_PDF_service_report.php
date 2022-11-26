<?php

require_once '../../vendor/autoload.php';
include_once '../../config.php';

$mpdf = new \Mpdf\Mpdf();


$added_filter = '';

$date_start = isset($_GET['date_start']) ? $_GET['date_start'] : '';
$date_end = isset($_GET['date_end']) ? $_GET['date_end'] : '';
$service_id = isset($_GET['service_id']) ? $_GET['service_id'] : '';

if ($date_start != '' || $date_end != '') {
  $added_filter .= " AND (DATE(payment.date_paid) BETWEEN '$date_start' AND '$date_end')";
}

if ($service_id) {
  $added_filter .= " AND service.id = '$service_id'";
}

$qry = "SELECT 
  service.id, 
  service.service_title, 
  COUNT(service.id) AS total_count_appointment, 
  cost AS service_cost, 
  SUM(other_cost) AS total_other_cost, 
  SUM(total_cost) AS total_cost
FROM tbl_services AS service
INNER JOIN tbl_appointments AS appointment ON appointment.service_id = service.id
INNER JOIN tbl_appointment_payment AS payment ON payment.appointment_id = appointment.id
$added_filter
GROUP BY service.id
ORDER BY SUM(total_cost) DESC";

$result = $conn->query($qry);

$headers = '';

$headers .= openTrow();
$headers .= tdata('', 'padding-top: 20px;');
$headers .= closeTrow();

$headers .= openTrow();
$headers .= tdata("<h1><strong>Service Report</strong></h1>");
$headers .= closeTrow();

$start = date("M d, Y", strtotime($date_start));
$end = date("M d, Y", strtotime($date_end));
$headers .= openTrow();
$headers .= tdata("<strong>Date Covered:</strong> $start to $end");
$headers .= closeTrow();

$str = '';
$grand_total_count = 0;
$grand_total_service_cost = 0;
$grand_total_other_cost = 0;
$grand_total_cost = 0;
if ($result->num_rows > 0) {
  $i = 0;
  $str .= openTrow();
  $str .= tdata('Service Title', 'width: 200px; text-align: center; padding-top: 20px; border-bottom: 1px solid; text-transform: uppercase; font-weight: bold;');
  $str .= tdata('Total Count Appointment', 'width: 150px; text-align: center; padding-top: 20px; border-bottom: 1px solid; text-transform: uppercase; font-weight: bold;');
  $str .= tdata('Service Cost', 'width: 150px; text-align: center; padding-top: 20px; border-bottom: 1px solid; text-transform: uppercase; font-weight: bold;');
  // $str .= tdata('Total Other Cost', 'width: 150px; text-align: center; padding-top: 20px; border-bottom: 1px solid; text-transform: uppercase; font-weight: bold;');
  $str .= tdata('Total Cost', 'width: 150px; text-align: center; padding-top: 20px; border-bottom: 1px solid; text-transform: uppercase; font-weight: bold;');
  $str .= closeTrow();
  while ($row = $result->fetch_assoc()) {
    $i++;
    $str .= openTrow();
    $str .= tdata($row['service_title']);
    $str .= tdata($row['total_count_appointment'], 'text-align:right;');
    $str .= tdata(number_format($row['service_cost'], 2), 'text-align:right;');
    // $str .= tdata(number_format($row['total_other_cost'], 2), 'text-align:right;');
    $str .= tdata(number_format($row['total_cost'], 2), 'text-align:right;');
    $str .= closeTrow();

    $grand_total_count += $row['total_count_appointment'];
    $grand_total_service_cost += $row['service_cost'];
    $grand_total_other_cost += $row['total_other_cost'];
    $grand_total_cost += $row['total_cost'];
  }

  $str .= openTrow();
  $str .= tdata('Grand Total:', 'width: 150px; text-align: left; padding-top: 20px; border-top: 1px solid; text-transform: uppercase; font-weight: bold;');
  $str .= tdata(number_format($grand_total_count, 0), 'width: 150px; text-align: right; padding-top: 20px; border-top: 1px solid; text-transform: uppercase; font-weight: bold;');
  $str .= tdata('', 'width: 150px; text-align: right; padding-top: 20px; border-top: 1px solid; text-transform: uppercase; font-weight: bold;');
  // $str .= tdata(number_format($grand_total_other_cost, 2), 'width: 150px; text-align: right; padding-top: 20px; border-top: 1px solid; text-transform: uppercase; font-weight: bold;');
  $str .= tdata(number_format($grand_total_cost, 2), 'width: 150px; text-align: right; padding-top: 20px; border-top: 1px solid; text-transform: uppercase; font-weight: bold;');
  $str .= closeTrow();
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
$filename = 'service_report_' . date('Y_m_d') . '.pdf';
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
