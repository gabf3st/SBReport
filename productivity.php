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
    <h3>Productivity & Status</h3>
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
                                        <th>จำนวน CAP</th>
                                        <th>จำนวน Open Job</th>
                                        <th>จำนวนเสนอแบบ</th>
                                        <th>จำนวนเสนอราคา</th>
                                        <th>ลูกค้าเปิด SO</th>
                                        <th>Fail</th>
                                        <th>Open Job/Cap</th>
                                        <th>% เสนอแบบ</th>
                                        <th>เสนอราคา</th>
                                        <th>Success Rate</th>
                                        <th>Fail Rate</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php 

                                        $productivity = InteriorTracking::spExProductivity($startDate, $endDate);

                                        foreach ($productivity as $row) {
                                            echo "<tr>";
                                            echo "<td class='text-center'>".$row->channel."</td>";
                                            echo "<td class='text-center'>".$row->code_name." ".$row->branch_id."</td>";
                                            echo "<td class='text-center'>".$row->TotalCap."</td>";
                                            echo "<td class='text-center'>".$row->totalOpen."</td>";
                                            echo "<td class='text-center'>".$row->totalPlan."</td>";
                                            echo "<td class='text-center'>".$row->totalQuotation."</td>";
                                            echo "<td class='text-center'>".$row->totalSO."</td>";
                                            echo "<td class='text-center'>".$row->totalCancel."</td>";
                                            echo "<td class='text-center'>".round(($row->totalOpen/$row->TotalCap),3)."</td>";
                                            echo "<td class='text-center'>".round(($row->totalPlan/$row->totalOpen)*100,3)."</td>";
                                            echo "<td class='text-center'>".round(($row->totalQuotation/$row->totalOpen)*100,3)."</td>";
                                            echo "<td class='text-center'>".round(($row->totalSO/$row->totalOpen)*100,3)."</td>";
                                            echo "<td class='text-center'>".round(($row->totalCancel/$row->totalOpen)*100,3)."</td>";
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