<?php
	include_once('connection.php');

	$output = array('error' => false);

	$database = new Connection();
    $db = $database->open();
	
	try
	{
		$stmt = $db->prepare("INSERT INTO `b_invent_unitcodes` VALUES (:newBinvent)");
		
		if ($stmt->execute(array(':newBinvent' => $_POST['newBinvent'])))
		{
			$output['message'] = 'Location added!';
		}
		else
		{
			$output['error'] = true;
			$output['message'] = 'Something went wrong. Cannot add location';
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