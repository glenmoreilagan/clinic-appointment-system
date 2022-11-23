<?php

use Mpdf\Tag\B;

include_once '../../config.php';

$action = $_POST['action'];
$top_services = isset($_POST['filter']['top_services']) ? $_POST['filter']['top_services'] : '';
$appointment_status = isset($_POST['filter']['appointment_status']) ? $_POST['filter']['appointment_status'] : '';

switch ($action) {
  case 'loadServicesChart_Monthly':
    $loadServicesChart_Monthly = loadServicesChart_Monthly($conn, $_POST['month']);
    echo json_encode([
      'loadServicesChart_Monthly' => $loadServicesChart_Monthly,
    ]);
    break;
  case 'loadAppointmentStatus_Monthly':
    $loadAppointmentStatus_Monthly = loadAppointmentStatus_Monthly($conn, $_POST['month_appointment']);
    echo json_encode([
      'loadAppointmentStatus_Monthly' => $loadAppointmentStatus_Monthly,
    ]);
    break;
  case 'loadMonthlyIncome':
    $loadMonthlyIncome = loadMonthlyIncome($conn, $_POST['month']);
    echo json_encode([
      'loadMonthlyIncome' => $loadMonthlyIncome,
    ]);
    break;
  case 'loadYearlyIncome':
    $loadYearlyIncome = loadYearlyIncome($conn, $_POST['year']);
    echo json_encode([
      'loadYearlyIncome' => $loadYearlyIncome,
    ]);
    break;
  case 'loadMonthlypregnantStatus':
    $loadMonthlypregnantStatus = loadMonthlypregnantStatus($conn, $_POST['month']);
    echo json_encode([
      'loadMonthlypregnantStatus' => $loadMonthlypregnantStatus,
    ]);
    break;
  default:
    $data_loadServicePercentage = loadServicePercentage($conn);
    $data_loadAppointmentYearlyStatus = loadAppointmentYearlyStatus($conn, $appointment_status);
    $data_loadServicesChart = loadServicesChart($conn, $top_services);

    echo json_encode([
      'data_loadServicePercentage' => $data_loadServicePercentage,
      'data_loadAppointmentYearlyStatus' => $data_loadAppointmentYearlyStatus,
      'data_loadServicesChart' => $data_loadServicesChart,
    ]);
    break;
}


function loadServicePercentage($conn)
{
  $added_filter = '';

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
      WHERE STATUS = 1 AND is_cancelled = 0 $added_filter
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
      WHERE STATUS = 1 AND is_completed = 1 AND is_cancelled = 0 $added_filter
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

function loadAppointmentStatus_Monthly($conn, $month)
{
  $today_month = $month != '' ? $month : date('m');
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

  $qry = "SELECT 'approved' as status, $sum_concat
    FROM (
      SELECT DATE_FORMAT(date_schedule, '%b') AS month_name,
      $str_concat
      FROM tbl_appointments
      WHERE STATUS = 1 AND is_cancelled = 0 $added_filter
      GROUP BY DAY(date_schedule)
      ORDER BY $order_concat
    ) AS tbl
    UNION ALL
    SELECT 'completed' as status, $sum_concat
    FROM (
      SELECT DATE_FORMAT(date_schedule, '%b') AS month_name,
      $str_concat
      FROM tbl_appointments
      WHERE STATUS = 1 AND is_completed = 1 AND is_cancelled = 0 $added_filter
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
        'd1' => number_format($row['d1'], 2, '.', ''),
        'd2' => number_format($row['d2'], 2, '.', ''),
        'd3' => number_format($row['d3'], 2, '.', ''),
        'd4' => number_format($row['d4'], 2, '.', ''),
        'd5' => number_format($row['d5'], 2, '.', ''),
        'd6' => number_format($row['d6'], 2, '.', ''),
        'd7' => number_format($row['d7'], 2, '.', ''),
        'd8' => number_format($row['d8'], 2, '.', ''),
        'd9' => number_format($row['d9'], 2, '.', ''),
        'd10' => number_format($row['d10'], 2, '.', ''),
        'd11' => number_format($row['d11'], 2, '.', ''),
        'd12' => number_format($row['d12'], 2, '.', ''),
        'd13' => number_format($row['d13'], 2, '.', ''),
        'd14' => number_format($row['d14'], 2, '.', ''),
        'd15' => number_format($row['d15'], 2, '.', ''),
        'd16' => number_format($row['d16'], 2, '.', ''),
        'd17' => number_format($row['d17'], 2, '.', ''),
        'd18' => number_format($row['d18'], 2, '.', ''),
        'd19' => number_format($row['d19'], 2, '.', ''),
        'd20' => number_format($row['d20'], 2, '.', ''),
        'd21' => number_format($row['d21'], 2, '.', ''),
        'd22' => number_format($row['d22'], 2, '.', ''),
        'd23' => number_format($row['d23'], 2, '.', ''),
        'd24' => number_format($row['d24'], 2, '.', ''),
        'd25' => number_format($row['d25'], 2, '.', ''),
        'd26' => number_format($row['d26'], 2, '.', ''),
        'd27' => number_format($row['d27'], 2, '.', ''),
        'd28' => number_format($row['d28'], 2, '.', ''),
        'd29' => number_format($row['d29'], 2, '.', ''),
        'd30' => number_format($row['d30'], 2, '.', ''),
        'd31' => isset($row['d31']) ? number_format($row['d31'], 2, '.', '') : 0,
      ];
    }

    return $data;
  } else {
    return [];
  }
}

