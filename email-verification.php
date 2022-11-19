<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="assets/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">
  <title>Email Verification</title>

  <style>
    @import url("https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;700&family=Raleway:wght@200;300;400;500;600;700&family=Roboto:ital,wght@0,400;0,500;0,700;1,300&display=swap");
    @import url('https://fonts.googleapis.com/css2?family=Montserrat:wght@100;200;300;400;500;600;700;800;900&display=swap');

    :root {
      --main-font: Montserrat, Poppins, Roboto, Raleway, sans-serif;
      --main-font-weight-thin: 300;
      --main-font-weight-semi-bold: 600;
      --main-box-shadow: 0 0.1px 1rem rgb(0 0 0 / 3%);
    }

    body {
      font-family: var(--main-font);
    }
  </style>
</head>

<body>
  <div class="container h-full">
    <div class="main-panel d-flex h-full" style="justify-content: center; align-items: center; height: 100vh;">
      <div style="text-align: center;">
        <?php
        include './config.php';
        $q = isset($_GET['q']) ? mysqli_escape_string($conn, $_GET['q']) : '';
        
        if ($q) {
          $qry = "UPDATE tbl_user SET email_verification = '' WHERE email_verification = '$q'";

          if ($conn->query($qry)) {
            echo "
            <h1>Email Verification Success</h1>
            <h1><i class='bi bi-check-circle'></i></h1>";
          } else {
            echo "
            <h1>Email Verification Failed</h1>
            <h1><i class='bi bi-x-circle'></i></h1>";
          }
        }
        ?>

      </div>
    </div>
  </div>
</body>

</html>
<script src="assets/js/jquery-3.6.0.min.js"></script>
<script src="assets/js/bootstrap.bundle.min.js"></script>