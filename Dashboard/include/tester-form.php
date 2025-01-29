<?php
include __DIR__ . "/../../Partials/db.php";

if (isset($_GET['id']) && isset($_SESSION['name']) && isset($_SESSION['Email'])) {
    // Retrieve and sanitize inputs
    $id = intval($_GET['id']);
    $tester_name = mysqli_real_escape_string($connect, $_SESSION['name']);
    $tester_email = mysqli_real_escape_string($connect, $_SESSION['Email']);

    // Debugging
    error_log("Product ID: $id, Tester Name: $tester_name, Tester Email: $tester_email");

    // Use prepared statement to insert data
    $sql = "INSERT INTO testers (product_id, tester_name, tester_email) VALUES (?, ?, ?)";
    $stmt = mysqli_prepare($connect, $sql);

    if ($stmt) {
        mysqli_stmt_bind_param($stmt, 'iss', $id, $tester_name, $tester_email);

        if (mysqli_stmt_execute($stmt)) {
            // echo "Successfully inserted. Product ID: $id";
            echo "<script>window.location.href = 'index.php?testing-form&id=". $id. "&tester_id=". mysqli_insert_id($connect). "'</script>";
        } else {
            echo "<script>alert('Failure: Could not insert tester details');</script>";
        }

        mysqli_stmt_close($stmt);
    } else {
        echo "<script>alert('Failure: SQL error in preparing statement');</script>";
    }
} else {
    echo "<script>alert('Failure: Missing Product ID or Tester Session Data');</script>";
}

mysqli_close($connect);
?>
