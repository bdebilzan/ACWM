<?php
	include_once('connection.php');
	$output = array('error' => false);

	$database = new Connection();
    $db = $database->open();
	
	try
	{
		$stmt = $db->prepare("DELETE FROM `locations` WHERE LOCATION = :removeLocation");
		
		if ($stmt->execute(array(':removeLocation' => $_POST['removeLocation'])))
		{
			$output['message'] = 'Location removed!';
		}
		else
		{
			$output['error'] = true;
			$output['message'] = 'Something went wrong. Cannot remove location';
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