<?php
include "../Partials/db.php";

$joinSql = "SELECT 
    testers.`tester_id`,
    testers.`tester_name`,
    testers.`tester_email`,
    testers.`start_date`,
    GROUP_CONCAT(products.`ProductName` SEPARATOR ', ') AS Products
FROM 
    testers
LEFT JOIN 
    products 
ON 
    testers.`product_id` = products.`ProductID`
GROUP BY 
    testers.`tester_id`, testers.`tester_name`, testers.`tester_email`, testers.`start_date`;";

$joinres = mysqli_query($connect, $joinSql);

if (!$joinres) {
    die("Query failed: " . mysqli_error($connect));
}

?>

<div class="container-fluid">
    <div class="row">
        <div class="col-sm-12">
            <div class="card">
                <div class="card-body">
                    
                    <div class="table-responsive">
                        <table class="table user-table no-wrap">
                            <thead class="table-dark">
                                <tr class="text-center">
                                    <th class="border-top-0">Tester Name</th>
                                    <th class="border-top-0">Tester Email</th>
                                    <th class="border-top-0">Current Project</th>
                                </tr>
                            </thead>
                            <tbody class="table-light">
                                <?php while ($row = mysqli_fetch_assoc($joinres)): ?>
                                    <tr class="text-center">
                                        <td><?php echo $row['tester_name']; ?></td>
                                        <td><?php echo $row['tester_email']; ?></td>
                                        <td><?php echo $row['Products'] ?></td>
                                    </tr>
                                <?php endwhile; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

