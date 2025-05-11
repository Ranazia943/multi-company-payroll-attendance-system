<html>

<head>
<link rel="stylesheet" href="assets/font-awesome/css/all.min.css">
</head>  
<body>
<?php include 'db_connect.php' ?>


<div class="container-fluid pt-4 px-4">
	<?php if($place==10){ ?>
                <div class="row g-4 text-white">
                    <div class="col-sm-6 mt-2 col-xl-3 ">
                       <a href="index.php?page=total_employee" style='color:white;'>
						   <div class="bg-secondary rounded d-flex align-items-center justify-content-between p-2">
							<i class="fa fa-solid fa-users fa-2x"></i>
                            <div class="mx-auto">
                                <p class="mb-0">Total Employee </p>
                                <hr color=white>
                                <center>
                                <?php
								
								$qry="SELECT * from employee where company_id='$company_id'";
								$data=mysqli_query($conn,$qry);
								
									
									$row=mysqli_num_rows($data);
										
									print '<h5 style="margin-bottom:0px;">' .$row. '</h5>';
									?>
							
                           
									</center>
                            </div>
                       </div>
                       </div>
		        
					
                    <div class="col-sm-6 mt-2 col-xl-3">
						<a href="index.php?page=present_employee" style='color:white;'>
                        <div class="bg-secondary rounded d-flex align-items-center justify-content-between p-2">
							<i class="fa fa-solid fa-users fa-2x"></i>
							
                            <div class="mx-auto">
							
									<p class="mb-0">Present Employee</p>
                                <hr color=white>
								<center>
								
                                
						<?php
								
								$qry="SELECT * FROM attendance where company_id='$company_id' group by employee_id  ";
								
								$data=mysqli_query($conn,$qry);
								
								$arow=mysqli_num_rows($data);
								
								print '<h5 style="margin-bottom:0px;">' . $arow. '</h5>';
								?>
						
									</center>
                            </div>
                        </div>
                    </div>
						</a>
					
                    <div class="col-sm-6 mt-2 col-xl-3">
						<a href="index.php?page=absent_employee" style='color:white;'>
                        <div class="bg-secondary rounded d-flex align-items-center justify-content-between p-2">
							<i class="fa fa-solid fa-users fa-2x"></i>
                            <div class="mx-auto">
                                <p class="mb-0">Absent Employee</p>
                               <hr color=white>
								<center>
									<?php 

                        $aqry="SELECT employee_no FROM employee WHERE NOT EXISTS (SELECT * FROM  attendance WHERE employee.employee_no = attendance.employee_id)";
						     $data=mysqli_query($conn,$aqry);

									$data=$row-$arow;
									echo '<h5 style="margin-bottom:0px;">' .$data . '</h5>';
									
								
						?>
								</center>
                            </div>
                        </div>
						</a>
                    </div>
						
                    <div class="col-sm-6 mt-2 col-xl-3">
						<a href="index.php?page=employee_leave" style='color:white;'>
						
                        <div class="bg-secondary rounded d-flex align-items-center justify-content-between p-2">
							<i class="fa fa-solid fa-users fa-2x"></i>
                            <div class="mx-auto">
                                <p class="mt-1"> On Leave</p>
                                <hr color=white>
								<center>
                                <?PHP
									
								$qry="SELECT *  FROM employee_leave where company_id='$company_id'";
								
								$data=mysqli_query($conn,$qry);
								
								$arow=mysqli_num_rows($data);
								
								print '<h5 style="margin-bottom:0px;">' . $arow. '</h5>';
									
									
									?>
									</center>
                            </div>
                        </div>
						</a>
                    </div>
					
					
					
                </div>
            </div>
	

	<div class="container-fluid pt-4 px-4">
                <div class="row g-4 text-white">
                    <div class="col-sm-6 mt-2 col-xl-3">
						<a href="index.php?page=salary_arrangement" style='color:white;'>
						
                        <div class="bg-secondary rounded d-flex align-items-center justify-content-between p-3">
							<i class="fa fa-solid fa-users fa-2x"></i>
                            <div class="p-1">
                                
                                <p class="p-2"> Salary Deduction</p>
   
                              </div>
                        </div>
						</a>
                    </div>

					  <div class="col-sm-6 mt-2 col-xl-3">
						
						<a href="index.php?page=attendance_list" style='color:white;'>
                        <div class="bg-secondary rounded d-flex align-items-center justify-content-between p-3">
                          <i class="fa fa-regular fa-list fa-2x"></i>
        
							<div class="p-1">
                               <p class="p-2"> Attendance List</p>
								
								
                            </div>
    
                        </div>
						</a>
                    </div>
                    <div class="col-sm-6 mt-2 col-xl-3">
						
						<a href="index.php?page=add_company" style='color:white;'>
                        <div class="bg-secondary rounded d-flex align-items-center justify-content-between p-3">
                          <i class="fa fa-regular fa-list fa-2x"></i>
        
							<div class="p-1">
                               <p class="p-2"> Add New Company</p>
								
								
                            </div>
    
                        </div>
						</a>
                    </div>
                    <div class="col-sm-6 mt-2 col-xl-3">
                        <div class="bg-secondary rounded d-flex align-items-center justify-content-between p-2">
                            <i class="fa fa-solid fa-fingerprint fa-2x"></i>
                            <div class="mx-auto">
                                <p class="mb-0">Add Leave Type</p>
								<hr color=white>
								<center>
                                <h6 class="mb-0">1</h6>
									</center>
                            </div>
                        </div>
                    </div>
    <?php }elseif($role==2) { ?>
		<div class="row g-4 text-white">
                    <div class="col-sm-6 mt-2 col-xl-4">
                       <a href="index.php?page=self_employee" style='color:white;'>
						   <div class="bg-secondary rounded d-flex align-items-center justify-content-between p-5">
							<i class="fa fa-solid fa-users fa-2x"></i>
                            <div class="mx-auto">
                                <p class="mb-0">Employee Details</p>
                                	
                            </div>
                       </div>
                       </div>
                       <div class="col-sm-6 mt-2 col-xl-4 ">
                       <a href="index.php?page=add_employee_login" style='color:white;'>
						   <div class="bg-secondary rounded d-flex align-items-center justify-content-between p-5">
							<i class="fa fa-solid fa-users fa-2x"></i>
                            <div class="mx-auto">
                                <p class="mb-0">Leave Apply</p>
                                                           </div>
                       </div>
                       </div>
                       <div class="col-sm-6 mt-2 col-xl-4 ">
                       <a href="index.php?page=employee_leave" style='color:white;'>
						   <div class="bg-secondary rounded d-flex align-items-center justify-content-between p-5">
							<i class="fa fa-solid fa-users fa-2x"></i>
                            <div class="mx-auto">
                                <p class="mb-0">Leave Status</p>
                                
                            </div>
                       </div>
                       </div>
                       </div>
                       </div>

</div>					
	
                </div>
           
			
		<?php } ?>
</body>
</html>