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

    <title>Analytics</title>

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

    <style>
    .cust_info {
        font-weight: 100;
    }

    .chart-lg {
        position: relative;
    }

    #chartjs-dashboard-bar {
        position: absolute;
        width: 100%;
        height: 100%;
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
                    <li class="sidebar-item active">
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
                    <li class="sidebar-item">
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
                            <h1 class="h3">Analytics</h1>
                        </div>

                        <!-- <div class="col-auto ml-auto text-right mt-n1">
              <button class="btn btn-primary shadow-sm refresh" title="Reset/Refresh">
                <i class="align-middle" data-feather="refresh-cw">&nbsp;</i>
              </button>
            </div> -->
                    </div>

                    <!-- Monthly Appointment Status -->
                    <div class="card-body mt-3" style="padding: 0 !important;">
                        <div class="row">
                            <div class="col-12 col-lg-12 d-flex">
                                <div class="card flex-fill w-100">
                                    <div class="card-header">
                                        <div class="row mb-2 mb-xl-3">
                                            <div class="col-auto">
                                                <h5 class="card-title mb-0" id="monthly-status-label">Monthly
                                                    Appointment Status</h5>
                                            </div>

                                            <div class="col-auto ml-auto text-right mt-n1">
                                                <div class="form-group">
                                                    <div class="input-group">
                                                        <select class="monthly-dropdown form-control form-control-sm"
                                                            name="monthlyStatus" id="monthlyStatus">
                                                            <option value="1">January</option>
                                                            <option value="2">February</option>
                                                            <option value="3">March</option>
                                                            <option value="4">April</option>
                                                            <option value="5">May</option>
                                                            <option value="6">June</option>
                                                            <option value="7">July</option>
                                                            <option value="8">August</option>
                                                            <option value="9">September</option>
                                                            <option value="10">October</option>
                                                            <option value="11">November</option>
                                                            <option value="12">December</option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card-body d-flex w-100">
                                        <div class="chart-lg" style="width: 100%;">
                                            <canvas id="chartjs-status-monthly"></canvas>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Monthly Pregnancy Status -->
                    <div class="card-body mt-3" style="padding: 0 !important;">
                        <div class="row">
                            <div class="col-12 col-lg-12 d-flex">
                                <div class="card flex-fill w-100">
                                    <div class="card-header">
                                        <div class="row mb-2 mb-xl-3">
                                            <div class="col-auto">
                                                <h5 class="card-title mb-0" id="monthly-pregnancy-label">Monthly
                                                    Pregnancy Status</h5>
                                            </div>

                                            <div class="col-auto ml-auto text-right mt-n1">
                                                <div class="form-group">
                                                    <div class="input-group">
                                                        <select class="monthly-dropdown form-control form-control-sm"
                                                            name="monthlyPregnancyStatus" id="monthlyPregnancyStatus">
                                                            <option value="1">January</option>
                                                            <option value="2">February</option>
                                                            <option value="3">March</option>
                                                            <option value="4">April</option>
                                                            <option value="5">May</option>
                                                            <option value="6">June</option>
                                                            <option value="7">July</option>
                                                            <option value="8">August</option>
                                                            <option value="9">September</option>
                                                            <option value="10">October</option>
                                                            <option value="11">November</option>
                                                            <option value="12">December</option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card-body d-flex w-100">
                                        <div class="chart-lg" style="width: 100%;">
                                            <canvas id="chartjs-pregnancy-status-monthly"></canvas>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Monthly Top 3 Services -->
                    <div class="card-body mt-3" style="padding: 0 !important;">
                        <div class="row">
                            <div class="col-12 col-lg-12 d-flex">
                                <div class="card flex-fill w-100">
                                    <div class="card-header">
                                        <div class="row mb-2 mb-xl-3">
                                            <div class="col-auto">
                                                <h5 class="card-title mb-0" id="monthly-services-label">Monthly Top 3
                                                    Services</h5>
                                            </div>

                                            <div class="col-auto ml-auto text-right mt-n1">
                                                <div class="form-group">
                                                    <div class="input-group">
                                                        <select class="monthly-dropdown form-control form-control-sm"
                                                            name="monthlyServices" id="monthlyServices">
                                                            <option value="1">January</option>
                                                            <option value="2">February</option>
                                                            <option value="3">March</option>
                                                            <option value="4">April</option>
                                                            <option value="5">May</option>
                                                            <option value="6">June</option>
                                                            <option value="7">July</option>
                                                            <option value="8">August</option>
                                                            <option value="9">September</option>
                                                            <option value="10">October</option>
                                                            <option value="11">November</option>
                                                            <option value="12">December</option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card-body d-flex w-100">
                                        <div class="chart-lg" style="width: 100%;">
                                            <canvas id="chartjs-services-monthly"></canvas>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Monthly Income Status -->
                    <div class="card-body mt-3" style="padding: 0 !important;">
                        <div class="row">
                            <div class="col-12 col-lg-12 d-flex">
                                <div class="card flex-fill w-100">
                                    <div class="card-header">
                                        <div class="row mb-2 mb-xl-3">
                                            <div class="col-auto">
                                                <h5 class="card-title mb-0" id="monthly-income-status-label">Monthly
                                                    Income Status</h5>
                                            </div>

                                            <div class="col-auto ml-auto text-right mt-n1">
                                                <div class="form-group">
                                                    <div class="input-group">
                                                        <select class="monthly-dropdown form-control form-control-sm"
                                                            name="monthlyIncomeStatus"
                                                            id="monthlyIncomeStatus"></select>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card-body d-flex w-100">
                                        <div class="chart-lg" style="width: 100%;">
                                            <canvas id="chartjs-monthly-income-status"></canvas>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Services & Total Patients and Appointment Yearly Status -->
                    <!-- <div class="card mb-3"> -->
                    <div class="card-body mt-3" style="padding: 0 !important;">
                        <div class="row">
                            <div class="col-12 col-lg-6 d-flex">
                                <div class="card flex-fill w-100">
                                    <div class="card-header">
                                        <div class="row mb-2 mb-xl-3">
                                            <div class="col-auto">
                                                <h5 class="card-title mb-0">Services & Total Patients</h5>
                                            </div>

                                            <!-- <div class="col-5 ml-auto text-right mt-n1">
                        <div class="text-left">
                          <label>Date Year: </label> <small class="font-13 text-muted">(e.g 2020)</small>
                        </div>

                        <div class="form-group">
                          <div class="input-group">
                            <input type="text" id="chartjs-dashboard-pie-year-filter" class="form-control form-control-sm" autocomplete="off">
                            <span class="input-group-append">
                              <button class="btn btn-primary btn-sm shadow-sm chartjs-dashboard-pie-year-search" title="Search">
                                <i class="align-middle" data-feather="search">&nbsp;</i>
                              </button>
                            </span>
                          </div>
                        </div>
                      </div> -->
                                        </div>
                                    </div>
                                    <div class="card-body d-flex">
                                        <div class="align-self-center w-100">
                                            <div class="py-3">
                                                <div class="chart chart-xs">
                                                    <canvas id="chartjs-dashboard-pie"></canvas>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div style="max-height: 350px; overflow-y: scroll;">
                                        <table class="table my-0">
                                            <thead>
                                                <tr>
                                                    <th class="w-50">Service</th>
                                                    <th class="text-right w-10">Patients</th>
                                                    <th class="d-none d-xl-table-cell w-75">%</th>
                                                </tr>
                                            </thead>
                                            <tbody id="loadServicePercentage"></tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>

                            <div class="col-12 col-lg-6 d-flex">
                                <div class="card flex-fill w-100">
                                    <div class="card-header">
                                        <div class="row mb-2 mb-xl-3">
                                            <div class="col-auto">
                                                <h5 class="card-title mb-0">Appointment Yearly Status</h5>
                                            </div>

                                            <div class="col-auto ml-auto text-right mt-n1">
                                                <div class="form-group">
                                                    <div class="input-group">
                                                        <select class="yearly-dropdown form-control form-control-sm"
                                                            name="yearlyAppointmentStatus"
                                                            id="yearlyAppointmentStatus"></select>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card-body d-flex w-100">
                                        <div class="chart-lg" style="width: 100%;">
                                            <canvas id="chartjs-dashboard-bar"></canvas>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- </div> -->

                    <!-- Yearly Income Status -->
                    <div class="card-body mt-3" style="padding: 0 !important;">
                        <div class="row">
                            <div class="col-12 col-lg-12 d-flex">
                                <div class="card flex-fill w-100">
                                    <div class="card-header">
                                        <div class="row mb-2 mb-xl-3">
                                            <div class="col-auto">
                                                <h5 class="card-title mb-0">Yearly Income Status</h5>
                                            </div>

                                            <div class="col-auto ml-auto text-right mt-n1">
                                                <div class="form-group">
                                                    <div class="input-group">
                                                        <select class="yearly-dropdown form-control form-control-sm"
                                                            name="yearlyIncomeStatus" id="yearlyIncomeStatus"></select>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card-body d-flex w-100">
                                        <div class="chart-lg" style="width: 100%;">
                                            <canvas id="chartjs-yearly-income-status-line"></canvas>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Yearly Top 3 Services -->
                    <div class="card-body mt-3" style="padding: 0 !important;">
                        <div class="row">
                            <div class="col-12 col-lg-12 d-flex">
                                <div class="card flex-fill w-100">
                                    <div class="card-header">
                                        <div class="row mb-2 mb-xl-3">
                                            <div class="col-auto">
                                                <h5 class="card-title mb-0">Yearly Top 3 Services</h5>
                                            </div>

                                            <div class="col-auto ml-auto text-right mt-n1">
                                                <div class="form-group">
                                                    <div class="input-group">
                                                        <select class="yearly-dropdown form-control form-control-sm"
                                                            name="yearlyTopServices" id="yearlyTopServices"></select>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card-body d-flex w-100">
                                        <div class="chart-lg" style="width: 100%;">
                                            <canvas id="chartjs-dashboard-line"></canvas>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </main>

            <!-- <footer class="footer">
        <div class="col-6">
          <p class="mb-0">
            &copy; 2022 - <a href="http://localhost/caps/" class="text-muted">LJ CURA OB-GYN ULTRASOUND CLINIC</a>
          </p>
        </div>
      </footer> -->
        </div>
    </div>

    <!-- MODALS -->
    <?php include_once '../modals/reject_appointment_modal.php'; ?>
    <?php include_once '../modals/view_appointment_modal.php'; ?>
    <?php include '../modals/ILoader.php'; ?>
