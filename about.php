<?php
session_start();

if (!empty($_SESSION)) {
  if (isset($_SESSION['email']) && isset($_SESSION['role'])) {
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
    <link href="assets/css/about.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">
    <link href="assets/css/swiper-bundle.min.css" rel="stylesheet">
    <title>About Us</title>

    <link rel="shortcut icon" href="image/favicon.png">
</head>

<body>
    <?php include('./includes/navbar.php'); ?>

    <div class="container-fluid p-0">
        <div class="aboutus">
            <img src="image/au.webp" class="d-block w-100" alt="...">
            <div class="content-about">
                <div class="title">About Us</div>
                <div class="about">
                    <p> Women's bodies are intricate and stunning, so when a problem emerges, you
                        want a professional to identify it and provide a solution. Once the issue
                        has been identified, we can offer a wide choice of in-office treatments and,
                        if required, surgical procedures. Laparoscopy or robotically aided procedures
                        are frequently used to do minimally invasive surgery, which minimizes
                        complications and speeds up recovery.</p>
                </div>
            </div>
        </div>
    </div>

    <div class="map">
        <div class="l-visit-us">
            <div class="loc-brief">
                <h4 class="mb-5" style="font-weight: 600;">Contact Information</h4>
                <div class="address details">
                    <i class="bi bi-geo-alt-fill"></i>
                    <div class="title-name">Address</div>
                    <div class="text-one">A. Mabini Avenue, near Maligaya Compound,
                        Barangay Sambat, Tanauan City Batangas</div>
                </div>
                <div class="phone details">
                    <i class="bi bi-phone-vibrate-fill"></i>
                    <div class="title-name">Phone</div>
                    <div class="text-one">0927-035-1312</div>
                </div>
                <div class="tele details">
                    <i class="bi bi-telephone-inbound-fill"></i>
                    <div class="title-name">Telephone</div>
                    <div class="text-one">(043) 406-7079 </div>
                </div>
                <div class="email details">
                    <i class="bi bi-envelope-fill"></i>
                    <div class="title-name">Email</div>
                    <div class="text-one">ex@example.com</div>
                </div>
            </div>
            <div class="map-visit">
                <div class="visit-loc">Visit Us Here:</div>
                <div class="iframe-container">
                    <iframe
                        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3869.8838817287487!2d121.14102701449355!3d14.084031293303104!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x33bd6f667d548e0d%3A0x8c83da36f918f390!2sLj%20Cura%20Ob-Gyn%20Ultrasound%20Clinic!5e0!3m2!1sen!2sph!4v1662817446762!5m2!1sen!2sph"
                        width="600" height="300" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                </div>
            </div>
        </div>
    </div>
    </div>

    <div class="container px-4 py-4">
        <h2 class="pb-2 border-bottom">Feedbacks</h2>

        <div class="row row-cols-1 row-cols-md-1 align-items-md-center g-5 py-5">
            <div class="row row-cols-1 row-cols-sm-3 g-4" id="display_feedbacks">
                <div class="d-flex flex-column gap-2">
                    <div
                        class="display_star feature-icon-small d-inline-flex align-items-right justify-content-start text-bg-primary bg-gradient fs-4 rounded-3">

                    </div>
                    <h4 class="fw-semibold mb-0">Featured title</h4>
                    <p class="text-muted">Paragraph of text beneath the heading to explain the heading.</p>
                </div>
            </div>
        </div>
    </div>


    <?php include('includes/footer.php'); ?>
</body>

</html>
<script src="assets/js/bootsdtrap.bundle.min.js"></script>
<script src="assets/js/jquery-3.6.0.min.js"></script>
<script src="./assets/js/auth.js"></script>

<script>
$(document).ready(function() {
    $.ajax({
        method: 'POST',
        url: 'functions/load_feedback.php',
        dataType: 'JSON',
        data: {},
        success: function(res) {
            // console.log(res.data[0].rating);

            let str = '';
            if (res.status) {
                for (let i in res.data) {
                    let star_count = '';
                    for (let x = 0; x <= res.data[i].rating - 1; x++) {
                        star_count +=
                            `<i class="bi bi-star-fill" style="font-size: 2em; color: #39599E;"></i>`;
                    }

                    str += `
            <div class="col d-flex align-items-start">
              ${star_count}
              <div style="width: 100%;">
                <h6 class="fw-semibold mb-0">${res.data[i].rating}</h6>
                <p class="text-muted"  style="margin: 0; font-size: 14px;">${res.data[i].feedback? res.data[i].feedback : 'No Feedback'}</p>
              </div>
            </div>
            `


                    // $("#display_star").html(star_count);
                    star_count = '';
                }

            }



            $("#display_feedbacks").html(str);
        }
    });
});
</script>