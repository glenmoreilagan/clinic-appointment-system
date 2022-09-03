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

  <link rel="canonical" href="calendar.html" />
  <link rel="shortcut icon" href="img/favicon.ico">

  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500&amp;display=swap" rel="stylesheet">

  <!-- Choose your prefered color scheme -->
  <!-- <link href="css/light.css" rel="stylesheet"> -->
  <!-- <link href="css/dark.css" rel="stylesheet"> -->

  <!-- BEGIN SETTINGS -->
  <!-- Remove this after purchasing -->
  <link class="js-stylesheet" href="../assets/css/light.css" rel="stylesheet">
  <link class="js-stylesheet" href="../assets/css/forms.css" rel="stylesheet">
  <link rel="stylesheet" href="../../assets/toastr/build/toastr.min.css">
  <!-- <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.12.1/css/jquery.dataTables.css">
  <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.js"></script> -->
  <style>
    .btnEdit,
    .btnDelete {
      /* text-align: left; */
      width: 90px !important;
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
          <h1 class="h3 mb-3">Appointments</h1>

          <div class="card mb-3">
            <div class="card-header">
              <button class="btn btn-primary btn-sm" id="btnNewAppointments"><i class="align-middle fas fa-fw fa-plus"></i> New Appointments</button>
            </div>
            <div class="card-body">
              <div class="table-responsive div-table-appointments">
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
                  <tbody id="appointments_list"></tbody>
                </table>
              </div>
            </div>
          </div>

        </div>
      </main>
    </div>
  </div>

  <!-- MODALS -->
  <?php include_once '../modals/schedule_modal.php'; ?>
</body>

</html>
<script src="../assets/js/app.js"></script>
<script src="../../assets/toastr/toastr.js"></script>
<script src="../../assets/toastr/toastr-customize.js"></script>

<script>
  $(document).ready(function() {
    let appointment_id = 0;

    let tbl_services = $('#table-appointments').DataTable({
      "responsive": true,
      "dom": '<"top"f>rt<"bottom"ip><"clear">',
      "pageLength": 10,
      "scrollY": "20em",
      "scrollX": true,
      "scrollCollapse": true,
      "fixedHeader": true,
      "ordering": false,
    });
    const load_appointments = (status = 0) => {
      $.ajax({
        method: 'POST',
        url: '../functions/load_appointments.php',
        dataType: 'JSON',
        data: {
          status: status
        },
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
                  <button class="btn btn-primary btn-sm btnEdit" id="r-${res.data[i].id}"><i class="align-middle fas fa-fw fa-check"></i> Approve</button>
                  <button class="btn btn-danger btn-sm btnDelete" id="r-${res.data[i].id}"><i class="align-middle fas fa-fw fa-times"></i> Reject</button>
                </td>
              </tr>`,
            ]);
          }
          tbl_services.clear().rows.add(ready_data).draw();
          // $("#myappointment_list").html(str);
        }
      });
    }

    const edit_appointments = (appointment_id) => {
      $.ajax({
        method: 'POST',
        url: '../functions/load_schedules.php',
        dataType: 'JSON',
        data: {
          appointment_id: appointment_id
        },
        success: function(res) {
          // console.log(res);
          if (res.status) {
            let result = res.data[0];
            let date_schedule = result.date_schedule;
            let time_schedule = result.time_schedule;

            $("input[name='date_schedule']").val(date_schedule);
            $("input[name='time_schedule']").val(time_schedule);

            $(".modal-title").text('Edit Appointment');
            $("#schedule_modal").modal('show');
          }
        }
      });
    }

    const save_appointments = (data_input) => {
      $.ajax({
        method: 'POST',
        url: '../functions/save_schedule.php',
        dataType: 'JSON',
        data: data_input,
        success: function(res) {
          // console.log(res);
          if (res.status) {
            if (data_input.appointment_id != 0) {
              $("#schedule_modal").modal('hide');
            }
            toastr.success(res.msg);
            $(".form-input").val('');

            load_schedules();
          }
        }
      });
    }

    const delete_appointments = (appointment_id) => {
      $.ajax({
        method: 'POST',
        url: '../functions/delete_schedule.php',
        dataType: 'JSON',
        data: {
          appointment_id: appointment_id
        },
        success: function(res) {
          // console.log(res);
          if (res.status) {
            toastr.success(res.msg);
            load_schedules();
          }
        }
      });
    }

    $("#btnNewAppointments").click(function(e) {
      e.preventDefault();

      appointment_id = 0;

      $(".form-input").val('');
      $(".modal-title").text('New Appointment');
      $("#schedule_modal").modal('show');
    });

    $(".table-appointments").on("click", ".btnEdit", function(e) {
      e.preventDefault();

      appointment_id = $(this).attr('id').split('-')[1];
      edit_appointments(appointment_id);
    });

    $(".table-appointments").on("click", ".btnDelete", function(e) {
      e.preventDefault();

      appointment_id = $(this).attr('id').split('-')[1];

      if (confirm("Are your sure to delete this service?") == true) {
        delete_appointments(appointment_id);
      }
    });

    $("#btnSaveSchedule").click(function(e) {
      e.preventDefault();

      let date_schedule = $("input[name='date_schedule']").val();
      let time_schedule = $("input[name='time_schedule']").val();

      let data_input = {
        appointment_id: appointment_id,
        date_schedule: date_schedule,
        time_schedule: time_schedule
      }

      if (data_input.date_schedule == "") {
        toastr.error('Please input Date.');
        return;
      };

      if (data_input.time_schedule == "") {
        toastr.error('Please input Time.');
        return;
      };

      save_appointments(data_input);
    });

    load_appointments();
  });
</script>