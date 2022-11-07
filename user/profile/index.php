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
    <!-- THIS IS FOR SIDEBAR NAVIGATION -->
    <?php include_once '../layouts/display_side_nav.php' ?>

    <div class="main">
      <!-- THIS IS FOR HEADER NAVIGATION BAR -->
      <?php include_once '../layouts/display_head_nav.php' ?>

      <main class="content">
        <div class="container-fluid p-0">
          <h1 class="mb-3">Profile</h1>

          <div class="card mb-3">
            <div class="card-body">
              <div class="row">
                <div class="col-md-4">
                  <h4>Personal Information</h4>
                  <label for="">First Name</label>
                  <input type="text" class="form-control form-inputs" name="fname">

                  <label for="">Middle Name</label>
                  <input type="text" class="form-control form-inputs" name="mname">

                  <label for="">Last Name</label>
                  <input type="text" class="form-control form-inputs" name="lname">

                  <label for="">Contact No.</label>
                  <input type="text" class="form-control form-inputs" name="contactno">

                  <label for="">Address</label>
                  <textarea type="text" class="form-control form-inputs" name="address" rows="2"></textarea>

                  <label for="">Email Address</label>
                  <input type="email" class="form-control form-inputs" name="email">
                </div>
                <div class="col-md-4">
                  <h4>Change Password</h4>
                  <label for="">Password</label>
                  <input type="password" class="form-control form-inputs" name="password">

                  <label for="">Confirm Password</label>
                  <input type="password" class="form-control form-inputs" name="confirm_password">

                  <button class="btn btn-primary mt-3" id="btnSave">SAVE</button>
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
    $(document).ready(function() {
      const save_new_feedback = (data) => {
        $.ajax({
          method: 'POST',
          url: '../functions/save_profile.php',
          dataType: 'JSON',
          data: data,
          success: function(res) {
            // console.log(res);
            if (res.status) {
              $(".form-inputs").val('');
              toastr.success(res.msg);
            } else {
              toastr.error(res.msg);
            }
          }
        });
      }

      $("#btnSave").click((e) => {
        e.preventDefault();

        let fname = $("input[name='fname']").val();
        let mname = $("input[name='mname']").val();
        let lname = $("input[name='lname']").val();
        let contactno = $("input[name='contactno']").val();
        let address = $("textarea[name='address']").val();
        let email = $("input[name='email']").val();
        let password = $("input[name='password']").val();
        let confirm_password = $("input[name='confirm_password']").val();

        if (!fname) {
          toastr.error("First Name is required!");
          return;
        }
        // if (!mname) {
        //   toastr.error("Middle Name is required!");
        //   return;
        // }
        if (!lname) {
          toastr.error("Last Name is required!");
          return;
        }
        if (!contactno) {
          toastr.error("Contact No. is required!");
          return;
        }
        if (!address) {
          toastr.error("Address is required!");
          return;
        }
        if (!email) {
          toastr.error("Email is required!");
          return;
        }

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
        
        if(password.length < 6) {
          toastr.error("More than or equal to 6 characters are required for password!");
          return;
        }

        let data_input = $(".form-inputs").serialize();
        save_new_feedback(data_input);
      });
    });
  </script>
</body>

</html>