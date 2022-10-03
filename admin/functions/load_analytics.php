<?php

use Mpdf\Tag\B;

include_once '../../config.php';

$action = $_POST['action'];
$top_services = isset($_POST['filter']['top_services']) ? $_POST['filter']['top_services'] : '';
$service_percentage = isset($_POST['filter']['service_percentage']) ? $_POST['filter']['service_percentage'] : '';
$appointment_status = isset($_POST['filter']['appointment_status']) ? $_POST['filter']['appointment_status'] : '';

switch ($action) {
  case 'loadServicesChart_Monthly':
    $loadServicesChart_Monthly = loadServicesChart_Monthly($conn);
    echo json_encode([
      'loadServicesChart_Monthly' => $loadServicesChart_Monthly,
    ]);
    break;
  case 'loadAppointmentStatus_Monthly':
    $loadAppointmentStatus_Monthly = loadAppointmentStatus_Monthly($conn);
    echo json_encode([
      'loadAppointmentStatus_Monthly' => $loadAppointmentStatus_Monthly,
    ]);
    break;
  default:
    $data_loadServicePercentage = loadServicePercentage($conn, $service_percentage);
    $data_loadAppointmentYearlyStatus = loadAppointmentYearlyStatus($conn, $appointment_status);
    $data_loadServicesChart = loadServicesChart($conn, $top_services);

    echo json_encode([
      'data_loadServicePercentage' => $data_loadServicePercentage,
      'data_loadAppointmentYearlyStatus' => $data_loadAppointmentYearlyStatus,
      'data_loadServicesChart' => $data_loadServicesChart,
    ]);
    break;
}


function loadServicePercentage($conn, $service_percentage)
{
  $added_filter = '';
  if ($service_percentage != '') {
    $added_filter .= " AND YEAR(appt.date_schedule) = '$service_percentage'";
  }

  $qry = "SELECT COUNT(appt.service_id) as total_service_count
    FROM tbl_appointments as appt
    WHERE appt.service_id <> 0 $added_filter
    LIMIT 1";
  $result = $conn->query($qry);

  $total_service_count = 0;
  if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $total_service_count = $row['total_service_count'];
  }

  $qry = "SELECT serv.service_title, service_id as service_id, 
    COUNT(appt.service_id) AS service_count,
    (COUNT(appt.service_id) / $total_service_count) * 100 AS service_percentage
    FROM tbl_appointments AS appt
    INNER JOIN tbl_services AS serv ON serv.id = appt.service_id
    WHERE 1=1 $added_filter
    GROUP BY appt.service_id";

  $result = $conn->query($qry);
  if ($result->num_rows > 0) {
    $data = [];
    while ($row = $result->fetch_assoc()) {
      $data[] = [
        'service_title' => $row['service_title'],
        'service_count' => $row['service_count'],
        'service_percentage' => number_format($row['service_percentage'], 2),
      ];
    }

    return $data;
  } else {
    return [];
  }
}

