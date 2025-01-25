<?php 
include "../../Partials/db.php";

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $sql = "select * from `products` where ProductID = $id";

    $res = mysqli_query($connect,$sql);
    if (mysqli_num_rows($res)>0) {
        $row = mysqli_fetch_assoc($res);
    }
}

if (isset($_POST['update'])) {
    $p_name = htmlspecialchars($_POST['p-name']);
    $p_type = htmlspecialchars($_POST['p-type']);
    $m_date = htmlspecialchars($_POST['m-date']);
    $r_num = htmlspecialchars($_POST['r-num']);
    
    $updateQuery = "UPDATE `products` SET `ProductName`='$p_name',`ProductType`='$p_type',`ManufacturingDate`='$m_date',`RevisionNumber`='$r_num' WHERE ProductID = $id";

    $result = mysqli_query($connect,$updateQuery);

    if (!$res) {
        echo "<script>Error Updating Product</script>";
    }else{
        header("Location: ../index.php");
    }

}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Product</title>
    <link rel="stylesheet" href="../css/app.css">
</head>
<body>
    <div class="container">
        <h1 style="margin-bottom:40px; text-align:center; font-weight:bold;">Edit The Product</h1>
        <form action="" method="post">
            <div class="col-12 col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title mb-2">Product Name</h5>
                        <input type="text" class="form-control" name="p-name" value="<?php echo $row['ProductName']; ?>"  required>
                    </div>
                    <div class="card-body">
                        <h5 class="card-title mb-2">Product Type</h5>
                        <input type="text" class="form-control" name="p-type" value="<?php echo $row['ProductType']; ?>"  required>
                    </div>
                    <div class="card-body">
                        <h5 class="card-title mb-2">Manufacturing Date</h5>
                        <input type="date" class="form-control" value="<?php echo $row['ManufacturingDate']; ?>" name="m-date" required>
                    </div>
                    <div class="card-body">
                        <h5 class="card-title mb-2">Revision Number</h5>
                        <input type="text" class="form-control" name="r-num" value="<?php echo $row['RevisionNumber']; ?>"  required>
                    </div>
                    <div class="card-body">
                        <button class="btn btn-primary" name="update">Add</button>
                    </div>
                </div>
            </div>
        </form>
    </div>

    <?php include "../../Partials/footer.php"; ?>
</body>
</html>