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

    <title>Patients</title>

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
    <style>
    .btnApprove,
    .btnReject {
        /* text-align: left; */
        width: 90px !important;
    }

    .completed {
        background: #FF6699;
    }

    .cust_info {
        font-weight: 100;
    }
    </style>
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
                    <li class="sidebar-item active">
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
                            <h3>Patients</h3>
                        </div>

                        <div class="col-auto ml-auto text-right mt-n1">
                            <!-- <span class="dropdown mr-2">
                <button class="btn btn-light bg-white shadow-sm dropdown-toggle" id="day" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  <i class="align-middle mt-n1" data-feather="search"></i> Select Filter
                </button> -->
                            <!-- <div class="dropdown-menu"> -->
                            <!-- <h6 class="dropdown-header">Settings</h6> -->
                            <!-- <a class="dropdown-item filterMe" data-filter='pending'>Pending</a>
                  <a class="dropdown-item filterMe" data-filter='approved'>Approved</a>
                  <a class="dropdown-item filterMe" data-filter='completed'>Completed</a>
                  <a class="dropdown-item filterMe" data-filter='cancelled'>Cancelled</a> -->
                            <!-- <div class="dropdown-divider"></div>
                  <a class="dropdown-item" href="#">Separated link</a> -->
                            <!-- </div> -->
                            <!-- </span> -->

                            <!-- <button class="btn btn-primary shadow-sm">
                <i class="align-middle" data-feather="filter">&nbsp;</i>
              </button> -->
                            <button class="btn btn-primary shadow-sm downloadPDF" title="Download PDF">
                                <i class="fas fa-fw fa-download"></i> Download PDF
                            </button>
                            <button class="btn btn-primary shadow-sm refresh" title="Reset/Refresh">
                                <i class="align-middle" data-feather="refresh-cw">&nbsp;</i>
                            </button>
                        </div>
                    </div>

                    <div class="card mb-3">
                        <!-- <div class="card-header">
            </div> -->
                        <div class="card-body">
                            <div class="table-responsive div-table-patients">
                                <table class="table table-striped table-hover table-patients" id="table-patients"
                                    style="width: 100%;">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Name</th>
                                            <th>Address</th>
                                            <th>Contatct No.</th>
                                            <th>Email</th>
                                            <th class="th-actions">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody id="patients_list"></tbody>
                                </table>
                            </div>
                        </div>
                    </div>

                </div>
            </main>
        </div>
    </div>

    <!-- MODALS -->
    <?php include_once '../modals/patient_modal.php'; ?>
    <?php include_once '../modals/pdf_filter_modal.php'; ?>
    <?php include '../modals/ILoader.php'; ?>
</body>

</html>
<script src="../assets/js/app.js"></script>
<script src="../../assets/toastr/toastr.js"></script>
<script src="../../assets/toastr/toastr-customize.js"></script>

<script>
$(document).ready(function() {
    let patient_id = 0;
    let filter_status = 'all';

    let tbl_patient = $('#table-patients').DataTable({
        "responsive": true,
        "dom": '<"top"f>rt<"bottom"ip><"clear">',
        "pageLength": 10,
        "scrollY": "80em",
        "scrollX": true,
        "scrollCollapse": true,
        "fixedHeader": true,
        "ordering": false,
    });
    const load_patients = (status = 'all') => {
        $("#ILoader").modal('show');
        $.ajax({
            method: 'POST',
            url: '../functions/load_patients.php',
            dataType: 'JSON',
            data: {
                status: status
            },
            success: function(res) {
                // console.log(res);
                let str = ``;
                let ready_data = [];
                for (let i in res.data) {
                    ready_data.push([
                        res.data[i].id,
                        res.data[i].fullname,
                        res.data[i].address,
                        res.data[i].contactno,
                        res.data[i].email,
                        `<tr>
                <td>
                  <button class="btn btn-primary btn-sm btnView" id="r-${res.data[i].id}"><i class="align-middle fas fa-fw fa-eye"></i> View</button>
                </td>
              </tr>`,
                    ]);
                }
                tbl_patient.clear().rows.add(ready_data).draw();
                setTimeout(() => {
                    $("#ILoader").modal('hide');
                }, 1000);
            }
        });
    }

    $(".table-patients").on("click", ".btnView", function(e) {
        e.preventDefault();

        patient_id = $(this).attr('id').split('-')[1];

        $.ajax({
            method: 'POST',
            url: '../functions/load_patients.php',
            dataType: 'JSON',
            data: {
                status: 'view-patient',
                patient_id: patient_id
            },
            success: function(res) {
                // console.log(res);
                if (res.status) {
                    let str = ``;
                    let ready_data = [];
                    $("#patient_modal #pname").text(res.data[0].fullname);
                    $("#patient_modal #age").text(res.data[0].age);
                    $("#patient_modal #address").text(res.data[0].address);
                    $("#patient_modal #contactno").text(res.data[0].contactno);
                    $("#patient_modal #email").text(res.data[0].email);
                    for (let i in res.data) {
                        str += `
                <tr>
                  <td>
                    ${res.data[i].time_schedule}
                    <br>
                    <b>${res.data[i].date_schedule}</b>
                  </td>
                  <td>
                    ${res.data[i].complaint}
                  </td>
                  <td>
                    ${res.data[i].service_title}
                  </td>
                    <td>
                    ${res.data[i].findings}
                  </td>
                  <td>
                    ${res.data[i].total_cost}
                  </td>
                </tr>
              `;
                    }
                    $("#patient_history_list").html(str);
                    $("#patient_modal").modal('show');
                } else {
                    if (res.data.length <= 0) {
                        toastr.error("No Record Found.");
                    } else {
                        toastr.error(res.msg);
                    }
                }
            }
        });

    });

    $(".refresh").click(function(e) {
        e.preventDefault();
        filter_status = 'all';

        load_patients(filter_status);
    });

    $(".downloadPDF").click(function(e) {
        e.preventDefault();

        $("input[name='date_start']").val('');
        $("input[name='date_end']").val('');

        $("#pdf_filter_modal").modal('show');
        // window.open('../functions/download_PDF_Patients.php','_blank');
    });

    $("#pdf_filter_modal #btnDownload").click(function(e) {
        e.preventDefault();


        const date_start = $("input[name='date_start']").val();
        const date_end = $("input[name='date_end']").val();

        if (!date_start) {
            toastr.error("Date Start Required.");
            return;
        }

        if (!date_end) {
            toastr.error("Date End Required.");
            return;
        }

        let filter = `?date_start=${date_start}&date_end=${date_end}`;
        window.open(`../functions/download_PDF_Patients.php${filter}`, '_blank');
    })

    load_patients(filter_status);
});
</script>