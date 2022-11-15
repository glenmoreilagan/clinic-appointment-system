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

    <title>Health Declaration</title>

    <link rel="shortcut icon" href="../../image/favicon.png">

    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500&amp;display=swap" rel="stylesheet">

    <!-- Choose your prefered color scheme -->
    <!-- <link href="css/light.css" rel="stylesheet"> -->
    <!-- <link href="css/dark.css" rel="stylesheet"> -->

    <!-- BEGIN SETTINGS -->
    <!-- Remove this after purchasing -->
    <link class="js-stylesheet" href="../assets/css/light.css" rel="stylesheet">
    <link class="js-stylesheet" href="../assets/css/forms.css" rel="stylesheet">
    <link rel="stylesheet" href="../../assets/toastr/build/toastr.min.css">
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
                            <i class="align-middle"></i> <span class="align-middle">Dashboard</span>
                        </a>
                    </li>
                    <li class="sidebar-item">
                        <a class="sidebar-link" href=<?php echo $host . "admin/appointments/"; ?>>
                            <i class="align-middle"></i> <span class="align-middle">Appointments</span>
                        </a>
                    </li>
                    <li class="sidebar-item">
                        <a class="sidebar-link" href=<?php echo $host . "admin/schedules/"; ?>>
                            <i class="align-middle"></i> <span class="align-middle">Schedules</span>
                        </a>
                    </li>
                    <li class="sidebar-item">
                        <a class="sidebar-link" href=<?php echo $host . "admin/patients/"; ?>>
                            <i class="align-middle"></i> <span class="align-middle">Patients</span>
                        </a>
                    </li>
                    <li class="sidebar-item">
                        <a class="sidebar-link" href=<?php echo $host . "admin/announcements/"; ?>>
                            <i class="align-middle"></i> <span class="align-middle">Announcements</span>
                        </a>
                    </li>
                    <li class="sidebar-item">
                        <a class="sidebar-link" href=<?php echo $host . "admin/services/"; ?>>
                            <i class="align-middle"></i> <span class="align-middle">Services</span>
                        </a>
                    </li>
                    <li class="sidebar-item">
                        <a class="sidebar-link" href=<?php echo $host . "admin/analytics/"; ?>>
                            <i class="align-middle"></i> <span class="align-middle">Analytics</span>
                        </a>
                    </li>
                    <li class="sidebar-item">
                        <a class="sidebar-link" href=<?php echo $host . "admin/periodcalendar/"; ?>>
                            <i class="align-middle"></i> <span class="align-middle">Period Calendar</span>
                        </a>
                    </li>
                    <li class="sidebar-item active">
                        <a class="sidebar-link" href=<?php echo $host . "admin/health-declaration/"; ?>>
                            <i class="align-middle"></i> <span class="align-middle">Health Declaration</span>
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
                            <h3>Health Declaration</h3>
                        </div>
                    </div>

                    <div class="card mb-3">
                        <div class="card-body">
                            <div class="table-responsive div-table-health-declaration">
                                <table class="nowrap table table-striped table-hover table-health-declaration"
                                    id="table-health-declaration" style="width: 100%;">
                                    <thead>
                                        <tr>
                                            <th>Name</th>
                                            <th>Address</th>
                                            <th>Are you experiencing? (nakakaranas ka ba ng?)</th>
                                            <th>Have you had a companion/family member who has symptoms of COVID-19?
                                                <br>
                                                (Ikaw ba ay may kasama sa bahay na may sintomas ng COVID-19?):
                                            </th>
                                            <th>Have you had any contact with anyone with COVID-19 symptoms on the past
                                                14 days? <br>
                                                (Ikaw ba ay nag-alaga ng pasyente o may nakasalamuha na may COVID-19 o
                                                anumang sintomas nito sa nagdaang 14 na araw?):</th>
                                            <th>Have you travelled to any area outside Batangas Province on the past 14
                                                days? <br>
                                                (Ikaw ba ay nagbyahe sa labas ng Probinsya ng Batangas sa nagdaang 14 na
                                                araw?):</th>
                                            <th>Date Created: </th>
                                        </tr>
                                    </thead>
                                    <tbody id="health_list"></tbody>
                                </table>
                            </div>
                        </div>
                    </div>

                </div>
            </main>
        </div>
    </div>

    <!-- MODALS -->
    <?php include_once '../modals/service_modal.php'; ?>
    <?php include '../modals/ILoader.php'; ?>
</body>

</html>
<script src="../assets/js/app.js"></script>
<script src="../../assets/toastr/toastr.js"></script>
<script src="../../assets/toastr/toastr-customize.js"></script>

<script>
$(document).ready(function() {
    let service_id = 0;

    let tbl_health = $('#table-health-declaration').DataTable({
        "responsive": true,
        "dom": '<"top"f>rt<"bottom"ip><"clear">',
        "pageLength": 10,
        "scrollY": "80em",
        "scrollX": true,
        "scrollCollapse": true,
        "fixedHeader": true,
        "ordering": false,
    });
    const load_services = () => {
        $("#ILoader").modal('show');
        $.ajax({
            method: 'POST',
            url: '../functions/load_health_declaration.php',
            dataType: 'JSON',
            data: {},
            success: function(res) {
                // console.log(res);
                let str = ``;
                let ready_data = [];
                for (let i in res.data) {
                    ready_data.push([
                        res.data[i].name,
                        res.data[i].address,
                        `
                <b class='text-primary'>${res.data[i].is_fever}</b> - Fever for the past few days (lagnat sa nakalipas na mga araw)
                <br>
                <b class='text-primary'>${res.data[i].is_cough}</b> - Cough/Colds (Ubo/Sipon)
                <br>
                <b class='text-primary'>${res.data[i].is_loss_smell}</b> - Loss of smell (Pagkawala ng pang-amoy)
                <br>
                <b class='text-primary'>${res.data[i].is_short_breath}</b> - Shortness of Breath/Difficulty of Breathing (Hirap ng Paghinga)
                <br>
                <b class='text-primary'>${res.data[i].is_sore_throat}</b> - Sore throat (Pananakit ng lalamunan)
                <br>
                <b class='text-primary'>${res.data[i].is_body_pain}</b> - Body Pains (Pananakit ng katawan)
                <br>
                <b class='text-primary'>${res.data[i].is_headache}</b> - Headache (Pananakit ng ulo)
              `,
                        `<br> <b class='text-primary'>${res.data[i].is_fam_covid}</b>`,
                        `<br> <b class='text-primary'>${res.data[i].is_contact_covid}</b>`,
                        `<br> <b class='text-primary'>${res.data[i].is_travelled_outside}</b>`,
                        `<br> <b class='text-primary'>${res.data[i].created_at}</b>`,
                    ]);
                }
                tbl_health.clear().rows.add(ready_data).draw();
                setTimeout(() => {
                    $("#ILoader").modal('hide');
                }, 1000);
            }
        });
    }

    $(".table-health-declaration").on("click", ".btnView", function(e) {
        e.preventDefault();

        service_id = $(this).attr('id').split('-')[1];
        edit_service(service_id);
    });

    load_services();
});
</script>