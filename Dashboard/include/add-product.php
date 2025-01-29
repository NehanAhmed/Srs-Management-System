<?php
// Include the database connection file
include "../../Partials/db.php";
session_start(); // Start session for CSRF protection


$t_type_sql = "SELECT * FROM `testingtype`";
$t_type_res = mysqli_query($connect,$t_type_sql);
if (!$t_type_res) {
    echo "Error fetching testing type data";
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
function getCurrentTime() {
    return $date= date('Y-m-d H:i:s');
}
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['add-product'])) {
  

    // Validate required fields
    if (!empty($_POST['p-name']) && !empty($_POST['p-type']) && !empty($_POST['m-date']) && !empty($_POST['t_type'] && $_POST['dep_id'])) {
        // Sanitize inputs
        $p_name = htmlspecialchars($_POST['p-name']);
        $p_type = htmlspecialchars($_POST['p-type']);
        $m_date = htmlspecialchars($_POST['m-date']);
        $t_type = htmlspecialchars($_POST['t_type']);
        $dep_id = htmlspecialchars($_POST['dep_id']);
        $product_id = generateProductId($connect);
        $revision_num = 1;
        // Use prepared statements to insert data securely
        $sql = "INSERT INTO `products`(`ProductID`, `ProductName`, `ProductType`, `ManufacturingDate`, `RevisionNumber`,`Status`,`TestingType`,`DepartmentID`) 
                VALUES (?, ?, ?, ?, ?, ?,?,?)";
        $stmt = $connect->prepare($sql);
        $stmt->bind_param("isssssss", $product_id, $p_name, $p_type, $m_date, $revision_num, $status,$t_type,$dep_id);
        $status = '';
        $res = $stmt->execute();
        $workflowStatus = 'In Progress'; // Set product status to active by default
        $WorkflowStage = 'Testing'; // Set product status to active by default\
        $date = getCurrentTime(); // Get current date and time
        $workflow = "INSERT INTO `workflow`(`ProductID`, `CurrentStage`, `StartDate`, `EndDate`, `Status`) VALUES (?,?,?,?,?)";
        $stmt = $connect->prepare($workflow);
        $stmt->bind_param("sssss", $product_id, $WorkflowStage, $date, $date, $workflowStatus);
        $workflowRes = $stmt->execute();
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
                        <h5 class="card-title mb-2">Testing Type</h5>
                        <select name="t_type">
                        <option value="">Select Testing Type</option>
                        <?php while ($row = mysqli_fetch_assoc($t_type_res)):?>
                            <option value="<?= $row['id'] ?>"><?= $row['TestingType'] ?></option>
                        <?php endwhile?>
                        </select>

                    </div>
                    <div class="card-body">
                        <h5 class="card-title mb-2">Department ID</h5>
                        <input type="number" required name="dep_id">
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
