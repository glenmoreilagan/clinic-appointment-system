<?php
include './host_setting.php';

session_start();
session_destroy();

$default_url = '/caps';

if ($is_online) {
  $default_url = '/';
}

header("Location: $default_url");
