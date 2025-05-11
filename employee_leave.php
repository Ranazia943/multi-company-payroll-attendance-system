<?php
include('db_connect.php');


if($role==2){

 $sql="select * from employee_leave where employee_no='$employee_no'";

$res=mysqli_query($conn,$sql);


 $sqll="select * from employee where employee_no='$employee_no'";

$ress=mysqli_query($conn,$sqll);
$fetch=mysqli_fetch_array($ress);

$dep_id=$fetch['department_id'];
$pos_id=$fetch['position_id'];
	
}else{
if(isset($_GET['type']) && $_GET['type']=='update' && isset($_GET['id'])){
	$id=mysqli_real_escape_string($conn,$_GET['id']);
	$status=mysqli_real_escape_string($conn,$_GET['status']);
	mysqli_query($conn,"update `employee_leave` set leave_status='$status' where id='$id'");
 echo "<script>window.location='index.php?page=employee_leave';</script>";       
}
 $sql="select * from employee_leave where company_id='$company_id'";

$res=mysqli_query($conn,$sql);


 $sqll="select * from employee";

$ress=mysqli_query($conn,$sqll);
$fetch=mysqli_fetch_array($ress);

$dep_id=$fetch['department_id'];
$pos_id=$fetch['position_id'];

}
?>
<div class="content pb-0">
            <div class="orders">
               <div class="row">
                  <div class="col-xl-12">
                     <div class="card">
                        <div class="card-body--">
                           <div class="table-stats order-table ov-h">
                              <table class="table "><em></em>
		<h3 class="text-center badge-dark card-header"><b style="color:white";> Applied Leaves</h3>
                                 <thead>
                                    <tr>

									   <th width="10%">Emp No</th>
									   <th width="15%">Department</th>
									   <th width="10%">position</th>
									   
                              <th width="10%">From</th>
									   <th width="10%">To</th>
									   <th width="15%">Description</th>
									   <th width="15%">Leave Status</th>
										<th width=5%>Action </th>
								
                                    </tr>
                                      </thead>
                                
                                        <tbody>
                       <?php 
									$i=1;
									while($row=mysqli_fetch_assoc($res)){
    
                            $dep="select * from department where id=$dep_id";
                            $depa=mysqli_query($conn,$dep);
                            $drow=mysqli_fetch_array($depa);

                            $pos="select * from position where id=$pos_id";
                            $posa=mysqli_query($conn,$pos);
                            $prow=mysqli_fetch_array($posa);
                            ?>
									<tr>
										
						       <td><?php if($role==2){ echo $employee_no;}else { echo $row['employee_no']; }?></td>
                              <td><?php echo $drow['name'];?></td>
                              <td><?php echo $prow['name'];?></td>
                              <td><?php echo $row['date_apply'];?></td>
							  <td><?php echo $row['date_leave'];?></td>
							   <td><?php echo $row['message'];?></td>
									   <td>

										  
										   <?php
											if($row['leave_status']==1){
												echo "Applied";
											}if($row['leave_status']==2){
												echo "Approved";
											}if($row['leave_status']==3){
												echo "Rejected";
											}
											
										   ?>
							
										   <?php if($place==10){ ?>
										   <select class="form-control" onchange="update_leave_status('<?php echo $row['id']?>',this.options[this.selectedIndex].value)">
											<option value="1">Update Status</option>
											<option value="2">Approved</option>
											<option value="3">Rejected</option>
										   </select>
										   <?php } ?>
									  <td>
									   <?php
									   if($row['leave_status']==1){ ?>
									   <a href="del_leave.php?id=<?php echo $row['id']?>&type=delete"  class="btn btn-sm btn-outline-danger"><i class="fa fa-trash"></i></a>
									  <?php } else { 
										  
										  
										  
									   if($place==10){ ?>
									   <a href="del_leave.php?id=<?php echo $row['id']?>&type=delete" class="btn btn-sm btn-outline-danger"><i class="fa fa-trash"></i></a>
									  
										  
										 <?php } } ?>
									   
									   
									   </td>									  	
                                    </tr>
									<?php 
									$i++;

									} ?>
                                 </tbody>
                              </table>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
		  </div>
         <script>

		 function update_leave_status(id,select_value){
			window.location.href='employee_leave.php?id='+id+'&type=update&status='+select_value;
		 }

		 </script>