function loadServicesChart_Monthly($conn, $month)
{
  $today_month = $month != '' ? $month : date('m');
  $num_day_month = cal_days_in_month(CAL_GREGORIAN, date('m'), date('Y'));
  $added_filter = '';
  $added_filter .= " AND MONTH(date_schedule) = $today_month";

  $main_concat = '';
  $str_concat = '';
  $order_concat = '';
  for ($i = 1; $i <= $num_day_month; $i++) {
    if ($i != $num_day_month) {
      $str_concat .= "IF (DAY(date_schedule) = $i, COUNT(service_id), 0) AS d$i, ";
      $order_concat .= "d$i DESC, ";
      $main_concat .= "SUM(d$i) as d$i, ";
    } else {
      $str_concat .= "IF (DAY(date_schedule) = $i, COUNT(service_id), 0) AS d$i ";
      $order_concat .= "d$i DESC ";
      $main_concat .= "SUM(d$i) as d$i ";
    }
  }


  $qry = " SELECT service_title, $main_concat FROM (
      SELECT serv.service_title, 
      $str_concat
      FROM tbl_appointments AS appt
      INNER JOIN tbl_services AS serv ON serv.id = appt.service_id
      WHERE 1=1 $added_filter
      GROUP BY service_id, DAY(date_schedule)
    ) as tbl GROUP BY service_title 
      ORDER BY $order_concat LIMIT 3";

  $result = $conn->query($qry);

  if ($result->num_rows > 0) {
    $data = [];
    while ($row = $result->fetch_assoc()) {
      $data[] = [
        'service_title' => $row['service_title'],
        'd1' => number_format($row['d1'], 2, '.', ''),
        'd2' => number_format($row['d2'], 2, '.', ''),
        'd3' => number_format($row['d3'], 2, '.', ''),
        'd4' => number_format($row['d4'], 2, '.', ''),
        'd5' => number_format($row['d5'], 2, '.', ''),
        'd6' => number_format($row['d6'], 2, '.', ''),
        'd7' => number_format($row['d7'], 2, '.', ''),
        'd8' => number_format($row['d8'], 2, '.', ''),
        'd9' => number_format($row['d9'], 2, '.', ''),
        'd10' => number_format($row['d10'], 2, '.', ''),
        'd11' => number_format($row['d11'], 2, '.', ''),
        'd12' => number_format($row['d12'], 2, '.', ''),
        'd13' => number_format($row['d13'], 2, '.', ''),
        'd14' => number_format($row['d14'], 2, '.', ''),
        'd15' => number_format($row['d15'], 2, '.', ''),
        'd16' => number_format($row['d16'], 2, '.', ''),
        'd17' => number_format($row['d17'], 2, '.', ''),
        'd18' => number_format($row['d18'], 2, '.', ''),
        'd19' => number_format($row['d19'], 2, '.', ''),
        'd20' => number_format($row['d20'], 2, '.', ''),
        'd21' => number_format($row['d21'], 2, '.', ''),
        'd22' => number_format($row['d22'], 2, '.', ''),
        'd23' => number_format($row['d23'], 2, '.', ''),
        'd24' => number_format($row['d24'], 2, '.', ''),
        'd25' => number_format($row['d25'], 2, '.', ''),
        'd26' => number_format($row['d26'], 2, '.', ''),
        'd27' => number_format($row['d27'], 2, '.', ''),
        'd28' => number_format($row['d28'], 2, '.', ''),
        'd29' => number_format($row['d29'], 2, '.', ''),
        'd30' => number_format($row['d30'], 2, '.', ''),
        'd31' => isset($row['d31']) ? number_format($row['d31'], 2, '.', '') : 0,
      ];
    }

    return $data;
  } else {
    return [];
  }
}

