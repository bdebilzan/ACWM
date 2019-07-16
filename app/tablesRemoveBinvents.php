<?php
	include_once('connection.php');
	$output = array('error' => false);

	$database = new Connection();
    $db = $database->open();
	
	try
	{
		$stmt = $db->prepare("DELETE FROM `b_invent_unitcodes` WHERE B_INVENT_UNITCODE = :removeBinvent");
		
		if ($stmt->execute(array(':removeBinvent' => $_POST['removeBinvent'])))
		{
			$output['message'] = 'B_invent_unitcode removed!';
		}
		else
		{
			$output['error'] = true;
			$output['message'] = 'Something went wrong. Cannot remove b_invent_unitcode';
		} 
	}
	catch(PDOException $e)
	{
		$output['error'] = true;
		$output['message'] = $e->getMessage();
	}

	$database->close();
	echo json_encode($output);
?>