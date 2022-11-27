<div class="modal fade" id="signinModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
    aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <form action="functions/login_func.php" method="POST">
                <div class="modal-header">
                    <h5 class="modal-title d-flex align-items-center">Log In</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="form-floating mb-3">
                        <input type="email" class="form-control" id="emailt" name="email"
                            placeholder="name@example.com">
                        <label class="form-label">Email Address:</label>
                    </div>
                    <div class="form-floating">
                        <input type="password" class="form-control" id="password" name="password"
                            placeholder="Password">
                        <label class="form-label">Password:</label>
                        <input type="checkbox" onclick="myFunction()">Show Password
                    </div>
                    <label class="form-label">Don't have an account?
                        <a data-bs-target="#signupModal" data-bs-toggle="modal"
                            style="color: blue; text-decoration: underline; cursor: pointer;"
                            data-bs-dismiss="modal">Register
                            here</a><br>
                        <a href="reset-password.php" class="text-decoration-none">Forgot Password?</a><br>
                        <span class="text-danger loginError"></span>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" name="submit" class="btn btn-primary" id="btnLogin">Login</button>
                </div>
            </form>
        </div>
    </div>
</div>

<script>
function myFunction() {
    var x = document.getElementById('password');
    if ((x.type) === "password") {
        x.type = "text";
    } else {
        x.type = "password";
    }
}
</script>