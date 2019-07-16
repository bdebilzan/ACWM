<?php
	include_once('connection.php');

	$output = array('error' => false);

	$database = new Connection();
	$db = $database->open();
	try
	{
		//make use of prepared statement to prevent sql injection
		$stmt1 = $db->prepare("INSERT INTO ASSET SELECT * FROM SALVAGE_ASSET WHERE GUID = '$_POST[id]'");
		$stmt2 = $db->prepare("DELETE FROM SALVAGE_ASSET WHERE GUID = '$_POST[id]'");
		//if-else statement in executing our prepared statement

		if($stmt1->execute())
		{
			$output['message'] = 'Asset Restored';
		}
		else
		{
			$output['error'] = true;
			$output['message'] = 'Something went wrong. Cannot restore asset';
		}

		if($stmt2->execute())
		{
			$output['message'] = 'Asset Restored';
		}
		else
		{
			$output['error'] = true;
			$output['message'] = 'Something went wrong. Cannot restore asset';
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