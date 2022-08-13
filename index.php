<?php include('includes/header.php'); ?>

<title>Home</title>



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