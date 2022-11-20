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

  <title>Change Password</title>

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
          <span class="align-middle"><img width="215" height="60" src="../../image/addash.png" alt="LJ CURA OB-GYN ULTRA SOUND CLINIC"></span>
        </a>
        <?php
        // heres the settings for local or live
        include '../../host_setting.php';
        ?>
        <ul class="sidebar-nav">
          <li class="sidebar-item">
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
        </ul>
      </div>
    </nav>

    <div class="main">
      <!-- THIS IS FOR HEADER NAVIGATION BAR -->
      <?php include_once '../layouts/display_head_nav.php' ?>

      <main class="content">
        <div class="container-fluid p-0">
          <h1 class="mb-3">Change Password</h1>

          <div class="card mb-3">
            <div class="card-body">
              <div class="row" style="justify-content: center;">
                <div class="col-md-4">
                  <label for="">Password</label>
                  <input type="password" class="form-control form-inputs-password" name="password" id="password">
                  
                  <label for="">Confirm Password</label>
                  <input type="password" class="form-control form-inputs-password" name="confirm_password" id="confirm_password">
                  <input type="checkbox" onclick="myFunction()" id="show_cpass">
                  <label for="show_cpass">
                    Show Password
                  </label>
                  <br>
                  <button class="btn btn-primary mt-3" id="btnSavePassword">SAVE</button>
                </div>
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
    function myFunction() {
      var x = document.getElementById('password');
      var y = document.getElementById('confirm_password');
      if ((x.type || y.type) === "password") {
        x.type = "text";
        y.type = "text";
      } else {
        x.type = "password";
        y.type = "password";
      }
    }
    $(document).ready(function() {
      const save_info = (data, for_password = 0) => {
        $.ajax({
          method: 'POST',
          url: '../functions/change_password.php',
          dataType: 'JSON',
          data: data,
          success: function(res) {
            if (res.status) {
              if (for_password == 1) {
                $(".form-inputs-password").val('');
              }
              toastr.success(res.msg);
            } else {
              toastr.error(res.msg);
            }
          }
        });
      }

      $("#btnSavePassword").click((e) => {
        let password = $("input[name='password']").val();
        let confirm_password = $("input[name='confirm_password']").val();

        if (password && !confirm_password) {
          toastr.error("Confirm Password is required!");
          return;
        }

        if (!password && confirm_password) {
          toastr.error("Password is required!");
          return;
        }

        if (password && confirm_password && password !== confirm_password) {
          toastr.error("Password and Confirm Password are not the same!");
          return;
        }

        if (password.length < 6) {
          toastr.error("More than or equal to 6 characters are required for password!");
          return;
        }

        let data_input = $(".form-inputs-password").serialize();
        save_info(data_input, 1);
      });
    });
  </script>
</body>

</html>