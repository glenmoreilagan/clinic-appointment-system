$(document).ready(function () {
  $("#btnLogin").click(function (e) {
    e.preventDefault();

    let email = $("#signinModal input[name='email']").val();
    let password = $("#signinModal input[name='password']").val();

    $.ajax({
      method: 'POST',
      url: 'functions/login_func.php',
      dataType: 'JSON',
      data: {
        email: email,
        password: password
      },
      success: function (res) {
        // console.log(res);

        if (res.status) {
          $(".loginError").removeClass('text-danger');
          $(".loginError").addClass('text-success');

          window.location.href = './user/dashboard/';
          $(".loginError").text(res.msg);
        } else {
          $(".loginError").removeClass('text-success');
          $(".loginError").addClass('text-danger');
          $(".loginError").text(res.msg);
        }
      }
    })
  });

  $("#btnRegister").click(function (e) {
    e.preventDefault();

    let fullname = $("#signupModal input[name='fullname']").val();
    let contactnumber = $("#signupModal input[name='contactnumber']").val();
    let address = $("#signupModal input[name='address']").val();
    let email = $("#signupModal input[name='email']").val();
    let password = $("#signupModal input[name='password']").val();
    let cpassword = $("#signupModal input[name='cpassword']").val();

    $.ajax({
      method: 'POST',
      url: 'functions/reg_func.php',
      dataType: 'JSON',
      data: {
        fullname: fullname,
        contactnumber: contactnumber,
        address: address,
        email: email,
        password: password,
        cpassword: cpassword
      },
      success: function (res) {
        console.log(res);
        if (res.status) {
          $(".loginError").removeClass('text-danger');
          $(".loginError").addClass('text-success');
          $(".loginError").text(res.msg);

          $("#signupModal").modal('hide');
          $("#signinModal").modal('show');
          $(".loginError").text('');
          $("#signupModal input").val('');
        } else {
          $(".loginError").removeClass('text-success');
          $(".loginError").addClass('text-danger');
          $(".loginError").text(res.msg);
        }
      }
    });
  });

  const onlyNumberKey = (evt) => {
    // Only ASCII character in that range allowed
    var ASCIICode = (evt.which) ? evt.which : evt.keyCode
    if (ASCIICode > 31 && (ASCIICode < 48 || ASCIICode > 57)) {
      return false;
    }
    return true;
  }

  $("#signupModal input[name='contactnumber']").keypress(function (e) {
    return onlyNumberKey(e);
  });
});