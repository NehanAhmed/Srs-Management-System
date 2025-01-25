<?php
include __DIR__ . "/../../Partials/db.php";

if (isset($_POST['add-tester'])) {
    if (isset($_GET['id'])) {
        $id = $_GET['id'];
    }
    $productId = $_GET['id'];  // Get the product id from the form data
$tester_name = $_POST['t-name'];
$tester_email = $_POST['email'];

     

$sql = "INSERT INTO `testers`(`product_id`, `tester_name`, `tester_email`) VALUES ('$productId','$tester_name','$tester_email')";

$res = mysqli_query($connect,$sql);
    if ($res) {
       
        echo "<script>window.location.href = 'index.php?testing-form&id=" . $id . "&tester_id=" . mysqli_insert_id($connect) . "'</script>";
        
    }else{
        echo "<script>alert('Failure')</script>";

    }

}



?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tester Form</title>
    <link rel="stylesheet" href="../css/app.css">
</head>
<body>
<div class="container">

<h1 style="margin-bottom:40px; text-align:center; font-weight:bold;">Enter Tester Details</h1>
<form action="" method="post">
<div class="col-12 col-lg-12">
    <div class="card">
    <div class="card-body">
            <h5 class="card-title mb-2">Tester Name</h5>
            <input type="text" class="form-control" name="t-name" placeholder="E.g: John Doe" required>
        </div>
        <div class="card-body">
            <h5 class="card-title mb-2">Email</h5>
            <input type="text" class="form-control" name="email" placeholder="E.g: johndoe123@gmail.com">
        </div>
        <div class="card-body">
            <h5 class="card-title mb-2">Phone no.</h5>
            <input type="tel" class="form-control" name="phone-num" placeholder="E.g: +92 31242354">
        </div>
            <div class="card-body">
                <input class="btn btn-primary"  type="submit" value="Next" name="add-tester">
                
            </div>
        </div>
    </div>
    </form>
    </div>
</body>
</html>