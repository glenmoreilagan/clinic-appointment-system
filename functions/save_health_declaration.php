<?php
include '../config.php';

$name = mysqli_escape_string($conn, $_POST['name']);
$address = mysqli_escape_string($conn, $_POST['address']);
$is_patient = mysqli_escape_string($conn, $_POST['is_patient']);
$is_fever = mysqli_escape_string($conn, $_POST['is_fever']);
$is_cough = mysqli_escape_string($conn, $_POST['is_cough']);
$is_loss_smell = mysqli_escape_string($conn, $_POST['is_loss_smell']);
$is_short_breath = mysqli_escape_string($conn, $_POST['is_short_breath']);
$is_sore_throat = mysqli_escape_string($conn, $_POST['is_sore_throat']);
$is_body_pain = mysqli_escape_string($conn, $_POST['is_body_pain']);
$is_headache = mysqli_escape_string($conn, $_POST['is_headache']);
$is_fam_covid = mysqli_escape_string($conn, $_POST['is_fam_covid']);
$is_contact_covid = mysqli_escape_string($conn, $_POST['is_contact_covid']);
$is_travelled_outside = mysqli_escape_string($conn, $_POST['is_travelled_outside']);

$qry = "INSERT INTO tbl_health_declaration
(name, address, is_patient, is_fever, is_cough, is_loss_smell, is_short_breath, is_sore_throat, is_body_pain, is_headache, is_fam_covid, is_contact_covid, is_travelled_outside)
VALUES 
('$name', '$address', '$is_patient', '$is_fever', '$is_cough', '$is_loss_smell', '$is_short_breath', '$is_sore_throat', '$is_body_pain', '$is_headache', '$is_fam_covid', '$is_contact_covid', '$is_travelled_outside')";

$result = $conn->query($qry);

if ($result) {
  echo json_encode(['status' => true, 'msg' => 'Saving Success!']);
} else {
  echo json_encode(['status' => false, 'msg' => 'Saving Failed!']);
}
