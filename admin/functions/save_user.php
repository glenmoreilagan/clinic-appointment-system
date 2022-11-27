<?php
include_once '../../config.php';
session_start();

$user_id = $_POST['user_id'];
$fname = isset($_POST['fname']) ? mysqli_escape_string($conn, $_POST['fname']) : '';
$mname = isset($_POST['mname']) ? mysqli_escape_string($conn, $_POST['mname']) : '';
$lname = isset($_POST['lname']) ? mysqli_escape_string($conn, $_POST['lname']) : '';
$address = $_POST['address'] != 0 ? str_replace(",", "", $_POST['address']) : '';
$contactno = $_POST['contactno'] != 0 ? str_replace(",", "", $_POST['contactno']) : '';
$email = $_POST['email'] != 0 ? str_replace(",", "", $_POST['email']) : '';

$fullname = "$fname $mname $lname";

// update
$qry = "UPDATE tbl_user SET 
    fname = '$fname', mname = '$mname', lname = '$lname', fullname = '$fullname',
    address = '$address', contactno = '$contactno', email = '$email'
    WHERE id = '$user_id'
  ";

if ($conn->query($qry)) {
  echo json_encode(['status' => true, 'msg' => 'Saving Success!']);
} else {
  echo json_encode(['status' => false, 'msg' => 'Saving Failed!']);
}
