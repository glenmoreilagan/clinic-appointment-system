<nav id="sidebar" class="sidebar">
  <div class="sidebar-content js-simplebar">
    <a class="sidebar-brand" href="#">
      <!-- <svg version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" width="20px" height="20px" viewBox="0 0 20 20" enable-background="new 0 0 20 20" xml:space="preserve">
        <path d="M19.4,4.1l-9-4C10.1,0,9.9,0,9.6,0.1l-9,4C0.2,4.2,0,4.6,0,5s0.2,0.8,0.6,0.9l9,4C9.7,10,9.9,10,10,10s0.3,0,0.4-0.1l9-4
              C19.8,5.8,20,5.4,20,5S19.8,4.2,19.4,4.1z" />
        <path d="M10,15c-0.1,0-0.3,0-0.4-0.1l-9-4c-0.5-0.2-0.7-0.8-0.5-1.3c0.2-0.5,0.8-0.7,1.3-0.5l8.6,3.8l8.6-3.8c0.5-0.2,1.1,0,1.3,0.5
              c0.2,0.5,0,1.1-0.5,1.3l-9,4C10.3,15,10.1,15,10,15z" />
        <path d="M10,20c-0.1,0-0.3,0-0.4-0.1l-9-4c-0.5-0.2-0.7-0.8-0.5-1.3c0.2-0.5,0.8-0.7,1.3-0.5l8.6,3.8l8.6-3.8c0.5-0.2,1.1,0,1.3,0.5
              c0.2,0.5,0,1.1-0.5,1.3l-9,4C10.3,20,10.1,20,10,20z" />
      </svg> -->

      <span class="align-middle">LJ CURA OB-GYN ULTRASOUND CLINIC</span>
    </a>
    <?php
    // heres the settings for local or live
    include '../../host_setting.php';
    ?>
    <ul class="sidebar-nav">
      <!-- <li class="sidebar-item">
        <a href="#masterfile" data-toggle="collapse" class="sidebar-link collapsed">
          <i class="align-middle"></i> <span class="align-middle">Masterfile</span>
        </a>
        <ul id="masterfile" class="sidebar-dropdown list-unstyled collapse " data-parent="#sidebar">
          <li class="sidebar-item"><a class="sidebar-link" href="#">Customers</a></li>
          <li class="sidebar-item"><a class="sidebar-link" href="#">Users</a></li>
        </ul>
      </li> -->
      <li class="sidebar-item">
        <a class="sidebar-link" href=<?php echo $host . "admin/dashboard/"; ?>>
          <i class="align-middle"></i> <span class="align-middle">Dashboard</span>
        </a>
      </li>
      <li class="sidebar-item">
        <a class="sidebar-link" href=<?php echo $host . "admin/appointments/"; ?>>
          <i class="align-middle"></i> <span class="align-middle">Appointments</span>
        </a>
      </li>
      <li class="sidebar-item">
        <a class="sidebar-link" href="index.php">
          <i class="align-middle"></i> <span class="align-middle">Patients</span>
        </a>
      </li>
      <li class="sidebar-item">
        <a class="sidebar-link" href="index.php">
          <i class="align-middle"></i> <span class="align-middle">Announcements</span>
        </a>
      </li>
      <li class="sidebar-item">
        <a class="sidebar-link" href=<?php echo $host . "admin/services/"; ?>>
          <i class="align-middle"></i> <span class="align-middle">Services</span>
        </a>
      </li>
      <li class="sidebar-item">
        <a class="sidebar-link" href="index.php">
          <i class="align-middle"></i> <span class="align-middle">Analytics</span>
        </a>
      </li>
      <!-- <li class="sidebar-item">
        <a href="#multi" data-toggle="collapse" class="sidebar-link collapsed">
          <i class="align-middle"></i> <span class="align-middle">Multi Level</span>
        </a>
        <ul id="multi" class="sidebar-dropdown list-unstyled collapse" data-parent="#sidebar">
          <li class="sidebar-item">
            <a href="#multi-2" data-toggle="collapse" class="sidebar-link collapsed">
              Two Levels
            </a>
            <ul id="multi-2" class="sidebar-dropdown list-unstyled collapse">
              <li class="sidebar-item">
                <a class="sidebar-link" href="#">Item 1</a>
                <a class="sidebar-link" href="#">Item 2</a>
              </li>
            </ul>
          </li>
          <li class="sidebar-item">
            <a href="#multi-3" data-toggle="collapse" class="sidebar-link collapsed">
              Three Levels
            </a>
            <ul id="multi-3" class="sidebar-dropdown list-unstyled collapse">
              <li class="sidebar-item">
                <a href="#multi-3-1" data-toggle="collapse" class="sidebar-link collapsed">
                  Item 1
                </a>
                <ul id="multi-3-1" class="sidebar-dropdown list-unstyled collapse">
                  <li class="sidebar-item">
                    <a class="sidebar-link" href="#">Item 1</a>
                    <a class="sidebar-link" href="#">Item 2</a>
                  </li>
                </ul>
              </li>
              <li class="sidebar-item">
                <a class="sidebar-link" href="#">Item 2</a>
              </li>
            </ul>
          </li>
        </ul>
      </li> -->
    </ul>
  </div>
</nav>