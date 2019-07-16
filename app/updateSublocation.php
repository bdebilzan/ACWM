<?php
    include 'db_connection.php';

    $conn = OpenCon();

    $title = str_replace('_',' ', $_GET['location']);

    $query = "select * from rooms_cubicles where location = '" . $title . "'";

    $myResult = $conn->query($query);

    if ($myResult->rowCount() == 0) {
        echo "No rooms/cubicles in this location! <input type='hidden' name='subLocationOptions' value='N/A'>";
    }
    else {
        echo "Room/Cubicle Number: <select name='subLocationOptions'>";
        while ($row = $myResult->fetch()) {
            echo "<option value='". $row['room_cubicle_number'] ."'>" . $row['room_cubicle_number'] . "</option>";
        }
        echo "</select>";
    }
?>