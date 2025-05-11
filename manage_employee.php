
<?php 

include 'db_connect.php';
include 'session.php'; 
if(isset($_GET['id'])){
	$qry = $conn->query("SELECT * FROM employee where id = ".$_GET['id'])->fetch_array();
	foreach($qry as $k => $v){
		$$k = $v;
	}
}
?>

<div class="container-fluid">
	<form id='employee_frm'>
                	
		  
		<div class="form-group">
			<label>Firstname</label>
			<input type="hidden" name="id" value="<?php echo isset($id) ? $id : "" ?>" />
			<input type="text" name="firstname" required="required" class="form-control" value="<?php echo isset($firstname) ? $firstname : "" ?>" />
		</div>

		<div class="form-group">
			<label>Lastname:</label>
			<input type="text" name="lastname" required="required" class="form-control" value="<?php echo isset($lastname) ? $lastname : "" ?>" />
		</div>
		<div class="form-group">
			<label>Email:</label>
			<input type="email" name="email" required="required" class="form-control" value="<?php echo isset($email) ? $email : "" ?>" />
		</div>
           
            	<div class="form-group">
			<label>Password:</label>
			<input type="password" name="password" required="required" class="form-control" value="<?php echo isset($password) ? $password : "" ?>" />
		</div>
          

           <div class="form-group">
			<label>Department</label>
			<select class="custom-select browser-default select2" name="department_id">
				<option value=""></option>
			<?php
			$dept = $conn->query("SELECT * from department where company_id='$company_id'");
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
			$pos = $conn->query("SELECT * from position where company_id='$company_id'");
			while($row=$pos->fetch_assoc()):
			?>
				<option class="opt" value="<?php echo $row['id'] ?>" data-did="<?php echo $row['department_id'] ?>" <?php echo isset($department_id) && $department_id == $row['department_id'] ? '' :"disabled" ?> <?php echo isset($position_id) && $position_id == $row['id'] ? " selected" : '' ?> ><?php echo $row['name'] ?></option>
			<?php endwhile; ?>
			</select>
		</div>
		<div class="form-group">
			<label>Monthly Salary</label>
			<input type="number" name="salary" required="required" class="form-control text-right" step="any" value="<?php echo isset($salary) ? $salary : "" ?>" />
		</div>
		
		<div class="form-group">
			
			<input type="hidden" name="company" required="required" class="form-control text-right" step="any" value="<?php echo isset($company_id) ? $company_id : "" ?>" />
				</div>

	  
		
		<div class="form-group">
			<label>Finger:</label>
			<input type="text" name="finger" required="required" class="form-control text-right" step="any" value="<?php echo isset($finger) ? $finger : "" ?>" />
		</div>
               <div class="form-group">
			<label>city:</label>
			<input type="text" name="city" required="required" class="form-control text-right" step="any" value="<?php echo isset($city) ? $city : "" ?>" />
			</div>

               <div class="form-group">
			<label>Moblie</label>
			<input type="text" name="mobile" required="required" class="form-control" step="any" value="<?php echo isset($mobile) ? $mobile : "" ?>" />
		       
                   </div>

                    <div class="form-group">
			<label>Date:</label>
			<input type="date" name="date" required="required" class="form-control" step="any" value="<?php echo isset($date) ? $date : "" ?>" />
		       </div>
		     +
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
			})
		})
	})
</script>