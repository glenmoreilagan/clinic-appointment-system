<?php
session_start();

if (empty($_SESSION)) {
  header("Location: ../login.php");
} else {
  if ($_SESSION['role'] == 0) {
    header("Location: ../../user/dashboard/");
  }
}