function loadAppointmentYearlyStatus($conn, $appointment_status)
{
  $added_filter = '';
  if ($appointment_status != '') {
    $added_filter .= " AND YEAR(date_schedule) = '$appointment_status'";
  }

  $qry = "SELECT 'pending' as status, SUM(jan) as jan, SUM(feb) as feb,
    SUM(mar) as mar, SUM(apr) as apr, SUM(may) as may, 
    SUM(jun) as jun, SUM(jul) as jul, SUM(aug) as aug, 
    SUM(sep) as sep, SUM(oct) as oct, SUM(nov) as nov, SUM(dece)as dece
    FROM (
      SELECT DATE_FORMAT(date_schedule, '%b') AS month_name,
      IF (MONTH(date_schedule) = 1, COUNT(STATUS), 0) AS jan,
      IF (MONTH(date_schedule) = 2, COUNT(STATUS), 0) AS feb,
      IF (MONTH(date_schedule) = 3, COUNT(STATUS), 0) AS mar,
      IF (MONTH(date_schedule) = 4, COUNT(STATUS), 0) AS apr,
      IF (MONTH(date_schedule) = 5, COUNT(STATUS), 0) AS may,
      IF (MONTH(date_schedule) = 6, COUNT(STATUS), 0) AS jun,
      IF (MONTH(date_schedule) = 7, COUNT(STATUS), 0) AS jul,
      IF (MONTH(date_schedule) = 8, COUNT(STATUS), 0) AS aug,
      IF (MONTH(date_schedule) = 9, COUNT(STATUS), 0) AS sep,
      IF (MONTH(date_schedule) = 10, COUNT(STATUS), 0) AS oct,
      IF (MONTH(date_schedule) = 11, COUNT(STATUS), 0) AS nov,
      IF (MONTH(date_schedule) = 12, COUNT(STATUS), 0) AS dece
      FROM tbl_appointments
      WHERE STATUS = 0 AND is_cancelled = 0 $added_filter
      GROUP BY MONTH(date_schedule)
      ORDER BY MONTH(date_schedule)
    ) AS tbl
    UNION ALL
    SELECT 'approved' as status, SUM(jan) as jan, SUM(feb) as feb,
    SUM(mar) as mar, SUM(apr) as apr, SUM(may) as may, SUM(jun) as jun,
    SUM(jul) as jul, SUM(aug) as aug, SUM(sep) as sep,
    SUM(oct) as oct, SUM(nov) as nov, SUM(dece)as dece
    FROM (
      SELECT DATE_FORMAT(date_schedule, '%b') AS month_name,
      IF (MONTH(date_schedule) = 1, COUNT(STATUS), 0) AS jan,
      IF (MONTH(date_schedule) = 2, COUNT(STATUS), 0) AS feb,
      IF (MONTH(date_schedule) = 3, COUNT(STATUS), 0) AS mar,
      IF (MONTH(date_schedule) = 4, COUNT(STATUS), 0) AS apr,
      IF (MONTH(date_schedule) = 5, COUNT(STATUS), 0) AS may,
      IF (MONTH(date_schedule) = 6, COUNT(STATUS), 0) AS jun,
      IF (MONTH(date_schedule) = 7, COUNT(STATUS), 0) AS jul,
      IF (MONTH(date_schedule) = 8, COUNT(STATUS), 0) AS aug,
      IF (MONTH(date_schedule) = 9, COUNT(STATUS), 0) AS sep,
      IF (MONTH(date_schedule) = 10, COUNT(STATUS), 0) AS oct,
      IF (MONTH(date_schedule) = 11, COUNT(STATUS), 0) AS nov,
      IF (MONTH(date_schedule) = 12, COUNT(STATUS), 0) AS dece
      FROM tbl_appointments
      WHERE STATUS = 1 AND is_cancelled = 0 $added_filter
      GROUP BY MONTH(date_schedule)
      ORDER BY MONTH(date_schedule)
    ) AS tbl
    UNION ALL
    SELECT 'cancelled' as status, SUM(jan) as jan, SUM(feb) as feb,
    SUM(mar) as mar, SUM(apr) as apr, SUM(may) as may, SUM(jun) as jun,
    SUM(jul) as jul, SUM(aug) as aug, SUM(sep) as sep,
    SUM(oct) as oct, SUM(nov) as nov, SUM(dece)as dece
    FROM (
      SELECT DATE_FORMAT(date_schedule, '%b') AS month_name,
      IF (MONTH(date_schedule) = 1, COUNT(STATUS), 0) AS jan,
      IF (MONTH(date_schedule) = 2, COUNT(STATUS), 0) AS feb,
      IF (MONTH(date_schedule) = 3, COUNT(STATUS), 0) AS mar,
      IF (MONTH(date_schedule) = 4, COUNT(STATUS), 0) AS apr,
      IF (MONTH(date_schedule) = 5, COUNT(STATUS), 0) AS may,
      IF (MONTH(date_schedule) = 6, COUNT(STATUS), 0) AS jun,
      IF (MONTH(date_schedule) = 7, COUNT(STATUS), 0) AS jul,
      IF (MONTH(date_schedule) = 8, COUNT(STATUS), 0) AS aug,
      IF (MONTH(date_schedule) = 9, COUNT(STATUS), 0) AS sep,
      IF (MONTH(date_schedule) = 10, COUNT(STATUS), 0) AS oct,
      IF (MONTH(date_schedule) = 11, COUNT(STATUS), 0) AS nov,
      IF (MONTH(date_schedule) = 12, COUNT(STATUS), 0) AS dece
      FROM tbl_appointments
      WHERE STATUS IN (0, 1) AND is_cancelled = 1 $added_filter
      GROUP BY MONTH(date_schedule)
      ORDER BY MONTH(date_schedule)
    ) AS tbl";

  $result = $conn->query($qry);

  if ($result->num_rows > 0) {
    $data = [];
    while ($row = $result->fetch_assoc()) {
      $data[] = [
        'status' => $row['status'],
        'jan' => $row['jan'] ? $row['jan'] : 0,
        'feb' => $row['feb'] ? $row['feb'] : 0,
        'mar' => $row['mar'] ? $row['mar'] : 0,
        'apr' => $row['apr'] ? $row['apr'] : 0,
        'may' => $row['may'] ? $row['may'] : 0,
        'jun' => $row['jun'] ? $row['jun'] : 0,
        'jul' => $row['jul'] ? $row['jul'] : 0,
        'aug' => $row['aug'] ? $row['aug'] : 0,
        'sep' => $row['sep'] ? $row['sep'] : 0,
        'oct' => $row['oct'] ? $row['oct'] : 0,
        'nov' => $row['nov'] ? $row['nov'] : 0,
        'dece' => $row['dece'] ? $row['dece'] : 0,
      ];
    }

    return $data;
  } else {
    return [];
  }
}

