<?php
include_once '../functions/session_config.php';
?>
<!DOCTYPE html>
<html lang="en">


<!-- Mirrored from appstack.bootlab.io/calendar.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 04 Jan 2021 13:06:37 GMT -->
<!-- Added by HTTrack -->
<meta http-equiv="content-type" content="text/html;charset=UTF-8" /><!-- /Added by HTTrack -->

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Responsive Bootstrap 4 Admin &amp; Dashboard Template">
    <meta name="author" content="Bootlab">

    <title>Reports</title>

    <link rel="shortcut icon" href="../../image/favicon.png">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.2/font/bootstrap-icons.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500&amp;display=swap" rel="stylesheet">

    <!-- Choose your prefered color scheme -->
    <!-- <link href="css/light.css" rel="stylesheet"> -->
    <!-- <link href="css/dark.css" rel="stylesheet"> -->

    <!-- BEGIN SETTINGS -->
    <!-- Remove this after purchasing -->
    <link class="js-stylesheet" href="../assets/css/light.css" rel="stylesheet">
    <link class="js-stylesheet" href="../assets/css/forms.css" rel="stylesheet">
    <link rel="stylesheet" href="../../assets/toastr/build/toastr.min.css">
    <!-- <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.12.1/css/jquery.dataTables.css">
  <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.js"></script> -->
</head>
<!--
  HOW TO USE: 
  data-theme: default (default), dark, light
  data-layout: fluid (default), boxed
  data-sidebar-position: left (default), right
  data-sidebar-behavior: sticky (default), fixed, compact
-->

<body data-theme="default" data-layout="fluid" data-sidebar-position="left" data-sidebar-behavior="sticky">
    <div class="wrapper">
        <nav id="sidebar" class="sidebar">
            <div class="sidebar-content js-simplebar">
                <a class="sidebar-brand" href="#">
                    <span class="align-middle"><img width="215" height="60" src="../../image/addash.png"
                            alt="LJ CURA OB-GYN ULTRA SOUND CLINIC"></span>
                </a>
                <?php
        // heres the settings for local or live
        include '../../host_setting.php';
        ?>
                <ul class="sidebar-nav">
                    <li class="sidebar-item">
                        <a class="sidebar-link" href=<?php echo $host . "admin/dashboard/"; ?>>
                            <i class="align-middle" data-feather="sliders"></i> <span
                                class=" align-middle">Dashboard</span>
                        </a>
                    </li>
                    <li class="sidebar-item">
                        <a class="sidebar-link" href=<?php echo $host . "admin/appointments/"; ?>>
                            <i class="align-middle fas fa-fw fa-clipboard-list"></i> <span
                                class="align-middle">Appointments</span>
                        </a>
                    </li>
                    <li class="sidebar-item">
                        <a class="sidebar-link" href=<?php echo $host . "admin/schedules/"; ?>>
                            <i class="align-middle far fa-fw fa-calendar-plus"></i> <span
                                class="align-middle">Schedules</span>
                        </a>
                    </li>
                    <li class="sidebar-item">
                        <a class="sidebar-link" href=<?php echo $host . "admin/patients/"; ?>>
                            <i class="align-middle fas fa-fw fa-user-check"></i> <span
                                class="align-middle">Patients</span>
                        </a>
                    </li>
                    <li class="sidebar-item">
                        <a class="sidebar-link" href=<?php echo $host . "admin/announcements/"; ?>>
                            <i class="align-middle bi bi-megaphone"></i> <span class="align-middle">Announcements</span>
                        </a>
                    </li>
                    <li class="sidebar-item">
                        <a class="sidebar-link" href=<?php echo $host . "admin/services/"; ?>>
                            <i class="align-middle bi bi-ui-checks"></i> <span class="align-middle">Services</span>
                        </a>
                    </li>
                    <li class="sidebar-item">
                        <a class="sidebar-link" href=<?php echo $host . "admin/analytics/"; ?>>
                            <i class="align-middle fas fa-fw fa-chart-line"></i> <span
                                class="align-middle">Analytics</span>
                        </a>
                    </li>
                    <li class="sidebar-item">
                        <a class="sidebar-link" href=<?php echo $host . "admin/periodcalendar/"; ?>>
                            <i class="align-middle far fa-fw fa-calendar-alt"></i> <span class="align-middle">Period
                                Calendar</span>
                        </a>
                    </li>
                    <li class="sidebar-item">
                        <a class="sidebar-link" href=<?php echo $host . "admin/health-declaration/"; ?>>
                            <i class="align-middle fas fa-fw fa-hand-holding-heart"></i> <span
                                class="align-middle">Health Declaration</span>
                        </a>
                    </li>
                    <li class="sidebar-item">
                        <a class="sidebar-link" href=<?php echo $host . "admin/users/"; ?>>
                            <i class="align-middle fas fa-fw fa-users"></i> <span class="align-middle">Users</span>
                        </a>
                    </li>
                    <li class="sidebar-item active">
                        <a class="sidebar-link" href=<?php echo $host . "admin/reports/"; ?>>
                            <i class="align-middle fas fa-fw fa-receipt"></i> <span class="align-middle">Reports</span>
                        </a>
                    </li>
                </ul>
            </div>
        </nav>

        <div class="main">
            <!-- THIS IS FOR HEADER NAVIGATION BAR -->
            <?php include_once '../layouts/display_head_nav.php' ?>

            <main class="content">
                <div class="container-fluid p-0">
                    <div class="row mb-2 mb-xl-3">
                        <div class="col-auto d-none d-sm-block">
                            <h3>Schedules</h3>
                        </div>
                    </div>

                    <div class="card mb-3">
                        <div class="card-body">
                            <div class="mb-3">
                                <button class="btn btn-primary" id="btn_service_report">Service Report</button>
                            </div>
                        </div>
                    </div>
                </div>
            </main>
        </div>
    </div>

    <!-- MODALS -->
    <?php include_once '../modals/service_report_modal.php'; ?>
    <?php include_once '../modals/ILoader.php'; ?>
</body>

</html>
<script src="../assets/js/app.js"></script>
<script src="../../assets/toastr/toastr.js"></script>
<script src="../../assets/toastr/toastr-customize.js"></script>

<script>
$(document).ready(function() {
    const load_services = () => {
        $.ajax({
            method: 'POST',
            url: '../functions/load_services.php',
            dataType: 'JSON',
            data: {
                status: status
            },
            success: function(res) {
                // console.log(res);
                let str = ``;
                for (let i in res.data) {
                    str += `
              <option value="${res.data[i].id}">${res.data[i].service}</option>
            `;
                }

                $("#service").append(str);
            }
        });
    }

    $("#btn_service_report").click(function() {
        $("#service_report_modal").modal('show');
    });

    $("#btnDownload_service_report").click(function() {
        const date_start = $("input[name='date_start']").val();
        const date_end = $("input[name='date_end']").val();
        const service = $("select[name='service']").val();

        if (!date_start) {
            toastr.error("Date Start Required.");
            return;
        }

        if (!date_end) {
            toastr.error("Date End Required.");
            return;
        }

        let filter = `?date_start=${date_start}&date_end=${date_end}&service_id=${service}`;
        window.open(`../functions/download_PDF_service_report.php${filter}`, '_blank');
    });

    load_services();
});
</script>