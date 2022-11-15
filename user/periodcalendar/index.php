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

    <title>Period Calendar</title>

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
    /* .fc-prevYear-button,
    .fc-nextYear-button,
    .fc-prev-button,
    .fc-next-button,
    .fc-today-button {
      background-color: #293042 !important;
      border: #293042 !important;
    }

    .btn-primary.focus,
    .btn-primary:focus {
      box-shadow: none;
    }

    .btn-primary:not(:disabled):not(.disabled).active:focus,
    .btn-primary:not(:disabled):not(.disabled):active:focus,
    .show>.btn-primary.dropdown-toggle:focus {
      box-shadow: 0 0 0 .2rem rgba(41, 48, 66, .5);
    } */

    td.fc-daygrid-day:hover {
        cursor: pointer;
        background-color: #E0EAFC;
    }
    </style>


    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
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
                    <span class="align-middle"><img width="200" height="60" src="../../image/logo.png"
                            alt="LJ CURA OB-GYN ULTRA SOUND CLINIC"></span>
                </a>
                <?php
        // heres the settings for local or live
        include '../../host_setting.php';
        ?>
                <ul class="sidebar-nav">
                    <li class="sidebar-item">
                        <a class="sidebar-link" href=<?php echo $host . "user/dashboard/"; ?>>
                            <i class="align-middle" data-feather="sliders"></i> <span
                                class="align-middle">Dashboard</span>
                        </a>
                    </li>
                    <li class="sidebar-item">
                        <a class="sidebar-link" href=<?php echo $host . "user/announcements/"; ?>>
                            <i class="align-middle bi bi-megaphone"></i> <span class="align-middle">Announcements</span>
                        </a>
                    </li>
                    <li class="sidebar-item">
                        <a class="sidebar-link" href=<?php echo $host . "user/myappointments/"; ?>>
                            <i class="align-middle" data-feather="file-text"></i> <span class="align-middle">My
                                Appointments</span>
                        </a>
                    </li>
                    <li class="sidebar-item active">
                        <a class="sidebar-link" href=<?php echo $host . "user/periodcalendar/"; ?>>
                            <i class="align-middle" data-feather="calendar"></i> <span class="align-middle">Period
                                Calendar</span>
                        </a>
                    </li>
                    <li class="sidebar-item">
                        <a class="sidebar-link" href=<?php echo $host . "user/feedback/"; ?>>
                            <i class="align-middle" data-feather="user-check"></i> <span
                                class="align-middle">Feedback</span>
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
                    <h1 class="h3 mb-3">Period Calendar</h1>

                    <div class="card mb-3">
                        <div class="card-body">
                            <div id="fullcalendar"></div>
                        </div>
                    </div>
                </div>
            </main>
        </div>
    </div>

    <?php include_once '../modals/newPeriod_modal.php' ?>

    <script src="../assets/js/app.js"></script>
    <script>
    $(document).ready(function() {
        let calendarEl = document.getElementById('fullcalendar');
        let calendar = new FullCalendar.Calendar(calendarEl, {
            themeSystem: 'bootstrap',
            initialView: 'dayGridMonth',
            initialDate: Date.now(),
            headerToolbar: {
                left: 'prev,next today',
                // left: 'prevYear,prev,next,nextYear today',
                right: 'title',
                // right: 'dayGridMonth,timeGridWeek,timeGridDay'
                center: ''
            },
            events: '../functions/display_period_calendar.php',
            selectable: true,
            allDay: true,
            select: async function(e) {
                console.log(e);
                let startStr = e.startStr;
                let endStr = e.endStr;

                let newEndStr = new Date(endStr);
                newEndStr.setDate(newEndStr.getDate() - 1);
                newEndStr.setMonth(newEndStr.getMonth());
                newEndStr.setFullYear(newEndStr.getFullYear());

                let year = newEndStr.getFullYear();
                let month = newEndStr.getMonth() < 10 ? `0${newEndStr.getMonth()}` : newEndStr
                    .getMonth();
                let day = newEndStr.getDate() < 10 ? `0${newEndStr.getDate()}` : newEndStr
                    .getDate();
                let new_end_date = `${year}-${month}-${day}`;

                $("input[name='start']").val(startStr);
                $("input[name='end']").val(new_end_date);
                $("input[name='end_hidden']").val(endStr);

                $("#newPeriod_modal").modal('show');
            },
        });

        setTimeout(function() {
            calendar.render();
        }, 250)

        const save_new_period = (data) => {
            $.ajax({
                method: 'POST',
                url: '../functions/save_period.php',
                dataType: 'JSON',
                data: data,
                success: function(res) {
                    // console.log(res);

                    $("#newPeriod_modal").modal('hide');
                    $(".form-input").val('');

                    calendar.refetchEvents();
                }
            });
        }

        $("#btnSaveNewPeriod").click((e) => {
            e.preventDefault();

            let data_input = {
                title: $("textarea[name='title']").val(),
                start: $("input[name='start']").val(),
                end: $("input[name='end']").val(),
                end_hidden: $("input[name='end_hidden']").val()
            };

            save_new_period(data_input);
        });
    });
    </script>
</body>

</html>