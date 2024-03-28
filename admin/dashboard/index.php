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

  <title>Dashboard</title>

  <link rel="shortcut icon" href="../../image/favicon.png">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.2/font/bootstrap-icons.css">
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500&amp;display=swap" rel="stylesheet">

  <!-- Choose your prefered color scheme -->
  <!-- <link href="css/light.css" rel="stylesheet"> -->
  <!-- <link href="css/dark.css" rel="stylesheet"> -->

  <!-- BEGIN SETTINGS -->
  <!-- Remove this after purchasing -->
  <link class="js-stylesheet" href="../assets/css/light.css" rel="stylesheet">
  <link class="js-stylesheet" href="../assets/css/forms.css" rel="stylesheet">
  <link rel="stylesheet" href="../../assets/toastr/build/toastr.min.css">

  <style>
    .cust_info {
      font-weight: 100;
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
    <nav id="sidebar" class="sidebar">
      <div class="sidebar-content js-simplebar">
        <a class="sidebar-brand" href="#">
          <span class="align-middle"><img width="215" height="60" src="../../image/addash.png" alt="LJ CURA OB-GYN ULTRA SOUND CLINIC"></span>
        </a>
        <?php
        // heres the settings for local or live
        include '../../host_setting.php';
        ?>
        <ul class="sidebar-nav">
          <li class="sidebar-item active">
            <a class="sidebar-link" href=<?php echo $host . "admin/dashboard/"; ?>>
              <i class="align-middle" data-feather="sliders"></i> <span class=" align-middle">Dashboard</span>
            </a>
          </li>
          <li class="sidebar-item">
            <a class="sidebar-link" href=<?php echo $host . "admin/appointments/"; ?>>
              <i class="align-middle fas fa-fw fa-clipboard-list"></i> <span class="align-middle">Appointments</span>
            </a>
          </li>
          <li class="sidebar-item">
            <a class="sidebar-link" href=<?php echo $host . "admin/schedules/"; ?>>
              <i class="align-middle far fa-fw fa-calendar-plus"></i> <span class="align-middle">Schedules</span>
            </a>
          </li>
          <li class="sidebar-item">
            <a class="sidebar-link" href=<?php echo $host . "admin/patients/"; ?>>
              <i class="align-middle fas fa-fw fa-user-check"></i> <span class="align-middle">Patients</span>
            </a>
          </li>
          <li class="sidebar-item">
            <a class="sidebar-link" href=<?php echo $host . "admin/announcements/"; ?>>
              <i class="align-middle bi bi-megaphone"></i> <span class="align-middle">Announcements</span>
            </a>
          </li>
          <li class="sidebar-item">
            <a class="sidebar-link" href=<?php echo $host . "admin/services/"; ?>>
              <i class="align-middle bi bi-ui-checks"></i> <span class="align-middle">Services</span>
            </a>
          </li>
          <li class="sidebar-item">
            <a class="sidebar-link" href=<?php echo $host . "admin/analytics/"; ?>>
              <i class="align-middle fas fa-fw fa-chart-line"></i> <span class="align-middle">Analytics</span>
            </a>
          </li>
          <li class="sidebar-item">
            <a class="sidebar-link" href=<?php echo $host . "admin/periodcalendar/"; ?>>
              <i class="align-middle far fa-fw fa-calendar-alt"></i> <span class="align-middle">Period
                Calendar</span>
            </a>
          </li>
          <li class="sidebar-item">
            <a class="sidebar-link" href=<?php echo $host . "admin/health-declaration/"; ?>>
              <i class="align-middle fas fa-fw fa-hand-holding-heart"></i> <span class="align-middle">Health Declaration</span>
            </a>
          </li>
          <li class="sidebar-item">
            <a class="sidebar-link" href=<?php echo $host . "admin/users/"; ?>>
              <i class="align-middle fas fa-fw fa-users"></i> <span class="align-middle">Users</span>
            </a>
          </li>
          <li class="sidebar-item">
            <a class="sidebar-link" href=<?php echo $host . "admin/reports/"; ?>>
              <i class="align-middle fas fa-fw fa-receipt"></i> <span class="align-middle">Reports</span>
            </a>
          </li>

        </ul>
      </div>
    </nav>

    <div class="main">
      <!-- THIS IS FOR HEADER NAVIGATION BAR -->
      <?php include_once '../layouts/display_head_nav.php' ?>

      <main class="content">
        <div class="container-fluid p-0">
          <div class="row mb-2 mb-xl-3">
            <div class="col-auto d-none d-sm-block">
              <h1 class="h3">Dashboard</h1>
            </div>

            <div class="col-auto ml-auto text-right mt-n1">
              <button class="btn btn-primary shadow-sm refresh" title="Reset/Refresh">
                <i class="align-middle" data-feather="refresh-cw">&nbsp;</i>
              </button>
            </div>
          </div>

          <div class="card mb-3">
            <div class="card-body mt-3">
              <div class="row">
                <div class="col-12 col-sm-3 col-xxl d-flex">
                  <div class="card card-custom flex-fill">
                    <div class="card-body py-4">
                      <div class="media">
                        <div class="media-body">
                          <h1 class="mb-2" id="summ_pending"></h1>
                          <p class="mb-2">Pending Appointments</p>
                        </div>
                        <div class="d-inline-block ml-3">
                          <div class="stat">
                            <i class="align-middle text-success" data-feather="list"></i>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="col-12 col-sm-3 col-xxl d-flex">
                  <div class="card card-custom flex-fill">
                    <div class="card-body py-4">
                      <div class="media">
                        <div class="media-body">
                          <h1 class="mb-2" id="summ_confirmed"></h1>
                          <p class="mb-2">Confirmed Appointments</p>
                        </div>
                        <div class="d-inline-block ml-3">
                          <div class="stat">
                            <i class="align-middle text-success" data-feather="info"></i>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="col-12 col-sm-3 col-xxl d-flex">
                  <div class="card card-custom flex-fill">
                    <div class="card-body py-4">
                      <div class="media">
                        <div class="media-body">
                          <h1 class="mb-2" id="summ_completed"></h1>
                          <p class="mb-2">Completed Appointments</p>
                        </div>
                        <div class="d-inline-block ml-3">
                          <div class="stat">
                            <i class="align-middle text-success" data-feather="check"></i>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="col-12 col-sm-3 col-xxl d-flex">
                  <div class="card card-custom flex-fill">
                    <div class="card-body py-4">
                      <div class="media">
                        <div class="media-body">
                          <h1 class="mb-2" id="summ_cancelled"></h1>
                          <p class="mb-2">Rejected/Cancelled Appointments</p>
                        </div>
                        <div class="d-inline-block ml-3">
                          <div class="stat">
                            <i class="align-middle text-success" data-feather="slash"></i>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>

          <div class="card mb-3">
            <div class="card-body">
              <div class="row mb-2 mb-xl-3">
                <div class="col-auto d-none d-sm-block">
                  <h3>Today's Appointments</h3>
                </div>

                <div class="col-auto ml-auto text-right mt-n1">
                  <button class="btn btn-primary shadow-sm refresh" title="Reset/Refresh">
                    <i class="align-middle" data-feather="refresh-cw">&nbsp;</i>
                  </button>
                </div>
              </div>
              <div class="table-responsive div-table-appointments">
                <table class="table table-striped table-hover table-appointments" id="table-appointments" style="width: 100%;">
                  <thead>
                    <tr>
                      <th>Patient</th>
                      <!-- <th>Age</th> -->
                      <!-- <th>Address</th> -->
                      <!-- <th>Contact No.</th> -->
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

      <!-- <footer class="footer">
        <div class="col-6">
          <p class="mb-0">
            &copy; 2022 - <a href="http://localhost/caps/" class="text-muted">LJ CURA OB-GYN ULTRASOUND CLINIC</a>
          </p>
        </div>
      </footer> -->
    </div>
  </div>

  <!-- MODALS -->
  <?php include_once '../modals/reject_appointment_modal.php'; ?>
  <?php include_once '../modals/view_appointment_modal.php'; ?>
  <?php include_once '../modals/statcompleted_modal.php'; ?>
  <?php include '../modals/ILoader.php'; ?>
</body>

</html>
<script src="../assets/js/app.js"></script>
<script src="../../assets/toastr/toastr.js"></script>
<script src="../../assets/toastr/toastr-customize.js"></script>

<script>
  $(document).ready(function() {
    let d = new Date();
    let todayDate = d.toISOString().split('T')[0];
    let appointment_id = 0;
    let filter_status = 'approved';
    let appointment_details_obj = {
      user_id: 0,
      appointment_id: 0,
      client: '',
      age: 0,
      complaint: '',
      service_id: '',
      service_title: '',
      cost: 0.00
    }

    const load_dashboard_summary = () => {
      // $("#ILoader").modal('show');

      $.ajax({
        method: 'POST',
        url: '../functions/load_dashboard_summary.php',
        dataType: 'JSON',
        data: {},
        success: function(res) {
          // console.log(res);
          $("#summ_pending").text(res.data[0].pending)
          $("#summ_confirmed").text(res.data[0].approved)
          $("#summ_completed").text(res.data[0].completed)
          $("#summ_cancelled").text(res.data[0].cancelled)
          // setTimeout(() => {
          //   $("#ILoader").modal('hide');
          // }, 1000);
        }
      });
    };

    let tbl_services = $('#table-appointments').DataTable({
      "responsive": true,
      "dom": '<"top"f>rt<"bottom"ip><"clear">',
      "pageLength": 10,
      "scrollY": "80em",
      "scrollX": true,
      "scrollCollapse": true,
      "fixedHeader": true,
      "ordering": false,
    });
    const load_appointments = (status = 'approved') => {
      $("#ILoader").modal('show');
      $.ajax({
        method: 'POST',
        url: '../functions/load_appointments.php',
        dataType: 'JSON',
        data: {
          status: status,
          today: todayDate,

        },
        success: function(res) {
          // console.log(res);
          let str = ``;
          let ready_data = [];
          for (let i in res.data) {
            let status_badge = '';

            switch (res.data[i].status) {
              case 'Approved':
                status_badge =
                  `<span class="badge badge-primary">${res.data[i].status}</span>`;
                break;
              case 'Completed':
                status_badge =
                  `<span class="badge badge-secondary completed">${res.data[i].status}</span>`;
                break;
              case 'Cancelled':
                status_badge =
                  `<span class="badge badge-danger">${res.data[i].status}</span>`;
                break;
              default:
                status_badge =
                  `<span class="badge badge-success">${res.data[i].status}</span>`;
                break;
            }

            let action_buttons = `<tr>
                <td>
                  <button class="btn btn-primary btn-sm btnView" id="r-${res.data[i].id}"><i class="align-middle fas fa-fw fa-eye"></i> View</button>
                </td>
              </tr>`;
            // res.data[i].status === 'Pending' ?
            // `<tr>
            //   <td>
            //     <button class="btn btn-primary btn-sm btnApprove" id="r-${res.data[i].id}"><i class="align-middle fas fa-fw fa-check"></i> Approve</button>
            //     <button class="btn btn-danger btn-sm btnReject" id="r-${res.data[i].id}"><i class="align-middle fas fa-fw fa-times"></i> Reject</button>
            //   </td>
            // </tr>` :
            // (res.data[i].status === 'Approved' ?
            //   `<tr>
            //   <td>
            //     <button class="btn btn-warning btn-sm btnUpdate" id="r-${res.data[i].id}"><i class="align-middle fas fa-fw fa-check"></i> Update</button>
            //   </td>
            // </tr>` : ``)

            ready_data.push([
              `
                <b>${res.data[i].client}</b>
              `,
              // res.data[i].age,
              // res.data[i].address,
              // res.data[i].contactno,
              `
                ${res.data[i].time_schedule}
                <br>
                <b>${res.data[i].date_schedule}</b>
              `,
              res.data[i].complaint,
              res.data[i].service_title,
              status_badge,
              action_buttons,
            ]);
          }
          tbl_services.clear().rows.add(ready_data).draw();
          setTimeout(() => {
            $("#ILoader").modal('hide');
          }, 1000);
        }
      });
    }

    const update_appointments = (action, appointment_id) => {
      $("#ILoader").modal('show');
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
          const sms_error = res.sms_error ? JSON.parse(res.sms_error) : '';
          const email_error = res.email_error ? JSON.parse(res.email_error) : '';
          console.log(sms_error, email_error);

          // if (res.status) {
          if (sms_error.Error) {
            // pag error yung text mag aalert
            toastr.error(sms_error.Message);
          }

          if (email_error) {
            // pag error yung text mag aalert
            toastr.error(email_error);
          }

          appointment_id = 0;
          // }

          $("#view_appointment_modal").modal('hide');
          $("#reject_appointment_modal").modal('hide');

          toastr.success(res.msg);
          load_appointments(filter_status);
          setTimeout(() => {
            $("#ILoader").modal('hide');
          }, 1000);
        }
      });
    }

    $("input[name='other_charges']").on("keyup", function(e) {
      // e.preventDefault();

      let total_cost = 0;
      let cost = $("input[name='cost']").val();
      let other_charges = $(this).val() ? $(this).val() : 0;

      total_cost = parseFloat(cost) + parseFloat(other_charges);
      $("input[name='total_cost']").val(total_cost);
    });

    $("#view_appointment_modal").on("click", ".btnUpdate", function(e) {
      e.preventDefault();

      appointment_id = $(this).attr('id').split('-')[1];

      let new_cost = appointment_details_obj.cost.replace(",", "");
      let cost = $("input[name='cost']").val(new_cost);
      let other_charges = $("input[name='other_charges']").val();

      total_cost = parseFloat(cost.val()) + parseFloat(other_charges ? other_charges : 0);

      $("input[name='total_cost']").val(total_cost.toFixed(2));
      $("input[name='service']").val(appointment_details_obj.service_title);

      $("#view_appointment_modal").modal('hide');
      $("#statcompleted_modal").modal('show');
    });

    $("#view_appointment_modal").on("click", ".btnApprove", function(e) {
      e.preventDefault();

      appointment_id = $(this).attr('id').split('-')[1];

      if (confirm("Are you sure to approve?") == true) {
        update_appointments('approve', appointment_id);
      }
    });

    $("#view_appointment_modal").on("click", ".btnReject", function(e) {
      e.preventDefault();

      appointment_id = $(this).attr('id').split('-')[1];

      $(".form-input").val('');
      $("#reject_appointment_modal .modal-title").text('Cancel Appointment');
      $("#reject_appointment_modal").modal('show');
    });

    $(".table-appointments").on("click", ".btnView", function(e) {
      e.preventDefault();

      appointment_id = $(this).attr('id').split('-')[1];

      $.ajax({
        method: 'POST',
        url: '../functions/load_appointments.php',
        dataType: 'JSON',
        data: {
          status: status,
          appointment_id: appointment_id,
        },
        success: function(res) {
          // console.log(res);
          if (res.status) {
            let status_badge = '';
            let action_buttons = '';

            let res_data = res.data[0];
            appointment_details_obj.user_id = res_data.user_id;
            appointment_details_obj.appointment_id = res_data.id;
            appointment_details_obj.client = res_data.client;
            appointment_details_obj.age = res_data.age;
            appointment_details_obj.complaint = res_data.complaint;
            appointment_details_obj.service_id = res_data.service_id;
            appointment_details_obj.service_title = res_data.service_title;
            appointment_details_obj.cost = res_data.cost;
            $("input[name='other_charges']").val('0.00');

            switch (res.data[0].status) {
              case 'Approved':
                status_badge =
                  `<span class="badge badge-primary">${res.data[0].status}</span>`;
                break;
              case 'Completed':
                status_badge =
                  `<span class="badge badge-secondary completed">${res.data[0].status}</span>`;
                break;
              case 'Cancelled':
                status_badge =
                  `<span class="badge badge-danger">${res.data[0].status}</span>`;
                break;
              default:
                status_badge =
                  `<span class="badge badge-success">${res.data[0].status}</span>`;
                break;
            }

            $("#view_appointment_modal #pname").text(res.data[0].client);
            $("#view_appointment_modal #age").text(res.data[0].age);
            $("#view_appointment_modal #address").text(res.data[0].address);
            $("#view_appointment_modal #contactno").text(res.data[0].contactno);
            $("#view_appointment_modal #status").html(status_badge);

            if (res.data[0].refno) {
              $("#view_appointment_modal #refno").html(
                `Reference No: <span class="cust_info">${res.data[0].refno}</span>`
              );
            }

            action_buttons = res.data[0].status === 'Pending' ?
              ` <button class="btn btn-primary btn-sm btnApprove" id="r-${res.data[0].id}"><i class="align-middle fas fa-fw fa-check"></i> Approve</button>
                <button class="btn btn-danger btn-sm btnReject" id="r-${res.data[0].id}"><i class="align-middle fas fa-fw fa-times"></i> Reject</button>
              ` :
              (res.data[0].status === 'Approved' ?
                `
                <button class="btn btn-warning btn-sm btnUpdate" id="r-${res.data[0].id}"><i class="align-middle fas fa-fw fa-check"></i> Complete</button>
                <button class="btn btn-danger btn-sm btnReject" id="r-${res.data[0].id}"><i class="align-middle fas fa-fw fa-times"></i> Cancel</button>
              ` : ``)
            action_buttons +=
              '<button class="btn btn-outline-danger btn-sm" data-dismiss="modal"><i class="align-middle fas fa-fw fa-times"></i> Close</button>';


            let str = `
              <tr>
                <td>
                  ${res.data[0].time_schedule}
                  <br>
                  <b>${res.data[0].date_schedule}</b>
                </td>
                <td>
                  ${res.data[0].complaint}
                </td>
                <td>
                  ${res.data[0].service_title}
                </td>
                <td>
                  ${res.data[0].cost}
                </td>
              </tr>
            `;

            $("#appointment_details_list").html(str);

            $("#view_appointment_modal .modal-footer").html(action_buttons);
            $("#view_appointment_modal").modal('show');
          } else {
            toastr.error(res.msg);
          }
        }
      });


    });

    $("#reject_appointment_modal").on("click", "#btnReject", function(e) {
      e.preventDefault();

      update_appointments('reject', appointment_id);
    });

    $(".refresh").click(function(e) {
      e.preventDefault();
      filter_status = 'approved';

      load_dashboard_summary();
      load_appointments(filter_status);
    });

    $("#btnPaid").click(function(e) {
      e.preventDefault();

      $("#btnPaid").prop('disabled', true);

      let forms = $("#statcompleted_modal .form-input").serialize();
      forms +=
        `&user_id=${appointment_details_obj.user_id}&appointment_id=${appointment_details_obj.appointment_id}`;

      $.ajax({
        method: 'POST',
        url: '../functions/payment.php',
        dataType: 'JSON',
        data: forms,
        success: function(res) {
          // console.log(res);
          if (res.status) {
            toastr.success(res.msg);
            load_appointments(filter_status);

            $("#statcompleted_modal").modal('hide');
          } else {
            toastr.error(res.msg);
          }

          setTimeout(() => {
            $("#btnPaid").prop('disabled', false);
          }, 1000);
        }
      })
    });

    load_dashboard_summary();
    load_appointments(filter_status);
    setTimeout(() => {
      $("#statcompleted_modal").modal('hide');
      $("#ILoader").modal('hide');
    }, 3000);
  });
</script>