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

  <title>Feedback</title>

  <link rel="shortcut icon" href="../../image/favicon.png">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.2/font/bootstrap-icons.css">
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500&amp;display=swap" rel="stylesheet">
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

  <!-- Choose your prefered color scheme -->
  <!-- <link href="css/light.css" rel="stylesheet"> -->
  <!-- <link href="css/dark.css" rel="stylesheet"> -->

  <!-- BEGIN SETTINGS -->
  <!-- Remove this after purchasing -->
  <link class="js-stylesheet" href="../assets/css/light.css" rel="stylesheet">
  <link class="js-stylesheet" href="../assets/css/forms.css" rel="stylesheet">
  <link rel="stylesheet" href="../../assets/toastr/build/toastr.min.css">
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
          <span class="align-middle"><img width="200" height="60" src="../../image/logo.png" alt="LJ CURA OB-GYN ULTRA SOUND CLINIC"></span>
        </a>
        <?php
        // heres the settings for local or live
        include '../../host_setting.php';
        ?>
        <ul class="sidebar-nav">
          <li class="sidebar-item">
            <a class="sidebar-link" href=<?php echo $host . "user/dashboard/"; ?>>
              <i class="align-middle" data-feather="sliders"></i> <span class="align-middle">Dashboard</span>
            </a>
          </li>
          <li class="sidebar-item">
            <a class="sidebar-link" href=<?php echo $host . "user/announcements/"; ?>>
              <i class="align-middle bi bi-megaphone"></i> <span class="align-middle">Announcements</span>
            </a>
          </li>
          <li class="sidebar-item">
            <a class="sidebar-link" href=<?php echo $host . "user/myappointments/"; ?>>
              <i class="align-middle" data-feather="file-text"></i> <span class="align-middle">My
                Appointments</span>
            </a>
          </li>
          <li class="sidebar-item">
            <a class="sidebar-link" href=<?php echo $host . "user/periodcalendar/"; ?>>
              <i class="align-middle" data-feather="calendar"></i> <span class="align-middle">Period
                Calendar</span>
            </a>
          </li>
          <li class="sidebar-item active">
            <a class="sidebar-link" href=<?php echo $host . "user/feedback/"; ?>>
              <i class="align-middle" data-feather="edit"></i> <span class="align-middle">Feedback</span>
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
          <h1 class="mb-3">Feedback</h1>

          <div class="card mb-3">
            <!-- <div class="card-header">
              
            </div> -->
            <div class="card-body">
              <div class="rating mb-3">
                <h1 class="card-text">Provide Feedback:</h1>
                <br>
                <h3 class="card-text">Please Help us to serve you better.</h3>

                <p class="card-text feedback-p">How satisfied were you with our service?</p>
                <input name="rating" id="excellent" type="radio" value="5" checked>
                <label class="feedback-label" for="excellent">Very Satisfied</label> <br>
                <input name="rating" id="good" type="radio" value="4">
                <label class="feedback-label" for="good">Satisfied</label> <br>
                <input name="rating" id="neutral" type="radio" value="3">
                <label class="feedback-label" for="neutral">Neutral</label> <br>
                <input name="rating" id="poor" type="radio" value="2">
                <label class="feedback-label" for="poor">Unsatisfied</label> <br>
                <input name="rating" id="poor" type="radio" value="1">
                <label class="feedback-label" for="poor">Very Unsatisfied</label>
              </div>

              <div class="feedback mb-3">
                <label class="feedback-label" for="feedback">If you have specific feedback, please write
                  to us.</label>
                <textarea class="form-control" name="feedback" id="feedback" placeholder="Input your feedback"></textarea>
              </div>
              <button class="btn btn-primary" id="btnSaveFeedback">Submit Feedback</button>
            </div>
          </div>

          <div class="card mb-3">
            <div class="card-body">
              <div class="table-responsive div-table-feedback">
                <table class="table table-striped table-hover table-feedback" id="table-feedback" style="width: 100%;">
                  <thead>
                    <tr>
                      <th>Rating</th>
                      <th>Feedback</th>
                      <th>Date Created</th>
                    </tr>
                  </thead>
                  <tbody id="feedback_list"></tbody>
                </table>
              </div>
            </div>
          </div>

        </div>
      </main>
    </div>
  </div>

  <script src="../assets/js/app.js"></script>
  <script src="../../assets/toastr/toastr.js"></script>
  <script src="../../assets/toastr/toastr-customize.js"></script>

  <script>
    $(document).ready(function() {
      let tbl_feedback = $('#table-feedback').DataTable({
        "responsive": true,
        "dom": '<"top"f>rt<"bottom"ip><"clear">',
        "pageLength": 10,
        "scrollY": "80em",
        "scrollX": true,
        "scrollCollapse": true,
        "fixedHeader": true,
        "ordering": false,
      });

      const load_feedback = () => {
        $.ajax({
          method: 'POST',
          url: '../functions/load_feedback.php',
          dataType: 'JSON',
          data: {},
          success: function(res) {
            // console.log(res);
            let str = ``;
            let ready_data = [];
            for (let i in res.data) {
              ready_data.push([
                `<tr>
                <td>${res.data[i].rating}</td>
              </tr>`,
                `<tr>
                <td>${res.data[i].feedback}</td>
              </tr>`,
                `<tr>
                <td>${res.data[i].created_at}</td>
              </tr>`,
              ]);
            }

            tbl_feedback.clear().rows.add(ready_data).draw();
          }
        });
      }

      load_feedback();

      const save_new_feedback = (data) => {
        $.ajax({
          method: 'POST',
          url: '../functions/save_feedback.php',
          dataType: 'JSON',
          data: data,
          success: function(res) {
            // console.log(res);
            if (res.status) {
              $("textarea[name='feedback']").val('');
              toastr.success("Feedback Sent.");
            } else {
              toastr.success("Feedback Failed.");
            }
          }
        });
      }

      $("#btnSaveFeedback").click((e) => {
        e.preventDefault();

        let data_input = {
          rating: $("input[name='rating']:checked").val(),
          feedback: $("textarea[name='feedback']").val(),
        };
        save_new_feedback(data_input);
      });
    });
  </script>
</body>

</html>