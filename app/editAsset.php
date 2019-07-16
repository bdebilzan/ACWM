<?php

include "connection.php";
include "function.php";

 
$output = array('error' => false);

	$database = new Connection();
	$db = $database->open();

		$assigneeImage = upload_image();
		$assetImage = upload2_image();
		$locationImage = upload3_image();

if($assigneeImage != '' && $assetImage != '' &&  $locationImage != ''){

		$statement = $db->prepare(
			"UPDATE asset SET 
			LOCATION = :location, 
			ASSIGNEE = :assignee, 
			DESCRIPTION = :description, 
			MAKE = :make, 
			MODEL = :description, 
			SERIALNO = :serialNo, 
			COUNTYNO = :countyNo, 
			COST = :cost, 
			COMMENTS = :comments, 
			STATUS = :status, 
			CATEGORY = :category, 
			BINVENT = :binvent, 
			SUBLOCATION = :sublocations, 
			BUREAU = :bureau, 
			ASSET_IMAGE = :assetImage,
			LOCATION_IMAGE = :locationImage,
			ASSIGNEE_IMAGE = :assigneeImage
			WHERE GUID = :id
			"
		);
		$result = $statement->execute(
			array(
				':location'	=>	$_POST["location"],
				':assignee'	=>	$_POST["assignee"],
				':description'	=>	$_POST["description"],
				':make'	 =>	$_POST["make"],
				':model' =>	$_POST["model"],
				':serialNo'	 =>	$_POST["serialNo"],
				':countyNo' =>	$_POST["countyNo"],
				':cost'	=>	$_POST["cost"],
				':comments'	=>	$_POST["comments"],
				':status'	=>	$_POST["status"],
				':category'	=>	$_POST["category"],
				':binvent'	=>	$_POST["binvent"],
				':sublocations'	=>	$_POST["sublocations"],
				':bureau'	=>	$_POST["bureau"],
				':assetImage' =>	$assetImage,
				':assigneeImage' =>	$assigneeImage,
				':locationImage' =>	$locationImage,
				':id' =>	$_POST["id"]
			)
		);

} else if($assigneeImage != '' && $assetImage != '') {

	$statement = $db->prepare(
			"UPDATE asset SET 
			LOCATION = :location, 
			ASSIGNEE = :assignee, 
			DESCRIPTION = :description, 
			MAKE = :make, 
			MODEL = :description, 
			SERIALNO = :serialNo, 
			COUNTYNO = :countyNo, 
			COST = :cost, 
			COMMENTS = :comments, 
			STATUS = :status, 
			CATEGORY = :category, 
			BINVENT = :binvent, 
			SUBLOCATION = :sublocations, 
			BUREAU = :bureau, 
			ASSET_IMAGE = :assetImage,
			ASSIGNEE_IMAGE = :assigneeImage
			WHERE GUID = :id
			"
		);
		$result = $statement->execute(
			array(
				':location'	=>	$_POST["location"],
				':assignee'	=>	$_POST["assignee"],
				':description'	=>	$_POST["description"],
				':make'	 =>	$_POST["make"],
				':model' =>	$_POST["model"],
				':serialNo'	 =>	$_POST["serialNo"],
				':countyNo' =>	$_POST["countyNo"],
				':cost'	=>	$_POST["cost"],
				':comments'	=>	$_POST["comments"],
				':status'	=>	$_POST["status"],
				':category'	=>	$_POST["category"],
				':binvent'	=>	$_POST["binvent"],
				':sublocations'	=>	$_POST["sublocations"],
				':bureau'	=>	$_POST["bureau"],
				':assetImage' =>	$assetImage,
				':assigneeImage' =>	$assigneeImage,
				':id' =>	$_POST["id"]
			)
		);

} elseif ($assigneeImage != '' && $locationImage != '') {

	$statement = $db->prepare(
			"UPDATE asset SET 
			LOCATION = :location, 
			ASSIGNEE = :assignee, 
			DESCRIPTION = :description, 
			MAKE = :make, 
			MODEL = :description, 
			SERIALNO = :serialNo, 
			COUNTYNO = :countyNo, 
			COST = :cost, 
			COMMENTS = :comments, 
			STATUS = :status, 
			CATEGORY = :category, 
			BINVENT = :binvent, 
			SUBLOCATION = :sublocations, 
			BUREAU = :bureau, 
			LOCATION_IMAGE = :locationImage,
			ASSIGNEE_IMAGE = :assigneeImage
			WHERE GUID = :id
			"
		);
		$result = $statement->execute(
			array(
				':location'	=>	$_POST["location"],
				':assignee'	=>	$_POST["assignee"],
				':description'	=>	$_POST["description"],
				':make'	 =>	$_POST["make"],
				':model' =>	$_POST["model"],
				':serialNo'	 =>	$_POST["serialNo"],
				':countyNo' =>	$_POST["countyNo"],
				':cost'	=>	$_POST["cost"],
				':comments'	=>	$_POST["comments"],
				':status'	=>	$_POST["status"],
				':category'	=>	$_POST["category"],
				':binvent'	=>	$_POST["binvent"],
				':sublocations'	=>	$_POST["sublocations"],
				':bureau'	=>	$_POST["bureau"],
				':assigneeImage' =>	$assigneeImage,
				':locationImage' =>	$locationImage,
				':id' =>	$_POST["id"]
			)
		);
	
} else if ($assetImage != '' && $locationImage != ''){
	$statement = $db->prepare(
			"UPDATE asset SET 
			LOCATION = :location, 
			ASSIGNEE = :assignee, 
			DESCRIPTION = :description, 
			MAKE = :make, 
			MODEL = :description, 
			SERIALNO = :serialNo, 
			COUNTYNO = :countyNo, 
			COST = :cost, 
			COMMENTS = :comments, 
			STATUS = :status, 
			CATEGORY = :category, 
			BINVENT = :binvent, 
			SUBLOCATION = :sublocations, 
			BUREAU = :bureau, 
			ASSET_IMAGE = :assetImage,
			LOCATION_IMAGE = :locationImage
			WHERE GUID = :id
			"
		);
		$result = $statement->execute(
			array(
				':location'	=>	$_POST["location"],
				':assignee'	=>	$_POST["assignee"],
				':description'	=>	$_POST["description"],
				':make'	 =>	$_POST["make"],
				':model' =>	$_POST["model"],
				':serialNo'	 =>	$_POST["serialNo"],
				':countyNo' =>	$_POST["countyNo"],
				':cost'	=>	$_POST["cost"],
				':comments'	=>	$_POST["comments"],
				':status'	=>	$_POST["status"],
				':category'	=>	$_POST["category"],
				':binvent'	=>	$_POST["binvent"],
				':sublocations'	=>	$_POST["sublocations"],
				':bureau'	=>	$_POST["bureau"],
				':assetImage' =>	$assetImage,
				':locationImage' =>	$locationImage,
				':id' =>	$_POST["id"]
			)
		);

} else if ($assigneeImage != '') {

	$statement = $db->prepare(
			"UPDATE asset SET 
			LOCATION = :location, 
			ASSIGNEE = :assignee, 
			DESCRIPTION = :description, 
			MAKE = :make, 
			MODEL = :description, 
			SERIALNO = :serialNo, 
			COUNTYNO = :countyNo, 
			COST = :cost, 
			COMMENTS = :comments, 
			STATUS = :status, 
			CATEGORY = :category, 
			BINVENT = :binvent, 
			SUBLOCATION = :sublocations, 
			BUREAU = :bureau, 
			ASSIGNEE_IMAGE = :assigneeImage
			WHERE GUID = :id
			"
		);
		$result = $statement->execute(
			array(
				':location'	=>	$_POST["location"],
				':assignee'	=>	$_POST["assignee"],
				':description'	=>	$_POST["description"],
				':make'	 =>	$_POST["make"],
				':model' =>	$_POST["model"],
				':serialNo'	 =>	$_POST["serialNo"],
				':countyNo' =>	$_POST["countyNo"],
				':cost'	=>	$_POST["cost"],
				':comments'	=>	$_POST["comments"],
				':status'	=>	$_POST["status"],
				':category'	=>	$_POST["category"],
				':binvent'	=>	$_POST["binvent"],
				':sublocations'	=>	$_POST["sublocations"],
				':bureau'	=>	$_POST["bureau"],
				':assigneeImage' =>	$assigneeImage,
				':id' =>	$_POST["id"]
			)
		);

} else if ($assetImage != '') {

	 $statement = $db->prepare(
			"UPDATE asset SET 
			LOCATION = :location, 
			ASSIGNEE = :assignee, 
			DESCRIPTION = :description, 
			MAKE = :make, 
			MODEL = :description, 
			SERIALNO = :serialNo, 
			COUNTYNO = :countyNo, 
			COST = :cost, 
			COMMENTS = :comments, 
			STATUS = :status, 
			CATEGORY = :category, 
			BINVENT = :binvent, 
			SUBLOCATION = :sublocations, 
			BUREAU = :bureau, 
			ASSET_IMAGE = :assetImage
			WHERE GUID = :id
			"
		);
		$result = $statement->execute(
			array(
				':location'	=>	$_POST["location"],
				':assignee'	=>	$_POST["assignee"],
				':description'	=>	$_POST["description"],
				':make'	 =>	$_POST["make"],
				':model' =>	$_POST["model"],
				':serialNo'	 =>	$_POST["serialNo"],
				':countyNo' =>	$_POST["countyNo"],
				':cost'	=>	$_POST["cost"],
				':comments'	=>	$_POST["comments"],
				':status'	=>	$_POST["status"],
				':category'	=>	$_POST["category"],
				':binvent'	=>	$_POST["binvent"],
				':sublocations'	=>	$_POST["sublocations"],
				':bureau'	=>	$_POST["bureau"],
				':assetImage' =>	$assetImage,
				':id' =>	$_POST["id"]
			)
		);

} elseif ($locationImage != '') {

	$statement = $db->prepare(
			"UPDATE asset SET 
			LOCATION = :location, 
			ASSIGNEE = :assignee, 
			DESCRIPTION = :description, 
			MAKE = :make, 
			MODEL = :description, 
			SERIALNO = :serialNo, 
			COUNTYNO = :countyNo, 
			COST = :cost, 
			COMMENTS = :comments, 
			STATUS = :status, 
			CATEGORY = :category, 
			BINVENT = :binvent, 
			SUBLOCATION = :sublocations, 
			BUREAU = :bureau, 
			LOCATION_IMAGE = :locationImage
			WHERE GUID = :id
			"
		);
		$result = $statement->execute(
			array(
				':location'	=>	$_POST["location"],
				':assignee'	=>	$_POST["assignee"],
				':description'	=>	$_POST["description"],
				':make'	 =>	$_POST["make"],
				':model' =>	$_POST["model"],
				':serialNo'	 =>	$_POST["serialNo"],
				':countyNo' =>	$_POST["countyNo"],
				':cost'	=>	$_POST["cost"],
				':comments'	=>	$_POST["comments"],
				':status'	=>	$_POST["status"],
				':category'	=>	$_POST["category"],
				':binvent'	=>	$_POST["binvent"],
				':sublocations'	=>	$_POST["sublocations"],
				':bureau'	=>	$_POST["bureau"],
				':locationImage' =>	$locationImage,
				':id' =>	$_POST["id"]
			)
		);

} else {

			$statement = $db->prepare(
			"UPDATE asset SET 
			LOCATION = :location, 
			ASSIGNEE = :assignee, 
			DESCRIPTION = :description, 
			MAKE = :make, 
			MODEL = :description, 
			SERIALNO = :serialNo, 
			COUNTYNO = :countyNo, 
			COST = :cost, 
			COMMENTS = :comments, 
			STATUS = :status, 
			CATEGORY = :category, 
			BINVENT = :binvent, 
			SUBLOCATION = :sublocations, 
			BUREAU = :bureau 
			WHERE GUID = :id
			"
		);
		$result = $statement->execute(
			array(
				':location'	=>	$_POST["location"],
				':assignee'	=>	$_POST["assignee"],
				':description'	=>	$_POST["description"],
				':make'	 =>	$_POST["make"],
				':model' =>	$_POST["model"],
				':serialNo'	 =>	$_POST["serialNo"],
				':countyNo' =>	$_POST["countyNo"],
				':cost'	=>	$_POST["cost"],
				':comments'	=>	$_POST["comments"],
				':status'	=>	$_POST["status"],
				':category'	=>	$_POST["category"],
				':binvent'	=>	$_POST["binvent"],
				':sublocations'	=>	$_POST["sublocations"],
				':bureau'	=>	$_POST["bureau"],
				':id' =>	$_POST["id"]
			)
		);


}

		$database->close();
	

	
?>