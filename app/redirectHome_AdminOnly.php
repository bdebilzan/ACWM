
<!-- if youre an admin and thats your only role then redirect to home -->
<?php
	if ((count($_SESSION['userRoles']) == 1 && in_array("ADMIN", $_SESSION["userRoles"]))) 
  {
		header("Location: home.php");
    exit();
	}
?>