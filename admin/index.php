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
        padding: 64px 130px 54px 90px;
    }

    h4.title {
        margin-left: 17%;
    }

    .action-btn.mt-3 {
        float: right;
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
            <div class="c-login-div"
                style="height: 660px; display: flex; justify-content: center; align-items: center;  box-shadow: 0 0.5rem 1rem rgb(0 0 0 / 15%);">
                <img src="../image/logooo.png">
                <div class="inputs" style="padding: 20px; width: 300px;">
                    <h4 class="title">Login as Admin</h4>
                    <label for="email"><i class="bi bi-envelope-fill" aria-hidden="true"></i>Email</label>
                    <input name="email" class="form-control form-control-sm mb-3" type="text" id="email">

                    <label for="password"><i class="bi bi-lock-fill"></i>Password</label>
                    <input name="password" class="form-control form-control-sm" type="password" id="password">
                    <small class="loginError"></small>

                    <a href="..//reset-password.php" class="text-decoration-none">Forgot Password?</a><br>
                    <span class="text-danger loginError"></span>

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