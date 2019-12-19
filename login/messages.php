<?php require_once 'includes/header.php'; ?>

<style type="text/css">
	.ui-datepicker-calendar {
		display: none;
	}
	
	body
{

background: rgb(0,0,0);
background: linear-gradient(0deg, rgba(0,0,0,1) 0%, rgba(220,220,220,1) 0%, rgba(235,42,52,1) 0%, rgba(77,29,29,1) 0%, rgba(190,78,78,1) 100%);
</style>

<!-- fullCalendar 2.2.5-->
<link rel="stylesheet" href="assests/plugins/fullcalendar/fullcalendar.min.css">
<link rel="stylesheet" href="assests/plugins/fullcalendar/fullcalendar.print.css" media="print">
<!-- Morris Charts CSS -->
<link href="assests/plugins/morris/morris.css" rel="stylesheet">

<link href="assests/plugins/toastr/toastr.min.css" rel="stylesheet">
<div class="row">

	



<html>
<head>
<title>View Records</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
</head>
<body>

<h1>View Records</h1>

<p><b>View All</b> | <a href="view-paginated.php">View Paginated</a></p>

<?php
// connect to the database
include('includes/database.php');

// get the records from the database
if ($result = $mysqli->query("SELECT * FROM stocks ORDER BY id"))
{
// display records if there are records to display
if ($result->num_rows > 0)
{
// display records in a table
echo "<table border='1' cellpadding='10'>";

// set table headers
echo "<tr><th>ID</th><th>Item Name</th><th>Stock Taken</th><th>Collected By</th><th>Date</th></tr>";

while ($row = $result->fetch_object())
{
// set up a row for each record
echo "<tr>";
echo "<td>" . $row->id . "</td>";
echo "<td>" . $row->name . "</td>";
echo "<td>" . $row->stockout . "</td>";
echo "<td>" . $row->collectedby . "</td>";
echo "<td>" . $row->date . "</td>";
echo "</tr>";
}

echo "</table>";
}
// if there are no records in the database, display an alert message
else
{
echo "No results to display!";
}
}
// show an error if there is an issue with the database query
else
{
echo "Error: " . $mysqli->error;
}

// close database connection
$mysqli->close();

?>

<a href="records.php">Add New Record</a>
</body>
</html>
	



	
<!--/row-->

<!-- fullCalendar 2.2.5 -->
<script src="assests/plugins/moment/moment.min.js"></script>
<script src="assests/plugins/fullcalendar/fullcalendar.min.js"></script>
<!-- Morris Charts JavaScript -->

<script src="assests/js-plugins/raphael.min.js"></script>
<script src="assests/js-plugins/morris.min.js"></script>
<script src="assests/plugins/toastr/toastr.min.js"></script>
<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>


<script type="text/javascript">
	google.charts.load("current", {
		packages: ["corechart"]
	});
	google.charts.setOnLoadCallback(drawChart);

	function drawChart() {
		var data = google.visualization.arrayToDataTable([
			['Product Name', 'Quantity'],
			<?php
			if ($resultAllProducts->num_rows > 0) {

				while ($rowAllProducts = $resultAllProducts->fetch_assoc()) {

					echo "['" . $rowAllProducts['product_name'] . "', " . $rowAllProducts['quantity'] . "],";
				}
			} else {
				echo "0 results";
			}
			?>
		]);

		var options = {

			is3D: true,
		};

		var chart = new google.visualization.PieChart(document.getElementById('AllProductspiechart_3d'));
		chart.draw(data, options);
	}

	$(document).ready(function() {



		setInterval(


			showLowStockNotification, 10000);

		loadStockStatusChart();




	});

	$(function() {
		// top bar active
		$('#navBrand').addClass('active');

		//Date for the calendar events (dummy data)
		var date = new Date();
		var d = date.getDate(),
			m = date.getMonth(),
			y = date.getFullYear();

		$('#calendar').fullCalendar({
			header: {
				left: '',
				center: 'title'
			},
			buttonText: {
				today: 'today',
				month: 'month'
			}
		});


	});


	function showLowStockNotification() {
		$.ajax({
			url: 'notifications/index.php',
			type: 'get',
			success: function(notificationStock) {

				toastr.clear();
				toastr.error(notificationStock, 'Low Stock product ', {

					"positionClass": "toast-bottom-right",
					"closeButton": true,
					"debug": false,
					"newestOnTop": true,
					"progressBar": false,
					"positionClass": "toast-bottom-right",

					"onclick": null,
					"showDuration": "0",
					"hideDuration": "0",
					"timeOut": "0",
					"extendedTimeOut": "0",
					"showEasing": "swing",
					"hideEasing": "linear",
					"showMethod": "fadeIn",
					"hideMethod": "fadeOut"
				});

			},
			error: function(notificationStock) {


			}
		});


	}

	function loadStockStatusChart() {
		//alert("Locad chart function called");
		$.ajax({
			url: 'charts/index.php',
			type: 'get',
			success: function(productStosck) {

				Morris.Bar({
					element: 'productStockStatus',
					data: productStosck,
					xkey: 'label',
					ykeys: ['value'],
					labels: ['Current Stock'],
					barRatio: 0.4,
					xLabelAngle: 35,
					hideHover: 'auto',
					resize: true
				});
			},
			error: function(postStatData) {


			}
		});
	}
</script>