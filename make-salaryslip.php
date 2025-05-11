<?php 
include 'topbar.php'; ?>

<div class="container-fluid">
	<form id='employee_frm'>
                	
		<div class="form-group">
			<label>Employee Id:</label>
			<select class="custom-select browser-default select2" name="employee_no">
				
			<?php
		$sql="select * from employee where employee_no='$company_name'";

                        $res=mysqli_query($conn,$sql);

	                  while($row=mysqli_fetch_array($res)){
			?>
				<option value="<?php echo $row['employee_no'];?>"></option>
			<?php } ?>
			</select>
		</div>


		<div class="form-group">
			<label>Firstname</label>
			
			<input type="text" name="employee_no" required="required" class="form-control"/>
		</div>
		<div class="form-group">
			<label>Firstname</label>
			
			<input type="text" name="employee_no" required="required" class="form-control"/>
		</div>


		<div class="form-group">
			<label>Firstname</label>
			
			<input type="text" name="employee_no" required="required" class="form-control"/>
		</div>
</form></div>