<?php

require_once '../../vendor/autoload.php';
include_once '../../config.php';

$mpdf = new \Mpdf\Mpdf();

$qry = "SELECT cust.id, cust.fullname, cust.address, cust.contactno, cust.email,
appointment.complaint, appointment.age, 
DATE_FORMAT(appointment.date_schedule, '%b %d %Y') as date_schedule, 
TIME_FORMAT(appointment.date_schedule, '%I:%i %p') as time_schedule, 
service.service_title, service.description
FROM tbl_user AS cust
INNER JOIN tbl_appointments AS appointment ON appointment.user_id = cust.id
INNER JOIN tbl_services AS service ON service.id = appointment.service_id
WHERE appointment.status = 1 AND appointment.is_completed = 1
ORDER BY cust.id";

$result = $conn->query($qry);

$str = '';
if ($result->num_rows > 0) {
  $cust_id = '';
  while ($row = $result->fetch_assoc()) {
    if ($cust_id != $row['id']) {
      if ($cust_id != '') {
        $str .= "<tr><td colspan='3' style='border-bottom: 1px dotted;'></td></tr>";
      }
      $str .= "<tr><td colspan='3'><strong>Patient Name: </strong>" . $row['fullname'] . "</td></tr>";
      $str .= "<tr><td colspan='3'><strong>Age: </strong>" . $row['age'] . "</td></tr>";
      $str .= "<tr><td colspan='3'><strong>Address: </strong>" . $row['address'] . "</td></tr>";
      $str .= "<tr><td colspan='3'><strong>Contact No.: </strong>" . $row['contactno'] . "</td></tr>";
      $str .= "<tr><td colspan='3'><strong>Email: </strong>" . $row['email'] . "</td></tr>";
      $str .= "<tr>
          <td style='text-align: center; padding-top: 20px; border-bottom: 1px solid; text-transform: uppercase;'><strong>Date & Time</strong></td>
          <td style='text-align: center; padding-top: 20px; border-bottom: 1px solid; text-transform: uppercase;'><strong>Chief Complaint</strong></td>
          <td style='text-align: center; padding-top: 20px; border-bottom: 1px solid; text-transform: uppercase;'><strong>Service</strong></td>
        </tr>";
    }

    $str .= "<tr>
      <td>" . $row['time_schedule'] . " " . $row['date_schedule'] . "</td>
      <td>" . $row['complaint'] . "</td>
      <td>" . $row['service_title'] . "</td>
    </tr>";

    $cust_id = $row['id'];
  }
}

$mpdf->SetHTMLHeader('
<div style="text-align: right;">
    <img width="150" height="50" src="../../image/logo.png">
</div>');

$mpdf->setFooter('Page {PAGENO} - {DATE M d Y}');

$output = "
  <div style='margin-top: 40px;'>
    <table style='font-family: monospace; width: 800px;'>
        $str
    </table>
  </div>
";

// echo $output;
// return;
$mpdf->WriteHTML($output);
$filename = 'patient_list_'.date('Y_m_d').'.pdf';
$mpdf->Output($filename, 'D');
