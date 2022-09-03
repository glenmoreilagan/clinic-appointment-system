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
          <h1 class="h3 mb-3">Schedules</h1>

          <div class="card mb-3">
            <div class="card-header">
              <button class="btn btn-primary btn-sm" id="btnNewSchedule"><i class="align-middle fas fa-fw fa-plus"></i> New Schedule</button>
            </div>
            <div class="card-body">
              <div class="table-responsive div-table-schedule">
                <table class="table table-striped table-hover table-schedule" id="table-schedule" style="width: 100%;">
                  <thead>
                    <tr>
                      <th>Date</th>
                      <th>Time</th>
                      <th class="th-actions">Action</th>
                    </tr>
                  </thead>
                  <tbody id="schedule_list"></tbody>
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
    let schedule_id = 0;

    let tbl_services = $('#table-schedule').DataTable({
      "responsive": true,
      "dom": '<"top"f>rt<"bottom"ip><"clear">',
      "pageLength": 10,
      "scrollY": "20em",
      "scrollX": true,
      "scrollCollapse": true,
      "fixedHeader": true,
    });
    const load_schedules = () => {
      $.ajax({
        method: 'POST',
        url: '../functions/load_schedules.php',
        dataType: 'JSON',
        data: {},
        success: function(res) {
          // console.log(res);
          let str = ``;
          let ready_data = [];
          for (let i in res.data) {
            ready_data.push([
              res.data[i].date_schedule,
              res.data[i].time_schedule,
              `<tr>
                <td>
                  <button class="btn btn-primary btn-sm btnEdit" id="r-${res.data[i].id}"><i class="align-middle fas fa-fw fa-check"></i> Edit</button>
                  <button class="btn btn-danger btn-sm btnDelete" id="r-${res.data[i].id}"><i class="align-middle fas fa-fw fa-times"></i> Delete</button>
                </td>
              </tr>`,
            ]);
          }
          tbl_services.clear().rows.add(ready_data).draw();
        }
      });
    }

    const edit_schedule = (schedule_id) => {
      $.ajax({
        method: 'POST',
        url: '../functions/load_schedules.php',
        dataType: 'JSON',
        data: {
          schedule_id: schedule_id
        },
        success: function(res) {
          // console.log(res);
          if (res.status) {
            let result = res.data[0];
            let date_schedule = result.date_schedule;
            let time_schedule = result.time_schedule;

            $("input[name='date_schedule']").val(date_schedule);
            $("input[name='time_schedule']").val(time_schedule);

            $(".modal-title").text('Edit Schedule');
            $("#schedule_modal").modal('show');
          }
        }
      });
    }

    const save_schedule = (data_input) => {
      $.ajax({
        method: 'POST',
        url: '../functions/save_schedule.php',
        dataType: 'JSON',
        data: data_input,
        success: function(res) {
          // console.log(res);
          if (res.status) {
            if(data_input.schedule_id != 0) {
              $("#schedule_modal").modal('hide');
            }
            toastr.success(res.msg);
            $(".form-input").val('');

            load_schedules();
          }
        }
      });
    }

    const delete_schedule = (schedule_id) => {
      $.ajax({
        method: 'POST',
        url: '../functions/delete_schedule.php',
        dataType: 'JSON',
        data: {
          schedule_id: schedule_id
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

    $("#btnNewSchedule").click(function(e) {
      e.preventDefault();

      schedule_id = 0;

      $(".form-input").val('');
      $(".modal-title").text('New Schedule');
      $("#schedule_modal").modal('show');
    });

    $(".table-schedule").on("click", ".btnEdit", function(e) {
      e.preventDefault();

      schedule_id = $(this).attr('id').split('-')[1];
      edit_schedule(schedule_id);
    });

    $(".table-schedule").on("click", ".btnDelete", function(e) {
      e.preventDefault();

      schedule_id = $(this).attr('id').split('-')[1];

      if (confirm("Are your sure to delete this service?") == true) {
        delete_schedule(schedule_id);
      }
    });

    $("#btnSaveSchedule").click(function(e) {
      e.preventDefault();

      let date_schedule = $("input[name='date_schedule']").val();
      let time_schedule = $("input[name='time_schedule']").val();

      let data_input = {
        schedule_id: schedule_id,
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

      save_schedule(data_input);
    });

    load_schedules();
  });
</script>