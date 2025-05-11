<!--total_salary=30000;
(s* from employee salary);
cd..
totalday=according to calendar;
salary_per_day=total_salary/totaldays;
counted_salary=presentday*salary_per_day;
present_day=attendance record as rows;

(s * from attendance rows limit by id)
-->

<?php
include 'db_connect.php';
include 'session.php';

if(isset($_POST['employee_no'])){

	$employee_no=$_POST['employee_no'];

	 $qury="select * from attendance where employee_id='$employee_no' and log_type ='1' and company_id='$company_id'";


	$qurry=mysqli_query($conn,$qury);
    
	$row=mysqli_fetch_array($qurry);

     $emp_id=$row['employee_id'];

     $qry="select firstname,lastname,employee_no,salary from employee where id='$emp_id'";
      $data=mysqli_query($conn,$qry);
      $drow=mysqli_fetch_array($data);
     
       
      // echo $row['log_type'] . "</br>";
      // echo  $drow['employee_no'] . "</br>";
      // echo $drow['salary'] . "</br>";
      // echo  $drow['firstname'] . "</br>";
      // echo $drow['lastname'] . "</br>";

      
	

       
	$present_day= mysqli_num_rows($qurry);
	$salary=$drow['salary'];
   $totol_days=30;

   $salary_per_day=$salary/30;
   

   $month_salary=$salary_per_day*$present_day;

  print "<b>Total Salary:</b>" . $salary . "<br><br>";
  print "<b>total days attendance:</b>" . $present_day . "<br><br>";
   print "<b>Net Salary :</b>" .  $month_salary;

}


?>