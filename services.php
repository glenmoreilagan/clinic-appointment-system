<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="assets/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/css/index.css" rel="stylesheet">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">
  <link href="assets/css/swiper-bundle.min.css" rel="stylesheet">
  <title>Services</title>

  <link rel="shortcut icon" href="image/favicon.png">

  <style>
    .main_div {
      border: 1px solid;
      padding: 10px;
    }
  </style>
</head>

<body>
  <?php include('./includes/navbar.php'); ?>
  <div class="container px-4 py-5">
    <h2 class="pb-2 border-bottom">Our Services</h2>

    <div class="row row-cols-1 row-cols-md-1 align-items-md-center g-5 py-5">
      <div class="row row-cols-1 row-cols-sm-3 g-4" id="display_services">
        <div class="d-flex flex-column gap-2">
          <div class="feature-icon-small d-inline-flex align-items-right justify-content-start text-bg-primary bg-gradient fs-4 rounded-3">
            <i class="bi bi-award" style="font-size: 2em;"></i>
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
<script src="assets/js/jquery-3.6.0.min.js"></script>
<script src="assets/js/bootstrap.bundle.min.js"></script>
<script src="./assets/js/auth.js"></script>

<script>
  $(document).ready(function() {
    $.ajax({
      method: 'POST',
      url: 'functions/load_services.php',
      dataType: 'JSON',
      data: {},
      success: function(res) {
        // console.log(res.data[0].service_title);

        let str = '';
        if (res.status) {
          for (let i in res.data) {
            str += `
            <div class="col d-flex align-items-start">
              <i class="bi bi-award" style="font-size: 2em; color: #39599E; margin-top: -10px;"></i>
              <div style="width: 100%;">
                <h6 class="fw-semibold mb-0">${res.data[i].service_title}</h6>
                <p class="text-muted"  style="margin: 0; font-size: 14px;">${res.data[i].description? res.data[i].description : 'No Description'}</p>
                <p class="fw-semibold">₱ ${res.data[i].amount? res.data[i].amount : '₱ 0.00'}</p>
              </div>
            </div>
            `
          }
        }

        $("#display_services").html(str);
      }
    });
  });
</script>