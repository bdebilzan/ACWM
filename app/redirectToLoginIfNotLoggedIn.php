
<!--if not loggged in redirect to login page-->
<?php
	session_start();
	if (!(isset($_SESSION['userRoles'])))
    {
		header("Location: login.php");
        exit();
	}
?>