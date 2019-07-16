<?php
	include_once('connection.php');

	$output = array('error' => false);

	$database = new Connection();
    $db = $database->open();
	
	try
	{
		$stmt = $db->prepare("INSERT INTO `locations` VALUES (:newLocation)");
		
		if ($stmt->execute(array(':newLocation' => $_POST['newLocation'])))
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