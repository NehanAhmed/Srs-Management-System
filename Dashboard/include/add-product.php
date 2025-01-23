<?php
include __DIR__ . "/../../Partials/db.php";


function generateProductId() {
    return mt_rand(1000000000, 9999999999);
}

if (isset($_POST['add-product'])) {
    if (!empty($_POST['p-code']) && !empty($_POST['r-num']) && !empty($_POST['m-num']) && !empty($_POST['p-type']) && !empty($_POST['p-name'])) {
        $p_code = mysqli_real_escape_string($connect, $_POST['p-code']);
        $r_num = mysqli_real_escape_string($connect, $_POST['r-num']);
        $m_num = mysqli_real_escape_string($connect, $_POST['m-num']);
        $p_type = mysqli_real_escape_string($connect, $_POST['p-type']);
        $p_name = mysqli_real_escape_string($connect, $_POST['p-name']);
$product_id = generateProductId();

$sql = "INSERT INTO `products`(`product_id`,`product_code`, `revision_number`, `manufacturing_number`, `product_type`,`product-name`) VALUES ('$product_id','$p_code', '$r_num', '$m_num', '$p_type','$p_name')";

$res = mysqli_query($connect,$sql);
    if ($res) {
        
        echo "<script>alert('Product Added Successfully')</script>";
    }else{
        echo "<script>alert('Product Added Failure')</script>";

    }

}
}


?>
<h1 style="margin-bottom:40px; text-align:center; font-weight:bold;">Add New Product to Test</h1>
<form action="" method="post">
<div class="col-12 col-lg-12">
    <div class="card">
    <div class="card-body">
            <h5 class="card-title mb-2">Product Name</h5>
            <input type="text" class="form-control" name="p-name" placeholder="E.g: Electrical Circuit" required>
        </div>
        <div class="card-body">
            <h5 class="card-title mb-2">Product Code</h5>
            <input type="text" class="form-control" name="p-code" placeholder="E.g: 1234556">
        </div>
        <div class="card-body">
            <h5 class="card-title mb-2">Revision Number</h5>
            <input type="text" class="form-control" name="r-num" placeholder="E.g:3234">
        </div>
        <div class="card-body">
            <h5 class="card-title mb-2">Manufacturing Number</h5>
            <input type="text" class="form-control" name="m-num" placeholder="E.g: 1344342">
        </div>
        <div class="card-body">
            <h5 class="card-title mb-2">Product Type</h5>
            <select class="select" name="p-type" required>
                <option value="">Select</option>
                <option value="1">Type 1</option>
                <option value="2">Type 2</option>
                <option value="3">Type 3</option>
            </select>
        </div>
            <div class="card-body">
                <input class="btn btn-primary"  type="submit" value="add-product" name="add-product">
                
            </div>
        </div>
    </div>
    </form>
    