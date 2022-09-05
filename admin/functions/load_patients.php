<?php
include_once '../../config.php';

$added_filter = '';

$status = $_POST['status'];

if ($status == 'all') {
  $qry = "SELECT cust.id, cust.fullname, cust.address, cust.contactno, cust.email
  FROM tbl_user AS cust
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
      ];
    }

    echo json_encode(['status' => true, 'msg' => 'Fetching Success!', 'data' => $data]);
  } else {
    echo json_encode(['status' => false, 'msg' => 'Fetching Failed!', 'data' => []]);
  }
} else {
  $qry = "SELECT cust.id, cust.fullname, cust.address, cust.contactno, cust.email,
  appointment.complaint,
  DATE_FORMAT(appointment.date_schedule, '%b %d %Y') as date_schedule, 
  TIME_FORMAT(appointment.date_schedule, '%I:%i %p') as time_schedule, 
  service.service_title, service.description
  FROM tbl_user AS cust
  INNER JOIN tbl_appointments AS appointment ON appointment.user_id = cust.id
  INNER JOIN tbl_services AS service ON service.id = appointment.service_id
  WHERE appointment.status = 1 AND appointment.is_completed = 1
  
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
        'complaint' => $row['complaint'],
        'date_schedule' => $row['date_schedule'],
        'time_schedule' => $row['time_schedule'],
        'service_title' => $row['service_title'],
        'description' => $row['description'],
      ];
    }

    echo json_encode(['status' => true, 'msg' => 'Fetching Success!', 'data' => $data]);
  } else {
    echo json_encode(['status' => false, 'msg' => 'Fetching Failed!', 'data' => []]);
  }
}
