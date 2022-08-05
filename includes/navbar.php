<nav class="navbar navbar-expand-lg navbar-light bg-light px-lg-3 py-lg-2 shadow-sm sticky-top">
<a class="navbar-brand" href="#">
    <img src="image/logo.png" width="210" height="70" alt="">
  </a>
  <button class="navbar-toggler shadow-none" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav ms-auto">
      <li class="nav-item">
        <a class="nav-link active" aria-current="page" href="#">Home</a>
        </li>
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">Services</a>
          <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
            <li><a class="dropdown-item" href="#">For Pregnant</a></li>
            <li><a class="dropdown-item" href="#">For Non-pregnant</a></li>
            <li><hr class="dropdown-divider"></li>
            <li><a class="dropdown-item" href="#">All services</a></li>
          </ul>
        </li>
      <li class="nav-item">
        <a class="nav-link" href="#">About Us</a>
      </li>

      </ul>
      <form class="d-flex">
        <button type="button" class="btn btn-outline-dark shadow-none me-lg-2 me-2" data-bs-toggle="modal" data-bs-target="#signupModal">Sign up</button>
        <button type="button" class="btn btn-outline-dark shadow-none" data-bs-toggle="modal" data-bs-target="#signinModal">Sign in</button>
      </form>

    </div>
      </ul>
    </div>
  </div>
</nav>

<?php include('includes/register-modal.php'); ?>
<?php include('includes/login-modal.php'); ?>
