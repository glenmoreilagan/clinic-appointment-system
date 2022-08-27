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

  <link href="../assets/css/bootstrap.min.css" rel="stylesheet">

  <title>Login</title>
</head>

<body>
  <div class="container">
    <div class="p-login-div" style="padding: 1em;">
      <div class="c-login-div" style="height: 500px; display: flex; justify-content: center; align-items: center;">
        <div class="inputs" style="padding: 20px; width: 300px; box-shadow: 0 0.5rem 1rem rgb(0 0 0 / 15%);">
          <label for="email">Email</label>
          <input name="email" class="form-control form-control-sm mb-3" type="text" id="email">

          <label for="password">Password</label>
          <input name="password" class="form-control form-control-sm" type="password" id="password">
          <small class="loginError"></small>

          <div class="action-btn mt-3">
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
  $(document).ready(function() {
    $("#btnLogin").click(function(e) {
      e.preventDefault();

      let email = $("input[name='email']").val();
      let password = $("input[name='password']").val();

      $.ajax({
        method: 'POST',
        url: 'functions/f_login.php',
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