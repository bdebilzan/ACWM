<?php
	include_once('connection.php');

	$output = array('error' => false);

	$database = new Connection();
	$db = $database->open();
	try{
		    $id = $_POST['id'];
            $vno  = $_POST["vno"];
            $assigned = $_POST["assigned"];
            $license = $_POST["license"];
            $make  = $_POST["make"];
            $model  = $_POST["model"];
            $year = $_POST["year"];
            $housed  = $_POST["housed"];
            $vin    = $_POST["vin"];
            $unit = $_POST["unit"];
            $description  = $_POST["description"];
            $bureau    = $_POST["bureau"];
            $funding = $_POST["funding"];

		$sql = " UPDATE SALVAGE_VEHICLE SET VNO = '$vno', ASSIGNEDTO = '$assigned', LICENSE = '$license', MAKE = '$make', MODEL = '$model', YEAR = '$year', HOUSED = '$housed', VIN = '$vin', UNIT = '$unit', DESCRIPTION = '$description', BUREAU = '$bureau', FUNDINGORG = '$funding' WHERE GUID = '$id' ";
		//if-else statement in executing our query
		if($db->exec($sql)){
			$output['message'] = 'Vehicle updated successfully';
		} 
		else{
			$output['error'] = true;
			$output['message'] = 'Something went wrong. Cannot update vehicle';
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