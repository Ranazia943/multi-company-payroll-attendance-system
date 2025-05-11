<html>
<head>
<html>
<head>


<script type="text/javascript" src="https://cdn.datatables.net/1.12.1/css/jquery.dataTables.min.css"></script>

<script type="text/javascript" src="https://cdn.datatables.net/buttons/2.2.3/css/buttons.dataTables.min.css"> </script>
<script type="text/javascript" src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/buttons/2.2.3/js/dataTables.buttons.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/buttons/2.2.3/js/buttons.html5.min.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/buttons/2.2.3/js/buttons.print.min.js"></script>

</head>
<body>

<?php
include 'db_connect.php';
include 'session.php';

if(isset($_POST['employee_no']) && ($_POST['datetime_log'])){

	$employee_no=$_POST['employee_no'];
    $datetime_log=$_POST['datetime_log'];

	 $qury="select * from attendance where employee_id='$employee_no' and log_type ='1' and company_id='$company_id' and month(datetime_log)='$datetime_log'";


	$qurry=mysqli_query($conn,$qury);
    
	$row=mysqli_fetch_array($qurry);

if($present_day= mysqli_num_rows($qurry)>0){
     $emp_id=$row['employee_id'];

     $qry="select firstname,lastname,employee_no,salary,department_id,position_id from employee where id='$emp_id'";
      $data=mysqli_query($conn,$qry);
      $drow=mysqli_fetch_array($data);
      $dep=$drow['department_id'];
      $pos=$drow['position_id'];

      $qry=mysqli_query($conn,"select * from department where id='$dep'");
      $ddrow=mysqli_fetch_array($qry);

     $qry=mysqli_query($conn,"select * from position where id='$pos'");
      $prow=mysqli_fetch_array($qry);
        
	
	$salary=$drow['salary'];
   $totol_days=30;

   $salary_per_day=$salary/30;
   $absent_days=$totol_days-$present_day;

   $month_salary=$salary_per_day*$present_day;
?>

<div class="container">
<div class="row">
    <div class="col">  <h3 style='background: #250C06; text-align: center; color:white; padding:7px;'> Salary List</h3> </div> 
</div>
  <table class="table table-bordered" id="example">
    <thead class="thead-dark">
      <tr>
        <th>Firstname</th>
        <th>Lastname</th>
        <th>Department</th>
        <th>Position</th>
        <th>Month</th>

        <th>Total Salary</th>
        <th>Attendance Days</th>
      <th>Absent Days</th>
        <th>Remaining Salary</th>


      </tr>
    </thead>
    <tbody>
      <tr>
        <td><?Php print $drow['firstname']; ?></td>
        <td><?Php print $drow['lastname']; ?></td>
         <td><?Php print $ddrow['name']; ?></td>
        <td><?Php print $prow['name']; ?></td>
       <td><?Php print $datetime_log; ?></td>       
        <td><?Php print $salary; ?></td>
        <td><?Php print $present_day;  ?></td>

        <td><?Php print $absent_days; ?></td>
        <td><?Php print $month_salary; ?></td>
      </tr>

    
    </tbody>
      <script>
    $(document).ready(function() {
    $('#example').DataTable( {
        dom: 'Bfrtip',
        buttons: [
            'copy', 'csv', 'excel', 'pdf', 'print'
        ]
    } );
} );
</script>

<?php }else {

  print " <h6 style='color:red';> such record is not found </h6>";
}
}    

 ?>

  </table>
</div>
</body>
</html>

