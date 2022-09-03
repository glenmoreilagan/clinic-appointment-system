<?php
include_once '../functions/session_config.php';
?>
<!DOCTYPE html>
<html lang="en">


<!-- Mirrored from appstack.bootlab.io/calendar.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 04 Jan 2021 13:06:37 GMT -->
<!-- Added by HTTrack -->
<meta http-equiv="content-type" content="text/html;charset=UTF-8" /><!-- /Added by HTTrack -->

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="Responsive Bootstrap 4 Admin &amp; Dashboard Template">
  <meta name="author" content="Bootlab">

  <title>LJ CURA OB-GYN ULTRASOUND CLINIC</title>

  <link rel="shortcut icon" href="img/favicon.ico">

  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500&amp;display=swap" rel="stylesheet">
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

  <!-- Choose your prefered color scheme -->
  <!-- <link href="css/light.css" rel="stylesheet"> -->
  <!-- <link href="css/dark.css" rel="stylesheet"> -->

  <!-- BEGIN SETTINGS -->
  <!-- Remove this after purchasing -->
  <link class="js-stylesheet" href="../assets/css/light.css" rel="stylesheet">
  <link class="js-stylesheet" href="../assets/css/forms.css" rel="stylesheet">

  <style>
    .completed {
      background: #e56b6f;
    }
  </style>
</head>
<!--
  HOW TO USE: 
  data-theme: default (default), dark, light
  data-layout: fluid (default), boxed
  data-sidebar-position: left (default), right
  data-sidebar-behavior: sticky (default), fixed, compact
-->

<body data-theme="default" data-layout="fluid" data-sidebar-position="left" data-sidebar-behavior="sticky">
  <div class="wrapper">
    <!-- THIS IS FOR SIDEBAR NAVIGATION -->
    <?php include_once '../layouts/display_side_nav.php' ?>

    <div class="main">
      <!-- THIS IS FOR HEADER NAVIGATION BAR -->
      <?php include_once '../layouts/display_head_nav.php' ?>

      <main class="content">
        <div class="container-fluid p-0">
          <h1 class="h3 mb-3">My Appointments</h1>

          <div class="card mb-3">
            <div class="card-header">
              <!-- <button class="btn btn-primary btn-sm" data-toggle="modal" data-target="#newAppointment_modal">New Appointment</button> -->
              <?php
              // heres the settings for local or live
              include '../../host_setting.php';
              ?>
              <a class="btn btn-primary btn-sm" href=<?php echo $host . "user/dashboard"; ?>><i class="align-middle fas fa-fw fa-plus"></i> New Appointment</a>
            </div>
            <div class="card-body">
              <div class="table-responsive table-appointments">
                <table class="table table-striped table-hover table-appointments" id="table-appointments" style="width: 100%;">
                  <thead>
                    <tr>
                      <th>Date & Time</th>
                      <th>Chief Complaint</th>
                      <th>Service</th>
                      <th>Status</th>
                      <th class="th-actions">Action</th>
                    </tr>
                  </thead>
                  <tbody id="myappointment_list"></tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
      </main>
    </div>
  </div>

  <!-- MODALS -->
  <?php include_once '../modals/newAppointment_modal.php'; ?>
  <?php include_once '../modals/viewMyAppointment_modal.php'; ?>
</body>

</html>
<script src="../assets/js/app.js"></script>

<script>
  $(document).ready(function() {
    let tbl_services = $('#table-appointments').DataTable({
      "responsive": true,
      "dom": '<"top"f>rt<"bottom"ip><"clear">',
      "pageLength": 10,
      "scrollY": "20em",
      "scrollX": true,
      "scrollCollapse": true,
      "fixedHeader": true,
    });
    const load_appointments = () => {
      $.ajax({
        method: 'POST',
        url: '../functions/load_appointment.php',
        dataType: 'JSON',
        data: {},
        success: function(res) {
          // console.log(res);
          let str = ``;
          let ready_data = [];
          for (let i in res.data) {
            let status_badge =
              res.data[i].status === 'Pending' ?
              `<span class="badge badge-success">${res.data[i].status}</span>` :
              (res.data[i].status === 'Approved' ?
                `<span class="badge badge-primary">${res.data[i].status}</span>` :
                `<span class="badge badge-secondary completed">${res.data[i].status}</span>`)
            ready_data.push([
              `
                <b>${res.data[i].time_schedule}</b>
                <br>
                ${res.data[i].date_schedule}
              `,
              res.data[i].complaint,
              res.data[i].service_title,
              status_badge,
              `<tr>
                <td>
                  <button class="btn btn-primary btn-sm btnView" id="r-${res.data[i].id}"><i class="align-middle far fa-fw fa-eye"></i> View</button>
                </td>
              </tr>`,
            ]);
          }
          tbl_services.clear().rows.add(ready_data).draw();
          // $("#myappointment_list").html(str);
        }
      });
    }

    $('.table-appointments').on("click", ".btnView", function(e) {
      let appointment_id = $(this).attr('id').split('-')[1];

      $.ajax({
        method: 'POST',
        url: '../functions/load_appointment.php',
        dataType: 'JSON',
        data: {
          appointment_id: appointment_id
        },
        success: function(res) {
          // console.log(res.data[0]);
          let result = res.data[0];
          let complaint = result.complaint;
          let age = result.age;
          let date_schedule = result.date_schedule;
          let time_schedule = result.time_schedule;
          let service = result.service_title;
          let status_badge =
            result.status === 'Pending' ?
            `<span class="badge badge-success">${result.status}</span>` :
            (result.status === 'Approved' ?
              `<span class="badge badge-primary">${result.status}</span>` :
              `<span class="badge badge-secondary completed">${result.status}</span>`
            );

          $("#viewMyAppointment_modal #complaint").html(`${complaint}`);
          $("#viewMyAppointment_modal #age").html(`${age}`);
          $("#viewMyAppointment_modal #schedule").html(`${date_schedule} at ${time_schedule}`);
          $("#viewMyAppointment_modal #service").html(`${service}`);
          $("#viewMyAppointment_modal #status").html(`${status_badge}`);
        }
      });
      $("#viewMyAppointment_modal").modal('show');
    });

    load_appointments();
  });
</script>