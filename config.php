<?php 

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "ljcura_clinic";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if (!$conn) {
    die("<script>alert('Connection Failed.'</script>");
}

?>