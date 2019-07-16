<?php
	include_once('connection.php');

	$output = array('error' => false);

	$database = new Connection();
	$db = $database->open();
	try{
		  $id = $_POST['id'];
		  $location  = $_POST["location"];
		  $assignee = $_POST["assignee"];
		  $description = $_POST["description"];
		  $make  = $_POST["make"];
		  $model  = $_POST["model"];
		  $serialNo = $_POST["serialNo"];
		  $countyNo  = $_POST["countyNo"];
		  $cost = $_POST["cost"];
		  $comments  = $_POST["comments"];
		  $status  = $_POST["status"];
		  $category    = $_POST["category"];
  		  $binvent = $_POST["binvent"];
  		  $sublocation    = $_POST["sublocation"];
  		  $bureau = $_POST["bureau"];

		$sql = " UPDATE SALVAGE_ASSET SET LOCATION = '$location', ASSIGNEE = '$assignee', DESCRIPTION = '$description', MAKE = '$make', MODEL = '$model', SERIALNO = '$serialNo', COUNTYNO = '$countyNo', COST = '$cost', COMMENTS = '$comments', STATUS = '$status', CATEGORY = '$category', BINVENT = '$binvent', SUBLOCATION = '$sublocation', BUREAU = '$bureau' WHERE GUID = '$id' ";
		//if-else statement in executing our query
		if($db->exec($sql)){
			$output['message'] = 'Asset updated successfully';
		} 
		else{
			$output['error'] = true;
			$output['message'] = 'Something went wrong. Cannot update Asset';
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