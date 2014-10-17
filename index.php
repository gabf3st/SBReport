<?php 
    require "model/DatabasePDO.php"; 
    require "model/InteriorTracking.php"; 
    
    include "header.html";
?>
<body>

<div class="col-sm-12">
<div class="row">
    <div class="table-title col-sm-12"><h3>Warning Report</h3></div>
<!--
    <div class="dropdown col-sm-12">
        <a class="btn btn-default btn-sm"  data-toggle="dropdown" href="#"><i class="glyphicon glyphicon-th-list"></i>  Export Table Data</a>
        <ul class="dropdown-menu" role="menu" aria-labelledby="dLabel">
        <li><a href="#" onClick ="$('#hc-sum-req').tableExport({type:'excel',escape:'false'});">Export to Excel</a></li>
        <li><a href="#" onClick ="$('#hc-sum-req').tableExport({type:'pdf',escape:'false'});">Export to PDF</a></li>
        </ul>
    </div>
</div>
-->
                          <div class="table-responsive">  
                            <table id="hc-sum-req" class="table table-bordered table-striped ">
                                <thead>
                                    <tr >
                                        <th class="col-sm-4">Branch</th>
                                        <th class="col-sm-1">Showroom</th>
                                        <th class="col-sm-1">SI's Name / Surname</th>
                                        <th class="col-sm-1">ID's staff</th>
                                        <th class="col-sm-1">Job No.</th>
                                        <th class="col-sm-1">Customer's name</th>
                                        <th class="col-sm-1">Tel.</th>
                                        <th class="col-sm-1">Time to do</th>
                                        <th class="col-sm-1">Time to quotation</th>
                                        <th class="col-sm-1">Time to close job</th>
                                    </tr>
                                </thead>
                                <tbody>
                                  <?php 

                                        $warning = InteriorTracking::spExWarning();
                                        var_dump($warning);

//                                        foreach ($request as $row) {
//                                            echo "<tr>";
//                                            echo "<td class='text-left'>".$row->Project."</td>";
//                                            echo "</tr>";
//                                        }
                                    ?>
                                </tbody>
                            </table>
                           </div>
                        </div>
                        
</body>
</html>