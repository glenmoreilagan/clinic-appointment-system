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
          <h1 class="h3 mb-3">Services</h1>

          <div class="card mb-3">
            <div class="card-header">
              <button class="btn btn-primary btn-sm" id="btnNewService">New Service</button>
            </div>
            <div class="card-body">
              <div class="table-responsive table-services">
                <table class="table table-striped table-hover">
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

    const load_services = () => {
      $.ajax({
        method: 'POST',
        url: '../functions/load_services.php',
        dataType: 'JSON',
        data: {},
        success: function(res) {
          // console.log(res);
          let str = ``;
          for (let i in res.data) {
            str += `
                <tr>
                  <td>${res.data[i].service}</td>
                  <td>${res.data[i].description}</td>
                  <td>${res.data[i].duration}</td>
                  <td>${res.data[i].amount}</td>
                  <td>
                    <button class="btn btn-primary btn-sm btnEdit" id="r-${res.data[i].id}">Edit</button>
                    <button class="btn btn-danger btn-sm btnDelete" id="r-${res.data[i].id}">Delete</button>
                  </td>
                </tr>
              `;
          }
          $("#service_list").html(str);
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

      if (confirm("Are your sure to delete this service?") == true) {
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