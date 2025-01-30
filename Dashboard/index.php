<?php
session_start();

if (isset($_SESSION['loggedin']) != true) {
	header("Location: ../Auth/login.php");
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta name="description" content="Responsive Admin &amp; Dashboard Template based on Bootstrap 5">
	<meta name="author" content="AdminKit">
	<meta name="keywords" content="adminkit, bootstrap, bootstrap 5, admin, dashboard, template, responsive, css, sass, html, theme, front-end, ui kit, web">

	<link rel="preconnect" href="https://fonts.gstatic.com">
	<link rel="shortcut icon" href="img/icons/icon-48x48.png" />
	<link rel="stylesheet" href="https://cdn.datatables.net/2.2.1/css/dataTables.dataTables.css" />
	<script src="https://kit.fontawesome.com/0a02fbb60a.js" crossorigin="anonymous"></script>
	<script src="https://cdn.datatables.net/2.2.1/js/dataTables.js"></script>

	<title>AdminKit Demo - Bootstrap 5 Admin Template</title>

	<link href="./css/app.css" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;600&display=swap" rel="stylesheet">
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
	<style>
		select {
			width: 20%;
			padding: 10px;
			border: 1px solid grey;
			border-radius: 3px;

		}

		option {
			width: 100%;
			padding: 10px;
		}

		.preloader {
			width: 100%;
			height: 100vh;
			display: flex;
			justify-content: center;
			align-items: center;
			position: fixed;
			top: 0;
			left: 0;
			background-color: white;
			z-index: 9999;

		}

		.preloader {
			opacity: 1;
			visibility: visible;
			transition: opacity 0.5s ease-in-out, visibility 0.5s ease-in-out;
		}

		.preloader.active {
			opacity: 0;
			visibility: hidden;
			transition: opacity 0.5s ease-in-out, visibility 0.5s ease-in-out;
		}

		.preloader-inner {
			width: 200px;
			height: 100px;
			display: flex;
			justify-content: center;
			align-items: center;
			gap: 10px;
			/* The CSS property `flex-direction: column;` is used to specify the direction in which flex items
			are placed in a flex container. */
			/* flex-direction: column; */
			/* border-radius: 50%; */
			/* background-color: #343a40; */

		}
	</style>
</head>

<body>
	<div class="preloader" id="preloader">
		<div class="preloader-inner">
			<img src="../Assets/Images/Preloader/1490.gif" alt="">
			<h3>Please Wait..</h3>
		</div>
	</div>
	<div class="wrapper">
		<?php if (isset($_SESSION['RoleID'])) {
			if ($_SESSION['RoleID'] == 2) {
				include "../Partials/testing-department.php";
			} elseif ($_SESSION['RoleID'] == 3) {
				include "../Partials/cpri-admin.php";
			} else {
				include "../Partials/sidebar-admin.php";
			}
		}

		?>

		<div class="main">
			<?php include "../Partials/header.php" ?>

			<main class="content">

				<?php
				//Include for All sidebar
				if (isset($_GET['dashboard'])) {
					include "./include/dashboard.php";
				} elseif (isset($_GET['profile'])) {
					include "./include/profile.php";
				}elseif (isset($_GET['charts'])) {
					include "./include/charts.php";
				}

				//Include for CPRI Sidebar
				elseif (isset($_GET['product-approval'])) {
					include "./include/product-approval.php";
				} elseif (isset($_GET['approve'])) {
					include "./include/approve.php";
				} elseif (isset($_GET['reject'])) {
					include "./include/reject.php";
				}
				//Include for Tester Department Sidebar

				elseif (isset($_GET['test-product'])) {
					include "./include/test-product.php";
				} elseif (isset($_GET['retesting'])) {
					include "./include/retesting.php";
				} elseif (isset($_GET['tester-form'])) {
					include "./include/tester-form.php";
				} elseif (isset($_GET['testing-form'])) {
					include "./include/testing-form.php";
				} elseif (isset($_GET['tester-detail'])) {
					include "./include/tester-detail.php";
				}
				//Include for Admin Sidebar
				elseif (isset($_GET['all-products'])) {
					include "./include/all-product.php";
				} elseif (isset($_GET['add-product'])) {
					include "./include/add-product.php";
				} elseif (isset($_GET['marketplace'])) {
					include "./include/marketplace.php";
				} elseif (isset($_GET['workflow'])) {
					include "./include/workflow.php";
				} elseif (isset($_GET['testing-type'])) {
					include "./include/testing-type.php";
				} elseif (isset($_GET['delete-testing-type'])) {
					include "./include/delete-testing-type.php";
				} elseif (isset($_GET['add-testing-type'])) {
					include "./include/add-testing-type.php";
				} else {
					include "./include/dashboard.php";
				}
				?>

			</main>

			<?php include "../Partials/footer.php" ?>
		</div>
	</div>
	<script src="js/app.js"></script>
	<script src="../Assets/JS/charts.js"></script>
	<script src="../Assets/JS/categoryChart.js"></script>
	<script src="../Assets/JS/dashboard.js"></script>
	<script src="../Assets/Php/chart.php"></script>
	<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

	<script>
		function toggleClass() {
			let sidebarItems = document.querySelectorAll('.sidebar-item');
			let currentPath = window.location.search;

			sidebarItems.forEach(item => {
				// Restore active state on page load
				if (item.getAttribute('href') && currentPath.includes(item.getAttribute('href'))) {
					sidebarItems.forEach(i => i.classList.remove('active'));
					item.classList.add('active');
				}

				item.addEventListener('click', function() {
					sidebarItems.forEach(i => i.classList.remove('active'));
					this.classList.add('active');
				});
			});
		}
		toggleClass();
	</script>
	
	<script>
		setTimeout(toggleClass, 2000)

		function toggleClass() {
			let preloader = document.getElementById("preloader");
			preloader.classList.toggle("active");
		}
	</script>

</body>

</html>