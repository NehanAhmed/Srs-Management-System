<?php
include __DIR__ . "/../../Partials/db.php";
$joinSql = "SELECT 
    remanufacturing.`remanufacturingID`,
    remanufacturing.`remanufacturingDate`,
    remanufacturing.`RevisionNumber`,
    remanufacturing.`Remarks`,
    products.`ProductID`,
    products.`ProductName`,
    products.`ProductType`,
    products.`ManufacturingDate`,
    products.`RevisionNumber`
FROM 
    remanufacturing
INNER JOIN 
    products 
ON 
    remanufacturing.`ProductID` = products.`ProductID`;
" ;
$joinres = mysqli_query($connect,$joinSql);


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
                                <h1 class="card-title">Retesting Products</h1>
                                
                                <div class="table-responsive">
                                    <table class="table user-table no-wrap">
                                        <thead>
                                            <tr>
                                                <th class="border-top-0">#</th>
                                                <th class="border-top-0">Product Name</th>
                                                <th class="border-top-0">Manufacturing Date</th>
                                                <th class="border-top-0">Product Type</th>
                                                <th class="border-top-0">Product Revision</th>
                                                <th class="border-top-0">Action</th>

                                            </tr>
                                        </thead>
                                        <tbody>
                                        
                                            <?php while ($row = mysqli_fetch_assoc($joinres)):?>

                                                    
                                            <tr>
                                                <td><?php echo $row['remanufacturingID']?></td>
                                                <td><?php echo $row['ProductName']?></td>
                                                <td><?php echo $row['ManufacturingDate']?></td>
                                                <td><?php echo $row['ProductType']?></td>
                                                <td><?php echo $row['RevisionNumber']?></td>
                                                <td><a href="index.php?tester-form&id=<?php echo $row['ProductID']?>" class="btn btn-primary">Retest</a></td>

                                            </tr>
                                            
                                            <?php  endwhile; ?>
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

            <script>
                // let status_badge = document.getElementById('badge')
                let badge_outer = document.querySelector('.badge-outer')
let badge_remaining = "<span class='badge bg-danger' id='badge'>Testing Remaning</span>";
let badge_processing = "<span class='badge bg-success' id='badge'>Testing Remaning</span>";
let badge_complete = "<span class='badge bg-success' id='badge'>Testing Remaning</span>";
                let btn = document.getElementById('btn').addEventListener('click',function(){
                if( badge_outer.innerHTML = "<span class='badge bg-danger' id='badge'>Testing Remaning</span>") {
                badge_outer.appendChild('span')
                    badge_outer.innerHTML = badge_processing
                } else if(badge_outer.innerHTML = badge_processing) {
                badge_outer.appendChild('span')

                badge_outer.innerHTML = badge_processing
                    
                }else{
                    badge_outer.innerHTML = badge_processing
                }
                })
            </script>