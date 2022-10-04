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

    /* .modal:nth-of-type(even) {
      z-index: 1062 !important;
    }

    .modal-backdrop.show:nth-of-type(even) {
      z-index: 1061 !important;
    } */

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
    </div>
  </div>

  <!-- MODALS -->
  <?php include_once '../modals/reject_appointment_modal.php'; ?>
  <?php include_once '../modals/view_appointment_modal.php'; ?>
  <?php include_once '../modals/statcompleted_modal.php'; ?>
  <?php include_once '../modals/send_result_modal.php'; ?>
  <?php include '../modals/ILoader.php'; ?>
</body>

</html>
<script src="../assets/js/app.js"></script>
<script src="../../assets/toastr/toastr.js"></script>
<script src="../../assets/toastr/toastr-customize.js"></script>

<script>
  $(document).ready(function() {
    let appointment_id = 0;
    let filter_status = 'all';
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
    const load_appointments = (status = 'all') => {
      $("#ILoader").modal('show');
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

            let action_buttons = ``;

            if (res.data[i].status == 'Completed') {
              action_buttons = `<tr>
                <td>
                  <button class="btn btn-primary btn-sm btnView" id="r-${res.data[i].id}"><i class="align-middle fas fa-fw fa-eye"></i> View</button>
                  <button class="btn btn-primary btn-sm btnSendResult" id="r-${res.data[i].id}"><i class="align-middle fas fa-fw fa-file-image"></i> Send Result</button>
                </td>
              </tr>`
            } else {
              action_buttons = `<tr>
                <td>
                  <button class="btn btn-primary btn-sm btnView" id="r-${res.data[i].id}"><i class="align-middle fas fa-fw fa-eye"></i> View</button>
                </td>
              </tr>`
            }

            ready_data.push([
              `
                <b>${res.data[i].client}</b>
              `,
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

      $("#view_appointment_modal").modal('hide');
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
                status_badge = `<span class="badge badge-primary">${res.data[0].status}</span>`;
                break;
              case 'Completed':
                status_badge = `<span class="badge badge-secondary completed">${res.data[0].status}</span>`;
                break;
              case 'Cancelled':
                status_badge = `<span class="badge badge-danger">${res.data[0].status}</span>`;
                break;
              default:
                status_badge = `<span class="badge badge-success">${res.data[0].status}</span>`;
                break;
            }

            $("#view_appointment_modal #pname").text(res.data[0].client);
            $("#view_appointment_modal #age").text(res.data[0].age);
            $("#view_appointment_modal #address").text(res.data[0].address);
            $("#view_appointment_modal #contactno").text(res.data[0].contactno);
            $("#view_appointment_modal #status").html(status_badge);

            if (res.data[0].refno) {
              $("#view_appointment_modal #refno").html(`Reference No: <span class="cust_info">${res.data[0].refno}</span>`);
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
            action_buttons += '<button class="btn btn-outline-danger btn-sm" data-dismiss="modal"><i class="align-middle fas fa-fw fa-times"></i> Close</button>';


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

    $(".table-appointments").on("click", ".btnSendResult", function(e) {
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
            let res_data = res.data[0];
            appointment_details_obj.user_id = res_data.user_id;
            appointment_details_obj.appointment_id = res_data.id;

            $("#send_result_modal").modal('show');
          } else {
            toastr.error(res.msg);
          }
        }
      });
    });

    $("#send_result_modal #btnSendEmailResult").click(function(e) {
      e.preventDefault();

      let file_selected = $("#send_result_modal #upload_file")[0].files.length;

      let forms = new FormData();

      for (var x = 0; x < file_selected; x++) {
        forms.append("attachments[]", $("#send_result_modal #upload_file")[0].files[x]);
      }

      forms.append('appointment_id', appointment_details_obj.appointment_id);
      forms.append('user_id', appointment_details_obj.user_id);

      $.ajax({
        method: 'POST',
        url: '../functions/send_result.php',
        data: forms,
        dataType: 'JSON',
        contentType: false,
        processData: false,
        success: function(res) {
          // console.log(res);
          if (res.status) {
            toastr.success(res.msg);
          } else {
            toastr.error(res.msg);
          }
        }
      });
    })

    $("#reject_appointment_modal").on("click", "#btnReject", function(e) {
      e.preventDefault();

      update_appointments('reject', appointment_id);
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

    $("#btnPaid").click(function(e) {
      e.preventDefault();

      $("#btnPaid").prop('disabled', true);

      let forms = $("#statcompleted_modal .form-input").serialize();
      forms += `&user_id=${appointment_details_obj.user_id}&appointment_id=${appointment_details_obj.appointment_id}`;

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

    load_appointments(filter_status);
  });
</script>