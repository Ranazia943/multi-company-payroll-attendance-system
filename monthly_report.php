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
<table id="example" class="display nowrap" style="width:100%">
        <thead>
            <tr>
              <th> Month </th>
                <th>Employee_id</th>
                <th>Time In  </th>
                <th>Time Out</th>
            </tr>
        </thead>
    <tbody>


<?php

if(isset($_POST['datetime_log'])){

$datetime_log=$_POST['datetime_log'];

$qry="select * from attendance where company_id='$company_id' and month(datetime_log)='$datetime_log'";
$qury=mysqli_query($conn,$qry);

if(mysqli_num_rows($qury)>0){

foreach($qury as $row){

 
?>
<tr>
  <td> <?php print $datetime_log; ?> </td>
    <td><?=$row['employee_id'];?> </td>
      <td><?=$row['datetime_log'];?> </td>
       <td><?=$row['date_updated'];?> </td>
</tr>
<?php
}
    }else{
print "<center style='color:red';> such record is not found </center>";

}
}

    ?>
     
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
    </tbody>
</table>



</body>
</html>