function loadMonthlyIncome($conn, $month)
{
  $today_month = $month != '' ? $month : date('m');
  // get number of days in today month
  $num_day_month = cal_days_in_month(CAL_GREGORIAN, date('m'), date('Y'));
  $added_filter = '';
  $added_filter .= " AND MONTH(date_paid) = $today_month";

  $main_concat = '';
  $str_concat = '';
  $order_concat = '';

  for ($i = 1; $i <= $num_day_month; $i++) {
    // if i not equal sa number ng araw ngayong buwan
    // cocompute lang tas i aapend lang yung string para maging 
    // sql query may comma sa dulo
    if ($i != $num_day_month) {
      $main_concat .= "SUM(d$i) as d$i,";
      $str_concat .= "IF (DAY(date_paid) = $i, SUM(total_cost), 0) AS d$i, ";
      $order_concat .= "d$i ASC, ";
    } else {
      // eto naman pag yung i at last day ay equal
      // same lang naman ginagawa pero 
      // inalis lang yung comma sa dulo ng string
      $main_concat .= "SUM(d$i) as d$i";
      $str_concat .= "IF (DAY(date_paid) = $i, SUM(total_cost), 0) AS d$i ";
      $order_concat .= "d$i ASC ";
    }
  }


  $qry = "SELECT $main_concat FROM (
    SELECT
    $str_concat
    FROM tbl_appointment_payment
    WHERE 1=1 $added_filter
    GROUP BY DAY(date_paid)
    ORDER BY $order_concat) as tbl";

  $result = $conn->query($qry);

  if ($result->num_rows > 0) {
    $data = [];
    while ($row = $result->fetch_assoc()) {
      $data[] = [
        // 'service_title' => $row['service_title'],
        'd1' => number_format($row['d1'], 2, '.', ''),
        'd2' => number_format($row['d2'], 2, '.', ''),
        'd3' => number_format($row['d3'], 2, '.', ''),
        'd4' => number_format($row['d4'], 2, '.', ''),
        'd5' => number_format($row['d5'], 2, '.', ''),
        'd6' => number_format($row['d6'], 2, '.', ''),
        'd7' => number_format($row['d7'], 2, '.', ''),
        'd8' => number_format($row['d8'], 2, '.', ''),
        'd9' => number_format($row['d9'], 2, '.', ''),
        'd10' => number_format($row['d10'], 2, '.', ''),
        'd11' => number_format($row['d11'], 2, '.', ''),
        'd12' => number_format($row['d12'], 2, '.', ''),
        'd13' => number_format($row['d13'], 2, '.', ''),
        'd14' => number_format($row['d14'], 2, '.', ''),
        'd15' => number_format($row['d15'], 2, '.', ''),
        'd16' => number_format($row['d16'], 2, '.', ''),
        'd17' => number_format($row['d17'], 2, '.', ''),
        'd18' => number_format($row['d18'], 2, '.', ''),
        'd19' => number_format($row['d19'], 2, '.', ''),
        'd20' => number_format($row['d20'], 2, '.', ''),
        'd21' => number_format($row['d21'], 2, '.', ''),
        'd22' => number_format($row['d22'], 2, '.', ''),
        'd23' => number_format($row['d23'], 2, '.', ''),
        'd24' => number_format($row['d24'], 2, '.', ''),
        'd25' => number_format($row['d25'], 2, '.', ''),
        'd26' => number_format($row['d26'], 2, '.', ''),
        'd27' => number_format($row['d27'], 2, '.', ''),
        'd28' => number_format($row['d28'], 2, '.', ''),
        'd29' => number_format($row['d29'], 2, '.', ''),
        'd30' => number_format($row['d30'], 2, '.', ''),
        'd31' => isset($row['d31']) ? number_format($row['d31'], 2, '.', '') : 0,
      ];
    }

    return $data;
  } else {
    return [];
  }
}

