<?php
// session_start();
include __DIR__ . "/../../Partials/db.php";
$sql = "SELECT * FROM `products`";
$res = mysqli_query($connect,$sql);
if ($res) {

    

}else{
    echo "data error";
}


?>
<div class="container-fluid">
                <!-- ============================================================== -->
                <!-- Start Page Content -->
                <!-- ============================================================== -->
                <div class="row">
                    <!-- column -->
                    <div class="col-sm-12">
                        <div class="card">
                            <div class="card-body">
                                <h1 class="card-title">Products To be Tested</h1>
                                
                                <div class="table-responsive">
                                    <table class="table user-table no-wrap">
                                        <thead>
                                        <tr>
                                                <th class="border-top-0">Product Name</th>
                                                <th class="border-top-0">Product Type</th>
                                                <th class="border-top-0">Manufacturing Date</th>
                                                <th class="border-top-0">Revision Number</th>
                                                
                                                <th class="border-top-0">Action</th>

                                            </tr>
                                        </thead>
                                        <tbody>
                                        
                                        <?php while ($row = mysqli_fetch_assoc($res)):?>
                                            <?php  if ($row['Status'] !== 'Pass'):?>
                                                
                                                    
                                                <tr>
                                                    <td><?php echo $row['ProductName']?></td>
                                                    <td><?php echo $row['ProductType']?></td>
                                                    <td><?php echo $row['ManufacturingDate']?></td>
                                                    <td><?php echo $row['RevisionNumber']?></td>
                                                    <td><a href="index.php?tester-form&id=<?php echo $row['ProductID']?>" class="btn btn-primary">Test</a></td>
                                                </tr>
                                            <?php endif; ?>
                                        <?php endwhile; ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- ============================================================== -->
                <!-- End PAge Content -->
                <!-- ============================================================== -->
                <!-- ============================================================== -->
                <!-- Right sidebar -->
                <!-- ============================================================== -->
                <!-- .right-sidebar -->
                <!-- ============================================================== -->
                <!-- End Right sidebar -->
                <!-- ============================================================== -->
            </div>

           