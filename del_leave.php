<?php
include('db_connect.php');
if(isset($_GET['type']) && $_GET['type']=='delete' && isset($_GET['id'])){
	$id=mysqli_real_escape_string($conn,$_GET['id']);
	mysqli_query($conn,"delete from `employee_leave` where id='$id'");
	echo "<script>window.location='index.php?page=employee_leave';</script>";
}
?>