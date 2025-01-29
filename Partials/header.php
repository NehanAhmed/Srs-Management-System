<nav class="navbar navbar-expand navbar-light navbar-bg">
	<a class="sidebar-toggle js-sidebar-toggle ms-4">
		<i class="hamburger align-self-center"></i>
	</a>

	<div class="navbar-collapse collapse">
		<ul class="navbar-nav navbar-align">


			<li class="nav-item dropdown">


				<a class="nav-link dropdown-toggle d-none d-sm-inline-block" href="#" data-bs-toggle="dropdown">
					<img src="../Assets/Images/profileImg<?php echo $_SESSION['profileImg'] ?>" class="avatar img-fluid rounded me-1" alt="Charles Hall"> <span class="text-dark">




						<?php
						if (isset($_SESSION['name'])) {
							echo $_SESSION['name'];
						}
						?>








					</span>
				</a>
				<div class="dropdown-menu dropdown-menu-end">
					<a class="dropdown-item" href="index.php?profile"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-user align-middle me-1">
							<path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path>
							<circle cx="12" cy="7" r="4"></circle>
						</svg> Profile</a>
					<a class="dropdown-item" href="index.php?dashboard"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-pie-chart align-middle me-1">
							<path d="M21.21 15.89A10 10 0 1 1 8 2.83"></path>
							<path d="M22 12A10 10 0 0 0 12 2v10z"></path>
						</svg> Analytics</a>

					<div class="dropdown-divider"></div>
					<a class="dropdown-item" href="../Auth/logout.php">Log out</a>
				</div>
			</li>
		</ul>
	</div>
</nav>