<?php
	//the add should be performed by adding onto the application_roles based on the user's uid and the selected uid

	session_start();

	include_once('connection.php');
	include('function.php');

	$output = array('error' => false);

	$database = new Connection();
	$db = $database->open();
	try{
		// $stmt0 = $db->prepare("SELECT UID FROM ROLES WHERE UID = :uid AND ROLE = :role");
		// $stmt0 = $db->prepare("select acwm.user_roles.EMPLOYEE_ID, acwm.roles.ROLE from acwm.user_roles 
		// 						join acwm.application_roles 
		// 						on acwm.user_roles.ROLE_UID = acwm.application_roles.UID
		// 						join acwm.roles
		// 						on acwm.application_roles.ROLE_UID = acwm.roles.UID
		// 						where acwm.user_roles.EMPLOYEE_ID = :uid
		// 						and acwm.roles.ROLE = :role");
		// $stmt1 = $db->query("select acwm.application_roles.ROLE_UID 
		// 						from acwm.application_roles
		// 						join acwm.user_roles
		// 						on acwm.user_roles.ROLE_UID = acwm.application_roles.UID
		// 						where acwm.user_roles.EMPLOYEE_ID = " . $_POST['uid']);	
								
		$getEmpID = "select acwm.user_roles.ROLE_UID from acwm.user_roles where acwm.user_roles.EMPLOYEE_ID = " . $_POST['uid'];
		$getRoleID = "select acwm.roles.UID from acwm.roles where acwm.roles.ROLE = '" . $_POST['role'] . "'";
		
		$theEmpID = $db->query($getEmpID)->fetch();
		$theRoleID = $db->query($getRoleID)->fetch();

		// $empID = $theEmpID->execute(array(':uid' => $_POST['uid']));
		// $roleID = $theRoleID->execute(array(':role' => $_POST['role']));
		$empID = $theEmpID['ROLE_UID'];
		$roleID = $theRoleID['UID'];

		// $theUID = $stmt1->fetch();

		$stmt = $db->prepare("SELECT UID FROM APPLICATION_ROLES WHERE UID =:uid AND ROLE_UID =:role");
		// if ($stmt0->execute(array( ':uid' => $_POST['uid'] , ':role' => $_POST['role'])))
		if($stmt->execute(array( ':uid' => $empID , ':role' => $roleID)))
		{
			$count = $stmt->rowCount();

			if($_POST['uid'] == $_SESSION['username']){
				$output['error'] = true;
				$output['message'] = 'For security reasons, you are not allowed to edit your own roles.';
			}
			else{
				if($count > 0)
				{
					// $result = $result->fetch();
					$output['error'] = true;
					$output['message'] = 'Username with this role already in use.';
					//  alert("Username with this role already in use.");
					 // exit();
				 }	
				 else
				 {
					//make use of prepared statement to prevent sql injection
					// $stmt = $db->prepare("INSERT INTO ROLES (UID, ROLE) VALUES (:uid, :role)");
					$stmt = $db->prepare("insert into acwm.application_roles values (:empID, '13347394-82b3-11e7-b36c-005056a5b2f3', :roleID, 'A')");
					//if-else statement in executing our prepared statement
					// if ($stmt->execute(array( ':uid' => $_POST['uid'] , ':role' => $_POST['role']))){
						
					// if ($stmt->execute(array( ':uid' => $theUID['ROLE_UID'] , ':role' => $_POST['role']))){
						
					if ($stmt->execute(array( ':empID' => $empID , ':roleID' => $roleID))){
						$output['message'] = 'User role added successfully';
						}
					else{
					$output['error'] = true;
					$output['message'] = 'Something went wrong. Cannot add user role.';
				} 
			}			
		}	
		}
		else{
			$output['error'] = true;
			$output['message'] = 'Something went wrong. Cannot add user role.';
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
