<?php
ini_set('display_errors' ,'1');
error_reporting(E_ALL & ~E_NOTICE);
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Admin | Employee's Payroll Management System</title>
 	

<?php include('./header.php'); ?>
<?php include('./db_connect.php'); ?>

</head>
<style>
	body{
		width: 100%;
	    height: calc(100%);
	    /*background: #007bff;*/
	}
	main#main{
		width:100%;
		height: calc(100%);
		background:white;
	}
	#login-right{
		position: absolute;
		right:0;
		width:40%;
		height: calc(100%);
		background:orange;
		display: flex;
		align-items: center;
	}
	#login-left{
		position: absolute;
		left:0;
		width:90%;
		height: calc(100%);
		background:#59b6ec61;
		display: flex;
		align-items: center;
		background: url(assets/img/payroll_management.webp);
	    background-repeat: no-repeat;
	    background-size: cover;
	}
	#login-right .card{
		margin: auto;
		z-index: 1
	}
	.logo {
    margin: auto;
    font-size: 8rem;
    background: white;
    padding: .5em 0.7em;
    border-radius: 50% 50%;
    color: #000000b3;
    z-index: 10;
}
div#login-right::before {
    content: "";
    position: absolute;
    top: 0;
    left: 0;
    width: calc(100%);
    height: calc(100%);
    background: orange;
}

</style>
<?php
session_start();
if (isset($_POST['submit'])){
	 $role_person= $_REQUEST['role'];
   if($role_person==111){
   	$master="SELECT * FROM company WHERE email=? AND password=?";
   }else{
   	$master= "SELECT * FROM employee WHERE email=? AND password=? ";
   }

	$username = stripslashes($_REQUEST['email']); // removes backslashes
	$username = mysqli_real_escape_string($conn, $username);
	$password = stripslashes($_REQUEST['password']);
	$password = mysqli_real_escape_string($conn, $password);
$sql = $master; // SQL with parameters
$stmt = $conn->prepare($sql);
$stmt->bind_param('ss', $username, $password);
$stmt->execute();
$result = $stmt->get_result(); // get the mysqli result
$user = $result->fetch_assoc();
if($result->num_rows == 1)  //To check if the row exists
{
  
 $_SESSION['email']['employee_no']=$user['employee_no'];
 $_SESSION['email']['role']=$user['role'];


header('location:index.php?page=home');
//print "hello";
} else {
$msg = "Username & Password not match. Try again!";
echo '<script type="text/javascript">alert("'.$msg.'")</script>';}
$stmt->close();
$sql = $master; // SQL with parameters
$stmt = $conn->prepare($sql);
$stmt->bind_param('ss', $username, $password);
$stmt->execute();
$result = $stmt->get_result(); // get the mysqli result
$user = $result->fetch_assoc();
if($result->num_rows == 1)  //To check if the row exists
{
//$_SESSION['email']['status']=$user['status'];
 $_SESSION['email']['place']=$user['place'];
 $_SESSION['email']['company']=$user['company'];
 $_SESSION['email']['name']=$user['name'];
 $_SESSION['email']['id']=$user['id'];
 
header('location:index.php?page=home');
//print "hello";
} else {
$msg = "Username & Password not match. Try again!";
echo '<script type="text/javascript">alert("'.$msg.'")</script>';}

$stmt->close();
}
?>
<body>


  <main id="main">
  		<div id="login-left">
  			
  		</div>

  		<div id="login-right">
  			<div class="card col-md-8">
  				<div class="card-body">
  						
  					<form id="login-form" METHOD="POST">
						<div class="form-group">
						<h3 style='color:darkolivegreen;'> HRMS System</h3>
						</div>
  						<div class="form-group">
  							<label for="email" class="control-label">email</label>
  							<input type="email" id="email" name="email" class="form-control">
  						</div>
  						<div class="form-group">
  							<label for="password" class="control-label">Password</label>
  							<input type="password" id="password" name="password" class="form-control">
  						</div>
  						<div class="card">
  							<select name="role" class="borwser-default select2 form-control">
  							 <option  value="111">Admin  </option>
                   <option value="110">User </option>
  							 </select>
  							</div>
  							<br>
  							<div class="form-group">
  						<center><Input class="btn btn-primary" type="submit" name="submit" value="submit"></center>
  					</div>
  					</form>
  				</div>
  			</div>
  		</div>
   

  </main>

  <a href="login.php" class="back-to-top"><i class="icofont-simple-up"></i></a>


</body>

