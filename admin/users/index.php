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
                      <th style="width: 200px;">Action</th>
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
                  <button class="btn btn-danger btn-sm btnDelete" id="r-${res.data[i].id}"><i class="align-middle fas fa-fw fa-times"></i> Delete</button>
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
            let fname = result.fname;
            let mname = result.mname;
            let lname = result.lname;
            let address = result.address;
            let contactno = result.contactno;
            let email = result.email;
            user_id = result.id;

            $("input[name='fname']").val(fname);
            $("input[name='mname']").val(mname);
            $("input[name='lname']").val(lname);
            $("input[name='address']").val(address);
            $("input[name='contactno']").val(contactno);
            $("input[name='email']").val(email);

            $(".modal-title").text('Edit User');
            $("#user_modal").modal('show');
          }
        }
      });
    }

    const save_user = (data_input) => {
      $.ajax({
        method: 'POST',
        url: '../functions/save_user.php',
        dataType: 'JSON',
        data: data_input,
        success: function(res) {
          // console.log(res);
          if (res.status) {
            toastr.success(res.msg);
            $(".form-input").val('');
            user_id = 0;
            load_user();
            $("#user_modal").modal('hide');
          }
        }
      });
    }

    const delete_user = (user_id) => {
      $.ajax({
        method: 'POST',
        url: '../functions/delete_user.php',
        dataType: 'JSON',
        data: {
          user_id: user_id
        },
        success: function(res) {
          // console.log(res);
          if (res.status) {
            toastr.success(res.msg);
            $(".form-input").val('');
            user_id = 0;
            load_user();
          }
        }
      });
    }

    $(".table-users").on("click", ".btnEdit", function(e) {
      e.preventDefault();

      let row_user_id = $(this).attr('id').split('-')[1];
      user_id = row_user_id;
      edit_user(row_user_id);
    });

    $(".table-users").on("click", ".btnDelete", function(e) {
      e.preventDefault();

      let row_user_id = $(this).attr('id').split('-')[1];
      user_id = row_user_id;

      if (confirm('Are your sure do you want to delete this user?') == true) {
        delete_user(row_user_id);
      }
    });

    $("#btnSaveUser").click(function(e) {
      e.preventDefault();

      let fname = $("input[name='fname']").val();
      let mname = $("input[name='mname']").val();
      let lname = $("input[name='lname']").val();
      let address = $("input[name='address']").val();
      let contactno = $("input[name='contactno']").val();
      let email = $("input[name='email']").val();

      let data_input = {
        user_id: user_id,
        fname: fname,
        mname: mname,
        lname: lname,
        address: address,
        contactno: contactno,
        email: email
      }

      if (data_input.fname == "") {
        toastr.error('Please input first name.');
        return;
      };

      if (data_input.lname == "") {
        toastr.error('Please input last name.');
        return;
      };

      if (data_input.contactno == "") {
        toastr.error('Please input contact no.');
        return;
      };

      if (data_input.email == "") {
        toastr.error('Please input email.');
        return;
      };

      save_user(data_input);
    });

    load_user();
  });
</script>