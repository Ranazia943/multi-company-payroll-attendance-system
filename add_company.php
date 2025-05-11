


<?php

include('db_connect.php');
include 'topbar.php';
include('session.php');

if(isset($_POST['submit'])){
$name=$_POST['name'];
$company=$_POST['company'];
$email=$_POST['email'];
$password=$_POST['password'];
$phone=$_POST['phone'];


//  $employee = "SELECT * from  employee WHERE employee_no = '$employee_no'";
//  $resttype = mysqli_query($conn, $employee); $gettype = mysqli_fetch_array($resttype);
//                         $company_id = $gettype['company_id'];
 $qry="INSERT into company (name,email,password,company,phone) values ('$name','$email','$password','$company','$phone')";

if(mysqli_query($conn,$qry)){
 print "<script> alert ('you have added a company') </script>";
}else{

	print "<script> alert ('program is not running') </script>";

	
}
}
?>


	 <div class="container-fluid mt-3">				
					<div class="card-header">
						<span><h5 style='background: #310D05; padding: 10px; color:white;'>Add New Company</h5></span>
						<br><br>
					
	<form method="POST">
	<div class="form-group">
			<label> Owner Name </label>
	
			<input type="text" name="name" required="required" class="form-control"/>
	</div>
		

				<div class="form-group">
			<label>Company Name </label>
	
			<input type="text" name="company" required="required" class="form-control"/>
	</div>
		

    <div class="form-group">
			<label>Company Name </label>
	
			<input type="email" name="email" required="required" class="form-control"/>
	</div>
				<div class="form-group">
			<label>Password</label>
	
			<input type="password" name="password" required="required" class="form-control"/>
	</div>
    
    <div class="form-group">
			<label>Phone No </label>
	
			<input type="text" name="phone" required="required" class="form-control"/>
	</div>
    <center>
              <button type="submit" name="submit" class="btn btn-danger"> Submit </button>   
</center>
	</form>
</div>

			