<?php

include "connection.php";
include "function.php";
$database = new Connection();
$db = $database->open();
 
$output = array('error' => false);

	
	   $employeeImage = upload_image();
	   $vehicleImage = upload2_image();
	   $locationImage = upload3_image();



if ($employeeImage != '' && $vehicleImage != '' &&  $locationImage != ''){

		$statement = $db->prepare(
			"UPDATE vehicle 
			SET VNO = :vno, ASSIGNEDTO = :assigned, LICENSE = :license, MAKE = :make, MODEL = :model, YEAR = :year, HOUSED = :housed, VIN = :vin, UNIT = :unit, DESCRIPTION = :description, BUREAU = :bureau, FUNDINGORG = :funding,  EMPLOYEE_IMAGE =:employeeImage, VEHICLE_IMAGE = :vehicleImage, LOCATION_IMAGE = :locationImage WHERE GUID = :id
			"
		);
		$result = $statement->execute(
			array(
				':vno'	=>	$_POST["vno"],
				':assigned'	=>	$_POST["assigned"],
				':license'	=>	$_POST["license"],
				':make'	 =>	$_POST["make"],
				':model' =>	$_POST["model"],
				':year'	 =>	$_POST["year"],
				':housed' =>	$_POST["housed"],
				':vin'	=>	$_POST["vin"],
				':unit'	=>	$_POST["unit"],
				':description'	=>	$_POST["description"],
				':bureau'	=>	$_POST["bureau"],
				':funding'	=>	$_POST["funding"],
				':employeeImage' =>	$employeeImage,
				':vehicleImage' =>	$vehicleImage,
				':locationImage' =>	$locationImage,
				':id' =>	$_POST["id"]
			)
		);


}  else if($employeeImage != '' && $vehicleImage != '' ) {


		$statement = $db->prepare(
			"UPDATE vehicle 
			SET VNO = :vno, ASSIGNEDTO = :assigned, LICENSE = :license, MAKE = :make, MODEL = :model, YEAR = :year, HOUSED = :housed, VIN = :vin, UNIT = :unit, DESCRIPTION = :description, BUREAU = :bureau, FUNDINGORG = :funding, VEHICLE_IMAGE = :vehicleImage, EMPLOYEE_IMAGE = :employeeImage WHERE GUID = :id
			"
		);
		$result = $statement->execute(
			array(
				':vno'	=>	$_POST["vno"],
				':assigned'	=>	$_POST["assigned"],
				':license'	=>	$_POST["license"],
				':make'	 =>	$_POST["make"],
				':model' =>	$_POST["model"],
				':year'	 =>	$_POST["year"],
				':housed' =>	$_POST["housed"],
				':vin'	=>	$_POST["vin"],
				':unit'	=>	$_POST["unit"],
				':description'	=>	$_POST["description"],
				':bureau'	=>	$_POST["bureau"],
				':funding'	=>	$_POST["funding"],
				':vehicleImage' =>	$vehicleImage,
				':employeeImage' =>	$employeeImage,
				
				':id' =>	$_POST["id"]
			)
		);
	

} else if($employeeImage != '' && $locationImage != '') {
			$statement = $db->prepare(
			"UPDATE vehicle 
			SET VNO = :vno, ASSIGNEDTO = :assigned, LICENSE = :license, MAKE = :make, MODEL = :model, YEAR = :year, HOUSED = :housed, VIN = :vin, UNIT = :unit, DESCRIPTION = :description, BUREAU = :bureau, FUNDINGORG = :funding, EMPLOYEE_IMAGE = :employeeImage, LOCATION_IMAGE = :locationImage WHERE GUID = :id
			"
		);
		$result = $statement->execute(
			array(
				':vno'	=>	$_POST["vno"],
				':assigned'	=>	$_POST["assigned"],
				':license'	=>	$_POST["license"],
				':make'	 =>	$_POST["make"],
				':model' =>	$_POST["model"],
				':year'	 =>	$_POST["year"],
				':housed' =>	$_POST["housed"],
				':vin'	=>	$_POST["vin"],
				':unit'	=>	$_POST["unit"],
				':description'	=>	$_POST["description"],
				':bureau'	=>	$_POST["bureau"],
				':funding'	=>	$_POST["funding"],
				':employeeImage' =>	$employeeImage,
				':locationImage' =>	$locationImage,
				':id' =>	$_POST["id"]
			)
		);

} else if($vehicleImage != '' && $locationImage != '') {

	$statement = $db->prepare(
			"UPDATE vehicle 
			SET VNO = :vno, ASSIGNEDTO = :assigned, LICENSE = :license, MAKE = :make, MODEL = :model, YEAR = :year, HOUSED = :housed, VIN = :vin, UNIT = :unit, DESCRIPTION = :description, BUREAU = :bureau, FUNDINGORG = :funding, VEHICLE_IMAGE = :vehicleImage, LOCATION_IMAGE =:locationImage WHERE GUID = :id
			"
		);
		$result = $statement->execute(
			array(
				':vno'	=>	$_POST["vno"],
				':assigned'	=>	$_POST["assigned"],
				':license'	=>	$_POST["license"],
				':make'	 =>	$_POST["make"],
				':model' =>	$_POST["model"],
				':year'	 =>	$_POST["year"],
				':housed' =>	$_POST["housed"],
				':vin'	=>	$_POST["vin"],
				':unit'	=>	$_POST["unit"],
				':description'	=>	$_POST["description"],
				':bureau'	=>	$_POST["bureau"],
				':funding'	=>	$_POST["funding"],
				':vehicleImage' =>	$vehicleImage,
				':locationImage' =>	$locationImage,
				':id' =>	$_POST["id"]
			)
		);
	

} else if($employeeImage != ''){

	$statement = $db->prepare(
			"UPDATE vehicle 
			SET VNO = :vno, ASSIGNEDTO = :assigned, LICENSE = :license, MAKE = :make, MODEL = :model, YEAR = :year, HOUSED = :housed, VIN = :vin, UNIT = :unit, DESCRIPTION = :description, BUREAU = :bureau, FUNDINGORG = :funding, EMPLOYEE_IMAGE = :employeeImage WHERE GUID = :id
			"
		);
		$result = $statement->execute(
			array(
				':vno'	=>	$_POST["vno"],
				':assigned'	=>	$_POST["assigned"],
				':license'	=>	$_POST["license"],
				':make'	 =>	$_POST["make"],
				':model' =>	$_POST["model"],
				':year'	 =>	$_POST["year"],
				':housed' =>	$_POST["housed"],
				':vin'	=>	$_POST["vin"],
				':unit'	=>	$_POST["unit"],
				':description'	=>	$_POST["description"],
				':bureau'	=>	$_POST["bureau"],
				':funding'	=>	$_POST["funding"],
				':employeeImage' =>	$employeeImage,
				':id' =>	$_POST["id"]
			)
		);
		

} else if ($vehicleImage != '') {

	$statement = $db->prepare(
			"UPDATE vehicle 
			SET VNO = :vno, ASSIGNEDTO = :assigned, LICENSE = :license, MAKE = :make, MODEL = :model, YEAR = :year, HOUSED = :housed, VIN = :vin, UNIT = :unit, DESCRIPTION = :description, BUREAU = :bureau, FUNDINGORG = :funding, VEHICLE_IMAGE = :vehicleImage WHERE GUID = :id
			"
		);
		$result = $statement->execute(
			array(
				':vno'	=>	$_POST["vno"],
				':assigned'	=>	$_POST["assigned"],
				':license'	=>	$_POST["license"],
				':make'	 =>	$_POST["make"],
				':model' =>	$_POST["model"],
				':year'	 =>	$_POST["year"],
				':housed' =>	$_POST["housed"],
				':vin'	=>	$_POST["vin"],
				':unit'	=>	$_POST["unit"],
				':description'	=>	$_POST["description"],
				':bureau'	=>	$_POST["bureau"],
				':funding'	=>	$_POST["funding"],
				':vehicleImage' =>	$vehicleImage,
				':id' =>	$_POST["id"]
			)
		);
		
		

} else if ($locationImage != '') {

	$statement = $db->prepare(
			"UPDATE vehicle 
			SET VNO = :vno, ASSIGNEDTO = :assigned, LICENSE = :license, MAKE = :make, MODEL = :model, YEAR = :year, HOUSED = :housed, VIN = :vin, UNIT = :unit, DESCRIPTION = :description, BUREAU = :bureau, FUNDINGORG = :funding, LOCATION_IMAGE = :locationImage WHERE GUID = :id
			"
		);
		$result = $statement->execute(
			array(
				':vno'	=>	$_POST["vno"],
				':assigned'	=>	$_POST["assigned"],
				':license'	=>	$_POST["license"],
				':make'	 =>	$_POST["make"],
				':model' =>	$_POST["model"],
				':year'	 =>	$_POST["year"],
				':housed' =>	$_POST["housed"],
				':vin'	=>	$_POST["vin"],
				':unit'	=>	$_POST["unit"],
				':description'	=>	$_POST["description"],
				':bureau'	=>	$_POST["bureau"],
				':funding'	=>	$_POST["funding"],
				':locationImage' =>	$locationImage,
				':id' =>	$_POST["id"]
			)
		);


} else {
$statement = $db->prepare(
			"UPDATE vehicle 
			SET VNO = :vno, ASSIGNEDTO = :assigned, LICENSE = :license, MAKE = :make, MODEL = :model, YEAR = :year, HOUSED = :housed, VIN = :vin, UNIT = :unit, DESCRIPTION = :description, BUREAU = :bureau, FUNDINGORG = :funding WHERE GUID = :id
			"
		);
		$result = $statement->execute(
			array(
				':vno'	=>	$_POST["vno"],
				':assigned'	=>	$_POST["assigned"],
				':license'	=>	$_POST["license"],
				':make'	 =>	$_POST["make"],
				':model' =>	$_POST["model"],
				':year'	 =>	$_POST["year"],
				':housed' =>	$_POST["housed"],
				':vin'	=>	$_POST["vin"],
				':unit'	=>	$_POST["unit"],
				':description'	=>	$_POST["description"],
				':bureau'	=>	$_POST["bureau"],
				':funding'	=>	$_POST["funding"],
				':id' =>	$_POST["id"]
			)
		);

	}


		$database->close();

	
?>