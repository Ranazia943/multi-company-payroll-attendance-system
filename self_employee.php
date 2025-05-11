
<?php include('db_connect.php') ?>
		<div class="container-fluid " >
			<div class="col-lg-12">
				
				<br />
				<br />
				<div class="card">
					<div class="card-header">
						<span><center><h3 style='background: #310D05; color:white; padding:8px;'>Employee Details</h3></center></span>
						
					<div class="card-body">
						<table id="table" class="table table-hover table-bordered table-striped">
							<thead>
							<tbody>
								
								
								
								
     							<?php
 if($role==2){
	$res=mysqli_query($conn,"select * from employee where employee_no='$employee_no'");
	while($erow=mysqli_fetch_assoc($res)){

						$dep_id=$erow['department_id'];
						$pos_id=$erow['position_id'];
                        $com=$erow['company_id'];
						
                       $dep="select * from department where id=$dep_id";
                       $department=mysqli_query($conn,$dep);

                        $drow=mysqli_fetch_array($department);
                       
		               $pos="select * from position where id=$pos_id";
		               $position=mysqli_query($conn,$pos);
		               $prow=mysqli_fetch_array($position);


		                $pos="select * from company where id=$com";
		               $position=mysqli_query($conn,$pos);
		               $crow=mysqli_fetch_array($position);
       
        ?>
							<tr>
								<th>ID</th>
				<td> <?php print $erow['id'] ?></td>
			</tr><tr>
				<th> Employee No </th>
					<td> <?php  print $employee_no; ?></td>
				</tr><tr>
					     <th> Full Name </th>
						<td> <?php print $erow['firstname']; ?>          
                          <?php print $erow['lastname']; ?></td>
                      </tr>
                         <tr>
                      	     <th> Email </th>
	                         <td> <?php print $erow ['email']; ?></td>
	                     </tr><tr>
	                  
                         <tr>
                      	     <th> Password </th>
	                         <td> <?php print $erow ['password']; ?></td>
	                     </tr><tr>

	                     	<tr>
                      	     <th>Finger </th>
	                         <td> <?php print $erow ['finger']; ?></td>
	                     </tr><tr>
                      <tr>
                              <tr>
                      	     <th>Company </th>
	                         <td> <?php print $crow ['company']; ?></td>
	                     </tr><tr>
                      <tr>
	                     	<tr>
                      	     <th>Address </th>
	                         <td> <?php print $erow ['address']; ?></td>
	                     </tr><tr>
                      <tr>
                        
                              
	                     	<tr>
                      	     <th>Mobile </th>
	                         <td> <?php print $erow ['mobile']; ?></td>
	                     </tr><tr>
                      <tr>  

	                     	<tr>
                      	     <th>Joining Date </th>
	                         <td> <?php print $erow ['date']; ?></td>
	                     </tr><tr>
                      <tr>


                      	     <th> Department </th>
	                         <td> <?php print $drow ['name']; ?></td>
	                     </tr><tr>
	                     	<th> Position </th>
					           <td> <?php print $prow ['name']; ?></td>
					              </tr><tr>
					              	<th> Salary </th>
	                            <td> <?php print $erow ['salary']; ?></td>

	                                          
								
						  </tr>

								<?php
                 }
                 }
 
								?>
						<thead>
							</tbody>
						</table>
					</div>
				</div>
			</div>
		</div>
			
	</div>