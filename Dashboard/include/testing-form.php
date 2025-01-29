<?php
include __DIR__ . "/../../Partials/db.php";



// Immediately handle form submission and header redirects first
if (isset($_POST['add-tester'])) {
    if (isset($_GET['id']) && isset($_GET['tester_id'])) {
        $p_id = $_GET['id'];
        $tester_id = $_GET['tester_id'];
        $testing_type_query = "SELECT 
    products.ProductID AS ProductID, 
    products.ProductName, 
    products.TestingType AS TestingTypeID, 
    testingtype.TestingType AS TestingType
FROM 
    products
JOIN 
    testingtype 
ON 
    products.TestingType = testingtype.id
WHERE 
    products.ProductID = $p_id; -- Replace 101 with the desired ProductID
";
$testing_type_result = mysqli_query($connect, $testing_type_query);
$testing_type_row = mysqli_fetch_assoc($testing_type_result);



        function generateUniqueTesterId($connect) {
            do {
                $id = str_pad(mt_rand(0, 999999999999), 12, '0', STR_PAD_LEFT);
                $check = mysqli_query($connect, "SELECT COUNT(*) FROM testing WHERE TesterID = '$id'");
                $exists = mysqli_fetch_row($check)[0] > 0;
            } while ($exists);
            return $id;
        }

        $t_id = generateUniqueTesterId($connect);
        $t_type = $testing_type_row['TestingType'];
        $t_date = $_POST['date'];
        $t_status = $_POST['testingStatus'];
        $t_remark = $_POST['reviews'];
        
        if ($t_status == 'Pass') {
            $workflowStatus = 'CPRI';
            $workFlow = "UPDATE `workflow` SET `CurrentStage` = '$workflowStatus' WHERE `ProductID` = $p_id";
            $workFlowQuery= mysqli_query($connect, $workFlow);

            $cpriStatus = 'Pending';
            $insertToCpri ="INSERT INTO `cpri`(`SubmissionDate`, `ApprovalStatus`, `Remarks`, `ProductID`) VALUES (?,?,?,?)";
            $stmt = mysqli_prepare($connect, $insertToCpri);
            mysqli_stmt_bind_param($stmt, "sssi", $t_date, $cpriStatus, $t_remark, $p_id);
            $cpriRes = mysqli_stmt_execute($stmt);
            $product_status = 'CPRI';
            $updateProductStatus = "UPDATE `products` SET `Status`= '$product_status' WHERE ProductID = $p_id";
            $updateProductStatusQuery= mysqli_query($connect, $updateProductStatus);


            $sql = "INSERT INTO `testing`(`TestingID`,`ProductID`, `TestingType`, `TestingDate`, `TesterID`, `TestingStatus`, `Remarks`) 
            VALUES (?, ?, ?, ?, ?, ?, ?)";
            $stmt = mysqli_prepare($connect, $sql);
            if ($stmt || $updateProductStatusQuery) {
                mysqli_stmt_bind_param($stmt, "sssssss",$t_id, $p_id, $t_type, $t_date, $tester_id, $t_status, $t_remark);
                $res = mysqli_stmt_execute($stmt);
                if ($res) {
                    // header("Location: index.php?test-product");
                    exit();
                } else {
                    echo "<script>alert('Failed to insert record: " . mysqli_error($connect) . "')</script>";
                }
                mysqli_stmt_close($stmt);
            } else {
                echo "<script>alert('Failed to prepare statement: " . mysqli_error($connect) . "')</script>";
            }
        } else {
            $workflowStatus = 'Re-manufacturing';

            $workFlow = "UPDATE `workflow` SET `CurrentStage` = '$workflowStatus' WHERE `ProductID` = $p_id";
            $workFlowQuery= mysqli_query($connect, $workFlow);
            $updateRevisionNum = "UPDATE `products` SET `RevisionNumber`= '2' AND set `Status`= 'Fail' WHERE ProductID = $p_id";

            $updateQueryRes = mysqli_query($connect, $updateRevisionNum);
           

            $sql = "INSERT INTO `remanufacturing`(`ProductID`, `RemanufacturingDate`, `RevisionNumber`, `Remarks`) VALUES (?,?,?,?)";
            $stmt = mysqli_prepare($connect, $sql);
            if ($stmt) {
                $revision = '2';
                mysqli_stmt_bind_param($stmt, "ssss", $p_id, $t_date, $revision, $t_remark);
                $res = mysqli_stmt_execute($stmt);
                if ($res) {
                    // header("Location: ../index.php");
                    exit();
                } else {
                    echo "<script>alert('Failed to insert record: " . mysqli_error($connect) . "')</script>";
                }
                mysqli_stmt_close($stmt);
            } else {
                echo "<script>alert('Failed to prepare statement: " . mysqli_error($connect) . "')</script>";
            }
        }
    } else {
        echo "<script>alert('Tester ID and Product ID are required')</script>";
        exit();
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tester Form</title>
    <!-- <link rel="stylesheet" href="../css/app.css"> -->
</head>

<body>
    <div class="container">

        <h1 style="margin-bottom:40px; text-align:center; font-weight:bold;">Enter Product Testing Details</h1>
        <form action="" method="post">
            <div class="col-12 col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title mb-2">Testing Date</h5>
                        <input type="date" class="form-control" name="date" required>
                    </div>
                    <div class="card-body">
                        <h5 class="card-title mb-2">Testing Status</h5>
                        <select name="testingStatus" style="border-radius:5px;height:20px">
                            <option value="Pass">Pass</option>
                            <option value="Fail">Fail</option>
                        </select>
                    </div>
                    <div class="card-body">
                        <h5 class="card-title mb-2">Remarks</h5>
                        <textarea name="reviews" style="width: 100%; padding:10px;" cols="30" rows="10" placeholder="E.g: Product is Good"></textarea>
                    </div>
                    <div class="card-body">
                        <input class="btn btn-primary" type="submit" value="Submit" name="add-tester">

                    </div>
                </div>
            </div>
        </form>
    </div>

    <script type="module" src="https://unpkg.com/@splinetool/viewer@1.9.59/build/spline-viewer.js"></script>

</body>

</html>