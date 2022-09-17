<nav class="navbar navbar-expand navbar-light navbar-bg">
  <a class="sidebar-toggle">
    <i class="hamburger align-self-center"></i>
  </a>

  <div class="navbar-collapse collapse">
    <ul class="navbar-nav navbar-align">
      <li class="nav-item dropdown">
        <a class="nav-icon dropdown-toggle" href="#" id="alertsDropdown" data-toggle="dropdown">
          <div class="position-relative">
            <i class="align-middle" data-feather="bell-off"></i>
          </div>
        </a>
        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right py-0" aria-labelledby="alertsDropdown">
          <div class="dropdown-menu-header" id="notif-count"></div>
          <div class="list-group" id="notif-details"></div>
        </div>
      </li>
      <li class="nav-item dropdown">
        <a class="nav-icon dropdown-toggle d-inline-block d-sm-none" href="#" data-toggle="dropdown">
          <i class="align-middle" data-feather="settings"></i>
        </a>

        <a class="nav-link dropdown-toggle d-none d-sm-inline-block" href="#" data-toggle="dropdown">
          <!-- <img src="../assets/img/avatars/avatar.jpg" class="avatar img-fluid rounded-circle mr-1" alt="Chris Wood" />  -->
          <span class="text-dark"><?php echo $_SESSION['email'] ?></span>
        </a>
        <div class="dropdown-menu dropdown-menu-right">
          <!-- <a class="dropdown-item" href="pages-profile.html"><i class="align-middle mr-1" data-feather="user"></i> -->
          <!-- Profile</a> -->
          <!-- <a class="dropdown-item" href="#"><i class="align-middle mr-1" data-feather="pie-chart"></i> Analytics</a> -->
          <!-- <div class="dropdown-divider"></div> -->
          <a class="dropdown-item" href="pages-settings.html">Settings & Privacy</a>
          <!-- <a class="dropdown-item" href="#">Help</a> -->
          <a class="dropdown-item" href="../../logout.php">Sign out</a>
        </div>
      </li>
    </ul>
  </div>
</nav>

<script>
  $(document).ready(function() {
    const load_notification = () => {
      $.ajax({
        method: 'POST',
        url: '../functions/load_notification.php',
        dataType: 'JSON',
        data: {},
        success: function(res) {
          // console.log(res);

          const notif_count = res.data.length;
          $("#notif-count").text(notif_count > 0 ? `${notif_count} New Notification` : '0 New Notification');
          let str = ``;

          if (notif_count > 0) {
            for (let i in res.data) {
              str += `
                <a href="#" class="list-group-item">
                  <div class="row no-gutters align-items-center">
                    <div class="col-2">
                      <i class="text-primary far fa-fw fa-bell" style='font-size: 22px;'></i>
                    </div>
                    <div class="col-10">
                      <div class="text-dark">${res.data[i].title}</div>
                      <div class="text-muted mt-1">${res.data[i].description}</div>
                    </div>
                  </div>
                </a>
              `;
            }

            $("#notif-details").html(str);
          }
        }
      });
    }

    load_notification();
  });
</script>