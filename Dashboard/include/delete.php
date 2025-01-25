<?php   
include "../../Partials/db.php";

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $sql = "DELETE FROM `products` WHERE ProductID = $id";

    $res = mysqli_query($connect,$sql);
    if ($res) {
        header("Location: ../index.php?all-products");
    }
}


?>