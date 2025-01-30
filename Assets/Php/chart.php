<?php
include "../../Partials/db.php";

$sql = "select * FROM `products`";

$res = mysqli_query($connect,$sql);
$data =[];
if ($res) {
    while ($row = mysqli_fetch_assoc($res)) {
        array_push($data,$row);
    }
    echo json_encode($data);
}

?>