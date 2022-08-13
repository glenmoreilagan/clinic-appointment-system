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

  <title>Clinic System</title>

  <link rel="canonical" href="calendar.html" />
  <link rel="shortcut icon" href="img/favicon.ico">

  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500&amp;display=swap" rel="stylesheet">

  <!-- Choose your prefered color scheme -->
  <!-- <link href="css/light.css" rel="stylesheet"> -->
  <!-- <link href="css/dark.css" rel="stylesheet"> -->

  <!-- BEGIN SETTINGS -->
  <!-- Remove this after purchasing -->
  <link class="js-stylesheet" href="css/light.css" rel="stylesheet">
  <link class="js-stylesheet" href="css/forms.css" rel="stylesheet">
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
    <?php include_once 'display_side_nav.php' ?>

    <div class="main">
      <!-- THIS IS FOR HEADER NAVIGATION BAR -->
      <?php include_once 'display_head_nav.php' ?>

      <main class="content">
        <div class="container-fluid p-0">
          <h1 class="h3 mb-3">Dashboard</h1>

          <div class="card">
            <div class="card-header">
              <!-- <h5 class="card-title">FullCalendar</h5>
							<h6 class="card-subtitle text-muted">Open source JavaScript jQuery plugin for a full-sized, drag & drop event calendar.</h6> -->
            </div>
            <div class="card-body">
              <div class="row">
                <div class="col-12 col-sm-3 col-xxl d-flex">
                  <div class="card card-custom flex-fill">
                    <div class="card-body py-4">
                      <div class="media">
                        <div class="media-body">
                          <h3 class="mb-2">300</h3>
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
                          <h3 class="mb-2">300</h3>
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
                          <h3 class="mb-2">300</h3>
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
                          <h3 class="mb-2">300</h3>
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

        </div>
      </main>

      <footer class="footer">
        <div class="col-6">
          <p class="mb-0">
            &copy; 2020 - <a href="index.html" class="text-muted">AppStack</a>
          </p>
        </div>
      </footer>
    </div>
  </div>

  <script src="js/app.js"></script>

  <script>
    document.addEventListener("DOMContentLoaded", function() {});
  </script>
</body>

</html>