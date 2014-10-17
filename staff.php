<?php 
    require "model/DatabasePDO.php"; 
    require "model/InteriorTracking.php"; 
    
    include "header.html";
    $startDate = $_POST['startDate'];
    $endDate = $_POST['endDate'];
    $branchId = $_POST['branchId'];

//    echo $startDate." ".$endDate." ".$branchId;

?>
<body>

<div class="col-sm-12">
<div class="row">
    <div class="table-title col-sm-12"><h3>รายชื่อ Staff ไม่ Update</h3></div>

                          <div class="table-responsive">  
                            <table id="hc-sum-req" class="table table-bordered table-striped ">
                                <thead>
                                    <tr>
                                        <th>Staff ID</th>
                                        <th>ชื่อ - นามสกุล</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php 

                                        $staff = InteriorTracking::spExTodoStaff($startDate, $endDate, $branchId);

                                        foreach ($staff as $row) {
                                            echo "<tr>";
                                            echo "<td class='text-center'>".$row->staff_id."</td>";
                                            echo "<td class='text-center'>".$row->first_name." ".$row->last_name."</td>";
                                            echo "</tr>";
                                        }
                                    ?>
                                </tbody>
                            </table>
                           </div>
                        </div>
                        
</body>
</html>