function loadYearlyIncome($conn, $year)
{
  $today_year = $year != '' ? $year : date('Y');
  $added_filter = '';

  $added_filter .= " AND YEAR(date_paid) = '$today_year'";

  $qry = "SELECT SUM(jan) as jan, SUM(feb) as feb,
    SUM(mar) as mar, SUM(apr) as apr, SUM(may) as may, 
    SUM(jun) as jun, SUM(jul) as jul, SUM(aug) as aug, 
    SUM(sep) as sep, SUM(oct) as oct, SUM(nov) as nov, SUM(dece)as dece
    FROM (
      SELECT DATE_FORMAT(date_paid, '%b') AS month_name,
      IF (MONTH(date_paid) = 1, SUM(total_cost), 0) AS jan,
      IF (MONTH(date_paid) = 2, SUM(total_cost), 0) AS feb,
      IF (MONTH(date_paid) = 3, SUM(total_cost), 0) AS mar,
      IF (MONTH(date_paid) = 4, SUM(total_cost), 0) AS apr,
      IF (MONTH(date_paid) = 5, SUM(total_cost), 0) AS may,
      IF (MONTH(date_paid) = 6, SUM(total_cost), 0) AS jun,
      IF (MONTH(date_paid) = 7, SUM(total_cost), 0) AS jul,
      IF (MONTH(date_paid) = 8, SUM(total_cost), 0) AS aug,
      IF (MONTH(date_paid) = 9, SUM(total_cost), 0) AS sep,
      IF (MONTH(date_paid) = 10, SUM(total_cost), 0) AS oct,
      IF (MONTH(date_paid) = 11, SUM(total_cost), 0) AS nov,
      IF (MONTH(date_paid) = 12, SUM(total_cost), 0) AS dece
      FROM tbl_appointment_payment
      WHERE 1=1 $added_filter
      GROUP BY MONTH(date_paid)
      ORDER BY MONTH(date_paid)
    ) AS tbl";

  $result = $conn->query($qry);

  if ($result->num_rows > 0) {
    $data = [];
    while ($row = $result->fetch_assoc()) {
      $data[] = [
        'jan' => $row['jan'] ? number_format($row['jan'], 2, '.', '') : 0,
        'feb' => $row['feb'] ? number_format($row['feb'], 2, '.', '') : 0,
        'mar' => $row['mar'] ? number_format($row['mar'], 2, '.', '') : 0,
        'apr' => $row['apr'] ? number_format($row['apr'], 2, '.', '') : 0,
        'may' => $row['may'] ? number_format($row['may'], 2, '.', '') : 0,
        'jun' => $row['jun'] ? number_format($row['jun'], 2, '.', '') : 0,
        'jul' => $row['jul'] ? number_format($row['jul'], 2, '.', '') : 0,
        'aug' => $row['aug'] ? number_format($row['aug'], 2, '.', '') : 0,
        'sep' => $row['sep'] ? number_format($row['sep'], 2, '.', '') : 0,
        'oct' => $row['oct'] ? number_format($row['oct'], 2, '.', '') : 0,
        'nov' => $row['nov'] ? number_format($row['nov'], 2, '.', '') : 0,
        'dece' => $row['dece'] ? number_format($row['dece'], 2, '.', '') : 0,
      ];
    }

    return $data;
  } else {
    return [];
  }
}

