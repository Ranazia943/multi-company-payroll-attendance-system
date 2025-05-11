<html>
<body>

<div class="container-fluid">
<div class="col-md-12">
<div class="card mt-5">
   
<div class="card-header">

<h4> Month Wise List of Any Employee </h4>

</div>

<div class="card-body">

<form  method="POST" action="index.php?page=report_byname">
	
<div class="row form-group">
			<div class="col-md-4">
				<label for="" class="control-label">Employee</label>
				<select id="employee_id" class="borwser-default select2" name="employee_no">
					<option value=""></option>
					<?php 
					$employee = $conn->query("SELECT * from employee where company_id='$company_id'");
					while($row = $employee->fetch_assoc()):
					?>
						<option value="<?php echo $row['id'] ?>"><?php echo $row['firstname'] . ' '. $row['lastname'] . ' | ' .  $row['employee_no'] ?></option>
					<?php endwhile; ?>
				</select>
			</div>
</div>
<div class="col-md-2">
	<div class="form-group">

<br>
<button class="btn btn-primary" type="submit"> List   </button>
</div>
</div>
</div>

</form>
</div>
</div>
</div>
</div>

</div>
</body>
</html>