<?php

include "connection.php";
$database = new Connection();
$db = $database->open();
 
$vno = $_POST['vno'];
$assigned = $_POST['assigned'];
$license = $_POST['license'];
$make = $_POST['make'];
$model = $_POST['model'];
$year = $_POST['year'];
$housed = $_POST['housed'];
$vin = $_POST['vin'];
$unit = $_POST['unit'];
$description = $_POST['description'];
$bureau = $_POST['bureau'];
$funding = $_POST['funding'];
//Prepared statement
$query = "INSERT INTO vehicle ( EMPLOYEE_IMAGE, VEHICLE_IMAGE, LOCATION_IMAGE, VNO, ASSIGNEDTO, LICENSE, MAKE, MODEL, YEAR, HOUSED, VIN, UNIT, DESCRIPTION, BUREAU, FUNDINGORG) VALUES(?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)";



$statement  = $db->prepare($query);
// file name
$filename = $_FILES['file']['name'];
$filename2 = $_FILES['file2']['name'];
$filename3 = $_FILES['file3']['name'];

// Location
$location = 'employeeImages/'.$filename;
$location2 = 'assetImages/'.$filename2;
$location3 = 'locationImages/'.$filename3;

// file extension
$file_extension = pathinfo($location, PATHINFO_EXTENSION);
$file_extension = strtolower($file_extension);

$file_extension2 = pathinfo($location2, PATHINFO_EXTENSION);
$file_extension2 = strtolower($file_extension2);

$file_extension3 = pathinfo($location3, PATHINFO_EXTENSION);
$file_extension3 = strtolower($file_extension3);

// Valid image extensions
$image_ext = array("jpg","png","jpeg");

$response = 0;
$response2 = 0;
$response3 = 0;
if(in_array($file_extension,$image_ext)){
	if(in_array($file_extension2,$image_ext)){
		if(in_array($file_extension3,$image_ext)){
	// Upload file
			if(move_uploaded_file($_FILES['file']['tmp_name'],$location)){
				$response = $location;
					if(move_uploaded_file($_FILES['file2']['tmp_name'],$location2)){
						$response2 = $location2;
							if(move_uploaded_file($_FILES['file3']['tmp_name'],$location3)){
								$response3 = $location3;
								$statement->execute(array($response, $response2, $response3, $vno, $assigned, $license, $make, $model, $year, $housed, $vin, $unit, $description, $bureau, $funding));
							}
				     }
				}
		}
	}
}

echo $response;
//close connection
	$database->close();
	
?>