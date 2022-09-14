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
    <!-- <link href="assets/css/swiper-bundle.min.css" rel="stylesheet"> -->
    <title>About Us</title>

    <link rel="shortcut icon" href="image/favicon.png">
</head>

<body>

    <?php include('./includes/navbar.php'); ?>

    <div class="container">
        <div class="aboutus">
            <img src="image/au.jpg" class="d-block w-100" alt="...">
            <div class="content-about">
                <div class="title">
                    <h1> About Us</h1>
                </div>
                <div class="about">
                    <p>Women's bodies are intricate and stunning, so when a problem emerges, you
                        want a professional to identify it and provide a solution. Once the issue
                        has been identified, we can offer a wide choice of in-office treatments and,
                        if required, surgical procedures. Laparoscopy or robotically aided procedures
                        are frequently used to do minimally invasive surgery, which minimizes
                        complications and speeds up recovery.</p>
                </div>
            </div>
        </div>
    </div>

    <div class="container map">
        <div class="l-visit-us">
            <div class="loc-brief">
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
                <p><iframe
                        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3869.8838817287487!2d121.14102701449355!3d14.084031293303104!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x33bd6f667d548e0d%3A0x8c83da36f918f390!2sLj%20Cura%20Ob-Gyn%20Ultrasound%20Clinic!5e0!3m2!1sen!2sph!4v1662817446762!5m2!1sen!2sph"
                        width="600" height="300" style="border:0;" allowfullscreen="" loading="lazy"
                        referrerpolicy="no-referrer-when-downgrade"></iframe></p>
            </div>
        </div>
    </div>
    </div>



    <?php include('includes/footer.php'); ?>
    <script src="assets/js/bootstrap.bundle.min.js"></script>
</body>