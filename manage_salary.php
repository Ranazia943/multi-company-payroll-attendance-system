<?php 
include 'db_connect.php'; 

if(isset($_GET['submit'])){
	$salary=$_GET['salary'];
 

}







?>
<form action="" method="get">
	<Input type="number" name="salary"> Salary </Input>
	<br> <br>
	<input type="submit" name="submit" value="submit">

</form>