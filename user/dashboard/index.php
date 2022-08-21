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

  <!-- Choose your prefered color scheme -->
  <!-- <link href="css/light.css" rel="stylesheet"> -->
  <!-- <link href="css/dark.css" rel="stylesheet"> -->

  <!-- BEGIN SETTINGS -->
  <!-- Remove this after purchasing -->
  <link class="js-stylesheet" href="../assets/css/light.css" rel="stylesheet">
  <link class="js-stylesheet" href="../assets/css/forms.css" rel="stylesheet">

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
                          <h3 class="mb-2" id="summ_pending">0</h3>
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
                          <h3 class="mb-2" id="summ_confirmed">0</h3>
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
                          <h3 class="mb-2" id="summ_completed">0</h3>
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
                          <h3 class="mb-2" id="summ_cancelled">0</h3>
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

  <?php include_once '../modals/newAppointment_modal.php' ?>
  <?php include_once '../modals/cancelAppointment_modal.php' ?>

  <script src="../assets/js/app.js"></script>
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

        // eventBackgroundColor: '#293042',
        // eventBorderColor: '#293042',

        // for inserting
        dateClick: async function(e) {
          // console.log(e);
          let date_sched = e.dateStr;

          $("input[name='date_sched']").val(date_sched);

          $("#newAppointment_modal").modal('show');
        },

        // abang lang to para sa update function
        eventClick: function(e) {
          console.log(e.event);
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

          $("input[name='appointment_id']").val(id);
          $("#appointment_title").text(title);
          $("#cancelAppointment_modal").modal('show');
        },
      });

      setTimeout(function() {
        calendar.render();
      }, 250)

      const save_new_appointment = (data) => {
        $.ajax({
          method: 'POST',
          url: '../functions/save_appointment.php',
          dataType: 'JSON',
          data: data,
          success: function(res) {
            // console.log(res);

            $("#newAppointment_modal").modal('hide');
            $(".form-input").val('');

            calendar.refetchEvents();
          }
        });
      }

      const cancel_appointment = (data) => {
        $.ajax({
          method: 'POST',
          url: '../functions/cancel_appointment.php',
          dataType: 'JSON',
          data: data,
          success: function(res) {
            console.log(res);

            $("#cancelAppointment_modal").modal('hide');
            $("input[name='appointment_id']").val(0);

            calendar.refetchEvents();
          }
        });
      }

      const load_dashboard_summary = () => {
        $.ajax({
          method: 'POST',
          url: '../functions/load_dashboard_summary.php',
          dataType: 'JSON',
          data: {},
          success: function(res) {
            console.log(res);
            $("#summ_pending").text(res.data[0].pending)
            $("#summ_confirmed").text(res.data[0].approved)
            $("#summ_completed").text(res.data[0].completed)
            $("#summ_cancelled").text(res.data[0].cancelled)
          }
        });
      };

      load_dashboard_summary();

      $("#btnSaveNewAppointment").click((e) => {
        e.preventDefault();

        let data_input = {
          complaint: $("textarea[name='complaint']").val(),
          date_schedule: $("input[name='date_sched']").val(),
          time_schedule: $("input[name='time_sched']").val(),
          age: $("input[name='age']").val()
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
    });
  </script>
</body>

</html>