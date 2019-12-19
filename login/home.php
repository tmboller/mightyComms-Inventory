
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
  background-color: maroon;
  color: white;
  padding: 14px 20px;
  margin: 8px 0;
  border: none;
  border-radius: 4px;
  cursor: pointer;
}

input[type=submit]:hover {
  background-color: red;
}


a {
  list-style-type: none;
  margin: 0;
  padding: 0;
  overflow: hidden;
  background-color: #333;
  width: 50%;
  margin-left: 350px;
}

h3

{
	list-style-type: none;
  margin-top: 40px;
  padding: 0;
  overflow: hidden;
  color:white;
  text-align:center;
  background-color: #333;
  width: 35%;
  margin-left: 500px;
}

a {
  display: block;
  color: white;
  text-align: center;
  padding: 14px 16px;
  text-decoration: none;
 
}

a:hover {
  background-color: red;
  
}
</style>

</head>

<title>Mighty Comms || Add Item</title>
<body>


<div>
<a href="index.php">Home</a>

</div>

<h3>Add Item</h3>

<?php
if (isset($_POST['save'])) {
	$name = $_POST['name'];
	$stockOut = $_POST['stockOut'];
	$collectedby = $_POST['collectedby'];
	$date = $_POST['date'];

$query ="INSERT INTO `stocks`(`name`, `stockOut`, `collectedby`, `date`) VALUES ('$name','$stockOut','$collectedby','$date')";

	if ($con->query($query)) {
		echo "Item Added Successfully";
	}else
	{
		echo "an error occured";
	}
}



?>


<form action="" method="post">
<input type="text" name="name" placeholder="Item Name:">
<br>

<input type="text" name="stockOut" placeholder="Amount Collected">
<br>

<input type="text" name="collectedby" placeholder="Collected By:">
<br>
<input type="date" name="date" placeholder="Date Collected">
<br>
<input type="submit" name="save" value="save" >
</form>

<div class="form-wrapper"> 
 
	 <div class="reminder">
    <p><a href="techlogout.php">Log out</a></p>
  </div>
</div>
</table>
</body>

</html>