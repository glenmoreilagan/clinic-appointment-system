<div class="modal fade" id="signinModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
    aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <form action="functions/login_func.php" method="POST">
                <div class="modal-header">
                    <h5 class="modal-title d-flex align-items-center">Sign In</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="mb-3">
                        <label class="form-label">Email Address:</label>
                        <input type="email" placeholder="Email" class="form-control shadow-none" name="email">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Password:</label>
                        <input type="password" placeholder="Password" id="myInput" class="form-control shadow-none"
                            name="password">
                        <input type="checkbox" onclick="myFunction()">Show Password
                    </div>
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
    var x = document.getElementById("myInput");
    if (x.type === "password") {
        x.type = "text";
    } else {
        x.type = "password";
    }
}
</script>