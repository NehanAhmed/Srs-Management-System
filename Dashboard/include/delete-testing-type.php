<?php 
include __DIR__ . "/../../Partials/db.php";

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $sql = "DELETE FROM `testingtype` WHERE id = $id";
    $res = mysqli_query($connect,$sql);
    if ($res) {
        echo "<script>window.location.href = 'index.php?testing-type'</script>";

    }

}


?>