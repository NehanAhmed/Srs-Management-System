<?php
// session_start();
include __DIR__ . "/../../Partials/db.php";
$dep_id = $_SESSION['dep_id'];
$sql = "SELECT * FROM `products` where `DepartmentID` = $dep_id";
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
                <h1 class="title text-center ">Products To be Tested</h1>
                    <!-- column -->
                    <div class="col-sm-12 mt-5">
                        
                        <div class="card">
                            
                            <div class="card-body">
                                
                                
                                <div class="table-responsive">
                                    <table class="table user-table no-wrap">
                                    <thead class="table-dark p-5">
                                        <tr class="p-5">
                                                <th class="border-top-0">Product Name</th>
                                                <th class="border-top-0">Product Type</th>
                                                <th class="border-top-0">Manufacturing Date</th>
                                                <th class="border-top-0">Revision Number</th>
                                                
                                                <th class="border-top-0">Action</th>

                                            </tr>
                                        </thead>
                                        <tbody class="table-light">
                                        
                                        <?php while ($row = mysqli_fetch_assoc($res)):?>
                                            <?php  if ($row['Status'] == ''):?>
                                                
                                                    
                                                <tr>
                                                    <td><?php echo $row['ProductName']?></td>
                                                    <td><?php echo $row['ProductType']?></td>
                                                    <td><?php echo $row['ManufacturingDate']?></td>
                                                    <td><?php echo $row['RevisionNumber']?></td>
                                                    <td><a href="index.php?tester-form&id=<?php echo $row['ProductID']?>"><button type="button" class="btn btn-outline-dark w-100">Test</button></a></td>
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

           