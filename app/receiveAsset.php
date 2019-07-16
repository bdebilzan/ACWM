<?php
	include_once('connection.php');

	$output = array('error' => false);

	$database = new Connection();
	$db = $database->open();
    try
	{
		//make use of prepared statement to prevent sql injection
		$stmt = $db->prepare("INSERT INTO ASSET (LOCATION, ASSIGNEE, DESCRIPTION, MAKE, MODEL, SERIALNO, COUNTYNO, COST, COMMENTS, STATUS, CATEGORY, BINVENT, SUBLOCATION, BUREAU) 
		VALUES (:location, :assignee, :description, :make, :model, :s1, :countyNo, :cost, :comments, :status, :category, :binvent, :sublocation, :bureau)");
		//if-else statement in executing our prepared statement
		if ($stmt->execute(array(':location' => $_POST['location'], ':assignee' => $_POST['assignee'], ':description' => $_POST['description'], ':make' => $_POST['make'], 
		':model' => $_POST['model'], ':s1' => $_POST['s1'], ':countyNo' => $_POST['countyNo'], ':cost' => $_POST['cost'], ':comments' => $_POST['comments'], 
		':status' => $_POST['status'], ':category' => $_POST['category'], ':binvent' => $_POST['binvent'], ':sublocation' => $_POST['sublocation'], ':bureau' => $_POST['bureau'])) )
		{
			$output['message'] = 'asset added successfully';
		}
		else
		{
			$output['error'] = true;
			$output['message'] = 'Something went wrong. Cannot add asset';
		} 
	}
    catch(PDOException $e)
    {
		$output['error'] = true;
 		$output['message'] = $e->getMessage();
	}

	if($_POST['s2'] != null)
	{
		try
		{
			//make use of prepared statement to prevent sql injection
			$stmt = $db->prepare("INSERT INTO ASSET (LOCATION, ASSIGNEE, DESCRIPTION, MAKE, MODEL, SERIALNO, COUNTYNO, COST, COMMENTS, STATUS, CATEGORY, BINVENT, SUBLOCATION, BUREAU) 
			VALUES (:location, :assignee, :description, :make, :model, :s2, :countyNo, :cost, :comments, :status, :category, :binvent, :sublocation, :bureau)");
			//if-else statement in executing our prepared statement
			if ($stmt->execute(array(':location' => $_POST['location'], ':assignee' => $_POST['assignee'], ':description' => $_POST['description'], ':make' => $_POST['make'], 
			':model' => $_POST['model'], ':s2' => $_POST['s2'], ':countyNo' => $_POST['countyNo'], ':cost' => $_POST['cost'], ':comments' => $_POST['comments'], 
			':status' => $_POST['status'], ':category' => $_POST['category'], ':binvent' => $_POST['binvent'], ':sublocation' => $_POST['sublocation'], ':bureau' => $_POST['bureau'])) )
			{
				$output['message'] = 'asset added successfully';
			}
			else
			{
				$output['error'] = true;
				$output['message'] = 'Something went wrong. Cannot add asset';
			} 
		}
		catch(PDOException $e)
		{
			$output['error'] = true;
			$output['message'] = $e->getMessage();
		}
	}

	if($_POST['s3'] != null)
	{
		try
		{
			//make use of prepared statement to prevent sql injection
			$stmt = $db->prepare("INSERT INTO ASSET (LOCATION, ASSIGNEE, DESCRIPTION, MAKE, MODEL, SERIALNO, COUNTYNO, COST, COMMENTS, STATUS, CATEGORY, BINVENT, SUBLOCATION, BUREAU) 
			VALUES (:location, :assignee, :description, :make, :model, :s3, :countyNo, :cost, :comments, :status, :category, :binvent, :sublocation, :bureau)");
			//if-else statement in executing our prepared statement
			if ($stmt->execute(array(':location' => $_POST['location'], ':assignee' => $_POST['assignee'], ':description' => $_POST['description'], ':make' => $_POST['make'], 
			':model' => $_POST['model'], ':s3' => $_POST['s3'], ':countyNo' => $_POST['countyNo'], ':cost' => $_POST['cost'], ':comments' => $_POST['comments'], 
			':status' => $_POST['status'], ':category' => $_POST['category'], ':binvent' => $_POST['binvent'], ':sublocation' => $_POST['sublocation'], ':bureau' => $_POST['bureau'])) )
			{
				$output['message'] = 'asset added successfully';
			}
			else
			{
				$output['error'] = true;
				$output['message'] = 'Something went wrong. Cannot add asset';
			} 
		}
		catch(PDOException $e)
		{
			$output['error'] = true;
			$output['message'] = $e->getMessage();
		}
	}

	if($_POST['s4'] != null)
	{
		try
		{
			//make use of prepared statement to prevent sql injection
			$stmt = $db->prepare("INSERT INTO ASSET (LOCATION, ASSIGNEE, DESCRIPTION, MAKE, MODEL, SERIALNO, COUNTYNO, COST, COMMENTS, STATUS, CATEGORY, BINVENT, SUBLOCATION, BUREAU) 
			VALUES (:location, :assignee, :description, :make, :model, :s4, :countyNo, :cost, :comments, :status, :category, :binvent, :sublocation, :bureau)");
			//if-else statement in executing our prepared statement
			if ($stmt->execute(array(':location' => $_POST['location'], ':assignee' => $_POST['assignee'], ':description' => $_POST['description'], ':make' => $_POST['make'], 
			':model' => $_POST['model'], ':s4' => $_POST['s4'], ':countyNo' => $_POST['countyNo'], ':cost' => $_POST['cost'], ':comments' => $_POST['comments'], 
			':status' => $_POST['status'], ':category' => $_POST['category'], ':binvent' => $_POST['binvent'], ':sublocation' => $_POST['sublocation'], ':bureau' => $_POST['bureau'])) )
			{
				$output['message'] = 'asset added successfully';
			}
			else
			{
				$output['error'] = true;
				$output['message'] = 'Something went wrong. Cannot add asset';
			} 
		}
		catch(PDOException $e)
		{
			$output['error'] = true;
			$output['message'] = $e->getMessage();
		}
	}

	if($_POST['s5'] != null)
	{
		try
		{
			//make use of prepared statement to prevent sql injection
			$stmt = $db->prepare("INSERT INTO ASSET (LOCATION, ASSIGNEE, DESCRIPTION, MAKE, MODEL, SERIALNO, COUNTYNO, COST, COMMENTS, STATUS, CATEGORY, BINVENT, SUBLOCATION, BUREAU) 
			VALUES (:location, :assignee, :description, :make, :model, :s5, :countyNo, :cost, :comments, :status, :category, :binvent, :sublocation, :bureau)");
			//if-else statement in executing our prepared statement
			if ($stmt->execute(array(':location' => $_POST['location'], ':assignee' => $_POST['assignee'], ':description' => $_POST['description'], ':make' => $_POST['make'], 
			':model' => $_POST['model'], ':s5' => $_POST['s5'], ':countyNo' => $_POST['countyNo'], ':cost' => $_POST['cost'], ':comments' => $_POST['comments'], 
			':status' => $_POST['status'], ':category' => $_POST['category'], ':binvent' => $_POST['binvent'], ':sublocation' => $_POST['sublocation'], ':bureau' => $_POST['bureau'])) )
			{
				$output['message'] = 'asset added successfully';
			}
			else
			{
				$output['error'] = true;
				$output['message'] = 'Something went wrong. Cannot add asset';
			} 
		}
		catch(PDOException $e)
		{
			$output['error'] = true;
			$output['message'] = $e->getMessage();
		}
	}

	if($_POST['s6'] != null)
	{
		try
		{
			//make use of prepared statement to prevent sql injection
			$stmt = $db->prepare("INSERT INTO ASSET (LOCATION, ASSIGNEE, DESCRIPTION, MAKE, MODEL, SERIALNO, COUNTYNO, COST, COMMENTS, STATUS, CATEGORY, BINVENT, SUBLOCATION, BUREAU) 
			VALUES (:location, :assignee, :description, :make, :model, :s6, :countyNo, :cost, :comments, :status, :category, :binvent, :sublocation, :bureau)");
			//if-else statement in executing our prepared statement
			if ($stmt->execute(array(':location' => $_POST['location'], ':assignee' => $_POST['assignee'], ':description' => $_POST['description'], ':make' => $_POST['make'], 
			':model' => $_POST['model'], ':s6' => $_POST['s6'], ':countyNo' => $_POST['countyNo'], ':cost' => $_POST['cost'], ':comments' => $_POST['comments'], 
			':status' => $_POST['status'], ':category' => $_POST['category'], ':binvent' => $_POST['binvent'], ':sublocation' => $_POST['sublocation'], ':bureau' => $_POST['bureau'])) )
			{
				$output['message'] = 'asset added successfully';
			}
			else
			{
				$output['error'] = true;
				$output['message'] = 'Something went wrong. Cannot add asset';
			} 
		}
		catch(PDOException $e)
		{
			$output['error'] = true;
			$output['message'] = $e->getMessage();
		}
	}

	if($_POST['s7'] != null)
	{
		try
		{
			//make use of prepared statement to prevent sql injection
			$stmt = $db->prepare("INSERT INTO ASSET (LOCATION, ASSIGNEE, DESCRIPTION, MAKE, MODEL, SERIALNO, COUNTYNO, COST, COMMENTS, STATUS, CATEGORY, BINVENT, SUBLOCATION, BUREAU) 
			VALUES (:location, :assignee, :description, :make, :model, :s7, :countyNo, :cost, :comments, :status, :category, :binvent, :sublocation, :bureau)");
			//if-else statement in executing our prepared statement
			if ($stmt->execute(array(':location' => $_POST['location'], ':assignee' => $_POST['assignee'], ':description' => $_POST['description'], ':make' => $_POST['make'], 
			':model' => $_POST['model'], ':s7' => $_POST['s7'], ':countyNo' => $_POST['countyNo'], ':cost' => $_POST['cost'], ':comments' => $_POST['comments'], 
			':status' => $_POST['status'], ':category' => $_POST['category'], ':binvent' => $_POST['binvent'], ':sublocation' => $_POST['sublocation'], ':bureau' => $_POST['bureau'])) )
			{
				$output['message'] = 'asset added successfully';
			}
			else
			{
				$output['error'] = true;
				$output['message'] = 'Something went wrong. Cannot add asset';
			} 
		}
		catch(PDOException $e)
		{
			$output['error'] = true;
			$output['message'] = $e->getMessage();
		}
	}

	if($_POST['s8'] != null)
	{
		try
		{
			//make use of prepared statement to prevent sql injection
			$stmt = $db->prepare("INSERT INTO ASSET (LOCATION, ASSIGNEE, DESCRIPTION, MAKE, MODEL, SERIALNO, COUNTYNO, COST, COMMENTS, STATUS, CATEGORY, BINVENT, SUBLOCATION, BUREAU) 
			VALUES (:location, :assignee, :description, :make, :model, :s8, :countyNo, :cost, :comments, :status, :category, :binvent, :sublocation, :bureau)");
			//if-else statement in executing our prepared statement
			if ($stmt->execute(array(':location' => $_POST['location'], ':assignee' => $_POST['assignee'], ':description' => $_POST['description'], ':make' => $_POST['make'], 
			':model' => $_POST['model'], ':s8' => $_POST['s8'], ':countyNo' => $_POST['countyNo'], ':cost' => $_POST['cost'], ':comments' => $_POST['comments'], 
			':status' => $_POST['status'], ':category' => $_POST['category'], ':binvent' => $_POST['binvent'], ':sublocation' => $_POST['sublocation'], ':bureau' => $_POST['bureau'])) )
			{
				$output['message'] = 'asset added successfully';
			}
			else
			{
				$output['error'] = true;
				$output['message'] = 'Something went wrong. Cannot add asset';
			} 
		}
		catch(PDOException $e)
		{
			$output['error'] = true;
			$output['message'] = $e->getMessage();
		}
	}

	if($_POST['s9'] != null)
	{
		try
		{
			//make use of prepared statement to prevent sql injection
			$stmt = $db->prepare("INSERT INTO ASSET (LOCATION, ASSIGNEE, DESCRIPTION, MAKE, MODEL, SERIALNO, COUNTYNO, COST, COMMENTS, STATUS, CATEGORY, BINVENT, SUBLOCATION, BUREAU) 
			VALUES (:location, :assignee, :description, :make, :model, :s9, :countyNo, :cost, :comments, :status, :category, :binvent, :sublocation, :bureau)");
			//if-else statement in executing our prepared statement
			if ($stmt->execute(array(':location' => $_POST['location'], ':assignee' => $_POST['assignee'], ':description' => $_POST['description'], ':make' => $_POST['make'], 
			':model' => $_POST['model'], ':s9' => $_POST['s9'], ':countyNo' => $_POST['countyNo'], ':cost' => $_POST['cost'], ':comments' => $_POST['comments'], 
			':status' => $_POST['status'], ':category' => $_POST['category'], ':binvent' => $_POST['binvent'], ':sublocation' => $_POST['sublocation'], ':bureau' => $_POST['bureau'])) )
			{
				$output['message'] = 'asset added successfully';
			}
			else
			{
				$output['error'] = true;
				$output['message'] = 'Something went wrong. Cannot add asset';
			} 
		}
		catch(PDOException $e)
		{
			$output['error'] = true;
			$output['message'] = $e->getMessage();
		}
	}

	if($_POST['s10'] != null)
	{
		try
		{
			//make use of prepared statement to prevent sql injection
			$stmt = $db->prepare("INSERT INTO ASSET (LOCATION, ASSIGNEE, DESCRIPTION, MAKE, MODEL, SERIALNO, COUNTYNO, COST, COMMENTS, STATUS, CATEGORY, BINVENT, SUBLOCATION, BUREAU) 
			VALUES (:location, :assignee, :description, :make, :model, :s10, :countyNo, :cost, :comments, :status, :category, :binvent, :sublocation, :bureau)");
			//if-else statement in executing our prepared statement
			if ($stmt->execute(array(':location' => $_POST['location'], ':assignee' => $_POST['assignee'], ':description' => $_POST['description'], ':make' => $_POST['make'], 
			':model' => $_POST['model'], ':s10' => $_POST['s10'], ':countyNo' => $_POST['countyNo'], ':cost' => $_POST['cost'], ':comments' => $_POST['comments'], 
			':status' => $_POST['status'], ':category' => $_POST['category'], ':binvent' => $_POST['binvent'], ':sublocation' => $_POST['sublocation'], ':bureau' => $_POST['bureau'])) )
			{
				$output['message'] = 'asset added successfully';
			}
			else
			{
				$output['error'] = true;
				$output['message'] = 'Something went wrong. Cannot add asset';
			} 
		}
		catch(PDOException $e)
		{
			$output['error'] = true;
			$output['message'] = $e->getMessage();
		}
	}

	if($_POST['s11'] != null)
	{
		try
		{
			//make use of prepared statement to prevent sql injection
			$stmt = $db->prepare("INSERT INTO ASSET (LOCATION, ASSIGNEE, DESCRIPTION, MAKE, MODEL, SERIALNO, COUNTYNO, COST, COMMENTS, STATUS, CATEGORY, BINVENT, SUBLOCATION, BUREAU) 
			VALUES (:location, :assignee, :description, :make, :model, :s11, :countyNo, :cost, :comments, :status, :category, :binvent, :sublocation, :bureau)");
			//if-else statement in executing our prepared statement
			if ($stmt->execute(array(':location' => $_POST['location'], ':assignee' => $_POST['assignee'], ':description' => $_POST['description'], ':make' => $_POST['make'], 
			':model' => $_POST['model'], ':s11' => $_POST['s11'], ':countyNo' => $_POST['countyNo'], ':cost' => $_POST['cost'], ':comments' => $_POST['comments'], 
			':status' => $_POST['status'], ':category' => $_POST['category'], ':binvent' => $_POST['binvent'], ':sublocation' => $_POST['sublocation'], ':bureau' => $_POST['bureau'])) )
			{
				$output['message'] = 'asset added successfully';
			}
			else
			{
				$output['error'] = true;
				$output['message'] = 'Something went wrong. Cannot add asset';
			} 
		}
		catch(PDOException $e)
		{
			$output['error'] = true;
			$output['message'] = $e->getMessage();
		}
	}

	if($_POST['s12'] != null)
	{
		try
		{
			//make use of prepared statement to prevent sql injection
			$stmt = $db->prepare("INSERT INTO ASSET (LOCATION, ASSIGNEE, DESCRIPTION, MAKE, MODEL, SERIALNO, COUNTYNO, COST, COMMENTS, STATUS, CATEGORY, BINVENT, SUBLOCATION, BUREAU) 
			VALUES (:location, :assignee, :description, :make, :model, :s12, :countyNo, :cost, :comments, :status, :category, :binvent, :sublocation, :bureau)");
			//if-else statement in executing our prepared statement
			if ($stmt->execute(array(':location' => $_POST['location'], ':assignee' => $_POST['assignee'], ':description' => $_POST['description'], ':make' => $_POST['make'], 
			':model' => $_POST['model'], ':s12' => $_POST['s12'], ':countyNo' => $_POST['countyNo'], ':cost' => $_POST['cost'], ':comments' => $_POST['comments'], 
			':status' => $_POST['status'], ':category' => $_POST['category'], ':binvent' => $_POST['binvent'], ':sublocation' => $_POST['sublocation'], ':bureau' => $_POST['bureau'])) )
			{
				$output['message'] = 'asset added successfully';
			}
			else
			{
				$output['error'] = true;
				$output['message'] = 'Something went wrong. Cannot add asset';
			} 
		}
		catch(PDOException $e)
		{
			$output['error'] = true;
			$output['message'] = $e->getMessage();
		}
	}

	if($_POST['s13'] != null)
	{
		try
		{
			//make use of prepared statement to prevent sql injection
			$stmt = $db->prepare("INSERT INTO ASSET (LOCATION, ASSIGNEE, DESCRIPTION, MAKE, MODEL, SERIALNO, COUNTYNO, COST, COMMENTS, STATUS, CATEGORY, BINVENT, SUBLOCATION, BUREAU) 
			VALUES (:location, :assignee, :description, :make, :model, :s13, :countyNo, :cost, :comments, :status, :category, :binvent, :sublocation, :bureau)");
			//if-else statement in executing our prepared statement
			if ($stmt->execute(array(':location' => $_POST['location'], ':assignee' => $_POST['assignee'], ':description' => $_POST['description'], ':make' => $_POST['make'], 
			':model' => $_POST['model'], ':s13' => $_POST['s13'], ':countyNo' => $_POST['countyNo'], ':cost' => $_POST['cost'], ':comments' => $_POST['comments'], 
			':status' => $_POST['status'], ':category' => $_POST['category'], ':binvent' => $_POST['binvent'], ':sublocation' => $_POST['sublocation'], ':bureau' => $_POST['bureau'])) )
			{
				$output['message'] = 'asset added successfully';
			}
			else
			{
				$output['error'] = true;
				$output['message'] = 'Something went wrong. Cannot add asset';
			} 
		}
		catch(PDOException $e)
		{
			$output['error'] = true;
			$output['message'] = $e->getMessage();
		}
	}

	if($_POST['s14'] != null)
	{
		try
		{
			//make use of prepared statement to prevent sql injection
			$stmt = $db->prepare("INSERT INTO ASSET (LOCATION, ASSIGNEE, DESCRIPTION, MAKE, MODEL, SERIALNO, COUNTYNO, COST, COMMENTS, STATUS, CATEGORY, BINVENT, SUBLOCATION, BUREAU) 
			VALUES (:location, :assignee, :description, :make, :model, :s14, :countyNo, :cost, :comments, :status, :category, :binvent, :sublocation, :bureau)");
			//if-else statement in executing our prepared statement
			if ($stmt->execute(array(':location' => $_POST['location'], ':assignee' => $_POST['assignee'], ':description' => $_POST['description'], ':make' => $_POST['make'], 
			':model' => $_POST['model'], ':s14' => $_POST['s14'], ':countyNo' => $_POST['countyNo'], ':cost' => $_POST['cost'], ':comments' => $_POST['comments'], 
			':status' => $_POST['status'], ':category' => $_POST['category'], ':binvent' => $_POST['binvent'], ':sublocation' => $_POST['sublocation'], ':bureau' => $_POST['bureau'])) )
			{
				$output['message'] = 'asset added successfully';
			}
			else
			{
				$output['error'] = true;
				$output['message'] = 'Something went wrong. Cannot add asset';
			} 
		}
		catch(PDOException $e)
		{
			$output['error'] = true;
			$output['message'] = $e->getMessage();
		}
	}

	if($_POST['s15'] != null)
	{
		try
		{
			//make use of prepared statement to prevent sql injection
			$stmt = $db->prepare("INSERT INTO ASSET (LOCATION, ASSIGNEE, DESCRIPTION, MAKE, MODEL, SERIALNO, COUNTYNO, COST, COMMENTS, STATUS, CATEGORY, BINVENT, SUBLOCATION, BUREAU) 
			VALUES (:location, :assignee, :description, :make, :model, :s15, :countyNo, :cost, :comments, :status, :category, :binvent, :sublocation, :bureau)");
			//if-else statement in executing our prepared statement
			if ($stmt->execute(array(':location' => $_POST['location'], ':assignee' => $_POST['assignee'], ':description' => $_POST['description'], ':make' => $_POST['make'], 
			':model' => $_POST['model'], ':s15' => $_POST['s15'], ':countyNo' => $_POST['countyNo'], ':cost' => $_POST['cost'], ':comments' => $_POST['comments'], 
			':status' => $_POST['status'], ':category' => $_POST['category'], ':binvent' => $_POST['binvent'], ':sublocation' => $_POST['sublocation'], ':bureau' => $_POST['bureau'])) )
			{
				$output['message'] = 'asset added successfully';
			}
			else
			{
				$output['error'] = true;
				$output['message'] = 'Something went wrong. Cannot add asset';
			} 
		}
		catch(PDOException $e)
		{
			$output['error'] = true;
			$output['message'] = $e->getMessage();
		}
	}

	//close connection
	$database->close();

	echo json_encode($output);

?>