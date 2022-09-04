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

  <link rel="shortcut icon" href="../../image/favicon.png">

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
    .btnApprove,
    .btnReject {
      /* text-align: left; */
      width: 90px !important;
    }

    .completed {
      background: #FF6699;
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
          <div class="row mb-2 mb-xl-3">
            <div class="col-auto d-none d-sm-block">
              <h3>Appointments</h3>
            </div>

            <div class="col-auto ml-auto text-right mt-n1">
              <span class="dropdown mr-2">
                <button class="btn btn-light bg-white shadow-sm dropdown-toggle" id="day" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  <i class="align-middle mt-n1" data-feather="search"></i> Select Filter
                </button>
                <div class="dropdown-menu">
                  <!-- <h6 class="dropdown-header">Settings</h6> -->
                  <a class="dropdown-item filterMe" data-filter='pending'>Pending</a>
                  <a class="dropdown-item filterMe" data-filter='approved'>Approved</a>
                  <a class="dropdown-item filterMe" data-filter='completed'>Completed</a>
                  <a class="dropdown-item filterMe" data-filter='cancelled'>Cancelled</a>
                  <!-- <div class="dropdown-divider"></div>
                  <a class="dropdown-item" href="#">Separated link</a> -->
                </div>
              </span>

              <!-- <button class="btn btn-primary shadow-sm">
                <i class="align-middle" data-feather="filter">&nbsp;</i>
              </button> -->
              <button class="btn btn-primary shadow-sm refresh" title="Reset/Refresh">
                <i class="align-middle" data-feather="refresh-cw">&nbsp;</i>
              </button>
            </div>
          </div>

          <div class="card mb-3">
            <!-- <div class="card-header">
            </div> -->
            <div class="card-body">
              <div class="table-responsive div-table-appointments">
                <table class="table table-striped table-hover table-appointments" id="table-appointments" style="width: 100%;">
                  <thead>
                    <tr>
                      <th>Customer</th>
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
  <?php include_once '../modals/reject_appointment_modal.php'; ?>
</body>

</html>
<script src="../assets/js/app.js"></script>
<script src="../../assets/toastr/toastr.js"></script>
<script src="../../assets/toastr/toastr-customize.js"></script>

<script>
  $(document).ready(function() {
    let appointment_id = 0;
    let filter_status = 'all';

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
    const load_appointments = (status = 'all') => {
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
            let status_badge = '';

            switch (res.data[i].status) {
              case 'Approved':
                status_badge = `<span class="badge badge-primary">${res.data[i].status}</span>`;
                break;
              case 'Completed':
                status_badge = `<span class="badge badge-secondary completed">${res.data[i].status}</span>`;
                break;
              case 'Cancelled':
                status_badge = `<span class="badge badge-danger">${res.data[i].status}</span>`;
                break;
              default:
                status_badge = `<span class="badge badge-success">${res.data[i].status}</span>`;
                break;
            }

            let action_buttons =
              res.data[i].status === 'Pending' ?
              `<tr>
                <td>
                  <button class="btn btn-primary btn-sm btnApprove" id="r-${res.data[i].id}"><i class="align-middle fas fa-fw fa-check"></i> Approve</button>
                  <button class="btn btn-danger btn-sm btnReject" id="r-${res.data[i].id}"><i class="align-middle fas fa-fw fa-times"></i> Reject</button>
                </td>
              </tr>` :
              (res.data[i].status === 'Approved' ?
                `<tr>
                <td>
                  <button class="btn btn-warning btn-sm btnUpdate" id="r-${res.data[i].id}"><i class="align-middle fas fa-fw fa-check"></i> Update</button>
                </td>
              </tr>` : ``)

            ready_data.push([
              res.data[i].complaint,
              `
                <b>${res.data[i].time_schedule}</b>
                <br>
                ${res.data[i].date_schedule}
              `,
              res.data[i].complaint,
              res.data[i].service_title,
              status_badge,
              action_buttons,
            ]);
          }
          tbl_services.clear().rows.add(ready_data).draw();
          // $("#myappointment_list").html(str);
        }
      });
    }

    const update_appointments = (action, appointment_id) => {
      $.ajax({
        method: 'POST',
        url: '../functions/approve_or_reject_appointment.php',
        dataType: 'JSON',
        data: {
          action: action,
          appointment_id: appointment_id,
          remarks: $("textarea[name='remarks']").val()
        },
        success: function(res) {
          // console.log(res);
          if (res.status) {
            appointment_id = 0;

            toastr.success(res.msg);
            load_appointments(filter_status);
          }
        }
      });
    }

    $(".table-appointments").on("click", ".btnApprove", function(e) {
      e.preventDefault();

      appointment_id = $(this).attr('id').split('-')[1];

      if (confirm("Are you sure to approve?") == true) {
        update_appointments('approve', appointment_id);
      }
    });

    $(".table-appointments").on("click", ".btnReject", function(e) {
      e.preventDefault();

      appointment_id = $(this).attr('id').split('-')[1];

      $(".form-input").val('');
      $(".modal-title").text('Reject Appointment');
      $("#reject_appointment_modal").modal('show');
    });

    $("#reject_appointment_modal").on("click", "#btnReject", function(e) {
      e.preventDefault();

      update_appointments('reject', appointment_id);
      $("#reject_appointment_modal").modal('hide');
    });

    $(".refresh").click(function(e) {
      e.preventDefault();
      filter_status = 'all';

      load_appointments(filter_status);
    });

    $(".filterMe").click(function(e) {
      e.preventDefault();
      let filter = $(this).data('filter');

      filter_status = filter;
      load_appointments(filter);
    });

    load_appointments(filter_status);
  });
</script>