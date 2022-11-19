<nav class="navbar navbar-expand-lg navbar-light bg-light px-lg-3 py-lg-2 shadow-sm sticky-top">
    <a class="navbar-brand" href="#">
        <img src="image/logo.png" width="200" height="58" alt="Lj Cura">
    </a>
    <button class="navbar-toggler shadow-none" type="button" data-bs-toggle="collapse"
        data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
        aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav ms-auto">
            <li class="nav-item">
                <a class="nav-link" aria-current="page" href="index">Home</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="services">Services</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="about">About Us</a>
            </li>
        </ul>
        <form class="d-flex">
            <button type="button" class="btn btn-outline-dark shadow-none me-lg-2 me-2" data-bs-toggle="modal"
                data-bs-target="#signupModal">Register</button>
            <button type="button" class="btn btn-outline-dark shadow-none" data-bs-toggle="modal"
                data-bs-target="#signinModal">Log In</button>
        </form>

    </div>
    </ul>
    </div>
    </div>
</nav>

<?php include('includes/register-modal.php'); ?>
<?php include('includes/login-modal.php'); ?>