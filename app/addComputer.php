<?php
	include_once('connection.php');

	$output = array('error' => false);

	$database = new Connection();
	$db = $database->open();

	$assignee = $_POST['assignee'];
	$item_type = $_POST['item_type'];
	$serial_no = $_POST['serial_no'];
	$model = $_POST['model'];
	$make = $_POST['make'];
	$cpu_type = $_POST['cpu_type'];
	$cpu_speed = $_POST['cpu_speed'];
	$ram = $_POST['ram'];
	$hard_drive = $_POST['hard_drive'];
	$comments = $_POST['comments'];
	$status = $_POST['status'];
	$county_no = $_POST['county_no'];
	$map_location = $_POST['map_location'];
	$work_site = $_POST['work_site'];
	$bureau = $_POST['bureau'];
	$division = $_POST['division'];
	$program = $_POST['program'];
	$unit_code = $_POST['unit_code'];
	//Prepared statement
	$query = "INSERT INTO COMPUTER (ASSIGNEE_IMAGE, ITEM_IMAGE, LOCATION_IMAGE, ASSIGNEE, ITEM_TYPE, SERIAL_NO, MODEL, MAKE, CPU_TYPE, CPU_SPEED, RAM, HARD_DRIVE, COMMENTS, STATUS, COUNTY_NO, MAP_LOCATION, WORK_SITE, BUREAU, DIVISION, PROGRAM, UNIT_CODE) VALUES(?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)";



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
									$statement->execute(array($response, $response2, $response3, $assignee, $item_type, $serial_no, $model, $make, $cpu_type, $cpu_speed, $ram, $hard_drive, $comments, $status, $county_no, $map_location, $work_site, $bureau, $division, $program, $unit_code));
								}
					     }
					}
			}
		}
	}

	
	echo $response;
	//close connection
		$database->close();



	// try
	// {
	// 	//make use of prepared statement to prevent sql injection
	// 	$stmt = $db->prepare("INSERT INTO COMPUTER (ASSIGNEE, ITEM_TYPE, SERIAL_NO ,MODEL, MAKE, CPU_TYPE, CPU_SPEED, RAM, HARD_DRIVE, COMMENTS, 
	// 	STATUS, COUNTY_NO, MAP_LOCATION, WORK_SITE, BUREAU,DIVISION,PROGRAM, UNIT_CODE, ACQ_DATE, LAST_MOVE_DATE) VALUES (:assignee,:itemtype,:model,:make,:cputype,:cpuspeed,:ram,:hardrive,:comments,:status,:countyno,:maplocation,:worksite,:bureau,:division,:program,:unitcode,:acqdate,:lastdatemove)");
	// 	//if-else statement in executing our prepared statement
	// 	if ($stmt->execute(array(':assignee' => $_POST['assignee'], ':itemtype' => $_POST['item_type'], ':serialno' => $_POST['serial_no'], 
	// 	':model' => $_POST['model'], ':make' => $_POST['make'], ':cputype' => $_POST['cpu_type'], ':cpuspeed' => $_POST['cpu_speed'], 
	// 	':ram' => $_POST['ram'], ':hardrive' => $_POST['hard_drive'], ':comments' => $_POST['comments'], 
	// 	':status' => $_POST['status'], ':countyno' => $_POST['county_no'], ':maplocation' => $_POST['map_location'], 
	// 	':worksite' => $_POST['work_site'], ':bureau' => $_POST['bureau'], ':division' => $_POST['division'], 
	// 	':program' => $_POST['program'], ':unitcode' => $_POST['unit_code'], ':acqdate' => $_POST['acq_date'], 
	// 	':lastdatemove' => $_POST['last_date_move']))){

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