function loadServicesChart($conn, $top_services)
{

  $added_filter = '';
  if ($top_services != '') {
    $added_filter .= " AND YEAR(date_schedule) = '$top_services'";
  }

  $qry = "SELECT serv.service_title, service_id,
  IF (MONTH(date_schedule) = 1, COUNT(service_id), 0) AS jan,
  IF (MONTH(date_schedule) = 2, COUNT(service_id), 0) AS feb,
  IF (MONTH(date_schedule) = 3, COUNT(service_id), 0) AS mar,
  IF (MONTH(date_schedule) = 4, COUNT(service_id), 0) AS apr,
  IF (MONTH(date_schedule) = 5, COUNT(service_id), 0) AS may,
  IF (MONTH(date_schedule) = 6, COUNT(service_id), 0) AS jun,
  IF (MONTH(date_schedule) = 7, COUNT(service_id), 0) AS jul,
  IF (MONTH(date_schedule) = 8, COUNT(service_id), 0) AS aug,
  IF (MONTH(date_schedule) = 9, COUNT(service_id), 0) AS sep,
  IF (MONTH(date_schedule) = 10, COUNT(service_id), 0) AS oct,
  IF (MONTH(date_schedule) = 11, COUNT(service_id), 0) AS nov,
  IF (MONTH(date_schedule) = 12, COUNT(service_id), 0) AS dece
  FROM tbl_appointments AS appt
  INNER JOIN tbl_services AS serv ON serv.id = appt.service_id
  WHERE 1=1 $added_filter
  GROUP BY service_id
  ORDER BY jan DESC, feb DESC, mar DESC, apr DESC, may DESC, 
    jun DESC, jul DESC, aug DESC,
    sep DESC, oct DESC, nov DESC, dece DESC
  LIMIT 3";

  $result = $conn->query($qry);

  if ($result->num_rows > 0) {
    $data = [];
    while ($row = $result->fetch_assoc()) {
      $data[] = [
        'service_title' => $row['service_title'],
        'jan' => $row['jan'],
        'feb' => $row['feb'],
        'mar' => $row['mar'],
        'apr' => $row['apr'],
        'may' => $row['may'],
        'jun' => $row['jun'],
        'jul' => $row['jul'],
        'aug' => $row['aug'],
        'sep' => $row['sep'],
        'oct' => $row['oct'],
        'nov' => $row['nov'],
        'dece' => $row['dece'],
      ];
    }

    return $data;
  } else {
    return [];
  }
}

