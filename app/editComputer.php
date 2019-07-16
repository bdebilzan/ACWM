<?php

include "connection.php";
include "function.php";
$database = new Connection();
$db = $database->open();
 
$output = array('error' => false);

	// $database = new Connection();
	// $db = $database->open();

 $assigneeImage = upload_image();
 $itemImage = upload2_image();
 $locationImage = upload3_image();
// $assigneeImage;
//  $itemImage;
//  $locationImage;
if ( $assigneeImage != '' && $itemImage != '' &&  $locationImage != ''){

	$test = $_POST['tableHistory'];

	  
		$statement = $db->prepare(
			"UPDATE COMPUTER SET
					ASSIGNEE = :assignee, 
					ITEM_TYPE = :item_type, 
					SERIAL_NO = :serial_no,
					MODEL = :model, 
					MAKE = :make,  
					CPU_TYPE = :cpu_type, 
					CPU_SPEED = :cpu_speed, 
					RAM = :ram, 
					HARD_DRIVE = :hard_drive, 
					COMMENTS = :comments, 
					STATUS = :status, 
					COUNTY_NO = :county_no,
					MAP_LOCATION = :map_location, 
					WORK_SITE = :work_site, 
					BUREAU = :bureau, 
					DIVISION = :division, 
					PROGRAM = :program, 
					UNIT_CODE = :unit_code, 
					ASSIGNEE_IMAGE = :assigneeImage, 
					ITEM_IMAGE = :itemImage, 
					LOCATION_IMAGE = :locationImage
			WHERE GUID = :id
			"
		);
		$result = $statement->execute(
			array(
				  
				  ':assignee'   => 	$_POST["assignee"],
				  ':item_type'  => 	$_POST["item_type"],
				  ':serial_no'   =>    $_POST["serial_no"],
				  ':model'      => 	$_POST["model"],
				  ':make'         => 	$_POST["make"],
				  ':cpu_type'     => 	$_POST["cpu_type"],
				  ':cpu_speed'    => 	$_POST["cpu_speed"],
				  ':ram'         => 	$_POST["ram"],
				  ':hard_drive'  =>    $_POST["hard_drive"],
				  ':comments'    => 	$_POST["comments"],
				  ':status'      => 	$_POST["status"],
		  	      ':county_no'    => 	$_POST["county_no"],
				  ':map_location' => 	$_POST["map_location"],
				  ':work_site'    => 	$_POST['work_site'], 	
				  ':bureau'       => 	$_POST["bureau"],
				  ':division'    => 	$_POST["division"],
				  ':program'     => 	$_POST["program"],
				  ':unit_code'   => 	$_POST["unit_code"],
				 ':assigneeImage'  =>	$assigneeImage,
				 ':itemImage' 	  =>	$itemImage,
				 ':locationImage' =>	$locationImage,
				 ':id' 			  =>	$_POST["id"]
			)
		); 

	}  else if($assigneeImage != '' && $itemImage != '') {
	$statement = $db->prepare(
			"UPDATE COMPUTER SET
					ASSIGNEE = :assignee, 
					ITEM_TYPE = :item_type, 
					SERIAL_NO = :serial_no,
					MODEL = :model, 
					MAKE = :make,  
					CPU_TYPE = :cpu_type, 
					CPU_SPEED = :cpu_speed, 
					RAM = :ram, 
					HARD_DRIVE = :hard_drive, 
					COMMENTS = :comments, 
					STATUS = :status, 
					COUNTY_NO = :county_no,
					MAP_LOCATION = :map_location, 
					WORK_SITE = :work_site, 
					BUREAU = :bureau, 
					DIVISION = :division, 
					PROGRAM = :program, 
					UNIT_CODE = :unit_code, 
					ASSIGNEE_IMAGE = :assigneeImage, 
					ITEM_IMAGE = :itemImage 
					-- LOCATION_IMAGE = :locationImage
			WHERE GUID = :id
			"
		);
		$result = $statement->execute(
			array(
				  
				  ':assignee'   => 	$_POST["assignee"],
				  ':item_type'  => 	$_POST["item_type"],
				  ':serial_no'   =>    $_POST["serial_no"],
				  ':model'      => 	$_POST["model"],
				  ':make'         => 	$_POST["make"],
				  ':cpu_type'     => 	$_POST["cpu_type"],
				  ':cpu_speed'    => 	$_POST["cpu_speed"],
				  ':ram'         => 	$_POST["ram"],
				  ':hard_drive'  =>    $_POST["hard_drive"],
				  ':comments'    => 	$_POST["comments"],
				  ':status'      => 	$_POST["status"],
		  	      ':county_no'    => 	$_POST["county_no"],
				  ':map_location' => 	$_POST["map_location"],
				  ':work_site'    => 	$_POST['work_site'], 	
				  ':bureau'       => 	$_POST["bureau"],
				  ':division'    => 	$_POST["division"],
				  ':program'     => 	$_POST["program"],
				  ':unit_code'   => 	$_POST["unit_code"],
				 ':assigneeImage'  =>	$assigneeImage,
				 ':itemImage' 	  =>	$itemImage,
				  // ':locationImage' =>	$locationImage,
				 ':id' 			  =>	$_POST["id"]
			)
		);

} else if($assigneeImage != '' && $locationImage != '') {
	$statement = $db->prepare(
			"UPDATE COMPUTER SET
					ASSIGNEE = :assignee, 
					ITEM_TYPE = :item_type, 
					SERIAL_NO = :serial_no,
					MODEL = :model, 
					MAKE = :make,  
					CPU_TYPE = :cpu_type, 
					CPU_SPEED = :cpu_speed, 
					RAM = :ram, 
					HARD_DRIVE = :hard_drive, 
					COMMENTS = :comments, 
					STATUS = :status, 
					COUNTY_NO = :county_no,
					MAP_LOCATION = :map_location, 
					WORK_SITE = :work_site, 
					BUREAU = :bureau, 
					DIVISION = :division, 
					PROGRAM = :program, 
					UNIT_CODE = :unit_code, 
					ASSIGNEE_IMAGE = :assigneeImage 
					-- ITEM_IMAGE = :itemImage 
					LOCATION_IMAGE = :locationImage
			WHERE GUID = :id
			"
		);
		$result = $statement->execute(
			array(
				  
				  ':assignee'   => 	$_POST["assignee"],
				  ':item_type'  => 	$_POST["item_type"],
				  ':serial_no'   =>    $_POST["serial_no"],
				  ':model'      => 	$_POST["model"],
				  ':make'         => 	$_POST["make"],
				  ':cpu_type'     => 	$_POST["cpu_type"],
				  ':cpu_speed'    => 	$_POST["cpu_speed"],
				  ':ram'         => 	$_POST["ram"],
				  ':hard_drive'  =>    $_POST["hard_drive"],
				  ':comments'    => 	$_POST["comments"],
				  ':status'      => 	$_POST["status"],
		  	      ':county_no'    => 	$_POST["county_no"],
				  ':map_location' => 	$_POST["map_location"],
				  ':work_site'    => 	$_POST['work_site'], 	
				  ':bureau'       => 	$_POST["bureau"],
				  ':division'    => 	$_POST["division"],
				  ':program'     => 	$_POST["program"],
				  ':unit_code'   => 	$_POST["unit_code"],
				 ':assigneeImage'  =>	$assigneeImage,
				 // ':itemImage' 	  =>	$itemImage,
				  ':locationImage' =>	$locationImage,
				 ':id' 			  =>	$_POST["id"]
			)
		);

} else if($itemImage != '' && $locationImage != '') {
	$statement = $db->prepare(
			"UPDATE COMPUTER SET
					ASSIGNEE = :assignee, 
					ITEM_TYPE = :item_type, 
					SERIAL_NO = :serial_no,
					MODEL = :model, 
					MAKE = :make,  
					CPU_TYPE = :cpu_type, 
					CPU_SPEED = :cpu_speed, 
					RAM = :ram, 
					HARD_DRIVE = :hard_drive, 
					COMMENTS = :comments, 
					STATUS = :status, 
					COUNTY_NO = :county_no,
					MAP_LOCATION = :map_location, 
					WORK_SITE = :work_site, 
					BUREAU = :bureau, 
					DIVISION = :division, 
					PROGRAM = :program, 
					UNIT_CODE = :unit_code, 
					-- ASSIGNEE_IMAGE = :assigneeImage 
					ITEM_IMAGE = :itemImage, 
					LOCATION_IMAGE = :locationImage
			WHERE GUID = :id
			"
		);
		$result = $statement->execute(
			array(
				  
				  ':assignee'   => 	$_POST["assignee"],
				  ':item_type'  => 	$_POST["item_type"],
				  ':serial_no'   =>    $_POST["serial_no"],
				  ':model'      => 	$_POST["model"],
				  ':make'         => 	$_POST["make"],
				  ':cpu_type'     => 	$_POST["cpu_type"],
				  ':cpu_speed'    => 	$_POST["cpu_speed"],
				  ':ram'         => 	$_POST["ram"],
				  ':hard_drive'  =>    $_POST["hard_drive"],
				  ':comments'    => 	$_POST["comments"],
				  ':status'      => 	$_POST["status"],
		  	      ':county_no'    => 	$_POST["county_no"],
				  ':map_location' => 	$_POST["map_location"],
				  ':work_site'    => 	$_POST['work_site'], 	
				  ':bureau'       => 	$_POST["bureau"],
				  ':division'    => 	$_POST["division"],
				  ':program'     => 	$_POST["program"],
				  ':unit_code'   => 	$_POST["unit_code"],
				 // ':assigneeImage'  =>	$assigneeImage,
				 ':itemImage' 	  =>	$itemImage,
				  ':locationImage' =>	$locationImage,
				 ':id' 			  =>	$_POST["id"]
			)
		);

} else if($assigneeImage != ''){

				$statement = $db->prepare(
			"UPDATE COMPUTER SET
					ASSIGNEE = :assignee, 
					ITEM_TYPE = :item_type, 
					SERIAL_NO = :serial_no,
					MODEL = :model, 
					MAKE = :make,  
					CPU_TYPE = :cpu_type, 
					CPU_SPEED = :cpu_speed, 
					RAM = :ram, 
					HARD_DRIVE = :hard_drive, 
					COMMENTS = :comments, 
					STATUS = :status, 
					COUNTY_NO = :county_no,
					MAP_LOCATION = :map_location, 
					WORK_SITE = :work_site, 
					BUREAU = :bureau, 
					DIVISION = :division, 
					PROGRAM = :program, 
					UNIT_CODE = :unit_code, 
					ASSIGNEE_IMAGE = :assigneeImage 
					-- ITEM_IMAGE = :itemImage 
					-- LOCATION_IMAGE = :locationImage
			WHERE GUID = :id
			"
		);
		$result = $statement->execute(
			array(
				  
				  ':assignee'   => 	$_POST["assignee"],
				  ':item_type'  => 	$_POST["item_type"],
				  ':serial_no'   =>    $_POST["serial_no"],
				  ':model'      => 	$_POST["model"],
				  ':make'         => 	$_POST["make"],
				  ':cpu_type'     => 	$_POST["cpu_type"],
				  ':cpu_speed'    => 	$_POST["cpu_speed"],
				  ':ram'         => 	$_POST["ram"],
				  ':hard_drive'  =>    $_POST["hard_drive"],
				  ':comments'    => 	$_POST["comments"],
				  ':status'      => 	$_POST["status"],
		  	      ':county_no'    => 	$_POST["county_no"],
				  ':map_location' => 	$_POST["map_location"],
				  ':work_site'    => 	$_POST['work_site'], 	
				  ':bureau'       => 	$_POST["bureau"],
				  ':division'    => 	$_POST["division"],
				  ':program'     => 	$_POST["program"],
				  ':unit_code'   => 	$_POST["unit_code"],
				 ':assigneeImage'  =>	$assigneeImage,
				 // ':itemImage' 	  =>	$itemImage,
				 // ':locationImage' =>	$locationImage,
				 ':id' 			  =>	$_POST["id"]
			)
		); 


	} else if ($itemImage != '') {
		
			$statement = $db->prepare(
			"UPDATE COMPUTER SET
					ASSIGNEE = :assignee, 
					ITEM_TYPE = :item_type, 
					SERIAL_NO = :serial_no,
					MODEL = :model, 
					MAKE = :make,  
					CPU_TYPE = :cpu_type, 
					CPU_SPEED = :cpu_speed, 
					RAM = :ram, 
					HARD_DRIVE = :hard_drive, 
					COMMENTS = :comments, 
					STATUS = :status, 
					COUNTY_NO = :county_no,
					MAP_LOCATION = :map_location, 
					WORK_SITE = :work_site, 
					BUREAU = :bureau, 
					DIVISION = :division, 
					PROGRAM = :program, 
					UNIT_CODE = :unit_code, 
					-- ASSIGNEE_IMAGE = :assigneeImage 
					ITEM_IMAGE = :itemImage 
					-- LOCATION_IMAGE = :locationImage
			WHERE GUID = :id
			"
		);
		$result = $statement->execute(
			array(
				  
				  ':assignee'   => 	$_POST["assignee"],
				  ':item_type'  => 	$_POST["item_type"],
				  ':serial_no'   =>    $_POST["serial_no"],
				  ':model'      => 	$_POST["model"],
				  ':make'         => 	$_POST["make"],
				  ':cpu_type'     => 	$_POST["cpu_type"],
				  ':cpu_speed'    => 	$_POST["cpu_speed"],
				  ':ram'         => 	$_POST["ram"],
				  ':hard_drive'  =>    $_POST["hard_drive"],
				  ':comments'    => 	$_POST["comments"],
				  ':status'      => 	$_POST["status"],
		  	      ':county_no'    => 	$_POST["county_no"],
				  ':map_location' => 	$_POST["map_location"],
				  ':work_site'    => 	$_POST['work_site'], 	
				  ':bureau'       => 	$_POST["bureau"],
				  ':division'    => 	$_POST["division"],
				  ':program'     => 	$_POST["program"],
				  ':unit_code'   => 	$_POST["unit_code"],
				 // ':assigneeImage'  =>	$assigneeImage,
				 ':itemImage' 	  =>	$itemImage,
				 // ':locationImage' =>	$locationImage,
				 ':id' 			  =>	$_POST["id"]
			)
		);

} else if ($locationImage != '') {
	$statement = $db->prepare(
			"UPDATE COMPUTER SET
					ASSIGNEE = :assignee, 
					ITEM_TYPE = :item_type, 
					SERIAL_NO = :serial_no,
					MODEL = :model, 
					MAKE = :make,  
					CPU_TYPE = :cpu_type, 
					CPU_SPEED = :cpu_speed, 
					RAM = :ram, 
					HARD_DRIVE = :hard_drive, 
					COMMENTS = :comments, 
					STATUS = :status, 
					COUNTY_NO = :county_no,
					MAP_LOCATION = :map_location, 
					WORK_SITE = :work_site, 
					BUREAU = :bureau, 
					DIVISION = :division, 
					PROGRAM = :program, 
					UNIT_CODE = :unit_code, 
					-- ASSIGNEE_IMAGE = :assigneeImage 
					-- ITEM_IMAGE = :itemImage 
					LOCATION_IMAGE = :locationImage
			WHERE GUID = :id
			"
		);
		$result = $statement->execute(
			array(
				  
				  ':assignee'   => 	$_POST["assignee"],
				  ':item_type'  => 	$_POST["item_type"],
				  ':serial_no'   =>    $_POST["serial_no"],
				  ':model'      => 	$_POST["model"],
				  ':make'         => 	$_POST["make"],
				  ':cpu_type'     => 	$_POST["cpu_type"],
				  ':cpu_speed'    => 	$_POST["cpu_speed"],
				  ':ram'         => 	$_POST["ram"],
				  ':hard_drive'  =>    $_POST["hard_drive"],
				  ':comments'    => 	$_POST["comments"],
				  ':status'      => 	$_POST["status"],
		  	      ':county_no'    => 	$_POST["county_no"],
				  ':map_location' => 	$_POST["map_location"],
				  ':work_site'    => 	$_POST['work_site'], 	
				  ':bureau'       => 	$_POST["bureau"],
				  ':division'    => 	$_POST["division"],
				  ':program'     => 	$_POST["program"],
				  ':unit_code'   => 	$_POST["unit_code"],
				 // ':assigneeImage'  =>	$assigneeImage,
				 // ':itemImage' 	  =>	$itemImage,
				  ':locationImage' =>	$locationImage,
				 ':id' 			  =>	$_POST["id"]
			)
		);

} else {

				$statement = $db->prepare(
			"UPDATE COMPUTER SET
					ASSIGNEE = :assignee, 
					ITEM_TYPE = :item_type, 
					SERIAL_NO = :serial_no,
					MODEL = :model, 
					MAKE = :make,  
					CPU_TYPE = :cpu_type, 
					CPU_SPEED = :cpu_speed, 
					RAM = :ram, 
					HARD_DRIVE = :hard_drive, 
					COMMENTS = :comments, 
					STATUS = :status, 
					COUNTY_NO = :county_no,
					MAP_LOCATION = :map_location, 
					WORK_SITE = :work_site, 
					BUREAU = :bureau, 
					DIVISION = :division, 
					PROGRAM = :program, 
					UNIT_CODE = :unit_code 
					-- ASSIGNEE_IMAGE = :assigneeImage, 
					-- ITEM_IMAGE = :itemImage, 
					-- LOCATION_IMAGE = :locationImage
			WHERE GUID = :id
			"
		);
		$result = $statement->execute(
			array(
				  
				  ':assignee'   => 	$_POST["assignee"],
				  ':item_type'  => 	$_POST["item_type"],
				  ':serial_no'   =>    $_POST["serial_no"],
				  ':model'      => 	$_POST["model"],
				  ':make'         => 	$_POST["make"],
				  ':cpu_type'     => 	$_POST["cpu_type"],
				  ':cpu_speed'    => 	$_POST["cpu_speed"],
				  ':ram'         => 	$_POST["ram"],
				  ':hard_drive'  =>    $_POST["hard_drive"],
				  ':comments'    => 	$_POST["comments"],
				  ':status'      => 	$_POST["status"],
		  	      ':county_no'    => 	$_POST["county_no"],
				  ':map_location' => 	$_POST["map_location"],
				  ':work_site'    => 	$_POST['work_site'], 	
				  ':bureau'       => 	$_POST["bureau"],
				  ':division'    => 	$_POST["division"],
				  ':program'     => 	$_POST["program"],
				  ':unit_code'   => 	$_POST["unit_code"],
				 // ':assigneeImage'  =>	$assigneeImage,
				 // ':itemImage' 	  =>	$itemImage,
				 // ':locationImage' =>	$locationImage,
				 ':id' 			  =>	$_POST["id"]
			)
		); 

	}


		$database->close();

	
?>