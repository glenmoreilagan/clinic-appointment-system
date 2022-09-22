<?php
include_once '../../config.php';
session_start();

$qry = "SELECT periodcal.id, periodcal.user_id, periodcal.title, 
  periodcal.description, periodcal.start, periodcal.end,
  user.fullname
  FROM tbl_period_calendar as periodcal
  INNER JOIN tbl_user as user on user.id = periodcal.user_id
  order by periodcal.id DESC";

$result = $conn->query($qry);

if ($result->num_rows > 0) {
  $data = [];
  $colors = [
    '#3788D8', '#F25C80', '#293042', '#2A9D8F', '#E9C46A', '#F4A261', '#E76F51', 
    '#283618', '#2f3e46', '#6d597a', '#540b0e', '#87bba2', '#3b6064', '#ffb600',
    '#997b66', '#b58463', '#d08c60', '#e8ac65', '#ffcb69', '#d9ae94', '#baa587'
  ];

  while ($row = $result->fetch_assoc()) {
    $data[] = [
      'id' => $row['id'],
      'user_id' => $row['user_id'],
      'fullname' => $row['fullname'],
      'title' => $row['fullname'] . ' - ' . $row['title'],
      'description' => $row['title'],
      'start' => $row['start'],
      'end' => $row['end'],
      'color' => $colors[rand(0, count($colors) - 1)],
    ];
  }

  echo json_encode($data);
} else {
  echo json_encode([]);
}
