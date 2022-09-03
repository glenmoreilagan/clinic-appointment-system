<?php
session_start();

if (empty($_SESSION)) {
  header("Location: ../");
} else {
  if ($_SESSION['role'] == 0) {
    header("Location: ../../user/dashboard/");
  }
}
