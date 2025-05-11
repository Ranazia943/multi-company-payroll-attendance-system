
<?php include('db_connect.php');
include 'session.php';

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
									
									<th> Employee No</th>
									<th> Firstname</th>
									<th> Lastname</th>
									<th> Department</th>
						            <th> Position</th>
									<th> Salary</th>
									
								</tr>
							</thead>
							<tbody>
	
							<?php
                     $aqry="SELECT * FROM employee WHERE NOT EXISTS
					 (SELECT * FROM  attendance
							   where employee.id = attendance.employee_id) AND  company_id ='$company_id'"; 
                     
                        
                         $data=mysqli_query($conn,$aqry);
						 while($row=mysqli_fetch_array($data)){
						 
						 $dep=$row['department_id'];
						 $pos=$row['position_id'];
                          
                           $query="SELECT * from department where id='$dep'";
                           $qry=mysqli_query($conn,$query);
                            $dprow=mysqli_fetch_array($qry);
			                
			                 $query="SELECT * from position where id='$pos'";
                           $qry=mysqli_query($conn,$query);
                            $deprow=mysqli_fetch_array($qry);
                         ?>
							<tr>
								
								<td> <?php  print $row['employee_no']; ?></td>
						         <td> <?php  print $row['firstname']; ?></td>
						         <td> <?php  print $row['lastname']; ?></td>
						         <td> <?php  print $dprow['name']; ?></td>
	                            <td> <?php  print $deprow['name']; ?></td>
								<td> <?php print $row ['salary']; ?></td>
								
																</tr>
						
							</tbody>
							<?php
						}
							?>
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
