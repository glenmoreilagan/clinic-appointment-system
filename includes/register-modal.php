<div class="modal fade" id="signupModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
    aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <form action="functions/reg_func.php" method="POST" class="login-text">
                <div class="modal-header">
                    <h5 class="modal-title">Register</a></h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="container-fluid">
                    <div class="row py-3">
                        <!-- <div class="col-md-6">
                            <label class="form-label">Fullname:</label>
                            <input type="text" placeholder="Fullname" class="form-control shadow-none" name="fullname">
                            
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

                            <label class="form-label">text Address:</label>
                            <input type="text" placeholder="text" class="form-control shadow-none" name="text">
                            <label class="form-label">Password:</label>
                            <input type="password" placeholder="Password" class="form-control shadow-none"
                                name="password">
                            <label class="form-label">Confirm Password:</label>
                            <input type="password" placeholder="Confirm Password" class="form-control shadow-none"
                                name="cpassword">
                        </div> -->

                        <div class="form-floating col-md-6 mb-3">
                            <input type="text" class="form-control" id="fname" name="fname" placeholder="First Name"
                                pattern="[a-zA-Z]">
                            <label class="form-label">First Name:</label>
                        </div>
                        <div class="form-floating col-md-6 mb-3">
                            <input type="text" class="form-control" id="mname" name="mname" placeholder="Middle Name">
                            <label class="form-label">Middle Name:</label>
                        </div>
                        <div class="form-floating col-md-6 mb-3">
                            <input type="text" class="form-control" id="lname" name="lname" placeholder="Last Name">
                            <label class="form-label">Last Name:</label>
                        </div>
                        <div class="form-floating col-md-6 mb-3">
                            <input type="text" class="form-control" id="age" name="age" placeholder="Age">
                            <label class="form-label">Age:</label>
                        </div>
                        <div class="form-floating col-md-6 mb-3">
                            <input type="text" class="form-control" id="address" name="address" placeholder="Address">
                            <label class="form-label">Address:</label>
                        </div>

                        <div class="form-floating col-md-6 mb-3">
                            <input type="contactno" class="form-control" id="contactno" name="contactnumber"
                                placeholder="Contact Number (ex.
                                09xxxxx)" minlength="11" maxlength="11" pattern="[0-9]{11}" onCopy="return false"
                                onDrag="return false" onDrop="return false" onPaste="return false" autocomplete="off">
                            <label class="form-label">Contact Number:</label>
                        </div>
                        <div class="form-floating col-md-6 mb-3">
                            <input type="email" class="form-control" id="email" name="email"
                                placeholder="name@example.com">
                            <label class="form-label">Email Address:</label>
                        </div>
                        <div class="form-floating col-md-6 mb-3">
                            <input type="password" class="form-control" id="password" name="password"
                                placeholder="Password">
                            <label class="form-label">Password:</label>
                        </div>
                        <div class="form-floating col-md-6 mb-3">
                            <input type="password" class="form-control" id="cpassword" name="cpassword"
                                placeholder="Password">
                            <label class="form-label">Confirm Password:</label>
                        </div>

                        <label class="form-label">Already have an account?
                            <a data-bs-target="#signinModal" data-bs-toggle="modal"
                                style="color: blue; text-decoration: underline; cursor: pointer;"
                                data-bs-dismiss="modal">Log In
                                here</a><br>
                            <span class="text-danger loginError"></span></label>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" name="submit" class="btn btn-primary" id="btnRegister">Register</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>