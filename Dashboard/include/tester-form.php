<?php
include __DIR__ . "/../../Partials/db.php";

if (isset($_POST['add-tester'])) {

$tester_name = $_POST['t-name'];
$tester_email = $_POST['email'];
$tester_number = $_POST['phone-num'];
     

$sql = "INSERT INTO `testers`(`name`, `email`, `phone_number`) VALUES ('$tester_name','$tester_email','$tester_number')";

$res = mysqli_query($connect,$sql);
    if ($res) {
        
        echo "<script>alert('Thank You. Now you can start testing Product')</script>";
    }else{
        echo "<script>alert('Failure')</script>";

    }

}



?>

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
                <input class="btn btn-primary"  type="submit" value="add-tester" name="add-tester">
                
            </div>
        </div>
    </div>
    </form>
    