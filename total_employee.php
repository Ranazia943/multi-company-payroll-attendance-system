
<?php include('db_connect.php');
?>
		<div class="container-fluid " >
			<div class="col-lg-12">
				
				<br />
				<br />
				<div class="card">
					<div class="card-header">
						<span><center><h3>Employee List</h3></center></span>
						
					<div class="card-body">
						<table id="table" class="table table-hover table-bordered table-striped">
							<thead>
								<tr>
									<th>ID</th>
									<th> Employee No</th>
									<th>Firstname</th>
						
									<th>Lastname</th>
									<th>Department</th>
									<th>Position</th>
									<th>Date</th>
								</tr>
							</thead>
							<tbody>
								
							<?php
	            
                        $emply="select * from employee where company_id='$company_id'";
                $employee=mysqli_query($conn,$emply);

                    while($erow=mysqli_fetch_array($employee)){
				       
						$dep_id=$erow['department_id'];
						$pos_id=$erow['position_id'];
                        
						
                       $dep="select * from department where id=$dep_id";
                $department=mysqli_query($conn,$dep);

                    $drow=mysqli_fetch_array($department);
                       
						$pos="select * from position where id=$pos_id";
						$position=mysqli_query($conn,$pos);
						$prow=mysqli_fetch_array($position);
						

                       
                       ?>
							<tr>
								<td> <?php print $erow['id'] ?></td>
									<td> <?php  print $erow['employee_no']; ?></td>
									<td> <?php print $erow['firstname']; ?></td>

                                   
                                     <td> <?php print $erow['lastname']; ?></td>
                                     
	                              <td> <?php print $drow ['name']; ?></td>
					               <td> <?php print $prow ['name']; ?></td>
	                                 <td> <?php print $erow ['salary']; ?></td>
								
																</tr>
								<?php
									}
										
								?>
						
							</tbody>
						</table>
					</div>
				</div>
			</div>
		</div>
			
		
		
	<script type="text/javascript">
		$(document).ready(function(){
			$('#table').DataTable();
		});
	</script>
	<script type="text/javascript">
		$(document).ready(function(){

			

			
			$('.edit_employee').click(function(){
				var $id=$(this).attr('data-id');
				uni_modal("Edit Employee","manage_employee.php?id="+$id)
				
			});
			$('.view_employee').click(function(){
				var $id=$(this).attr('data-id');
				uni_modal("Employee Details","view_employee.php?id="+$id,"mid-large")
				
			});
			$('#new_emp_btn').click(function(){
				uni_modal("New Employee","manage_employee.php")
			})
			$('.remove_employee').click(function(){
				_conf("Are you sure to delete this employee?","remove_employee",[$(this).attr('data-id')])
			})
		});
		function remove_employee(id){
			start_load()
			$.ajax({
				url:'ajax.php?action=delete_employee',
				method:"POST",
				data:{id:id},
				error:err=>console.log(err),
				success:function(resp){
						if(resp == 1){
							alert_toast("Employee's data successfully deleted","success");
								setTimeout(function(){
								location.reload();

							},1000)
						}
					}
			})
		}
	</script>
