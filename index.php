<?php
session_start();

if (!empty($_SESSION)) {
  if (isset($_SESSION['email']) && isset($_SESSION['role'])) {
    header("Location: ./user/dashboard/");
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

  <link rel="shortcut icon" href="image/favicon.png">
</head>

<body>
  <nav class="navbar navbar-expand-lg navbar-light bg-light px-lg-3 py-lg-2 shadow-sm sticky-top">
    <a class="navbar-brand" href="#">
      <img src="image/logo.png" width="200" height="58" alt="Lj Cura">
    </a>

    <button class="navbar-toggler shadow-none" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav ms-auto">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="index">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="services">Services</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="about">About Us</a>
        </li>
      </ul>

      <form class="d-flex">
        <button type="button" class="btn btn-outline-dark shadow-none me-lg-2 me-2" data-bs-toggle="modal" data-bs-target="#signupModal">Sign up</button>
        <button type="button" class="btn btn-outline-dark shadow-none" data-bs-toggle="modal" data-bs-target="#signinModal">Sign in</button>
      </form>

    </div>
    </ul>
    </div>
    </div>
  </nav>

  <?php include('includes/register-modal.php'); ?>
  <?php include('includes/login-modal.php'); ?>

  <!-- carousel -->
  <div id="carouselExampleCaptions" class="carousel slide" data-bs-ride="carousel">
    <div class="carousel-inner">
      <div class="carousel-item active">
        <img src="image/carousel/1.webp" class="d-block w-100" alt="...">
        <div class="carousel-caption d-md-block">
          <h3>Great care is always the best choice</h3>
          <h5><i>Your health is our top priority with comprehensive, and affordable women's health care!</i>
          </h5>
          <div class="slider-btn">
            <a href="services"><span>Our Services</span></a>
            <button type="button" id="slider-btn" class="slider-btn" data-bs-toggle="modal" data-bs-target="#signinModal"><span>Get
                Appointment</span></button>
          </div>
        </div>
      </div>
      <div class="carousel-item">
        <img src="image/carousel/2.webp" class="d-block w-100" alt="...">
        <div class="carousel-caption d-md-block">
          <h3>Great care is always the best choice</h3>
          <h5><i>Your health is our top priority with comprehensive, and affordable women's health care!</i>
          </h5>
          <div class="slider-btn">
            <a href="services"><span>Our Services</span></a>
            <button type="button" id="slider-btn" class="slider-btn" data-bs-toggle="modal" data-bs-target="#signinModal"><span>Get
                Appointment</span></button>
          </div>
        </div>
      </div>
      <div class="carousel-item">
        <img src="image/carousel/3.webp" class="d-block w-100" alt="...">
        <div class="carousel-caption d-md-block">
          <h3>Great care is always the best choice</h3>
          <h5><i>Your health is our top priority with comprehensive, and affordable women's health care!</i>
          </h5>
          <div class="slider-btn">
            <a href="services"><span>Our Services</span></a>
            <button type="button" id="slider-btn" class="slider-btn" data-bs-toggle="modal" data-bs-target="#signinModal"><span>Get
                Appointment</span></button>
          </div>
        </div>
      </div>
    </div>
    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
      <span class="visually-hidden">Previous</span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
      <span class="carousel-control-next-icon" aria-hidden="true"></span>
      <span class="visually-hidden">Next</span>
    </button>
  </div>

  <div class="container px-2 py-2">
    <div class="offers">
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
              <p>You can choose the date and time that you like, a day or two prior to the scheduled
                meeting.
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
          <img src="image/months/1st.webp" width="100%" alt="">
        </div>
      </div>
      <div class="monthly col-md-4">
        <div class="weekly">
          <img src="image/months/2nd.webp" width="100%" alt="">
        </div>
      </div>
      <div class="monthly col-md-4">
        <div class="weekly">
          <img src="image/months/3rd.webp" width="100%" alt="">
        </div>
      </div>
      <div class="monthly col-md-4">
        <div class="weekly">
          <img src="image/months/4th.webp" width="100%" alt="">
        </div>
      </div>
      <div class="monthly col-md-4">
        <div class="weekly">
          <img src="image/months/5th.webp" width="100%" alt="">
        </div>
      </div>
      <div class="monthly col-md-4">
        <div class="weekly">
          <img src="image/months/6th.webp" width="100%" alt="">
        </div>
      </div>
      <div class="monthly col-md-4">
        <div class="weekly">
          <img src="image/months/7th.webp" width="100%" alt="">
        </div>
      </div>
      <div class="monthly col-md-4">
        <div class="weekly">
          <img src="image/months/8th.webp" width="100%" alt="">
        </div>
      </div>
      <div class="monthly col-md-4">
        <div class="weekly">
          <img src="image/months/9th.webp" width="100%" alt="">
        </div>
      </div>

    </div>
  </div>

  <?php include('includes/footer.php'); ?>
</body>

</html>
<script src="assets/js/jquery-3.6.0.min.js"></script>
<script src="assets/js/bootstrap.bundle.min.js"></script>
<script src="./assets/js/auth.js"></script>