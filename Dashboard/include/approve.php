<?php
include "../Partials/db.php";

if (isset($_GET['approve'])) {
 $id = $_GET['id'];
 $workflowStatus = 'Completed';
 $workFlow = "UPDATE `workflow` SET `Status` = '$workflowStatus' WHERE `ProductID` = $id";
 $workFlowQuery= mysqli_query($connect, $workFlow);


    $sql = "UPDATE `cpri` SET `ApprovalStatus` = 'Approved' WHERE ProductID = $id";

    $res = mysqli_query($connect,$sql);
    if ($res) {
        echo "<script>window.location.href = 'index.php?product-approval'</script>";
    }
}
?>