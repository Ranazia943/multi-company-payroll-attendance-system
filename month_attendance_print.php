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
                <th>Id</th>
                <th> Timing </th>
            </tr>
        </thead>
    <tbody>


<?php

if(isset($_POST['datetime_log']) && isset($_POST['date_updated'])){

$from_date=$_POST['datetime_log'];
$to_date=$_POST['date_updated'];
     $qry="select * from attendance where datetime_log between '$from_date' and '$to_date' order by datetime_log";
$qury=mysqli_query($conn,$qry);

if(mysqli_num_rows($qury)>0){

foreach($qury as $row){

 
?>
<tr>
    <td><?=$row['employee_id'];?> </td>
       
    <td><?=$row ['datetime_log'];?> </td>

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



