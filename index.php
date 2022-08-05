<?php include('includes/header.php'); ?>

<title>Home</title>

  <div class="container-fluid">
    <div class="swiper swiper-container">
      <div class="swiper-wrapper">
        <div class="swiper-slide">
          <img src="image/carousel/1.jpg" class="w-100 d-block">
        </div>
        <div class="swiper-slide">
          <img src="image/carousel/2.jpg" class="w-100 d-block">
        </div>
        <div class="swiper-slide">
          <img src="image/carousel/3.jpg" class="w-100 d-block">
        </div>
        <div class="swiper-slide">
          <img src="image/carousel/4.jpg" class="w-100 d-block">
        </div>
        <div class="swiper-slide">
          <img src="image/carousel/5.jpg" class="w-100 d-block">
        </div>
      </div>
    </div>
</div>
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

<h3>damn8</h3>


</body>
</html>
<script src="assets/js/jquery-3.6.0.min.js"></script>
<script src="assets/js/bootstrap.bundle.min.js"></script>
