<?php
// Include the database connection file
include "../../Partials/db.php";
session_start(); // Start session for CSRF protection

// Generate CSRF token if not already created
if (empty($_SESSION['csrf_token'])) {
    $_SESSION['csrf_token'] = bin2hex(random_bytes(32));
}

// Function to generate a unique Product ID
function generateProductId($connect) {
    do {
        $product_id = mt_rand(1000000000, 9999999999);
        $query = "SELECT * FROM `products` WHERE `ProductID` = '$product_id'";
        $result = mysqli_query($connect, $query);
    } while (mysqli_num_rows($result) > 0);
    return $product_id;
}

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['add-product'])) {
    // CSRF Token validation
    if ($_POST['csrf_token'] !== $_SESSION['csrf_token']) {
        die("Invalid CSRF token");
    }

    // Validate required fields
    if (!empty($_POST['p-name']) && !empty($_POST['p-type']) && !empty($_POST['m-date']) && !empty($_POST['r-num'])) {
        // Sanitize inputs
        $p_name = htmlspecialchars($_POST['p-name']);
        $p_type = htmlspecialchars($_POST['p-type']);
        $m_date = htmlspecialchars($_POST['m-date']);
        $r_num = htmlspecialchars($_POST['r-num']);
        $product_id = generateProductId($connect);

        // Use prepared statements to insert data securely
        $sql = "INSERT INTO `products`(`ProductID`, `ProductName`, `ProductType`, `ManufacturingDate`, `RevisionNumber`,`Status`) 
                VALUES (?, ?, ?, ?, ?, ?)";
        $stmt = $connect->prepare($sql);
        $stmt->bind_param("isssss", $product_id, $p_name, $p_type, $m_date, $r_num, $status);
        $status = '';
        $res = $stmt->execute();

        if ($res) {
            echo "<script>alert('Product Added Successfully'); window.location.href = '../index.php';</script>";
        } else {
            echo "<script>alert('Failed to add product. Please try again.');</script>";
        }
    } else {
        echo "<script>alert('Please fill out all fields.');</script>";
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
        <h1 style="margin-bottom:40px; text-align:center; font-weight:bold;">Add New Product to Test</h1>
        <form action="" method="post">
            <input type="hidden" name="csrf_token" value="<?php echo $_SESSION['csrf_token']; ?>">
            <div class="col-12 col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title mb-2">Product Name</h5>
                        <input type="text" class="form-control" name="p-name" placeholder="E.g: Electrical Circuit" required>
                    </div>
                    <div class="card-body">
                        <h5 class="card-title mb-2">Product Type</h5>
                        <input type="text" class="form-control" name="p-type" placeholder="E.g: Circuit" required>
                    </div>
                    <div class="card-body">
                        <h5 class="card-title mb-2">Manufacturing Date</h5>
                        <input type="date" class="form-control" name="m-date" required>
                    </div>
                    <div class="card-body">
                        <h5 class="card-title mb-2">Revision Number</h5>
                        <input type="text" class="form-control" name="r-num" placeholder="E.g: 1" required>
                    </div>
                    <div class="card-body">
                        <button class="btn btn-primary" name="add-product">Add</button>
                    </div>
                </div>
            </div>
        </form>
    </div>

    <?php include "../../Partials/footer.php"; ?>
</body>
</html>
