<?php 
    require "model/DatabasePDO.php"; 
    require "model/InteriorTracking.php"; 
    include "header.html";

    $startDate = $_POST['startDate'];

    if($_POST['startDate']==null){
        $startDate = date('Y-m-d', time()-7*24*60*60);   
    } else {
        $startDate = $_POST['startDate'];
    }

    if($_POST['endDate']==null){
        $endDate = date('Y-m-d', time());   
    } else {
        $endDate = $_POST['endDate'];   
    }

?>
<body>

<div class="col-sm-12">
<div class="row">
    <h3>To do list</h3>
  <form name="myForm" id="myForm" method="POST">
           <div class="row" style="padding-top:20px; padding-bottom:20px">
               

                <div class="col-sm-12 input-daterange input-group" id="datepicker">
                    <div class="col-sm-4">
                        <label for="startDate">Start Date</label>
                        <input id="startDate" name="startDate" type="text" class="input-sm form-control" name="start" placeholder="Start Date" value = "<?php
                                    $dt1 = $startDate;
                                    echo $dt1;
                                ?>"/>
                    </div>
                    <div class="col-sm-4">
                        <label for="endDate">End Date</label>
                        <input id="endDate" name="endDate" type="text" class="input-sm form-control" name="end" placeholder="End Date" value="<?php
                                    $dt1 = $endDate;
                                    echo $dt1;
                                ?>"/>
                    </div>
                    <div class="col-sm-4">
                        <button id="submit" class="btn btn-danger btn-result">Show Results</button>
                    </div>
                </div>
            </div>
    </form>

                          <div class="table-responsive">  
                            <table id="hc-sum-req" class="table table-bordered table-striped ">
                                <thead>
                                    <tr>
                                        <th>Channel</th>
                                        <th>โชว์รูม</th>
                                        <th>จำนวน SI</th>
                                        <th>จำนวน SI ที่เข้า Update</th>
                                        <th>% Update</th>
                                        <th>จำนวนไม่ Update</th>
                                        <th>% ไม่ Update</th>
                                        <th>ข้อมูลคนไม่ Update</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php 

                                        $todo = InteriorTracking::spExTodo($startDate, $endDate);

                                        foreach ($todo as $row) {
                                            echo "<tr>";
                                            echo "<td class='text-center'>".$row->channel."</td>";
                                            echo "<td class='text-center'>".$row->showroom." ".$row->branch_id."</td>";
                                            echo "<td class='text-center'>".$row->totalStaff."</td>";
                                            echo "<td class='text-center'>".$row->totalUpdateStaff."</td>";
                                            echo "<td class='text-center'>".round((($row->totalUpdateStaff/$row->totalStaff)*100), 2)."</td>";
                                            echo "<td class='text-center'>".($row->totalStaff-$row->totalUpdateStaff)."</td>";
                                            echo "<td class='text-center'>".round(((($row->totalStaff-$row->totalUpdateStaff)/$row->totalStaff)*100), 2)."</td>";
                                            echo "<td class='text-center'>
                                            <form action='staff.php' method='POST' target='_blank'>
<input type='hidden' name='branchId' value='".$row->branch_id."'>
<input type='hidden' name='startDate' value='".$startDate."'>
<input type='hidden' name='endDate' value='".$endDate."'>
<button class='btn btn-primary center-block' type='submit'>More Details</button></form>
                                            </td>";
                                            echo "</tr>";
                                        }
                                    ?>
                                </tbody>
                            </table>
                           </div>
                        </div>
                        
         <!-- jQuery Version 1.11.0 -->
        <script src="js/jquery-1.11.0.js"></script>
        <!-- Bootstrap Core JavaScript -->
        <script src="js/bootstrap.min.js"></script>
        <script src="js/bootstrap-datepicker.js"></script>  
        <script>
            $(document).ready(function() {
                $('#datepicker').datepicker({
                    format: 'yyyy-mm-dd'
                });
            });
        </script>
                        
</body>
</html>