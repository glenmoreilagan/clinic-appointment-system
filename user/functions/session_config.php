<?php
session_start();

if (empty($_SESSION)) {
  header("Location: ../../index.php");
} else {
  if ($_SESSION['role'] == 1) {
    header("Location: ../../admin/dashboard/");
  }
}
