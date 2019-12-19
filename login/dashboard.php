<?php require_once 'includes/header.php'; ?>
<?php include('includes/functions.php') ?>
<?php

$sql = "SELECT * FROM product";
$query = $connect->query($sql);
$countProduct = $query->num_rows;

$orderSql = "SELECT * FROM orders WHERE order_status = 1";
$orderQuery = $connect->query($orderSql);
$countOrder = $orderQuery->num_rows;

$totalRevenue = 0;

while ($orderResult = $orderQuery->fetch_assoc()) {
	$totalRevenue += $orderResult['paid'];
}



//$lowStockSql = "SELECT * FROM product WHERE quantity <= 3 AND status = 1";
$lowStockSql = "SELECT * FROM product WHERE quantity < 100";
$lowStockQuery = $connect->query($lowStockSql);
$countLowStock = $lowStockQuery->num_rows;

/**all product donut chart */
try {



	$sqlAllproduct = "SELECT product_name, quantity FROM `product`  order by quantity ASC LIMIT 7";
	$resultAllProducts = $connect->query($sqlAllproduct);
} catch (Exception $ex) {
	echo '<p style="color: red">An error has occured while performing this operation, Please try again later..</p>';
}

//query for notification

$sqlNotification = "SELECT `product_name`,`quantity` FROM product WHERE quantity < 100 ORDER BY RAND() LIMIT 1";
$NotificationQuery = $connect->query($sqlNotification);
$resultProductNotification = $NotificationQuery->fetch_assoc();





$connect->close();

?>


<style type="text/css">
.header {
		background: #003366;
	}
	button[name=register_btn] {
		background: #003366;
	}
	.ui-datepicker-calendar {
		display: none;
	}
	
	body
{

background: rgb(236,144,228);
background: radial-gradient(circle, rgba(236,144,228,1) 0%, rgba(114,80,195,1) 36%, rgba(221,215,206,1) 70%, rgba(74,200,195,1) 100%);
</style>
<!-- fullCalendar 2.2.5-->
<link rel="stylesheet" href="assests/plugins/fullcalendar/fullcalendar.min.css">
<link rel="stylesheet" href="assests/plugins/fullcalendar/fullcalendar.print.css" media="print">
<!-- Morris Charts CSS -->
<link href="assests/plugins/morris/morris.css" rel="stylesheet">

<link href="assests/plugins/toastr/toastr.min.css" rel="stylesheet">
<div class="row">

	<div class="col-md-4">
		<div class="panel panel-success">
			<div class="panel-heading">

				<a href="product.php" style="text-decoration:none;color:black;">
					Total Product
					<span class="badge pull pull-right"><?php echo $countProduct; ?></span>
				</a>

			</div>
			<!--/panel-hdeaing-->
		</div>
		<!--/panel-->
	</div>
	<!--/col-md-4-->

	<div class="col-md-4">
		<div class="panel panel-info">
			<div class="panel-heading">
				<a href="orders.php?o=manord" style="text-decoration:none;color:black;">
					Total Orders
					<span class="badge pull pull-right"><?php echo $countOrder; ?></span>
				</a>

			</div>
			<!--/panel-hdeaing-->
		</div>
		<!--/panel-->
	</div>
	<!--/col-md-4-->

	<div class="col-md-4">
		<div class="panel panel-danger">
			<div class="panel-heading">
				<a href="product.php" style="text-decoration:none;color:black;">
					Low Stock
					<span class="badge pull pull-right"><?php echo $countLowStock; ?></span>
				</a>

			</div>
			<!--/panel-hdeaing-->
		</div>
		<!--/panel-->
	</div>
	<!--/col-md-4-->

	<div class="col-md-6">
		<div class="card">
			<div class="cardHeader">
				<h1>All Products</h1>
			</div>

			<div class="cardContainer">
				<!-- <p><?/*php echo date('l') . ' ' . date('d') . ', ' . date('Y');*/ ?></p> -->
				<div id="AllProductspiechart_3d" style="height: 330px;"></div>
			</div>
		</div>
		<br />



	</div>

	<div class="col-md-6">
		<div class="card">
			<div class="cardHeader"> <i class="glyphicon glyphicon-stats"></i> Low stock products</div>
			<div class="cardContainer">
				<div id="productStockStatus"></div>
			</div>
		</div>

	</div>




</div>

<div class="header">
		<h2>Admin - Home Page</h2>
	</div>
	<div class="content">
		<!-- notification message -->
		<?php if (isset($_SESSION['success'])) : ?>
			<div class="error success" >
				<h3>
					<?php 
						echo $_SESSION['success']; 
						unset($_SESSION['success']);
					?>
				</h3>
			</div>
		<?php endif ?>

		<!-- logged in user information -->
		<div class="profile_info">
			<img src="../images/admin_profile.png"  >

			<div>
				<?php  if (isset($_SESSION['user'])) : ?>
					<strong><?php echo $_SESSION['user']['username']; ?></strong>

					<small>
						<i  style="color: #888;">(<?php echo ucfirst($_SESSION['user']['user_type']); ?>)</i> 
						<br>
						<a href="home.php?logout='1'" style="color: red;">logout</a>
						&nbsp; <a href="create_user.php"> + add user</a>
					</small>

				<?php endif ?>
			</div>
		</div>



	</div>
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
		$('#navDashboard').addClass('active');

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

<?php require_once 'includes/footer.php'; ?>