function loadAppointmentStatus_Monthly($conn)
{
  $today_month = date('m');
  $num_day_month = cal_days_in_month(CAL_GREGORIAN, date('m'), date('Y'));
  $added_filter = '';
  $added_filter .= " AND MONTH(date_schedule) = $today_month";

  $str_concat = '';
  $order_concat = '';
  $sum_concat = '';
  for ($i = 1; $i <= $num_day_month; $i++) {
    if ($i != $num_day_month) {
      $str_concat .= "IF (DAY(date_schedule) = $i, COUNT(STATUS), 0) AS d$i, ";
      $order_concat .= "d$i ASC, ";
      $sum_concat .= "SUM(d$i) as d$i, ";
    } else {
      $str_concat .= "IF (DAY(date_schedule) = $i, COUNT(STATUS), 0) AS d$i ";
      $order_concat .= "d$i ASC ";
      $sum_concat .= "SUM(d$i) as d$i ";
    }
  }

  $qry = "SELECT 'pending' as status, $sum_concat
    FROM (
      SELECT DATE_FORMAT(date_schedule, '%b') AS month_name,
      $str_concat
      FROM tbl_appointments
      WHERE STATUS = 0 AND is_cancelled = 0 $added_filter
      GROUP BY DAY(date_schedule)
      ORDER BY $order_concat
    ) AS tbl
    UNION ALL
    SELECT 'approved' as status, $sum_concat
    FROM (
      SELECT DATE_FORMAT(date_schedule, '%b') AS month_name,
      $str_concat
      FROM tbl_appointments
      WHERE STATUS = 1 AND is_cancelled = 0 $added_filter
      GROUP BY DAY(date_schedule)
      ORDER BY $order_concat
    ) AS tbl
    UNION ALL
    SELECT 'cancelled' as status, $sum_concat
    FROM (
      SELECT DATE_FORMAT(date_schedule, '%b') AS month_name,
      $str_concat
      FROM tbl_appointments
      WHERE STATUS IN (0, 1) AND is_cancelled = 1 $added_filter
      GROUP BY DAY(date_schedule)
      ORDER BY $order_concat
    ) AS tbl";

  $result = $conn->query($qry);

  if ($result->num_rows > 0) {
    $data = [];
    while ($row = $result->fetch_assoc()) {
      $data[] = [
        'status' => $row['status'],
        'd1' => $row['d1'],
        'd2' => $row['d2'],
        'd3' => $row['d3'],
        'd4' => $row['d4'],
        'd5' => $row['d5'],
        'd6' => $row['d6'],
        'd7' => $row['d7'],
        'd8' => $row['d8'],
        'd9' => $row['d9'],
        'd10' => $row['d10'],
        'd11' => $row['d11'],
        'd12' => $row['d12'],
        'd13' => $row['d13'],
        'd14' => $row['d14'],
        'd15' => $row['d15'],
        'd16' => $row['d16'],
        'd17' => $row['d17'],
        'd18' => $row['d18'],
        'd19' => $row['d19'],
        'd20' => $row['d20'],
        'd21' => $row['d21'],
        'd22' => $row['d22'],
        'd23' => $row['d23'],
        'd24' => $row['d24'],
        'd25' => $row['d25'],
        'd26' => $row['d26'],
        'd27' => $row['d27'],
        'd28' => $row['d28'],
        'd29' => $row['d29'],
        'd30' => $row['d30'],
        'd31' => $row['d31'],
      ];
    }

    return $data;
  } else {
    return [];
  }
}

function loadServicesChart_Monthly($conn)
{
  $today_month = date('m');
  $num_day_month = cal_days_in_month(CAL_GREGORIAN, date('m'), date('Y'));
  $added_filter = '';
  $added_filter .= " AND MONTH(date_schedule) = $today_month";

  $str_concat = '';
  $order_concat = '';
  for ($i = 1; $i <= $num_day_month; $i++) {
    if ($i != $num_day_month) {
      $str_concat .= "IF (DAY(date_schedule) = $i, COUNT(service_id), 0) AS d$i, ";
      $order_concat .= "d$i ASC, ";
    } else {
      $str_concat .= "IF (DAY(date_schedule) = $i, COUNT(service_id), 0) AS d$i ";
      $order_concat .= "d$i ASC ";
    }
  }


  $qry = "SELECT serv.service_title, 
    $str_concat
    FROM tbl_appointments AS appt
    INNER JOIN tbl_services AS serv ON serv.id = appt.service_id
    WHERE 1=1 $added_filter
    GROUP BY service_id
    ORDER BY $order_concat
    LIMIT 3";

  $result = $conn->query($qry);

  if ($result->num_rows > 0) {
    $data = [];
    while ($row = $result->fetch_assoc()) {
      $data[] = [
        'service_title' => $row['service_title'],
        'd1' => $row['d1'],
        'd2' => $row['d2'],
        'd3' => $row['d3'],
        'd4' => $row['d4'],
        'd5' => $row['d5'],
        'd6' => $row['d6'],
        'd7' => $row['d7'],
        'd8' => $row['d8'],
        'd9' => $row['d9'],
        'd10' => $row['d10'],
        'd11' => $row['d11'],
        'd12' => $row['d12'],
        'd13' => $row['d13'],
        'd14' => $row['d14'],
        'd15' => $row['d15'],
        'd16' => $row['d16'],
        'd17' => $row['d17'],
        'd18' => $row['d18'],
        'd19' => $row['d19'],
        'd20' => $row['d20'],
        'd21' => $row['d21'],
        'd22' => $row['d22'],
        'd23' => $row['d23'],
        'd24' => $row['d24'],
        'd25' => $row['d25'],
        'd26' => $row['d26'],
        'd27' => $row['d27'],
        'd28' => $row['d28'],
        'd29' => $row['d29'],
        'd30' => $row['d30'],
        'd31' => $row['d31'],
      ];
    }

    return $data;
  } else {
    return [];
  }
}
