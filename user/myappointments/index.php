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
              <a class="btn btn-primary btn-sm" href="/caps/user/dashboard">New Appointment</a>
            </div>
            <div class="card-body">
              <div class="table-responsive table-appointments">
                <table class="table table-striped table-hover">
                  <thead>
                    <tr>
                      <th>Date & Time</th>
                      <th>Chief Complaint</th>
                      <th>Services</th>
                      <th>Status</th>
                      <th>Action</th>
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

  <script src="../assets/js/app.js"></script>

  <script>
    $(document).ready(function() {
      const load_appointments = () => {
        $.ajax({
          method: 'POST',
          url: '../functions/load_appointment.php',
          dataType: 'JSON',
          data: {},
          success: function(res) {
            console.log(res);
            let str = ``;
            for (let i in res.data) {
              str += `
                <tr>
                  <td>
                    <b>${res.data[i].time_schedule}</b>
                    <br>
                    ${res.data[i].date_schedule}
                  </td>
                  <td>${res.data[i].complaint}</td>
                  <td>----</td>
                  <td>
                    <span>${res.data[i].status}</span>
                  </td>
                  <td>
                    <button class="btn btn-primary btn-sm" id="r-${res.data[i].id}">View</button>
                  </td>
                </tr>
              `;
            }
            $("#myappointment_list").html(str);
          }
        });
      }

      load_appointments();

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

            load_appointments();
          }
        });
      }

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
    });
  </script>
</body>

</html>