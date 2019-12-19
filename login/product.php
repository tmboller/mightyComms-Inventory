<?php require_once 'php_action/db_connect.php' ?>
<?php require_once 'includes/header.php'; ?>

<style>

	body
{

background: rgb(0,0,0);
background: linear-gradient(0deg, rgba(0,0,0,1) 0%, rgba(220,220,220,1) 0%, rgba(235,42,52,1) 0%, rgba(77,29,29,1) 0%, rgba(190,78,78,1) 100%);
}
th {background-color: maroon;
color: white;}

thead {background-color: yellow;
}

</style>

<div class="row">
	<div class="col-md-12">

		<ol class="breadcrumb">
		  <li><a href="dashboard.php">Home</a></li>		  
		  <li class="active">Product</li>
		</ol>

		<div class="panel panel-default">
			<div class="panel-heading">
				<div class="page-heading"> <i class="glyphicon glyphicon-edit"></i> Manage Product</div>
			</div> <!-- /panel-heading -->
			<div class="panel-body">

				<div class="remove-messages"></div>

				<div class="div-action pull pull-right" style="padding-bottom:20px;">
					<button class="btn btn-default button1" data-toggle="modal" id="addProductModalBtn" data-target="#addProductModal"> <i class="glyphicon glyphicon-plus-sign"></i> Add Product </button>
				</div> <!-- /div-action -->				
				
				<table class="table" id="manageProductTable">
					<thead>
						<tr>
						
							<th style="width:10%;">Photo</th>							
							<th>Product Name</th>
							<th>Rate</th>							
							<th>Quantity</th>
							<th>Supplier</th>
							<th>Category</th>
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


<!-- add product -->
<div class="modal fade" id="addProductModal" tabindex="-1" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">

    	<form class="form-horizontal" id="submitProductForm" action="php_action/createProduct.php" method="POST" enctype="multipart/form-data">
	      <div class="modal-header">
	        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
	        <h4 class="modal-title"><i class="fa fa-plus"></i> Add Product</h4>
	      </div>

	      <div class="modal-body" style="max-height:450px; overflow:auto;">

	      	<div id="add-product-messages"></div>

	      	<div class="form-group">
	        	<label for="productImage" class="col-sm-3 control-label">Product Image: </label>
	        	<label class="col-sm-1 control-label">: </label>
				    <div class="col-sm-8">
					    <!-- the avatar markup -->
							<div id="kv-avatar-errors-1" class="center-block" style="display:none;"></div>							
					    <div class="kv-avatar center-block">					        
					        <input type="file" class="form-control" id="productImage" placeholder="Product Name" name="productImage" class="file-loading" style="width:auto;"/>
					    </div>
				      
				    </div>
	        </div> <!-- /form-group-->	     	           	       

	        <div class="form-group">
	        	<label for="productName" class="col-sm-3 control-label">Product Name: </label>
	        	<label class="col-sm-1 control-label">: </label>
				    <div class="col-sm-8">
				      <input type="text" class="form-control" id="productName" placeholder="Product Name" name="productName" autocomplete="off">
				    </div>
	        </div> <!-- /form-group-->	    

	        <div class="form-group">
	        	<label for="quantity" class="col-sm-3 control-label">Quantity: </label>
	        	<label class="col-sm-1 control-label">: </label>
				    <div class="col-sm-8">
				      <input type="text" class="form-control" id="quantity" placeholder="Quantity" name="quantity" autocomplete="off">
				    </div>
	        </div> <!-- /form-group-->	        	 

	        <div class="form-group">
	        	<label for="rate" class="col-sm-3 control-label">Rate: </label>
	        	<label class="col-sm-1 control-label">: </label>
				    <div class="col-sm-8">
				      <input type="text" class="form-control" id="rate" placeholder="Rate" name="rate" autocomplete="off">
				    </div>
	        </div> <!-- /form-group-->	     	        

	        <div class="form-group">
	        	<label for="brandName" class="col-sm-3 control-label">Supplier Name: </label>
	        	<label class="col-sm-1 control-label">: </label>
				    <div class="col-sm-8">
				      <select class="form-control" id="brandName" name="brandName">
				      	<option value="">~~SELECT~~</option>
				      	<?php 
				      	$sql = "SELECT brand_id, brand_name, brand_active, brand_status FROM brands WHERE brand_status = 1 AND brand_active = 1";
								$result = $connect->query($sql);

								while($row = $result->fetch_array()) {
									echo "<option value='".$row[0]."'>".$row[1]."</option>";
								} // while
								
				      	?>
				      </select>
				    </div>
	        </div> <!-- /form-group-->	

	        <div class="form-group">
	        	<label for="categoryName" class="col-sm-3 control-label">Category Name: </label>
	        	<label class="col-sm-1 control-label">: </label>
				    <div class="col-sm-8">
				      <select type="text" class="form-control" id="categoryName" placeholder="Product Name" name="categoryName" >
				      	<option value="">~~SELECT~~</option>
				      	<?php 
				      	$sql = "SELECT categories_id, categories_name, categories_active, categories_status FROM categories WHERE categories_status = 1 AND categories_active = 1";
								$result = $connect->query($sql);

								while($row = $result->fetch_array()) {
									echo "<option value='".$row[0]."'>".$row[1]."</option>";
								} // while
								
				      	?>
				      </select>
				    </div>
	        </div> <!-- /form-group-->					        	         	       

	        <div class="form-group">
	        	<label for="productStatus" class="col-sm-3 control-label">Status: </label>
	        	<label class="col-sm-1 control-label">: </label>
				    <div class="col-sm-8">
				      <select class="form-control" id="productStatus" name="productStatus">
				      	<option value="">~~SELECT~~</option>
				      	<option value="1"> Available</option>
				      	<option value="2">Not Available</option>
				      </select>
				    </div>
	        </div> <!-- /form-group-->	         	        
	      </div> <!-- /modal-body -->
	      
	      <div class="modal-footer">
	        <button type="button" class="btn btn-default" data-dismiss="modal"> <i class="glyphicon glyphicon-remove-sign"></i> Close</button>
	        
	        <button type="submit" class="btn btn-primary" id="createProductBtn" data-loading-text="Loading..." autocomplete="off"> <i class="glyphicon glyphicon-ok-sign"></i> Save Changes</button>
	      </div> <!-- /modal-footer -->	      
     	</form> <!-- /.form -->	     
    </div> <!-- /modal-content -->    
  </div> <!-- /modal-dailog -->
