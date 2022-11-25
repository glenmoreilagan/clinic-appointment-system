<?php
include_once '../../config.php';

$added_filter = '';

$status = $_POST['status'];

if ($status == 'all') {
  $qry = "SELECT cust.id, cust.fullname, cust.address, cust.contactno, cust.email,
  appointment.complaint, appointment.age, 
  DATE_FORMAT(appointment.date_schedule, '%b %d %Y') as date_schedule, 
  TIME_FORMAT(appointment.date_schedule, '%I:%i %p') as time_schedule, 
  service.service_title, service.description,
  payment.total_cost
  FROM tbl_user AS cust
  INNER JOIN tbl_appointments AS appointment ON appointment.user_id = cust.id
  INNER JOIN tbl_services AS service ON service.id = appointment.service_id
  INNER JOIN tbl_appointment_payment AS payment ON payment.user_id = appointment.user_id AND payment.appointment_id = appointment.id
  WHERE appointment.status = 1 AND appointment.is_completed = 1
  GROUP BY cust.id
  $added_filter";

  $result = $conn->query($qry);

  if ($result->num_rows > 0) {
    $data = [];
    while ($row = $result->fetch_assoc()) {
      $data[] = [
        'id' => $row['id'],
        'fullname' => $row['fullname'],
        'address' => $row['address'],
        'contactno' => $row['contactno'],
        'email' => $row['email'],
        'total_cost' => $row['total_cost'],
      ];
    }

    echo json_encode(['status' => true, 'msg' => 'Fetching Success!', 'data' => $data]);
  } else {
    echo json_encode(['status' => false, 'msg' => 'Fetching Failed!', 'data' => []]);
  }
} else {
  $patient_id = $_POST['patient_id'];

  $qry = "SELECT cust.id, cust.fullname, cust.address, cust.contactno, cust.email,
  appointment.complaint, appointment.age, 
  DATE_FORMAT(appointment.date_schedule, '%b %d %Y') as date_schedule, 
  TIME_FORMAT(appointment.date_schedule, '%I:%i %p') as time_schedule, 
  service.service_title, service.description,
  IFNULL(payment.findings, '') as findings,
  payment.total_cost
  FROM tbl_user AS cust
  INNER JOIN tbl_appointments AS appointment ON appointment.user_id = cust.id
  INNER JOIN tbl_services AS service ON service.id = appointment.service_id
  INNER JOIN tbl_appointment_payment AS payment ON payment.user_id = appointment.user_id AND payment.appointment_id = appointment.id
  WHERE appointment.status = 1 AND appointment.is_completed = 1 AND cust.id = '$patient_id'
  $added_filter";

  $result = $conn->query($qry);

  if ($result->num_rows > 0) {
    $data = [];
    while ($row = $result->fetch_assoc()) {
      $data[] = [
        'id' => $row['id'],
        'fullname' => $row['fullname'],
        'age' => $row['age'],
        'address' => $row['address'],
        'contactno' => $row['contactno'],
        'email' => $row['email'],
        'complaint' => $row['complaint'],
        'findings' => $row['findings'],
        'date_schedule' => $row['date_schedule'],
        'time_schedule' => $row['time_schedule'],
        'service_title' => $row['service_title'],
        'description' => $row['description'],
        'total_cost' => number_format($row['total_cost'], 2),
      ];
    }

    echo json_encode(['status' => true, 'msg' => 'Fetching Success!', 'data' => $data]);
  } else {
    echo json_encode(['status' => false, 'msg' => 'Fetching Failed!', 'data' => []]);
  }
}