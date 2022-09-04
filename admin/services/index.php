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
              <h3>Services</h3>
            </div>

            <div class="col-auto ml-auto text-right mt-n1">
              <button class="btn btn-primary btn-sm" id="btnNewService"><i class="align-middle fas fa-fw fa-plus"></i> New</button>
            </div>
          </div>

          <div class="card mb-3">
            <div class="card-body">
              <div class="table-responsive div-table-services">
                <table class="table table-striped table-hover table-services" id="table-services" style="width: 100%;">
                  <thead>
                    <tr>
                      <th>Service</th>
                      <th>Description</th>
                      <th>Duration</th>
                      <th>Amount</th>
                      <th class="th-actions">Action</th>
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
  <?php include_once '../modals/service_modal.php'; ?>
</body>

</html>
<script src="../assets/js/app.js"></script>
<script src="../../assets/toastr/toastr.js"></script>
<script src="../../assets/toastr/toastr-customize.js"></script>

<script>
  $(document).ready(function() {
    let service_id = 0;

    let tbl_services = $('#table-services').DataTable({
      "responsive": true,
      "dom": '<"top"f>rt<"bottom"ip><"clear">',
      "pageLength": 10,
      "scrollY": "20em",
      "scrollX": true,
      "scrollCollapse": true,
      "fixedHeader": true,
    });
    const load_services = () => {
      $.ajax({
        method: 'POST',
        url: '../functions/load_services.php',
        dataType: 'JSON',
        data: {},
        success: function(res) {
          // console.log(res);
          let str = ``;
          let ready_data = [];
          for (let i in res.data) {
            ready_data.push([
              res.data[i].service,
              res.data[i].description,
              res.data[i].duration,
              res.data[i].amount,
              `<tr>
                <td>
                  <button class="btn btn-primary btn-sm btnEdit" id="r-${res.data[i].id}"><i class="align-middle fas fa-fw fa-edit"></i> Edit</button>
                  <button class="btn btn-danger btn-sm btnDelete" id="r-${res.data[i].id}"><i class="align-middle fas fa-fw fa-times"></i> Delete</button>
                </td>
              </tr>`,
            ]);
          }
          tbl_services.clear().rows.add(ready_data).draw();
        }
      });
    }

    const edit_service = (service_id) => {
      $.ajax({
        method: 'POST',
        url: '../functions/load_services.php',
        dataType: 'JSON',
        data: {
          service_id: service_id
        },
        success: function(res) {
          // console.log(res);
          if (res.status) {
            let result = res.data[0];
            let service = result.service;
            let description = result.description;
            let duration = result.duration;
            let amount = result.amount;

            $("input[name='service']").val(service);
            $("textarea[name='description']").val(description);
            $("input[name='duration']").val(duration);
            $("input[name='amount']").val(amount);

            $(".modal-title").text('Edit Service');
            $("#service_modal").modal('show');
          }
        }
      });
    }

    const save_service = (data_input) => {
      $.ajax({
        method: 'POST',
        url: '../functions/save_service.php',
        dataType: 'JSON',
        data: data_input,
        success: function(res) {
          // console.log(res);
          if (res.status) {
            toastr.success(res.msg);
            $(".form-input").val('');

            load_services();
          }
        }
      });
    }

    const delete_service = (service_id) => {
      $.ajax({
        method: 'POST',
        url: '../functions/delete_services.php',
        dataType: 'JSON',
        data: {
          service_id: service_id
        },
        success: function(res) {
          // console.log(res);
          if (res.status) {
            toastr.success(res.msg);
            load_services();
          }
        }
      });
    }

    $("#btnNewService").click(function(e) {
      e.preventDefault();

      service_id = 0;

      $(".form-input").val('');
      $(".modal-title").text('New Service');
      $("#service_modal").modal('show');
    });

    $(".table-services").on("click", ".btnEdit", function(e) {
      e.preventDefault();

      service_id = $(this).attr('id').split('-')[1];
      edit_service(service_id);
    });

    $(".table-services").on("click", ".btnDelete", function(e) {
      e.preventDefault();

      service_id = $(this).attr('id').split('-')[1];

      if (confirm("Are you sure to delete this service?") == true) {
        delete_service(service_id);
      }
    });

    $("#btnSaveService").click(function(e) {
      e.preventDefault();

      let service = $("input[name='service']").val();
      let description = $("textarea[name='description']").val();
      let duration = $("input[name='duration']").val();
      let amount = $("input[name='amount']").val();

      let data_input = {
        service_id: service_id,
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

    load_services();
  });
</script>