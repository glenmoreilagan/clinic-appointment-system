<?php
session_start();

if (!empty($_SESSION)) {
  if (isset($_SESSION['email']) && isset($_SESSION['role']) && $_SESSION['role'] == 1) {
    header("Location: ./dashboard/");
  }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">
  <link href="../assets/css/bootstrap.min.css" rel="stylesheet">

  <style>
    .login-logo {
      position: absolute;
      margin-top: 7em;
      margin-left: 24em;
    }

    .c-login-div {
      display: flex;
      flex-wrap: wrap;
      background: #FFDEE9;
      background-image: linear-gradient(0deg, #FFDEE9 0%, #B5FFFC 100%);
      border-radius: 50px;
      justify-content: space-between;
    }

    h4.title {
      margin-left: 17%;
    }

    .action-btn.mt-3 {
      float: right;
    }

    @media screen and (max-width: 895px) {
      #logo {
        width: 150px;
        height: 150px;
      }

      .inputs {
        width: 100% !important;
      }
    }

    @media screen and (max-width: 500px) {
      #logo {
        width: 150px;
        height: 150px;
      }

      .inputs {
        width: 100% !important;
      }

      .c-login-div {
        padding: 0 !important;
        height: 90vh !important;
      }
    }
  </style>

  <title>Login</title>
  <link rel="shortcut icon" href="../image/favicon.png">
</head>

<body>
  <div class="container">
    <div class="p-login-div" style="padding: 1em;">
      <!-- <div class="login-logo">
    <img src="../image/logo.png"> 
    </div> -->
      <div class="c-login-div" style="height: 90vh; display: flex; justify-content: space-evenly; align-items: center;  box-shadow: 0 0.5rem 1rem rgb(0 0 0 / 15%);">
        <img src="../image/logooo.png" id="logo">
        <div class="inputs" style="padding: 20px; width: 30em;">
          <h4 class="text-center">Login as Admin</h4>
          <div class="form-floating mb-3">
            <input type="email" class="form-control creds-input" id="floatingInput" name="email" placeholder="name@example.com">
            <label class="form-label">Email Address:</label>
          </div>
          <div class="form-floating">
            <input type="password" class="form-control creds-input" id="floatingPassword" name="password" placeholder="Password">
            <label class="form-label">Password:</label>
            <small class="loginError"></small><br>
            <input type="checkbox" onclick="myFunction()">Show Password
          </div>

          <a href="../reset-password.php" class="text-decoration-none">Forgot Password?</a><br>

          <div class="action-btn mt-3">
            <button class="btn btn-outline-danger btn-sm" onclick="window.history.back();">Cancel</button>
            <button type="button" class="btn btn-primary btn-sm" id="btnLogin">Login</button>
          </div>
        </div>
      </div>
    </div>
  </div>
</body>

</html>
<script src="../assets/js/jquery-3.6.0.min.js"></script>
<script src="../assets/js/bootstrap.bundle.min.js"></script>

<script>
  function myFunction() {
    var x = document.getElementById("floatingPassword");
    if (x.type === "password") {
      x.type = "text";
    } else {
      x.type = "password";
    }
  }
  $(document).ready(function() {
    $("#btnLogin").click(function(e) {
      e.preventDefault();

      let email = $("input[name='email']").val();
      let password = $("input[name='password']").val();

      $.ajax({
        method: 'POST',
        url: './functions/f_login.php',
        dataType: 'JSON',
        data: {
          email: email,
          password: password
        },
        success: function(res) {
          // console.log(res);

          if (res.status) {
            $(".loginError").removeClass('text-danger');
            $(".loginError").addClass('text-success');

            window.location.href = './dashboard/';

            $(".loginError").text(res.msg);
          } else {
            $(".loginError").removeClass('text-success');
            $(".loginError").addClass('text-danger');
            $(".loginError").text(res.msg);
          }
        }
      })
    });
  })
</script>