<html>
<body>

<div class="container-fluid">
<div class="col-md-12">
<div class="card mt-5">
   
<div class="card-header">

<h4> Month Wise List of Any Employee </h4>

</div>

<div class="card-body">

<form  method="POST" action="index.php?page=month_attendance_print">
	
<div class="row">
<div class="col-md-4">
<div class="form-group">
<label> From Date </label>
<input type="date" name="datetime_log" class="form-control">


</div>
</div>

<div class="col-md-4">
<div class="form-group">
<label> To Date </label>
<input type="date" name="date_updated" class="form-control">


</div>
</div>
<div class="col-md-2">
	<div class="form-group">

<br>
<button class="btn btn-primary" type="submit"> List   </button>
</div>
</div>
</div>

</form>
</div>
</div>
</div>
</div>

</div>
</body>
</html>