</body>

</html>
<script src="../assets/js/app.js"></script>

<script>
$(document).ready(function() {
    $(".yearly-dropdown").html(`
      <option value="">Choose Year</option>
      <option value="2020">2020</option>
      <option value="2021">2021</option>
      <option value="2022">2022</option>
      <option value="2023">2023</option>
      <option value="2024">2024</option>
      <option value="2025">2025</option>
      <option value="2026">2026</option>
      <option value="2027">2027</option>
      <option value="2028">2028</option>
      <option value="2029">2029</option>
      <option value="2030">2030</option>
    `);

    $(".monthly-dropdown").html(`
      <option value="">Choose Month</option>
      <option value="1">January</option>
      <option value="2">February</option>
      <option value="3">March</option>
      <option value="4">April</option>
      <option value="5">May</option>
      <option value="6">June</option>
      <option value="7">July</option>
      <option value="8">August</option>
      <option value="9">September</option>
      <option value="10">October</option>
      <option value="11">November</option>
      <option value="12">December</option>
    `);



    const monthNames = ["January", "February", "March", "April", "May", "June",
        "July", "August", "September", "October", "November", "December"
    ];
    let d = new Date();
    let todayDate = d.toISOString().split('T')[0];
    let appointment_id = 0;

    $("#chartjs-dashboard-line-year-filter, #chartjs-dashboard-pie-year-filter, #chartjs-dashboard-bar-year-filter")
        .val(d.getFullYear());

    const my_line_chart = new Chart(document.getElementById("chartjs-dashboard-line"), {
        type: "line",
        data: {
            labels: ["January", "February", "March", "April", "May", "June", "July",
                "August", "September", "October", "November", "December"
            ],
            datasets: []
        },
        options: {
            responsive: true,
            maintainAspectRatio: false,
            cornerRadius: 15,
            legend: {
                display: true
            },
            scales: {
                yAxes: [{
                    gridLines: {
                        display: false
                    },
                    stacked: false,
                    ticks: {
                        stepSize: 5
                    },
                    stacked: false,
                }],
                xAxes: [{
                    stacked: false,
                    gridLines: {
                        color: "transparent"
                    },
                    stacked: false,
                }]
            }
        }
    });

    const my_bar_chart = new Chart(document.getElementById("chartjs-dashboard-bar"), {
        type: "bar",
        data: {
            labels: ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov",
                "Dec"
            ],
            datasets: []
        },
        options: {
            maintainAspectRatio: false,
            cornerRadius: 15,
            legend: {
                display: true
            },
            scales: {
                yAxes: [{
                    gridLines: {
                        display: false
                    },
                    stacked: false,
                    ticks: {
                        stepSize: 5
                    },
                    stacked: false,
                }],
                xAxes: [{
                    stacked: false,
                    gridLines: {
                        color: "transparent"
                    },
                    stacked: false,
                }]
            }
        }
    });

    function getDaysInCurrentMonth() {
        const date = new Date();
        return new Date(date.getFullYear(), date.getMonth() + 1, 0).getDate();
    }

    const monthly_headers = [];
    const num_days_this_month = getDaysInCurrentMonth();

    for (i = 1; i <= num_days_this_month; i++) {
        monthly_headers.push(i);
    }

    const chartjs_services_monthly = new Chart(document.getElementById("chartjs-services-monthly"), {
        type: "bar",
        data: {
            labels: monthly_headers,
            datasets: []
        },
        options: {
            maintainAspectRatio: false,
            cornerRadius: 15,
            legend: {
                display: true
            },
            scales: {
                yAxes: [{
                    gridLines: {
                        display: false
                    },
                    stacked: false,
                    ticks: {
                        stepSize: 5
                    },
                    stacked: false,
                }],
                xAxes: [{
                    stacked: false,
                    gridLines: {
                        color: "transparent"
                    },
                    stacked: false,
                }]
            }
        }
    });

    const chartjs_status_monthly = new Chart(document.getElementById("chartjs-status-monthly"), {
        type: "bar",
        data: {
            labels: monthly_headers,
            datasets: []
        },
        options: {
            maintainAspectRatio: false,
            cornerRadius: 15,
            legend: {
                display: true
            },
            scales: {
                yAxes: [{
                    gridLines: {
                        display: false
                    },
                    stacked: false,
                    ticks: {
                        stepSize: 5
                    },
                    stacked: false,
                }],
                xAxes: [{
                    stacked: false,
                    gridLines: {
                        color: "transparent"
                    },
                    stacked: false,
                }]
            }
        }
    });

    const chartjs_monthly_income_status = new Chart(document.getElementById("chartjs-monthly-income-status"), {
        type: "bar",
        data: {
            labels: monthly_headers,
            datasets: []
        },
        options: {
            maintainAspectRatio: false,
            cornerRadius: 15,
            legend: {
                display: false
            },
            scales: {
                yAxes: [{
                    gridLines: {
                        display: false
                    },
                    stacked: false,
                    ticks: {
                        stepSize: 1000,
                        callback: function(value, index, values) {
                            if (parseInt(value) >= 1000) {
                                return '₱ ' + value.toString().replace(
                                    /\B(?=(\d{3})+(?!\d))/g, ",");
                            } else {
                                return '₱ ' + value;
                            }
                        }
                    },
                    stacked: false,
                }],
                xAxes: [{
                    stacked: false,
                    gridLines: {
                        color: "transparent"
                    },
                    stacked: false,
                }]
            },
            tooltips: {
                callbacks: {
                    label: function(tooltipItem, data) {
                        return '₱ ' + tooltipItem.yLabel.toFixed(2).replace(/\d(?=(\d{3})+\.)/g,
                            '$&,');
                    }
                }
            }
        }
    });

    const my_line_chart_yearly_income_status = new Chart(document.getElementById(
        "chartjs-yearly-income-status-line"), {
        type: "line",
        data: {
            labels: ["January", "February", "March", "April", "May", "June", "July",
                "August", "September", "October", "November", "December"
            ],
            datasets: []
        },
        options: {
            responsive: true,
            maintainAspectRatio: false,
            cornerRadius: 15,
            legend: {
                display: false
            },
            scales: {
                yAxes: [{
                    gridLines: {
                        display: false
                    },
                    stacked: false,
                    ticks: {
                        stepSize: 1000,
                        callback: function(value, index, values) {
                            if (parseInt(value) >= 1000) {
                                return '₱ ' + value.toString().replace(
                                    /\B(?=(\d{3})+(?!\d))/g, ",");
                            } else {
                                return '₱ ' + value;
                            }
                        }
                    },
                    stacked: false,
                }],
                xAxes: [{
                    stacked: false,
                    gridLines: {
                        color: "transparent"
                    },
                    stacked: false,
                }],
            },
            tooltips: {
                callbacks: {
                    label: function(tooltipItem, data) {
                        return '₱ ' + tooltipItem.yLabel.toFixed(2).replace(/\d(?=(\d{3})+\.)/g,
                            '$&,');
                    }
                }
            }
        }
    });

    const chartjs_pregnancy_status_monthly = new Chart(document.getElementById(
        "chartjs-pregnancy-status-monthly"), {
        type: "bar",
        data: {
            labels: monthly_headers,
            datasets: []
        },
        options: {
            maintainAspectRatio: false,
            cornerRadius: 15,
            legend: {
                display: true
            },
            scales: {
                yAxes: [{
                    gridLines: {
                        display: false
                    },
                    stacked: false,
                    ticks: {
                        stepSize: 5
                    },
                    stacked: false,
                }],
                xAxes: [{
                    stacked: false,
                    gridLines: {
                        color: "transparent"
                    },
                    stacked: false,
                }]
            }
        }
    });

    // Monthly Top 3 Services
    const loadMonthlyServices = (month = '') => {
        // $("#monthly-services-label").text('Monthly Top 3 Services');

        $.ajax({
            method: 'POST',
            url: '../functions/load_analytics.php',
            dataType: 'JSON',
            data: {
                action: 'loadServicesChart_Monthly',
                filter: '',
                month: month
            },
            success: function(res) {
                // console.log(res.loadServicesChart_Monthly);
                const data = res.loadServicesChart_Monthly;
                let new_data = [];
                let dset1 = [];
                let dset2 = [];
                let dset3 = [];

                if (res.loadServicesChart_Monthly.length > 0) {
                    for (i = 1; i <= num_days_this_month; i++) {
                        if (data[0]) {
                            dset1.push(res.loadServicesChart_Monthly[0][`d${i}`]);
                        }
                        if (data[1]) {
                            dset2.push(res.loadServicesChart_Monthly[1][`d${i}`]);
                        }
                        if (data[2]) {
                            dset3.push(res.loadServicesChart_Monthly[2][`d${i}`]);
                        }
                    }

                    if (data[0]) {
                        new_data.push({
                            label: data[0].service_title,
                            fill: false,
                            backgroundColor: '#FFB1C1',
                            data: dset1,
                            categoryPercentage: .5
                        });
                    }
                    if (data[1]) {
                        new_data.push({
                            label: data[1].service_title,
                            fill: false,
                            backgroundColor: '#9AD0F5',
                            data: dset2,
                            categoryPercentage: .5
                        });
                    }
                    if (data[2]) {
                        new_data.push({
                            label: data[2].service_title,
                            fill: false,
                            backgroundColor: '#FFE6AA',
                            data: dset3,
                            categoryPercentage: .5
                        });
                    }
                }
                chartjs_services_monthly.data.datasets = new_data;
                chartjs_services_monthly.update();
            }
        });
    }

    // Monthly Appointment Status
    const loadMonthlyStatus = (month_appointment = '') => {
        // $("#monthly-status-label").text('Monthly Appointment Status');
        $.ajax({
            method: 'POST',
            url: '../functions/load_analytics.php',
            dataType: 'JSON',
            data: {
                action: 'loadAppointmentStatus_Monthly',
                filter: '',
                month_appointment: month_appointment
            },
            success: function(res) {
                // console.log(res.loadAppointmentStatus_Monthly);
                const data = res.loadAppointmentStatus_Monthly;
                let new_data = [];
                let dset1 = [];
                let dset2 = [];
                let dset3 = [];

                if (res.loadAppointmentStatus_Monthly.length > 0) {
                    for (i = 1; i <= num_days_this_month; i++) {
                        if (data[0]) {
                            dset1.push(res.loadAppointmentStatus_Monthly[0][`d${i}`]);
                        }
                        if (data[1]) {
                            dset2.push(res.loadAppointmentStatus_Monthly[1][`d${i}`]);
                        }
                        if (data[2]) {
                            dset3.push(res.loadAppointmentStatus_Monthly[2][`d${i}`]);
                        }
                    }

                    if (data[0]) {
                        new_data.push({
                            label: "Approved",
                            fill: false,
                            backgroundColor: '#97DBAE',
                            data: dset1,
                            categoryPercentage: .5
                        });
                    }
                    if (data[1]) {
                        new_data.push({
                            label: "Completed",
                            fill: false,
                            backgroundColor: '#9AD0F5',
                            data: dset2,
                            categoryPercentage: .5
                        });
                    }
                    if (data[2]) {
                        new_data.push({
                            label: "Rejected/Cancelled",
                            fill: false,
                            backgroundColor: '#FFB1C1',
                            data: dset3,
                            categoryPercentage: .5
                        });
                    }
                }
                chartjs_status_monthly.data.datasets = new_data;
                chartjs_status_monthly.update();
            }
        });
    }

    // Services & Total Patients
    const service_total_patient = (action, filter) => {
        // $("#ILoader").modal('show');

        let pie_chart_color = [];
        let pie_chart_data = [];
        let pie_chart_label = [];

        const random_colors = () => {
            const colors = [
                '#FA7171', '#FBF2CF', '#C6EBC5',
                '#B1B2FF', '#D2DAFF', '#3FA796',
                '#DEB6AB', '#C9BBCF', '#404F50',
                '#F4E06D', '#C499BA', '#CC9C75'
            ];
            // var r = Math.floor(Math.random() * 255);
            // var g = Math.floor(Math.random() * 255);
            // var b = Math.floor(Math.random() * 255);
            // return `rgb(${r},${g},${g})`;

            return colors[Math.floor(Math.random() * colors.length)];
        };

        $.ajax({
            method: 'POST',
            url: '../functions/load_analytics.php',
            dataType: 'JSON',
            data: {
                action: action,
                filter: filter
            },
            success: function(res) {
                // console.log(res.data);
                let str = ``;
                for (let i in res.data_loadServicePercentage) {
                    const bgcolor = random_colors();
                    pie_chart_color.push(bgcolor);
                    pie_chart_data.push(res.data_loadServicePercentage[i].service_count);
                    pie_chart_label.push(res.data_loadServicePercentage[i].service_title);

                    str += `
              <tr>
                <td>${res.data_loadServicePercentage[i].service_title}</td>
                <td class="text-right">${res.data_loadServicePercentage[i].service_count}</td>
                <td class="d-none d-xl-table-cell">
                  <small>${res.data_loadServicePercentage[i].service_percentage}%</small>
                  <div class="progress">
                    <div class="progress-bar" 
                      role="progressbar" 
                      style="width: ${res.data_loadServicePercentage[i].service_percentage}%; background-color: ${bgcolor}" 
                      aria-valuenow="${res.data_loadServicePercentage[i].service_percentage}" 
                      aria-valuemin="0" aria-valuemax="100">
                    </div>
                  </div>
                </td>
              </tr>
            `;
                }

                $("#loadServicePercentage").html(str);

                loadServicePercentageChart({
                    pie_chart_color,
                    pie_chart_data,
                    pie_chart_label
                });
                // loadServicesChart(res.data_loadServicesChart);
            }
        });
    }

    // Appointment Yearly Status
    const appointment_yearly_status = (action, filter) => {
        $.ajax({
            method: 'POST',
            url: '../functions/load_analytics.php',
            dataType: 'JSON',
            data: {
                action: action,
                filter: filter
            },
            success: function(res) {
                loadAppointmentYearlyStatusChart(res.data_loadAppointmentYearlyStatus);
            }
        });
    }

    // Yearly Top 3 Services
    const yearlyTopServices = (action, filter) => {
        $.ajax({
            method: 'POST',
            url: '../functions/load_analytics.php',
            dataType: 'JSON',
            data: {
                action: action,
                filter: filter
            },
            success: function(res) {
                loadServicesChart(res.data_loadServicesChart);
            }
        });
    }

    const loadServicesChart = (data) => {
        let new_data = [];

        if (data[0]) {
            new_data.push({
                label: `${data[0].service_title}`,
                // backgroundColor: window.theme.success,
                fill: false,
                borderColor: '#FFB1C1',
                // hoverBackgroundColor: window.theme.success,
                // hoverBorderColor: window.theme.success,
                data: [data[0].jan, data[0].feb, data[0].mar, data[0].apr, data[0].may, data[0].jun,
                    data[0].jul, data[0].aug, data[0].sep, data[0].oct, data[0].nov, data[0]
                    .dece
                ],
                // barPercentage: .325,
                // categoryPercentage: .5
            });
        }

        if (data[1]) {
            new_data.push({
                label: data[1].service_title,
                // backgroundColor: window.theme.primary,
                fill: false,
                borderColor: '#9AD0F5',
                // hoverBackgroundColor: window.theme.primary,
                // hoverBorderColor: window.theme.primary,
                data: [data[1].jan, data[1].feb, data[1].mar, data[1].apr, data[1].may, data[1].jun,
                    data[1].jul, data[1].aug, data[1].sep, data[1].oct, data[1].nov, data[1]
                    .dece
                ],
                // barPercentage: .325,
                // categoryPercentage: .5
            });
        }

        if (data[2]) {
            new_data.push({
                label: data[2].service_title,
                // backgroundColor: window.theme.danger,
                fill: false,
                borderColor: '#FFE6AA',
                // hoverBackgroundColor: window.theme.danger,
                // hoverBorderColor: window.theme.danger,
                data: [data[2].jan, data[2].feb, data[2].mar, data[2].apr, data[2].may, data[2].jun,
                    data[2].jul, data[2].aug, data[2].sep, data[2].oct, data[2].nov, data[2]
                    .dece
                ],
                // barPercentage: .325,
                // categoryPercentage: .5
            });
        }

        my_line_chart.data.datasets = new_data;
        my_line_chart.update();
    }

    const loadServicePercentageChart = (chart_infos) => {
        if (chart_infos.pie_chart_data.length <= 0) {
            new Chart(document.getElementById("chartjs-dashboard-pie")).destroy();
            return;
        }

        new Chart(document.getElementById("chartjs-dashboard-pie"), {
            type: "pie",
            data: {
                labels: chart_infos.pie_chart_label,
                datasets: [{
                    data: chart_infos.pie_chart_data,
                    backgroundColor: chart_infos.pie_chart_color,
                    borderWidth: 5,
                    borderColor: window.theme.white
                }]
            },
            options: {
                responsive: !window.MSInputMethodContext,
                maintainAspectRatio: false,
                cutoutPercentage: 70,
                legend: {
                    display: false
                }
            }
        });
    }

    // Appointment Yearly Status
    const loadAppointmentYearlyStatusChart = (data) => {
        // new Chart(document.getElementById("chartjs-dashboard-bar")).destroy();
        const new_data = [{
            label: "Approved",
            backgroundColor: '#97DBAE',
            // borderColor: window.theme.success,
            // hoverBackgroundColor: window.theme.success,
            // hoverBorderColor: window.theme.success,
            data: [data[0].jan, data[0].feb, data[0].mar, data[0].apr, data[0].may, data[0].jun,
                data[0].jul, data[0].aug, data[0].sep, data[0].oct, data[0].nov, data[0].dece
            ],
            barPercentage: .8,
            categoryPercentage: .8
        }, {
            label: "Completed",
            backgroundColor: '#9AD0F5',
            // borderColor: window.theme.primary,
            // hoverBackgroundColor: window.theme.primary,
            // hoverBorderColor: window.theme.primary,
            data: [data[1].jan, data[1].feb, data[1].mar, data[1].apr, data[1].may, data[1].jun,
                data[1].jul, data[1].aug, data[1].sep, data[1].oct, data[1].nov, data[1].dece
            ],
            barPercentage: .8,
            categoryPercentage: .8
        }, {
            label: "Rejected/Cancelled",
            backgroundColor: '#FFB1C1',
            // borderColor: window.theme.danger,
            // hoverBackgroundColor: window.theme.danger,
            // hoverBorderColor: window.theme.danger,
            data: [data[2].jan, data[2].feb, data[2].mar, data[2].apr, data[2].may, data[2].jun,
                data[2].jul, data[2].aug, data[2].sep, data[2].oct, data[2].nov, data[2].dece
            ],
            barPercentage: .8,
            categoryPercentage: .8
        }];

        my_bar_chart.data.datasets = new_data;
        my_bar_chart.update();
    }

    // Monthly Income Status
    const loadMonthlyIncome = (month = '') => {
        // $("#monthly-income-status-label").text('Monthly Income Status');
        $.ajax({
            method: 'POST',
            url: '../functions/load_analytics.php',
            dataType: 'JSON',
            data: {
                action: 'loadMonthlyIncome',
                filter: '',
                month: month
            },
            success: function(res) {
                // console.log(res);
                const data = res.loadMonthlyIncome;
                let new_data = [];
                let dset1 = [];

                if (res.loadMonthlyIncome.length > 0) {
                    for (i = 1; i <= num_days_this_month; i++) {
                        dset1.push(res.loadMonthlyIncome[0][`d${i}`]);
                    }

                    if (data[0]) {
                        new_data.push({
                            label: "Pesos",
                            fill: false,
                            backgroundColor: '#9AD0F5',
                            data: dset1,
                            categoryPercentage: .2
                        });
                    }
                }
                chartjs_monthly_income_status.data.datasets = new_data;
                chartjs_monthly_income_status.update();
            }
        });
    }

    // Yearly Income Status
    const loadYearlyIncome = (year = '') => {
        $.ajax({
            method: 'POST',
            url: '../functions/load_analytics.php',
            dataType: 'JSON',
            data: {
                action: 'loadYearlyIncome',
                filter: '',
                year: year
            },
            success: function(res) {
                // console.log(res);
                const data = res.loadYearlyIncome;
                let new_data = [];

                if (res.loadYearlyIncome.length > 0) {
                    if (data[0]) {
                        new_data.push({
                            label: `Pesos`,
                            // backgroundColor: window.theme.success,
                            fill: false,
                            borderColor: '#FFB1C1',
                            // hoverBackgroundColor: window.theme.success,
                            // hoverBorderColor: window.theme.success,
                            data: [data[0].jan, data[0].feb, data[0].mar, data[0].apr,
                                data[0].may, data[0].jun,
                                data[0].jul, data[0].aug, data[0].sep, data[0].oct,
                                data[0].nov, data[0].dece
                            ],
                            // barPercentage: .325,
                            // categoryPercentage: .5
                        });
                    }
                }
                my_line_chart_yearly_income_status.data.datasets = new_data;
                my_line_chart_yearly_income_status.update();
            }
        });
    }

    // Yearly Income Status
    $("#yearlyIncomeStatus").change(function(e) {
        e.preventDefault();

        let selected_year = $(this).val();

        loadYearlyIncome(selected_year);
    });

    // Monthly Income Status
    $("#monthlyIncomeStatus").change(function(e) {
        e.preventDefault();

        let selected_month = $(this).val();

        loadMonthlyIncome(selected_month);
    });

    // Monthly Appointment Status
    $("#monthlyStatus").change(function(e) {
        e.preventDefault();

        let selected_month = $(this).val();

        loadMonthlyStatus(selected_month);
    });

    // Monthly Top 3 Services
    $("#monthlyServices").change(function(e) {
        e.preventDefault();

        let selected_month = $(this).val();

        loadMonthlyServices(selected_month);
    });

    // Monthly pregnant status
    $("#monthlyPregnancyStatus").change(function(e) {
        e.preventDefault();

        let selected_month = $(this).val();

        loadMonthlypregnantStatus(selected_month);
    });

    // Monthly pregnant status
    const loadMonthlypregnantStatus = (month = '') => {
        $.ajax({
            method: 'POST',
            url: '../functions/load_analytics.php',
            dataType: 'JSON',
            data: {
                action: 'loadMonthlypregnantStatus',
                filter: '',
                month: month
            },
            success: function(res) {
                const data = res.loadMonthlypregnantStatus;

                let new_data = [];
                let dset1 = [];
                let dset2 = [];

                if (data.length > 0) {
                    for (i = 1; i <= num_days_this_month; i++) {
                        if (data[0]) {
                            dset1.push(data[0][`d${i}`]);
                        }
                        if (data[1]) {
                            dset2.push(data[1][`d${i}`]);
                        }
                    }

                    if (data[0]) {
                        new_data.push({
                            label: 'Not Pregnant',
                            fill: false,
                            backgroundColor: '#FFB1C1',
                            data: dset1,
                            categoryPercentage: .5
                        });
                    }
                    if (data[1]) {
                        new_data.push({
                            label: 'Pregnant',
                            fill: false,
                            backgroundColor: '#9AD0F5',
                            data: dset2,
                            categoryPercentage: .5
                        });
                    }
                }
                chartjs_pregnancy_status_monthly.data.datasets = new_data;
                chartjs_pregnancy_status_monthly.update();
            }
        });
    }


    let filter = {
        top_services: '',
        appointment_status: '',
    }

    // Yearly Top 3 Services
    $("#yearlyTopServices").change(function(e) {
        e.preventDefault();

        let selected_year = $(this).val();

        filter.top_services = selected_year;

        yearlyTopServices('default', filter);
    });

    // Appointment Yearly Status
    $("#yearlyAppointmentStatus").change(function(e) {
        e.preventDefault();

        let selected_year = $(this).val();

        filter.appointment_status = selected_year;

        appointment_yearly_status('default', filter);
    });

    service_total_patient('default', filter);
    appointment_yearly_status('default', filter);
    yearlyTopServices('default', filter);
    loadMonthlyServices();
    loadMonthlyStatus();
    loadMonthlyIncome();
    loadYearlyIncome();
    loadMonthlypregnantStatus();
});
</script>