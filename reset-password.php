<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="assets/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">
    <title>Reset Password</title>
</head>

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

.parent {
    display: flex;
    height: 100vh;
    justify-content: space-evenly;
    align-items: center;
}

.col1 {
    display: flex;
    justify-content: center;
    align-items: center;
    width: 400px;
}

.col2 {
    display: flex;
    justify-content: center;
    align-items: center;
}

.col1,
.col2 {
    /* border: 1px solid; */
    height: 25em;
    width: 30em;
}

.col2-child1 {
    width: 100%;
}

.infos {
    margin: 0;
    padding: 0;
    font-size: 14px;
}
</style>

<body>
    <div class="parent container">
        <div class="col1">
            <div class="col2-child1">
                <h4 class="text-center">Password Reset</h4>
                <p class="text-center infos">You will receive temporary password in your email.</p>
                <p class="text-center infos">After you logged in please change the temporary password.</p>
                <br>
                <label for="">Email</label>
                <input type="email" id="email" class="form-control">
                <span class="text-success" id="display_message"></span>
                <button class="btn btn-primary mt-3" id="btnSend">RESET PASSWORD</button>
                <a href="/caps" type="button" class="btn btn-outline-secondary mt-3">BACK TO HOMEPAGE</a>
            </div>
        </div>
        <div class="col2">
            <img src="./assets/img/forgot-password.svg" alt="Forgot Password" width="450">
        </div>
    </div>
</body>

</html>
<script src="assets/js/jquery-3.6.0.min.js"></script>
<script src="assets/js/bootstrap.bundle.min.js"></script>

<script>
$(document).ready(function() {
    $("#btnSend").click(function() {
        let email = $("#email").val();

        $.ajax({
            method: 'POST',
            url: './admin/functions/forgot_password.php',
            dataType: 'JSON',
            data: {
                email: email
            },
            success: function(res) {
                // console.log(res);
                $("#display_message").text(res.msg);
            }
        })
    });
});
</script>