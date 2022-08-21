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
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

  <!-- Choose your prefered color scheme -->
  <!-- <link href="css/light.css" rel="stylesheet"> -->
  <!-- <link href="css/dark.css" rel="stylesheet"> -->

  <!-- BEGIN SETTINGS -->
  <!-- Remove this after purchasing -->
  <link class="js-stylesheet" href="../assets/css/light.css" rel="stylesheet">
  <link class="js-stylesheet" href="../assets/css/forms.css" rel="stylesheet">
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
                <label class="feedback-label" for="excellent">Excellent</label> <br>
                <input name="rating" id="good" type="radio" value="4">
                <label class="feedback-label" for="good">Good</label> <br>
                <input name="rating" id="neutral" type="radio" value="3">
                <label class="feedback-label" for="neutral">Neutral</label> <br>
                <input name="rating" id="poor" type="radio" value="2">
                <label class="feedback-label" for="poor">Poor</label>
              </div>

              <div class="feedback mb-3">
                <label class="feedback-label" for="feedback">If you have specific feedback, please write to us.</label>
                <textarea class="form-control" name="feedback" id="feedback" placeholder="Input your feedback"></textarea>
              </div>
              <button class="btn btn-primary btn-sm" id="btnSaveFeedback">Submit Feedback</button>
            </div>
          </div>

        </div>
      </main>
    </div>
  </div>

  <script src="../assets/js/app.js"></script>

  <script>
    $(document).ready(function() {
      const save_new_feedback = (data) => {
        $.ajax({
          method: 'POST',
          url: '../functions/save_feedback.php',
          dataType: 'JSON',
          data: data,
          success: function(res) {
            console.log(res);
            $("textarea[name='feedback']").val('');
          }
        });
      }

      $("#btnSaveFeedback").click((e) => {
        e.preventDefault();

        let data_input = {
          rating: $("input[name='rating']").val(),
          feedback: $("textarea[name='feedback']").val(),
        };
        save_new_feedback(data_input);
      });
    });
  </script>
</body>

</html>