<?php require_once 'includes/header.php'; ?>
<style>

	body
{

background: rgb(0,0,0);
background: linear-gradient(0deg, rgba(0,0,0,1) 0%, rgba(220,220,220,1) 0%, rgba(235,42,52,1) 0%, rgba(77,29,29,1) 0%, rgba(190,78,78,1) 100%);

</style>

<div class="row">
	<div class="col-md-12">

		<ol class="breadcrumb">
		  <li><a href="dashboard.php">Home</a></li>		  
		  <li class="active">Supplie
		</ol>

		<div class="panel panel-default">
			<div class="panel-heading">
				<div class="page-heading"> <i class="glyphicon glyphicon-edit"></i> Manage Supplier</div>
			</div> <!-- /panel-heading -->
			<div class="panel-body">

				<div class="remove-messages"></div>

				<div class="div-action pull pull-right" style="padding-bottom:20px;">
					<button class="btn btn-default button1" data-toggle="modal" data-target="#addBrandModel"> <i class="glyphicon glyphicon-plus-sign"></i> Add Brand </button>
				</div> <!-- /div-action -->				
				
				<table class="table" id="manageBrandTable">
					<thead>
						<tr>							
							<th>Supplier Name</th>
							<th>Status</th>
							<th style="width:15%;">Options</th>
						</tr>
					</thead>
				</table>
				<!-- /table -->

			</div> <!-- /panel-body -->
		</div> <!-- /panel -->		
	</div> <!-- /col-md-12 -->
</div> <!-- /row -->

<div class="modal fade" id="addBrandModel" tabindex="-1" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">
    	
    	<form class="form-horizontal" id="submitBrandForm" action="php_action/createBrand.php" method="POST">
	      <div class="modal-header">
	        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
	        <h4 class="modal-title"><i class="fa fa-plus"></i> Add Supplier</h4>
	      </div>
	      <div class="modal-body">

	      	<div id="add-brand-messages"></div>

	        <div class="form-group">
	        	<label for="brandName" class="col-sm-3 control-label">Supplier Name: </label>
	        	<label class="col-sm-1 control-label">: </label>
				    <div class="col-sm-8">
				      <input type="text" class="form-control" id="brandName" placeholder="Supplier Name" name="brandName" autocomplete="off">
				    </div>
	        </div> <!-- /form-group-->	         	        
	        <div class="form-group">
	        	<label for="brandStatus" class="col-sm-3 control-label">Status: </label>
	        	<label class="col-sm-1 control-label">: </label>
				    <div class="col-sm-8">
				      <select class="form-control" id="brandStatus" name="brandStatus">
				      	<option value="">~~SELECT~~</option>
				      	<option value="1">Available</option>
				      	<option value="2">Not Available</option>
				      </select>
				    </div>
	        </div> <!-- /form-group-->	         	        

	      </div> <!-- /modal-body -->
	      
	      <div class="modal-footer">
	        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
	        
	        <button type="submit" class="btn btn-primary" id="createBrandBtn" data-loading-text="Loading..." autocomplete="off">Save Changes</button>
	      </div>
	      <!-- /modal-footer -->
     	</form>
	     <!-- /.form -->
    </div>
    <!-- /modal-content -->
  </div>
  <!-- /modal-dailog -->
</div>
<!-- / add modal -->

<!-- edit brand -->
<div class="modal fade" id="editBrandModel" tabindex="-1" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">
    	
    	<form class="form-horizontal" id="editBrandForm" action="php_action/editBrand.php" method="POST">
	      <div class="modal-header">
	        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
	        <h4 class="modal-title"><i class="fa fa-edit"></i> Edit Supplier</h4>
	      </div>
	      <div class="modal-body">

	      	<div id="edit-brand-messages"></div>

	      	<div class="modal-loading div-hide" style="width:50px; margin:auto;padding-top:50px; padding-bottom:50px;">
						<i class="fa fa-spinner fa-pulse fa-3x fa-fw"></i>
						<span class="sr-only">Loading...</span>
					</div>

		      <div class="edit-brand-result">
		      	<div class="form-group">
		        	<label for="editBrandName" class="col-sm-3 control-label">Supplier Name: </label>
		        	<label class="col-sm-1 control-label">: </label>
					    <div class="col-sm-8">
					      <input type="text" class="form-control" id="editBrandName" placeholder="Brand Name" name="editBrandName" autocomplete="off">
					    </div>
		        </div> <!-- /form-group-->	         	        
		        <div class="form-group">
		        	<label for="editBrandStatus" class="col-sm-3 control-label">Status: </label>
		        	<label class="col-sm-1 control-label">: </label>
					    <div class="col-sm-8">
					      <select class="form-control" id="editBrandStatus" name="editBrandStatus">
					      	<option value="">~~SELECT~~</option>
					      	<option value="1">Available</option>
					      	<option value="2">Not Available</option>
					      </select>
					    </div>
		        </div> <!-- /form-group-->	
		      </div>         	        
		      <!-- /edit brand result -->

	      </div> <!-- /modal-body -->
	      
	      <div class="modal-footer editBrandFooter">
	        <button type="button" class="btn btn-default" data-dismiss="modal"> <i class="glyphicon glyphicon-remove-sign"></i> Close</button>
	        
	        <button type="submit" class="btn btn-success" id="editBrandBtn" data-loading-text="Loading..." autocomplete="off"> <i class="glyphicon glyphicon-ok-sign"></i> Save Changes</button>
	      </div>
	      <!-- /modal-footer -->
     	</form>
	     <!-- /.form -->
    </div>
    <!-- /modal-content -->
  </div>
  <!-- /modal-dailog -->
</div>
<!-- / add modal -->
<!-- /edit brand -->

<!-- remove brand -->
<div class="modal fade" tabindex="-1" role="dialog" id="removeMemberModal">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title"><i class="glyphicon glyphicon-trash"></i> Remove Brand</h4>
      </div>
      <div class="modal-body">
        <p>Do you really want to remove ?</p>
      </div>
      <div class="modal-footer removeBrandFooter">
        <button type="button" class="btn btn-default" data-dismiss="modal"> <i class="glyphicon glyphicon-remove-sign"></i> Close</button>
        <button type="button" class="btn btn-primary" id="removeBrandBtn" data-loading-text="Loading..."> <i class="glyphicon glyphicon-ok-sign"></i> Save changes</button>
      </div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
<!-- /remove brand -->

<script src="custom/js/brand.js"></script>

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



<?php require_once 'includes/footer.php'; ?>