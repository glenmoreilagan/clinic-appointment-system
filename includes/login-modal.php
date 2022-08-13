

<div class="modal fade" id="signinModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
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
        <input type="password" placeholder="Password" class="form-control shadow-none" name="password">
      </div>
      <a href="javascript: void(0)" class="text-decoration-none">Forgot Password?</a>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="submit" name="submit" class="btn btn-primary">Login</button>
      </div>
    </form>
   </div>
  </div>
</div>