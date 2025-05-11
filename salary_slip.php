<!--total_salary=30000;
(s* from employee salary);

totalday=according to calendar;
salary_per_day=total_salary/totaldays;
counted_salary=presentday*salary_per_day;
present_day=attendance record as rows;

(s * from attendance rows limit by id)
-->

<?php
$qry="select datetime_log limit by  from attendance where company_id='$company_id'";

$attendance=mysqli_query($conn,$qry);
while($row=mysqli_fetch_array($qry)){
$emp=$row['employee_id'];


$query="select salary from employee where employee_no='$emp'";

$querry=mysqli_query($conn,$query);
$salary=mysqli_fetch($querry);

print $salary['salary'];
}
?>