</div> 
<!-- /add categories -->


<!-- edit categories brand -->
<div class="modal fade" id="editProductModal" tabindex="-1" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">
    	    	
	      <div class="modal-header">
	        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
	        <h4 class="modal-title"><i class="fa fa-edit"></i> Edit Product</h4>
	      </div>
	      <div class="modal-body" style="max-height:450px; overflow:auto;">

	      	<div class="div-loading">
	      		<i class="fa fa-spinner fa-pulse fa-3x fa-fw"></i>
						<span class="sr-only">Loading...</span>
	      	</div>

	      	<div class="div-result">

				  <!-- Nav tabs -->
				  <ul class="nav nav-tabs" role="tablist">
				    <li role="presentation" class="active"><a href="#photo" aria-controls="home" role="tab" data-toggle="tab">Photo</a></li>
				    <li role="presentation"><a href="#productInfo" aria-controls="profile" role="tab" data-toggle="tab">Product Info</a></li>    
				  </ul>

				  <!-- Tab panes -->
				  <div class="tab-content">

				  	
				    <div role="tabpanel" class="tab-pane active" id="photo">
				    	<form action="php_action/editProductImage.php" method="POST" id="updateProductImageForm" class="form-horizontal" enctype="multipart/form-data">

				    	<br />
				    	<div id="edit-productPhoto-messages"></div>

				    	<div class="form-group">
			        	<label for="editProductImage" class="col-sm-3 control-label">Product Image: </label>
			        	<label class="col-sm-1 control-label">: </label>
						    <div class="col-sm-8">							    				   
						      <img src="" id="getProductImage" class="thumbnail" style="width:250px; height:250px;" />
						    </div>
			        </div> <!-- /form-group-->	     	           	       
				    	
			      	<div class="form-group">
			        	<label for="editProductImage" class="col-sm-3 control-label">Select Photo: </label>
			        	<label class="col-sm-1 control-label">: </label>
						    <div class="col-sm-8">
							    <!-- the avatar markup -->
									<div id="kv-avatar-errors-1" class="center-block" style="display:none;"></div>							
							    <div class="kv-avatar center-block">					        
							        <input type="file" class="form-control" id="editProductImage" placeholder="Product Name" name="editProductImage" class="file-loading" style="width:auto;"/>
							    </div>
						      
						    </div>
			        </div> <!-- /form-group-->	     	           	       

			        <div class="modal-footer editProductPhotoFooter">
				        <button type="button" class="btn btn-default" data-dismiss="modal"> <i class="glyphicon glyphicon-remove-sign"></i> Close</button>
				        
				        <!-- <button type="submit" class="btn btn-success" id="editProductImageBtn" data-loading-text="Loading..."> <i class="glyphicon glyphicon-ok-sign"></i> Save Changes</button> -->
				      </div>
				      <!-- /modal-footer -->
				      </form>
				      <!-- /form -->
				    </div>
				    <!-- product image -->
				    <div role="tabpanel" class="tab-pane" id="productInfo">
				    	<form class="form-horizontal" id="editProductForm" action="php_action/editProduct.php" method="POST">				    
				    	<br />

				    	<div id="edit-product-messages"></div>

				    	<div class="form-group">
			        	<label for="editProductName" class="col-sm-3 control-label">Product Name: </label>
			        	<label class="col-sm-1 control-label">: </label>
						    <div class="col-sm-8">
						      <input type="text" class="form-control" id="editProductName" placeholder="Product Name" name="editProductName" autocomplete="off">
						    </div>
			        </div> <!-- /form-group-->	    

			        <div class="form-group">
			        	<label for="editQuantity" class="col-sm-3 control-label">Quantity: </label>
			        	<label class="col-sm-1 control-label">: </label>
						    <div class="col-sm-8">
						      <input type="text" class="form-control" id="editQuantity" placeholder="Quantity" name="editQuantity" autocomplete="off">
						    </div>
			        </div> <!-- /form-group-->	        	 

			        <div class="form-group">
			        	<label for="editRate" class="col-sm-3 control-label">Rate: </label>
			        	<label class="col-sm-1 control-label">: </label>
						    <div class="col-sm-8">
						      <input type="text" class="form-control" id="editRate" placeholder="Rate" name="editRate" autocomplete="off">
						    </div>
			        </div> <!-- /form-group-->	     	        

			        <div class="form-group">
			        	<label for="editBrandName" class="col-sm-3 control-label">Brand Name: </label>
			        	<label class="col-sm-1 control-label">: </label>
						    <div class="col-sm-8">
						      <select class="form-control" id="editBrandName" name="editBrandName">
						      	<option value="">~~SELECT~~</option>
						      	<?php 
						      	$sql = "SELECT brand_id, brand_name, brand_active, brand_status FROM brands WHERE brand_status = 1 AND brand_active = 1";
										$result = $connect->query($sql);

										while($row = $result->fetch_array()) {
											echo "<option value='".$row[0]."'>".$row[1]."</option>";
										} // while
										
						      	?>
						      </select>
						    </div>
			        </div> <!-- /form-group-->	

			        <div class="form-group">
			        	<label for="editCategoryName" class="col-sm-3 control-label">Category Name: </label>
			        	<label class="col-sm-1 control-label">: </label>
						    <div class="col-sm-8">
						      <select type="text" class="form-control" id="editCategoryName" name="editCategoryName" >
						      	<option value="">~~SELECT~~</option>
						      	<?php 
						      	$sql = "SELECT categories_id, categories_name, categories_active, categories_status FROM categories WHERE categories_status = 1 AND categories_active = 1";
										$result = $connect->query($sql);

										while($row = $result->fetch_array()) {
											echo "<option value='".$row[0]."'>".$row[1]."</option>";
										} // while
										
						      	?>
						      </select>
						    </div>
			        </div> <!-- /form-group-->					        	         	       

			        <div class="form-group">
			        	<label for="editProductStatus" class="col-sm-3 control-label">Status: </label>
			        	<label class="col-sm-1 control-label">: </label>
						    <div class="col-sm-8">
						      <select class="form-control" id="editProductStatus" name="editProductStatus">
						      	<option value="">~~SELECT~~</option>
						      	<option value="1">Available</option>
						      	<option value="2">Not Available</option>
						      </select>
						    </div>
			        </div> <!-- /form-group-->	         	        

			        <div class="modal-footer editProductFooter">
				        <button type="button" class="btn btn-default" data-dismiss="modal"> <i class="glyphicon glyphicon-remove-sign"></i> Close</button>
				        
				        <button type="submit" class="btn btn-success" id="editProductBtn" data-loading-text="Loading..."> <i class="glyphicon glyphicon-ok-sign"></i> Save Changes</button>
				      </div> <!-- /modal-footer -->				     
			        </form> <!-- /.form -->				     	
				    </div>    
				    <!-- /product info -->
				  </div>

				</div>
	      	
	      </div> <!-- /modal-body -->
	      	      
     	
    </div>
    <!-- /modal-content -->
  </div>
  <!-- /modal-dailog -->
</div>
<!-- /categories brand -->

<!-- categories brand -->
<div class="modal fade" tabindex="-1" role="dialog" id="removeProductModal">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title"><i class="glyphicon glyphicon-trash"></i> Remove Product</h4>
      </div>
      <div class="modal-body">

      	<div class="removeProductMessages"></div>

        <p>Do you really want to remove ?</p>
      </div>
      <div class="modal-footer removeProductFooter">
        <button type="button" class="btn btn-default" data-dismiss="modal"> <i class="glyphicon glyphicon-remove-sign"></i> Close</button>
        <button type="button" class="btn btn-primary" id="removeProductBtn" data-loading-text="Loading..."> <i class="glyphicon glyphicon-ok-sign"></i> Save changes</button>
      </div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
<!-- /categories brand -->


<?php



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

<script src="custom/js/product.js"></script>

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
		$('#navProduct').addClass('active');

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