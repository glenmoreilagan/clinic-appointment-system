<?php
  session_start();

  if(!empty($_SESSION)) 
  {
    if(isset($_SESSION['email']) && isset($_SESSION['role']))
    {
      header("Location: ./user/dashboard/index.php");
    }
  }
?>
<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="assets/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/css/index.css" rel="stylesheet">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">
  <link href="assets/css/swiper-bundle.min.css" rel="stylesheet">
  <title>Home</title>

  <style>
    /* Chrome, Safari, Edge, Opera */
    input::-webkit-outer-spin-button,
    input::-webkit-inner-spin-button {
      -webkit-appearance: none;
      margin: 0;
    }

    /* Firefox */
    input[type=number] {
      -moz-appearance: textfield;
    }

    .swiper-slide .content h3 {
      text-align: center;
      vertical-align: middle;
      margin-top: -25%;
      position: absolute;
      margin-left: 33%;
    }

    .swiper-slide .content2 {
      text-align: center;
      vertical-align: middle;
      margin-top: -22%;
      position: absolute;
      margin-left: 18%;
    }

    /*carousel*/
    .swiper-wrapper {
      max-height: 100vh;
      height: 65vw;

    }

    /*carousel pic*/
    .swiper-slide img {
      display: block;
      width: 100%;
      height: 65%;
      position: relative;

    }
  </style>
</head>

<body>

  <?php include('./includes/navbar.php'); ?>

  <div class="container-fluid px-lg-2 mt-2">
    <div class="swiper swiper-container">
      <div class="swiper-wrapper">
        <div class="swiper-slide">
          <img src="image/carousel/1.jpg" class="w-100 d-block">
          <div class="content">
            <h3 style="color: white;"><b>Great care is always the best choice</b></h3>
          </div>
          <div class="content2">
            <h4 style="color: white;"><i>Your health is our top priority with comprehensive, and affordable women's health care!</i></h4>
          </div>
        </div>
        <div class="swiper-slide">
          <img src="image/carousel/2.jpg" class="w-100 d-block">
          <div class="content">
            <h3 style="color: white;"><b>Great care is always the best choice</b></h3>
          </div>
        </div>
        <div class="swiper-slide">
          <img src="image/carousel/3.jpg" class="w-100 d-block">
          <div class="content">
            <h3 style="color: white;"><b>Great care is always the best choice</b></h3>
          </div>
        </div>
        <div class="swiper-slide">
          <img src="image/carousel/4.jpg" class="w-100 d-block">
          <div class="content">
            <h3 style="color: white;"><b>Great care is always the best choice</b></h3>
          </div>
        </div>
        <div class="swiper-slide">
          <img src="image/carousel/5.jpg" class="w-100 d-block">
          <div class="content">
            <h3 style="color: white;"><b>Great care is always the best choice</b></h3>
          </div>
        </div>
      </div>
    </div>
  </div>

  <div class="container offers">
    <div class="offers-title">
      <h4><b>Why you should choose us?</b></h4>
      <p>We support women in having wonderful and empowered birthing experiences <br>
        and work to ensure that they and their offspring experience optimal health outcomes.</p>
    </div>
    <div class="row">
      <div class="panel col-md-3">
        <div class="child-panel">
          <div id="icon-case">
            <img src="image/icons/ultrasound.png" alt="">
            <h5 style="color: #00ccc5;"><b>Reliable Services</b></h5>
          </div>
          <div id="box">
            <p>We provide reliable and dependable services that you can trust. Our clinic use
              the most recent diagnostic equipment to identify conditions like endometriosis,
              pelvic organ prolapse, PCOS, and malignancy.</p>
          </div>
        </div>
      </div>
      <div class="panel col-md-3">
        <div class="child-panel">
          <div id="icon-case">
            <img src="image/icons/appointment.png">
            <h5 style="color: #00ccc5;"><b>Quick Appointments</b></h5>
          </div>
          <div id="box">
            <p>You can choose the date and time that you like, a day or two prior to the scheduled meeting.
              Confirmation will be sent through SMS upon checking the availability
              of the scheduled appointment.</p>
          </div>
        </div>
      </div>
      <div class="panel col-md-3">
        <div class="child-panel">
          <div id="icon-case">
            <img src="image/icons/open.png" alt="">
            <h5 style="color: #00ccc5;"><b>Open Hours</b></h5>
          </div>
          <div id="box">
            <p>Sunday - Closed<br>
              Monday - 9:00am-3:00pm<br>
              Tuesday - 9:00am-3:00pm<br>
              Wednesday - 9:00am-3:00pm<br>
              Thursday - Closed<br>
              Friday - 9:00am-3:00pm<br>
              Saturday - 9:00am-3:00pm</p>
          </div>
        </div>
      </div>
      <div class="panel col-md-3">
        <div class="child-panel">
          <div id="icon-case">
            <img src="image/icons/care.png" alt="">
            <h5 style="color: #00ccc5;"><b>We care for you</b></h5>
          </div>
          <div id="box">
            <p>Health of the patient is important so the clinic makes sure that the equipments
              that will be used are sanitized as well as the clinic.<br> We want to ensure a positive
              experience for all patients, so that every moment with us brings
              them closer to good health and wellness.</p>
          </div>
        </div>
      </div>
    </div>
  </div>

  <div class="container stages">
    <div class="trimester-title">
      <h4><b>Pregnancy Journey</b></h4>
      <p>Here's the guide to pregnancy which is counted as 40 weeks. Starting
        from the first day of the mother's last menstrual period. Your<br> estimated
        date to birth is only to give you a guide. Babies come when they are ready
        and you need to be patient.</p>
    </div>
    <div class="row">
      <div class="monthly col-md-4">
        <div class="weekly">
          <img src="image/months/1st.png" width="100%" alt="">
        </div>
      </div>
      <div class="monthly col-md-4">
        <div class="weekly">
          <img src="image/months/2nd.png" width="100%" alt="">
        </div>
      </div>
      <div class="monthly col-md-4">
        <div class="weekly">
          <img src="image/months/3rd.png" width="100%" alt="">
        </div>
      </div>
      <div class="monthly col-md-4">
        <div class="weekly">
          <img src="image/months/4th.png" width="100%" alt="">
        </div>
      </div>
      <div class="monthly col-md-4">
        <div class="weekly">
          <img src="image/months/5th.png" width="100%" alt="">
        </div>
      </div>
      <div class="monthly col-md-4">
        <div class="weekly">
          <img src="image/months/6th.png" width="100%" alt="">
        </div>
      </div>
      <div class="monthly col-md-4">
        <div class="weekly">
          <img src="image/months/7th.png" width="100%" alt="">
        </div>
      </div>
      <div class="monthly col-md-4">
        <div class="weekly">
          <img src="image/months/8th.png" width="100%" alt="">
        </div>
      </div>
      <div class="monthly col-md-4">
        <div class="weekly">
          <img src="image/months/9th.png" width="100%" alt="">
        </div>
      </div>

    </div>
  </div>

  <?php include('includes/footer.php'); ?>
  <script src="https://cdn.jsdelivr.net/npm/swiper@8/swiper-bundle.min.js"></script>
  <script>
    var swiper = new Swiper(".swiper-container", {
      spaceBetween: 30,
      effect: "fade",
      loop: true,
      autoplay: {
        delay: 3500,
        disableOnInteraction: false,
      }
    });
  </script>
</body>

</html>
<script src="assets/js/jquery-3.6.0.min.js"></script>
<script src="assets/js/bootstrap.bundle.min.js"></script>