<?php
	//the edit should be performed by modifying the chosen user's role_uid based in their uid

	session_start();

	// include_once('connection.php');
	// // include('function.php');
	// $output = array('error' => false);

	// $database = new Connection();
	// $db = $database->open();
	// try{
	// 	 $uid = $_POST['uid'];
	// 	 $role  = $_POST["role"];


	// 	$sql = "UPDATE ROLES SET UID = '$uid', ROLE = '$role' WHERE UID = '$uid' "; //where statement?
	// 	//if-else statement in executing our query
	// 	if($db->exec($sql)){
	// 		$output['message'] = 'User role updated successfully';
	// 	} 
	// 	else{
	// 		$output['error'] = true;
	// 		$output['message'] = 'Something went wrong. Cannot update user role';
	// 	}

	// }
	// catch(PDOException $e){
	// 	$output['error'] = true;
	// 	$output['message'] = $e->getMessage();
	// }

	// //close connection
	// $database->close();

	// echo json_encode($output);
	
	include_once('connection.php');
	// include('function.php');
	$output = array('error' => false);

	$database = new Connection();
	$db = $database->open();
	try{
		$oldUID = $_POST['roleUID'];
		$oldROLE = $_POST['roleROLE'];
		 $uid = $_POST['uid'];
		 $role  = $_POST["role"];
		 
		// $stmt1 = $db->query("select acwm.application_roles.ROLE_UID 
		// 						from acwm.application_roles
		// 						join acwm.user_roles
		// 						on acwm.user_roles.ROLE_UID = acwm.application_roles.UID
		// 						where acwm.user_roles.EMPLOYEE_ID = " . $oldUID);

		$theOldRoleUID = "select acwm.roles.UID from acwm.roles where acwm.roles.ROLE = '" . $oldROLE . "'";
		$theOldEmployeeUID = "select acwm.user_roles.ROLE_UID from acwm.user_roles where acwm.user_roles.EMPLOYEE_ID = " . $oldUID;
		$theNewRoleUID = "select acwm.roles.UID from acwm.roles where acwm.roles.ROLE = '" . $role . "'";

		// $theUID = $stmt1->fetch();

		$oldRoleUIDprime = $db->query($theOldRoleUID)->fetch();
		$oldEmployeeUIDprime = $db->query($theOldEmployeeUID)->fetch();
		$newRoleUIDprime = $db->query($theNewRoleUID)->fetch();

		$oldRoleUID = $oldRoleUIDprime['UID'];
		$oldEmployeeUID = $oldEmployeeUIDprime['ROLE_UID'];
		$newRoleUID = $newRoleUIDprime['UID'];

		// $result = $theUID['ROLE_UID'];

		//  $stmt = $db->prepare("SELECT UID FROM ROLES WHERE UID =:uid AND ROLE =:role");
		 $stmt = $db->prepare("SELECT UID FROM APPLICATION_ROLES WHERE UID =:uid AND ROLE_UID =:role");
		 if($stmt->execute(array( ':uid' => $oldEmployeeUID , ':role' => $newRoleUID)))
		 {
			 $count = $stmt->rowCount();

			if($oldUID === $_SESSION['username']){
				$output['error'] = true;
				$output['message'] = 'For security reasons, you are not allowed to edit your own roles.';
			}
			else{
				//check for duplicate 
				if($count > 0)
				{
					$output['error'] = true;
					$output['message'] = 'Username with this role already exists.';
				}	
				else
				{
					//instead modify the application_roles table
					// $sql = "UPDATE ROLES SET UID = '$result', ROLE = '$role' WHERE UID = '$result' AND ROLE = '$oldROLE'"; //where statement?
					//if-else statement in executing our query
					$sql = "update application_roles set role_uid = '$newRoleUID' where uid = '$oldEmployeeUID' and role_uid = '$oldRoleUID'";
					if($db->exec($sql)){
						$output['message'] = 'User role updated successfully';
					} 
					else{
						$output['error'] = true;
						$output['message'] = 'Something went wrong. Cannot update user role ' . $oldEmployeeUID;
					}
				}
			}
		}
	}
	
	catch(PDOException $e){
		$output['error'] = true;
		$output['message'] = $e->getMessage();
	}

	//close connection
	$database->close();

	echo json_encode($output);
?>
