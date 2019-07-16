<?php
    include 'db_connection.php';
    session_start();

    $connection = OpenCon();
    $output = array('error' => false);

    try {
        $currentTable = $_POST['currentTable'];
        $moveTo = $_POST['computerMoveTo'];
        $guids = $_POST['computerGuids'];
        $locationField = $_POST['computerMapLocation'];
        $output['message'] = "before";

        $relocateQuery = "UPDATE $currentTable set $locationField = '$moveTo' where guid in ($guids)";
        if ($connection->query($relocateQuery)) {
            $output['message'] = "Move Success!";
        }
        else {
            $output['error'] = true;
            $output['message'] = "Move Failed...";
        }
        
        $sql = "insert into acwm.history values (:tableHistory, current_timestamp(), :userWhoUpdated, :id, 'Relocated')";

        $theArray = explode(",",$guids);
        foreach($theArray as $value){
            $statement = $connection->prepare($sql);
            $statement->execute(array(':tableHistory' => $currentTable, ':userWhoUpdated' => $_SESSION['username'], ':id' => $value));
        }
    }
    catch (PDOException $e) {        
        $output['error'] = true;
        $output['message'] = $relocateQuery . $e->getMessage();
    }

    echo json_encode($output);

    
?>