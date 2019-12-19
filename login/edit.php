
<?php 
include "includes/database.php";
?>

<html>
<head>
<style>

input[type=text], select {
  width: 100%;
  padding: 12px 20px;
  margin: 8px 0;
  display: inline-block;
  border: 1px solid #ccc;
  border-radius: 4px;
  box-sizing: border-box;
}

input[type=submit] {
  width: 100%;
  background-color: #4CAF50;
  color: white;
  padding: 14px 20px;
  margin: 8px 0;
  border: none;
  border-radius: 4px;
  cursor: pointer;
}

input[type=submit]:hover {
  background-color: maroon;
}


a {
  list-style-type: none;
  margin: 0;
  padding: 0;
  overflow: hidden;
  background-color: #333;
}

li {
  float: left;
}

a {
  display: block;
  color: white;
  text-align: center;
  padding: 14px 16px;
  text-decoration: none;
}

li a:hover {
  background-color: #111;
}
</style>

</head>

<title>Edit Item</title>

<body>


<div>
<a href="index.php">Home</a>
<a href="add.php">Add Item</a>
</div>



<body>

	<h4>Edit Item</h4>

	<?php
if (isset($_POST['save'])) {
	$id = $_POST['id'];
	$name = $_POST['name'];
	$ordered = $_POST['ordered'];
	$currentStock = $_POST['currentStock'];
	
	$stockOut = $_POST['stockOut'];

	$collectedby = $_POST['collectedby'];



$query ="UPDATE stock SET name='$name',ordered='$ordered',currentStock='$currentStock',onHand= ordered + currentStock,stockOut='$stockOut',stockOut='$stockOut',collectedby='$collectedby',remaining=onHand - stockOut WHERE id=$id";

	if ($con->query($query)) {
		echo "Item successfully updated";
	}else{
		echo "an error occured".$con->error;
	}
}

?>

<?php
$id = $_REQUEST['id'];
$getstock = mysqli_query($con,"SELECT * FROM stock WHERE id=$id");

while ($stock=mysqli_fetch_array($getstock)) {

		$name = $stock['name'];
	$ordered = $stock['ordered'];
	$currentStock = $stock['currentStock'];

	$stockOut = $stock['stockOut'];
	$collectedby = $stock['collectedby'];
	$remaining = $stock['remaining'];
?>


<form action="" method="post">
<input type="hidden" name="id" value="<?php echo $id; ?>">

<input type="text" name="name" placeholder="Item Name" value="<?php echo $name; ?>">
<br>
<input type="text" name="ordered" placeholder="Number of Items Ordered" value="<?php echo $ordered;?>">
<br>
<input type="text" name="currentStock" placeholder="Current Stock" value="<?php echo $currentStock;?>">
<br>
<input type="text" name="stockOut" placeholder="Stock Out" value="<?php echo $stockOut;?>">
<br>
<input type="text" name="collectedby" placeholder="Collected By" value="<?php echo $collectedby; ?>">
<br>


<br>
<input type="submit" name="save" value="save" >
</form>


<?php
}
?>

</table>
</body>

</html>