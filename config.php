<?php 

// $servername = "localhost";
// $username = "u354862903_caps";
// $password = "|q0sw2^W!ftZ";
// $dbname = "u354862903_db_lj_clinic";

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "db_lj_clinic";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if (!$conn) {
    die("<script>alert('Connection Failed.'</script>");
}

?>