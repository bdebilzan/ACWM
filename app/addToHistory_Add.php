<?php
	include_once('connection.php');

	$output = array('error' => false);

	$database = new Connection();
    $db = $database->open();
    
    $query = "select guid from " . $_POST['tableHistory'] . " order by guid desc limit 1";
    $result = $db->query($query)->fetch();

    $sql = "insert into acwm.history values (:tableHistory, current_timestamp(), :userWhoUpdated, :id, 'Received')";

    // echo "<script>alert('hello')</script>";
    $test = $_POST['tableHistory'];

    $statement = $db->prepare($sql);
    $statement->execute(array(':tableHistory' => $_POST['tableHistory'], ':userWhoUpdated' => $_POST['userWhoUpdated'], ':id' => $result['guid']));

	$database->close();
?>