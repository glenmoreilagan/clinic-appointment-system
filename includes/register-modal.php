<div class="modal fade" id="signupModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
    aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <form action="functions/reg_func.php" method="POST" class="login-email">
                <div class="modal-header">
                    <h5 class="modal-title">Sign Up</a></h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-6">
                            <!-- <label class="form-label">Fullname:</label>
              <input type="text" placeholder="Fullname" class="form-control shadow-none" name="fullname"> -->
                            <label class="form-label">First Name:</label>
                            <input type="text" placeholder="First Name" class="form-control shadow-none" name="fname">
                            <label class="form-label">Middle Name:</label>
                            <input type="text" placeholder="Middle Name" class="form-control shadow-none" name="mname">
                            <label class="form-label">Last Name:</label>
                            <input type="text" placeholder="Last Name" class="form-control shadow-none" name="lname">
                            <label class="form-label">Address:</label>
                            <input type="text" placeholder="Address" class="form-control shadow-none" name="address">



                        </div>
                        <div class="col-md-6">
                            <label class="form-label">Contact Number:</label>
                            <input type="tel" placeholder="Contact Number (ex. 09xxxxx)"
                                class="form-control shadow-none" name="contactnumber" onCopy="return false"
                                onDrag="return false" onDrop="return false" onPaste="return false" autocomplete="off">

                            <label class="form-label">Email Address:</label>
                            <input type="email" placeholder="Email" class="form-control shadow-none" name="email">
                            <label class="form-label">Password:</label>
                            <input type="password" placeholder="Password" class="form-control shadow-none"
                                name="password">
                            <label class="form-label">Confirm Password:</label>
                            <input type="password" placeholder="Confirm Password" class="form-control shadow-none"
                                name="cpassword">
                        </div>
                        <a data-bs-target="#signinModal" data-bs-toggle="modal" style="color: blue;"
                            data-bs-dismiss="modal">Already have an
                            account?</a><br>
                        <span class="text-danger loginError"></span>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" name="submit" class="btn btn-primary" id="btnRegister">Sign up</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>