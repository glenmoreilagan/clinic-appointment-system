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
          <div class="row mb-2 mb-xl-3">
            <div class="col-auto d-none d-sm-block">
              <h3>Announcements</h3>
            </div>

            <div class="col-auto ml-auto text-right mt-n1">
              <button class="btn btn-primary" id="btnNewAnnouncement"><i class="align-middle fas fa-fw fa-plus"></i> New</button>
            </div>
          </div>

          <div class="card mb-3">
            <div class="card-body">
              <div class="table-responsive div-table-announcement">
                <table class="table table-striped table-hover table-announcement" id="table-announcement" style="width: 100%;">
                  <thead>
                    <tr>
                      <th>Title</th>
                      <th>Description</th>
                      <th>Effectivity Date</th>
                      <th class="th-actions">Action</th>
                    </tr>
                  </thead>
                  <tbody id="announcements_list"></tbody>
                </table>
              </div>
            </div>
          </div>

        </div>
      </main>
    </div>
  </div>

  <!-- MODALS -->
  <?php include_once '../modals/announcement_modal.php'; ?>
  <?php include '../modals/ILoader.php'; ?>
</body>

</html>
<script src="../assets/js/app.js"></script>
<script src="../../assets/toastr/toastr.js"></script>
<script src="../../assets/toastr/toastr-customize.js"></script>

<script>
  $(document).ready(function() {
    let announcement_id = 0;

    let tbl_services = $('#table-announcement').DataTable({
      "responsive": true,
      "dom": '<"top"f>rt<"bottom"ip><"clear">',
      "pageLength": 10,
      "scrollY": "80em",
      "scrollX": true,
      "scrollCollapse": true,
      "fixedHeader": true,
    });
    const load_announcements = () => {
      $("#ILoader").modal('show');
      $.ajax({
        method: 'POST',
        url: '../functions/load_announcements.php',
        dataType: 'JSON',
        data: {},
        success: function(res) {
          // console.log(res);
          let str = ``;
          let ready_data = [];
          for (let i in res.data) {
            ready_data.push([
              res.data[i].title,
              res.data[i].description,
              res.data[i].effectivity_date,
              `<tr>
                <td>
                  <button class="btn btn-primary btn-sm btnEdit" id="r-${res.data[i].id}"><i class="align-middle fas fa-fw fa-edit"></i> Edit</button>
                  <button class="btn btn-danger btn-sm btnDelete" id="r-${res.data[i].id}"><i class="align-middle fas fa-fw fa-times"></i> Delete</button>
                </td>
              </tr>`,
            ]);
          }
          tbl_services.clear().rows.add(ready_data).draw();
          setTimeout(() => {
            $("#ILoader").modal('hide');
          }, 1000);
        }
      });
    }

    const edit_schedule = (announcement_id) => {
      $.ajax({
        method: 'POST',
        url: '../functions/load_announcements.php',
        dataType: 'JSON',
        data: {
          announcement_id: announcement_id
        },
        success: function(res) {
          // console.log(res);
          if (res.status) {
            let result = res.data[0];

            $("input[name='title']").val(result.title);
            $("textarea[name='description']").val(result.description);
            $("input[name='effectivity_date']").val(result.effectivity_date);

            $(".modal-title").text('Edit Announcement');
            $("#announcement_modal").modal('show');
          }
        }
      });
    }

    const save_schedule = (data_input) => {
      $.ajax({
        method: 'POST',
        url: '../functions/save_announcements.php',
        dataType: 'JSON',
        data: data_input,
        success: function(res) {
          // console.log(res);
          if (res.status) {
            if (data_input.announcement_id != 0) {
              $("#announcement_modal").modal('hide');
            }
            toastr.success(res.msg);
            $(".form-input").val('');

            load_announcements();
          }
        }
      });
    }

    const delete_schedule = (announcement_id) => {
      $.ajax({
        method: 'POST',
        url: '../functions/delete_announcement.php',
        dataType: 'JSON',
        data: {
          announcement_id: announcement_id
        },
        success: function(res) {
          // console.log(res);
          if (res.status) {
            toastr.success(res.msg);
            load_announcements();
          }
        }
      });
    }

    $("#btnNewAnnouncement").click(function(e) {
      e.preventDefault();

      announcement_id = 0;

      $(".form-input").val('');
      $(".modal-title").text('New Announcement');
      $("#announcement_modal").modal('show');
    });

    $(".table-announcement").on("click", ".btnEdit", function(e) {
      e.preventDefault();

      announcement_id = $(this).attr('id').split('-')[1];
      edit_schedule(announcement_id);
    });

    $(".table-announcement").on("click", ".btnDelete", function(e) {
      e.preventDefault();

      announcement_id = $(this).attr('id').split('-')[1];

      if (confirm("Are you sure to delete this service?") == true) {
        delete_schedule(announcement_id);
      }
    });

    $("#btnSaveAnnouncement").click(function(e) {
      e.preventDefault();

      let title = $("input[name='title']").val();
      let description = $("textarea[name='description']").val();
      let effectivity_date = $("input[name='effectivity_date']").val();

      let data_input = {
        announcement_id: announcement_id,
        title: title,
        description: description,
        effectivity_date: effectivity_date
      }

      if (data_input.title == "") {
        toastr.error('Please input Title.');
        return;
      };

      if (data_input.description == "") {
        toastr.error('Please input Description.');
        return;
      };

      if (data_input.effectivity_date == "") {
        toastr.error('Please input Effectivity Date.');
        return;
      };

      save_schedule(data_input);
    });

    load_announcements();
  });
</script>