<?php
// session_start();
include __DIR__ . "/../../Partials/db.php";
$dep_id = $_SESSION['dep_id'];
$sql = "SELECT 
    c.CPRI_SubmissionID,
    c.SubmissionDate,
    c.ApprovalStatus,
    c.Remarks,
    p.ProductName,
    p.ProductType,
    p.ManufacturingDate,
    p.RevisionNumber,
    p.ProductID
FROM 
    CPRI c
JOIN 
    products p 
ON 
    c.ProductID = p.ProductID
WHERE
    c.ApprovalStatus = 'Pending';
";
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
                    <div class="col-sm-12 mt-1">
                        
                        <div class="card">
                            
                            <div class="card-body">
                                
                                
                                <div class="table-responsive">
                                    <table class="table user-table no-wrap">
                                    <thead class="table-dark p-5">
                                        <tr class="p-5 text-center">
                                                <th class="border-top-0">#</th>
                                                <th class="border-top-0">Product Name</th>
                                                <th class="border-top-0">Product Type</th>
                                                <th class="border-top-0">Manufacturing Date</th>
                                                <th class="border-top-0">Revision Number</th>
                                                <th class="border-top-0">Action</th>

                                            </tr>
                                        </thead>
                                        <tbody class="table-light">
                                        
                                        <?php while ($row = mysqli_fetch_assoc($res)):?>
                                            
                                                
                                                    
                                                <tr class="text-center">
                                                    <td><?php echo $row['ProductID']?></td>
                                                    <td><?php echo $row['ProductName']?></td>
                                                    <td><?php echo $row['ProductType']?></td>
                                                    <td><?php echo $row['ManufacturingDate']?></td>
                                                    <td><?php echo $row['RevisionNumber']?></td>
                                                    <td>
                                                        <a class="btn btn-outline-success " href="index.php?approve&id=<?php echo $row['ProductID']?>"><span class="fa-solid fa-circle-check me-2"></span>Approve</a>
                                                        <a class="btn btn-outline-danger " href="index.php?reject&id=<?php echo $row['ProductID']?>"><span class="fa-solid fa-circle-xmark me-2"></span>Reject</a>
                                                    </td>
                                                </tr>
                                            
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

           