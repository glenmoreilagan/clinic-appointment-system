<!DOCTYPE html>
<html lang="en">


<!-- Mirrored from appstack.bootlab.io/calendar.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 04 Jan 2021 13:06:37 GMT -->
<!-- Added by HTTrack --><meta http-equiv="content-type" content="text/html;charset=UTF-8" /><!-- /Added by HTTrack -->
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta name="description" content="Responsive Bootstrap 4 Admin &amp; Dashboard Template">
	<meta name="author" content="Bootlab">

	<title>Clinic System</title>

	<link rel="canonical" href="calendar.html" />
	<link rel="shortcut icon" href="img/favicon.ico">

	<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500&amp;display=swap" rel="stylesheet">

	<!-- Choose your prefered color scheme -->
	<!-- <link href="css/light.css" rel="stylesheet"> -->
	<!-- <link href="css/dark.css" rel="stylesheet"> -->

	<!-- BEGIN SETTINGS -->
	<!-- Remove this after purchasing -->
	<link class="js-stylesheet" href="css/light.css" rel="stylesheet">
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
    <?php include_once 'display_side_nav.php' ?> 

		<div class="main">
      <!-- THIS IS FOR HEADER NAVIGATION BAR -->
      <?php include_once 'display_head_nav.php' ?>

      <main class="content">
				<div class="container-fluid p-0">
					<h1 class="h3 mb-3">Calendar</h1>

					<div class="card">
						<div class="card-header">
							<h5 class="card-title">FullCalendar</h5>
							<h6 class="card-subtitle text-muted">Open source JavaScript jQuery plugin for a full-sized, drag & drop event calendar.</h6>
						</div>
						<div class="card-body">
							<div id="fullcalendar"></div>
						</div>
					</div>

				</div>
			</main>

			<footer class="footer">
        <div class="col-6">
          <p class="mb-0">
            &copy; 2020 - <a href="index.html" class="text-muted">AppStack</a>
          </p>
        </div>
			</footer>
		</div>
	</div>

	<script src="js/app.js"></script>

	<script>
		document.addEventListener("DOMContentLoaded", function() {
			var calendarEl = document.getElementById('fullcalendar');
			var calendar = new FullCalendar.Calendar(calendarEl, {
				themeSystem: 'bootstrap',
				initialView: 'dayGridMonth',
				initialDate: '2020-07-07',
				headerToolbar: {
					left: 'prev,next today',
					center: 'title',
					right: 'dayGridMonth,timeGridWeek,timeGridDay'
				},
				events: [{
						title: 'All Day Event',
						start: '2020-07-01'
					},
					{
						title: 'Long Event',
						start: '2020-07-07',
						end: '2020-07-10'
					},
					{
						groupId: '999',
						title: 'Repeating Event',
						start: '2020-07-09T16:00:00'
					},
					{
						groupId: '999',
						title: 'Repeating Event',
						start: '2020-07-16T16:00:00'
					},
					{
						title: 'Conference',
						start: '2020-07-11',
						end: '2020-07-13'
					},
					{
						title: 'Meeting',
						start: '2020-07-12T10:30:00',
						end: '2020-07-12T12:30:00'
					},
					{
						title: 'Lunch',
						start: '2020-07-12T12:00:00'
					},
					{
						title: 'Meeting',
						start: '2020-07-12T14:30:00'
					},
					{
						title: 'Birthday Party',
						start: '2020-07-13T07:00:00'
					},
					{
						title: 'Click for Google',
						url: 'http://google.com/',
						start: '2020-07-28'
					}
				]
			});
			setTimeout(function() {
				calendar.render();
			}, 250);
		});

	</script>
</body>
</html>