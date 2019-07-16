<?php
    if (isset($_SESSION['userRoles'])) {
        $pieces = explode(",", $_SESSION['userRoles'][0]);
    }
?>

	<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
		<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarColor01" aria-controls="navbarColor01" aria-expanded="false" aria-label="Toggle navigation">
			<span class="navbar-toggler-icon"></span>
		</button>

		<div class="collapse navbar-collapse" id="navbarColor01">
			<ul class="nav navbar-nav ml-auto w-100 justify-content-left">

				<li class="nav-item active">
					<a class="btn btn-dark" href="home.php" role="button">Home</a>
				</li>

				<?php if (!(count($_SESSION['userRoles']) == 1 && in_array("ADMIN", $_SESSION["userRoles"]))) { ?>
				<li class="nav-item">
					<div class="dropdown">
						<button class="btn btn-dark dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
							Assets
						</button>
						<div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
							<a class="dropdown-item" href="assets.php">Fixed/Portable</a>
							<a class="dropdown-item" href="vehicles.php">Vehicles</a>
							<a class="dropdown-item" href="computer.php">Computers</a>
						</div>
					</div>
				</li>
					<li class="nav-item active">
						<a class="btn btn-dark" href="receive.php" role="button">Receive</a>
					</li>

				<li class="nav-item">
					<div class="dropdown">
						<button class="btn btn-dark dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
							Salvage
						</button>
						<div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
							<a class="dropdown-item" href="salvage_assets.php">Fixed/Portable</a>
							<a class="dropdown-item" href="salvage_vehicles.php">Vehicles</a>
							<a class="dropdown-item" href="salvage_computers.php">Computers</a>
							<?php if ((isset($_SESSION["userRoles"])) && in_array("USER", $_SESSION['userRoles'])) { ?>
								<a class="dropdown-item" href="salvage_forms.php">Forms</a>
							<?php } ?>
						</div>
					</div>
				</li>
				
				<?php } ?>

			</ul>

			<ul class="nav navbar-nav ml-auto w-100 justify-content-end">
				<?php if ((isset($_SESSION["userRoles"])) && in_array("ADMIN", $_SESSION['userRoles'])) { ?>
                    <!-- <li class="nav-item active">
                        <a class="btn btn-dark" href="admin.php" role="button">Administration</a>
                    </li> -->
					<li class="nav-item">
						<div class="dropdown">
							<button class="btn btn-dark dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
								Administration
							</button>
							<div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
								<a class="dropdown-item" href="admin.php">User Account Control</a>
								<a class="dropdown-item" href="tables.php">Table Management</a>
							</div>
						</div>
					</li>
				<?php } ?>
				<?php if (isset($_SESSION['userRoles'])) { ?>
                    <li class="nav-item active">
                        <!-- <button type="button" class="btn btn-outline-success float-right">Logout</button> -->
                        <a href="logout.php" class="btn btn-outline-success float-right" role="button">Logout</a>
                    </li>
				<?php } ?>
			</ul>

		</div>
	</nav>