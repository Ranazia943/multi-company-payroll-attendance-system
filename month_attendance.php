<html>
<body>
<?php
include 'db_connect.php';
include 'session.php';
?>
<div class="container-fluid">
<div class="col-md-12">
<div class="card mt-5">
   
<div class="card-header">

<h4> Salary Deduction On Base Of Leave </h4>

</div>

<div class="card-body">

<form  method="post" action="index.php?page=monthly_report">
             <div class="row">
            
        <div class="col-md-4">
              <div class="form-group">
                <label>Month:</label>
            <select class="custom-select browser-default select2" name="datetime_log">
                <option value=""></option>

             <?php 
                     
                    $employee = $conn->query("SELECT MONTH(datetime_log) as ename  from attendance  where company_id='$company_id' group by MONTH(datetime_log)");
                 ?>
                   <?php
                     while($row=$employee->fetch_assoc()){
                       ?>
            <option value="<?php echo $row['ename']; ?>"><?php echo  $row['ename'];?></option>
                    <?php } ?>
                </select>
        
        </div>
    </div>
<div class="col-md-4">
    <div class="form-group">
<br>
<button class="btn btn-primary" type="submit" name="submit"> List   </button>
</div>
</div>
</div>

</table>

</div>
</div>
</div>
</div>

</div>
</body>
</html>
