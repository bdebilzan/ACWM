<?php
    include 'db_connection.php';
    session_start();

    $connection = OpenCon();
    $output = array('error' => false);

    try {
        $currentTable = $_POST['currentTable'];
        $assetMoveTo = $_POST['assetMoveTo'];
        $guids = $_POST['guids'];
        $assetLocationField = $_POST['assetLocationField'];
        $sublocationOptions = $_POST['subLocationOptions'];

        $relocateQuery = "update $currentTable set sublocation = '$sublocationOptions', $assetLocationField = '$assetMoveTo' where guid in ($guids)";
        if ($connection->query($relocateQuery)) {
            $output['message'] = "Asset Move Success!";
        }
        else {
            $output['error'] = true;
            $output['message'] = "Asset Move Failed...";
        }
        
        $sql = "insert into acwm.history values (:tableHistory, current_timestamp(), :userWhoUpdated, :id, 'Relocated')";

        $theArray = explode(",",$guids);
        foreach ($theArray as $value){
            $statement = $connection->prepare($sql);
            $statement->execute(array(':tableHistory' => $currentTable, ':userWhoUpdated' => $_SESSION['username'], ':id' => $value));
        }
    
    }
    catch (PDOException $e) {
        $output['error'] = true;
        $output['message'] = $e->getMessage();
    }

    echo json_encode($output);
?>