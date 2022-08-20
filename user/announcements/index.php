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
          <h1 class="h3 mb-3">Announcements</h1>

          <div class="card mb-3">
            <div id="display_announcements" style="max-height: 100vh; overflow-y: scroll;"></div>
          </div>
        </div>
      </main>
    </div>
  </div>

  <script src="../assets/js/app.js"></script>
  <script>
    $(document).ready(function() {
      const load_announcements = () => {
        $.ajax({
          method: 'POST',
          url: '../functions/load_announcements.php',
          dataType: 'JSON',
          data: {},
          success: function(res) {
            console.log(res);

            let str = '';
            for (let i in res.data) {
              str += `
                <div class="card-body">
                <div style="display: flex; justify-content: space-between;">
                  <h4 class="card-title">${res.data[i].title}</h4>
                  <span><i>${res.data[i].created_at}</i></span>
                </div>
                  <p class="card-text">${res.data[i].description}</p>
                  <hr>
                </div>
              `;
            }

            $("#display_announcements").html(str);
          }
        });
      };

      load_announcements();
    });
  </script>
</body>

</html>