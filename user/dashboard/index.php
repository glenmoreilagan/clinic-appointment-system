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

  <style>
    /* .fc-prevYear-button,
    .fc-nextYear-button,
    .fc-prev-button,
    .fc-next-button,
    .fc-today-button {
      background-color: #293042 !important;
      border: #293042 !important;
    }

    .btn-primary.focus,
    .btn-primary:focus {
      box-shadow: none;
    }

    .btn-primary:not(:disabled):not(.disabled).active:focus,
    .btn-primary:not(:disabled):not(.disabled):active:focus,
    .show>.btn-primary.dropdown-toggle:focus {
      box-shadow: 0 0 0 .2rem rgba(41, 48, 66, .5);
    } */

    td.fc-daygrid-day:hover {
      cursor: pointer;
      background-color: #E0EAFC;
    }
  </style>


  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
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
          <h1 class="h3 mb-3">Dashboard</h1>

          <div class="card mb-3">
            <div class="card-body mt-3">
              <div class="row">
                <div class="col-12 col-sm-3 col-xxl d-flex">
                  <div class="card card-custom flex-fill">
                    <div class="card-body py-4">
                      <div class="media">
                        <div class="media-body">
                          <h1 class="mb-2" id="summ_pending">0</h1>
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
                          <h1 class="mb-2" id="summ_confirmed">0</h1>
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
                          <h1 class="mb-2" id="summ_completed">0</h1>
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
                          <h1 class="mb-2" id="summ_cancelled">0</h1>
                          <p class="mb-2">Cancelled Appointments</p>
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
              <div id="fullcalendar"></div>
            </div>
          </div>
        </div>
      </main>
    </div>
  </div>

  <!-- MODALS -->
  <?php include_once '../modals/newAppointment_modal.php' ?>
  <?php include_once '../modals/cancelAppointment_modal.php' ?>
</body>

</html>
<script src="../assets/js/app.js"></script>
<script src="../../assets/toastr/toastr.js"></script>
<script src="../../assets/toastr/toastr-customize.js"></script>

