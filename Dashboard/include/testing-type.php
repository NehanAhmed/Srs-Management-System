<?php
// session_start();
include __DIR__ . "/../../Partials/db.php";
// $dep_id = $_SESSION['dep_id'];
$sql = "SELECT * FROM `testingtype`";
$res = mysqli_query($connect, $sql);
if ($res) {
} else {
    echo "data error";
}


?>
<div class="container-fluid">
    <!-- ============================================================== -->
    <!-- Start Page Content -->
    <!-- ============================================================== -->
    <div class="row">
        <!-- column -->
        <div class="col-sm-12 mt-5">

            <div class="card">

                <div class="card-body">
                <div class="header d-flex w-100 justify-content-between">
                                <div><h1 class="card-title fs-5 align-self-center">All Products</h1></div>
                                <div><a href="index.php?add-testing-type"><button class="btn btn-outline-primary">Add Product</button></a></div>
                                </div>

                    <div class="table-responsive">
                        <table class="table user-table no-wrap">
                            <thead class="table-dark p-5">
                                <tr class="p-5">
                                    <th class="border-top-0">#</th>
                                    <th class="border-top-0">Testing Types</th>
                                    <th class="border-top-0">Action</th>

                                </tr>
                            </thead>
                            <tbody class="table-light">

                                <?php while ($row = mysqli_fetch_assoc($res)): ?>



                                    <tr>
                                        <td><?php echo $row['id'] ?></td>
                                        <td><?php echo $row['TestingType'] ?></td>
                                        <td>
                                            <div class="btn-group dropstart">
                                                <button type="button" class="btn btn-danger dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                                                    Action
                                                </button>
                                                <ul class="dropdown-menu">
                                                    <li><a class="dropdown-item" data-bs-toggle="modal" data-bs-target="#exampleModal">Delete</a></li>

                                                </ul>
                                            </div>
                                        </td>
                                        </td>
                                    </tr>
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
        <a href="index.php?delete-testing-type&id=<?php echo $row['id']?>"><button type="button" class="btn btn-danger">Delete</button></a>
      </div>
    </div>
  </div>
</div>
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