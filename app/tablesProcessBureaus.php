<?php
	include_once('connection.php');

	$output = array('error' => false);

	$database = new Connection();
    $db = $database->open();
	
	try
	{
		$stmt = $db->prepare("INSERT INTO `bureaus` VALUES (:newBureau)");
		
		if ($stmt->execute(array(':newBureau' => $_POST['newBureau'])))
		{
			$output['message'] = 'Bureau added!';
		}
		else
		{
			$output['error'] = true;
			$output['message'] = 'Something went wrong. Cannot add bureau';
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