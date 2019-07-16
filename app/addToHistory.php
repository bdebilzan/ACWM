<?php
	include_once('connection.php');

	$output = array('error' => false);

	$database = new Connection();
    $db = $database->open();
    
    $sql = "insert into acwm.history values (:tableHistory, current_timestamp(), :userWhoUpdated, :id, 'Edited')";

    // echo "<script>alert('hello')</script>";
    $test = $_POST['tableHistory'];

    $statement = $db->prepare($sql);
    $statement->execute(array(':tableHistory' => $_POST['tableHistory'], ':userWhoUpdated' => $_POST['userWhoUpdated'], ':id' => $_POST['id']));

	$database->close();
?>