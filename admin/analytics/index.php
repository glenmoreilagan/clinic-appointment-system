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

  <title>LJ CURA OB-GYN ULTRASOUND CLINIC</title>

  <link rel="shortcut icon" href="../../image/favicon.png">

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
    <!-- THIS IS FOR SIDEBAR NAVIGATION -->
    <?php include_once '../layouts/display_side_nav.php' ?>

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

          <div class="card-body mt-3" style="padding: 0 !important;">
            <div class="row">
              <div class="col-12 col-lg-12 d-flex">
                <div class="card flex-fill w-100">
                  <div class="card-header">
                    <h5 class="card-title mb-0">Monthly Appointment Top 3 Services</h5>
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

          <!-- <div class="card mb-3"> -->
          <div class="card-body mt-3" style="padding: 0 !important;">
            <div class="row">
              <div class="col-12 col-lg-6 d-flex">
                <div class="card flex-fill w-100">
                  <div class="card-header">
                    <h5 class="card-title mb-0">Services & Total Patients</h5>
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

              <div class="col-12 col-lg-6 d-flex">
                <div class="card flex-fill w-100">
                  <div class="card-header">
                    <h5 class="card-title mb-0">Appointment Monthly Status</h5>
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
    let d = new Date();
    let todayDate = d.toISOString().split('T')[0];
    let appointment_id = 0;

    const loadCharts = (action) => {
      $("#ILoader").modal('show');

      let pie_chart_color = [];
      let pie_chart_data = [];
      let pie_chart_label = [];

      const random_colors = () => {
        var r = Math.floor(Math.random() * 255);
        var g = Math.floor(Math.random() * 255);
        var b = Math.floor(Math.random() * 255);
        return `rgb(${r},${g},${g})`;
      };

      $.ajax({
        method: 'POST',
        url: '../functions/load_analytics.php',
        dataType: 'JSON',
        data: {
          action: action
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
          loadAppointmentMonthlyStatusChart(res.data_loadAppointmentMonthlyStatus);
          loadServicesChart(res.data_loadServicesChart);

          setTimeout(() => {
            $("#ILoader").modal('hide');
          }, 1000);
        }
      });
    }

    const loadServicesChart = (data) => {
      new Chart(document.getElementById("chartjs-dashboard-line"), {
        type: "line",
        data: {
          labels: ["January", "February", "March", "April", "May", "June", "July",
            "August", "September", "October", "November", "December"
          ],
          datasets: [{
            label: `${data[0].service_title}`,
            // backgroundColor: window.theme.success,
            fill: false,
            borderColor: '#FFB1C1',
            // hoverBackgroundColor: window.theme.success,
            // hoverBorderColor: window.theme.success,
            data: [data[0].jan, data[0].feb, data[0].mar, data[0].apr, data[0].may, data[0].jun,
              data[0].jul, data[0].aug, data[0].sep, data[0].oct, data[0].nov, data[0].dece
            ],
            // barPercentage: .325,
            // categoryPercentage: .5
          }, {
            label: data[1].service_title,
            // backgroundColor: window.theme.primary,
            fill: false,
            borderColor: '#9AD0F5',
            // hoverBackgroundColor: window.theme.primary,
            // hoverBorderColor: window.theme.primary,
            data: [data[1].jan, data[1].feb, data[1].mar, data[1].apr, data[1].may, data[1].jun,
              data[1].jul, data[1].aug, data[1].sep, data[1].oct, data[1].nov, data[1].dece
            ],
            // barPercentage: .325,
            // categoryPercentage: .5
          }, {
            label: data[2].service_title,
            // backgroundColor: window.theme.danger,
            fill: false,
            borderColor: '#FFE6AA',
            // hoverBackgroundColor: window.theme.danger,
            // hoverBorderColor: window.theme.danger,
            data: [data[2].jan, data[2].feb, data[2].mar, data[2].apr, data[2].may, data[2].jun,
              data[2].jul, data[2].aug, data[2].sep, data[2].oct, data[2].nov, data[2].dece
            ],
            // barPercentage: .325,
            // categoryPercentage: .5
          }]
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
    }

    const loadServicePercentageChart = (chart_infos) => {
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

    const loadAppointmentMonthlyStatusChart = (data) => {
      new Chart(document.getElementById("chartjs-dashboard-bar"), {
        type: "bar",
        data: {
          labels: ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"],
          datasets: [{
            label: "Pending",
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
            label: "Approved",
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
          }]
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
    }

    

    loadCharts('default');
  });
</script>