<style>
table{
    width:100%;
    border-collapse:collapse;
}
tr,td,th{
    border:1px solid black
}
.text-center{
    text-align:center;
}
.text-right{
    text-align:right;
}
</style>
<div>
    <?php

$qry=mysqli_query($conn,"select * from department");
$drow=mysqli_fetch_array($qry);


    ?>
<h2 class="text-center badge-dark"><b style="color:white";>Department </b>:  <?php echo $drow['name']; ?></h2>
<h5 class="text-center badge-dark"> Break-Out Time  <font color=orange> 13:00 pm</font>Break-In Time  <font color=orange> 14:00 pm</font> </h5>
</div>
<table>
    <thead>
        <tr>
            <th class="text-center" rowspan="2">Employee ID</th>
         <th class="text-center"rowspan="2">Employee Name</th>
            
            <th class="text-center" rowspan="2"> In Time of </th>

            <th class="text-center" colspan="6" align="text-center">Attendance List
            <tr> 

                <th th class="text-center"> Time in </th>
                <th th class="text-center"> Time Out</th>
                <th th class="text-center"> Time in</th>
                <th th class="text-center"> Time Out </th>
           
          </tr>
           </th>
        </tr>
    </thead>
    <tbody>
                                <?php
                                    $att=$conn->query("SELECT a.*,e.employee_no, concat(e.lastname,', ',e.firstname) as ename FROM attendance a inner join employee e on a.employee_id = e.id order by UNIX_TIMESTAMP(datetime_log) asc  ") or die(mysqli_error());
                                    $lt_arr = array(1 => "",2=>"",3 => " ",4=>"");
                                    while($row=$att->fetch_array()){
                                        $date = date("Y-m-d",strtotime($row['datetime_log']));
                                        $attendance[$row['employee_id']."_".$date]['details'] = array("eid"=>$row['employee_id'],"name"=>$row['ename'],"eno"=>$row['employee_no'],"date"=>$date);
                                        if($row['log_type'] == 1 || $row['log_type'] == 3){
                                            if(!isset($attendance[$row['employee_id']."_".$date]['log'][$row['log_type']]))
                                            $attendance[$row['employee_id']."_".$date]['log'][$row['log_type']] = array('id'=>$row['id'],"date" =>  $row['datetime_log']);
                                        }else{
                                            $attendance[$row['employee_id']."_".$date]['log'][$row['log_type']] =array('id'=>$row['id'],"date" =>  $row['datetime_log']);
                                        }
                                        }
                                        foreach ($attendance as $key => $value) {
                                ?>
                                <tr>
                                    
                                    <td><center><?php echo $attendance[$key]['details']['eno'] ?></td></center>

                                    <td> <center><?php echo $attendance[$key]['details']['name'] ?></td></center>
                                <td><center><?php echo date("M d,Y",strtotime($attendance[$key]['details']['date'])) ?></td></center>

                                    <td>
                                        <center>
                                            
                                    <?php 
                                    $att_ids = array();
                                    foreach($attendance[$key]['log'] as $k => $v) :
                                     ?>

                                     <div class="col-sm-6" style="">
                                        <p>
                                            <small><b><?php echo $lt_arr[$k]." <br/>" ?>
                                                

                                            <?php echo (date("h:i A",strtotime($attendance[$key]['log'][$k]['date'])))  ?> </b>
                                        </td>
                                    </center>
                                        <td>
                                            <center>
                                            <span class="badge badge-danger rem_att" data-id="<?php echo $attendance[$key]['log'][$k]['id'] ?>"></i></span>
                                        </small>
                                        </p>
                                        </div>
                                    <?php endforeach; ?>
                                        </div>
    <?php } ?>
    </tbody>
</table>