function loadMonthlypregnantStatus($conn, $month)
{
  // $today_month = $month != '' ? $month : date('m');
  // $added_filter = '';
  // $added_filter .= " AND MONTH(date_paid) = $today_month";

  // $qry = "SELECT COUNT(pregnant_status) AS total_pregnant 
  // FROM tbl_appointment_payment
  // WHERE pregnant_status = 'Not Pregnant' $added_filter
  // UNION ALL
  // SELECT COUNT(pregnant_status) AS total_pregnant
  // FROM tbl_appointment_payment
  // WHERE pregnant_status <> 'Not Pregnant' $added_filter";

  $today_month = $month != '' ? $month : date('m');
  // get number of days in today month
  $num_day_month = cal_days_in_month(CAL_GREGORIAN, date('m'), date('Y'));
  $added_filter = '';
  $added_filter .= " AND MONTH(date_paid) = $today_month";

  $main_concat = '';
  $str_concat = '';
  $str_concat1 = '';
  $order_concat = '';

  for ($i = 1; $i <= $num_day_month; $i++) {
    // if i not equal sa number ng araw ngayong buwan
    // cocompute lang tas i aapend lang yung string para maging 
    // sql query may comma sa dulo
    if ($i != $num_day_month) {
      $main_concat .= "SUM(d$i) as d$i,";
      $str_concat .= "IF (DAY(date_paid) = $i, COUNT(is_pregnant), 0) AS d$i, ";
      $str_concat1 .= "IF (DAY(date_paid) = $i, COUNT(is_pregnant), 0) AS d$i, ";
      $order_concat .= "d$i ASC, ";
    } else {
      // eto naman pag yung i at last day ay equal
      // same lang naman ginagawa pero 
      // inalis lang yung comma sa dulo ng string
      $main_concat .= "SUM(d$i) as d$i";
      $str_concat .= "IF (DAY(date_paid) = $i, COUNT(is_pregnant), 0) AS d$i ";
      $str_concat1 .= "IF (DAY(date_paid) = $i, COUNT(is_pregnant), 0) AS d$i ";
      $order_concat .= "d$i ASC ";
    }
  }


  $qry = "SELECT pregnant_status, is_pregnant, $main_concat FROM (
    SELECT 'Not Pregnant' as pregnant_status, is_pregnant, 
    $str_concat
    FROM tbl_appointment_payment
    WHERE is_pregnant = 0 $added_filter
    GROUP BY DAY(date_paid)
    UNION ALL
    SELECT 'Pregnant' as pregnant_status, is_pregnant, 
    $str_concat1
    FROM tbl_appointment_payment
    WHERE is_pregnant = 1 $added_filter
    GROUP BY DAY(date_paid)
    ORDER BY $order_concat) as tbl 
    GROUP BY tbl.is_pregnant";

  $result = $conn->query($qry);

  if ($result->num_rows > 0) {
    $data = [];
    while ($row = $result->fetch_assoc()) {
      $data[] = [
        'pregnant_status' => $row['pregnant_status'],
        'd1' => number_format($row['d1'], 2, '.', ''),
        'd2' => number_format($row['d2'], 2, '.', ''),
        'd3' => number_format($row['d3'], 2, '.', ''),
        'd4' => number_format($row['d4'], 2, '.', ''),
        'd5' => number_format($row['d5'], 2, '.', ''),
        'd6' => number_format($row['d6'], 2, '.', ''),
        'd7' => number_format($row['d7'], 2, '.', ''),
        'd8' => number_format($row['d8'], 2, '.', ''),
        'd9' => number_format($row['d9'], 2, '.', ''),
        'd10' => number_format($row['d10'], 2, '.', ''),
        'd11' => number_format($row['d11'], 2, '.', ''),
        'd12' => number_format($row['d12'], 2, '.', ''),
        'd13' => number_format($row['d13'], 2, '.', ''),
        'd14' => number_format($row['d14'], 2, '.', ''),
        'd15' => number_format($row['d15'], 2, '.', ''),
        'd16' => number_format($row['d16'], 2, '.', ''),
        'd17' => number_format($row['d17'], 2, '.', ''),
        'd18' => number_format($row['d18'], 2, '.', ''),
        'd19' => number_format($row['d19'], 2, '.', ''),
        'd20' => number_format($row['d20'], 2, '.', ''),
        'd21' => number_format($row['d21'], 2, '.', ''),
        'd22' => number_format($row['d22'], 2, '.', ''),
        'd23' => number_format($row['d23'], 2, '.', ''),
        'd24' => number_format($row['d24'], 2, '.', ''),
        'd25' => number_format($row['d25'], 2, '.', ''),
        'd26' => number_format($row['d26'], 2, '.', ''),
        'd27' => number_format($row['d27'], 2, '.', ''),
        'd28' => number_format($row['d28'], 2, '.', ''),
        'd29' => number_format($row['d29'], 2, '.', ''),
        'd30' => number_format($row['d30'], 2, '.', ''),
        'd31' => isset($row['d31']) ? number_format($row['d31'], 2, '.', '') : 0,
      ];
    }

    return $data;
  } else {
    return [];
  }
}
