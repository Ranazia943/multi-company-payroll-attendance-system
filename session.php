<?php
ini_set('display_errors' ,'1');
error_reporting(E_ALL & ~E_NOTICE);

session_start();
include_once 'db_connect.php';
if (!isset($_SESSION['email'])) {
  echo "<script>window.open('login.php','_self')</script>";
}else{

  $employee_no= $_SESSION['email']['employee_no'];
 $role=$_SESSION['email']['role'];; 
 $place=$_SESSION['email']['place'];
 $company_name=$_SESSION['email']['company'];
$company_id=$_SESSION['email']['id'];
 $company_auth=$_SESSION['email']['name'];


}
?>
