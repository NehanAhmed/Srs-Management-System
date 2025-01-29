<?php 
include "../Partials/db.php";

$sql = "SELECT 
    W.WorkflowID,
    W.ProductID,
    P.ProductName,
    P.ProductType,
    W.CurrentStage,
    W.StartDate,
    W.EndDate,
    W.Status AS WorkflowStatus,
    P.ManufacturingDate,
    P.RevisionNumber,
    P.Status AS ProductStatus,
    P.TestingType,
    P.DepartmentID
FROM workflow W
INNER JOIN products P
    ON W.ProductID = P.ProductID;
";

$res = mysqli_query($connect,$sql);



?>


<div class="row">
						<div class="col-12 col-lg-8 col-xxl-9 d-flex">
							<div class="card flex-fill">
								<div class="card-header">

									<h5 class="card-title mb-0">Latest Projects</h5>
								</div>
								<table class="table table-hover my-0 overflow-scroll">
									<thead class="table-dark">
										<tr class="text-center"> 
											<th>#</th>
											<th>Product Name</th>
											<th class="d-none d-xl-table-cell">Start Date</th>
											<th class="d-none d-xl-table-cell">End Date</th>
											<th>Status</th>
											<th class="d-none d-md-table-cell">Current Stage</th>
										</tr>
									</thead>
									<tbody class="table-grey">
										<?php while($row = mysqli_fetch_assoc($res)):?>
											
										<tr class="text-center">
											<td><?php echo $row['ProductID']?></td>
											<td><?php echo $row['ProductName']?></td>
											<td class="d-none d-xl-table-cell"><?php echo $row['StartDate']?></td>
											<td class="d-none d-xl-table-cell"><?php echo $row['StartDate']?></td>
           <td>
               <span class="badge <?php 
                   if ($row['WorkflowStatus'] == 'In Progress') {
                       echo 'bg-warning';
                   } elseif ($row['WorkflowStatus'] == 'Completed') {
                       echo 'bg-success';
                   } elseif ($row['WorkflowStatus'] == 'Rejected') {
                       echo 'bg-danger';
                   } else {
                       echo 'bg-secondary';
                   }
               ?>">
                   <?php echo $row['WorkflowStatus']; ?>
               </span>
           </td>
											<td class="d-none d-md-table-cell"><?php echo $row['CurrentStage']?></td>
										</tr>
										<?php endwhile;?>
									</tbody>
								</table>
							</div>
						</div>
						<div class="col-12 col-lg-4 col-xxl-3 d-flex">
							<div class="card flex-fill w-100">
								<div class="card-header">

									<h5 class="card-title mb-0">Monthly Sales</h5>
								</div>
								<div class="card-body d-flex w-100">
									<div class="align-self-center chart chart-lg"><div class="chartjs-size-monitor"><div class="chartjs-size-monitor-expand"><div class=""></div></div><div class="chartjs-size-monitor-shrink"><div class=""></div></div></div><div class="chartjs-size-monitor"><div class="chartjs-size-monitor-expand"><div class=""></div></div><div class="chartjs-size-monitor-shrink"><div class=""></div></div></div>
										<canvas id="chartjs-dashboard-bar" width="237" height="437" style="display: block; height: 350px; width: 190px;" class="chartjs-render-monitor"></canvas>
									</div>
								</div>
							</div>
						</div>
					</div>