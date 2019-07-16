<?php
	include_once('connection.php');
	$output = array('error' => false);

	$database = new Connection();
    $db = $database->open();
	
	try
	{
		$stmt = $db->prepare("DELETE FROM `bureaus` WHERE BUREAU = :removeBureau");
		
		if ($stmt->execute(array(':removeBureau' => $_POST['removeBureau'])))
		{
			$output['message'] = 'Bureau removed!';
		}
		else
		{
			$output['error'] = true;
			$output['message'] = 'Something went wrong. Cannot remove bureau';
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