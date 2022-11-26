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

  <title>Users</title>

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
          <li class="sidebar-item active">
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
              <h3>Users</h3>
            </div>
          </div>

          <div class="card mb-3">
            <div class="card-body">
              <div class="table-responsive div-table-users">
                <table class="table table-striped table-hover table-users" id="table-users" style="width: 100%;">
                  <thead>
                    <tr>
                      <th>Name</th>
                      <th>Address</th>
                      <th>Contact</th>
                      <th>Email</th>
                      <th style="width: 120px;">Action</th>
                    </tr>
                  </thead>
                  <tbody id="service_list"></tbody>
                </table>
              </div>
            </div>
          </div>

        </div>
      </main>
    </div>
  </div>

  <!-- MODALS -->
  <?php include_once '../modals/user_modal.php'; ?>
  <?php include '../modals/ILoader.php'; ?>
</body>

</html>
<script src="../assets/js/app.js"></script>
<script src="../../assets/toastr/toastr.js"></script>
<script src="../../assets/toastr/toastr-customize.js"></script>

<script>
  $(document).ready(function() {
    let user_id = 0;

    let tbl_users = $('#table-users').DataTable({
      "responsive": true,
      "dom": '<"top"f>rt<"bottom"ip><"clear">',
      "pageLength": 10,
      "scrollY": "80em",
      "scrollX": true,
      "scrollCollapse": true,
      "fixedHeader": true,
    });

    const load_user = (user_id = 0) => {
      $("#ILoader").modal('show');
      $.ajax({
        method: 'POST',
        url: '../functions/load_users.php',
        dataType: 'JSON',
        data: {
          user_id: user_id
        },
        success: function(res) {
          // console.log(res);
          let str = ``;
          let ready_data = [];
          for (let i in res.data) {
            ready_data.push([
              res.data[i].fullname,
              res.data[i].address,
              res.data[i].contactno,
              res.data[i].email,
              `<tr>
                <td>
                  <button class="btn btn-primary btn-sm btnEdit" id="r-${res.data[i].id}"><i class="align-middle fas fa-fw fa-edit"></i> Edit</button>
                </td>
              </tr>`,
            ]);
          }
          tbl_users.clear().rows.add(ready_data).draw();
          setTimeout(() => {
            $("#ILoader").modal('hide');
          }, 1000);
        }
      });
    }

    const edit_user = (user_id) => {
      $.ajax({
        method: 'POST',
        url: '../functions/load_users.php',
        dataType: 'JSON',
        data: {
          user_id: user_id
        },
        success: function(res) {
          // console.log(res);
          if (res.status) {
            let result = res.data[0];
            // let service = result.service;
            // let description = result.description;
            // let duration = result.duration;
            // let amount = result.amount;

            // $("input[name='service']").val(service);
            // $("textarea[name='description']").val(description);
            // $("input[name='duration']").val(duration);
            // $("input[name='amount']").val(amount);

            $(".modal-title").text('Edit User');
            $("#user_modal").modal('show');
          }
        }
      });
    }


    $(".table-users").on("click", ".btnEdit", function(e) {
      e.preventDefault();

      let user_id = $(this).attr('id').split('-')[1];
      edit_user(user_id);
    });

    $("#btnSaveUser").click(function(e) {
      e.preventDefault();

      let service = $("input[name='service']").val();
      let description = $("textarea[name='description']").val();
      let duration = $("input[name='duration']").val();
      let amount = $("input[name='amount']").val();

      let data_input = {
        user_id: user_id,
        service: service,
        description: description,
        duration: duration,
        amount: amount
      }

      if (data_input.service == "") {
        toastr.error('Please input service.');
        return;
      };

      if (data_input.amount == "") {
        toastr.error('Please input amount.');
        return;
      };

      save_service(data_input);
    });

    load_user();
  });
</script>