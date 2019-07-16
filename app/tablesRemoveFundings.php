<?php
	include_once('connection.php');
	$output = array('error' => false);

	$database = new Connection();
    $db = $database->open();
	
	try
	{
		$stmt = $db->prepare("DELETE FROM `funding_orgs` WHERE FUNDING_ORG_NO = :removeFunding");
		
		if ($stmt->execute(array(':removeFunding' => $_POST['removeFunding'])))
		{
			$output['message'] = 'Funding Org removed!';
		}
		else
		{
			$output['error'] = true;
			$output['message'] = 'Something went wrong. Cannot remove funding org';
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