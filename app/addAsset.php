<?php

include "connection.php";
$database = new Connection();
$db = $database->open();
 
$location = $_POST['location'];
$assignee = $_POST['assignee'];
$description = $_POST['description'];
$make = $_POST['make'];
$model = $_POST['model'];
$serialNo = $_POST['serialNo'];
$countyNo = $_POST['countyNo'];
$cost = $_POST['cost'];
$comments = $_POST['comments'];
$status = $_POST['status'];
$category = $_POST['category'];
$binvent = $_POST['binvent'];
$sublocations = $_POST['sublocations'];
$bureau = $_POST['bureau'];
//Prepared statement
$query = "INSERT INTO asset (ASSET_IMAGE, LOCATION_IMAGE, ASSIGNEE_IMAGE, LOCATION, ASSIGNEE, DESCRIPTION, MAKE, MODEL, SERIALNO, COUNTYNO, COST, COMMENTS, STATUS, CATEGORY, BINVENT, SUBLOCATION, BUREAU) VALUES(?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?) ";



$statement  = $db->prepare($query);
// file name
$filename = $_FILES['file']['name'];
$filename2 = $_FILES['file2']['name'];
$filename3 = $_FILES['file3']['name'];
// Location
$locationFile = 'employeeImages/'.$filename;
$locationFile2 = 'assetImages/'.$filename2;
$locationFile3 = 'locationImages/'.$filename3;
// file extension
$file_extension = pathinfo($locationFile, PATHINFO_EXTENSION);
$file_extension = strtolower($file_extension);

$file_extension2 = pathinfo($locationFile2, PATHINFO_EXTENSION);
$file_extension2 = strtolower($file_extension2);

$file_extension3 = pathinfo($locationFile3, PATHINFO_EXTENSION);
$file_extension3 = strtolower($file_extension3);

// Valid image extensions
$image_ext = array("jpg","png","jpeg","gif");

$response = 0;
$response2 = 0;
$response3 = 0;
if(in_array($file_extension,$image_ext)){
	if(in_array($file_extension2,$image_ext)){
		if(in_array($file_extension3,$image_ext)){
	// Upload file
			if(move_uploaded_file($_FILES['file']['tmp_name'],$locationFile)){
					$response = $locationFile;

						if(move_uploaded_file($_FILES['file2']['tmp_name'],$locationFile2)){
							$response2 = $locationFile2;
								if(move_uploaded_file($_FILES['file3']['tmp_name'],$locationFile3)){
									$response3 = $locationFile3;
									$statement->execute(array($response2, $response3, $response, $location, $assignee, $description, $make, $model, $serialNo, $countyNo, $cost, $comments, $status, $category, $binvent, $sublocations, $bureau));
								}
						}
				}
		}
	}
}

echo $response;
//close connection
	$database->close();
	// include_once('connection.php');

	// $output = array('error' => false);

	// $database = new Connection();
	// $db = $database->open();
	// try
	// {
	// 	//make use of prepared statement to prevent sql injection
	// 	$stmt = $db->prepare("INSERT INTO ASSET (LOCATION, ASSIGNEE, DESCRIPTION, MAKE, MODEL, SERIALNO, COUNTYNO, COST, COMMENTS, STATUS, CATEGORY, BINVENT, SUBLOCATION, BUREAU) VALUES (:location, :assignee, :description, :make, :model, :serialNo, :countyNo, :cost, :comments, :status, :category, :binvent, :sublocation, :bureau)");
	// 	//if-else statement in executing our prepared statement
	// 	if ($stmt->execute(array(':location' => $_POST['location'] , ':assignee' => $_POST['assignee'] , ':description' => $_POST['description'], ':make' => $_POST['make'] , ':model' => $_POST['model'] , ':serialNo' => $_POST['serialNo'], ':countyNo' => $_POST['countyNo'] , ':cost' => $_POST['cost'], ':comments' => $_POST['comments'] , ':status' => $_POST['status'] , ':category' => $_POST['category'], ':binvent' => $_POST['binvent'] , ':sublocation' => $_POST['sublocation'] , ':bureau' => $_POST['bureau'])) ){
	// 		$output['message'] = 'asset added successfully';
	// 	}
	// 	else{
	// 		$output['error'] = true;
	// 		$output['message'] = 'Something went wrong. Cannot add asset';
	// 	} 
	// }
	// catch(PDOException $e)
	// {
	// 	$output['error'] = true;
 // 		$output['message'] = $e->getMessage();
	// }

	// //close connection
	// $database->close();

	// echo json_encode($output);
?>