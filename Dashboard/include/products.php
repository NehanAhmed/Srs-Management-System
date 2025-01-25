<?php
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
                                                <th class="border-top-0">#</th>
                                                <th class="border-top-0">Product Name</th>
                                                <th class="border-top-0">Manufacturing Number</th>
                                                <th class="border-top-0">Product Type</th>
                                                <th class="border-top-0">Product Code</th>
                                                <th class="border-top-0">Action</th>

                                            </tr>
                                        </thead>
                                        <tbody>
                                        
                                            <?php while ($row = mysqli_fetch_assoc($res)):?>

                                                    
                                            <tr>
                                                <td><?php echo $row['product_id']?></td>
                                                <td><?php echo $row['product-name']?></td>
                                                <td><?php echo $row['manufacturing_number']?></td>
                                                <td><?php echo $row['product_type']?></td>
                                                <td><?php echo $row['product_code']?></td>
                                                <td><div class="badge-outer"><span class='badge bg-danger' id='badge'>Testing Remaning</span></div></td>
                                                <td><a href="index.php?tester-form"><button id="btn" class="btn btn-dark">Test</button></a></td>

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