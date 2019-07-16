<?php
	//the delete shoould revome from the application_roles based un the user's uid and the selected role

	session_start();

	include_once('connection.php');
	// include('function.php');
	$output = array('error' => false);

	$database = new Connection();
	$db = $database->open();
	try{

		//variable issue - variables 
		$oldUID = $_POST['roleUID_delete'];
		$oldROLE = $_POST['roleROLE_delete'];
		// $uid = $_POST['uid'];
		// $role  = $_POST["role"];

		//	$sql = "UPDATE ROLES SET UID = '$uid', ROLE = '$role' WHERE UID = '$oldUID' AND ROLE = '$oldROLE'"; //where statement?


		// echo $oldUID;
		// echo $oldROLE;
		// echo $uid;
		// echo $role;

		
		$theOldRoleUID = "select acwm.roles.UID from acwm.roles where acwm.roles.ROLE = '" . $oldROLE . "'";
		$theOldEmployeeUID = "select acwm.user_roles.ROLE_UID from acwm.user_roles where acwm.user_roles.EMPLOYEE_ID = " . $oldUID;
		$oldRoleUIDprime = $db->query($theOldRoleUID)->fetch();
		$oldEmployeeUIDprime = $db->query($theOldEmployeeUID)->fetch();
		$oldRoleUID = $oldRoleUIDprime['UID'];
		$oldEmployeeUID = $oldEmployeeUIDprime['ROLE_UID'];
		 
		// $stmt1 = $db->query("select acwm.application_roles.ROLE_UID 
		// 						from acwm.application_roles
		// 						join acwm.user_roles
		// 						on acwm.user_roles.ROLE_UID = acwm.application_roles.UID
		// 						where acwm.user_roles.EMPLOYEE_ID = " . $oldUID);

		// $theUID = $stmt1->fetch();
		// $result = $theUID['ROLE_UID'];

		//switch to prepare stmt
		// $sql = "DELETE FROM ROLES WHERE UID = '$result' AND ROLE = '$oldROLE'"; //where statement?
		$sql = "delete from application_roles where uid = '$oldEmployeeUID' and role_uid = '$oldRoleUID'";
		//if-else statement in executing our query
		if($oldUID === $_SESSION['username']){
			$output['error'] = true;
			$output['message'] = 'For security reasons, you are not allowed to edit your own roles.';
		}
		else{
			if($db->exec($sql)){
				$output['message'] = 'User role deleted successfully';
			} 
			else{
				$output['error'] = true;
				$output['message'] = 'Something went wrong. Cannot update user role';
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