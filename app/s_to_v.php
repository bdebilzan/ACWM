<?php
	include_once('connection.php');

	$output = array('error' => false);

	$database = new Connection();
	$db = $database->open();
	try
	{
		//make use of prepared statement to prevent sql injection
		$stmt1 = $db->prepare("INSERT INTO VEHICLE SELECT * FROM SALVAGE_VEHICLE WHERE GUID = '$_POST[id]'");
		$stmt2 = $db->prepare("DELETE FROM SALVAGE_VEHICLE WHERE GUID = '$_POST[id]'");
		//if-else statement in executing our prepared statement

		if($stmt1->execute())
		{
			$output['message'] = 'Asset marked for Salvage';
		}
		else
		{
			$output['error'] = true;
			$output['message'] = 'Something went wrong. Cannot salvage asset';
		}

		if($stmt2->execute())
		{
			$output['message'] = 'Asset marked for Salvage';
		}
		else
		{
			$output['error'] = true;
			$output['message'] = 'Something went wrong. Cannot remove asset';
		}
	}
    catch(PDOException $e)
    {
		$output['error'] = true;
 		$output['message'] = $e->getMessage();
	}

	//close connection
	$database->close();

	echo json_encode($output);
?>