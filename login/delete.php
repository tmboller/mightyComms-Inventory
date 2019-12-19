<?php
include "includes/database.php";
$id = $_REQUEST['id'];

mysqli_query($con,"DELETE FROM stock WHERE id=$id");
header("location: index.php");
?>