<?php
include "../Partials/db.php";
if (isset($_GET['reject'])) {
    $id = $_GET['id'];
    $sql = "UPDATE `cpri` SET `ApprovalStatus` = 'Rejected' WHERE ProductID = $id";
    $res = mysqli_query($connect,$sql);
    if ($res) {
        // header("Location:index.php?product-approval");
        echo "<script>window.location.href = 'index.php?product-approval'</script>";

    }else{
        echo "<script>alert('Failed to reject product')</script>"; 
    }
}
?>