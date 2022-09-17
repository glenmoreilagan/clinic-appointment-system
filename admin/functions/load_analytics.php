<?php

use Mpdf\Tag\B;

include_once '../../config.php';

$action = $_POST['action'];

switch ($action) {
  default:
    $data_loadServicePercentage = loadServicePercentage($conn);
    $data_loadAppointmentMonthlyStatus = loadAppointmentMonthlyStatus($conn);
    $data_loadServicesChart = loadServicesChart($conn);

    echo json_encode([
      'data_loadServicePercentage' => $data_loadServicePercentage,
      'data_loadAppointmentMonthlyStatus' => $data_loadAppointmentMonthlyStatus,
      'data_loadServicesChart' => $data_loadServicesChart,
    ]);
    break;
}


function loadServicePercentage($conn)
{
  $qry = "SELECT COUNT(service_id) as total_service_count
    FROM tbl_appointments
    WHERE service_id <> 0
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

function loadAppointmentMonthlyStatus($conn)
{
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
      WHERE STATUS = 0 AND is_cancelled = 0
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
      WHERE STATUS = 1 AND is_cancelled = 0
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
      WHERE STATUS IN (0, 1) AND is_cancelled = 1
      GROUP BY MONTH(date_schedule)
      ORDER BY MONTH(date_schedule)
    ) AS tbl";

  $result = $conn->query($qry);

  if ($result->num_rows > 0) {
    $data = [];
    while ($row = $result->fetch_assoc()) {
      $data[] = [
        'status' => $row['status'],
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

function loadServicesChart($conn)
{
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
