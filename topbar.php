<head>
  <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Roboto+Condensed:wght@300&display=swap" rel="stylesheet">
<style>
    body{
        font-family: 'Roboto Condensed', sans-serif;
      font-size: 14px;
      font-weight: bold;
    }

</style>


</head>
<?php
include 'db_connect.php';
include 'session.php';
?>

<nav class="navbar navbar-light fixed-top bg-warning" style="padding:0;min-height:3.5rem">
  <div class="container-fluid mt-2 mb-2">
  	<div class="col-lg-12">
  		<div class="col-md-1 float-left" style="display: flex;">
  		
  		</div>
      <div class="col-md-4 float-left text-white">
        <large><b>Payroll Management System</b></large>
      </div>
	  <div class="col-md-2 float-right text-white"> 
		<a href="logout.php" class="text-white"> Welcome:  <?php echo $company_auth; ?>  <i class="fa fa-power-off"></i></a>
	  </div>
    </div>
  </div>
  
</nav>
