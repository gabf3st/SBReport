<?php 
    require "model/DatabasePDO.php"; 
    require "model/InteriorTracking.php"; 
    
    include "header.html";
?>
<body>

<div class="col-sm-12">
<div class="row">
    <div class="table-title col-sm-12"><h3>Warning Report</h3></div>
      <div class="table-responsive">  
        <table id="hc-sum-req" class="table table-bordered table-striped ">
            <thead>
                <tr >
                    <th class="col-sm-1">Branch</th>
                    <th class="col-sm-1">Showroom</th>
                    <th class="col-sm-3">SI's Name / Surname</th>
                    <th class="col-sm-1">ID's staff</th>
                    <th class="col-sm-2">Job No.</th>
                    <th class="col-sm-3">Customer's name</th>
                    <th class="col-sm-2">Tel.</th>
                    <th class="col-sm-1">Time to do</th>
                    <th class="col-sm-1">Time to quotation</th>
                    <th class="col-sm-1">Time to close job</th>
                </tr>
            </thead>
            <tbody>
              <?php 

                    $warning = InteriorTracking::spWarning();

                    foreach ($warning as $row) {
                        echo "<tr>";
                        echo "<td class='text-center'>".$row->channel."</td>";
                        echo "<td class='text-center'>".$row->showroom." ".$row->branch_id."</td>";
                        echo "<td class='text-left'>".$row->staff."</td>";
                        echo "<td class='text-center'>".$row->staff_id."</td>";
                        echo "<td class='text-left'>".$row->tracking_number."</td>";
                        echo "<td class='text-left'>".$row->customer."</td>";
                        echo "<td class='text-left'>".$row->telephone."</td>";
                        echo "<td class='text-center'>".$row->planTime."</td>";
                        echo "<td class='text-center'>".$row->quotationTime."</td>";
                        echo "<td class='text-center'>".$row->CloseTime."</td>";
                        echo "</tr>";
                    }
                ?>
            </tbody>
        </table>
       </div>
    </div>
    </section>
                        

</html>