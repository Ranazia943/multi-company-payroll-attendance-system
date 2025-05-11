<?php

$qry="select * from attendance group by employee_id";
$qury=mysqli_query($conn,$qry);
while($row=mysqli_fetch_array($qury)){

$employe_id= $row['employee_id'];

$emply="select * from employee where id=$employe_id";
$employee=mysqli_query($conn,$emply);

$erow=mysqli_fetch_array($employee);
print $erow['firstname'];

print $erow['employee_no'];
print $erow['lastname']; 
print $employe_id;
	
	

}

?>