<script>
  $(document).ready(function() {
    let calendarEl = document.getElementById('fullcalendar');
    let calendar = new FullCalendar.Calendar(calendarEl, {
      themeSystem: 'bootstrap',
      initialView: 'dayGridMonth',
      initialDate: Date.now(),
      headerToolbar: {
        left: 'prev,next today',
        // left: 'prevYear,prev,next,nextYear today',
        right: 'title',
        // right: 'dayGridMonth,timeGridWeek,timeGridDay'
        center: ''
      },
      events: '../functions/display_appointment_calender.php',

      // for inserting
      dateClick: async function(e) {
        $(".form-input").val('');
        $("#services").val(0).change();;
        // console.log(e);
        let date_sched = e.dateStr;

        $("input[name='date_sched']").val(date_sched);

        $("#newAppointment_modal").modal('show');
        load_available_time(date_sched);
      },

      eventClick: function(e) {
        // console.log(e.event);
        let id = e.event.id;
        let title = e.event.title;
        let start = e.event.startStr;
        let end = e.event.endStr;
        // console.log(e.event.extendedProps);
        // console.log(e.el.style);

        // e.el.style.backgroundColor = '#293042';
        // e.el.style.borderColor = '#293042';

        // let complaint = e.event.extendedProps.complaint;
        // let age = e.event.extendedProps.age;
        // let date_schedule = e.event.extendedProps.date_schedule;
        // let time_schedule = e.event.extendedProps.time_schedule;

        // $("textarea[name='complaint']").val(complaint);
        // $("input[name='age']").val(age);
        // $("input[name='date_sched']").val(date_schedule);
        // $("input[name='time_sched']").val(time_schedule);

        if (e.event.backgroundColor === "#198754") {
          $("input[name='appointment_id']").val(id);
          $("#appointment_title").text(title);
          $("#cancelAppointment_modal").modal('show');
        }
      },
    });

    setTimeout(function() {
      calendar.render();
    }, 250);

    const load_dashboard_summary = () => {
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
        }
      });
    };

    const load_services = () => {
      $.ajax({
        method: 'POST',
        url: '../functions/load_services.php',
        dataType: 'JSON',
        data: {},
        success: function(res) {
          // console.log(res);
          if (res.status) {
            let str = `<option value="0" selected>Select Service</option>`;
            for (let i in res.data) {
              str += `
                  <optgroup label='₱ ${res.data[i].amount} | ${res.data[i].duration}'>
                    <option value='${res.data[i].id}'>${res.data[i].service}</option>
                  </optgroup>
                `;
            }

            $("#services").html(str);
          }
        }
      });
    }

    const load_available_time = (selected_date) => {
      $.ajax({
        method: 'POST',
        url: '../functions/load_available_time.php',
        dataType: 'JSON',
        data: {
          selected_date: selected_date
        },
        success: function(res) {
          // console.log(res);
          if (res.status) {
            let str = ``;
            for (let i in res.data) {
              let add_am_pm = new Date(`${res.data[i].available_date} ${res.data[i].available_time}`).toLocaleTimeString().replace(/([\d]+:[\d]{2})(:[\d]{2})(.*)/, "$1$3");
              str += `
                  <button class="btn btn-primary btn-sm mb-1 available-time" data-time='${res.data[i].available_time}'>${add_am_pm}</button>
                `;
            }

            $("#display_available_time").html(str);
          } else {
            $("#display_available_time").html('<h4>No Available Time</h4>');
          }
        }
      });
    }

    const save_new_appointment = (data) => {
      $.ajax({
        method: 'POST',
        url: '../functions/save_appointment.php',
        dataType: 'JSON',
        data: data,
        success: function(res) {
          // console.log(res);
          if (res.status) {
            $("#newAppointment_modal").modal('hide');
            $(".form-input").val('');
            load_dashboard_summary();

            toastr.success(res.msg);
          } else {
            toastr.error(res.msg);
          }

          calendar.refetchEvents();
        }
      });
    };

    const cancel_appointment = (data) => {
      $.ajax({
        method: 'POST',
        url: '../functions/cancel_appointment.php',
        dataType: 'JSON',
        data: data,
        success: function(res) {
          // console.log(res);
          if (res.status) {
            $("#cancelAppointment_modal").modal('hide');
            $("input[name='appointment_id']").val(0);
            load_dashboard_summary();

            toastr.success(res.msg);
          } else {
            toastr.error(res.msg);
          }

          calendar.refetchEvents();
        }
      });
    };

    $("#btnSaveNewAppointment").click((e) => {
      e.preventDefault();

      let complaint = $("textarea[name='complaint']").val();
      let date_schedule = $("input[name='date_sched']").val();
      let time_schedule = $("input[name='time_sched']").val();
      let age = $("input[name='age']").val();
      let service_id = $("select[name='services']").val();

      let data_input = {
        complaint: complaint,
        date_schedule: date_schedule,
        time_schedule: time_schedule,
        age: age,
        service_id: service_id
      };

      if (data_input.complaint == "") {
        toastr.error('Please input complaint.');
        return;
      };

      if (data_input.service_id == 0) {
        toastr.error('Please select service.');
        return;
      };

      if (data_input.time_schedule == "") {
        toastr.error('Please select time.');
        return;
      };

      save_new_appointment(data_input);
    });

    $("#btnCancelAppointment").click((e) => {
      e.preventDefault();

      let data_input = {
        appointment_id: $("input[name='appointment_id']").val(),
      };

      cancel_appointment(data_input);
    });

    $("#newAppointment_modal").on("click", ".available-time", function() {
      let selected_time = $(this).attr('data-time');
      $("#time_schedule").val(selected_time);
    });

    load_dashboard_summary();
    load_services();
  });
</script>