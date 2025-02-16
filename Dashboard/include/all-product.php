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
                                <div class="header d-flex w-100 justify-content-between">
                                <div><h1 class="card-title fs-5 align-self-center">All Products</h1></div>
                                <div><a href="./include/add-product.php"><button class="btn btn-outline-primary">Add Product</button></a></div>
                                </div>
                                <div class="table-responsive mt-3">
                                    <table class="table user-table no-wrap">
                                        <thead class="table-dark">
                                            <tr class="text-center">
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
                                                <td><?php echo $row['ProductName']?></td>
                                                <td><?php echo $row['ProductType']?></td>
                                                <td><?php echo $row['ManufacturingDate']?></td>
                                                <td><?php echo $row['RevisionNumber']?></td>
                                                                                           <td>
<div class="btn-group dropstart">
  <button type="button" class="btn btn-danger dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
    Action
  </button>
  <ul class="dropdown-menu">
    <li><a class="dropdown-item"  href="./include/update.php?id=<?php echo $row['ProductID']?>">Edit</a></li>
    <li><a class="dropdown-item" data-bs-toggle="modal" data-bs-target="#exampleModal">Delete</a></li>
    
  </ul>
</div></td>


<!-- Modal -->
<div class="modal fade " id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5 text-danger" id="exampleModalLabel">Delete Product?</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        This can't be undone.
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <a href="./include/delete.php?id=<?php echo $row['ProductID']?>"><button type="button" class="btn btn-danger">Delete</button></a>
      </div>
    </div>
  </div>
</div>




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