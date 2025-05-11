<?php if($role==2){?>



<?php

include('db_connect.php');
include 'topbar.php';
include('session.php');

if(isset($_POST['submit'])){
$date_apply=$_POST['date_apply'];
$date_leave=$_POST['date_leave'];
$subject=$_POST['leave_status'];
$message=$_POST['message'];

 $employee = "SELECT * from  employee WHERE employee_no = '$employee_no'";
 $resttype = mysqli_query($conn, $employee); $gettype = mysqli_fetch_array($resttype);
                        $company_id = $gettype['company_id'];
 $qry="INSERT into employee_leave (employee_no,date_apply,date_leave,leave_status,message,company_id) values ('$employee_no','$date_apply','$date_leave','$subject','$message','$company_id')";

if(mysqli_query($conn,$qry)){
 print "you have applied for a leave";
}else{

	print "<script> alert: (program is not running) </script>";

	
}
}
?>


	 <div class="container-fluid mt-3">				
					<div class="card-header">
						<span><b>Apply For Leave</b></span>
						<br><br>
					
	<form method="POST">
<div class="form-group">
			<label>Select Leave</label>
			<select class="form-control" name="leave_status">
				<option value="" disabled selected> Leave type</option>
			<?php
			$dept = $conn->query("SELECT * from leave_type order by leave_type asc");
			while($row=$dept->fetch_assoc()):
			?>
				<option value="<?php echo $row['id'] ?>" <?php echo isset($department_id) && $department_id == $row['id'] ? "selected" :"" ?>><?php echo $row['leave_type'] ?></option>
			<?php endwhile; ?>
			</select>
		</div>

				<div class="form-group">
			<label>From Date </label>
	
			<input type="date" name="date_apply" required="required" class="form-control"/>
	</div>
		

		<div class="form-group">
			<label>To Date:</label>
			<input type="date" name="date_leave" required="required" class="form-control"/>
		</div>
		<div class="form-group">
			<label>Message</label>
			<input type="text" name="message" required="required" class="form-control"/>
		</div>
              <center>
              <button type="submit" name="submit" class="btn btn-primary"> Submit </button>   
</center>
	</form>
</div>
<?php        }?>
			