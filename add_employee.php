<?php 
include 'db.php'; 
?>
ini_set('display_errors' ,'1');
error_reporting(E_ALL & ~E_NOTICE);

<div class="container-fluid">
    <form method="Post">
                    


       <div class="form-group">
            <label>Name:</label>
            <input type="text" name="name" required="required" class="form-control" ></div>
                 

       <div class="form-group">
            <label>Designation:</label>
            <input type="text" name="Designation" required="required" class="form-control" ></div>
                 

       <div class="form-group">
            <label>Departmetn:</label>
            <input type="text" name="department" required="required" class="form-control" ></div>
                 

            

       <div class="form-group">
            <label>Employee Id:</label>
            <input type="text" name="emp" required="required" class="form-control" ></div>
                 
          

       <div class="form-group">
            <label>Location:</label>
            <input type="text" name="location" required="required" class="form-control" ></div>
                 
       
       <div class="form-group">
            <label>Picture:</label>
            <input type="text" name="pic" required="required" class="form-control" ></div>
                 
       
       
       <div class="form-group">
            <label>Finger Id:</label>
            <input type="text" name="fing" required="required" class="form-control" ></div>
                 


    <div class="form-group">
        <button type="submit" name="submit" class="btn btn-primary"> Search </button>
    </div>
           </div>
        </form>