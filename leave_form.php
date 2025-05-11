<?php 
include 'db_connect.php'; 
if(isset($_GET['id'])){
	$qry = $conn->query("SELECT * FROM employee_leave where id = ".$_GET['id'])->fetch_array();
	foreach($qry as $k => $v){
		$$k = $v;
	}
}
?>


<div class="container-fluid">
	<form id='employee' action="add_leave.php" method="POST">
		<div class="form-group">
			<label>Employee No:</label>
			<select class="cutosm-select browser-default select2 form-control" name="employee_no">
			<option value=""> </option>
				<?php
				$emp=$conn->query("SELECT * from employee order by employee_no");
				while($erow=$emp->fetch_assoc()):
				
				?>
				<option value="<?php echo $erow['employee_no']?>" <?php echo isset($employee_no) && $employee_no==$erow['employee_no']? "selected" :"" ?>> <?php echo $erow['employee_no'] ?>
					<?php endwhile; ?>
				
				</option>
			</select>
		</div>
		
			<div class="form-group">
			<label>Department</label>
			<select class="custom-select browser-default select2" name="department_id">
				<option value=""></option>
			<?php
			$dept = $conn->query("SELECT * from department order by name asc");
			while($row=$dept->fetch_assoc()):
			?>
				<option value="<?php echo $row['id'] ?>" <?php echo isset($department_id) && $department_id == $row['id'] ? "selected" :"" ?>><?php echo $row['name'] ?></option>
			<?php endwhile; ?>
			</select>
		</div>
		<div class="form-group">
			<label>Position</label>
			<select class="custom-select browser-default select2" name="position_id">
				<option value=""></option>
			<?php
			$pos = $conn->query("SELECT * from position order by name asc");
			while($arow=$pos->fetch_assoc()):
			?>
				<option class="opt" value="<?php echo $arow['name'] ?>" data-did="<?php echo $arow['department_id'] ?>" <?php echo isset($department_id) && $department_id == $arow['department_id'] ? '' :"disabled" ?> <?php echo isset($position_id) && $position_id == $arow['id'] ? " selected" : '' ?> ><?php echo $arow['name'] ?></option>
			<?php endwhile; ?>
			</select>
		</div>
	
		<div class="form-group">
			<label>Subject:</label>
			<input type="text" name="subject" required="required" class="form-control" value="<?php echo isset($subject) ? $subject : "" ?>" />
		</div>
		
		<div class="form-group">
			<label>Message:</label>
			<textarea type="text" name="message" class="form-control" value="<?php echo isset($message) ? $message : "" ?>"></textarea>
		</div>
		
		<div class="form-group">
			<label>Date_apply</label>
			<input type="date" name="date_apply" required="required" class="form-control" value="<?php echo isset($date_apply) ? $date_apply : "" ?>"/>
		</div>
		<div class="form-group">
			<label>Date_leave</label>
			<input type="date" name="date_leave" required="required" class="form-control" value="<?php echo isset($date_leave) ? $date_leave : "" ?>"/>
		</div>
		<div class="form-group">
		<button class="btn btn-primary" name="submit"> Submit</button>
		</div>
	</form>
</div>

<script>
	$('[name="department_id"]').change(function(){
		var did = $(this).val()
		$('[name="position_id"] .opt').each(function(){
			if($(this).attr('data-did') == did){
				$(this).attr('disabled',false)
			}else{
				$(this).attr('disabled',true)
			}
		})
	})
	$(document).ready(function(){
		$('.select2').select2({
			placeholder:"Please Select Here",
			width:"100%"
		})
		$('#employee_frm').submit(function(e){
				e.preventDefault()
				start_load();
			$.ajax({
				url:'ajax.php?action=save_employee',
				method:"POST",
				data:$(this).serialize(),
				error:err=>console.log(),
				
				success:function(resp){
						if(resp == 1){
							alert_toast("Employee's data successfully saved","success");
								setTimeout(function(){
								location.reload();

							},1000)
						}
				}
				*/
			})
		})
	})
</script>