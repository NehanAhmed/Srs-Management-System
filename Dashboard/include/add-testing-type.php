<?php 
include __DIR__ . "/../../Partials/db.php";
if (isset($_POST['add-type'])) {
    $t_type = $_POST['t_type'];
$sql = "INSERT INTO `testingtype`(`TestingType`) VALUES ('$t_type')";

$res = mysqli_query($connect, $sql);

if ($res) {
    echo "<script>window.location.href = 'index.php?testing-type'</script>";
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
                        <h5 class="card-title mb-2">Testing Type</h5>
                        <input type="text" name="t_type" class="form-control" required placeholder="e.g: Functional Testing">
                    </div>
                    <div class="card-body">
                        <input class="btn btn-primary" type="submit" value="Submit" name="add-type">

                    </div>
                </div>
            </div>
        </form>
    </div>

    <script type="module" src="https://unpkg.com/@splinetool/viewer@1.9.59/build/spline-viewer.js"></script>

</body>

</html>